<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class ApiController extends Controller
{
    public function getAllEvents()
    {
        $events = Event::get()->toJson(JSON_PRETTY_PRINT);
        return response($events, 200);
    }

    public function createEvent(Request $request)
    {
        $event = new Event;
        $event->duration = $request->duration;
        $event->dateTime = $request->dateTime;
        $event->picId = $request->picId;
        $event->title = $request->title;
        $event->location = $request->location;
        $event->guest = $request->guest;
        $event->notes = $request->notes;
        $event->save();

        return response()->json([
            "message" => "event record created"
        ], 201);
    }

    public function getEvent($id)
    {
        if (Event::where('id', $id)->exists()) {
            $event = Event::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($event, 200);
        } else {
            return response()->json([
                "message" => "event not found"
            ], 404);
        }
    }

    public function updateEvent(Request $request, $id)
    {
        if (Event::where('id', $id)->exists()) {
            $event = Event::find($id);
            $event->duration = is_null($request->duration) ? $event->duration : $request->duration;
            $event->datetime = is_null($request->dateTime) ? $event->dateTime : $request->dateTime;
            $event->picUid = is_null($request->picUid) ? $event->picUid : $request->picUid;
            $event->title = is_null($request->title) ? $event->title : $request->title;
            $event->location = is_null($request->location) ? $event->location : $request->location;
            $event->guest = is_null($request->guest) ? $event->guest : $request->guest;
            $event->notes = is_null($request->notes) ? $event->notes : $request->notes;

            $event->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Event not found"
            ], 404);
        }
    }

    public function deleteEvent($id)
    {
        if (Event::where('id', $id)->exists()) {
            $event = Event::find($id);
            $event->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Event not found"
            ], 404);
        }
    }
}

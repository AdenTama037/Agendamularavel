<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('event/index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = $request->date;
        $time = $request->time;
        $datetime = $date . " " . $time . ":00";

        $event = new Event;
        $event->duration = $request->duration;
        $event->dateTime = $datetime;
        $event->picId = auth()->user()->id;
        $event->title = $request->title;
        $event->location = $request->location;
        $event->guest = $request->guest;
        $event->notes = $request->notes;
        $event->save();

        return Redirect::to('event');
        return response()->json([
            "message" => "event record created"
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $id)
    {
        $event = Event::find($id);
        return view('event.detail', compact('event'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $id)
    {
        $event = event::find($id);

        return view('event/edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Event $id)
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
        }}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return Redirect::to('event');

    }
}

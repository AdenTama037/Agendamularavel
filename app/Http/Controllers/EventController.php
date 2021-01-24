<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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
    public function approval()
    {
        $events = Event::all();
        return view('event/approval', ['events' => $events]);
    }public function status()
    {
        $events = Event::all();
        return view('event/approval', ['events' => $events]);
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
    public function show( $id)
    {
        return Event::find($id);

    }

    /**
     * Show the form for e diting the specified resource.
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
    public function update(Request $request,Event $event)
    {
        $date = $request->date;
        $time = $request->time;
        $datetime = $date . " " . $time . ":00";

        $event= Event::findorfail($request->id);
        $event->title=$request->title;
        $event->location=$request->location;
        $event->guest=$request->guest;
        $event->notes=$request->notes;
        $event->dateTime=$datetime;
        $event->duration=$request->duration;
        $event->save();
        return Redirect::to('event')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *return Redirect::to('event')->with('success', 'Data berhasil diupdate');
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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Event</div>
                <div class="card-body">
                    @foreach($event as $key => $value)
                    <form  action="{{ route('event.update'),$value->id }}" method="POST">

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                @csrf
                                <input name="id" type="hidden" class="form-control" required autofocus value="{{$value->id}}" placeholder="Title Event">

                                <input name="title" type="text" class="form-control" required autofocus value="{{$value->title}}" placeholder="Title Event">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Location</label>

                            <div class="col-md-6">
                                <input name="location" type="text" class="form-control" required value="{{$value->location}}" placeholder="Location Event">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Guest</label>

                            <div class="col-md-6">
                                <input name="guest" type="text" class="form-control" required value="{{$value->guest}}" placeholder="Guest Event">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Date & Time</label>

                            <div class="col-md-6">
                                <input name="date" type="date" class="form-control" required value="{{$value->dateTime}}">
                                <input name="time" type="time" class="form-control" required value="{{$value->dateTime}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" >Duration (Minutes)</label>

                            <div class="col-md-6">
                                <input name="duration" type="text" class="form-control" required value="{{$value->duration}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Notes</label>

                            <div class="col-md-6">
                                <input name="notes" type="text" class="form-control" required value="{{$value->notes}}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Event
                                </button>
                                <a class="btn btn-secondary" href="/event" role="button">Cancel</a>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
{{-- {{print_r(Auth::user()->id)}} --}}
@endsection

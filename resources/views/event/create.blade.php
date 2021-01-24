@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Event</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('event.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input name="title" type="text" class="form-control" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Location</label>

                            <div class="col-md-6">
                                <input name="location" type="text" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Guest</label>

                            <div class="col-md-6">
                                <input name="guest" type="text" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Date & Time</label>

                            <div class="col-md-6">
                                <input name="date" type="date" class="form-control" required>
                                <input name="time" type="time" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Duration (Minutes)</label>

                            <div class="col-md-6">
                                <input name="duration" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Notes</label>

                            <div class="col-md-6">
                                <input name="notes" type="text" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Event
                                </button>
                                <a class="btn btn-secondary" href="/event" role="button">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
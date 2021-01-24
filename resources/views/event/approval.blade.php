@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3>Event Index</h3>
                        </div>
                    </div>
                </div>
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->title }}</td>

                                    <!-- we will also add show, edit, and delete buttons -->
                                    <td>

                                        <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                                        <!-- we will add this later since its a little more complicated than the other two buttons -->

                                        <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                                        {{-- <a class="btn btn-small btn-success" href="{{ URL::to('sharks/' . $value->id) }}">Show
                                        this shark</a> --}}

                                        <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                                        <form method="POST">
                                            <a class="btn btn-small btn-info" href="{{ route('event.update', $value->id)}}">Approve</a>
                                        </form>
                                        <form method="POST" action="{{ route('event.destroy', [$value->id]) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-small btn-danger" type="submit">Reject</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

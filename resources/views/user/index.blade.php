@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3>Profile User</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                                    <!-- we will also add show, edit, and delete buttons -->


                                        <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                                        <!-- we will add this later since its a little more complicated than the other two buttons -->

                                        <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                                        {{-- <a class="btn btn-small btn-success" href="{{ URL::to('sharks/' . $value->id) }}">Show
                                        this shark</a> --}}

                                        <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                                        <form method="POST">
                                            <a class="btn btn-small btn-info" href="{{ route('event.update', $value->id)}}">Update</a>
                                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

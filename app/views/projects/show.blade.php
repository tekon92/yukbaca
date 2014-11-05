<!-- /Users/ryanfauzi/Documents/git/yukbaca/app/views/project/show.blade.php -->

@extends('_partials/layout')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-offset-3">
            <h1>Showing {{ $project->project_name }}</h1>
            <div class="text-center">
                <div class="jumbotron">
                    <img src="../upload/images/{{ $project->book_cover}}" class="pull-left">
                    <h2>{{ $project->project_name }}</h2>
                    <p>
                        <strong>Title:</strong> {{ $project->project_name }} <br>
                        <strong>Description:</strong> {{ $project->description}} <br>
                        <strong>Price:</strong>{{ $project->price }} <br>
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop
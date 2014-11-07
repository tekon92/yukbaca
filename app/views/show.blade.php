<!-- /Users/ryanfauzi/Documents/git/yukbaca/app/views/show.blade.php -->

@extends('_partials/layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="view-project">
                <img src="upload/images/{{  $project->book_cover }}" alt="">
            </div>
        </div>
    </div>
@stop
<!-- /Users/ryanfauzi/Documents/git/yukbaca/app/views/backed/show.blade.php -->

@extends('_partials/layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="view-project">
                <div class="col-lg-3 pull-left">
                    <img src="../upload/images/{{  $project->book_cover }}" alt="">
                </div>
                <div class="col-lg-9">
                <p>You're backed</p>
                <h1>{{ $project->project_name }}</h1>
                <p>
                    The author is letting you set the price you'll pay for this book! The suggested price is Rp. {{ $project->price }}, and the minimum price is Rp. {{ $project->price - 1000 }}.
                </p>
                <p><h3>Name Your Price (Rp.)</h3></p>
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <div class="col-sm-10">
                        <p>
                            <label for="amount">Maximum price:</label>
                            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                            <div id="slider-range-min"></div>
                        </p>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Remember me
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                  </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@stop
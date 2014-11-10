<!-- /Users/ryanfauzi/Documents/git/yukbaca/app/views/backed/show.blade.php -->

<!-- /Users/ryanfauzi/Documents/git/yukbaca/app/views/show.blade.php -->

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
                     <a href="#">{{ $project->author_name }}</a> is letting you set the price you'll pay for this book! The suggested price is Rp. {{ $project->price }}, and the minimum price is Rp. {{ $project->price - 1000 }}.
                </p>
                <p>Name Your Price (Rp.)</p>
                <div class="row">
                  <div class="col-lg-12">
                    <form class="form-horizontal" role="form">
                      <div class="form-group">
                        <label for="amount" class="col-sm-2 control-label">You Pay: </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="amount" style="border:0; color:#f6931f; font-weight:bold;" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <div id="slider-range-min"></div>
                      </div>
                      <div class="form-group">
                        <label for="inputAmount" class="col-sm-2 control-label">Copies</label>
                        <div class="col-sm-10">
                          <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="total" class="col-sm-2 control-label">Total</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="gTotal" placeholder="Grand Total">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Buy</button>
                        </div>
                      </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@stop
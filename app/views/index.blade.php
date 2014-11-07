@extends('_partials/layout')



<!-- page content -->
@section('content')
      <!-- Main component for a primary marketing message or call to action -->
      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>Hello, world!</h1>
            <p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p>
          </div>
          <div class="row spacer">
            <div class="col-lg-12">
              <div class="category">
              <h1>Category</h1>
                <div class="btn-group control-group">
                    <button type="button" class="btn btn-default">All</button>
                  <?php foreach ($category as $key => $value): ?>
                    <button type="button" class="btn btn-default">{{ $value->name }}</button>
                  <?php endforeach ?>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row spacer">
          <h1>Projects</h1>
            <?php foreach ($project as $key=>$value): ?>
                 <div class="col-xs-6 col-lg-4">
                 <img src="upload/images/{{ $value->book_cover }}" alt="">
                  <h2>{{ $value->project_name}}</h2>
                  <p>
                    {{ $value->description }}
                  </p>
                  <p>
                    <a class="btn btn-default" href="{{ URL::to('backed/' . $value->id)}}" role="button">View details &raquo;</a>
                    <a class="btn btn-primary" href="#" role="button">Buy</a>
                  </p>
                </div><!--/.col-xs-6.col-lg-4-->
            <?php endforeach ?>
          </div><!--/row-->
            {{ $project->links() }}
        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
        <h1>Latest Project</h1>
          <div class="list-group">
            <?php foreach ($project as $key => $value): ?>
              <a href="{{ URL::to('backed/' .$value->id)}}" class="list-group-item">{{ $value->project_name}}</a>
            <?php endforeach ?>
          </div>
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->
@stop
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
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#">All</a></li>
                 @foreach ($category as $key=> $value)
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation"><a href="{{ URL::to('category/' . $value->id )}}">{{$value->name}}</a></li>
                 @endforeach
              </ul>
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
                    <a class="btn btn-default" href="{{ URL::to('index/' . $value->id)}}" role="button">View details &raquo;</a>
                    by <a href="#">{{ $value->author_name }}</a>
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
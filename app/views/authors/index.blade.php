<!-- /Users/ryanfauzi/Documents/git/yukbaca/app/views/authors/index.blade.php -->

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
            <h1>Authors!</h1>
            <p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p>
          </div>
          <div class="row spacer">
          <h1>Authors</h1>
            <?php foreach ($authors as $key=>$value): ?>
                 <div class="col-xs-6 col-lg-4">
                 <h2>{{ $value->username}}</h2>
                 <img src="upload/images/{{ $value->book_cover }}" alt="">
                  <p>
                    <a class="btn btn-default" href="{{ URL::to('books/' . $value->id)}}" role="button">View All Books</a>
                  </p>
                </div><!--/.col-xs-6.col-lg-4-->
            <?php endforeach ?>
          </div><!--/row-->

        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
        <h1>Latest books</h1>
          <div class="list-group">
            <?php foreach ($books as $key => $value): ?>
              <a href="{{ URL::to('backed/' .$value->id)}}" class="list-group-item">{{ $value->title}}</a>
            <?php endforeach ?>
          </div>
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->
@stop
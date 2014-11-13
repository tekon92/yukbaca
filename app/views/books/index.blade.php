<!-- /Users/ryanfauzi/Documents/git/yukbaca/app/views/books/index.blade.php -->

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
            <h1>Books!</h1>
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
          <h1>bookss</h1>
            <?php foreach ($books as $key=>$value): ?>
                 <div class="col-xs-6 col-lg-4">
                 <img src="upload/images/{{ $value->book_cover }}" alt="">
                  <h2>{{ $value->title}}</h2>
                  <p>Author : <b>{{ $value->author}}</b></p>
                  <p>Price : <b>{{ $value->price }}</b></p>
                  <p>
                    {{ $value->description }}
                  </p>
                  <form action="/cart/add" name="add_to_cart" method="post" accept-charset="UTF-8">
                      <input type="hidden" name="book" value="{{ $value->id }}">
                        <select name="amount" style="width: 100%">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    <p>
                        <a class="btn btn-default" href="{{ URL::to('books/' . $value->id)}}" role="button">View details &raquo;</a>
                        <button class="btn btn-info btn-block">Add to cart</button>
                    </p>
                  </form>
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
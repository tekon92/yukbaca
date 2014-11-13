<!-- /Users/ryanfauzi/Documents/git/yukbaca/app/views/books/view.blade.php -->

@extends('_partials/layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="view-project">
                <div class="col-lg-3 pull-left">
                    <img src="../upload/images/{{  $books->book_cover }}" alt="">
                </div>
                <div class="col-lg-9">
                <p>You're backed</p>
                <h1>{{ $books->title }}</h1>
                <p>
                     <a href="#">{{ $books->author }}</a> is letting you set the price you'll pay for this book! The suggested price is Rp. {{ $books->price }}, and the minimum price is Rp. {{ $books->price - 1000 }}.
                </p>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="book-format">
                      <h2>The Book</h3>
                      <h3>Includes three convenient formats</h3>
                      <ul>
                        <li><strong>PDF</strong> (for Mac or PC)</li>
                        <li><strong>EPUB</strong> (for iPad, iPhone, Android, and other ebook readers)</li>
                        <li><strong>MOBI</strong> (for Kindle)</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <a href="{{ URL::to('backed/' . $books->id) }}" class="btn btn-primary btn-block">Buy This Book</a>
                  </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <h2>About the Book</h2>
        <p>
          {{ $books->description}}
        </p>
        <h4>If you want a book which keeps tracks of the project ecosystem then {{ $books->title}} is the right choice.</h4>
        <p>We know how difficult is to go through a book where examples don't work or where you are left with hanging questions, we offer for every reader 24/7 support though our IRC channel #{{ $books->title}}</p>
        <div class="row">
          <div class="col-lg-9 col-md-offset-3">
            <div class="col-lg-3"><button class="btn btn-primary btn-block">Add To Wishlist</button></div>
            <div class="col-lg-3"><button class="btn btn-primary btn-block">Discuss This Book</button></div>
            <div class="col-lg-3"><button class="btn btn-primary btn-block">Email the Author</button></div>
          </div>
        </div>
      </div>
    </div>
@stop
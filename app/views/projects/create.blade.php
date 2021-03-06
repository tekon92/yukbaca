<!-- /Users/ryanfauzi/Documents/git/yukbaca/app/views/project/create.blade.php -->

@extends('_partials/layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            {{ HTML::ul($errors->all()) }}
            {{ Form::open(array('url' => 'projects', 'files' => 'true'))}}
                  <div class="form-group">
                    {{ Form::label('project_name', 'Book Title') }}
                    {{ Form::text('project_name', '', array('class' => 'form-control', 'placeholder' => 'Form Title')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('author_name', 'Author') }}
                    {{ Form::text('author_name', '', array('class' => 'form-control', 'placeholder' => 'Author')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('book_cover', 'Book Cover') }}
                    {{ Form::file('book_cover', '', array('class' => 'form-control', 'placeholder' => 'Book Cover')) }}
                    <p class="help-block">Image Format must be jpeg and no more than 1 mb</p>
                  </div>
                  <div class="form-group">
                    {{ Form::label('description', 'Description') }}
                    {{ Form::textarea('description', '', array('cols' => '30', 'row' => '10', 'class' => 'form-control')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('price', 'Price') }}
                    {{ Form::text('price', '', array('class' => 'form-control', 'placeholder' => 'Price')) }}
                  </div>
                  {{ Form::submit('Submit', array('class' => 'btn btn-default btn-primary')) }}
                {{ Form::close() }}
            </div>
        </div>
@stop
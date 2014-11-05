<!-- /Users/ryanfauzi/Documents/git/yukbaca/app/views/project/edit.blade.php -->

@extends('_partials/layout')

@section('content')
     <div class="row">
        <div class="col-lg-12">
            {{ HTML::ul($errors->all()) }}
            {{ Form::model($project, array('route' => array('projects.update', $project->id), 'method' => 'PUT', 'files' => 'true')) }}
                  <div class="form-group">
                    {{ Form::label('bookTitle', 'Book Title') }}
                    {{ Form::text('project_name', null, array('class' => 'form-control')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('author', 'Author') }}
                    {{ Form::text('author_name', null,  array('class' => 'form-control')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('bookCover', 'Book Cover') }}
                    {{ Form::text('book_cover', null, array('class' => 'form-control', 'disabled' => 'disabled')) }}
                    {{ Form::file('book_cover', null, array('class' => 'form-control')) }}
                    <p class="help-block">Image Format must be jpeg and no more than 1 mb</p>
                  </div>
                  <div class="form-group">
                    {{ Form::label('description', 'Description') }}
                    {{ Form::textarea('description', null,  array('cols' => '30', 'row' => '10', 'class' => 'form-control')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('price', 'Price') }}
                    {{ Form::text('price', null, array('class' => 'form-control')) }}
                  </div>
                  {{ Form::submit('Submit', array('class' => 'btn btn-default btn-primary')) }}
                {{ Form::close() }}
            </div>
        </div>
@stop
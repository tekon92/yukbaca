<!-- /Users/ryanfauzi/Documents/git/yukbaca/app/views/project/index.blade.php -->

@extends('_partials/layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
        <!-- alert -->
        @if (Session::has('message'))
            <div class="alert alert-info">
                {{ Session::get('message')}};
            </div>
        @elseif (Session::has('delete'))
            <div class="alert alert-warning">
                {{ Session::get('delete') }}
            </div>
        @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Book Cover</th>
                        <th>Description</th>
                        <th>Price (Rp. )</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->project_name }}</td>
                        <td>{{ $value->author_name }}</td>
                        <td>
                            <img src="upload/images/{{ $value->book_cover }}" alt="">
                        </td>
                        <td>{{ $value->description }}</td>
                        <td>{{ $value->price }}</td>
                        <td>Funded</td>
                        <td>
                            <a href="{{ URL::to('projects/' . $value->id . '/edit') }}" class="btn btn-small btn-info btn-block">Edit</a>
                            <a href="{{ URL::to('projects/' . $value->id) }}" class="btn btn-small btn-success btn-block">View</a>
                            {{ Form::open(array('url' => 'projects/' .$value->id, 'class' => 'btn btn-block btn-small btn-warning')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-block btn-small btn-warning'))}}
                            {{ Form::close()}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 pull-right">
            <a href="{{ URL::to('projects/create')}}" class="btn btn-primary btn-block">Create New</a>
        </div>
    </div>
@stop
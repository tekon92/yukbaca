<!-- /Users/ryanfauzi/Documents/git/yukbaca/app/views/project/index.blade.php -->

@extends('_partials/layout')
@section('content')
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Book Title</th>
            <th>Author</th>
            <th>Book Cover</th>
            <th>Description</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Buku belajar</td>
            <td>Ryan</td>
            <td>
                <img data-src="holder.js/150x100">
            </td>
            <td>Ini adalah buku belajar yang bisa digunakan</td>
            <td>Rp. 100.000</td>
            <td>Funded</td>
            <td><a href="{{ URL::route('projects.edit') }}">Edit</a></td>
        </tr>
    </table>
@stop
@extends('layouts.dashboard')
@section('data')

<div class="container-fluid">
    <a href="/category/create" class="btn btn-danger mt-3">Add Category</a>
    <div class="row mt-3 px-5">
        <h3 class="text-center">All Categories</h3>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $c)
                <tr>
                    <td> {{$c->name}} </td>
                    <td> {{$c->type}} </td>
                    <td><a href="{{'/category/edit/'.$c->id}}" class="btn btn-success">Edit</a></td>
                    <td><a href="{{'/category/delete/'.$c->id}}" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
@extends('layouts.dashboard')
@section('data')

<div class="container-fluid">
    <div class="row">
        <h3 class="mb-4">Create Category</h3>
        <form method="POST" action="/category/create">@csrf
            <div class="form-group mb-3">
                <label>Name</label>
                <input type="text" class="form-control" name="name" />
            </div>
            <div class="form-group mb-3">
                <label>Type</label>
                <select class="form-control" name="type">
                    <option value="Income">Income</option>
                    <option value="Expense">Expense</option>
                </select>
            </div>
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>
</div>

@endsection
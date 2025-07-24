@extends('layouts.dashboard')
@section('data')

<div class="container-fluid">
    <div class="row">
        <h3 class="my-4">Add Transaction</h3>
        <form method="POST" action="/transaction/create">@csrf
            <div class="form-group mb-3">
                <label>Title</label>
                <input type="text" class="form-control" name="title" />
            </div>
            <div class="form-group mb-3">
                <label>Categories</label>
                <select class="form-control" name="category_id">
                    @foreach($categories as $c)
                        <option value="{{$c->id}}"> {{$c->name}} - {{$c->type}} </option>
                    @endforeach
                </select>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Amount (in Rupees)</label>
                        <input type="text" class="form-control" name="amount" />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" name="date" />
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label>Notes</label>
                <textarea name="notes" class="form-control" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>
</div>

@endsection
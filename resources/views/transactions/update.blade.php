@extends('layouts.dashboard')
@section('data')

<div class="container-fluid">
    <div class="row">
        <h3 class="my-4">Update Transaction</h3>
        <form method="POST" action="{{'/transaction/edit/'.$transaction->id}}">@csrf
            <div class="form-group mb-3">
                <label>Title</label>
                <input type="text" class="form-control" name="title" value="{{$transaction->title}}" />
            </div>
            <div class="form-group mb-3">
                <label>Categories</label>
                <select class="form-control" name="category_id">
                    <option value="{{$transaction->category->id}}">Current: {{$transaction->category->name}} - {{$transaction->category->type}} </option>
                    @foreach($categories as $c)
                        <option value="{{$c->id}}"> {{$c->name}} - {{$c->type}} </option>
                    @endforeach
                </select>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Amount (in Rupees)</label>
                        <input type="text" class="form-control" name="amount" value="{{$transaction->amount}}" />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" name="date" value="{{$transaction->date}}" />
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label>Notes</label>
                <textarea name="notes" class="form-control" rows="4"> {{$transaction->notes}} </textarea>
            </div>
            <button type="submit" class="btn btn-danger">Update</button>
        </form>
    </div>
</div>

@endsection
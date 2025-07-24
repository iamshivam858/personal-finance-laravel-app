@extends('layouts.dashboard')
@section('data')

<div class="container-fluid mt-4">
    <div class="container">
        <h3 class="pb-2">Reports</h3>
        <form action="/reports" method="POST">@csrf
            <div class="row mb-3">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" class="form-control" name="start_date" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="date" class="form-control" name="end_date" />
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-danger">Generate</button>
        </form>
    </div>
</div>

@if(isset($transactions))
<div class="container-fluid">
    <div class="row mt-3 px-5">
            <h3 class="text-center">All Transactions</h3>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Type</th>
                    <th scope="col">Date</th>
                    <th scope="col">Notes</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($transactions as $t)
                    <tr class={{$t->category->type == 'income' ? 'table-success' :'table-danger'}}>
                        <td> {{$t->title}} </td>
                        <td> {{$t->amount}} </td>
                        <td> {{$t->category->type}} </td>
                        <td> {{$t->date}} </td>
                        <td> {{$t->notes}} </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endif

@endsection
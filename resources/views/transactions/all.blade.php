@extends('layouts.dashboard')
@section('data')

<div class="container-fluid">
    <a href="/transaction/create" class="btn btn-danger mt-3">Add Transactions</a>
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
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
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
                        <td><a href="{{'/transaction/edit/'.$t->id}}" class="btn btn-success" >Edit</a></td>
                        <td><a href="{{'/transaction/delete/'.$t->id}}" class="btn btn-danger" >Delete</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>


@endsection
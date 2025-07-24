@extends('layouts.dashboard')
@section('data')

<div class="container-fluid mt-4">
    <div class="container">

        {{-- total details --}}
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
            <div class="col">
                <div class="card">
                <div class="card-body text-center">
                    <p class="card-text">Total Income</p>
                    <h5 class="card-title">₹ {{$income}} </h5>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                <div class="card-body text-center">
                    <p class="card-text">Total Expenses</p>
                    <h5 class="card-title">₹ {{$expense}} </h5>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                <div class="card-body text-center">
                    <p class="card-text">Balance</p>
                    <h5 class="card-title">₹ {{$income - $expense}} </h5>
                </div>
                </div>
            </div>
        </div>

        {{-- Recent transactions and Expense vs income chart --}}
        <div class="row  mt-5">
            <div class="col-sm-3">
                <canvas id="incomeExpenseChart"></canvas>
                <script>
                    const ctx1 = document.getElementById('incomeExpenseChart');
                    new Chart(ctx1, {
                        type: 'pie',
                        data: {
                            labels: ['Income', 'Expense'],
                            datasets: [{
                                label: 'Income vs Expense',
                                data: [{{ $income }}, {{ $expense }}],
                                backgroundColor: ['#4CAF50', '#F44336'],
                            }]
                        }
                    });
                </script>
            </div>
        
            <div class="col-sm-3">
                <canvas id="expenseCategoryChart" width="400px" height="400px"></canvas>
                <script>
                    const ctx2 = document.getElementById('expenseCategoryChart');
                    new Chart(ctx2, {
                        type: 'doughnut',
                        data: {
                            labels: {!! json_encode($expenseByCategory->keys()) !!},
                            datasets: [{
                                label: 'Expenses by Category',
                                data: {!! json_encode($expenseByCategory->values()) !!},
                                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#8E44AD', '#00BCD4']
                            }]
                        }
                    });
                </script>
            </div>

            <div class="col-sm-6">
                <h4>Recent Transactions</h4>
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
                        
                        @foreach($trans as $t)
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
    </div>
</div>


@endsection
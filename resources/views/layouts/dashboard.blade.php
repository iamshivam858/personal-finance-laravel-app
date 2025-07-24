@extends('layouts.base')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 bg-dark text-white py-4" style="height: 100vh">
            <h2 class="text-center"><a href="/" class="text-decoration-none text-white">Dashboard</a></h2>
            <hr/>
            <div class="d-flex justify-content-around align-items-center pt-4">
                <i class="fa-solid fa-money-bill-transfer fa-xl"></i>
                <h4><a href="/transaction/all" class="text-decoration-none text-white">Transactions</a></h4>
                <h4>-></h4>
            </div>
            <div class="d-flex justify-content-around align-items-center pt-4">
                <i class="fa-solid fa-list fa-xl"></i>
                <h4><a href="/category/all" class="text-decoration-none text-white">Categories</a></h4>
                <h4>-></h4>
            </div>
            <div class="d-flex justify-content-around align-items-center pt-4">
                <i class="fa-solid fa-file fa-xl"></i>
                <h4><a href="/reports" class="text-decoration-none text-white">Reports</a></h4>
                <h4>-></h4>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="d-flex justify-content-end align-items-center bg-dark mt-2 py-3 px-3">
                <a href="/user/logout" class="btn btn-danger">Logout</a>
            </div>
            @yield('data')
        </div>
    </div>
</div>


@endsection
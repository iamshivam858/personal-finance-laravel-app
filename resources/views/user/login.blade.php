@extends('layouts.base')
@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row mt-5 px-5">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 px-5 mt-5 bg-success p-4 text-white" style="border-radius: 10px;">
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <h1 class="text-center"><u>Personal Finance Buddy</u></h1>
                <h3 class="text-center mt-3">Login</h3>
                <form method="POST" action="{{ url('/user/login') }}">@csrf
                    <div class="form-group mb-3">
                        <label>Enter Email</label>
                        <input type="text" class="form-control" name="email" />
                        @error('email')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>Enter Password</label>
                        <input type="password" class="form-control" name="password" />
                        @error('password')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>

                <div class="row mt-5 px-5">
                    <h4 class="text-center">Don't have an account?</h4>
                    <a href="/user/signup" class="btn btn-danger">Signup</a>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</div>


@endsection
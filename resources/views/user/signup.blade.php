@extends('layouts.base')
@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-8"></div>
            <div class="col-sm-4">
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <h3 class="text-center">Signup</h3>
                <form method="POST" action="{{ url('/user/signup') }}">@csrf
                    <div class="form-group mb-3">
                        <label>Enter Full Name</label>
                        <input type="text" class="form-control" name="name" />
                        @error('name')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
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

                <div class="row mt-5">
                    <h4>Already have an account?</h4>
                    <a href="/user/login" class="btn btn-danger">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
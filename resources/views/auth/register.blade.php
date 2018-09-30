@extends('layouts.auth')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-end" style="background-image: url('/images/wall1.jpg'); background-position: center; background-size: cover;">

            <div class="col-4" style="background-color: #fffffff0;">
                <div class="d-flex align-items-center justify-content-center text-dark font-weight-bold" style="height: 100vh;">
                    <form action="{{ route('register') }}" method="post" class="col-10">
                        <div class="text-center mb-4">
                            <a class="p-0" href="/"><img id="logo" src="/images/2.1.png" style="width:100px; height:auto;" alt=""></a>
                        </div>
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter E-mail">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Username</label>
                            <input name="name" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Repeat password</label>
                            <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1" placeholder="Repeat password">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-link" href="{{ route('login') }}">
                            {{ __('Already have an account? Sign in') }}
                        </a>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection

@extends('layouts.auth')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-end" style="background-image: url('/images/wall6.jpg'); background-position: center; background-size: cover; background-repeat: no-repeat; height: 100vh;">
            <div class="col"></div>
            <div class="col-6 py-5" style="background-color: #ffffff9e;">
                <div class="d-flex align-items-center justify-content-center text-dark font-weight-bold">
                    <form action="{{ route('register') }}" method="post" class="col-10">
                        <div class="text-center mb-4">
                            <a class="p-0" href="/"><img id="logo" src="/images/2.1.png" style="width:100px; height:auto;" alt=""></a>
                        </div>
                        @csrf
                        <div class="form-row mb-3">
                            <div class="col-6">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
                            </div>
                            <div class="col-6">
                                <label for="last_name">Last name</label>
                                <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Enter last name">
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-6">
                                <label for="email">E-mail</label>
                                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter E-mail">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="col-6">
                                <label for="phone_number">Phone number</label>
                                <input name="phone_number" type="text" class="form-control" id="phone_number" placeholder="Enter phone number">
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-6">
                                <label for="embassy">Embassy</label>
                                <input name="embassy" type="text" class="form-control" id="embassy" placeholder="Enter embassy">
                            </div>
                            <div class="col-6">
                                <label for="code">Code</label>
                                <input name="code" type="text" class="form-control" id="code" placeholder="Enter your code">
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-6">
                                <label for="password">Password</label>
                                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <div class="col-6">
                                <label for="repeated_password">Repeat password</label>
                                <input name="password_confirmation" type="password" class="form-control" id="repeated_password" placeholder="Repeat password">
                            </div>
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

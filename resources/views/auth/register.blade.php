@extends('layouts.auth')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col" style="background-image: url('/images/wall6.jpg'); background-position: center; background-size: cover;"></div>
            <div class="col-4" style="background-color: #fffffff0;">
                <div class="d-flex align-items-center justify-content-center text-dark font-weight-bold" style="height: 100vh;">
                    <form action="{{ route('register') }}" method="post" class="col-10">
                        <div class="text-center mb-4">
                            <a class="p-0" href="/"><img id="logo" src="/images/2.1.png" style="width:100px; height:auto;" alt=""></a>
                        </div>
                        @csrf
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter E-mail">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last name</label>
                            <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Enter last name">
                        </div>
                        <div class="form-group">
                            <label for="embassy">Embassy</label>
                            <input name="embassy" type="text" class="form-control" id="embassy" placeholder="Enter embassy">
                        </div>
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input name="code" type="text" class="form-control" id="code" placeholder="Enter your code">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="repeated_password">Repeat password</label>
                            <input name="password_confirmation" type="password" class="form-control" id="repeated_password" placeholder="Repeat password">
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

@extends('layouts.auth')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-end" style="background-image: url('/images/wall6.jpg'); background-position: center; background-size: cover;">
            <div class="col"></div>
            <div class="col-4" style="background-color: #ffffff9e;">
                <div class="d-flex align-items-center justify-content-center text-dark font-weight-bold" style="height: 100vh;">
                    <form action="{{ route('change_password_post') }}" method="post" class="col-10">
                        @if(Session::has('info'))
                            <div class="alert alert-info" role="alert">
                                {{ Session::get('info') }}
                            </div>
                        @endif
                        <div class="text-center mb-4">
                            <a class="p-0" href="/"><img id="logo" src="/images/2.1.png" style="width:100px; height:auto;" alt=""></a>
                        </div>
                        <div class="text-center mb-4">
                            <p class="text-capitalize">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</p>
                        </div>
                        @csrf
                        <div class="form-group">
                            <label for="current_password">Current password</label>
                            <input name="current_password" type="password" class="form-control" id="current_password" aria-describedby="emailHelp" placeholder="Enter current password" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password">New password</label>
                            <input name="new_password" type="password" class="form-control" id="new_password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="repeated_password">Repeat new password</label>
                            <input name="repeated_password" type="password" class="form-control" id="repeated_password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection

@extends('layouts.auth')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-4 col-lg-4">
            <div class="card">

                <!-- Logo -->
                <div class="card-header pt-3 pb-3 text-center">
                    <a href="index.html">
                        <span><img src="{{ asset("images/logo/logo-light.png") }}" alt="" height="65"></span>
                    </a>
                </div>

                <div class="card-body p-4">
                    
                    <div class="text-center w-75 m-auto">
                        <p class="text-muted mb-4">Please enter your username and password.</p>
                    </div>

                    <form action="{{ route("login") }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input class="form-control" type="text" id="username" placeholder="Enter your username" name="username">
                        </div> 

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" placeholder="Enter your password" name="password">
                            </div>
                        </div>

                        <div class="mb-3 mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                <label class="form-check-label" for="checkbox-signin">Remember me</label>
                            </div>
                        </div>

                        <div class="mb-3 mb-0 text-center d-flex justify-content-start">
                            <button class="btn btn-primary btn-custom" type="submit"> Log In </button>
                        </div>

                    </form>
                </div> <!-- end card-body -->
            </div>
            <!-- end card -->

            <!-- end row -->

        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>

@endsection

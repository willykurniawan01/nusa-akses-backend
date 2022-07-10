<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SB Admin 2 - User Profile</title>

        <!-- Custom fonts for this template-->
        <link
            href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"
            rel="stylesheet"
            type="text/css"
        />
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet"
        />

        <!-- Custom styles for this template-->
        <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet" />
        <style>
          @import url('https://fonts.googleapis.com/css2?family=Parisienne&family=Poppins:wght@200;300;400;500;700&display=swap');
            .body{
                font-family: "Poppins";
            }
            .user-name{
                font-weight:700;
                color: #000;
                text-transform: capitalize;
            }

            .user-role{
                font-weight:500;
                color: #000;
                text-transform: capitalize;
            }

            /* .left-side{
                height: 100vh;
            }

            .left-side .card{
                height: 100%;
            } */
        </style>
    </head>

    <body>
        <form action="{{ route("settings.account-setting.update",$user->id) }}" method="POST">
            @csrf
            <div class="container-fluid">
                <div class="row">
                <div class="col">
                    <a href="{{ route("settings.index") }}
                    " class="btn btn-primary mt-3 mb-3">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-side">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="row px-4 justify-content-center">
                                        <img class="rounded-circle" src="{{ asset("img/undraw_profile.svg") }}" width="200" height="300" alt="">
                                    </div>
                                    <div class="row justify-content-center">
                                        <h4 class="text-center user-name"> 
                                            {{ $user->username }}
                                        </h4> 
                                    </div> 
                                    <div class="row justify-content-center">
                                        <h4 class="text-center user-role"> 
                                            Admin
                                        </h4> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="card shadow mb-4 px-4 py-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="
                                            ">Nama</label>
                                            <input name="name" type="text" value="{{ $user->name }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="
                                            ">Picture</label>
                                            <input name="picture" type="file" class="form-control">
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="
                                            ">New Password</label>
                                            <input name="password" type="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="
                                            ">Confirm Password</label>
                                            <input name="password_confirm" type="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
     
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{
                asset('vendor/bootstrap/js/bootstrap.bundle.min.js')
            }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{
                asset('vendor/jquery-easing/jquery.easing.min.js')
            }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

        @stack('script') @include('sweetalert::alert')
    </body>
</html>

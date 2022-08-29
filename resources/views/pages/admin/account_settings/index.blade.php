@extends('layouts.app')

@section('title','Pengguna')

@section('content')

<form action="{{ route("setting.account-setting.update",$user->id) }}" method="POST">
    @csrf
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-sm-3">
                <div class="left-side">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row px-4 justify-content-center">
                                <img class="rounded-circle" src="{{ asset("img/undraw_profile.svg") }}" width="100" height="100" alt="">
                            </div>
                            <div class="row mt-2 justify-content-center">
                                <h4 class="text-center user-name"> 
                                    {{ $user->username }}
                                </h4> 
                            </div> 
                            <div class="row mt-2">
                                <div class="form-group text-center">
                                    <button name="select-picture" type="button" class="btn btn-sm btn-success">Pilih Gambar</button>
                                    <input name="picture" hidden type="file">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="right-side">
                    <div class="card shadow mb-4 px-4 py-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="mb-2">Nama</label>
                                        <input name="name" type="text" value="{{ $user->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="mb-2">New Password</label>
                                        <input name="password" type="password" class="form-control">
                                    </div>
                                </div>
                            </div> 
                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="mb-2">Confirm Password</label>
                                        <input name="password_confirm" type="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row mt-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-success">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('style')
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

.left-side{
    height: 350px;
}

.left-side .card{
    height: 100%;
}

.right-side{
    height: 350px;
}

.right-side .card{
    height: 100%;
}
</style>
@endpush

@push('script')
 <script>
    $(function(){
        $("button[name='select-picture']").on("click",function(){
            $("input[name='picture']").click();
        });
    });
 </script>
@endpush






@extends('layouts.app')

@section('title',"Pengaturan Tema")

@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card shadow mb-4 mt-3 px-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="color_scheme">Color Scheme :</label>
                                <select class="form-select" name="color_scheme">
                                    <option value="light">Light</option>
                                    <option value="dark">Dark</option>
                                </select>
                            </div>
                        </div>
                    </div> 
                    
                    <div class="row mt-3">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="sidebar">Sidebar :</label>
                                <select class="form-select" name="sidebar">
                                    <option>Light</option>
                                    <option>Dark</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col mt-3">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- /.container-fluid -->

@endsection

@push('style')
@endpush

@push('script')
    <script>
        $(function() {

            $("select[name='color_scheme']").on("change",function(){
                switch ($(this).val()) {
                    case 'light':
                        $.App.deactivateDarkMode();
                        $.App.activateLightSidebarTheme();
                        break;
                    case 'dark':
                        $.App.activateDarkMode();
                        break;
                }
            });

        });
    </script>
@endpush

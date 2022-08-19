@extends('layouts.app')

@section('title',"Pengaturan Tema")

@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <form method="POST" action="{{ route('setting.theme.save') }}" enctype="multipart/form-data">
            @csrf
            <div class="card shadow mb-4 mt-3 px-3">
                <div class="card-body">
                    @foreach ($themeSettings as $eachSetting)
                        @if ($eachSetting->name == "color_scheme")
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="color_scheme">Color Scheme :</label>
                                        <select class="form-select" name="color_scheme">
                                            <option {{ $eachSetting->value == "light" ? "selected" : "" }} value="light">Light</option>
                                            <option {{ $eachSetting->value == "dark" ? "selected" : "" }} value="dark">Dark</option>
                                        </select>
                                    </div>
                                </div>
                            </div> 
                        @else
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="color_scheme">Sidebar :</label>
                                        <select class="form-select" name="sidebar">
                                            <option {{ $eachSetting->value == "light" ? "selected" : "" }} value="light">Light</option>
                                            <option {{ $eachSetting->value == "dark" ? "selected" : "" }} value="dark">Dark</option>
                                        </select>
                                    </div>
                                </div>
                            </div> 
                        @endif
                    @endforeach
                 

                    <div class="row">
                        <div class="col mt-3">
                            <button type="submit" class="btn btn-primary">
                                Simpan  
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
            @if ($themeSettings->count() > 0 )
                $("select[name='color_scheme']").on("change",function(){
                    switch ($(this).val()) {
                        case 'light':
                            $.App.deactivateDarkMode();
                            break;
                        case 'dark':
                            $.App.activateDarkMode();
                            break;
                    }
                });
                
                $("select[name='sidebar']").on("change",function(){
                    switch ($(this).val()) {
                        case 'light':
                            $.App.activateLightSidebarTheme();
                            break;
                        case 'dark':
                            $.App.activateDarkSidebarTheme();
                            break;
                    }
                });
            @endif
        });
    </script>
@endpush

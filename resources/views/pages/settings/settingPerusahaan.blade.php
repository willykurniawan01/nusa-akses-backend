@extends('layouts.app')

@section('title')
    

@section('content')
    <div class="container-fluid">

        <div class="row mb-3">
            <div class="col">
                <a href="{{ route('settings.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>

        </div>

          <!-- DataTales Example -->
        <form method="POST" action="{{ route("settings.save-setting") }}">
            @csrf
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengaturan Perusahaan</h6>
            </div>
            <div class="card-body">
                
                <div class="row">
                    @foreach ($setting as $eachSetting )
                        @if ($eachSetting->is_textarea != 1)
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="{{ $eachSetting->name }}">{{ $eachSetting->title }} :</label>
                                    <input name="{{ $eachSetting->name }}" id="{{ $eachSetting->name }}" type="text" value="{{ $eachSetting->value }}"
                                        class="form-control @error('{{ $eachSetting->name }}') is-invalid @enderror">

                                    @error('{{ $eachSetting->name }}')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>   
                        @else
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="{{ $eachSetting->name }}">{{ $eachSetting->title }} :</label>
                                    <textarea class="form-control" name="{{ $eachSetting->name }}" id="{{ $eachSetting->name }}">{{ $eachSetting->value }}</textarea>
                                    @error('{{ $eachSetting->name }}')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endif
                            
                    @endforeach
                </div>

                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>

    <script>
        class="form-control"

        $(function() {

        });
    </script>
@endpush

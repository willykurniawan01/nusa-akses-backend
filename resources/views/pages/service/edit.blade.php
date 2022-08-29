@extends('layouts.app')

@section('title')

@section('content')
    <div class="container-fluid">

        <div class="row mb-3">
            <div class="col">
                <a href="{{ route('service.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>

        </div>

        <!-- DataTales Example -->
        <form method="POST" name="formUpdate" action="{{ route('service.update', $services->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Layanan</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Name :</label>
                                <input disabled name="name" id="name" type="text" value="{{ $services->name }}"
                                    class="form-control @error('name') is-invalid @enderror">

                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="picture">Picture :</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input disabled type="file" name="picture"
                                            class="custom-file-input  @error('picture') is-invalid @enderror" id="picture">
                                        <label class="custom-file-label" for="picture">Choose file</label>
                                    </div>
                                </div>
                                @error('picture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="picture">Halaman :</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" disabled name="page_id" id="inputGroupSelect01">
                                      <option selected>Choose...</option>
                                      @foreach ($page as $eachPage)
                                        <option {{  $eachPage->id ==  $services->page_id ? 'selected' : '' }} value="{{ $eachPage->id }}">{{ $eachPage->name }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                @error('picture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <textarea readonly name="description" id="editor">{{ $services->description }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-end mt-3">
                            <button name="editButton" class="btn btn-success mr-2">
                                Edit
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- /.container-fluid -->

@endsection

@push('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>




    <script>
        $(function() {
            //variabel selector
            let editButton = $("button[name='editButton']")
            let formUpdate = $("form[name='formUpdate']")
            let ckEditor = '';
            let inputIsDisabled = true;
            //inisialisasi ckeditor
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    editor.isReadOnly = inputIsDisabled;
                    ckEditor = editor
                })
                .catch(error => {
                    console.error(error);
                });
            //event tombol edit di tekan
            editButton.on("click", function(event) {
                // set event ke default aga tidak refresh halaman
                event.preventDefault();
                if (!inputIsDisabled) {
                    let allInputInForm = formUpdate.find('input');
                    let allSelectInForm = formUpdate.find('select');
                    allInputInForm.prop('disabled', true);
                    allSelectInForm.prop('disabled', true);
                    ckEditor.isReadOnly = true;
                    inputIsDisabled = true;
                } else {
                    let allInputInForm = formUpdate.find('input');
                    let allSelectInForm = formUpdate.find('select');
                    allInputInForm.removeAttr('disabled');
                    allSelectInForm.removeAttr('disabled');
                    ckEditor.isReadOnly = false;
                    inputIsDisabled = false;
                }
            });
        });
    </script>
@endpush
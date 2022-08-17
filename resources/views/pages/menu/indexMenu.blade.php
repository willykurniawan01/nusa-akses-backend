@extends('layouts.app')

@section('title', 'Nusa Akses | Berita')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col">
                <button  data-toggle="modal" data-target="#addModal" class="btn btn-sm btn-primary"><i class="bi bi-plus-square"></i></i> Menu</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="card text-dark bg-white mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Home</h5>
                      <button class="btn btn-success">
                          Edit
                      </button>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->


    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addModalLabel">Tambah Menu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                      <label for="name" class="col-form-label">Nama:</label>
                      <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-form-label">Arahkan ke halaman:</label>
                        <select name="
                        " id="" class="custom-select">
                            <option value="">Pilih Halaman</option>
                        </select>
                      </div>
                      <div class="row">
                        <div class="col d-flex justify-content-between">
                          <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="hasSubMenu" name="hasSubMenu">
                                <label class="custom-control-label" for="hasSubMenu">Sub Menu</label>
                            </div>
                          </div>
                          <button id="addSubMenuButton" type="button" class="btn btn-link">
                            <i class="bi bi-plus-square"></i> Tambah Sub Menu
                          </button>
                        </div>
                      </div>
                    <div id="subMenus">
                      <div id="subMenu" class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Sub Menu" >
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <select name="
                          " id="" class="custom-select">
                              <option value="">Pilih Halaman</option>
                          </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
    </div>
@endsection


@push('style')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        .btn-link:hover{
          text-decoration: none
        }
    </style>
@endpush

@push('script')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      $(function(){
          let subMenuToggle = $("input#hasSubMenu");
          let addSubMenuButton = $("button#addSubMenuButton");
          let subMenus = $("div#subMenus");
          console.log(addSubMenuButton);

          subMenuToggle.on("change",function(){
            if($(this).is(':checked')){
              addSubMenuButton.removeClass("d-none")
              subMenus.removeClass("d-none")
            }else{
              addSubMenuButton.addClass("d-none");
              subMenus.addClass("d-none");
            }
          }); 
      });
    </script>

@endpush

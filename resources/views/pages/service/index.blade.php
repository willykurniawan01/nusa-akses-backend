@extends('layouts.app')

@section('title', 'Layanan')

@section('content')
    <div class="container-fluid">    
        <div class="row mb-3 mt-3">
            <div class="col">
                <a href="{{ URL::previous() }}" class="btn btn-success">
                    <i class="uil-arrow-left"></i>
                </a>
            </div>
        </div>
        
        <div class="card shadow mt-3">
            <div class="card-body">
                <a href="{{ route('service.create') }}" class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Layanan</a>

                <div class="table-responsive">
                    <table name="servicesTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->



    <!-- confirm delete Modal-->
    <form name="deleteServicesForm" action="{{ route('service.destroy') }}" enctype="multipart/form-data">
        @csrf
        @method('delete')
        <input type="hidden" name="id">
        <div class="modal fade" name="deleteModal" id="deleteModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah Kamu yakin?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">Klik tombol ok akan menghapus services</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


@push('style')
    <link href="{{ asset("assets/css/vendor/dataTables.bootstrap5.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("assets/css/vendor/responsive.bootstrap5.css") }}" rel="stylesheet" type="text/css" />
@endpush

@push('script')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(function() {
            let servicesTable = $("table[name='servicesTable']");
            let deleteButton = $("button[name='deleteButton']");
            let deleteModal = $("div[name='deleteModal']");
            let deleteServicesForm = $("form[name='deleteServicesForm']");
            let categoryInput = $("input[name='services_category']")
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            let servicesList = servicesTable.DataTable({
                searching: true,
                autoWidth: false,
                processing: true,
                serverSide: true,
                pageLength: 10,
                ajax: {
                    type: "GET",
                    url: "{{ route('service.get.get-all-services') }}",
                    // dataSrc: ''
                },
                columns: [{
                        data: 'name',
                        name: 'name',
                        defaultContent: '-'
                    },
                    {
                        data: 'picture',
                        name: 'picture',
                        defaultContent: '-',
                        render:function(data,type,row){
                            return `
                                <img src="{{ Storage::url('') }}/${data}" class="img-thumbnail" width="100" height="100" alt="...">
                            `
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                                    <button name="delete-button" data-bs-target="#deleteModal" data-bs-toggle="modal" type="button" data-id="${row.id}" class="btn btn-circle btn-danger mr-2">
                                        <i class=" uil-trash-alt
"></i>
                                    </button>
                                    <a href="{{ route('service.edit', ['']) }}/${row.id}" name="delete-button" type="button" data-id="${row.id}" class="btn btn-circle btn-info"><i class="uil-eye
"></i></i></a>
                                `
                        }
                    },
                ]
            })
            deleteModal.on("shown.bs.modal", function(event) {
                //ambil button yang men trigger modal
                let button = $(event.relatedTarget);
                //ambil atribut id
                let id = button.data('id');
                deleteServicesForm.find("input[name='id']").val(id);
            })
            //event submit form delete
            deleteServicesForm.on("submit", function(event) {
                event.preventDefault();
                let form = $(this);
                let url = form.attr('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),
                    success: function(res) {
                        deleteModal.modal('hide');
                        servicesList.ajax.reload();
                        Toast.fire({
                            icon: 'success',
                            title: 'Berhasil menghapus data!'
                        })
                    }
                })
            })
        })
    </script>
@endpush
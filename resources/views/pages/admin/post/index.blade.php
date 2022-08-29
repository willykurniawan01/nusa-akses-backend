@extends('layouts.app')

@section('title', 'Berita')

@section('content')
    <div class="container-fluid">
        
     
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-5">
                                <a href="{{ route('post.create') }}" class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Berita</a>
                            </div>
                        </div>
        
                        <div class="table-responsive">
                            <table name="postTable" class="table table-centered w-100 dt-responsive nowrap" id="dataTable">
                                <thead class="table-light">
                                    <tr>
                                        <th class="all">Berita</th>
                                        <th>Tanggal</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
        
            </div>
        </div>
       
    </div>
    <!-- /.container-fluid -->


     <!-- confirm delete Modal-->
     <form name="deletePostForm" action="{{ route('post.destroy') }}" enctype="multipart/form-data">
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
                    <div class="modal-body">Klik tombol ok akan menghapus Berita</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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
            let postTable = $("table[name='postTable']");
            let deleteButton = $("button[name='deleteButton']");
            let deleteModal = $("div[name='deleteModal']");
            let deletePostForm = $("form[name='deletePostForm']");
            let categoryInput = $("input[name='post_category']");

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
            });

            let postList = postTable.DataTable({
                searching: true,
                autoWidth: false,
                processing: true,
                serverSide: true,
                pageLength: 10,
                ajax: {
                    type: "GET",
                    url: "{{ route('post.get.get-all-post') }}",
                    // dataSrc: ''
                },
                columns: [{
                        data: 'judul',
                        name: 'judul',
                        defaultContent: '-',
                        render:function(data,type,row){
                            return `
                            <img src="{{ Storage::url('') }}/${row.picture}" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />
                            <p class="m-0 d-inline-block align-middle font-16">
                                <a href="apps-ecommerce-products-details.html" class="text-body">${data}</a>
                                <br/>
                            </p>
                            `
                        }
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        defaultContent: '-'

                    },
                    {
                        data: 'slug',
                        name: 'slug',
                        defaultContent: '-'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                                    <button name="delete-button" data-bs-target="#deleteModal" data-bs-toggle="modal" type="button" data-id="${row.id}" class="btn btn-circle btn-danger mr-2"><i class=" uil-trash-alt
"></i></button>
                                    <a href="{{ route('post.show', ['']) }}/${row.id}" name="delete-button" type="button" data-id="${row.id}" class="btn btn-circle btn-info"><i class="uil-eye
"></i></a>
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
                deletePostForm.find("input[name='id']").val(id);
            })



            //event submit form delete
            deletePostForm.on("submit", function(event) {
                event.preventDefault();

                let form = $(this);
                let url = form.attr('action');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),
                    success: function(res) {
                        deleteModal.modal('hide');
                        postList.ajax.reload();

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

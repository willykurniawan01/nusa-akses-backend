@extends('layouts.app')

@section('title', 'Berita')

@section('content')
    <div class="container-fluid">
        
        <!-- end page title -->
        <div class="row mb-2 mt-2">
            <div class="col-8">
                <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary">  <i class="uil-plus-circle
                    "></i>
                    Berita</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <form action="">
                    </form>
                </div>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Berita</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table name="postTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Slug</th>
                                <th>Picture</th>
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
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Klik tombol ok akan menghapus postingan</div>
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
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
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
            let categoryInput = $("input[name='post_category']")


            //call function load
            loadPostCategory();


            function loadPostCategory(){
                $.ajax({
                    type : 'GET',
                    url: "{{ route('post.get.get-post-category') }}",
                    success:function(res){
                        res.forEach(data => {
                            categoryInput.tagsinput('add', { "value": 1 , "text": "jQuery"});
                        });
                    },
                    error:function(res){
                        console.log(res)
                    }
                })
            }




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
                        defaultContent: '-'
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
                                    <button name="delete-button" data-target="#deleteModal" data-toggle="modal" type="button" data-id="${row.id}" class="btn btn-circle btn-danger mr-2"><i class=" uil-trash-alt
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

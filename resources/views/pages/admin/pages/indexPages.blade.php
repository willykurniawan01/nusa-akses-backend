@extends('layouts.app')

@section('title', 'Halaman')

@section('content')
    <div class="container-fluid">

        <div class="row mt-3 mb-3">
            <div class="col-8">
                <a href="{{ route('pages.create') }}" class="btn btn-sm btn-primary"><i class="mdi mdi-plus-circle"></i> Buat
                    Halaman</a>
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
                <h4 class="m-0 font-weight-bold text-primary">Halaman</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table name="servicesTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Halaman</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pages as $eachPage)
                            <tr>
                                <td>{{ $eachPage->name }}</td>
                                <td>
                                    <form method="POST" action="{{ route("pages.destroy",$eachPage->id) }}">
                                        @csrf
                                        @method("delete")
                                        <a href="{{ route("pages.edit",$eachPage->id) }}" class="btn btn-success">
                                            <i class="uil-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger">
                                            <i class="uil-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="2">Data kosong.</td>
                                </tr>
                            @endforelse 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <!-- confirm delete Modal-->
    {{-- <form name="deleteServicesForm" action="{{ route('services.destroy') }}" enctype="multipart/form-data">
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
                    <div class="modal-body">Klik tombol ok akan menghapus services</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </form> --}}
@endsection


@push('style')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('script')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

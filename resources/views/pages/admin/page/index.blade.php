@extends('layouts.app')

@section('title', 'Halaman')

@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mt-3">
            <div class="card-body">
                <a href="{{ route('page.create') }}" class="btn btn-success"><i class="mdi mdi-plus-circle"></i>
                    Halaman</a>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered" id="page-table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Halaman</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Home
                                </td> 
                                <td>
                                    <a href="{{ route("page.home") }}" class="btn btn-success">
                                        <i class="uil-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @foreach ($pages as $eachPage)
                            <tr>
                                <td>{{ $eachPage->name }}</td>
                                <td>
                                    <form method="POST" action="{{ route("page.destroy",$eachPage->id) }}">
                                        @csrf
                                        @method("delete")
                                        <a href="{{ route("page.edit",$eachPage->id) }}" class="btn btn-success">
                                            <i class="uil-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger">
                                            <i class="uil-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@push('style')
    <link href="{{ asset("assets/css/vendor/dataTables.bootstrap5.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("assets/css/vendor/responsive.bootstrap5.css") }}" rel="stylesheet" type="text/css" />
@endpush

@push('script')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $("#page-table").DataTable({});
    </script>
@endpush

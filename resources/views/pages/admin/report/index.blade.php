@extends('layouts.app')

@section('title', 'Laporan')

@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Laporan Kendala</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table name="servicesTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Customer</th>
                                <th>Kendala</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($report as $eachReport)
                                <td>{{ $eachReport->customer_name }}</td>
                                <td>{{ $eachReport->problem }}</td>
                                <td>{{ $eachReport->address }}</td>
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
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('script')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

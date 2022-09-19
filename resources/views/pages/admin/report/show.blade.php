@extends("layouts.app")

@section('title','Laporan Kendala')

@section('content')
    <div class="container-fluid">

        <div class="row mb-3 mt-3">
            <div class="col">
                <a href="{{ URL::previous() }}" class="btn btn-primary">
                    <i class="uil-arrow-left"></i>
                </a>
            </div>

        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Laporan Kendala</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Tanggal :</label>
                         <h4 class="text-success">{{ date("d/m/Y",strtotime($report->date))}}</h4>
                        </div>
                    </div>  
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Nama :</label>
                         <h4>{{ $report->customer_name }}</h4>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Problem :</label>
                         <h4>{{ $report->problem }}</h4>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Alamat :</label>
                         <h4>{{ $report->address }}</h4>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Deskripsi :</label>
                         <h4>{{ $report->description }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection
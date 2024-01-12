@extends('layout.v_template')

@section('content')

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3>{{ $usia }}</h3>

            <p>Usia</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="/usia" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h3>{{ $riwayat }}</h3>

            <p>Riwayat Keluarga</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-stalker"></i>
        </div>
        <a href="/riwayat" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner">
            <h3>{{ $pertanyaan }}</h3>

            <p>Pertanyaan</p>
        </div>
        <div class="icon">
            <i class="ion ion-chatbox-working"></i>
        </div>
        <a href="/pertanyaan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
        <div class="inner">
            <h3>{{ $kategori }}</h3>

            <p>Kategori</p>
        </div>
        <div class="icon">
            <i class="ion ion-pie-graph"></i>
        </div>
        <a href="/kategori" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

@endsection
@extends('layout.v_template')

@section('content')

<div class="col-md-12">
    @if(session('status'))
        <h5 class="alert alert-success">{{ session('status') }}</h5>
    @endif
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Artikel</h3>

            <div class="card-tools">
            </div>
            <!-- /.card-tools -->
        </div>
        <div class="card-body">
            <form action="{{ url('add-artikel') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="">Judul</label>
                    <input type="text" name="judul" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection

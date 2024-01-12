@extends('layout.v_template')

@section('content')
<div class="col-md-12">
    @if(session('status_delete'))
        <h5 class="alert alert-danger">{{ session('status_delete') }}</h5>
    @endif
    <div id="success_message"></div>
    <div class="card card-primary">
        <div class="card-header">
            <div class="card-tools">
                <a type="button" class="btn btn-tool" href="{{ url('add-artikel') }}"><i class="fas fa-plus"></i> Add Data
                </a>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="datatables" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1 @endphp
                    @foreach($artikel as $item)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->deskripsi, 750) }}</td>
                        <td>
                            <img src="{{ asset('gambar_artikel/'.$item->gambar) }}" width="70px" height="70px" alt="Image">
                        </td>
                        <td class="text-center">
                            <a href="{{ url('edit-artikel/'.$item->id) }}" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{ url('delete-artikel/'.$item->id) }}" class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

@endsection
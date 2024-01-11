@extends('layout.v_template')

@section('content')
<div class="col-md-12">
    <div id="success_message"></div>
    <div class="card card-primary">
        <div class="card-header">
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-data"><i class="fas fa-plus"></i> Add Data
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="datatables" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Pertanyaan</th>
                        <th>Pilihan</th>
                        <th>Skor</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- Modal Add Data -->
<div class="modal fade" id="add-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Pertanyaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <ul id="saveform_errList"></ul>

        <div class="form-group mb-3">
            <label for="">Pertanyaan</label>
            <input type="text" class="pertanyaan form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Pilihan</label>
            <input type="text" class="pilihan form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Skor</label>
            <input type="text" class="skor form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_data">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Data -->
<div class="modal fade" id="edit-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Pertanyaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <ul id="updateform_errList"></ul>

        <input type="hidden" id="edit_pertanyaan_id">
        <div class="form-group mb-3">
            <label for="">Pertanyaan</label>
            <input type="text" id="edit_pertanyaan" class="pertanyaan form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Pilihan</label>
            <input type="text" id="edit_pilihan" class="pilihan form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Skor</label>
            <input type="text" id="edit_skor" class="skor form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_data">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete Data -->
<div class="modal fade" id="delete-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Pertanyaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <input type="hidden" id="delete_pertanyaan_id">
        <h4>Are you sure? want to delete this data ?</h4>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger delete_data">Delete</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')

<script>
    $(document).ready(function () {

        fetchpertanyaan();

        function fetchpertanyaan()
        {
            $.ajax({
                type: "GET",
                url: "fetch-pertanyaan",
                dataType: "json",
                success: function (response) {
                    // console.log(response.riwayat);
                    $('tbody').html("");
                    var no = 1;
                    $.each(response.pertanyaan, function (key, item) { 
                         $('tbody').append(
                            `<tr>
                                <td class="text-center">${no++}</td>
                                <td class="text-center">${item.pertanyaan}</td>
                                <td class="text-center">${item.pilihan}</td>
                                <td class="text-center">${item.skor}</td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm btn-flat  edit_pertanyaan" value="${item.id}"><i class="fas fa-pencil-alt"></i></button>
                                    <button class="btn btn-danger btn-sm btn-flat  delete_pertanyaan" value="${item.id}"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>`
                         );
                    });
                }
            });
        }

        $(document).on('click', '.delete_pertanyaan', function (e) {
            e.preventDefault();
            var pertanyaan_id = $(this).val();
            // alert(usia_id);
            $('#delete_pertanyaan_id').val(pertanyaan_id);
            $('#delete-data').modal('show');
        });
        $(document).on('click', '.delete_data', function (e) {
            e.preventDefault();

            $(this).text("Deleting");
            var pertanyaan_id = $('#delete_pertanyaan_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-pertanyaan/"+pertanyaan_id,
                success: function (response) {
                    // console.log(response);
                    $('#success_message').addClass('alert alert-danger');
                    $('#success_message').text(response.message);
                    $('#delete-data').modal('hide');
                    $('.delete_data').text("Delete");
                    fetchpertanyaan();
                }
            });
        });

        $(document).on('click', '.edit_pertanyaan', function (e) {
            e.preventDefault();
            var pertanyaan_id = $(this).val();
            // console.log(usia_id);
            $('#edit-data').modal('show');
            $.ajax({
                type: "GET",
                url: "/edit-pertanyaan/"+pertanyaan_id,
                success: function (response) {
                    // console.log(response);
                    if(response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    } else {
                        $('#edit_pertanyaan').val(response.pertanyaan.pertanyaan);
                        $('#edit_pilihan').val(response.pertanyaan.pilihan);
                        $('#edit_skor').val(response.pertanyaan.skor);
                        $('#edit_pertanyaan_id').val(pertanyaan_id);
                    }
                }
            });
        });

        $(document).on('click', '.update_data', function (e) {
            e.preventDefault();

            $(this).text("Updating");

            var pertanyaan_id = $('#edit_pertanyaan_id').val();
            var data = {
                'pertanyaan' : $('#edit_pertanyaan').val(),
                'pilihan' : $('#edit_pilihan').val(),
                'skor' : $('#edit_skor').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "update-pertanyaan/"+pertanyaan_id,
                data: data,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if(response.status == 400) {
                        $('#updateform_errList').html("");
                        $('#updateform_errList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_values) { 
                            $('#updateform_errList').append('<li>'+err_values+'</li>');
                        });
                        $('.update_data').text("Update");

                    }else if(response.status == 404) {
                        $('#updateform_errList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.update_data').text("Update");

                    } else {
                        $('#updateform_errList').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);

                        $('#edit-data').modal('hide');
                        $('.update_data').text("Update");
                        fetchpertanyaan();
                    }
                }
            });
        });

        $(document).on('click', '.add_data', function (e) {
            e.preventDefault();
            var data = {
                'pertanyaan': $('.pertanyaan').val(),
                'pilihan': $('.pilihan').val(),
                'skor': $('.skor').val(),
            }
            // console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/pertanyaan",
                data: data,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if(response.status == 400)
                    {
                        $('#saveform_errList').html("");
                        $('#saveform_errList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_values) { 
                            $('#saveform_errList').append('<li>'+err_values+'</li>');
                        });
                    }
                    else
                    {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#add-data').modal('hide');
                        $('#add-data').find('input').val("");
                        fetchpertanyaan();
                    }
                }
            });
        });

    });
</script>

@endsection
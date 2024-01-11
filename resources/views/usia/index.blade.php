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
                        <th>Usia</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Usia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <ul id="saveform_errList"></ul>

        <div class="form-group mb-3">
            <label for="">Usia</label>
            <input type="text" class="usia form-control">
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Usia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <ul id="updateform_errList"></ul>

        <input type="hidden" id="edit_usia_id">
        <div class="form-group mb-3">
            <label for="">Usia</label>
            <input type="text" id="edit_usia" class="usia form-control">
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
        <h5 class="modal-title" id="exampleModalLabel">Delete Usia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <input type="hidden" id="delete_usia_id">
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

        fetchusia();

        function fetchusia()
        {
            $.ajax({
                type: "GET",
                url: "fetch-usia",
                dataType: "json",
                success: function (response) {
                    // console.log(response.usia);
                    $('tbody').html("");
                    var no = 1;
                    $.each(response.usia, function (key, item) { 
                         $('tbody').append(
                            `<tr>
                                <td class="text-center">${no++}</td>
                                <td class="text-center">${item.usia}</td>
                                <td class="text-center">${item.skor}</td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm btn-flat  edit_usia" value="${item.id}"><i class="fas fa-pencil-alt"></i></button>
                                    <button class="btn btn-danger btn-sm btn-flat  delete_usia" value="${item.id}"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>`
                         );
                    });
                }
            });
        }

        $(document).on('click', '.delete_usia', function (e) {
            e.preventDefault();
            var usia_id = $(this).val();
            // alert(usia_id);
            $('#delete_usia_id').val(usia_id);
            $('#delete-data').modal('show');
        });
        $(document).on('click', '.delete_data', function (e) {
            e.preventDefault();

            $(this).text("Deleting");
            var usia_id = $('#delete_usia_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-usia/"+usia_id,
                success: function (response) {
                    // console.log(response);
                    $('#success_message').addClass('alert alert-danger');
                    $('#success_message').text(response.message);
                    $('#delete-data').modal('hide');
                    $('.delete_data').text("Delete");
                    fetchusia();
                }
            });
        });

        $(document).on('click', '.edit_usia', function (e) {
            e.preventDefault();
            var usia_id = $(this).val();
            // console.log(usia_id);
            $('#edit-data').modal('show');
            $.ajax({
                type: "GET",
                url: "/edit-usia/"+usia_id,
                success: function (response) {
                    // console.log(response);
                    if(response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    } else {
                        $('#edit_usia').val(response.usia.usia);
                        $('#edit_skor').val(response.usia.skor);
                        $('#edit_usia_id').val(usia_id);
                    }
                }
            });
        });

        $(document).on('click', '.update_data', function (e) {
            e.preventDefault();

            $(this).text("Updating");

            var usia_id = $('#edit_usia_id').val();
            var data = {
                'usia' : $('#edit_usia').val(),
                'skor' : $('#edit_skor').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "update-usia/"+usia_id,
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
                        fetchusia();
                    }
                }
            });
        });




        $(document).on('click', '.add_data', function (e) {
            e.preventDefault();
            var data = {
                'usia': $('.usia').val(),
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
                url: "/usia",
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
                        fetchusia();
                    }
                }
            });
        });
    });
</script>

@endsection
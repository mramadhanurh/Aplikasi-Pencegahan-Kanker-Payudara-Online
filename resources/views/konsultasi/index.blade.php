@extends('layout.v_template')

@section('content')
<div class="col-md-12">
    <div id="success_message"></div>
    <div class="card card-primary">
        
        <!-- /.card-header -->
        <div class="card-body">
            <table id="datatables" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>Tanggal</th>
                        <th>Nilai Resiko</th>
                        <th>Nilai Analisa</th>
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


@endsection

@section('scripts')

<script>
    $(document).ready(function () {

        fetchkonsultasi();

        function fetchkonsultasi()
        {
            $.ajax({
                type: "GET",
                url: "fetch-konsultasi",
                dataType: "json",
                success: function (response) {
                    // console.log(response.usia);
                    $('tbody').html("");
                    $.each(response.result, function (key, item) { 
                         $('tbody').append(
                            `<tr>
                                <td class="text-center">${item.tanggal}</td>
                                <td class="text-center">${item.resiko}</td>
                                <td class="text-center">${item.analisa}</td>
                                
                            </tr>`
                         );
                    });
                }
            });
        }

        
    });
</script>

@endsection
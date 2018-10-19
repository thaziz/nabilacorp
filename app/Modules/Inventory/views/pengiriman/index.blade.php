@extends('main')
@section('content')
            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
                        <div class="page-title">Pengiriman Barang Hasil Produksi</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li><i></i>&nbsp;Inventory&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Pengiriman Barang Hasil Produksi</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <div class="page-content fadeInRight">
                    <div id="tab-general">
                        <div class="row mbl">
                            <div class="col-lg-12">

                                            <div class="col-md-12">
                                                <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                                                </div>
                                            </div>

                            <ul id="generalTab" class="nav nav-tabs">
                              <li class="active"><a href="#alert-tab" data-toggle="tab">Pengiriman Barang Hasil Produksi</a></li>
                            <!-- <li><a href="#note-tab" data-toggle="tab">2</a></li>
                            <li><a href="#label-badge-tab-tab" data-toggle="tab">3</a></li> -->
                        </ul>
                         <div id="generalTabContent" class="tab-content responsive">

                           <button type="button" onclick="tambah()" class="btn btn-primary pull-right" name="button"> <i class="fa fa-plus"></i> Tambah</button>
                            <br>
                            <br>
                            <br>
                                          <div class="table-responsive">
                                            <table class="table tabelan table-hover table-bordered" id="data2">
                                              <thead>
                                                <tr>
                                                  <th width="5%">No</th>
                                                  <th>No Pengiriman</th>
                                                  <th>Tanggal Transfer</th>
                                                  <th>Keterangan</th>
                                                  <th>Status</th>
                                                  <th width="15%">Aksi</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                @foreach ($data as $key => $value)
                                                  <tr>
                                                    <td>{{$key + 1}}</td>
                                                    <td>{{$value->p_code}}</td>
                                                    <td>{{Carbon\Carbon::parse($value->p_tanggal_transfer)->format('d-m-Y')}}</td>
                                                    <td>{{$value->p_keterangan}}</td>
                                                    @if ($value->pd_status_diterima == 'N')
                                                      <td align="center"> <span class="label label-warning">Belum Diterima</span> </td>
                                                      <td align="center">
                                                        <button type="button" onclick="edit({{$value->p_id}})" class="btn btn-warning btn-sm" title="Edit" name="button"> <i class="fa fa-edit"></i> </button>
                                                        <button type="button" onclick="hapus({{$value->p_id}})" class="btn btn-danger btn-sm" title="Hapus" name="button"> <i class="glyphicon glyphicon-trash"></i> </button>
                                                      </td>
                                                    @elseif ($value->pd_status_diterima == 'Y')
                                                      <td align="center"> <span class="label label-success">Sudah Diterima</span> </td>
                                                      <td align="center">
                                                        <button type="button" onclick="edit({{$value->p_id}})" class="btn btn-warning btn-sm" disabled title="Edit" name="button"> <i class="fa fa-edit"></i> </button>
                                                        <button type="button" onclick="hapus({{$value->p_id}})" class="btn btn-danger btn-sm" disabled title="Hapus" name="button"> <i class="glyphicon glyphicon-trash"></i> </button>
                                                      </td>
                                                    @endif
                                                  </tr>
                                                @endforeach
                                              </tbody>
                                            </table>
                                          </form>
                                          </div>

                                        </div>

                                      </div>
                                    </div>
                                     <!-- End div #alert-tab  -->

                                     <!-- Large modal -->

@endsection
@section("extra_scripts")
    <script type="text/javascript">
     $(document).ready(function() {
       var data;
       $('.select2').select2();
       $( "#tanggaltransfer" ).datepicker();

    var extensions = {
         "sFilterInput": "form-control input-sm",
        "sLengthSelect": "form-control input-sm"
    }
    // Used when bJQueryUI is false
    $.extend($.fn.dataTableExt.oStdClasses, extensions);
    // Used when bJQueryUI is true
    $.extend($.fn.dataTableExt.oJUIClasses, extensions);
    $('#data').dataTable({
          "responsive":true,

          "pageLength": 10,
        "lengthMenu": [[10, 20, 50, - 1], [10, 20, 50, "All"]],
        "language": {
            "searchPlaceholder": "Cari Data",
            "emptyTable": "Tidak ada data",
            "sInfo": "Menampilkan _START_ - _END_ Dari _TOTAL_ Data",
            "sSearch": '<i class="fa fa-search"></i>',
            "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
            "infoEmpty": "",
            "paginate": {
                    "previous": "Sebelumnya",
                    "next": "Selanjutnya",
                 }
          }

        });
    $('#data2').dataTable({
          "responsive":true,

          "pageLength": 10,
        "lengthMenu": [[10, 20, 50, - 1], [10, 20, 50, "All"]],
        "language": {
            "searchPlaceholder": "Cari Data",
            "emptyTable": "Tidak ada data",
            "sInfo": "Menampilkan _START_ - _END_ Dari _TOTAL_ Data",
            "sSearch": '<i class="fa fa-search"></i>',
            "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
            "infoEmpty": "",
            "paginate": {
                    "previous": "Sebelumnya",
                    "next": "Selanjutnya",
                 }
          }

        });
    $('#data3').dataTable({
          "responsive":true,

          "pageLength": 10,
        "lengthMenu": [[10, 20, 50, - 1], [10, 20, 50, "All"]],
        "language": {
            "searchPlaceholder": "Cari Data",
            "emptyTable": "Tidak ada data",
            "sInfo": "Menampilkan _START_ - _END_ Dari _TOTAL_ Data",
            "sSearch": '<i class="fa fa-search"></i>',
            "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
            "infoEmpty": "",
            "paginate": {
                    "previous": "Sebelumnya",
                    "next": "Selanjutnya",
                 }
          }

        });
});
      $('.datepicker').datepicker({
        format: "mm",
        viewMode: "months",
        minViewMode: "months"
      });
      $('.datepicker2').datepicker({
        format:"dd-mm-yyyy",
        autoclose:true,
        endDate:"today"
      });

      function getdata(){
        swal({
              title: 'Loading!',
              showCancelButton: false,
              showConfirmButton: false
            });
          var id = $('#cariId').val();
          var html = '';
          $.ajax({
            type: 'get',
            data: {id:id},
            dataType: 'json',
            url: baseUrl + '/inventory/pengirimanproduksi/getdata',
            success : function(result){
              data = result;
              for (var i = 0; i < result.length; i++) {
                var sisa = parseInt(result[i].prdt_qty) - parseInt(result[i].prdt_kirim);
                if (sisa == 0) {
                  var status = '<span class="label label-success">Terkirim</span>';
                } else if (sisa != 0) {
                  var status = '<span class="label label-warning">Belum Terkirim</span>';
                }
                html += '<tr>'+
                        '<td>'+(i + 1)+'</td>'+
                        '<td>'+result[i].pr_code+'</td>'+
                        '<td>'+result[i].i_name+'</td>'+
                        '<td align="right">'+accounting.formatMoney(result[i].prdt_qty, "", 0, ".", ",")+'</td>'+
                        '<td align="right">'+accounting.formatMoney(result[i].prdt_kirim, "", 0, ".", ",")+'</td>'+
                        '<td align="right">'+accounting.formatMoney(sisa, "", 0, ".", ",")+'</td>'+
                        '<td>'+status+'</td>'+
                        '<td><input type="text" id="kirim'+i+'" class="form-control number" onkeypress="return isNumberKey(event)" onkeydown="filter('+i+')" name="kirim[]"></td>'+
                        '<input type="hidden" name="item[]" value="'+result[i].prdt_item+'">'+
                        '</tr>';
              }
              $('#showdata').html(html);
              $('input[name=nota]').val(result[0].pr_code);
              swal.close();
            }
          });
      }

      function filter(id){
        var kirim = $('#kirim'+id).val();
            if (kirim > data[id].prdt_qty) {
              swal("Info!", "Tidak boleh melebihi qty!");
              $('#kirim'+id).val(0);
              i = data.length + 1;
            }
      }

      function simpan(){
        $.ajax({
          type: 'get',
          data: $('#formdata').serialize(),
          dataType: 'json',
          url: baseUrl + '/inventory/pengirimanproduksi/simpan',
          success : function(result){
            if (result.status == 'berhasil') {
              swal({
                    title: 'Berhasil!',
                    text: 'Berhasil Disimpan!'
                  });
            }
          }
        });
      }

      function isNumberKey(evt)
          {
             var charCode = (evt.which) ? evt.which : event.keyCode
             if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

             return true;
          }

          function tambah(){
            window.location.href = baseUrl + '/inventory/pengirimanproduksi/tambah';
          }

          function hapus(id){
            swal({
                title: "Ingin menghapus data?",
                text: "Data tidak bisa dikembalikan!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: false
              },
              function(isConfirm){
                if (isConfirm) {
                  $.ajax({
                    type: 'get',
                    data: {id:id},
                    dataType: 'json',
                    url: baseUrl + '/inventory/pengirimanproduksi/hapus',
                    success : function(result){
                      if (result.status == 'berhasil') {
                        swal("Deleted!", "Berhasil dihapus.", "success");
                      }
                    }
                  });        // submitting the form when user press yes
                } else {
                  swal.close();
                }
              });
          }

          function edit(id){
            window.location.href = baseUrl + '/inventory/pengirimanproduksi/edit?id='+id;
          }

      </script>
@endsection

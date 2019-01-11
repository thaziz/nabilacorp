@extends('main') 
@section('content')
  <!--BEGIN PAGE WRAPPER-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style type="text/css">
  .ui-autocomplete { z-index:2147483647; }
</style>
  <div id="page-wrapper">
      <!--BEGIN TITLE & BREADCRUMB PAGE-->
      <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
          <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
              <div class="page-title">Rencana Produksi</div>
          </div>
          <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
              <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
              <li><i></i>&nbsp;Produksi&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
              <li class="active">Rencana Produksi</li>
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
                      <li class="active"><a href="#alert-tab" data-toggle="tab">Rencana Produksi</a></li>
                    </ul>
                    <div id="generalTabContent" class="tab-content responsive">
                          
                      <div id="alert-tab" class="tab-pane fade in active">
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-xs-12">   

                            <div class="col-md-8 col-sm-12 col-xs-12" style="padding-bottom: 10px;">
                                <div style="margin-left:-30px;">
                                  <div class="col-md-3 col-sm-2 col-xs-12">
                                    <label class="tebal">Tanggal</label>
                                  </div>

                                  <div class="col-md-6 col-sm-7 col-xs-12">
                                    <div class="form-group" style="display: ">
                                      <div class="input-daterange input-group">
                                        <input id="tanggal1" class="form-control input-sm datepicker1 " name="tanggal" type="text">
                                        <span class="input-group-addon">-</span>
                                        <input id="tanggal2" class="input-sm form-control datepicker2" name="tanggal" type="text" value="{{ date('d-m-Y') }}">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                              </div>

                              <div align="right">
                                <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-box-tool" id="btn-tambah"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
                              </div>

                            <div class="table-responsive">
                              <table class="table tabelan table-hover table-bordered" width="100%" cellspacing="0" id="data">
                                <thead>
                                  <tr>
                                    <th>Tanggal</th>
                                    <th>Kode Item</th>
                                    <th>Nama Item</th>
                                    <th>Rencana Produksi</th>
                                    <th>Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                              </table> 
                            </div>  
                          </div>
                        </div>
                      </div>
                      
                      <!--Modal tambah rencana-->
                        
                      {!!$modalEdit!!}
                       <!--End Modal-->
                      
                  
                      
                    </div>

                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection
@section("extra_scripts")
<script src="{{ asset ('assets/script/icheck.min.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    console.log('tsr');
    var extensions = {
         "sFilterInput": "form-control input-sm",
        "sLengthSelect": "form-control input-sm"
    }
    // Used when bJQueryUI is false
  $.extend($.fn.dataTableExt.oStdClasses, extensions);
  // Used when bJQueryUI is true
  $.extend($.fn.dataTableExt.oJUIClasses, extensions);
  var myTable = $('#data').dataTable({

      "responsive":true,
      "pageLength": 10,
      "lengthMenu": [[10, 20, 50, - 1], [10, 20, 50, "All"]],
      "language": {
          "searchPlaceholder": "Cari Data",
          "emptyTable": "Tidak ada data",
          "sInfo": "Menampilkan _START_ - _END_ Dari _TOTAL_ Data",
          "infoFiltered" : "",
          "sSearch": '<i class="fa fa-search"></i>',
          "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
          "infoEmpty": "",
          "zeroRecords": "Data tidak ditemukan",
          "paginate": {
                  "previous": "Sebelumnya",
                  "next": "Selanjutnya",
              }
        },

      "ajax":{
            "url" : baseUrl + "/produksi/rencanaproduksi/tabel",
            "type": "GET",
            
      },
      "columns": [
          { "data": "pp_date" ,"className" : "dt-body-center"},
          { "data": "i_code" ,"className" : "dt-body-center"},
          { "data": "i_name" },
          { "data": "pp_qty" ,"className" : "dt-body-right"},
          { "data": "button" },
      ]

  });

  $.fn.dataTableExt.afnFiltering.push(
    function( settings, data, dataIndex ) {
      var tgl1 = $('#tanggal1').val().toString();
      var y = tgl1.slice(-4);
      var m = tgl1.slice(3,5);
      var d = tgl1.slice(0,2);
      var tgl2 = $('#tanggal2').val().toString();
      var y2 = tgl2.slice(-4);
      var m2 = tgl2.slice(3,5);
      var d2 = tgl2.slice(0,2);
      // var yt = data[0].slice(-4);
      // var mt = data[0].slice(3,5);
      // var dt = data[0].slice(0,2);
      if(y == '' || m == '' || d == ''){
        var min = NaN;
      }else{
        var min = new Date(y,m-1,d);  
      }
      if(y2 == '' || m2 == '' || d2 == ''){
        var max = NaN;
      }else{
        var max = new Date(y2,m2-1,d2);
        max.setDate(max.getDate()+1);
      }
      
      var age = new Date(data[0].slice(0,10));
      console.log('min = '+min);
      console.log('max = '+max);
      console.log('curr = '+age);
      if ( ( isNaN( min ) && isNaN( max ) ) ||
           ( isNaN( min ) && age <= max ) ||
           ( min <= age   && isNaN( max ) ) ||
           ( min <= age   && age <= max ) )
      {
          return true;
      }
    
    return false;
  });

  $(document).on('click','#cariTanggal',function(){
    myTable.fnDraw();
  });  

  $(document).on('change','#tanggal1,#tanggal2',function(){
    myTable.fnDraw();
  });

  $(document).on('click','#refresh',function(){
    myTable.fnDraw();
  });


  $(document).on('click','#btn-tambah',function(){
      
      $("input[name='crud']").val('tambah');
      $("input[name='namaitem']").val('');
      $("input[name='pp_qty']").val('');
      $("input[name='namaitem']").prop('disabled', false);
  });

  $(document).on('click','.edit',function(){
      var pp_id = $(this).data('id'),
          i_name = $(this).data('name'),
          pp_qty = $(this).data('qty');
          iditem = $(this).data('iditem');
          
      $("input[name='namaitem']").val(i_name);
      $("input[name='pp_qty']").val(pp_qty);
      $("input[name='pp_id']").val(pp_id);
      $("#iditem").val(iditem);
      $("input[name='crud']").val('edit');
      $("input[name='namaitem']").prop('disabled',true);
  });

  $(document).on('click','.hapus',function(){
    var pp_id = $(this).data('id'),
              i_name = $(this).data('name'); 
    iziToast.show({
      color: 'red',
      title: 'Peringatan',
      message: 'Apakah anda yakin!',
      position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
      progressBarColor: 'rgb(0, 255, 184)',
      buttons: [
        [
          '<button>Ok</button>',
          function (instance, toast) {
            instance.hide({
              transitionOut: 'fadeOutUp'
            }, toast);   
          $.ajax({
              type: "get",
              url : baseUrl + "/produksi/rencanaproduksi/hapus_rencana/"+pp_id,
              dataType:"JSON",
              success: function(data, textStatus, jqXHR){
                if(data.result ==1){
                  var table = $('#data').DataTable();
                  table.ajax.reload( null, false );
                  iziToast.success({timeout: 5000, 
                        position: "topRight",
                        icon: 'fa fa-chrome', 
                        title: '', 
                        message: 'Rencana di hapus.'});
                }else{
                  iziToast.error({position: "topRight",
                        title: '', 
                        message: 'Rencana gagal di hapus.'});
                }
              }
          });  
        }
        ],
        [
          '<button>Close</button>',
           function (instance, toast) {
            instance.hide({
              transitionOut: 'fadeOutUp'
            }, toast);
          }
        ]
      ]
    }); 
  });

  $(document).on('click','#btn-simpan',function(){
    var a=$("input[name='namaitem']").val(),
        b=$("input[name='pp_qty']").val();

      if (a == '') {
          Command: toastr["warning"]("Kolom Nama Item tidak boleh kosong ", "Peringatan !")

          toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
          return false;
      } 
      if (b == '') {
          Command: toastr["warning"]("Kolom Jumlah Rencana Produksi tidak boleh kosong ", "Peringatan !")

          toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
          return false;
      } 
      $.ajax({
        url : baseUrl + "/produksi/rencanaproduksi/save",
          type: "get",
          dataType:"JSON",
          data : $('#myForm').serialize() ,
          success: function(data, textStatus, jqXHR){
            if(data.crud == 'tambah'){
              if(data.result == 1){
                      var table = $('#data').DataTable();
                      table.ajax.reload( null, false );
                      iziToast.success({timeout: 5000, 
                          position: "topRight",
                          icon: 'fa fa-chrome', 
                          title: '', 
                          message: 'Rencana di simpan.'});
                      $("#myModal").modal('hide');
                      $("#btn_add").focus();
              }else{
                      alert("Gagal menyimpan data!");
              }
            }
            else if(data.crud == 'edit'){
              if(data.result == 1){
                      //$.notify('Successfull update data');
                      var table = $('#data').DataTable();
                      table.ajax.reload( null, false );
                      iziToast.success({timeout: 5000, 
                          position: "topRight",
                          icon: 'fa fa-chrome', 
                          title: '', 
                          message: 'Rencana di simpan.'});
                      $("#myModal").modal('hide');
                      $("#btn_add").focus();
              }else{
                alert("Gagal menyimpan data!");
              }
            }else{
              //swal("Error","invalid order","error");
            }

          },
          error:function(x, e) {
            if (x.status == 0) {
              alert('ups !! gagal menghubungi server, harap cek kembali koneksi internet anda');
            } else if (x.status == 404) {
                alert('ups !! Halaman yang diminta tidak dapat ditampilkan.');
            } else if (x.status == 500) {
                alert("Item tidak ada. Harap Cek sekali lagi",'warning');
            } else if (e == 'parsererror') {
                alert('Error.\nParsing JSON Request failed.');
            } else if (e == 'timeout'){
                alert('Request Time out. Harap coba lagi nanti');
            } else {
                alert('Unknow Error.\n' + x.responseText);
            }
          }
      });
  });


  $( "#namaitem" ).focus(function(){
        var key = 1;  
    $( "#namaitem" ).autocomplete({
        source: baseUrl+'/produksi/rencanaproduksi/produksi/autocomplete',
        minLength: 1,
        select: function(event,ui) 
        {
          $("#namaitem").val(ui.item.value);
          $("#iditem").val(ui.item.i_id);
        }
    });
    $("#namaitem").val('');
    $("#iditem").val('');
  });

    $('#namaitem').keypress(function(e){
      var charCode;
      if ((e.which && e.which == 13)) {
        charCode = e.which;
      }else if (window.event) {
          e = window.event;
          charCode = e.keyCode;
      }
      if ((e.which && e.which == 13)){
        $("input[name='pp_qty']").focus();
        return false;
      }
    });
 
  var date = new Date();
  var newdate = new Date(date);

  newdate.setDate(newdate.getDate()-3);
  var nd = new Date(newdate);

    $('.datepicker').datepicker({
      format: "mm",
      viewMode: "months",
      minViewMode: "months"
    });
    $('.datepicker1').datepicker({
      autoclose: true,
      format:"dd-mm-yyyy",
      endDate: 'today'
    }).datepicker("setDate", nd);
    $('.datepicker2').datepicker({
      autoclose: true,
      format:"dd-mm-yyyy",
      endDate: 'today'
    });//.datepicker("setDate", "0"); 

});
  


</script>
@endsection()

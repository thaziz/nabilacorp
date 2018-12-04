@extends('main')
@section('content')
            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
                        <div class="page-title">Penerimaan Barang Suplier</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li><i></i>&nbsp;Inventory&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Penerimaan Barang Suplier</li>
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
                                {!! $modal !!}
                                <ul id="generalTab" class="nav nav-tabs">
                                  <li class="active"><a href="#alert-tab" data-toggle="tab">Penerimaan Barang Suplier</a></li>
                            <!-- <li><a href="#note-tab" data-toggle="tab">History Penerimaan Barang Suplier</a></li> -->
                            <!-- <li><a href="#label-badge-tab-tab" data-toggle="tab">3</a></li> -->
                                </ul>
                                <div id="generalTabContent" class="tab-content responsive">

                                  @include('inventory.p_suplier.modal')

                                    <div id="alert-tab" class="tab-pane fade in active">
                                      <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                          
                                          <div class="col-md-6 col-sm-12 col-xs-12" style="margin-bottom: 20px;">
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                              <label class="tebal">No Nota :</label>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                              <div class="input-group">
                                                <select class="form-control input-sm" id="cariId" name="CariId">
                                                  <option> - Pilih Nomor Nota</option>
                                                  @foreach ($data as $element)
                                                      <option value="{{ $element->po_id }}">{{ $element->po_id }} - {{ $element->po_code }}</option>
                                                  @endforeach
                                                </select>
                                                <span class="input-group-btn">
                                                  <a href="#" onclick="carisup()" class="btn btn-info btn-sm"><i class="fa fa-search" alt="search"></i></a>
                                                </span>
                                              </div>
                                            </div>

                                          </div>

                                          <div class="table-responsive">
                                            <table class="table tabelan table-hover table-bordered" id="data2">
                                              <thead>
                                                <tr>
                                                  <th width="5%">No</th>
                                                  <th>No PO</th>
                                                  <th>Suplier</th>
                                                  <th width="5%">Status</th>
                                                  <th width="10%">Aksi</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                               
                                              </tbody>
                                            </table>
                                          </div>

                                        </div>
                                        
                                      </div>
                                    </div>
                                     <!-- End div #alert-tab  -->

                                    <!-- div note-tab -->
                                   
                                    <!--/div note-tab -->

                                    <!-- div label-badge-tab -->
                                    <div id="label-badge-tab" class="tab-pane fade">
                                      <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                          <!-- Isi content -->we
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /div label-badge-tab -->                                   
                                
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>

@endsection
@section("extra_scripts")
    <script type="text/javascript">
     $(document).ready(function() {
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

      function carisup(argument) {
        var id = $('#cariId').val();
        $.ajax({
        url : baseUrl + "/inventory/penerimaan_suplier/suplier_cari/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data){

        $('#modalTerima').modal('show');
        console.log(data);
        var key = 1;
        var i = 1;
        
        $('#noNotaMasuk').val(data.header[0].po_code);

        Object.keys(data.gudang).forEach(function(){

          $('#comp').append(
            '<option value="'+data.gudang[i-1].gc_id+'">'+data.gudang[i-1].gc_gudang+'</option>'
            );
          $('#position').append(
            '<option value="'+data.gudang[i-1].gc_comp+'">'+data.gudang[i-1].gc_comp+'</option>'
            );
        i++;
        });

        Object.keys(data.detail).forEach(function(){
          $('.drop_here').append(
            "<tr>"+
            '<td style="text-align:center"><input type="hidden" name="item[]" value="'+data.detail[key-1].i_id+'" class="form-control">'+data.detail[key-1].i_name+'</td>'+
            '<td style="text-align:center"><input type="hidden" name="confirmqty[]" value="'+data.detail[key-1].podt_qtyconfirm+'" class="form-control">'+data.detail[key-1].podt_qtyconfirm+'</td>'+
            '<td style="text-align:center"><input type="text" name="terima[]" class="form-control"></td>'+
            "</tr>"
          );

        key++;
        });



          }
        });
      }

      function save_update(argument) {
      $.ajax({
        url : baseUrl + "/inventory/penerimaan_suplier/suplier_save",
        data:$('#update-terima-produk').serialize(),
        type: "GET",
        dataType: "JSON",
        success: function(data){

        }
      });
      }

      </script>
@endsection
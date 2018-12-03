@extends('main')
@section('content')
            <!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
            <div class="page-title">Rencana Pembelian</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><i></i>&nbsp;Purchasing&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Rencana Pembelian</li>
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
                  <li class="active"><a href="#alert-tab" data-toggle="tab">Daftar Rencana Pembelian</a></li>
                  {{-- <li hidden=""><a href="#note-tab" data-toggle="tab">History Rencana Pembelian</a></li> --}}
                           <!--  <li><a href="#label-badge-tab" data-toggle="tab">Belanja Harian</a></li> -->
              </ul>
        <div id="generalTabContent" class="tab-content responsive">
            
         {!!$daftar!!}
         {!!$history!!}

            

                                <!-- div note-tab -->
                                <div id="note-tab" class="tab-pane fade">
                                  <div class="row">
                                    <div class="panel-body">
                                      <!-- Isi Content -->
                                    </div>
                                  </div>
                                </div><!--/div note-tab -->


                                <!-- div label-badge-tab -->
                                <div id="label-badge-tab" class="tab-pane fade">
                                  <div class="row">
                                    <div class="panel-body">
                                      <!-- Isi content -->
                                    </div>
                                  </div>
                                </div><!-- /div label-badge-tab -->

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{!!$modalDetail!!}
{!!$modalEdit!!}
@endsection
@section("extra_scripts")
    <script type="text/javascript">
 $(document).ready(function() {
     $(".modal").on("hidden.bs.modal", function(){        
      $('tr').remove('.tbl_modal_detail_row');
      $('tr').remove('.tbl_modal_edit_row');      
      $("#txt_span_status").removeClass();
      $('#txt_span_status_edit').removeClass();
    });
  });


 resetData();
function resetData(){  
  date();
  table();
}
function cari(){  
  table();
}

function date(){
  var d = new Date();
    d.setDate(d.getDate()-7);
    $('#tanggal1').datepicker({
          format:"dd-mm-yyyy",        
          autoclose: true,
    }).datepicker( "setDate", d);
    $('#tanggal2').datepicker({
          format:"dd-mm-yyyy",        
          autoclose: true,
    }).datepicker( "setDate", new Date());
}

var tablex;
setTimeout(function () {
      table();
      }, 1500);



      </script>
@endsection()
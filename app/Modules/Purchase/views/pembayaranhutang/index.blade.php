@extends('main')
@section('content')
<!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper">
<!--BEGIN TITLE & BREADCRUMB PAGE-->
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
   <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
      <div class="page-title">Pembayaran Hutang</div>
   </div>
   <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
      <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
      <li><i></i>&nbsp;Penjualan&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
      <li class="active">Pembayaran Hutang</li>
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
         <li class="active"><a href="#alert-tab" data-toggle="tab">Pembayaran Hutang</a></li>
         <!-- <li><a href="#note-tab" data-toggle="tab">2</a></li>
            <li><a href="#label-badge-tab" data-toggle="tab">3</a></li> -->
      </ul>
      <div id="generalTabContent" class="tab-content responsive">
         <div id="alert-tab" class="tab-pane fade in active">
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="col-md-8 col-sm-12 col-xs-12" style="padding-bottom: 10px;display: flex">
                     <div style="display: flex">
                        <div class="">
                           <label style="padding-top: 7px; font-size: 15px; margin-right:3mm;">Periode</label>
                        </div>
                        <div class="">
                           <div class="form-group" style="display: ">
                              <div class="input-daterange input-group">
                                 <input id='tgl_awal' class="form-control input-sm" name="tgl_awal" type="text">
                                 <span class="input-group-addon">-</span>
                                 <input id="tgl_akhir" class="input-sm form-control" name="tgl_akhir" type="text">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="" align="center" style="margin-left: 1.5mm">
                        <button class="btn btn-warning btn-sm btn-flat" type="button" onclick='find_d_payable()'>
                        <strong>
                        <i class="fa fa-search" aria-hidden="true"></i>
                        </strong>
                        </button>
                        <button class="btn btn-danger btn-sm btn-flat" type="button" onclick='refresh_d_payable()'>
                        <strong>
                        <i class="fa fa-undo" aria-hidden="true"></i>
                        </strong>
                        </button>
                     </div>
                  </div>

                  <div class="col-md-4 col-sm-12 col-xs-12">
                    <button class="btn btn-success pull-right" onclick="print_laporan_pembayaran_hutang()">
                      <i class="fa fa-file-excel-o"></i>
                      Export to Excel
                    </button>
                  </div>
               </div>
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="table-responsive">
                     <table id="tabel_d_payable" class="table tabelan table-hover table-bordered" width="100%" cellspacing="0">
                        <thead>
                           <tr>
                              <th>Tanggal</th>
                              <th>Tanggal Jatuh Tempo</th>
                              <th>Kode</th>
                              <th>Jumlah Hutang</th>
                              <th>Jumlah Terbayar</th>
                              <th>Sisa</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <!-- /div alert-tab -->
         <!-- div note-tab -->
         <div id="note-tab" class="tab-pane fade">
            <div class="row">
               <div class="panel-body">
                  <!-- Isi Content -->
               </div>
            </div>
         </div>
         <!--/div note-tab -->
         <!-- div label-badge-tab -->
         <div id="label-badge-tab" class="tab-pane fade">
            <div class="row">
               <div class="panel-body">
                  <!-- Isi content -->we
               </div>
            </div>
         </div>
         <!-- /div label-badge-tab -->
      </div>
   </div>
</div>

@include('Purchase::pembayaranhutang/form_payment')
@include('Purchase::pembayaranhutang/form_detail')

@endsection
@section("extra_scripts")
@include('Purchase::pembayaranhutang/js/format_currency')
@include('Purchase::pembayaranhutang/js/functions')
@include('Purchase::pembayaranhutang/js/commander')
@endsection()
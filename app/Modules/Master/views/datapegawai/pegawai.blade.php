@extends('main')
@section('content')
<!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper">
<!--BEGIN TITLE & BREADCRUMB PAGE-->
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
   <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
      <div class="page-title">Master Data Pegawai</div>
   </div>
   <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
      <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
      <li><i></i>&nbsp;Master&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
      <li class="active">Master Data Pegawai</li>
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
      <li class="active"><a href="#alert-tab" data-toggle="tab">Master Data Pegawai</a></li>
      <!-- <li><a href="#note-tab" data-toggle="tab">2</a></li>
         <li><a href="#label-badge-tab-tab" data-toggle="tab">3</a></li> -->
   </ul>
   <div id="generalTabContent" class="tab-content responsive">
      <div id="alert-tab" class="tab-pane fade in active">
         <div class="row" style="margin-top:-20px;">
            <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 10px;">
               <a href="{{ url('master/datapegawai/tambah_pegawai') }}" ><button type="button" class="btn btn-box-tool" title="Tambahkan Data Item">
               <i class="fa fa-plus" aria-hidden="true">
               &nbsp;
               </i>Tambah Data
               </button></a>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="table-responsive">
                  <table class="table table-hover table-bordered" width="100%" cellspacing="0" id="tabel_m_pegawai">
                     <thead>
                        <tr>
                           <th class="wd-15p">ID</th>
                           <th class="wd-15p">NIK</th>
                           <th class="wd-15p">Nama Pegawai</th>
                           <th class="wd-15p">Alamat</th>
                           <th class="wd-15p">Status Karyawan</th>
                           <th class="wd-15p">Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section("extra_scripts")
  @include('Master::datapegawai/js/commander')
@endsection
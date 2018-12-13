@extends('main')
@section('content')
            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
                        <div class="page-title">Form Belanja Harian</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li><i></i>&nbsp;Purchasing&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Belanja Harian&nbsp;&nbsp;</li><i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Form Belanja Harian</li>
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
                            <li class="active"><a href="#alert-tab" data-toggle="tab">Form Belanja Harian</a></li>
                            <!-- <li><a href="#note-tab" data-toggle="tab">2</a></li>
                            <li><a href="#label-badge-tab" data-toggle="tab">3</a></li> -->
                          </ul>
                    <div id="generalTabContent" class="tab-content responsive" >
                      <!-- div alert-tab -->
                      <div id="alert-tab" class="tab-pane fade in active">
                      <div class="row">  
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          
                          <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: -10px;margin-bottom: 15px;">  
                           <div class="col-md-5 col-sm-6 col-xs-8" >
                             <h4>Form Belanja Harian</h4>
                           </div>
                           <div class="col-md-7 col-sm-6 col-xs-4" align="right" style="margin-top:5px;margin-right: -25px;">
                             <a href="{{ url('purchasing/belanjaharian/belanja') }}" class="btn"><i class="fa fa-arrow-left"></i></a>
                           </div>
                         </div>

                         <form id='form_d_purchasingharian'>
                              <div class="col-md-12 col-sm-12 col-xs-12 tamma-bg" style="margin-bottom: 20px; padding-top:30px;padding-bottom:20px;">
                               
                               
                              

                                 <div class="col-md-2 col-sm-3 col-xs-12">
                                  
                                      <label class="tebal">Tanggal Beli</label>
                                  
                                </div>

                                <div class="col-md-4 col-sm-9 col-xs-12">
                                  <div class="form-group">
                                    <div class="input-icon ">
                                      <i class="glyphicon glyphicon-calendar"></i>
                                        <input type="text" maxlength="10" readonly="" class="form-control input-sm" value="{{ date('d/m/Y') }}">
                                        <input type="hidden" name="d_pcsh_date" id="d_pcsh_date" value="{{ date('d/m/Y') }}">
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-2 col-sm-3 col-xs-12">
                                  
                                   
                                      <label class="tebal">No Nota</label>
                                  
                                </div>

                                <div class="col-md-4 col-sm-9 col-xs-12">
                                  <div class="form-group">
                                   
                                      <input type="text" readonly="" class="form-control input-sm">                
                                    
                                  </div>
                                </div>

                                <div class="col-md-2 col-sm-3 col-xs-12">
                                  
                                      <label class="tebal">Petugas Administrator</label>
                                  
                                </div>

                                <div class="col-md-4 col-sm-9 col-xs-12">
                                  <div class="form-group">
                                      <input type="text" readonly="" value="{{ Auth::user()->m_name }}" class="form-control input-sm" >
                                      <input type="hidden" value="{{ Auth::user()->m_id }}" name="d_pcsh_staff">
                                  </div>
                                </div>

                                <div class="col-md-2 col-sm-3 col-xs-12">
                                  
                                    <label class="tebal">Keperluan</label>
                                 
                                </div>

                                <div class="col-md-4 col-sm-9 col-xs-12">
                                  <div class="form-group">
                                   
                                      <input type="text" id="d_pcsh_keperluan" name="d_pcsh_keperluan" class="form-control input-sm" ">
                                    
                                  </div>
                                </div>

                                <div class="col-md-2 col-sm-3 col-xs-12">
                                  
                                      <label class="tebal">Total bayar</label>
                                  
                                </div>

                                <div class="col-md-4 col-sm-9 col-xs-12">
                                  <div class="form-group">
                                      <input type="text"  readonly id="total_bayar" class="form-control input-sm">
                                  </div>
                                </div>

                                <div class="col-md-2 col-sm-3 col-xs-12">
                                  
                                      <label class="tebal">Divisi Peminta</label>
                                  
                                </div>

                                <div class="col-md-4 col-sm-9 col-xs-12">
                                  <div class="form-group">
                                      <select name="d_pcsh_divisi" id="d_pcsh_divisi" class="form-control">
                                      @foreach ($m_divisi as $data)
                                          <option class="form-control"
                                                  value="{{ $data->d_id }}">
                                              {{ $data->d_divisi }}</option>
                                      @endforeach
                                      </select>
                                  </div>
                                </div>
                                
                                <div class="col-md-12 tamma-bg" style="margin-top: 5px;margin-bottom: 5px;margin-bottom: 20px; padding-bottom:20px;padding-top:20px;">
               <div class="col-md-6">
                  <label class="control-label tebal" for="">Masukan Kode / Nama</label>
                  <div class="input-group input-group-sm" style="width: 100%;">
                    <select id="d_pcshdt_item" class="form-control"></select>
                  </div>
               </div>
               
               <div class="col-md-6">
                  <label class="control-label tebal" name="qty";>Jumlah</label>
                  <div class="input-group input-group-sm" style="width: 100%;">
                     <input type="number" class="move up3 form-control input-sm alignAngka reset reset-seach" id="d_pcshdt_qty" onclick="" >   
                  </div>
               </div>
            </div>
                              </div>


                              <div class="table-responsive">
                                <table class="table tabelan table-bordered" id="tabel_d_purchasingharian_dt">
                                  <thead>
                                    <tr>
                                      <th width="25%">Nama Barang</th>
                                      <th>QTY</th>
                                      <th width="5%">Satuan</th>
                                      <th>Harga Satuan</th>
                                      <th>Total Harga</th>
                                      <th>Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                  </tbody>
                                </table>
                              </div>

                              <div align="right" style="margin-top:20px;">
                                <div class="form-group" align="right">
                                  <input type="button" name="tambah_data" value="Simpan Data" class="btn btn-primary" onclick="insert_d_purchasingharian()">
                                </div>
                              </div>

                            </form>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
@endsection
@section("extra_scripts")
    @include('Purchase::belanjaharian/js/format_currency')
    @include('Purchase::belanjaharian/js/form_functions')
    @include('Purchase::belanjaharian/js/form_commander')
@endsection()
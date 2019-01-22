@extends('main')

@section('title', 'Tambah Data Transaksi Memorial')

@section(modulSetting()['extraStyles'])

	<link rel="stylesheet" type="text/css" href="{{ asset('modul_keuangan/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('modul_keuangan/js/vendors/wait_me_v_1_1/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('modul_keuangan/js/vendors/toast/dist/jquery.toast.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('modul_keuangan/js/vendors/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('modul_keuangan/js/vendors/datepicker/dist/datepicker.min.css') }}">

@endsection


@section('content')
    <!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
            <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
                <div class="page-title">Input Transaksi Memorial</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">

                <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>

                <li><i></i>&nbsp;Keuangan&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>

                <li class="active">Input Transaksi Memorial</li>
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
                        <li class="active"><a href="#alert-tab" data-toggle="tab">Input Transaksi Memorial</a></li>
                      </ul>

                      <div id="generalTabContent" class="tab-content responsive">
                          <div id="alert-tab" class="tab-pane fade in active">
                            <div class="row" style="margin-top:20px;">

                              <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="table-responsive">
                                        <form id="data-form" v-cloak>
                                            <input type="hidden" readonly name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" readonly name="tr_id" v-model="singleData.tr_id">
                                            <div class="row">
                                                <div class="col-md-6" style="background: none;">

                                                    <div class="row mt-form">
                                                        <div class="col-md-3">
                                                            <label class="modul-keuangan">Nomor Transaksi</label>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <input type="text" name="tr_nomor" class="form-control modul-keuangan" placeholder="Di Isi Oleh Sistem" readonly v-model="singleData.tr_nomor">
                                                        </div>

                                                        <div class="col-md-1 form-info-icon link" @click="search" v-if="!onUpdate">
                                                            <i class="fa fa-search" title="Cari Group Berdasarkan Nomor dan Type Group"></i>
                                                        </div>

                                                        <div class="col-md-1 form-info-icon link" @click="formReset" v-if="onUpdate">
                                                            <i class="fa fa-times" title="Bersihkan Pencarian" style="color: #CC0000;"></i>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-form">
                                                        <div class="col-md-3">
                                                            <label class="modul-keuangan">Type Transaksi</label>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <vue-select :name="'tr_type'" :id="'tr_type'" :options="typeTransaksi" :disabled="onUpdate" @input="typeChange"></vue-select>
                                                        </div>

                                                        <div class="col-md-1 form-info-icon" title="Parameter Type Group Digunakan Untuk Pencarian Data">
                                                            <i class="fa fa-info-circle"></i>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-form">
                                                        <div class="col-md-3">
                                                            <label class="modul-keuangan">Tanggal Transaksi *</label>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <vue-datepicker :name="'tr_tanggal'" :id="'tr_tanggal'" :title="'Tidak Boleh Kosong'" :readonly="true" :placeholder="'Pilih Tanggal'" @input="dateChange"></vue-datepicker>
                                                        </div>

                                                        <div class="col-md-1 form-info-icon" title="Parameter Type Group Digunakan Untuk Pencarian Data">
                                                            <i class="fa fa-info-circle"></i>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-form" style="border-top: 1px solid #eee; padding-top: 20px;">
                                                        <div class="col-md-3">
                                                            <label class="modul-keuangan">Ket. Transaksi *</label>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <input type="text" name="tr_nama" class="form-control modul-keuangan" :placeholder="singleData.placholderNama" v-model="singleData.tr_nama" title="Tidak Boleh Kosong">
                                                        </div>
                                                    </div>

                                                    <div class="row mt-form">
                                                        <div class="col-md-3">
                                                            <label class="modul-keuangan">Pilih Akun Memorial</label>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <vue-select :name="'akun_kas'" :id="'akun_kas'" :options="akunKas" @input="akunChange"></vue-select>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-form">
                                                        <div class="col-md-3">
                                                            <label class="modul-keuangan">Nominal Transaksi</label>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <vue-inputmask :name="'tr_value'" :id="'tr_value'" @input="nominalChange"></vue-inputmask>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-form" v-if="locked">
                                                        <div class="col-md-3">
                                                            <label class="modul-keuangan"></label>
                                                        </div>

                                                        <div class="col-md-7">
                                                            <div class="modul-keuangan-alert primary" role="alert">
                                                              <i class="fa fa-info-circle"></i> &nbsp;&nbsp;Group Akun Dikunci. Tidak Bisa Dinonaktifkan
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6" style="background: none; padding: 0px; padding-right: 10px;">
                                                    <div class="col-md-12" style="padding: 0px; min-height: 260px; background: #f7f7f7;">
                                                        <table class="table table-stripped table-bordered table-mini">
                                                            <thead>
                                                                <tr>
                                                                    <th width="8%">*</th>
                                                                    <th width="41%">Akun</th>
                                                                    <th width="22%">Debet</th>
                                                                    <th width="22%">Kredit</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody id="wrap">
                                                                <tr>
                                                                    <td class="text-center" style="padding:8px;">
                                                                        <i class="fa fa-lock" style="color: #3F729B;"></i>
                                                                    </td>

                                                                    <td style="padding: 8px;">
                                                                        <vue-select :name="'akun[]'" :id="'akunFirst'" :options="akunFirst" @input="typeChange"></vue-select>
                                                                    </td>

                                                                    <td class="text-right debet" style="padding: 13px 8px 0px 8px;">
                                                                        <vue-inputmask :name="'debet[]'" :id="'debetFirst'" :css="'border: 0px; font-size: 9pt; height: 20px; padding-right: 0px; background:white; cursor:no-drop;'" :readonly="true"></vue-inputmask>
                                                                    </td>

                                                                    <td class="text-right kredit" style="padding: 13px 8px 0px 8px;">
                                                                       <vue-inputmask :name="'kredit[]'" :id="'kreditFirst'" :css="'border: 0px; font-size: 9pt; height: 20px; padding-right: 0px; background:white; cursor:no-drop;'" :readonly="true"></vue-inputmask>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="text-center" style="padding:8px;">
                                                                        <i class="fa fa-lock" style="color: #3F729B;"></i>    
                                                                    </td>

                                                                    <td style="padding: 8px;">
                                                                        <vue-select :name="'akun[]'" :id="'akunSecond'" :options="akunLawan"></vue-select>
                                                                    </td>

                                                                    <td class="text-right debet" style="padding: 13px 8px 0px 8px;">
                                                                        <vue-inputmask :name="'debet[]'" :id="'debet_Second'" :css="'border: 0px; font-size: 9pt; height: 20px; padding-right: 0px; background:white;'" @input="splitValue"></vue-inputmask>
                                                                    </td>

                                                                    <td class="text-right kredit" style="padding: 13px 8px 0px 8px;">
                                                                       <vue-inputmask :name="'kredit[]'" :id="'kredit_Second'" :css="'border: 0px; font-size: 9pt; height: 20px; padding-right: 0px; background:white;'" @input="splitValue"></vue-inputmask>
                                                                    </td>
                                                                </tr>

                                                                <tr v-for="n in akunCount" id="cekWrap">
                                                                    <td class="text-center" style="padding: 8px;">
                                                                        <i class="fa fa-times" :id="'deleteAkun'+n" style="color: #ff4444; cursor: pointer;" @click="deleteAkun"></i>
                                                                    </td>

                                                                    <td style="padding: 8px;">
                                                                        <vue-select :name="'akun[]'" :id="'akun'+n" :options="akunLawan"></vue-select>
                                                                    </td>

                                                                    <td class="text-right debet" style="padding: 13px 8px 0px 8px;">
                                                                        <vue-inputmask :name="'debet[]'" :id="'debet_'+n" :css="'border: 0px; font-size: 9pt; height: 20px; padding-right: 0px;'" @input="splitValue"></vue-inputmask>
                                                                    </td>

                                                                    <td class="text-right kredit" style="padding: 13px 8px 0px 8px;">
                                                                        <vue-inputmask :name="'kredit[]'" :id="'kredit_'+n" :css="'border: 0px; font-size: 9pt; height: 20px; padding-right: 0px;'" @input="splitValue"></vue-inputmask>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="col-md-12" style="padding: 0px; margin-top: -10px">

                                                        <table class="table table-stripped table-bordered table-mini">
                                                            <tr>
                                                                <td width="8%" class="text-center" style="padding: 10px 5px 0px 5px;">
                                                                    <i class="fa fa-plus" style="color: #00C851; cursor: pointer;" @click="addAkun"></i>    
                                                                </td>

                                                                <td width="48%" style="background: #fff; font-weight: bold; font-style: italic; text-align: center;">Total Debit Kredit</td>

                                                                <td width="22%" style="background: #fff;">
                                                                     <vue-inputmask :id="'totalDebet'" :css="'border: 0px; font-size: 9pt; height: 20px; padding-right: 0px;'"></vue-inputmask>
                                                                </td>

                                                                <td width="22%" style="background: #fff;">
                                                                    <vue-inputmask :id="'totalKredit'" :css="'border: 0px; font-size: 9pt; height: 20px; padding-right: 0px;'"></vue-inputmask>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row content-button">
                                                <div class="col-md-6">
                                                    {{-- <a href="{{ route('grup-akun.index') }}">
                                                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-arrow-left" :disabled="btnDisabled"></i> &nbsp;Kembali Ke Halaman Data Group Akun</button>
                                                    </a> --}}
                                                </div>

                                                <div class="col-md-6 text-right">
                                                    <button type="button" class="btn btn-info btn-sm" @click="updateData" :disabled="btnDisabled" v-if="onUpdate"><i class="fa fa-floppy-o"></i> &nbsp;Simpan Perubahan</button>
                                                    
                                                    <button type="button" class="btn btn-danger btn-sm" @click="deleteData" :disabled="btnDisabled" v-if="onUpdate && dataIsActive"><i class="fa fa-times"></i> &nbsp;Hapus</button>

                                                    <button type="button" class="btn btn-success btn-sm" @click="deleteData" :disabled="btnDisabled" v-if="onUpdate && !dataIsActive"><i class="fa fa-check-square-o"></i> &nbsp;Aktifkan</button>

                                                    <button type="button" class="btn btn-primary btn-sm" @click="saveData" :disabled="btnDisabled" v-if="!onUpdate"><i class="fa fa-floppy-o"></i> &nbsp;Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                  </div>
                              </div>
                    
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ez-popup" id="data-popup">
            <div class="layout" style="width: 70%">
                <div class="top-popup" style="background: none;">
                    <span class="title">
                        Data Transaksi Kas Yang Sudah Masuk
                    </span>

                    <span class="close"><i class="fa fa-times" style="font-size: 12pt; color: #CC0000"></i></span>
                </div>
                
                <div class="content-popup">
                    <vue-datatable :data_resource="list_data_table" :columns="data_table_columns" :selectable="true" :ajax_on_loading="onAjaxLoading" :index_column="'tr_id'" @selected="dataSelected"></vue-datatable>
                </div>
            </div>
        </div>

    </div>
@endsection


@section(modulSetting()['extraScripts'])
	
	<script src="{{ asset('modul_keuangan/js/options.js') }}"></script>

    <script src="{{ asset('modul_keuangan/js/vendors/vue_2_x/vue_2_x.js') }}"></script>
    <script src="{{ asset('modul_keuangan/js/vendors/vue_2_x/components/datatable.component.js') }}"></script>
    <script src="{{ asset('modul_keuangan/js/vendors/vue_2_x/components/select.component.js') }}"></script>
    <script src="{{ asset('modul_keuangan/js/vendors/vue_2_x/components/inputmask.component.js') }}"></script>
    <script src="{{ asset('modul_keuangan/js/vendors/vue_2_x/components/datepicker.component.js') }}"></script>

    <script src="{{ asset('modul_keuangan/js/vendors/wait_me_v_1_1/wait.js') }}"></script>
    <script src="{{ asset('modul_keuangan/js/vendors/toast/dist/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('modul_keuangan/js/vendors/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('modul_keuangan/js/vendors/validator/bootstrapValidator.min.js') }}"></script>
    <script src="{{ asset('modul_keuangan/js/vendors/axios_0_18_0/axios.min.js') }}"></script>
    <script src="{{ asset('modul_keuangan/js/vendors/inputmask/inputmask.jquery.js') }}"></script>
    <script src="{{ asset('modul_keuangan/js/vendors/datepicker/dist/datepicker.min.js') }}"></script>

	<script type="text/javascript">

        function register_validator(){
            $('#data-form').bootstrapValidator({
                feedbackIcons : {
                  valid : 'glyphicon glyphicon-ok',
                  invalid : 'glyphicon glyphicon-remove',
                  validating : 'glyphicon glyphicon-refresh'
                },
                fields : {
                  tr_nama : {
                    validators : {
                      notEmpty : {
                        message : 'Nama Transaksi Tidak Boleh Kosong',
                      }
                    }
                  },

                  tr_tanggal : {
                    validators : {
                      notEmpty : {
                        message : 'Tanggal Transaksi Tidak Boleh Kosong',
                      }
                    }
                  },

                  akun_kas : {
                    validators : {
                      notEmpty : {
                        message : 'Akun Kas Harus Dipilih',
                      }
                    }
                  },

                }
            });
        }

		var app = new Vue({
            el: '#page-wrapper',
            data: {
                stat: 'standby',
                statMessage: '',
                btnDisabled: false,
                onAjaxLoading: false,
                onUpdate: false,
                locked: false,
                dataIsActive: true,
                akunCount: 0,
                type: 'MD',

                data_table_columns : [],

                typeTransaksi : [
                    {
                        id: 'MD',
                        text: 'Memorial Debet'
                    },

                    {
                        id: 'MK',
                        text: 'Memorial Kredit'
                    }
                ],

                list_data_table : [],
                akunKas: [],
                akunFirst: [],
                akunLawan: [],

                singleData: {
                    tr_nama: '',
                    tr_id: '',
                    tr_nomor: '',
                    placholderNama: 'contoh: Setoran Modal Investor',
                }
            },

            created: function(){
                console.log('Initializing Vue');
            },

            mounted: function(){
                console.log('Vue Ready');
                $('#tr_tanggal').val('{{ date('d/m/Y') }}');
                register_validator();

                var that = this;

                this.data_table_columns = [
                    {name: 'Nomor Transaksi', context: 'tr_nomor', width: '20%', childStyle: 'text-align: center; font-size:9pt;'},
                    {name: 'Nama Transaksi', context: 'tr_keterangan', width: '30%', childStyle: 'text-align: center'},
                    {name: 'Tanggal Input', context: 'tr_tanggal', width: '15%', childStyle: 'text-align: center', override(e){
                        return e.split('-')[2]+'/'+e.split('-')[1]+'/'+e.split('-')[0];
                    }},
                    {name: 'Type Transaksi', context: 'tr_type', width: '15%', childStyle: 'text-align: center', override(e){
                        switch(e){
                            case 'KM':
                                return 'Kas Masuk';
                                break;

                            case 'KK':
                                return 'Kas Keluar';
                                break;

                            case 'BM':
                                return 'Bank Masuk';
                                break;

                            case 'BK':
                                return 'Bank Keluar';
                                break;

                            case 'MM':
                                return 'Memorial';
                                break;
                        }
                    }},
                    {name: 'Nominal Transaksi', context: 'tr_value', width: '20%', childStyle: 'text-align: right', override(e){
                        return that.humanizePrice(e);
                    }}
                ];

                axios.get('{{route('transaksi.memorial.form_resource')}}')
                          .then((response) => {
                                // console.log(response.data);
                                this.akunKas = response.data.akunKas;
                                this.akunLawan = response.data.akunLawan;

                                if(this.akunKas.length > 0){
                                    this.akunFirst = [{
                                        'id'    : this.akunKas[0].id,
                                        'text'  : this.akunKas[0].text
                                    }];
                                }
                          })
                          .catch((e) => {
                            alert('error '+e);
                          })
            },

            computed: {
                // ---
            },

            watch: {
                // ---
            },

            methods: {
                saveData: function(evt){
                    evt.preventDefault();
                    evt.stopImmediatePropagation();
                    if($('#data-form').data('bootstrapValidator').validate().isValid()){

                        if(!$('#tr_value').val() || $('#tr_value').val() == '0.00'){
                            $.toast({
                                text: "Nominal Transaksi Tidak Boleh 0 (nol)",
                                showHideTransition: 'slide',
                                position: 'top-right',
                                icon: 'info',
                                hideAfter: false
                            });

                            return false;
                        }else if($('#totalDebet').val() != $('#totalKredit').val()){
                            $.toast({
                                text: "Total Debet/Kredit Harus Sama",
                                showHideTransition: 'slide',
                                position: 'top-right',
                                icon: 'info',
                                hideAfter: false
                            });

                            return false;
                        }

                        this.stat = 'loading';
                        this.statMessage = 'Sedang Menyimpan Data ..'
                        this.btnDisabled = true;

                        axios.post('{{ route('transaksi.memorial.store') }}', $('#data-form').serialize())
                                .then((response) => {
                                    // console.log(response.data);
                                    
                                    if(response.data.status == 'berhasil'){
                                        $.toast({
                                            text: response.data.message,
                                            showHideTransition: 'slide',
                                            position: 'top-right',
                                            icon: 'success',
                                            hideAfter: 5000
                                        });

                                        this.formReset();
                                    }else{
                                        $.toast({
                                            text: response.data.message,
                                            showHideTransition: 'slide',
                                            position: 'top-right',
                                            icon: 'error',
                                            hideAfter: false
                                        });

                                        this.stat = 'standby';
                                    }

                                })
                                .catch((err) => {
                                    alert('Ups. Sistem Mengalami kesalahan. Message: '+err);
                                })
                                .then(() => {
                                    this.btnDisabled = false;
                                })
                    }
                },

                updateData: function(evt){
                    evt.preventDefault();
                    evt.stopImmediatePropagation();

                    if($('#data-form').data('bootstrapValidator').validate().isValid()){

                        if(!$('#tr_value').val() || $('#tr_value').val() == '0.00'){
                            $.toast({
                                text: "Nominal Transaksi Tidak Boleh 0 (nol)",
                                showHideTransition: 'slide',
                                position: 'top-right',
                                icon: 'info',
                                hideAfter: false
                            });

                            return false;
                        }else if($('#totalDebet').val() != $('#totalKredit').val()){
                            $.toast({
                                text: "Total Debet/Kredit Harus Sama",
                                showHideTransition: 'slide',
                                position: 'top-right',
                                icon: 'info',
                                hideAfter: false
                            });

                            return false;
                        }

                        this.stat = 'loading';
                        this.statMessage = 'Sedang Memperbarui Data ..'
                        this.btnDisabled = true;

                        axios.post('{{ route('transaksi.memorial.update') }}', $('#data-form').serialize())
                                .then((response) => {
                                    console.log(response.data);
                                    
                                    if(response.data.status == 'berhasil'){
                                        $.toast({
                                            text: response.data.message,
                                            showHideTransition: 'slide',
                                            position: 'top-right',
                                            icon: 'success',
                                            hideAfter: 5000
                                        });

                                        this.formReset();
                                    }else{
                                        $.toast({
                                            text: response.data.message,
                                            showHideTransition: 'slide',
                                            position: 'top-right',
                                            icon: 'error',
                                            hideAfter: false
                                        });

                                        this.stat = 'standby';
                                    }

                                })
                                .catch((err) => {
                                    alert('Ups. Sistem Mengalami kesalahan. Message: '+err);
                                })
                                .then(() => {
                                    this.btnDisabled = false;
                                })
                    }
                },

                deleteData: function(evt){
                    evt.preventDefault();
                    evt.stopImmediatePropagation();

                    if(this.locked){
                        $.toast({
                            text: "Group Ini Sedang Dikunci (Digunakan Oleh Sistem). Tidak Bisa Dinonaktifkan",
                            showHideTransition: 'slide',
                            position: 'top-right',
                            icon: 'info',
                            hideAfter: false
                        });
                    }else{
                        var cfrm = confirm('Apakah Anda Yakin ?');

                        if(cfrm){
                            this.stat = 'loading';
                            this.statMessage = 'Sedang Menghapus Transaksi ..'
                            this.btnDisabled = true;

                            axios.post('{{ route('transaksi.memorial.delete') }}', { tr_id: this.singleData.tr_id, _token: '{{ csrf_token() }}' })
                                    .then((response) => {
                                        // console.log(response.data);
                                        
                                        if(response.data.status == 'berhasil'){
                                            $.toast({
                                                text: response.data.message,
                                                showHideTransition: 'slide',
                                                position: 'top-right',
                                                icon: 'success',
                                                hideAfter: 5000
                                            });

                                            this.formReset();
                                        }else{
                                            $.toast({
                                                text: response.data.message,
                                                showHideTransition: 'slide',
                                                position: 'top-right',
                                                icon: 'error',
                                                hideAfter: false
                                            });

                                            this.stat = 'standby';
                                        }

                                    })
                                    .catch((err) => {
                                        alert('Ups. Sistem Mengalami kesalahan. Message: '+err);
                                    })
                                    .then(() => {
                                        this.btnDisabled = false;
                                    })
                        }
                    }

                },

                typeChange: function(e){
                    this.type = e;
                    this.nominalChange({val: $('#tr_value').val(), id: null});
                },

                akunChange: function(e){
                    var idx = this.akunKas.findIndex(a => a.id === e);
                    this.akunFirst = [{
                        id      : this.akunKas[idx]['id'],
                        text    : this.akunKas[idx]['text']
                    }];
                },

                dateChange: function(e){
                    // $('#data-form').data('bootstrapValidator').resetForm();
                },

                nominalChange: function(e){
                    // console.log(e.val);
                    var nominal = (e.val) ? parseFloat(e.val.replace(/\,/g, '')) : 0;

                    if(this.type == 'MD'){
                        $('#kreditFirst').val(0);
                        $('#debetFirst').val(nominal);
                    }else{
                        $('#kreditFirst').val(nominal);
                        $('#debetFirst').val(0);
                    }

                    this.countDK();
                },

                splitValue: function(e){
                    var index = e.id.split('_')[1];
                    var conteks = e.id.split('_')[0];

                    switch(conteks){
                        case 'debet':
                            $('#kredit_'+index).val(0);
                            break;

                        case 'kredit':
                            $('#debet_'+index).val(0);
                            break;
                    }

                    this.countDK();
                },

                countDK: function(e){
                    var D = K = 0;
                    $('.debet').each(function(e){
                        var addition = ($(this).children('input').val()) ? parseFloat($(this).children('input').val().replace(/\,/g, '')) : 0;

                        D += addition;
                    });

                    $('.kredit').each(function(e){
                        var addition = ($(this).children('input').val()) ? parseFloat($(this).children('input').val().replace(/\,/g, '')) : 0;

                        K += addition;
                    });

                    $('#totalDebet').val(D);
                    $('#totalKredit').val(K);
                },

                addAkun: function(e){
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    this.akunCount++;
                },

                deleteAkun: function(e){
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    conteks = $('#'+e.srcElement.id);
                    conteks.closest('tr').remove();

                    this.countDK();
                },

                search: function(e){
                    e.preventDefault();
                    this.list_data_table = [];
                    this.onAjaxLoading = true;

                    axios.get('{{ Route('transaksi.memorial.datatable') }}?type='+$('#tr_type').val()+'&tanggal='+$('#tr_tanggal').val())
                            .then((response) => {
                                console.log(response.data);
                                if(response.data.length){
                                    this.list_data_table = response.data;
                                }
                            })
                            .then(() => {
                                this.onAjaxLoading = false;
                            })
                            .catch((err) => {
                                alert('Ups. Sistem Mengalami kesalahan. Message: '+err);
                            })

                    $('#data-popup').ezPopup('show');
                },

                dataSelected: function(e){
                    var that = this; loopCount = 1;
                    this.stat = 'loading';
                    this.statMessage = 'Sedang Menyiapkan Data ..'
                    this.btnDisabled = true;

                    var idx = this.list_data_table.findIndex(a => a.tr_id === e);
                    var tanggal = this.list_data_table[idx].tr_tanggal.split('-')[2]+'/'+this.list_data_table[idx].tr_tanggal.split('-')[1]+'/'+this.list_data_table[idx].tr_tanggal.split('-')[0]

                    this.singleData.tr_id = this.list_data_table[idx].tr_id;
                    this.singleData.tr_nomor = this.list_data_table[idx].tr_nomor;
                    this.singleData.tr_nama = this.list_data_table[idx].tr_keterangan;
                    this.akunCount = parseInt(this.list_data_table[idx].detail.length - 2);

                    console.log(this.list_data_table[idx]);

                    if(this.list_data_table[idx].detail[0].trdt_dk == 'D')
                        $('#tr_type').val('MD').trigger('change.select2');
                    else
                        $('#tr_type').val('MK').trigger('change.select2');

                    $('#tr_tanggal').val(tanggal);
                    $('#tr_value').val(this.list_data_table[idx].tr_value);

                    this.onUpdate = true;
                    this.type = $('#tr_type').val();

                    setTimeout(function(){
                        $.each(that.list_data_table[idx].detail, function(i, n){
                            if(i == 0){
                                $('#akun_kas').val(n.trdt_akun).trigger('change.select2');
                                that.akunChange(n.trdt_akun);

                                if(n.trdt_dk == 'D'){
                                    $('#debetFirst').val(n.trdt_value);
                                    $('#kreditFirst').val(0);
                                }
                                else{
                                    $('#debetFirst').val(0);
                                    $('#kreditFirst').val(n.trdt_value);
                                }
                            }else if(i == 1){
                                $('#akunSecond').val(n.trdt_akun).trigger('change.select2');

                                if(n.trdt_dk == 'D'){
                                    $('#debet_Second').val(n.trdt_value);
                                    $('#kredit_Second').val(0)
                                }
                                else{
                                    $('#kredit_Second').val(n.trdt_value);
                                    $('#debet_Second').val(0)
                                }
                            }else{
                                $('#akun'+loopCount).val(n.trdt_akun).trigger('change.select2');

                                if(n.trdt_dk == 'D'){
                                    $('#debet_'+loopCount).val(n.trdt_value);
                                    $('#kredit_'+loopCount).val(0)
                                }
                                else{
                                    $('#kredit_'+loopCount).val(n.trdt_value);
                                    $('#debet_'+loopCount).val(0)
                                }

                                loopCount++;
                            }
                        })

                        that.countDK();
                        that.stat = 'standby';
                        that.btnDisabled = false;
                    }, 0)

                    $('#data-popup').ezPopup('close');

                },

                dataHover: function(e){
                    var idx = this.list_data_table.findIndex(a => a.tr_id === e);
                    this.akunCount = parseInt(this.list_data_table[idx].detail.length - 2);
                },

                humanizePrice: function(alpha){
                  var bilangan = alpha.toString();
                  var commas = '00';


                  if(bilangan.split('.').length > 1){
                    commas = bilangan.split('.')[1];
                    bilangan = bilangan.split('.')[0];
                  }
                  
                  var number_string = bilangan.toString(),
                    sisa  = number_string.length % 3,
                    rupiah  = number_string.substr(0, sisa),
                    ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                      
                  if (ribuan) {
                    separator = sisa ? ',' : '';
                    rupiah += separator + ribuan.join(',');
                  }

                  // Cetak hasil
                  return rupiah+'.'+commas; // Hasil: 23.456.789
                },

                formReset: function(){
                    
                    this.singleData.tr_nama = '';
                    this.singleData.tr_nomor = '';

                    $('#tr_type').val('MD').trigger('change.select2');
                    $('#tr_tanggal').val('{{ date('d/m/Y') }}');
                    $('#tr_value').val(0);

                    if(this.akunKas.length >= 0){
                        $('#akun_kas').val(this.akunKas[0]['id']).trigger('change.select2');
                        this.akunChange(this.akunKas[0]['id']);
                    }

                    if(this.akunLawan.length >= 0){
                        $('#akunSecond').val(this.akunLawan[0]['id']).trigger('change.select2');
                    }

                    $('#debet_Second').val(0);
                    $('#kredit_Second').val(0);

                    this.akunCount = 0;
                    this.nominalChange(0);
                    this.stat = 'standby';
                    this.onUpdate = false;
                    this.locked = false;
                    this.type = 'MD';
                    $('#data-form').data('bootstrapValidator').resetForm();
                }
            }
        })

    </script>

@endsection
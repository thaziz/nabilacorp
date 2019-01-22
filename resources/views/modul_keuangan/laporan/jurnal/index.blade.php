<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laporan Jurnal Umum</title>
        
		<link rel="stylesheet" type="text/css" href="{{ asset('modul_keuangan/bootstrap_4_1_3/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('modul_keuangan/font-awesome_4_7_0/css/font-awesome.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('modul_keuangan/css/style.css') }}">
  		<link rel="stylesheet" type="text/css" href="{{asset('modul_keuangan/js/vendors/ez_popup_v_1_1/ez.popup.css')}}">
    	<link rel="stylesheet" type="text/css" href="{{ asset('modul_keuangan/js/vendors/select2/dist/css/select2.min.css') }}">
    	<link rel="stylesheet" type="text/css" href="{{ asset('modul_keuangan/js/vendors/datepicker/dist/datepicker.min.css') }}">
    	<link rel="stylesheet" type="text/css" href="{{ asset('modul_keuangan/js/vendors/toast/dist/jquery.toast.min.css') }}">

		<style>

			body{
				background: rgba(0,0,0, 0.5);
			}

			/*.bs-datepicker-container { z-index: 3000; }*/

			.lds-dual-ring {
			  display: inline-block;
			  width: 64px;
			  height: 64px;
			}
			.lds-dual-ring:after {
			  content: " ";
			  display: block;
			  width: 46px;
			  height: 46px;
			  margin: 1px;
			  border-radius: 50%;
			  border: 5px solid #dfc;
			  border-color: #dfc transparent #dfc transparent;
			  animation: lds-dual-ring 1.2s linear infinite;
			}
			@keyframes lds-dual-ring {
			  0% {
			    transform: rotate(0deg);
			  }
			  100% {
			    transform: rotate(360deg);
			  }
			}

		    .navbar-brand {
		    	padding-left: 30px;
		    }

		    .navbar-nav {
		      flex-direction: row;
		      padding-right: 40px; 
		    }
		    
		    .nav-link {
		      padding-right: .5rem !important;
		      padding-left: .5rem !important;
		    }
		    
		    /* Fixes dropdown menus placed on the right side */
		    .ml-auto .dropdown-menu {
		      left: auto !important;
		      right: 0px;
		    }

		    .nav-item{
		    	color: white;
		    }

		    .navbar-nav li{
		        border-left: 1px solid rgba(255, 255, 255, 0.1);
		        padding: 0px 25px;
		        cursor: pointer;
		    }

		    .navbar-nav li:last-child{
		    	border-right: 1px solid rgba(255, 255, 255, 0.1);
		    }

		    .ctn-nav {
		    	background: rgba(0,0,0, 0.7);
		    	position: fixed;
		    	bottom: 1.5em;
		    	z-index: 1000;
		    	font-size: 10pt;
		    	box-shadow: 0px 0px 10px #aaa;
		    	border-radius: 10px
		    }

		    #title-table{
		    	padding: 0px;
		    }

		    #table-data{
		    	font-size: 8pt;
		    }

		    #table-data td, #table-data th {
		    	padding: 5px 10px;
		    }

		    #table-data th{
		    	border: 1px solid #eee;
		    	background: #0099CC;
		    	color: white;
		    }

		</style>
	</head>

	<body>
		<div id="vue-element">
			<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="box-shadow: 0px 5px 10px #555;">
			    <a class="navbar-brand" href="{{ url('/') }}">{{ jurnal()->companyName }}</a>

			    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>

			    <div class="collapse navbar-collapse" id="navbarCollapse">
			      <ul class="navbar-nav ml-auto">

			      	<li class="nav-item">
			      	  <a href="{{ route('laporan.keuangan.index') }}" style="color: #ffbb33;">
			          	<i class="fa fa-backward" title="Kembali Ke Menu Laporan"></i>
			          </a>
			        </li>

			        <li class="nav-item">
			          	<i class="fa fa-print" title="Print Laporan" @click="print"></i>
			        </li>

			        <li class="nav-item dropdown" title="Download Laporan">
			          	<i class="fa fa-download" id="dropdownMenuButton" data-toggle="dropdown"></i>

			            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						    <a class="dropdown-item" href="#" style="font-size: 10pt;" @click='downloadPdf'>
						    	<i class="fa fa-file-pdf-o" style="font-weight: bold;"></i> &nbsp; Download PDF
						    </a>

						    <div class="dropdown-divider"></div>

						    <a class="dropdown-item" href="#" style="font-size: 10pt;" @click='downloadExcel'>
						    	<i class="fa fa-file-excel-o" style="font-weight: bold;"></i> &nbsp; Download Excel
						    </a>
					    </div>
			        </li>

			        <li class="nav-item">
			          <i class="fa fa-sliders" title="Pengaturan Laporan" @click="showSetting"></i>
			        </li>

			      </ul>
			    </div>
			</nav>

			<div class="col-md-4 offset-4 ctn-nav" v-cloak>
				<div class="row" style="color: white; padding: 8px 0px;">
					<table width="100%" border="0">
						<tbody>
							<tr>
								<td class="text-center" width="40%" style="border-left: 0px solid #999; font-style: italic;">Menampilkan Halaman</td>
								<td class="text-center" width="10%" style="border-left: 1px solid #999;">@{{ pageNow }}</td>
								<td class="text-center" width="10%" style="border-left: 1px solid #999;">
									/
								</td>
								<td class="text-center" width="10%" style="border-left: 1px solid #999;">@{{ dataPage }}</td>
								<td class="text-center" width="15%" style="border-left: 1px solid #999;">
									<i class="fa fa-arrow-left" :style="(!previousDisabled) ? 'cursor: pointer; color: #fff' : 'cursor: no-drop; color: #888'" @click="previousPage"></i>
								</td>
								<td class="text-center" width="15%">
									<i class="fa fa-arrow-right" :style="(!nextDisabled) ? 'cursor: pointer; color: #fff' : 'cursor: no-drop; color: #888'" @click="nextPage"></i>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="container-fluid" style="background: none; margin-top: 70px; padding: 10px 30px;">
				<div class="col-md-12" style="background: white; min-height: 700px; border-radius: 5px; margin-bottom: 70px;">

					<?php 
						$tanggal_1 = explode('/', $_GET['d1'])[0].' '.switchBulan(explode('/', $_GET['d1'])[1]).' '.explode('/', $_GET['d1'])[2];

						$tanggal_2 = explode('/', $_GET['d2'])[0].' '.switchBulan(explode('/', $_GET['d2'])[1]).' '.explode('/', $_GET['d2'])[2];

						$type = 'Transaksi Kas';

						if($_GET["type"] == 'B')
							$type = 'Transaksi Bank';
						else if($_GET["type"] == 'M')
							$type = 'Transaksi Memorial'
					?>					

					{{-- Judul Kop --}}

						<table width="100%" border="0" style="border-bottom: 1px solid #333;" v-if="pageNow == 1" v-cloak>
				          <thead>
				            <tr>
				              <th style="text-align: left; font-size: 14pt; font-weight: 600; padding-top: 10px;" colspan="2">Laporan Jurnal {{ $type }} </th>
				            </tr>

				            <tr>
				              <th style="text-align: left; font-size: 12pt; font-weight: 500" colspan="2">{{ jurnal()->companyName }}</th>
				            </tr>

				            <tr>
				              <th style="text-align: left; font-size: 8pt; font-weight: 500; padding-bottom: 10px;">(Angka Disajikan Dalam Rupiah, Kecuali Dinyatakan Lain)</th>

				              <th class="text-right" style="font-size: 8pt; font-weight: normal;">
				              	<b>{{ $tanggal_1 }}</b>&nbsp; s/d&nbsp; <b>{{ $tanggal_2 }}</b>
				              </th>
				            </tr>
				          </thead>
				        </table>

				    {{-- End Judul Kop --}}


			    	{{-- End Tanggal --}}

			    	<div style="padding-top: 20px;">
						<table class="table" id="table-data" v-cloak>
							<thead>
								<tr>
									<th width="8%" style="">Tanggal</th>
									<th width="12%">No. Bukti</th>
									<th :width="(requestNama == 'true') ? '20%' : '40%'">Keterangan</th>
									<th width="10%">No. Akun</th>
									<th width="20%" v-if="requestNama == 'true'">Nama Akun</th>
									<th width="15%">Debet</th>
									<th width="15%">Kredit</th>
								</tr>
							</thead>

							<tbody>
								<template v-for="(data, idx) in dataPrint">
									<tr v-for="(detail, index) in data.detail">
										<td class="text-center" style="border: 1px solid #eee;">@{{ humanizeDate(data.jr_tanggal_trans) }}</td>
										<td class="text-center" style="border: 1px solid #eee;">@{{ data.jr_ref }}</td>
										<td style="border: 1px solid #eee;">@{{ data.jr_keterangan }}</td>
										<td class="text-center" style="border: 1px solid #eee;">@{{ detail.jrdt_akun }}</td>
										<td style="border: 1px solid #eee;" v-if="requestNama == 'true'">@{{ detail.ak_nama }}</td>
										<td class="text-right" style="border: 1px solid #eee;">
											<span v-html="(detail.jrdt_dk == 'D') ? humanizePrice(detail.jrdt_value) : '0.00'"></span>
										</td>
										<td class="text-right" style="border: 1px solid #eee;">
											<span v-html="(detail.jrdt_dk == 'K') ? humanizePrice(detail.jrdt_value) : '0.00'"></span>
										</td>
									</tr>

									<tr>
										<td :colspan="(requestNama == 'true') ? 5 : 4" style="background: #eee; padding: 0px;"></td>
										<td class="text-right" style="border: 1px solid #eee; background: #eee; font-weight: bold; padding: 10px 5px;">
											@{{ humanizePrice(dkSummary[idx].debet) }}
										</td>
										<td class="text-right" style="border: 1px solid #eee; background: #eee; font-weight: bold; padding: 10px 5px;">
											@{{ humanizePrice(dkSummary[idx].kredit) }}
										</td>
									</tr>
								</template>
							</tbody>

							<tfoot v-if="pageNow == dataPage">
								<tr>
									<td :colspan="(requestNama == 'true') ? 5 : 4" style="background: none; padding: 0px;"></td>
									<td class="text-right" style="border: 0px solid #eee; background: white; font-weight: bold; padding: 10px 5px; border-bottom: 2px solid #eee;">
										@{{ humanizePrice(totDK.debet) }}
									</td>
									<td class="text-right" style="border: 0px solid #eee; background: white; font-weight: bold; padding: 10px 5px; border-bottom: 2px solid #eee;">
										@{{ humanizePrice(totDK.kredit) }}
									</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>

			<div class="ez-popup" id="loading-popup">
	            <div class="layout text-center" style="width: 50%; background: none; box-shadow: none; color: white; min-height: 0px; margin-top: 250px; border-radius: 2px;">
	                   <span style="font-size: 11pt; font-style: italic;">
	                   		<div class="lds-dual-ring" v-if="textLoading == 'Sedang Menyiapkan Laporan . Harap Tunggu...'"></div>
	                   		<i class="fa fa-frown-o" style="font-size: 42pt; margin-bottom: 20px;" v-if="textLoading != 'Sedang Menyiapkan Laporan . Harap Tunggu...'"></i>
	                   		<br>
	                   		@{{ textLoading }}
	                   	</span>
	            </div>
	        </div>

	        <div class="ez-popup" id="setting-popup">
	            <div class="layout" style="width: 35%; min-height: 250px;">
	                <div class="top-popup" style="background: none;">
	                    <span class="title">
	                        Setting Laporan Jurnal
	                    </span>

	                    <span class="close"><i class="fa fa-times" style="font-size: 12pt; color: #CC0000"></i></span>
	                </div>
	                
	                <div class="content-popup">
	                	<form id="form-setting" method="get" action="{{ route('laporan.keuangan.jurnal_umum') }}">
	                	<input type="hidden" readonly name="_token" value="{{ csrf_token() }}">
	                    <div class="col-md-12">
	                    	<div class="row mt-form">
	                            <div class="col-md-4">
	                                <label class="modul-keuangan">Type Laporan</label>
	                            </div>

	                            <div class="col-md-8">
	                                <vue-select :name="'type'" :id="'type'" :options="typeLaporan" :styles="'width:100%'"></vue-select>
	                            </div>
	                        </div>

	                        <div class="row mt-form">
	                            <div class="col-md-4">
	                                <label class="modul-keuangan">Rentang Waktu</label>
	                            </div>

	                            <div class="col-md-8">
	                            	<table width="100%" border="0">
	                            		<tr>
	                            			<td>
	                            				<vue-datepicker :name="'d1'" :id="'d1'" :title="'Tidak Boleh Kosong'" :readonly="true" :placeholder="'Pilih Tanggal'" @input="d1Change" :styles="'font-size: 9pt;'"></vue-datepicker>
	                            			</td>
	                            			<td style="padding: 0px 10px;">-</td>
	                            			<td>
	                            				<vue-datepicker :name="'d2'" :id="'d2'" :title="'Tidak Boleh Kosong'" :readonly="true" :placeholder="'Pilih Tanggal'" :styles="'font-size: 9pt;'"></vue-datepicker>
	                            			</td>
	                            		</tr>
	                            	</table>
	                            </div>
	                        </div>

	                        <div class="row mt-form">
	                            <div class="col-md-4">
	                                <label class="modul-keuangan">Nama Akun</label>
	                            </div>

	                            <div class="col-md-7">
	                                <vue-select :name="'nama'" :id="'nama'" :options="namaAkun" :styles="'width:100%'"></vue-select>
	                            </div>
	                        </div>

	                    </div>

	                    <div class="col-md-12" style="margin-top: 20px; border-top: 1px solid #eee; padding-top: 10px;">
	                    	<div class="row">
		                    	<div class="col-md-8" style="padding: 0px; padding-top: 5px; padding-left: 10px; color: #666;">
	                                <div class="loader" v-if="stat == 'loading'" v-cloak>
	                                   <div class="loading"></div> &nbsp; <span>@{{ statMessage }}</span>
	                                </div>
	                            </div>

		                    	<div class="col-md-4 text-right" style="padding: 0px;">
		                    		<button type="button" class="btn btn-info btn-sm" @click='prosesLaporan'>Proses</button>
		                    	</div>
		                    </div>
	                    </div>

	                    </form>
	                </div>
	            </div>
	        </div>

	        <iframe style="display: none;" id='pdfIframe' src=''/></iframe>
		</div>

		<script src="{{ asset('modul_keuangan/js/jquery_3_3_1.min.js') }}"></script>
		<script src="{{ asset('modul_keuangan/bootstrap_4_1_3/js/bootstrap.min.js') }}"></script>
		<script src="{{asset('modul_keuangan/js/vendors/ez_popup_v_1_1/ez.popup.js')}}"></script>
    	<script src="{{ asset('modul_keuangan/js/vendors/axios_0_18_0/axios.min.js') }}"></script>
    	<script src="{{ asset('modul_keuangan/js/vendors/select2/dist/js/select2.min.js') }}"></script>
    	<script src="{{ asset('modul_keuangan/js/vendors/datepicker/dist/datepicker.min.js') }}"></script>
    	<script src="{{ asset('modul_keuangan/js/vendors/toast/dist/jquery.toast.min.js') }}"></script>

    	<script src="{{ asset('modul_keuangan/js/vendors/vue_2_x/vue_2_x.js') }}"></script>
    	<script src="{{ asset('modul_keuangan/js/vendors/vue_2_x/components/select.component.js') }}"></script>
    	<script src="{{ asset('modul_keuangan/js/vendors/vue_2_x/components/datepicker.component.js') }}"></script>

    	<script type="text/javascript">

			var app = 	new Vue({
			    			el: '#vue-element',
			    			data: {

			    				textLoading: "",
			    				statMessage: "Sedang Menyiapkan Laporan..",
			    				stat: "standby",
			    				requestNama: '',
			    				url: new URL(window.location.href),

			    				firstElement: 0,
			    				dataPage: 1,
			    				pageNow: 0,
			    				rowsCount: 6,

			    				nextDisabled: false,
			    				previousDisabled: true,

			    				dataSource: [],
			    				dataPrint: [],
			    				totDK: {
			    					debet: 0,
			    					kredit: 0
			    				},

			    				// setting
			    					typeLaporan: [
			    						{
			    							id: 'K',
			    							text: 'Laporan Jurnal Kas',
			    						},

			    						{
			    							id: 'B',
			    							text: 'Laporan Jurnal Bank',
			    						},

			    						{
			    							id: 'M',
			    							text: 'Laporan Jurnal Memorial',
			    						},
			    					],

			    					namaAkun: [
			    						{
			    							id: 'true',
			    							text: 'Tampilkan Nama Akun'
			    						},

			    						{
			    							id: 'false',
			    							text: 'Jangan Tampilkan Nama Akun'
			    						}
			    					],
			    			},

			    			created: function(){
				                console.log('Initializing Vue');
				            },

				            mounted: function(){
				            	console.log('Vue Ready');
				            	this.textLoading = "Sedang Menyiapkan Laporan . Harap Tunggu...";
				            	$('#loading-popup').ezPopup('show');

				            	$('#d1').val('{{ $_GET['d1'] }}');
				            	$('#d2').val('{{ $_GET['d2'] }}');
				            	$('#type').val('{{ $_GET['type'] }}').trigger('change.select2');
				            	$('#nama').val('{{ $_GET['nama'] }}').trigger('change.select2');

				            	that = this;

				            	axios.get('{{route('laporan.keuangan.jurnal_umum.data_resource')}}?'+that.url.searchParams)
			                            .then((response) => {

			                            	this.requestNama = response.data.requestNama;

			                                if(response.data.data.length){
			                                	this.dataSource = response.data.data;
			                                	this.pageNow = 1;

			                                	if(this.dataSource.length / this.rowsCount < 1){
			                                		this.dataPage = Math.floor(this.dataSource.length / this.rowsCount) + 1;
			                                		// alert('a')
			                                	}else if((this.dataSource.length / this.rowsCount) % 1 == 0){
			                                		this.dataPage = Math.floor(this.dataSource.length / this.rowsCount);
			                                		// alert('b')
			                                	}else if(this.dataSource.length / this.rowsCount > 1){
			                                		this.dataPage = Math.floor(this.dataSource.length / this.rowsCount) + 1;
			                                		// alert('c')
			                                	}

			                                	if(this.pageNow == this.dataPage)
			                                		this.nextDisabled = true;

			                                }else{
			                                	this.pageNow = 1;
			                                }

			                                $('#loading-popup').ezPopup('close');
			                                this.calculatingDK();
			                            })
			                            .catch((e) => {
			                            	this.textLoading = "Data Laporan Bermasalah. Segera Hubungi Developer. message : "+e;
			                            })
				            },

				            computed: {
				            	dkSummary: function(){

				            		var clock = [];

				            		$.each(this.dataPrint, function(i, n){
				            			var d = k = 0;

				            			$.each(n.detail, function(x, y){
				            				if(y.jrdt_dk == "D")
				            					d += y.jrdt_value;
				            				else
				            					k += y.jrdt_value;
				            			})

				            			clock.push({debet: d, kredit: k})
				            		})

				            		return clock;
				            	}
				            },

				            watch: {
				            	pageNow: function(){
				            		var dump = []; var c = [];

				            		for (i = this.firstElement; i < (this.firstElement + this.rowsCount); i++){
				            			if(i < this.dataSource.length){
				            				dump.push(this.dataSource[i]);
				            				c.push(i);
				            			}else{
				            				break;
				            			}
				            		}

				            		this.dataPrint = dump;
				            	}
				            },

				            methods: {
				            	previousPage: function(){
				            		if(this.pageNow > 1){
				            			this.pageNow--;
				            			this.firstElement -= (this.rowsCount);

				            			this.previousDisabled = (this.pageNow == 1) ? true : false;
				            			this.nextDisabled = (this.pageNow == this.dataPage) ? true : false;
				            		}
				            	},

				            	nextPage: function(){
				            		if(this.pageNow < this.dataPage){
				            			this.pageNow++;
				            			this.firstElement += (this.rowsCount);

				            			this.nextDisabled = (this.pageNow == this.dataPage) ? true : false;
				            			this.previousDisabled = (this.pageNow == 1) ? true : false;
				            		}
				            	},

				            	showSetting: function(evt){
				            		evt.preventDefault();
				                	evt.stopImmediatePropagation();

				                	$('#setting-popup').ezPopup('show');
				            	},

				            	downloadPdf: function(evt){
				            		evt.preventDefault();
				                	evt.stopImmediatePropagation();

				                	$.toast({
									    text: "Sedang Mendownload Laporan PDF",
			                            showHideTransition: 'slide',
			                            position: 'bottom-right',
			                            icon: 'info',
			                            hideAfter: 10000,
			                            showHideTransition: 'slide',
			                            allowToastClose: false,
			                            stack: false
									});

				                    $('#pdfIframe').attr('src', '{{route('laporan.keuangan.jurnal_umum.print.pdf')}}?'+that.url.searchParams)

				            	},

				            	downloadExcel: function(evt){
				            		evt.preventDefault();
				                	evt.stopImmediatePropagation();

				                	$.toast({
			                            text: "Sedang Mendownload Laporan EXCEL",
			                            showHideTransition: 'slide',
			                            position: 'bottom-right',
			                            icon: 'info',
			                            hideAfter: 10000,
			                            showHideTransition: 'slide',
			                            allowToastClose: false,
			                            stack: false
			                        });

			                        $('#pdfIframe').attr('src', '{{route('laporan.keuangan.jurnal_umum.print.excel')}}?'+that.url.searchParams)
				            	},

				            	print: function(evt){
				            		evt.preventDefault();
				            		evt.stopImmediatePropagation();

				            		$.toast({
			                            text: "Sedang Mencetak Laporan",
			                            showHideTransition: 'slide',
			                            position: 'bottom-right',
			                            icon: 'info',
			                            hideAfter: 8000,
			                            showHideTransition: 'slide',
			                            allowToastClose: false,
			                            stack: false
			                        });

				            		$('#pdfIframe').attr('src', '{{route('laporan.keuangan.jurnal_umum.print')}}?'+that.url.searchParams)
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

				                humanizeDate(date){
				                	let d = date.split('-')[2]+'/'+date.split('-')[1]+'/'+date.split('-')[0];

				                	return d;
				                },

				                d1Change: function(e){
				                	$('#d2').val("");
				                	$('#d2').datepicker("setStartDate", e);
				                },

				                prosesLaporan: function(evt){
				                	evt.preventDefault();
				                	evt.stopImmediatePropagation();

				                	if(this.validate()){
				                		this.stat = 'loading';
				                		$('#form-setting').submit();
				                	}
				                },

				                validate: function(){
				                	if($('#d1').val() == '' || $('#d2').val() == ''){
				                		$.toast({
				                            text: "Harap Lengkapi Data Inputan",
				                            showHideTransition: 'slide',
				                            position: 'top-right',
				                            icon: 'error',
				                            hideAfter: false
				                        });

				                        return false;
				                	}

				                	return true;
				                },

				                calculatingDK: function(){
				                	var clock = [];
				            		var d = k = 0;

				            		$.each(this.dataSource, function(i, n){

				            			$.each(n.detail, function(x, y){
				            				if(y.jrdt_dk == "D")
				            					d += y.jrdt_value;
				            				else
				            					k += y.jrdt_value;
				            			})

				            		})

				            		this.totDK = {debet: d, kredit: k};
				                },
				            }
			    		})
    	</script>
	</body>
</html>
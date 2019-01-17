<!DOCTYPE html>
<html>
<head>
	<title>Print KPI</title>
	<style type="text/css">
		*:not(h1):not(h2):not(h3):not(h4):not(h5):not(h6):not(small):not(label){
			font-size: 14px;
		}
		.s16{
			font-size: 16px !important;
		}
		.div-width{
			width: 900px;
			padding: 30px 15px 15px 15px;
			background: transparent;
			position: relative;
		}
		.div-width-background{
			content: "";
			background-image: url("{{asset('assets/img/background-tammafood-surat.jpg')}}");
			background-repeat: no-repeat;
			background-position: center; 
			background-size: 700px 700px;
			position: absolute;
			z-index: -1;
			margin-top: 170px;
			top: 0;
			left: 0;
			bottom: 0;
			right: 0;
			opacity: 0.1; 
			width: 900px;
		}
		.underline{
			text-decoration: underline;
		}
		.italic{
			font-style: italic;
		}
		.bold{
			font-weight: bold;
		}
		.text-center{
			text-align: center;
		}
		.text-right{
			text-align: right;
		}
		.text-left{
			text-align: left;
		}
		.border-none-right{
			border-right: hidden;
		}
		.border-none-left{
			border-left:hidden;
		}
		.border-none-bottom{
			border-bottom: hidden;
		}
		.border-none-top{
			border-top: hidden;
		}
		.float-left{
			float: left;
		}
		.float-right{
			float: right;
		}
		.top{
			vertical-align: text-top;
		}
		.vertical-baseline{
			vertical-align: baseline;
		}
		.bottom{
			vertical-align: text-bottom;
		}
		.ttd{
			width: 150px;
		}
		.relative{
			position: relative;
		}
		.absolute{
			position: absolute;
		}
		.empty{
			height: 18px;
		}
		table,td{
			border:1px solid black;
		}
		table{
			border-collapse: collapse;
		}
		table.border-none ,.border-none td{
			border:none !important;
		}
		.position-top{
			vertical-align: top;
		}
		@page {
			size: portrait;
			margin:0 0 0 0;
		}
		@media print {
			.div-width{
				margin: auto;
				padding: 10px 15px 15px 15px;
				width: 95vw;
				position: relative;
			}
			.btn-print{
				display: none;
			}
			header{
				top:0;
				left: 0;
				right: 0;
				position: absolute;
				width: 100%;
			}
			footer{
				bottom: 0;
				left: 0;
				right: 0;
				position: absolute;
				width: 100%;
			}
			.div-width-background{
				content: "";
				background-image: url("{{asset('assets/img/background-tammafood-surat.jpg')}}");
				background-repeat: no-repeat;
				background-position: center; 
				background-size: 700px 700px;
				position: absolute;
				z-index: -1;
				margin: auto;
				opacity: 0.1; 
				width: 95vw;
			}
		}
		fieldset{
			border: 1px solid black;
			margin:-.5px;
		}
		header{
			top: 0;
			width: 900px;
		}
		footer{
			bottom: 0;
			width: 900px;
		}
		.border-top{
			border-top: 1px solid black;
		}
		.btn-print{
			position: fixed;
			width: 100%;
			text-align: right;
			left: 0;
			top: 0;
			background: rgba(0,0,0,.2);
		}
		.btn-print button, .btn-print a{
			margin: 10px;
		}
	</style>
</head>
<body>
	<div class="btn-print" align="right">
		<button onclick="javascript:window.print();">Print</button>
	</div>

	@php
		setlocale(LC_ALL, 'IND');
	@endphp
	
		
	<div class="div-width">
		<h2>Data KPI Pegawai</h2>
		<table width="100%" class="border-none">
			<tr>
				<td width="10%">Tanggal</td>
				<td width="1%">:</td>
				<td width="45%">{{strftime('%e %B %Y', strtotime($data[0]['d_kpix_date']) ) }}</td>
			
				<td width="10%">Divisi</td>
				<td width="1%">:</td>
				<td>{{$pegawai['c_divisi']}}</td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>:</td>
				<td>{{$pegawai['c_posisi']}}</td>
			
				<td>Pegawai</td>
				<td>:</td>
				<td>{{$pegawai['c_nama']}}</td>
			</tr>
		</table>

		<table width="100%" cellpadding="3px" style="margin-top: 15px;">
			<tr class="bold text-center">
				<td width="1%">No</td>
				<td>Bobot</td>
				<td>Key Performance</td>
				<td>Target</td>
				<td>Realisasi</td>
				<td>Skor</td>
				<td>Skor Akhir</td>
			</tr>
			@for($i=0;$i<count($data);$i++)
				<tr>
					<td align="center">{{$i+1}}</td>
					<td align="center">{{$data[$i]['kpix_bobot']}}</td>
					<td>{{$data[$i]['kpix_name']}}</td>
					<td align="right">{{$data[$i]['kpix_target']}}</td>
					<td align="right">{{$data[$i]['d_kpixdt_value']}}</td>
					<td align="right">{{$data[$i]['d_kpixdt_score']}}</td>
					<td align="right">{{$data[$i]['d_kpixdt_scoreakhir']}}</td>
				</tr>
			@endfor
			<tr>
				<td colspan="2" class="bold text-center">Total Bobot : {{$total[0]['total_bobot']}}</td>
				<td colspan="5" class="bold text-center">Total Skor Akhir : {{$total[0]['total_score_akhir']}}</td>
			</tr>
		</table>
	</div>

	<div style="padding-top: 30px;">
		<hr>
	</div>

	<div class="div-width">
		<h2>Data KPI Pegawai</h2>
		<table width="100%" class="border-none">
			<tr>
				<td width="10%">Tanggal</td>
				<td width="1%">:</td>
				<td width="45%">{{strftime('%e %B %Y', strtotime($data[0]['d_kpix_date']) ) }}</td>
			
				<td width="10%">Divisi</td>
				<td width="1%">:</td>
				<td>{{$pegawai['c_divisi']}}</td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>:</td>
				<td>{{$pegawai['c_posisi']}}</td>
			
				<td>Pegawai</td>
				<td>:</td>
				<td>{{$pegawai['c_nama']}}</td>
			</tr>
		</table>

		<table width="100%" cellpadding="3px" style="margin-top: 15px;">
			<tr class="bold text-center">
				<td width="1%">No</td>
				<td>Bobot</td>
				<td>Key Performance</td>
				<td>Target</td>
				<td>Realisasi</td>
				<td>Skor</td>
				<td>Skor Akhir</td>
			</tr>
			@for($i=0;$i<count($data);$i++)
				<tr>
					<td align="center">{{$i+1}}</td>
					<td align="center">{{$data[$i]['kpix_bobot']}}</td>
					<td>{{$data[$i]['kpix_name']}}</td>
					<td align="right">{{$data[$i]['kpix_target']}}</td>
					<td align="right">{{$data[$i]['d_kpixdt_value']}}</td>
					<td align="right">{{$data[$i]['d_kpixdt_score']}}</td>
					<td align="right">{{$data[$i]['d_kpixdt_scoreakhir']}}</td>
				</tr>
			@endfor
			<tr>
				<td colspan="2" class="bold text-center">Total Bobot : {{$total[0]['total_bobot']}}</td>
				<td colspan="5" class="bold text-center">Total Skor Akhir : {{$total[0]['total_score_akhir']}}</td>
			</tr>
		</table>
	</div>


</body>
</html>
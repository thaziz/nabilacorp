
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Penjualan</title>
	<style type="text/css">
		*{
			font-size: 12px;
		}
		.s16{
			font-size: 14px !important;
		}
		.div-width{
			margin: auto;
			width: 95vw;
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
		.border-none-right{
			border-right: none;
		}
		.border-none-left{
			border-left:none;
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
			top: 0;
			position: absolute;
		}
		.relative{
			position: relative;
		}
		.absolute{
			position: absolute;
		}
		.empty{
			height: 15px;
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
		.tabel table, .tabel td{
			border:1px solid black;
			

		}
		.button-group{
			position: fixed;
		}
		@media  print {
			.button-group{
				display: none;
				padding: 0;
				margin: 0;
			}
			@page  {
				size: landscape
			}
		}
		
		table.tabel th{
			white-space: nowrap;
			width: auto;
		}
		.no-border-head{
			border-top:hidden !important;
			border-left: hidden !important;
			border-right: hidden !important;
		}
		table.tabel tr {
			page-break-inside:auto; 
			page-break-after:avoid;
		}
		table.tabel {
			page-break-inside:auto;
		}


	</style>
</head>
<body>
	<div class="button-group">
		<button onclick="prints()">Print</button>
	</div>
	
		<div class="div-width">
		
						<div class="s16 bold">
							NABILA
						</div>
						<!-- <div>
							Jl. Raya Randu no.74<br>
							Sidotopo Wetan - Surabaya 60123<br>
						</div> -->
						<div class="bold" style="margin-top: 15px;">
							Laporan : Penjualan Per Barang - Detail <br>							
							Tanggal : {{$tgl1}}
						</div>
		

		<table width="100%" cellpadding="2px" class="tabel" border="1px" style="margin-bottom: 10px;">
			<thead>
				<tr>
					<th width="100px">Nama Barang</th>
					<th>No Bukti</th>
					<th>Tanggal</th>
					<!-- <th>Jatuh Tempo</th> -->
					<th>Customer</th>
					<th>Sat</th>
					<th>Qty</th>
					<th>Harga</th>
					<th>Diskon %</th>
					<th>Diskon Value</th>
					<!-- <th>DPP</th>
					<th>PPN</th> -->
					<th>Total</th>
					
				</tr>
			</thead>
			<tbody>
			@foreach( $data as $item )
				<tr>
					<td>{{ $item->i_name }}</td>
					<td>{{ $item->s_note }}</td>
					<td>{{ $item->sd_date }}</td>
					<!-- <td>{{ $item->s_finishdate }}</td> -->
					<td>{{ $item->s_nama_cus }}</td>
					<td>{{ $item->s_detname }}</td>					
					<td align="right">{{number_format($item->sd_qty,2,',','.')}}</td>
					<td align="right">{{number_format($item->sd_price,2,',','.')}}</td>
					<td align="right">{{number_format($item->sd_disc_percent,2,',','.')}}</td>
					<td align="right">{{number_format($item->sd_disc_percentvalue,2,',','.')}}</td>
					<!-- <td>0</td>
					<td>0</td> -->					
					<td align="right">{{number_format($item->sd_total,2,',','.')}}</td>
				</tr>
			@endforeach
			</tbody>

		</table>


		
		<div class="float-left" style="width: 30vw;">
			<table class="border-none" width="100%">
				<tr>
					<td>Diskon % (Rupiah)</td>
					<td>:</td>										
					<td align="right">{{number_format($total_discountPercent,2,',','.')}}</td>
				</tr>
				<tr>				
					<td>Diskon Rupiah</td>
					<td>:</td>
					<td align="right">{{number_format($total_discountvalue,2,',','.')}}</td>
				</tr>
				<tr>
					<td>DPP</td>
					<td>:</td>
					<td align="right">0,00</td>
				</tr>
				<tr>
					<td>Grand Total</td>
					<td>:</td>
					<td align="right">{{number_format($grand_total,2,',','.')}}</td>					
				</tr>
			</table>
		</div>
		
	</div>
	<script type="text/javascript">
		function prints()
		{
			window.print();
		}

	</script>
</body>
</html>
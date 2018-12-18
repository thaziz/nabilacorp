<table id="tabel_d_sales_dt" class="table tabelan table-hover table-bordered table-striped" width="100%" cellspacing="0">
    <thead>
       <tr>
          <th align="center" rowspan="2" width="1%">No</th>
          <th align="center" rowspan="2" width="3%">Tanggal</th>
          <th align="center" rowspan="2" width="15%">No Ref</th>
          <th align="center" rowspan="2"  width="17%">Pelanggan</th>                              
          <th align="center" rowspan="2"  width="15%">Piutang</th>
          <th align="center" colspan="2">Terbayar</th>            
          <th align="center" rowspan="2"  width="15%">Sisa Hutang</th>                  
       </tr>
        <tr>                                 
             <th width="13%">Tgl bayar</th>                                 
             <th  width="15%">Jml Bayar</th>
          </tr>
    </thead>
    <tbody>
    	@foreach($data as $index => $master)
    		@php
    			$detail=App\Modules\POS\model\d_receivable_dt::receivableDt($master->r_id);
    		@endphp
    		<tr>
    			<td>{{$index+1}}</td>
    			<td>{{$master->r_date}}</td>
    			<td>{{$master->r_code}}</td>
    			<td>{{$master->r_customer_name}}</td>
    			<td>{{$master->r_value}}</td>
    			@foreach($detail as $dt)
    			<tr>
    			<td>{{$dt->rd_datepay}}</td>
    			<td>{{$dt->rd_value}}</td>
    			<tr>
    			@endforeach
    		</tr>
    	@endforeach
    </tbody>
</table>
		
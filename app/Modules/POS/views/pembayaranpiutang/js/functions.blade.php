<script>
	

	 function refresh_d_receivable_dt() {
	 	$('#tgl_awal, #tgl_akhir').val('')
	 	tabel_d_receivable_dt.ajax.url("{{ url('/penjualan/penjualanmobile/find_d_receivable_dt') }}").load();
	 }
	 function find_d_receivable_dt() {
	 	var tgl_awal = $('[name="tgl_awal"]').val();
	 	var tgl_akhir = $('[name="tgl_akhir"]').val();
	 	var arg = '?tgl_awal=' + tgl_awal + '&tgl_akhir=' + tgl_akhir;
	 	var url_target =  "{{ url('/penjualan/penjualanmobile/find_d_receivable_dt') }}" + arg;
	 	tabel_d_receivable_dt.ajax.url(url_target).load();
	 }

	 function open_payment(obj) {
	 	var tr = $(obj).parents('tr');
	 	var data = tabel_d_receivable_dt.row( tr ).data();
	 	var o_payment = $('#form_payment');
	 	o_payment.find('#rd_receivable').val( 
	 		get_currency(data.r_id )
	 	);
	 	o_payment.find('#r_pay').val( 
	 		get_currency(data.r_pay )
	 	);
	 	o_payment.find('#r_value').val( data.r_value );
	 	o_payment.find('#r_code').val( data.r_code );
	 	o_payment.find('#r_ref').val( data.r_ref );
	 	o_payment.find('#p_outstanding').val( 
	 		get_currency(data.p_outstanding )
	 	);
	 }

	 function open_detail(obj) {
	 	var tr = $(obj).parents('tr');
	 	var data = tabel_d_receivable_dt.row( tr ).data();
	 	var o_detail = $('#form_detail');
	 	o_detail.find('#r_date').text( data.r_date );
		o_detail.find('#r_duedate').text( data.r_duedate );
		o_detail.find('#r_code').text( data.r_code );
		o_detail.find('#r_value').text( data.r_value );
		o_detail.find('#r_pay').text( data.r_pay );
		o_detail.find('#p_outstanding').text( data.p_outstanding );

	 }

	 function find_d_receivable_dt() {
	 	$.ajax({
		      url: "{{ url('/penjualan/pembayaranpiutang/d_receivable_dt') }}",
		      type: 'GET',
		      data: data,
		      dataType: 'json',
		      success: function (response) {
				  render_d_receivable_dt(response.data);
		      }
		});
	 }

	 function render_d_receivable_dt(d_receivable_dt) {
	 	var list_group = $('#list_d_receivable_dt');
	 	if(d_receivable_dt.length > 0) {
	 		for(x = 0;x < d_receivable_dt.length;x++) {
	 			var data = d_receivable_dt[x];
	 			var list_group_item = $('<a href="#" class="list-group-item"></a>')
	 			var rd_datepay_item = $('<h4>' + data.rd_datepay + '</h4>');
	 			var rd_value_item = $('<p>' + data.rd_value + '</p>');

	 			list_group_item.append(rd_datepay_item);
	 			list_group_item.append(rd_value_item);

	 			list_group.append(list_group_item);
	 		}
	 	}
	 	else {
	 		list_group.html('<a href="#" class="list-group-item">Belum ada pembayaran</div>')
	 	}
	 }

	 function insert_d_receivable_dt() {
	 	var data = $('#form_payment form').serialize();
	 	$.ajax({
		      url: "{{ url('/penjualan/pembayaranpiutang/d_receivable_dt') }}",
		      type: 'GET',
		      data: data,
		      dataType: 'json',
		      success: function (response) {
				  if(response) {
				  	iziToast.success({
				  		title : 'Info',
				  		message : 'Sukses menyimpan data'
				  	});
				  }
				  else {
				  	iziToast.error({
				  		title : 'Info',
				  		message : 'Gagal menyimpan data'
				  	});
				  }

				  $('#form_payment').modal('hide')
		      }
		});	
	 }

</script>
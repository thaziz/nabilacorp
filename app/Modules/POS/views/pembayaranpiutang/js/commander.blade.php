<script type="text/javascript">

     $(document).ready(function(){
          // Datepicker 
          $('#tgl_awal, #tgl_akhir, #rd_datepay').attr('autocomplete', 'off');
	      $('#tgl_awal, #tgl_akhir, #rd_datepay').datepicker({
	        format:"dd/mm/yyyy"
	      });   

	      $('#form_payment').on('hide.bs.modal', function(){
	      	$(this).find('form')[0].reset();
	      })

	      format_currency( $('#rd_value') );

			tabel_d_receivable_dt = $("#tabel_d_receivable").DataTable({
		      ajax: {
		        "url": "{{ url('/penjualan/pembayaranpiutang/find_d_receivable') }}",
		        "type": "get",
		        data: {
		          "_token": "{{ csrf_token() }}"
		        },
		      },
		      columns: [
		        { 
		        	data : null,
		        	render : function(res) {
		        		var result = moment(res.r_date).format('DD/MM/YYYY');
		        		return result;
		        	}
		        },
		        { 
		        	data : null,
		        	render : function(res) {
		        		var result = moment(res.r_duedate).format('DD/MM/YYYY');
		        		return result;
		        	}
		        },
				{ data : 'r_code'},
				{ 
					data : null,
					render : function(res) {
						return get_currency(res.r_value);
					}
				},
				{ 
					data : null,
					render : function(res) {
						return get_currency(res.r_pay);
					}
				},
				{ 
					data : null,
					render : function(res) {
						return get_currency(res.p_outstanding);
					}
				},
		        { 
		        	data : null,
		        	render : function(res) {
		        		
		        		var detail_btn = '<button id="detail_btn" onclick="open_detail(this)" class="btn btn-success btn-sm" title="detail" data-toggle="modal" data-target="#form_detail"  style="margin-right:2mm"><i class="fa fa-indent"></i></button>';
		        		var payment_btn = '<button id="payment_btn" onclick="open_payment(this)" class="btn btn-primary btn-sm" title="payment" data-toggle="modal" data-target="#form_payment"><i class="fa fa-money"></i></button>';

		        		var result = detail_btn + payment_btn;

		        		return result;
		        	}
		        },
		      ],
		      'columnDefs': [
	               {
	                  'targets': [3, 4, 5],
	                  'createdCell':  function (td) {
	                     $(td).attr('align', 'right'); 
	                  }
	               }
	            ],
		    }); 
     });
</script>
<script>
	$(document).ready(function(){

		$('#d_pcsh_divisi').select2();
		tabel_d_purchasingharian_dt = $('#tabel_d_purchasingharian_dt').DataTable({
				'columnDefs': [
	
			   		{
			   			"targets": [3, 4],
			   			"className": "text-right",
			   		}
		   		]
			});

		$('#d_pcshdt_item').select2({
		  ajax: {
		    url: '{{ url("/purchasing/belanjaharian/find_m_item") }}',
		    cache : true,
		    data: function (params) {
		      var query = {
		        keyword: params.term
		      }

		      // Query parameters will be ?search=[term]&type=public
		      return query;
		    },
		    processResults: function (res) {
		      var list = [], item;
		      for(x in res.data) {
		      	item = res.data[x];
		      	list.push({
		      		id : item.i_id,
		      		text : item.i_code + ' - ' + item.i_name,
		      		s_detname : item.s_detname,
		      		m_pbuy1 : item.m_pbuy1
		      	});
		      }

		      // Tranforms the top-level key of the response object from 'items' to 'results'
		      return {
		        results: list
		      };
		    }
		  }
		});

		$('#d_pcshdt_item').on('select2:select', function() {
			$('#d_pcshdt_qty').focus();
		})

		$('#d_pcshdt_qty').keypress(function(e){
			if(e.keyCode == 13) {
				e.preventDefault();
				if( $(this).val() == '' || $(this).val() == 0) {
					iziToast.error({
	                    title: 'Info',
	                    message: 'Jumlah tidak boleh kosong.'
	                });
				}
				else if( $('#d_pcshdt_item').val() == '' || $('#d_pcshdt_item').val() == null) {
					iziToast.error({
	                    title: 'Info',
	                    message: 'Item tidak boleh kosong'
	                });	
				}
				else {

					var item_selected = $('#d_pcshdt_item').select2('data')[0];
					var d_pcshdt_item = "<input type='hidden' name='d_pcshdt_item[]' value='" + item_selected.id + "'>" + item_selected.text;
					var d_pcshdt_qty = $(this).val();
					var s_detname = item_selected.s_detname;
					var m_pbuy1 = item_selected.m_pbuy1 ;
					var total_harga = m_pbuy1 * d_pcshdt_qty;
					var aksi = "<button onclick='remove_item(this)' type='button' class='btn btn-danger'><i class='glyphicon glyphicon-trash'></i></button";

					d_pcshdt_qty = "<input type='hidden' name='d_pcshdt_qty[]' value='" + d_pcshdt_qty + "'>" + d_pcshdt_qty;
					m_pbuy1 = "<input type='hidden' name='d_pcshdt_price[]' value='" + m_pbuy1 + "'>" + get_currency(m_pbuy1);
					total_harga = get_currency(total_harga);

					tabel_d_purchasingharian_dt.row.add(
						[d_pcshdt_item, d_pcshdt_qty, s_detname, m_pbuy1, total_harga, aksi]
					).draw();

					$(this).val('');
					var empty_option = $('<option value=""></option>');
					$('#d_pcshdt_item').append(empty_option);
					$('#d_pcshdt_item').val('').trigger('change');
				}
				$('#d_pcshdt_item').focus();
			} 
		});


		$('#tabel_d_purchasingharian_dt').on( 'draw.dt', function () {
			// Menghitung grand total pembelian 
		    var qty = $('[name="d_pcshdt_qty[]"]');
		    var price = $('[name="d_pcshdt_price[]"]');
		    var item_qty, item_price, grand_total = 0;

		    for(x = 0;x < qty.length;x++) {
		    	item_qty = parseInt( $( qty[x] ).val() );
		    	item_price = parseInt( $( price[x] ).val() );
		    	grand_total += ( item_qty * item_price );
		    }

		    $('#total_bayar').val(
		    	get_currency( grand_total )
		    );
		} );
	});
</script>
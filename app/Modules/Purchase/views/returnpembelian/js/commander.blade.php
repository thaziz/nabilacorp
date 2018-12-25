<script>
	$(document).ready(function(){
		tabel_d_purchase_return = $("#tabel_d_purchase_return").DataTable({
		      ajax: {
		        "url": "{{ url('/purchasing/returnpembelian/find_d_purchase_return') }}?",
		        "type": "get",
		        data: {
		          "_token": "{{ csrf_token() }}"
		        },
		      },
		      columns: [
		        { 
		        	data : null,
		        	render : function(res) {
		        		var date = moment(res.pr_datecreated).format('DD/MM/YYYY');
		        		return date;
		        	}
		        },
				{ data : 'pr_code' },
				{ data : 'm_name' },
				{ data : 'pr_method' },
				{ data : 's_company' },
				{ data : 'total_retur' },
				{ data : 'pr_status' },

		        { 
		        	data : null,
		        	render : function(res) {
		        		
		        		var detail_btn = '<button id="detail_btn" onclick="open_detail(this)" class="btn btn-success btn-sm" title="detail" data-toggle="modal" data-target="#form_detail"  style="margin-right:2mm"><i class="fa fa-indent"></i></button>';
		        		var payment_btn = '<button id="delete_btn" onclick="open_payment(this)" class="btn btn-primary btn-sm" title="payment" data-toggle="modal" data-target="#form_payment"><i class="fa fa-trash"></i></button>';

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
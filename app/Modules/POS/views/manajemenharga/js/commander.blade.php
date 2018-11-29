<script type="text/javascript">

	
     $(document).ready(function(){
          // Datepicker untuk rentang waktu
          $('#tgl_awal, #tgl_akhir').attr('autocomplete', 'off');
	      $('#tgl_awal, #tgl_akhir').datepicker({
	        format:"dd/mm/yyyy"
	      });   

			tabel_d_sales_dt = $("#tabel_m_price").DataTable({
		      ajax: {
		        "url": "{{ url('/penjualan/manajemenharga/find_m_price') }}",
		        "type": "get",
		        data: {
		          "_token": "{{ csrf_token() }}",
		          "tanggal1": $('#tanggal1').val(),
		          "tanggal2": $('#tanggal2').val(),
		        },
		      },
		      columns: [
		        
		        { 
		          data : null,
		          render : function(res) {
		            var content = res.i_code + ' - ' + res.i_name;
		            return content;
		          } 
		        },
				{ data : 'i_type' },
		        { data : 'g_name' },
		        { data : 'm_pbuy1' },
		        { data : 'm_pbuy2' },
		        { data : 'm_pbuy3' },
		        { 
		          data : null,
		          render : function(res) {
		            var content = "<div style='display:flex;justify-content:center'><button class='btn btn-primary'><i class='fa fa-pencil'></i></button></div>";
		            return content;
		          } 
		        }
		        
		      ]

		    }); 
     });
</script>
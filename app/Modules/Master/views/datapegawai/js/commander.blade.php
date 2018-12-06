<script>
	tabel_m_pegawai = $("#tabel_m_pegawai").DataTable({
		      ajax: {
		        "url": "{{ url('/master/datapegawai/find_m_pegawai') }}",
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
		            var content = "<div style='display:flex;justify-content:center'><button class='btn btn-primary' data-toggle='modal' data-target='#modal_tambah' onclick='open_form_edit(this)'><i class='fa fa-pencil'></i></button></div>";
		            return content;
		          } 
		        }
		        
		      ]

		    });
</script>
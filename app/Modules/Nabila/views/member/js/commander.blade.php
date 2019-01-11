<script>
	tabel_m_member = $("#tabel_m_member").DataTable({
		      ajax: {
		        "url": "{{ url('/nabila/membership/get_data_all') }}?",
		        "type": "get",
		        data: {
		          "_token": "{{ csrf_token() }}"
		        },
		      },
		      columns: [
		       
				{ data : 'm_name'},
				{ data : 'm_telp'},
				{ data : 'm_address'},
				{
					data : null,
					render : function(data) {
						var preview_btn = '<button onclick="open_preview(' + data.m_id + ')" class="btn btn-info btn-sm" title="edit" style="margin-right:2mm"><i class="fa fa-eye"></i></button>';
						var edit_btn = '<button onclick="open_form_alter(' + data.m_id + ')" class="btn btn-primary btn-sm" title="edit" style="margin-right:2mm"><i class="fa fa-pencil"></i></button>';
						var remove_btn = '<button onclick="remove_data(' + data.m_id + ')" class="btn btn-danger btn-sm" title="edit"><i class="glyphicon glyphicon-trash"></i></button>';
						var buttons = preview_btn + edit_btn + remove_btn;

						return buttons;
					}
				}
		      ]
		    }); 
</script>
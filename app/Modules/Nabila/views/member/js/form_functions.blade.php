<script>
	function insert_m_customer() {
	    var data = $('#form_m_customer').serialize();
	    $.ajax({
	      url: "{{ route('insert_m_customer') }}",
	      type: 'POST',
	      data: data,
	      dataType: 'json',
	      success: function (response) {
	        if(response.data == 'sukses') {
	          
	          iziToast.success({
	            position: "center",
	            title: '',
	            timeout: 1000,
	            message: 'Data berhasil disimpan.',
	            onClosing : function() {
	              location.reload();
	            }
	          });

	        }
	      }
	    });
	}

	function update_m_customer() {
	    var data = $('#form_m_customer').serialize();
	    $.ajax({
	      url: "{{ route('update_m_customer') }}",
	      type: 'POST',
	      data: data,
	      dataType: 'json',
	      success: function (response) {
	        if(response.status == 'sukses') {
	          
	          iziToast.success({
	            position: "center",
	            title: '',
	            timeout: 1000,
	            message: 'Data berhasil disimpan.',
	            onClosing : function() {
	              location.href = "{{ route('customer') }}";
	            }
	          });

	        }
	      }
	    });
	}
</script>
<script>
	function btnform() {
		var formdata = $('#form_m_member').serialize();
		$.ajax({
          url     :  baseUrl+'/nabila/membership/simpan_tambah',
          type    : 'GET', 
          data    :  formdata,
          dataType: 'json',
          success : function(response){    
                    
            if( response.status=='sukses'){
            	iziToast.success({
	   				position:'topRight',
	   				timeout: 2000,
	   				title: '',
	   				message: "Input data berhasil.",
	   			});
              	window.location.href = baseUrl+'/nabila/membership/index';
             }
             else {
             	iziToast.error({
	   				position:'topRight',
	   				timeout: 2000,
	   				title: '',
	   				message: "Terjadi kesalahan.",
	   			});
             }
            
          }
      });
	}

	function simpan_edit() {
		var formdata = $('#form_m_member').serialize();
		$.ajax({
          url     :  baseUrl+'/nabila/membership/simpan_edit',
          type    : 'GET', 
          data    :  formdata,
          dataType: 'json',
          success : function(response){    
                    
            if( response.status=='sukses'){
            	iziToast.success({
	   				position:'topRight',
	   				timeout: 2000,
	   				title: '',
	   				message: "Input data berhasil.",
	   			});
              	window.location.href = baseUrl+'/nabila/membership/member';
             }
             else {
             	iziToast.error({
	   				position:'topRight',
	   				timeout: 2000,
	   				title: '',
	   				message: "Terjadi kesalahan.",
	   			});
             }
            
          }
      });
	}
</script>
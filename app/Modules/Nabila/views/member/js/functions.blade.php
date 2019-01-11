<script>
	function remove_data(id) {
		iziToast.show({
        color: 'red',
        title: 'Peringatan',
        message: 'Apakah anda yakin!',
        position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
        progressBarColor: 'rgb(0, 255, 184)',
        buttons: [
            [
                '<button>Ok</button>',
                function (instance, toast) {
                    var formdata = $('#form_m_member').serialize();
		$.ajax({
          url     :  baseUrl+'/nabila/membership/delete/' + id,
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
              	
              	tabel_m_member.ajax.reload();
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
            ],
            [
                '<button>Close</button>',
                function (instance, toast) {
                    instance.hide({
                        transitionOut: 'fadeOutUp'
                    }, toast);
                }
            ]
        ]
    });
		
	}

	function open_form_alter(id) {
		location.href = '{{ url("nabila/membership/form_alter") }}/' + id;
	}
</script>
<script type="text/javascript">
var iddinamis = 0;
      $("#nama").load("/master/databarang/tambah_barang", function(){
      $("#nama").focus();
      });
      $('#tgl_lahir').datepicker({
          autoclose: true,
          format: 'dd-mm-yyyy'
        });

        $(document).ready(function(){


          $('.select').select2();
          $('.dinamis').hide();
          format_currency( $('[name="m_pbuy1"]') );
          format_currency( $('[name="m_pbuy2"]') );
          format_currency( $('[name="m_pbuy3"]') );

          $('[name="is_supplier[]"]').select2({
              width : '100%',
              ajax : {
                url : '{{ route("find_m_suplier") }}',
                datatype : 'json',
                cache : true,
                delay : 250,
                
                data: function (params) {
                  
                  var query = {
                    keyword : params.term,
                  }

                  // Query parameters will be ?search=[term]&type=public
                  return query;
                },
               processResults: function (r) {
                  data = r.data;
                  var obj = [];
                  for(x = 0;x < data.length;x++) {
                    res = data[x];
                    obj.push({
                      id : res.s_id,
                      text : res.s_company
                    });
                  }

                  console.log(obj);
                  return {
                    results: obj
                  };
                }
              }
          });

          setTimeout(function(){
            var select = $('select');
            select.each(function(){
              var val = $(this).attr('data-selected');
              var text = $(this).attr('data-text');
              if(text != undefined && text != null) {
                 var opt = $('<option value="' + val + '">' + text + '</option>');
                 $(this).append(opt); 
                 $(this).val( val ).trigger('change');
              }
              else {

                if(val != undefined && val != null) {
                  $(this).val( val ).trigger('change');
                }
              }
            });
          }, 2000);

        });

        dinamis();

        function dinamis(){
          var html = '<option value="">~ Pilih Supplier ~</option>';
          var kelompok = $('#kelompok').val();
          if (kelompok == 1 || kelompok == 3 || kelompok == 4) {
            $.ajax({
              type: 'get',
              url: baseUrl + '/master/item/supplier',
              dataType: 'json',
              success : function(result){
                for (var i = 0; i < result.length; i++) {
                  html += '<option value="'+result[i].s_id+'">'+result[i].s_company+ '-' +result[i].s_name+'</option>';
                }
                  $("#showdinamis"+iddinamis).html(html);
              }
            });
            $('.dinamis').show();
            $('.select').select2();

          } else {
            $('.dinamis').hide();
            $('.select').select2();
          }
        }

        function tambah(){
            var html;
            iddinamis += 1;
            html = $('<div class="dinamis' + iddinamis + '"><div class="col-md-2" style="margin-right: 68px;">' + '<label class="tebal">Supplier</label>' + '</div>' + '<div class="col-md-9">' + '<div class="form-group col-sm-5">'+
                                '<select class="input-sm form-control" name="is_supplier[]" id="'+iddinamis+'">'+
                                  '<option value="">~ Pilih Supplier ~</option>'+
                                '</select>' +
                                '<span style="color:#ed5565;display:none;" class="help-block m-b-none" id="supplier-error'+iddinamis+'"><small>Supplier harus diisi.</small></span>'+
                                '</div>' +
                                '<div class="col-md-2">'+
            
                                  '<label for="">Harga </label>'+
            
                                '</div>'+
                                '<div class="form-group col-sm-3">'+
                                '<input type="text" class="form-control rp" name="is_price[]" id="hargasupplier'+iddinamis+'">'+
                                '<span style="color:#ed5565;display:none;" class="help-block m-b-none" id="harga-error'+iddinamis+'"><small>Supplier harus diisi.</small></span>' + '</div>'+
                                '<div class="form-group col-sm-2">'+
                                '<button type="button" class="btn btn-primary" name="button" onclick="tambah()"> <i class="fa fa-plus"></i> </button>'+
                                '&nbsp;'+
                                '<button type="button" class="btn btn-danger" name="button" onclick="kurang('+iddinamis+')"> <i class="fa fa-minus"></i> </button>'+
                                '</div>'+
                                '</div></div>');

            format_currency( html.find("[name='is_price[]']") );
            html.find('select').select2({
              width : '100%',
              ajax : {
                url : '{{ route("find_m_suplier") }}',
                datatype : 'json',
                cache : true,
                delay : 250,
                
                data: function (params) {
                  
                  var query = {
                    keyword : params.term,
                  }

                  // Query parameters will be ?search=[term]&type=public
                  return query;
                },
               processResults: function (r) {
                  data = r.data;
                  var obj = [];
                  for(x = 0;x < data.length;x++) {
                    res = data[x];
                    obj.push({
                      id : res.s_id,
                      text : res.s_company
                    });
                  }

                  console.log(obj);
                  return {
                    results: obj
                  };
                }
              }
            });
            $('#dinamis').append(html);
            dinamis();
        }

        function kurang(iddinamis){
          $('.dinamis'+iddinamis).remove();
        }

        function simpan(){
          
            $.ajax({
              type: 'get',
              data: $('#data').serialize(),
              dataType: 'json',
              url: baseUrl + '/master/item/simpan',
              success : function(result){
                if (result.status == 'berhasil') {
                    swal({
                        title: "Berhasil",
                        text: "Data Berhasil Disimpan",
                        type: "success",
                        showConfirmButton: false,
                        timer: 900
                    });
                    setTimeout(function(){
                          window.location.reload();
                  }, 850);
                }
              }
            });
          
        }

        function perbarui(){
          
            $.ajax({
              type: 'get',
              data: $('#data').serialize(),
              dataType: 'json',
              url: baseUrl + '/master/item/update',
              success : function(result){
                if (result.status == 'berhasil') {
                    swal({
                        title: "Berhasil",
                        text: "Data Berhasil Disimpan",
                        type: "success",
                        showConfirmButton: false,
                        timer: 900
                    });
                    setTimeout(function(){
                          // window.location.reload();
                  }, 850);
                }
              }
            });
          
        }

  function validateForm() {
    var nama = document.getElementById('nama');
    var kelompok = document.getElementById('kelompok');
    var satuan = document.getElementById('satuan');
    var hargabeli = document.getElementById('hargabeli');
    var hargajual = document.getElementById('hargajual');
    var supplier = $('#showdinamis'+iddinamis).val();
    var harga = $('#hargasupplier'+iddinamis).val();

    if (nama.value == '') {
        $('#nama-error').css('display', '');
        return false;
    }
    else if (kelompok.value == '') {
        $('#kelompok-error').css('display', '');
        return false;
    }
    else if (satuan.value == '') {
        $('#satuan-error').css('display', '');
        return false;
    }
    else if (hargabeli.value == '') {
        $('#hargabeli-error').css('display', '');
        return false;
    }
    else if (hargajual.value == '') {
        $('#hargajual-error').css('display', '');
        return false;
    }
    else if (supplier.length == 0) {
        $('#supplier-error'+iddinamis).css('display', '');
        return false;
    }
    else if (harga.length == 0) {
        $('#harga-error'+iddinamis).css('display', '');
        return false;
    }

    return true;
}


</script>
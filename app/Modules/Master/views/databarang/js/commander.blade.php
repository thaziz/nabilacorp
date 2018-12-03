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
            var html = '';
            iddinamis += 1;
            html += '<div class="dinamis'+iddinamis+'"><div class="col-md-2" style="margin-right: 68px;">'+

                    '<label class="tebal">Supplier</label>'+

                    '</div>'+

                    '<div class="col-md-9">'+
                    '<div class="form-group col-sm-5">'+
                    '<select class="input-sm form-control select" name="supplier[]" id="showdinamis'+iddinamis+'">'+
                      '<option value="">~ Pilih Supplier ~</option>'+
                    '</select>'+
                    '<span style="color:#ed5565;display:none;" class="help-block m-b-none" id="supplier-error'+iddinamis+'"><small>Supplier harus diisi.</small></span>'+
                    '</div>'+
                    '<div class="col-md-2">'+

                      '<label for="">Harga </label>'+

                    '</div>'+
                    '<div class="form-group col-sm-3">'+
                    '<input type="text" class="form-control rp" name="hargasupplier[]" id="hargasupplier'+iddinamis+'">'+
                    '<span style="color:#ed5565;display:none;" class="help-block m-b-none" id="harga-error'+iddinamis+'"><small>Supplier harus diisi.</small></span>'
                    '</div>'+
                    '<div class="form-group col-sm-2">'+
                    '<button type="button" class="btn btn-primary" name="button" onclick="tambah()"> <i class="fa fa-plus"></i> </button>'+
                    '&nbsp;'+
                    '<button type="button" class="btn btn-danger" name="button" onclick="kurang('+iddinamis+')"> <i class="fa fa-minus"></i> </button>'+
                    '</div>'+
                    '</div></div>';


            $('#dinamis').append(html);
            $('.select').select2();
            $('.rp').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
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
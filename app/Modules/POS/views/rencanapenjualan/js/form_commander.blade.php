<script type="text/javascript">
  dataIndex = null;
  // Global variable
  item = null;

  
  

  function hapusPayment(e, a) {
    if (e.which === 46 && e.ctrlKey) {

      $ttlJenisPayment = 0;
      $(".nominal").each(function () {
        $ttlJenisPayment++;
      });

      if ($ttlJenisPayment == 1) {
        return false;
      }
      var par = a.parentNode.parentNode;
      $(par).remove();
      $('.nominal').focus()
    }
  }

  function btnHapusPayment(a) {
    $ttlJenisPayment = 0;
    $(".nominal").each(function () {
      $ttlJenisPayment++;
    });

    if ($ttlJenisPayment == 1) {
      return false;
    }
    var par = a.parentNode.parentNode;
    $(par).remove();
    $('.nominal').focus()
  }


  function caraxx(hutang_id) {
    if ($('#cara').val() == 6) {
      $('.hutang' + hutang_id).css('display', '')
      $('.add1').val();


    } else {
      $('.hutang').css('display', 'none')
      $('.add1').val('');
    }

  }

  function dataDetailView(s_id) {
    $('#modalDataDetail').modal('show');
    $.ajax({
      url: "{{ url('') }}" + '/penjualan/pos-toko/detail-view/' + s_id,
      type: 'GET',
      success: function (response) {
        $('.dataDetail').html('');
        $('.dataDetail').append(response);

      }
    });
  }

  function resetUlang() {
    /*$('.dataDetail').*/
  }

  function setFormDetail() {
    console.log('sebelum' + tamp);
    if (fQty.val() <= 0) {
      iziToast.error({
        position: 'topRight',
        timeout: 2000,
        title: '',
        message: "Ma'af, jumlah permintaan tidak boleh 0.",
      });
      return false;
    }
    var index = tamp.indexOf(i_id.val());
    if (index == -1) {
      var Hapus = '<button type="button" class="btn btn-sm btn-danger hapus" onclick="hapusButton(' + i_id.val() + ')"><i class="fa fa-trash-o"></i></button>';
      var vTotalPerItem = angkaDesimal(fQty.val()) * angkaDesimal(i_price.val());
      var iSalesDetail = ''; //isi
      /*iSalesDetail+='<tr>';        */
      iSalesDetail += '<tr class="detail' + i_id.val() + '">';
      iSalesDetail += '<td width="23%"><input style="width:100%" type="hidden" name="sd_item[]" value=' + i_id.val() + '>';
      iSalesDetail += '<input style="width:100%" type="hidden" name="sd_sales[]" value="">';
      iSalesDetail += '<input style="width:100%" type="hidden" name="sd_detailid[]" value="">';
      iSalesDetail += '<input value="' + $('#fComp').val() + '" style="width:100%" type="hidden" name="comp[]">';
      iSalesDetail += '<input value="' + $('#fPosition').val() + '" style="width:100%" type="hidden" name="position[]">';
      iSalesDetail += '<div style="padding-top:6px">' + i_code.val() + ' - ' + itemName.val() + '</div></td>';

      iSalesDetail += '<td width="4%"><input class="stock stock' + i_id.val() + '" style="width:100%;text-align:right;border:none" value=' + $('#stock').val() + ' readonly></td>';

      iSalesDetail += '<td width="4%" style="display:none"><input class="jumlahAwal' + i_id.val() + '" style="width:100%;text-align:right;border:none" name="jumlahAwal[]" value="0"></td>';

      iSalesDetail += '<td width="4%"><input  onblur="validationForm();setQty(event,\'fQty' + i_id.val() + '\')" onkeyup="hapus(event,' + i_id.val() + ');hitungTotalPerItem(\'' + i_id.val() + '\');" onclick="setAwal(event,\'fQty' + i_id.val() + '\')" class="move up1  alignAngka jumlah fQty' + i_id.val() + '" style="width:100%;border:none" name="sd_qty[]" value="' + SetFormRupiah(angkaDesimal(fQty.val())) + '" autocomplete="off" ></td>';

      iSalesDetail += '<td width="5%"><div style="padding-top:6px">' + s_satuan.val() + '</div></td>';

      iSalesDetail += '<td width="6%"><input class="harga' + i_id.val() + ' alignAngka" style="width:100%;border:none" name="sd_price[]" value="' + i_price.val() + '"" readonly></td>';
      
      iSalesDetail += '<td width="10%" style="display:none"><input style="width:100%;border:none" name="sd_total[]" class="totalPerItem alignAngka totalPerItem' + i_id.val() + '" readonly></td>';

      iSalesDetail += '<td width="10%""><input style="width:100%;border:none" name="sd_total_disc[]" class="totalPerItemDisc alignAngka totalPerItemDisc' + i_id.val() + '" readonly></td>';
      iSalesDetail += '<td width="3%">' + Hapus + '</td>'
      iSalesDetail += '</tr>';
      if (validationForm()) {
        bSalesDetail.append(iSalesDetail);
        $('.totalPerItem' + i_id.val()).val(SetFormRupiah(vTotalPerItem));
        $('.totalPerItemDisc' + i_id.val()).val(SetFormRupiah(vTotalPerItem));
        searchitem.focus();
        itemName.val('');
        searchitem.val('');
        fQty.val('');
        $('#stock').val('');

        tamp.push(i_id.val());


        /*
        var index = hapusSalesDt.indexOf(i_id.val());
        if(index!==-1)
        hapusSalesDt.splice(index,1);*/


        $('.reset-seach').val('');


        var arrow = {
            left: 37,
            up: 38,
            right: 39,
            down: 40
          },

          ctrl = 17;
        $('.move').keydown(function (e) {
          if (e.ctrlKey && e.which === arrow.right) {
            setDatePicker();
            var index = $('.move').index(this) + 1;
            $('.move').eq(index).focus();

          }
          if (e.ctrlKey && e.which === arrow.left) {
            setDatePicker();
            var index = $('.move').index(this) - 1;
            $('.move').eq(index).focus();
          }
          if (e.ctrlKey && e.which === arrow.up) {
            setDatePicker();
            var upd = $(this).attr('class').split(' ')[1];
            var index = $('.' + upd).index(this) - 1;
            $('.' + upd).eq(index).focus();
          }
          if (e.ctrlKey && e.which === arrow.down) {
            setDatePicker();
            var upd = $(this).attr('class').split(' ')[1];
            var index = $('.' + upd).index(this) + 1;
            $('.' + upd).eq(index).focus();
          }

        });


      }

    } else {
      var updateQty = 0;
      var updateTotalPerItem = 0;
      var fStok = parseFloat(angkaDesimal($('.stock' + i_id.val()).val()));
      var a = 0;
      var b = 0;

      a = angkaDesimal($('.fQty' + i_id.val()).val()) || 0;

      b = angkaDesimal(fQty.val()) || 0;


      updateQty = SetFormRupiah(parseFloat(a) + parseFloat(b));
      
        $('.fQty' + i_id.val()).val(updateQty)
        itemName.val('');
        fQty.val('');
        $('#stock').val('');
        searchitem.val('');
        searchitem.focus();
        // hitungTotalPerItem(i_id.val());
        $('.reset-seach').val('');
      
    }
    console.log('setelah' + tamp);
  }

  function hapusButton(a) {
    a = '' + a;
    hapusSalesDt.push(a);
    $('.detail' + a).remove();
    var index = tamp.indexOf('' + a);
    if (index !== -1)
      tamp.splice(index, 1);
    totalPerItem();
    buttonDisable();


  }  

  $(document).ready(function () {
    tSalesDetail = $('#tSalesDetail').DataTable(
      {
        columnDefs : [
          {
            'targets' : 2,
            'createdCell' : function(td) {
                var spdt_qty = $(td).find('[name="spdt_qty[]"]');
                if(spdt_qty.length > 0) {
                  spdt_qty.on('change keyup', function(){
                    var tr = $(this).parents('tr');
                    var price = tr.find('[name="price[]"]').val();
                    var qty = $(this).val();
                    var total = get_currency(price * qty); 
                    tr.find('td:eq( 5 )').text(total);
                    count_total();
                  })
                }
            }
          },
          {
            'targets' : 4,
            'createdCell' : function(td) {
                var remove_btn = $(td).find('button');
                if(remove_btn.length > 0) {
                  remove_btn.click(function(){
                    var tr = $(this).parents('tr');
                    tSalesDetail.row(tr).remove().draw();
                  });
                }
            }
          },
          {
            'targets' : [1, 2],
            'className' : 'text-right'
          },
        ]
      }
    );
    tSalesDetail.on('draw.dt', function(){
      count_total();
    });
    //define class dan id
    searchitem = $("#searchitem");
    i_id = $("#i_id");
    i_code = $("#i_code");
    itemName = $("#itemName");
    fQty = $("#fQty");
    cQty = $("#cQty");

    s_satuan = $('#s_satuan');
    bSalesDetail = $(".bSalesDetail");
    i_price = $('#i_price');

    index = 0;
    tamp = [];
    flag = 'TOKO';
    dataIndex = 1;

    hapusSalesDt = [];


      /*d.toLocaleString();*/
      $('#tanggal1').datepicker({
            format:"dd-mm-yyyy",        
            autoclose: true,
      });
      $('#tanggal2').datepicker({
            format:"dd-mm-yyyy",        
            autoclose: true,
      });

    $("#searchitem").autocomplete({

      source: "{{ url('penjualan/rencanapenjualan/rencana') }}" + '/find_m_item',
      minLength: 1,
      dataType: 'json',
      select: function (event, ui) {
        item = ui.item;
        $('#d_pcshdt_qty').focus();
        $('#stock').val(item.stok);
      }
    });

    $('#searchitem').keypress(function (e) {
      if (e.which == 13 || e.keyCode == 13) {
        $('#d_pcshdt_qty').focus();

      }
    });
    
    $('#d_pcshdt_qty').keypress(function (e) {
      if (e.which == 13 || e.keyCode == 13) {
        e.preventDefault();
        var is_exists = $('[name="spdt_item[]"][value="' + item.i_id + '"]').length;
        if(is_exists < 1) {
          var spdt_item = "<input type='hidden' name='spdt_item[]' value='" + item.i_id + "'>" + item.item;
          var spdt_qty = "<input type='number' class='form-control' name='spdt_qty[]' value='" + $(this).val() + "'>";
          var stok = item.stok;
          var satuan = item.satuan;

          var aksi = "<button class='btn btn-danger' type='button'><i class='glyphicon glyphicon-trash'></i></button>";
          tSalesDetail.row.add(
            [spdt_item, stok, spdt_qty, satuan, aksi]
          ).draw();

          
        }  
        else {
          var existing_item = $('[name="spdt_item[]"][value="' + item.i_id + '"]');
          var tr = existing_item.parents('tr');
          var spdt_qty = tr.find('[name="spdt_qty[]"]');
          var price = tr.find('[name="price[]"]');
          var total = tr.find('td:eq( 5 )');
          var qty_amount = parseInt( $(this).val() ) + parseInt( spdt_qty.val() );
          // memproses data
          spdt_qty.val( 
            qty_amount 
          );
          total.text(
            get_currency( qty_amount * price.val() )
          );

        }
        $(this).val('');
        $('#stock').val('')
        $("#searchitem").val('');
        $("#searchitem").focus();
      }
    });

    var arrow = {
        left: 37,
        up: 38,
        right: 39,
        down: 40
      },

      ctrl = 17;
    $('.minu').keydown(function (e) {
      if (e.ctrlKey && e.which === arrow.right) {

        var index = $('.minu').index(this) + 1;
        $('.minu').eq(index).focus();

      }
      if (e.ctrlKey && e.which === arrow.left) {
        /*if (e.keyCode == ctrl && arrow.left) {*/
        var index = $('.minu').index(this) - 1;
        $('.minu').eq(index).focus();
      }
    });

    $("#customer").autocomplete({
      source: "{{ url('') }}" + '/customer',
      minLength: 1,
      dataType: 'json',
      select: function (event, ui) {
        $('#customer').val(ui.item.label);
        $('#s_customer').val(ui.item.c_id);
        /*$('#biaya_kirim').focus();*/


      }
    });

  });

  $('#s_date').datepicker({
    format: "dd-mm-yyyy",
    autoclose: true,
  });

  /*function tgl(){
    $('#s_machine').focus();
  }*/


  //fungsi barcode


  $('#fQty').keypress(function (e) {
    if (e.which == 13 || e.keyCode == 13) {
      // setFormDetail();
      // totalPerItem();
    }
  });



  


  /*$('#add').live('click',function(e){ 
    $(this).closest('tr').remove();    
    
  })*/

  payment();




  /*function g(){
    $('.reset-seach').val('');      
  }*/

  var arrow = {
      left: 37,
      up: 38,
      right: 39,
      down: 40
    },

    ctrl = 17;
  $('.move').keydown(function (e) {
    if (e.ctrlKey && e.which === arrow.right) {
      setDatePicker();
      var index = $('.move').index(this) + 1;
      $('.move').eq(index).focus();
    }
    if (e.ctrlKey && e.which === arrow.left) {
      setDatePicker();
      var index = $('.move').index(this) - 1;
      $('.move').eq(index).focus();
    }
    if (e.ctrlKey && e.which === arrow.up) {
      setDatePicker();
      var upd = $(this).attr('class').split(' ')[1];
      var index = $('.' + upd).index(this) - 1;
      $('.' + upd).eq(index).focus();
    }
    if (e.ctrlKey && e.which === arrow.down) {
      setDatePicker();
      var upd = $(this).attr('class').split(' ')[1];
      var index = $('.' + upd).index(this) + 1;
      $('.' + upd).eq(index).focus();
    }
  });

  function setDatePicker() {
    $('#s_date').datepicker('hide');
  }

  function dataDetailView(s_id, s_note, s_machine, s_date, s_duedate, s_finishdate, s_gross, s_disc_percent, s_disc_value, s_grand, s_ongkir, s_bulat, s_net, s_bayar, s_kembalian, s_customer, c_name, s_status, chek, s_jenis_bayar) {
    $('#txt_span_status').text(s_status);
    $('#lCode').text(s_note);
    $('#lTgl').text(s_date);
    $('#lCustomer').text(c_name);
    var c_bayar
    if (s_jenis_bayar == 1) {
      c_bayar = 'Tunai';
    } else {
      c_bayar = 'Tempo';
    }
    $('#lBayar').text(c_bayar);
    $('#lTempo').text(s_duedate);
    $('#lJadi').text(s_finishdate);
    $('#lSubttl').text(s_gross);
    $('#lDiskon').text(SetFormRupiah(s_disc_value + s_disc_percent));
    $('#lBkirim').text(s_ongkir);
    $('#lTtl').text(s_net);
    $('#lBiaya').text(s_bayar);

    $('#modalDataDetail').modal('show');
    $.ajax({
      url: "{{ url('') }}" + '/penjualan/pos-pesanan/detail-view/' + s_id,
      type: 'GET',
      success: function (response) {
        $('.dataDetail').html('');
        $('.dataDetail').append(response);

      }
    });
  }

  function modalShow() {


    $('#proses').on("shown.bs.modal", function (e) {
      $('#biaya_kirim').focus();

    });
    $('#proses').modal('show');

  }

  $(document).keydown(function (e) {

    if (e.which == 121 && e.ctrlKey) {
      if ($('#proses').is(':visible') == false) {
        if ($('#grand_biaya').val() != '' && $('#grand_biaya').val() != '0') {
          modalShow();
        } else {
          iziToast.error({
            position: 'topRight',
            timeout: 1500,
            title: '',
            message: "Ma'af, Data yang di masukkan belum sempurna.",
          });


        }
      } else if ($('#proses').is(':visible') == true) {
        $chekTotal = angkaDesimal($('#akumulasiTotal').val()) - angkaDesimal($('#totalBayar').val());

        if ($chekTotal <= 0) {
          var textIzi = '';
          if ($('#s_id').val() == '') {
            textIzi = "Apakah anda yakin menyimpan sebagai final?";

          } else if ($('#s_id').val() != '') {
            textIzi = "Apakah anda yakin Mengupdate sebagai final?"
          }
          /*iziToast.show({
                       theme: 'dark',
                       position:'center',
                       timeout: 15000,
                       progressBarColor: 'rgb(0, 255, 184)',
                       title: '',
                       message: textIzi,
                       buttons: [
                         ['<button>Simpan</button>', function (instance, toast) {   
                             instance.hide({
                                 transitionOut: 'fadeOutUp',
                                 onClosing: function(instance, toast, closedBy){
                                 }
                             }, toast, 'buttonName');
                             if($('#s_id').val()==''){
                                 simpanPos('final');
                               }else if($('#s_id').val()!=''){
                                 perbaruiData();
                               }
                         }, true], // true to focus
                         ['<button>Tutup</button>', function (instance, toast) {
                             instance.hide({
                                 transitionOut: 'fadeOutUp',
                                 onClosing: function(instance, toast, closedBy){                               
                                 }
                             }, toast, 'buttonName');
                           }]
                         ],
                     });
     */
          if ($('#s_id').val() == '') {
            simpanPos('final');
          } else if ($('#s_id').val() != '') {
            perbaruiData();
          }
        } else {
          iziToast.error({
            position: 'topRight',
            timeout: 1500,
            title: '',
            message: "Ma'af, jumlah pembayaran belum sesuai",
          });
        }

      }
    } else if (e.which == 120 && e.ctrlKey) {

      if ($('#s_id').val() != '') {
        iziToast.error({
          position: 'topRight',
          timeout: 1500,
          title: '',
          message: "Ma'af, data telah di simpan sebagai draft.",
        });
        return false;
      }
      if ($('#grand_biaya').val() != '' && $('#grand_biaya').val() != '0') {

        /*iziToast.show({
                       theme: 'dark',
                       position:'center',
                       timeout: 15000,
                       progressBarColor: 'rgb(0, 255, 184)',
                       title: '',
                       message: "Apakah anda yakin menyimpan sebagai draft?",
                       buttons: [
                         ['<button>Simpan</button>', function (instance, toast) {   
                             instance.hide({
                                 transitionOut: 'fadeOutUp',
                                 onClosing: function(instance, toast, closedBy){
                                 }
                             }, toast, 'buttonName');
                             simpanPos('draft');  
     
                         }, true], // true to focus
                         ['<button>Tutup</button>', function (instance, toast) {
                             instance.hide({
                                 transitionOut: 'fadeOutUp',
                                 onClosing: function(instance, toast, closedBy){                               
                                 }
                             }, toast, 'buttonName');
                           }]
                         ],
     
     
                     });*/
        simpanPos('draft');
      } else {
        iziToast.error({
          position: 'topRight',
          timeout: 2000,
          title: '',
          message: "Ma'af, Data yang di masukkan belum sempurna.",
        });
        $('#searchitem').focus();

      }
    } else if (e.which == 27) {
      batal();
    }

  })

</script>
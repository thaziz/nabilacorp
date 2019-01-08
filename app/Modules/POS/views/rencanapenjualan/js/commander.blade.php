<script type="text/javascript">
  dataIndex = null;

  // Function untuk meng-insert sales plan
  function insert_sales_plan() {
    var data = $('#form_sales_plan').serialize();
    $.ajax({
      url: "{{ url('/penjualan/rencanapenjualan/simpan') }}",
      type: 'GET',
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

  // Function untuk memperbarui sales plan
  function perbarui_sales_plan() {
    var data = $('#form_sales_plan').serialize();
    $.ajax({
      url: "{{ url('/penjualan/rencanapenjualan/perbarui') }}",
      type: 'GET',
      data: data,
      dataType: 'json',
      success: function (response) {
        if(response.data == 'sukses') {
          
          iziToast.success({
            position: "center",
            title: '',
            timeout: 1000,
            message: 'Data berhasil diperbarui',
            onClosing : function() {
              location.href = "{{ url('/penjualan/rencanapenjualan/rencana') }}";
            }
          });

        }
      }
    });
  }

  // Function untuk menghitung grand total ketika menambahkan atau mengurangi item
  function totalPerItem() {
    var sd_qty_item = $('[name="sd_qty[]"]');
    var sd_qty, row, sd_price;
    var grand_total = 0;
    if(sd_qty_item.length > 0) {
      for(x = 0;x < sd_qty_item.length;x++) {
        sd_qty = $( sd_qty_item[x] );
        row = sd_qty.parents('tr');
        sd_price = row.find('[name="sd_price[]"]');
        grand_total += (parseInt( sd_qty.val() ) + parseInt( sd_price.val() ));
      }
    }

    $('#grand_biaya').val(grand_total);
  }

  function buttonSimpanPos($status) {

    if ($('#s_id').val() != '' && $status == 'draft') {
      iziToast.error({
        position: 'topRight',
        timeout: 1500,
        title: '',
        message: "Ma'af, data telah di simpan sebagai draft.",
      });
      return false;
    }


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
        if ($('#s_id').val() == '') {
          simpanPos('final');
        } else if ($('#s_id').val() != '') {
          perbaruiData();
        }

        /*simpanPos($status);*/
      } else {
        iziToast.error({
          position: 'topRight',
          timeout: 1500,
          title: '',
          message: "Ma'af,.",
        });
      }

    }
  }

  function tambah() {
    $('#penjualan').tab('show');
    $('.reset-seach').val('');
  }

  function addf2(e) {
    {
      if (e.keyCode == 113) {
        payment();
      }
    }

  }

  function payment() {
    $html = '';
    $html += '<td>' +
      '<input class="minu mx f2 nominal alignAngka nominal' + dataIndex + '" style="width:90%" type="" name="sp_nominal[]"' +
      'id="nominal" onkeyup="hapusPayment(event,this);addf2(event);totalPembayaran(\'nominal' + dataIndex + '\');rege(event,\'nominal' + dataIndex + '\')"' + 'onblur="setRupiah(event,\'nominal' + dataIndex + '\')" onclick="setAwal(event,\'nominal' + dataIndex + '\')"' +
      'autocomplete="off">' +
      '</td>' +
      '<td>' +
      '<button type="button" class="btn btn-sm btn-danger hapus" onclick="btnHapusPayment(this)"  ><i class="fa fa-trash-o">' +
      '</i></button>' +
      '</td>' +
      '</tr>';

    $('.tr_clone').append($html);

    dataIndex++;

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
      if (e.ctrlKey && e.which === arrow.up) {

        var upd = $(this).attr('class').split(' ')[1];

        var index = $('.' + upd).index(this) - 1;
        $('.' + upd).eq(index).focus();
      }
      if (e.ctrlKey && e.which === arrow.down) {

        var upd = $(this).attr('class').split(' ')[1];

        var index = $('.' + upd).index(this) + 1;
        $('.' + upd).eq(index).focus();

      }
    });


  }


  function nextFocus(e, id) {

  }

  function buttonDisable() {
    if (tamp.length > 0) {
      $('.btn-disabled').removeAttr('disabled');
    } else {
      $('.btn-disabled').attr('disabled', 'disabled');
    }
  }

  function validationForm() {
    // $chekDetail = 0;
    // for (var i = 0; i < tamp.length; i++) {
    //   if ($('.fQty' + tamp[0]).val() == '' || $('.fQty' + tamp[0]).val() == '0') {
    //     $chekDetail++;
    //   }
    // }
    // if ($chekDetail > 0) {
    //   iziToast.error({
    //     position: 'topRight',
    //     timeout: 2000,
    //     title: '',
    //     message: "Maaf, data detail belum sesuai.",
    //   });
    //   $('.btn-disabled').attr('disabled', 'disabled');
    //   $('.fQty' + tamp[0]).focus();
    //   $('.fQty' + tamp[0]).css('border', '2px solid red');
    //   return false;
    // } else {
    //   $('.fQty' + tamp[0]).css('border', 'none');
    //   $('.btn-disabled').removeAttr('disabled');
    //   return true;
    // }
    return true;
  }


  function simpanPos(status = '') {
    $('#totalBayar').removeAttr('disabled');
    $('#kembalian').removeAttr('disabled');
    $('.btn-disabled').attr('disabled', 'disabled');


    var formPos = $('#dataPos').serialize();
    $.ajax({
      url: "{{ url('') }}" + '/penjualan/pos-toko/create',
      type: 'GET',
      data: formPos + '&status=' + status,
      dataType: 'json',
      success: function (response) {

        if (response.status == 'sukses') {
          $('.tr_clone').html('');
          payment();
          tamp = [];
          hapusSalesDt = [];
          $('#kembalian').attr('disabled', 'disabled');
          $('#totalBayar').attr('disabled', 'disabled');
          tablex.ajax.reload();
          bSalesDetail.html('');
          $('.reset').val('');
          $('#proses').modal('hide');

          iziToast.success({
            position: "center",
            title: '',
            timeout: 1000,
            message: 'Data berhasil disimpan.'
          });


          $('#s_date').val('{{date("d-m-Y")}}');
          $('#s_created_by').val('{{Auth::user()->m_name}}');
          $('#s_date').focus();
          if (response.s_status == 'final') {


            qz.findPrinter("POS-80");
            window['qzDoneFinding'] = function () {
              var p = document.getElementById('printer');
              var printer = qz.getPrinter();
              window['qzDoneFinding'] = null;
            };


            $.ajax({
              url: "{{ url('') }}" + '/penjualan/pos-toko/printNota/' + response.s_id,
              type: 'get',
              data: formPos + '&status=' + status,
              success: function (response) {

                qz.appendHTML(
                  '<html>' + response + '</html>'
                );
                qz.printHTML();
              }
            })


          }
        } else if (response.status == 'gagal') {
          $('.btn-disabled').removeAttr('disabled');
          $('#kembalian').attr('disabled', 'disabled');
          $('#totalBayar').attr('disabled', 'disabled');

          iziToast.error({
            position: 'topRight',
            timeout: 2000,
            title: '',
            message: response.data,
          });


        }
      }
    });
  }


  function perbaruiData() {
    $('#kembalian').removeAttr('disabled');
    $('#totalBayar').removeAttr('disabled');
    $('#btn-disabled').attr('disabled', 'disabled');

    var formPos = $('#dataPos').serialize();
    $.ajax({
      url: "{{ url('') }}" + '/penjualan/pos-toko/update',
      type: 'GET',
      data: formPos + '&hapusdt=' + hapusSalesDt,
      dataType: 'json',
      success: function (response) {
        $('.tr_clone').html('');
        payment();
        tamp = [];
        hapusSalesDt = [];
        if (response.status == 'sukses') {
          $('#kembalian').attr('disabled', 'disabled');
          $('#totalBayar').attr('disabled');
          tablex.ajax.reload();
          bSalesDetail.html('');
          $('.reset').val('');
          $('#s_date').val('{{date("d-m-Y")}}');
          $('#s_created_by').val('{{Auth::user()->m_name}}');
          $('#proses').modal('hide');
          $('.perbarui').css('display', 'none');
          /*$('.perbarui').attr('disabled');*/
          $('.final').css('display', '');
          $('.draft').css('display', '');

          if (response.s_status == 'final') {
            var childwindow = window.open("{{ url('') }}" + '/penjualan/pos-toko/printNota/' + response.s_id, '_blank');
          }

        } else if (response.status == 'gagal') {
          $('.btn-disabled').removeAttr('disabled');
          alert(response.data);
          $('#totalBayar').attr('disabled', 'disabled');
          $('#kembalian').attr('disabled', 'disabled');

        }
      }
    });
  }


  function detail(s_id) {
    var statusPos = $('#s_status').val();
    dataIndex = 1;
    $.ajax({
      url: "{{ url('') }}" + '/penjualan/pos-toko/' + s_id + '/edit',
      type: 'GET',
      data: {
        "_token": "{{ csrf_token() }}",
        "s_status": statusPos,
      },

      /*dataType: 'json',*/
      success: function (response) {

        $('.perbarui').css('display', '');
        $('.perbarui').removeAttr('disabled');
        $('.final').css('display', 'none');
        $('.draft').css('display', 'none');
        bSalesDetail.html('');
        bSalesDetail.append(response);
        $.ajax({
          url: "{{ url('') }}" + '/paymentmethod/edit/' + s_id + '/a',
          type: 'GET',
          success: function (response) {
            $('.tr_clone').html('');
            $('.tr_clone').append(response.view);
            dataIndex = response.jumlah;
            dataIndex++;


          }
        });


      }

    });

  }

  function batal() {
    bSalesDetail.html('');
    $('.tr_clone').html('');
    payment();
    $('.reset').val('');
    $('#s_date').val('{{date("d-m-Y")}}');
    $('#s_created_by').val('{{Auth::user()->m_name}}');
    tamp = [];
    hapusSalesDt = [];
    $('.perbarui').css('display', 'none');
    /*$('.perbarui').attr('disabled');*/
    $('.final').css('display', '');
    $('.draft').css('display', '');
    dataIndex = 1;

    $('#s_date').focus();
  }
  

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


  function table() {
    tablex = $("#tableListToko").DataTable({
      responsive: true,
      "language": dataTableLanguage,
      processing: true,
      ajax: {
        "url": "{{ url('/penjualan/rencanapenjualan/find_d_sales_plan') }}",
        "type": "get",
        data: {
          "_token": "{{ csrf_token() }}",
          "type": "toko",
          "tanggal1": $('#tanggal1').val(),
          "tanggal2": $('#tanggal2').val(),
        },
      },
      columns: [
        { 
          data : null,
          render : function(res) {
            var date = new Date(res.sp_date);
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();

            var content = day + '/' + month + '/' + year;
            return content;
          } 
        },
        { data : 'sp_code' },
        { 
          data : null,
          render : function(res) {
            var currency = get_currency( res.total_harga );
            var content = 'RP ' + currency;
            return content;
          }
        },
        { 
            data : null,
            render : function(res) {
              var content = '<div style="display:flex;justify-content:center"><button id="edit" style="margin-right:1mm" onclick="location.href=\'{{ url("/penjualan/rencanapenjualan/form_perbarui") }}/' + res.sp_id + '\'" class="btn btn-warning btn-xs" title="Edit" type="button"><i class="glyphicon glyphicon-pencil"></i></button><button id="delete" onclick="hapus(' + res.sp_id + ')" class="btn btn-danger btn-xs" title="Hapus" type="button"><i class="glyphicon glyphicon-trash"></i></button></div>';

              return content;
            }
        }
      ],
      'columnDefs': [{
        "targets": 2,
        "className": "text-right",
      }],
      "rowCallback": function (row, data, index) {

        /*$node = this.api().row(row).nodes().to$();*/

        if (data['s_status'] == 'draft') {
          $('td', row).addClass('warning');
        }
      }

    });
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


  function hapus(id) {
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
                  instance.hide({
                    transitionOut: 'fadeOutUp'
                  }, toast);
                  
                  $.ajax({
                       type: "get",
                       url: '{{ url("/penjualan/rencanapenjualan/hapus") }}/' + id,
                       success: function(response){
                            if (response.status =='sukses') {
                              toastr.info('Data berhasil di hapus.');
                              tablex.ajax.reload();
                            }
                            else {

                              toastr.error('Data gagal di simpan.');
                            }
                          }
                       })
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
      source: "{{ url('') }}" + '/item',
      minLength: 1,
      dataType: 'json',
      select: function (event, ui) {
        $('#i_id').val(ui.item.i_id);
        $('#i_code').val(ui.item.i_code);
        $('#searchitem').val(ui.item.label);
        $('#itemName').val(ui.item.item);
        $('#i_price').val(ui.item.i_price);

        $('#fComp').val(ui.item.comp);
        $('#fPosition').val(ui.item.position);

        $('#s_satuan').val(ui.item.satuan);
        var jumlah = 0;


        if ($('.jumlahAwal' + i_id.val()).val() != undefined && $('.jumlahAwal' + i_id.val()).val() != 0) {
          /*jumlah=parseFloat(ui.item.stok)+parseFloat($('.jumlahAwal'+i_id.val()).val());*/
          if ($('#s_status').val() == 'final') {
            jumlah = parseFloat(angkaDesimal(ui.item.stok)) + parseFloat(angkaDesimal($('.jumlahAwal' + i_id.val()).val()));

            $('#stock').val(SetFormRupiah(jumlah));
          } else if ($('#s_status').val() == 'draft') {

            $('#stock').val(ui.item.stok);
          }


        } else {
          $('#stock').val(ui.item.stok);

        }

        fQty.val(1);
        cQty.val(1);
        fQty.focus();

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
  $('#searchitem').keypress(function (e) {
    if (e.which == 13 || e.keyCode == 13) {
      var code = $('#searchitem').val();
      $.ajax({
        url: "{{ url('') }}" + "/item/search-item/code",
        type: 'get',
        dataType: 'json',
        data: {
          code: code
        },
        success: function (response) {

          $('#i_id').val(response[0].i_id);
          $('#i_code').val(response[0].i_code);
          $('#searchitem').val(response[0].label);
          $('#itemName').val(response[0].item);
          $('#i_price').val(response[0].i_price);

          $('#s_satuan').val(response[0].satuan);
          var jumlah = 0;

          if ($('.jumlahAwal' + i_id.val()).val() != undefined) {
            /*jumlah=parseFloat(response[0].stok)+parseFloat($('.jumlahAwal'+i_id.val()).val());
            $('#stock').val(response[0]); */
            if ($('#s_status').val() == 'final') {
              jumlah = parseFloat(angkaDesimal(response[0].stok)) + parseFloat(angkaDesimal($('.jumlahAwal' + i_id.val()).val()));
              $('#stock').val(SetFormRupiah(jumlah));
            } else if ($('#s_status').val() == 'draft') {
              $('#stock').val(response[0].stok);
            }

          } else {
            $('#stock').val(response[0].stok);
          }

          fQty.val(1);
          fQty.focus();


        }
      })
    }
  });


  $('#fQty').keypress(function (e) {
    if (e.which == 13 || e.keyCode == 13) {
      setFormDetail();
      totalPerItem();
    }
  });


  var tablex;
  setTimeout(function () {

    table();
  }, 1500);

  


  /*$('#add').live('click',function(e){ 
    $(this).closest('tr').remove();    
    
  })*/

  payment();


  $('#fQty').keyup(function (e) {

    if ($('#cQty').val() === '1' && e.which != 13) {
      $('#cQty').val('');
      $('#fQty').val($('#fQty').val().substring(1));
    }
  })

  $('#searchitem').click(function () {
    $('.reset-seach').val('');
  });

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
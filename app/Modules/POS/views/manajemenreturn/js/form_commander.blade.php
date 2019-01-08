<script type="text/javascript">
   $(document).ready(function() {
     //fix to issue select2 on modal when opening in firefox
     $.fn.modal.Constructor.prototype.enforceFocus = function() {};
   
     var extensions = {
         "sFilterInput": "form-control input-sm",
         "sLengthSelect": "form-control input-sm"
     }
     // Used when bJQueryUI is false
     $.extend($.fn.dataTableExt.oStdClasses, extensions);
     // Used when bJQueryUI is true
     $.extend($.fn.dataTableExt.oJUIClasses, extensions);
   
     $('.datepicker').datepicker({
       format: "mm-yyyy",
       viewMode: "months",
       minViewMode: "months"
     });
   
     //autofill
     $('#pilih_metode_return').change(function() {
       //remove child div inside appending-form before appending
       $('#appending-form div').remove();
       var method = $(this).val();
       var methodTxt = $(this).text();
       if (method == "")  {
           //alert("Mohon untuk Memilih salah satu dari metode return pembelian")
           $('#appending-form div').remove();
       }
       else if(method == "TB")
       {
         //remove child div inside appending-form before appending
         $('#appending-form div').remove();
         $('#appending-form').append(
                                   '<div class="col-md-12 col-sm-12 col-xs-12 tamma-bg" style="margin-bottom: 10px; padding-top:25px;padding-bottom:20px;">'
                                     +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                       +'<label class="tebal">Nota Penjualan<font color="red">*</font></label>'
                                     +'</div>'
                                     +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                       +'<div class="form-group">'
                                         +'<select class="form-control input-sm select2" id="cari_nota_sales" name="id_sales" style="width: 100% !important;">'
                                           +'<option> - Pilih Nota Penjualan</option>'+
                                          
                                         '</select>'
                                       +'</div>'
                                     +'</div>'
                                     
                                     +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                       +'<label class="tebal">Tanggal Return</label>'
                                     +'</div>'
                                     +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                       +'<div class="form-group">'
                                         +'<input id="tanggalReturn" class="form-control input-sm datepicker2 " name="tanggal" type="text" value="{{ date('d-m-Y') }}">'
                                       +'</div>'
                                     +'</div>'
                                     +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                       +'<label class="tebal">Metode Pembayaran</label>'
                                     +'</div>'
                                     +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                       +'<div class="form-group">'
                                         +'<input type="text" name="pm_name" readonly="" class="form-control input-sm" id="pm_name">'
                                       +'</div>'
                                     +'</div>'
                                     +'</div>'                                   
                                      +'<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px; padding-top:25px;padding-bottom:20px;">'
                                     +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                       +'<label class="tebal">Detail Pelanggan</label>'
                                     +'</div>'
                                     +'<div class="col-md-10 col-sm-9 col-xs-12">'
                                       +'<div class="form-group">'
                                         +'<input type="text" name="c_name" readonly="" class="form-control input-sm" id="c_name">'
                                         +'<input type="hidden" name="idSup" readonly="" class="form-control input-sm" id="id_sup">'
                                       +'</div>'
                                     +'</div>'
                                     +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                       +'<label class="tebal">Total Tukar</label>'
                                     +'</div>'
                                     +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                       +'<div class="form-group">'
                                         +'<input type="text" name="t_return" readonly="" class="form-control input-sm" id="t_return" value="">'
                                       +'</div>'
                                     +'</div>'
                                     +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                       +'<label class="tebal">S Gross</label>'
                                     +'</div>'
                                     +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                       +'<div class="form-group">'
                                         +'<input type="text" name="s_gross" readonly="" class="form-control input-sm" id="s_gross">'
                                       +'</div>'
                                     +'</div>'
                                     +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                       +'<label class="tebal">Total Diskon</label>'
                                     +'</div>'
                                     +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                       +'<div class="form-group">'
                                         +'<input type="text" name="total_diskon" readonly="" class="form-control input-sm totalGross" id="total_diskon">'
                                         +'<input type="hidden" name="total_value" readonly="" class="form-control input-sm total_value" id="total_value">'
                                         +'<input type="hidden" name="total_percent" readonly="" class="form-control input-sm total_percent" id="total_percent">'
                                       +'</div>'
                                     +'</div>'
                                     +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                       +'<label class="tebal">Total Penjualan (Nett)</label>'
                                     +'</div>'
                                     +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                       +'<div class="form-group">'
                                         +'<input type="text" name="s_net" readonly="" class="form-control input-sm totalGross" id="s_net">'
                                       +'</div>'
                                     +'</div>'
                                     +'</div>'
   
                                     +'<div class="table-responsive">'
                                       +'<table class="table tabelan table-bordered" id="tabel-return-sales" width="100%">'
                                         +'<form method="GET" id="form_create">'
                                           +'{{ csrf_field() }}'
                                           +'<thead>'
                                             +'<tr>'
                                                 +'<th width="18%">Nama</th>'                     
                                                 +'<th width="2%">Tukar</th>'
                                                 +'<th width="2%">Satuan</th>'                    
                                                 +'<th width="10%">Harga</th>'
                                                 +'<th width="5%">Disc Percent</th>'
                                                 +'<th width="9%">Disc Value</th>'                
                                                 +'<th width="11%">Total</th>'
                                                 +'<th width="6%">Desc</th>'
                                             +'</tr>'
                                           +'</thead>'
                                           +'<tbody id="dataDt">'
                                           +'</tbody>'
                                         +'</form>'
                                       +'</table>'
                                     +'</div>'
   
                                       +'<div align="right" style="padding-top: 15px;">'
                                         +'<div id="div_button_save" class="form-group">'
                                           +'<button type="button" id="button_save" class="btn btn-primary" onclick="simpanReturn()">Simpan Data</button>'
                                         +'</div>'
                                       +'</div>');
       }
       else if(method == "PN")
       {
         //remove child div inside appending-form before appending
         $('#appending-form div').remove();
         $('#appending-form').append(
                                   '<div class="col-md-12 col-sm-12 col-xs-12 tamma-bg" style="margin-bottom: 10px; padding-top:25px;padding-bottom:20px;">'
                                     // +'<form id="data-return">'
                                     +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                       +'<label class="tebal">Nota Penjualan<font color="red">*</font></label>'
                                     +'</div>'
                                     +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                       +'<div class="form-group">'
                                         +'<select class="form-control input-sm select2" id="cari_nota_sales" name="id_sales" style="width: 100% !important;">'
                                           +'<option> - Pilih Nota Penjualan</option>'
                                         +'</select>'
                                       +'</div>'
                                     +'</div>'
                                     
                                     +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                       +'<label class="tebal">Tanggal Return</label>'
                                     +'</div>'
                                     +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                       +'<div class="form-group">'
                                         +'<input id="tanggalReturn" class="form-control input-sm datepicker2 " name="tanggal" type="text" value="{{ date('d-m-Y') }}">'
                                       +'</div>'
                                     +'</div>'
                                     +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                       +'<label class="tebal">Metode Pembayaran</label>'
                                     +'</div>'
                                     +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                       +'<div class="form-group">'
                                         +'<input type="text" name="pm_name" readonly="" class="form-control input-sm" id="pm_name">'
                                       +'</div>'
                                     +'</div>'
                                     +'</div>'                                   
                                      +'<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px; padding-top:25px;padding-bottom:20px;">'
                                     +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                       +'<label class="tebal">Detail Pelanggan</label>'
                                     +'</div>'
                                     +'<div class="col-md-10 col-sm-9 col-xs-12">'
                                       +'<div class="form-group">'
                                         +'<input type="text" name="c_name" readonly="" class="form-control input-sm" id="c_name">'
                                         +'<input type="hidden" name="idSup" readonly="" class="form-control input-sm" id="id_sup">'
                                       +'</div>'
                                     +'</div>'
                                     +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                       +'<label class="tebal">Total Return</label>'
                                     +'</div>'
                                     +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                       +'<div class="form-group">'
                                         +'<input type="text" name="t_return" readonly="" class="form-control input-sm" id="t_return" value="">'
                                       +'</div>'
                                     +'</div>'
                                     +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                       +'<label class="tebal">S Gross</label>'
                                     +'</div>'
                                     +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                       +'<div class="form-group">'
                                         +'<input type="text" name="s_gross" readonly="" class="form-control input-sm" id="s_gross">'
                                       +'</div>'
                                     +'</div>'
                                     +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                       +'<label class="tebal">Total Diskon</label>'
                                     +'</div>'
                                     +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                       +'<div class="form-group">'
                                         +'<input type="text" name="total_diskon" readonly="" class="form-control input-sm totalGross" id="total_diskon">'
                                         +'<input type="hidden" name="total_value" readonly="" class="form-control input-sm total_value" id="total_value">'
                                         +'<input type="hidden" name="total_percent" readonly="" class="form-control input-sm total_percent" id="total_percent">'
                                       +'</div>'
                                     +'</div>'
                                     +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                       +'<label class="tebal">Total Penjualan (Nett)</label>'
                                     +'</div>'
                                     +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                       +'<div class="form-group">'
                                         +'<input type="text" name="s_net" readonly="" class="form-control input-sm totalGross" id="s_net">'
                                       +'</div>'
                                     +'</div>'
                                     +'</div>'
   
                                     +'<div class="table-responsive">'
                                       +'<table class="table tabelan table-bordered" id="tabel-return-sales" width="100%">'
                                           +'{{ csrf_field() }}'
                                           +'<thead>'
                                             +'<tr>'
                                                 +'<th width="18%">Nama</th>'                      
                                                 +'<th width="2%">Return</th>'
                                                 +'<th width="2%">Satuan</th>'                     
                                                 +'<th width="10%">Harga</th>'
                                                 +'<th width="5%">Disc Percent</th>'
                                                 +'<th width="9%">Disc Value</th>'               
                                                 +'<th width="11%">Total</th>'
                                                 +'<th width="6%">Desc</th>'
                                             +'</tr>'
                                           +'</thead>'                                          
                                           +'<tbody id="dataDt">'
                                           +'</tbody>'
                                       +'</table>'
                                     +'</div>'
                                     // +'</form>'
   
                                       +'<div align="right" style="padding-top: 15px;">'
                                         +'<div id="div_button_save" class="form-group">'
                                           +'<button type="button" id="button_save" class="btn btn-primary" onclick="simpanReturn()">Simpan Data</button>'
                                         +'</div>'
                                       +'</div>'
         );
       }

       //select2
       $( "#cari_nota_sales" ).select2({
         placeholder: "Pilih Nota Penjualan...",
         ajax: {
           url: baseUrl + '/penjualan/manajemenreturn/carinota',
           dataType: 'json',
           data: function (params) {
             return {
                 q: $.trim(params.term)
             };
           },
           processResults: function (data) {
               if(data.length > 0) {
                  for(x in data) {
                    data[x]['id'] = data[x]['s_id'];
                    data[x]['text'] = data[x]['s_note'];
                  }
               }
               return {
                   results: data
               };
           },
           cache: true
         }, 
       });
   
       //datepicker
       $('.datepicker2').datepicker({
         autoclose: true,
         format:"dd-mm-yyyy",
         endDate: 'today'
       });
       //event onchange select option
       $('#cari_nota_sales').change(function() {
         var e=$('#tabel-return-sales').dataTable().fnDestroy();                
         var id = $('#cari_nota_sales').val();
         var metode = $('#pilih_metode_return').val();
         $.ajax({
           url : baseUrl + "/penjualan/manajemenreturn/get-data/"+id,
           type: "GET",
           dataType: "JSON",
           success: function(response){
               var c_name =  response.s_nama_cus;            
             var c_address = response.s_alamat_cus;
             if (response.s_alamat_cus == null) {
               c_address = '';              
             }
             $('#c_name').val( c_name +'. '+ c_address);
               var s_gross = parseInt(response.s_gross);
               s_gross = convertToRupiah(s_gross);
             $('#s_gross').val(s_gross); 
               var persen = parseInt(response.s_disc_percent);
               var value = (response.s_disc_value);
               value = parseFloat(value);
               var total_diskon = persen + value;
               total_diskon = convertToRupiah(total_diskon);      
             $('#total_diskon').val(total_diskon);
               var s_net = parseInt(response.s_net);
               s_net = convertToRupiah(s_net);
             $('#s_net').val(s_net);            
               var s_disc_value = parseInt(response.s_disc_value);
               s_disc_value = convertToRupiah(s_disc_value);
             $('#total_value').val(s_disc_value);
               var s_disc_percent = parseInt(response.s_disc_percent);
               s_disc_percent = convertToRupiah(s_disc_percent);
             $('#total_percent').val(s_disc_percent);
             $('#typeSales').val(response.s_channel);
   
   
          $.ajax({
               url : baseUrl + "/penjualan/manajemenreturn/tabelpnota/"+id+'/'+metode,          
           type    : 'GET',                     
           success : function(response){    
             $('#dataDt').append(response);
   
            }
         });
           /*  var tableReturn = $('#tabel-return-sales').DataTable({              
               "scrollY": 500,
               "scrollX": true,
               "paging":  false,
               "autoWidth": false,
               ajax: {
                   url : baseUrl + "/penjualan/manajemenreturn/tabelpnota/"+id+'/'+metode,
               },
               columns: [
               {data: 'i_name', name: 'i_name'},
               {data: 'sd_qty', name: 'sd_qty'},              
               {data: 's_name', name: 's_name'},              
               {data: 'sd_price', name: 'sd_price'},
               {data: 'sd_disc_percent', name: 'sd_disc_percent', orderable: false},
               {data: 'sd_disc_value', name: 'sd_disc_value', orderable: false},              
               {data: 'sd_total', name: 'sd_total', orderable: false},
               {data: 'description', name: 'description'},
               ],
               "responsive":true,
                 "pageLength": 10,
               "lengthMenu": [[10, 20, 50, - 1], [10, 20, 50, "All"]],
               "language": {
                   "searchPlaceholder": "Cari Data",
                   "emptyTable": "Tidak ada data",
                   "sInfo": "Menampilkan _START_ - _END_ Dari _TOTAL_ Data",
                   "sSearch": '<i class="fa fa-search"></i>',
                   "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
                   "infoEmpty": "",
                   "paginate": {
                           "previous": "Sebelumnya",
                           "next": "Selanjutnya",
                  }
                 }
             });*/
           },
         });
       });
   
       $("#namaitem").focus(function () {
         var type = $('#typeSales').val();
             var key = 1;
             $("#namaitem").autocomplete({
                 source: baseUrl + '/penjualan/manajemenreturn/setname/' + type,
                 minLength: 1,
                 select: function (event, ui) {
                     $('#harga').val(ui.item.harga);
                     $('#kode').val(ui.item.kode);
                     $('#detailnama').val(ui.item.nama);
                     $('#namaitem').val(ui.item.label);
                     $('#satuan').val(ui.item.satuan);
                     if (ui.item.s_qty == null) {
                         $('#s_qty').val('0');
                     } else {
                         $('#s_qty').val(ui.item.s_qty);
                     }
                     $('#qty').val(ui.item.qty);
                     $('#i-type').val(ui.item.i_type);
                     $('#qty').val('');
                     $("input[name='qty']").focus();
                 }
             });
             $("#s_qty").val('');
             $("#qty").val('');
             $("#namaitem").val('');
         });
   
       tableDetail = $('#detail-penjualan').DataTable();
   
         $('#qty').keypress(function (e) {
             var charCode;
             if ((e.which && e.which == 13)) {
                 charCode = e.which;
             } else if (window.event) {
                 e = window.event;
                 charCode = e.keyCode;
             }
             if ((e.which && e.which == 13)) {
                 var isi = $('#qty').val();
                 var jumlah = $('#detailnama').val();
                 var stok = $('#s_qty').val();
                 if (isi == '' || jumlah == '' || stok == '') {
                     toastr.warning('Isi nama item dan jumlah');
                     return false;
                 }
                 var kode = $('#kode').val();
                 tambah();
                 qtyInput(stok, kode);
                 $("#s_qty").val('');
                 $("#qty").val('');
                 $("#namaitem").val('');
                 $("input[name='item']").focus();
                 return false;
             }
         });
   
     });
     
   });
   
   
         var index = 0;
         var tamp = [];
         
   
      $(document).on('blur', '.qty-item',  function(e){
                  var index = $('.qty-item').index(this);
                 index.find(".qty-item").val('3')
     /*alert(index);*/
     });
   
   //event focus on input harga
   $(document).on('focus', '.field_harga',  function(e){
       var harga = convertToAngka($(this).val());
       if (isNaN(harga)) {
         harga = 0;
       }
       if (harga == 0) {
         harga = 0;
       }
       $(this).val(harga);
   });
   
   //event onblur input harga
   $(document).on('blur', '.field_harga',  function(e){
     //ubah format ke rupiah
     var hargaRp = convertToRupiah($(this).val());
     $(this).val(hargaRp);
   });
   
   
   
</script>
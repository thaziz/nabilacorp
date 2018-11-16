    @extends('main')
    @section('content')
    <style type="text/css">
 .btn-flat{
 border: 0;
 border-radius:0 !important;
}
    </style>
                <!--BEGIN PAGE WRAPPER-->
                <div id="page-wrapper">
                    <!--BEGIN TITLE & BREADCRUMB PAGE-->
                    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                        <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
                            <div class="page-title">Form Rencana Penjualan</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
                            <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                            <li><i></i>&nbsp;Purchasing&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                            <li>Rencana Pembelian&nbsp;&nbsp;</li><i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                            <li class="active">Form Rencana Penjualan</li>
                        </ol>
                        <div class="clearfix">
                        </div>
                    </div>
                      <div class="page-content fadeInRight">
                        <div id="tab-general">
                            <div class="row mbl">
                                <div class="col-lg-12">
                                    
                                <div class="col-md-12">
                                    <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                                    </div>
                                </div>
                                    
                                    <ul id="generalTab" class="nav nav-tabs">
                                        <li class="active"><a href="#alert-tab" data-toggle="tab">Form Rencana Pembelian</a></li>
                                        <!-- <li><a href="#note-tab" data-toggle="tab">2</a></li>
                                        <li><a href="#label-badge-tab" data-toggle="tab">3</a></li> -->
                                    </ul>
                                    <div id="generalTabContent" class="tab-content responsive" >
                                      <!-- div alert-tab -->
                                        <div id="alert-tab" class="tab-pane fade in active">
                                            <div class="row">

                                                <div class="col-md-12 col-sm-12 col-xs-12">


                                                    <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top: -10px;margin-bottom: 10px;">
                                                        <div class="form-group">
                                                          <h4>Form Rencana Pembelian</h4>
                                                        </div>
                                                    </div>
                                                       
                                                    <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                                                        
                                                        
                                                        <a href="{{ url('/purcahse-plan/plan-index') }}" class="btn"><i class="fa fa-arrow-left"></i></a>
                                                        
                                                    </div>  
                                                
                                                    <form id="data">

                                                        <div class="col-md-12 col-sm-12 col-xs-12 tamma-bg" style="padding-bottom: 10px;padding-top: 20px;margin-bottom: 15px;">
                                                            <div class="col-md-3 col-sm-12 col-xs-12">
                                                                
                                                                    <label class="tebal">Kode Rencana Pembelian</label>
                                                            </div>
                                                            <div class="col-md-3 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <input type="text" readonly="" class="form-control input-sm" name="nota" value="(Auto)">
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="col-md-3 col-sm-12 col-xs-12">
                                                                
                                                                    <label class="tebal">Tanggal Rencana Pembelian</label>
                                                            </div>
                                                            <div class="col-md-3 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <input class="form-control input-sm" type="text" id="date" name="p_date" onchange="validationHeader()">
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="col-md-3 col-sm-12 col-xs-12">
                                                                
                                                                    <label class="tebal">Supplier</label>
                                                            </div>
                                                            <div class="col-md-9 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <input type="" name="" class="form-control input-sm"  
                                                                    id="supplier" onkeyup="clearSupplier()">
                                                                    <input type="hidden" name="id_supplier" class="form-control input-sm" id="id_supplier" value="">
                                                                </div>
                                                                
                                                            </div>

                                                        </div>




<div class="col-md-12 tamma-bg" style="margin-top: 5px;margin-bottom: 5px;margin-bottom: 20px; padding-bottom:20px;padding-top:20px;">
         <div class="col-md-6">
           <label class="control-label tebal" for="">Masukan Kode / Nama</label>
              <div class="input-group input-group-sm" style="width: 100%;">
                  <span role="status" aria-live="polite" class="ui-helper-hidden-accessible">1 result is available, use up and down arrow keys to navigate.</span>
                  <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input class="move up1 form-control input-sm reset-seach ui-autocomplete-input" id="searchitem" autocomplete="off">
                  <input type="hidden" class="form-control input-sm reset-seach" id="itemName">
                  <input type="hidden" class="form-control input-sm " name="" id="i_id">
                  <input type="hidden" class="form-control input-sm reset-seach" name="i_code" id="i_code">
                  <input type="hidden" class="form-control input-sm reset-seach" id="i_price">
                  <input type="hidden" class="form-control input-sm reset-seach" name="s_satuan" id="s_satuan">
              </div>
          </div>      
          <div class="col-md-3">
           <label class="control-label tebal" name="qty">Stok</label>
              <div class="input-group input-group-sm" style="width: 100%;">
                  <input type="number" class="form-control input-sm alignAngka reset reset-seach" name="stock" id="stock" disabled="">  
              </div>
          </div>
          <div class="col-md-3">
           <label class="control-label tebal" name="qty">Jumlah</label>
              <div class="input-group input-group-sm" style="width: 100%;">
                 <input type="number" class="move up3 form-control input-sm alignAngka reset reset-seach" name="fQty" id="fQty" onclick="validationForm();">   
                 <input type="hidden" class="form-control input-sm alignAngka reset reset-seach" name="cQty" id="cQty" onclick="validationForm();">   
              </div>
          </div>
    </div>













                                                        
                <div style="padding-top: 20px;padding-bottom: 20px;">                                              

            <div class="table-responsive" style="overflow-y : auto;height : 350px; border: solid 1.5px #bb936a">
                                                                <table id="barang_table" class="table tabelan table-bordered table-striped">
                                                                  <thead>
                                                                 <tr>

                                                                    <th>Kode - Barang</th>
                                                                    <th>Stok Gudang</th>
                                                                    <th>Qty</th>
                                                                    <th>Satuan</th>    
                                                                    <th>Harga</th>         
                                                                    <th>Aksi</th>
                                                                </tr>
                                                                </thead>
                                                                   <tbody class="bplanDetail">

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            </div>

<div class="col-md-12 col-sm-12 col-xs-12" align="right">
    <button type="button" class="btn btn-xs btn-primary btn-disabled btn-flat" onclick="simpan()" disabled="">
            <i class="fa fa-save"></i> Simpan (F10)
    </button>
</div>


                                                    </form>

                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                    </div>
@endsection
@section("extra_scripts")
<script type="text/javascript">

  var searchitem        =$("#searchitem");      
  var i_id              = $("#i_id");      
  var i_code            = $("#i_code");
  var itemName          = $("#itemName");    
  var fQty             = $("#fQty");  
  var cQty             = $("#cQty");  
  
  var s_satuan          =$('#s_satuan') ;
  var bplanDetail      = $(".bplanDetail");
  var i_price           =$('#i_price');

  var index             =0;
  var tamp              =[];
  var flag              ='PESANAN';
  var dataIndex         =1;

  var hapusPlanDt =[];             


$(document).ready(function(){      
      $('#date').datepicker({
          format:"dd-mm-yyyy",  
          autoclose: true,      
      });    

       $("#searchitem").autocomplete({
        source: function(request, response) {
            $.getJSON(baseUrl+"/seach-item-purchase", {term:$('#searchitem').val(),id_supplier: $('#id_supplier').val() }, 
              response);
        },
        /*source: baseUrl+'/seach-item-purchase?id_supplier='+$('#id_supplier').val(),*/
        minLength: 1,
        dataType: 'json',        
        select: function(event, ui) 
        { 
            
        $('#i_id').val(ui.item.i_id);        
        $('#i_code').val(ui.item.i_code);     
        $('#searchitem').val(ui.item.label);
        $('#itemName').val(ui.item.item);
        $('#i_price').val(ui.item.i_price);
        
        $('#s_satuan').val(ui.item.satuan);        
        $('#stock').val(ui.item.stok);   
        fQty.val(1);
        cQty.val(1);
        fQty.focus();

        
        }
      });


     });

 $('#searchitem').keypress(function(e) {        
      if(e.which == 13 || e.keyCode == 13){   
  var code = $('#searchitem').val();
  $.ajax({
    source: baseUrl+'/seach-item-purchase?id_supplier='+$('#id_supplier').val(),
    type: 'get',
    dataType:'json',
    data: {code:code},
    success:function (response){
        
        $('#i_id').val(response[0].i_id);        
        $('#i_code').val(response[0].i_code);     
        $('#searchitem').val(response[0].label);
        $('#itemName').val(response[0].item);
        $('#i_price').val(response[0].i_price);
        
        $('#s_satuan').val(response[0].satuan);        
        
        $('#stock').val(response[0].stok);        
        
        
        fQty.val(1);
        fQty.focus();


    }
  }) 
  }
  });   

    $("#supplier").autocomplete({
        source: baseUrl+'/seach-supplier',
        minLength: 1,
        dataType: 'json',
        select: function(event, ui) 
        {   
        $('#supplier').val(ui.item.label);        
        $('#id_supplier').val(ui.item.s_id);   
        $('#searchitem').focus();
        validationHeader();
        
        }
      });

    function clearSupplier(){
      if($('#supplier').val()==''){
        $('#id_supplier').val('');  
        validationHeader(); 
      }
    }
   function setFormDetail(){
      console.log('sebelum' + tamp);
      if(fQty.val()<=0){
          iziToast.error({
                position:'topRight',
                timeout: 2000,
                title: '',
                message: "Ma'af, jumlah permintaan tidak boleh 0.",
              });
          return false;
      }
      var index = tamp.indexOf(i_id.val());      
       if ( index == -1){                
      var Hapus = '<button type="button" class="btn btn-sm btn-danger hapus" onclick="hapusButton('+i_id.val()+')"><i class="fa fa-trash-o"></i></button>';                  
      var vTotalPerItem = angkaDesimal(fQty.val())*angkaDesimal(i_price.val());
      var iSalesDetail='';  //isi
          /*iSalesDetail+='<tr>';        */
          iSalesDetail+='<tr class="detail'+i_id.val()+'">';
          iSalesDetail+='<td width="23%"><input style="width:100%" type="hidden" name="ppdt_item[]" value='+i_id.val()+'>'; 
          iSalesDetail+='<input style="width:100%" type="hidden" name="ppdt_pruchaseplan[]" value="">';
          iSalesDetail+='<input style="width:100%" type="hidden" name="ppdt_detailid[]" value="">';
          iSalesDetail+='<div style="padding-top:6px">'+i_code.val()+' - '+itemName.val()+'</div></td>';

          iSalesDetail+='<td width="4%"><input class="stock stock'+i_id.val()+' form-control" style="width:100%;text-align:right;border:none" value='+$('#stock').val()+' readonly></td>';


          iSalesDetail+='<td width="4%"><input  onblur="validationForm();" onkeyup="hapus(event,'+i_id.val()+');" class="move up1 form-control alignAngka jumlah fQty'+i_id.val()+'" style="width:100%;border:none" name="ppdt_qty[]" value="'+angkaDesimal(fQty.val())+'" autocomplete="off"></td>';

          iSalesDetail+='<td width="5%"><div style="padding-top:6px">'+s_satuan.val()+'</div></td>';


            iSalesDetail+='<td width="4%"><input style="width:100%;border:none" class="is_price alignAngka is_price'+i_id.val()+'" name="is_price[]" value='+i_price.val()+' readonly></td>';
          
          

          /*iSalesDetail+='<td width="4%"><input style="width:100%;border:none" class="is_price alignAngka form-control is_price'+i_id.val()+'" name="is_price[]" value='+i_price.val()+'  onblur="validationForm();setRupiah(event,\'is_price' + i_id.val() + '\')" onclick="setAwal(event,\'is_price' + i_id.val() + '\')"  ></td>';
*/

            
          


          
          iSalesDetail+='<td width="3%">'+Hapus+'</td>'                            
          iSalesDetail+='</tr>';        
          if(validationForm()){
          bplanDetail.append(iSalesDetail);        
          searchitem.focus();
          itemName.val('');
          searchitem.val('');
          fQty.val('');
           $('#stock').val('');
          
          tamp.push(i_id.val());
          validationHeader();
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
                        
                         var index = $('.move').index(this) + 1;                         
                         $('.move').eq(index).focus();                         
                         
                      }
                       if (e.ctrlKey && e.which === arrow.left) {
                      /*if (e.keyCode == ctrl && arrow.left) {*/
                         var index = $('.move').index(this) - 1;
                         $('.move').eq(index).focus();
                      }
                      if (e.ctrlKey && e.which === arrow.up) {
                         
                         var upd=$(this).attr('class').split(' ')[ 1 ];

                         var index = $('.'+upd).index(this) - 1;
                         $('.'+upd).eq(index).focus();
                      }
                      if (e.ctrlKey && e.which === arrow.down) {
                         
                         var upd=$(this).attr('class').split(' ')[ 1 ];

                         var index = $('.'+upd).index(this) + 1;
                         $('.'+upd).eq(index).focus();
                         
                      }
                      
     });







          }          
                 
      }else{                  
        var updateQty=0;        
        var updateTotalPerItem=0;
        var fStok=parseFloat($('.stock'+i_id.val()).val());
        var a=0;
        var b=0;
        
        a=angkaDesimal($('.fQty'+i_id.val()).val()) || 0;

        b=angkaDesimal(fQty.val()) || 0;
        


        updateQty=parseFloat(a)+parseFloat(b);                          
        
          $('.fQty'+i_id.val()).val(updateQty)
          itemName.val('');
          fQty.val('');
          $('#stock').val('');
          searchitem.val('');
          searchitem.focus();          
        $('.reset-seach').val('');      
        
      }
console.log('setelah' + tamp);
    }



    fQty.keypress(function(e) {        
      if(e.which == 13 || e.keyCode == 13){  
          setFormDetail();          
      }
    });



function validationForm(){  

  $chekDetail=0;
  for (var i=0 ; i <tamp.length; i++) {
      if($('.fQty'+tamp[0]).val()=='' || $('.fQty'+tamp[0]).val()=='0'){
          $chekDetail++;
      }
  }
  if($chekDetail>0){    
    if(tamp.length!=0){     
    
      iziToast.error({
                          position:'topRight',
                          timeout: 2000,
                          title: '',
                          message: "Ma'af, data detail belum sesuai.",
                        });
  }
    $('.btn-disabled').attr('disabled','disabled');
    $('.fQty'+tamp[0]).focus();
    $('.fQty'+tamp[0]).css('border','2px solid red');
    return false;
  }else{
    $('.fQty'+tamp[0]).css('border','none');    
    $('.btn-disabled').removeAttr('disabled');
    if(tamp.length==0){
      $('.btn-disabled').attr('disabled',true);
    }else if(tamp.length!=0){
      $('.btn-disabled').attr('disabled',false);
    }
    return true;
  }

}




function hapus(e,a){
    if(e.which===46 && e.ctrlKey){
        hapusPlanDt.push(a);
        $('.detail'+a).remove();
        var index = tamp.indexOf(''+a);  
        if(index!==-1)
        tamp.splice(index,1);        
        buttonDisable();
        
    }
}


function hapusButton(a){
      a=''+a;
      hapusPlanDt.push(a);
        $('.detail'+a).remove();
        var index = tamp.indexOf(''+a);  
        if(index!==-1)
        tamp.splice(index,1);        
        buttonDisable();
        
    
}


function buttonDisable(){    
  if(tamp.length>0){
      $('.btn-disabled').removeAttr('disabled');
  }else{          
      $(".btn-disabled").prop('disabled', true); 
      
  }
}
validationHeader();
function validationHeader(){
  if($('#date').val()=='' || $('#id_supplier').val()==''){
    $('.btn-disabled ').attr('disabled',true);
    $('.reset-seach ').attr('disabled',true);
    
    return false;
  }else{
    $('.btn-disabled ').attr('disabled',false);
    $('.reset-seach ').attr('disabled',false);
    validationForm();
    return true;
  }  
  
}

function simpan(){
     var formPos=$('#data').serialize();
     $.ajax({
          url     :  baseUrl+'/purcahse-plan/store-plan',
          type    : 'GET', 
          data    :  formPos,
          dataType: 'json',
          success : function(response){    
                    
                    if(response.status=='sukses'){
                      $('#supplier').val('');
                      $('#id_supplier').val('');
                      $('#date').val('');
                      $('.reset-seach').val('');
                      $('#serah_terima').attr('disabled','disabled');
                      $('.bplanDetail').html('');  
                                          
                        tamp=[];
                        hapusSalesDt=[];                        
                        iziToast.success({
                        position: "center",
                        title: '', 
                        timeout: 1000,
                        message: 'Data berhasil disimpan.'});
                        validationHeader();
                         window.location = baseUrl+'/purcahse-plan/plan-index';
                        }
                        
                     else if(response.status=='gagal'){                      
                      $('.btn-disabled').removeAttr('disabled');
                        iziToast.error({
                          position:'topRight',
                          timeout: 2000,
                          title: '',
                          message: response.data,
                        });



                    }
          }
      });
}




$('#fQty').keyup(function(e) {    

    if($('#cQty').val()==='1' &&  e.which != 13){      
        $('#cQty').val('');
        $('#fQty').val($('#fQty').val().substring(1));
    }    
  })

$('#searchitem').click(function(){    
    $('.reset-seach').val('');      
});

    </script>
@endsection()



@extends('main')
@section('content')

            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
                        <div class="page-title">Form Master Data Barang</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li><i></i>&nbsp;Master&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Master Data Barang</li><li><i class="fa fa-angle-right"></i>&nbsp;Form Master Data Barang&nbsp;&nbsp;</i>&nbsp;&nbsp;</li>
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
                              <li class="active"><a href="#alert-tab" data-toggle="tab">Form Master Data Barang</a></li>
                            <!-- <li><a href="#note-tab" data-toggle="tab">2</a></li>
                            <li><a href="#label-badge-tab-tab" data-toggle="tab">3</a></li> -->
                        </ul>
                        <div id="generalTabContent" class="tab-content responsive">
                          <div id="alert-tab" class="tab-pane fade in active">
                            <div class="row">

                              <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:-10px;margin-bottom: 15px;">
                                 <div class="col-md-5 col-sm-6 col-xs-8">
                                   <h4>Form Master Data Barang</h4>
                                 </div>
                                 <div class="col-md-7 col-sm-6 col-xs-4" align="right" style="margin-top:5px;margin-right: -25px;">
                                   <a href="{{ url('master/item/index') }}" class="btn"><i class="fa fa-arrow-left"></i></a>
                                 </div>
                              </div>


                         <div class="col-md-12 col-sm-12 col-xs-12 " style="margin-top:15px;">
                            <form id='data'>
                              <div class="col-md-12 col-sm-12 col-xs-12 tamma-bg" style="margin-bottom: 20px; padding-bottom:5px;padding-top:15px;padding-left:-10px;padding-right: -10px; ">

                                <div class="col-md-3 col-sm-4 col-xs-12">

                                      <label class="tebal">Kode Barang</label>

                                </div>
                                <div class="col-md-3 col-sm-8 col-xs-12">
                                  <div class="form-group">
                                      <input type="text" id="kode_barang" name="kode_barang" class="form-control input-sm" readonly placeholder="(Auto)">
                                  </div>
                                </div>



                                <div class="col-md-3 col-sm-4 col-xs-12">

                                      <label class="tebal">Nama</label>

                                </div>
                                <div class="col-md-3 col-sm-8 col-xs-12">
                                  <div class="form-group">
                                      <input type="text" id="nama" name="nama" class="form-control input-sm">
                                      <span style="color:#ed5565;display:none;" class="help-block m-b-none" id="nama-error"><small>Nama harus diisi.</small></span>
                                  </div>
                                </div>



                                <div class="col-md-3 col-sm-4 col-xs-12">

                                    <label class="tebal">Kelompok</label>

                                </div>

                                <div class="col-md-3 col-sm-8 col-xs-12">
                                  <div class="form-group">
                                      <select class="input-sm form-control select" name='kelompok' onchange="dinamis()" id="kelompok">
                                        <option value="">~ Pilih Kelompok ~</option>
                                        @foreach ($kelompok as $key => $value)
                                          <option value="{{$value->g_id}}">{{$value->g_name}}</option>
                                        @endforeach
                                      </select>
                                      <span style="color:#ed5565;display:none;" class="help-block m-b-none" id="kelompok-error"><small>Kelompok harus dipilih.</small></span>
                                  </div>
                                </div>


                                <div class="col-md-3 col-sm-4 col-xs-12">

                                    <label class="tebal">Satuan</label>

                                </div>

                                <div class="col-md-3 col-sm-8 col-xs-12">
                                  <div class="form-group">
                                      <select class="input-sm form-control select" name='satuan' id="satuan">
                                        <option value="">~ Pilih Satuan ~</option>
                                        @foreach ($satuan as $key => $value)
                                          <option value="{{$value->s_id}}">{{$value->s_name}} ({{$value->s_detname}})</option>
                                        @endforeach
                                      </select>
                                      <span style="color:#ed5565;display:none;" class="help-block m-b-none" id="satuan-error"><small>Satuan harus dipilih.</small></span>
                                  </div>
                                </div>

                               <div class="col-md-3 col-sm-4 col-xs-12">

                                      <label class="tebal">Harga Beli</label>

                                </div>
                                <div class="col-md-3 col-sm-8 col-xs-12">
                                  <div class="form-group">
                                      <input type="text" id="hargabeli" name="hargabeli" class="form-control input-sm rp">
                                      <span style="color:#ed5565;display:none;" class="help-block m-b-none" id="hargabeli-error"><small>Harga Beli harus dipilih.</small></span>
                                  </div>
                                </div>

                                <div class="col-md-3 col-sm-4 col-xs-12">

                                       <label class="tebal">Harga Jual</label>

                                 </div>
                                 <div class="col-md-3 col-sm-8 col-xs-12">
                                   <div class="form-group">
                                       <input type="text" id="hargajual" name="hargajual" class="form-control input-sm rp">
                                       <span style="color:#ed5565;display:none;" class="help-block m-b-none" id="hargajual-error"><small>Harga Jual harus dipilih.</small></span>
                                   </div>
                                 </div>

                                <div class="col-md-3 col-sm-4 col-xs-12">

                                      <label class="tebal">Detail</label>

                                </div>
                                <div class="col-md-9 col-sm-8 col-xs-12">
                                  <div class="form-group">
                                      <textarea class="form-control input-sm" name='detail'></textarea>
                                  </div>
                                </div>

                                <div class="dinamis" id="dinamis">
                                  <div class="col-md-2" style="margin-right: 68px;">

                                        <label class="tebal">Supplier</label>

                                  </div>

                                  <div class="col-md-9">
                                    <div class="form-group col-sm-5">
                                      <select class="input-sm form-control select" name="supplier[]" id="showdinamis0">
                                          <option value="">~ Pilih Supplier ~</option>
                                      </select>
                                      <span style="color:#ed5565;display:none;" class="help-block m-b-none" id="supplier-error0"><small>Supplier harus diisi.</small></span>
                                    </div>
                                    <div class="col-md-2">

                                          <label for="">Harga </label>

                                    </div>
                                  <div class="form-group col-sm-3">
                                    <input type="text" class="form-control rp" name="hargasupplier[]" id="hargasupplier0">
                                    <span style="color:#ed5565;display:none;" class="help-block m-b-none" id="harga-error0"><small>Harga harus diisi.</small></span>
                                  </div>
                                  <div class="form-group col-sm-2">
                                    <button type="button" class="btn btn-primary" name="button" onclick="tambah()"> <i class="fa fa-plus"></i> </button>
                                  </div>
                                </div>
                              </div>


                          <div align="right">
                            <button type="button" name="button" class="btn btn-primary" onclick="simpan()">Simpan</button>
                          </div>

                      </form>
                </div>
             </div>
           </div>
         </div>


@endsection
@section("extra_scripts")
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
          $('.rp').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
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
          if (validateForm()) {
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
@endsection

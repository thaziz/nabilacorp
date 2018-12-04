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
                                      <input type="text" id="kode_barang" name="kode_barang" class="form-control input-sm" disabled placeholder="(Auto)" value="{{$datasatuan[0]->i_code}}">
                                  </div>
                                </div>



                                <div class="col-md-3 col-sm-4 col-xs-12">

                                      <label class="tebal">Nama</label>

                                </div>
                                <div class="col-md-3 col-sm-8 col-xs-12">
                                  <div class="form-group">
                                      <input type="text" id="nama" name="nama" class="form-control input-sm" value="{{$datasatuan[0]->i_name}}">
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
                                          @if($datasatuan[0]->i_group == $value->g_id)
                                          <option value="{{$value->g_id}}" selected>{{$value->g_name}}</option>
                                          @else
                                          <option value="{{$value->g_id}}">{{$value->g_name}}</option>
                                          @endif
                                        @endforeach
                                      </select>
                                  </div>
                                </div>

                                <div class="col-md-3 col-sm-4 col-xs-12">

                                    <label class="tebal">Satuan</label>

                                </div>

                                <div class="col-md-3 col-sm-8 col-xs-12">
                                  <div class="form-group">
                                      <select class="input-sm form-control select" name='satuan'>
                                        <option value="">~ Pilih Satuan ~</option>
                                        @foreach ($satuan as $key => $value)
                                          @if($datasatuan[0]->i_satuan == $value->s_id)
                                          <option value="{{$value->s_id}}" selected>{{$value->s_name}} ({{$value->s_detname}}</option>
                                          @else
                                          <option value="{{$value->s_id}}">{{$value->s_name}} ({{$value->s_detname}}</option>
                                          @endif
                                        @endforeach
                                      </select>
                                  </div>
                                </div>

                               <div class="col-md-3 col-sm-4 col-xs-12">

                                      <label class="tebal">Harga Beli</label>

                                </div>
                                <div class="col-md-3 col-sm-8 col-xs-12">
                                  <div class="form-group">
                                      <input type="text" id="harga" name="hargabeli" class="form-control input-sm rp" value="Rp. {{number_format($datasatuan[0]->i_hpp,0,',','.')}}">
                                  </div>
                                </div>

                                <div class="col-md-3 col-sm-4 col-xs-12">

                                       <label class="tebal">Harga Jual</label>

                                 </div>
                                 <div class="col-md-3 col-sm-8 col-xs-12">
                                   <div class="form-group">
                                       <input type="text" id="harga" name="hargajual" class="form-control input-sm rp" value="Rp. {{number_format($datasatuan[0]->i_price,0,',','.')}}">
                                   </div>
                                 </div>

                                <div class="col-md-3 col-sm-4 col-xs-12">

                                      <label class="tebal">Detail</label>

                                </div>
                                <div class="col-md-9 col-sm-8 col-xs-12">
                                  <div class="form-group">
                                      <textarea class="form-control input-sm" name='detail'>{{$datasatuan[0]->i_det}}</textarea>
                                  </div>
                                </div>

                                @if (!empty($dataduaan))
                                  @foreach ($dataduaan as $index => $x)
                                    <input type="hidden" name="index" value="{{$index}}">
                                    <div class="dinamis{{$index}}" id="dinamis">
                                      <div class="col-md-2" style="margin-right: 68px;">

                                            <label class="tebal">Supplier</label>

                                      </div>
                                      <?php $wow = $x->is_supplier; ?>
                                      <div class="col-md-9">
                                        <div class="form-group col-sm-5">
                                          <select class="input-sm form-control select" name="supplier[]" id="showdinamis0">
                                              <option value="">~ Pilih Supplier ~</option>
                                              @foreach ($supplier as $key => $z)
                                                @if($wow == $z->s_id)
                                                <option value="{{$z->s_id}}" selected>{{$z->s_company}} - {{$z->s_name}}</option>
                                                @else
                                                <option value="{{$z->s_id}}">{{$z->s_company}} - {{$z->s_name}}</option>
                                                @endif
                                              @endforeach
                                          </select>
                                        </div>
                                        <div class="col-md-2">

                                              <label for="">Harga </label>

                                        </div>
                                      <div class="form-group col-sm-3">
                                        <input type="text" class="form-control rp" name="hargasupplier[]" value="Rp. {{number_format($x->is_price,0,',','.')}}">
                                      </div>
                                      <div class="form-group col-sm-2">
                                        @if ($index == 0)
                                          <button type="button" class="btn btn-primary" name="button" onclick="tambah()"> <i class="fa fa-plus"></i> </button>
                                        @else
                                          <button type="button" class="btn btn-primary" name="button" onclick="tambah()"> <i class="fa fa-plus"></i> </button>
                                          <button type="button" class="btn btn-danger" name="button" onclick="kurang()"> <i class="fa fa-minus"></i> </button>
                                        @endif
                                      </div>
                                    </div>
                                  </div>
                                  @endforeach
                                @endif

                                <input type="hidden" name="kode" value="{{$datasatuan[0]->i_code}}">

                          <div align="right">
                            <button type="button" name="button" class="btn btn-primary" onclick="update({{$datasatuan[0]->i_id}})">update</button>
                          </div>

                      </form>
                </div>
             </div>
           </div>
         </div>


@endsection
@section("extra_scripts")
<script type="text/javascript">
var iddinamis = parseInt($('input[name=index]').val() + 1);
      $("#nama").load("/master/databarang/tambah_barang", function(){
      $("#nama").focus();
      });
      $('#tgl_lahir').datepicker({
          autoclose: true,
          format: 'dd-mm-yyyy'
        });

        $(document).ready(function(){
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
                    '</div>'+
                    '<div class="col-md-2">'+

                      '<label for="">Harga </label>'+

                    '</div>'+
                    '<div class="form-group col-sm-3">'+
                    '<input type="text" class="form-control rp" name="hargasupplier[]">'+
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

        function kurang(){
          $('.dinamis'+iddinamis).remove();
        }

        function update(id){
          var kode = $('input[name=kode]').val();
          $.ajax({
            type: 'get',
            data: $('#data').serialize(),
            dataType: 'json',
            url: baseUrl + '/master/item/update?id='+id+'&kode='+kode,
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

</script>
@endsection

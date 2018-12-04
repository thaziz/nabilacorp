    <div class="col-md-12 col-sm-12 col-xs-12 tamma-bg" style="margin-top:10px;padding-bottom: 10px;padding-top: 20px;margin-bottom: 15px;"> 
            <div class="col-md-3 col-sm-12 col-xs-12">
                  <label class="tebal">Nama Pelanggan :</label>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label id="lblCodePlan">{{ $data[0]->c_name }}</label>
                  </div>  
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <label class="tebal">Nota :</label>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label id="lblTglPlan">{{ $data[0]->s_note }}</label>
                  </div>  
                </div>
                
                @if ($data[0]->dsr_method == 'KB')
                    <div class="col-md-3 col-sm-12 col-xs-12">
                  <label class="tebal">Jumlah Kurang :</label>
                </div>
                @else
                    <div class="col-md-3 col-sm-12 col-xs-12">
                  <label class="tebal">Jumlah Return :</label>
                </div>
                @endif

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label id="lblStaff">Rp. {{ number_format(  $data[0]->dsr_price_return,2,',','.')}}</label>
                  </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <label class="tebal">S Gross :</label>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label id="lblSupplier">Rp. {{ number_format(  $data[0]->dsr_sgross,2,',','.')}}</label>
                  </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <label class="tebal">Total Disc :</label>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label id="lblSupplier">Rp. {{ number_format( $data[0]->dsr_disc_value,2,',','.')}}</label>
                  </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <label class="tebal">S Net :</label>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label id="lblSupplier">Rp. {{ number_format( $data[0]->dsr_net,2,',','.')}}</label>
                  </div>
                </div>

              </div>
    {{-- </div> --}}

    <table class="table tabelan table-bordered table-hover" id="TbDtDetail">
        <thead>
            <tr>
                <th>Nama</th>
                <th width="5%">Jumlah</th>
                @if ($data[0]->dsr_method == 'KB')
                    <th width="5%">Kurang</th>
                @else
                    <th width="5%">return</th>
                @endif
                <th>Satuan</th>
                <th>Harga</th>
                <th width="10%">Disc Percent</th>
                <th>Disc Value</th>
                @if ($data[0]->dsr_method == 'KB')
                    <th>Jumlah Kurang</th>
                @else
                    <th>Jumlah return</th>
                @endif
                <th width="20%">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $detail)
            <tr>
    {{--             <td>{{ $index+1 }}</td> --}}
            <td>{{ $detail->i_name }}</td>
            <td><span class="pull-right">
                    {{$detail->dsrdt_qty }}
                </span>
            </td>
            <td><span class="pull-right">
                {{ $detail->dsrdt_qty_confirm }}
                </span>
            </td>
            <td>{{ $detail->m_sname }}</td>
            <td><span class="pull-right">
                {{$detail->dsrdt_price}}
            </span>
        </td>
        <td>
            <span class="pull-right">
                {{ (int)$detail->dsrdt_disc_percent }}  %
            </span>
        </td>
        <td>Rp.
            <span class="pull-right">
                {{ number_format($detail->dsrdt_disc_value,2,',','.')}}
            </span>
        </td>
        <td>Rp.
            <span class="pull-right">
                {{ number_format($detail->dsrdt_return_price,2,',','.')}}
            </span>
        </td>
        <td>Rp.
            <span class="pull-right">
                {{ number_format($detail->dsrdt_hasil,2,',','.')}}
            </span>
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    <div class="modal-footer">

        @if ($data[0]->dsr_method == 'KB')
            @if ($data[0]->dsr_status == 'TR')
                <button type="button" class="btn btn-info" onclick="simpanReturnKB({{ $data[0]->dsr_id }})" id="button_confirm_return">Proses</button>
            @endif
            @if ($data[0]->dsr_status == 'FN')
                <button type="button" class="btn btn-info" onclick="printReturn({{ $data[0]->dsr_id }})" id="button_confirm_return">Print</button>
            @endif
        @else
            @if ($data[0]->dsr_status == 'TR')
                <button type="button" class="btn btn-info" onclick="simpanReturn({{ $data[0]->dsr_id }})" id="button_confirm_return">Proses</button>
            @endif
            @if ($data[0]->dsr_status == 'FN')
                <button type="button" class="btn btn-info" onclick="printReturn({{ $data[0]->dsr_id }})" id="button_confirm_return">Print</button>
            @endif
        @endif
        
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
    </div>

<script>
$('#TbDtDetail').DataTable();
</script>
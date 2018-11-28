   @foreach($d_sales_plan->d_salesplan_dt as $detail)
     <tr>   
          <tr class="detail{{$detail->m_item->i_id}}">

               <td>
               
               <input style="width:100%" type="hidden" name="sd_item[]" value="{{$detail->m_item->i_id}}">
               <input value="{{$detail->spdt_comp}}" type="hidden" name="comp[]">
                    <div style="padding-top:6px">{{$detail->m_item->i_code}} - {{$detail->m_item->i_name}}</div></td>

          <td><input class="stock stock{{$detail->m_item->i_id}}" style="width:100%;text-align:right;border:none"  value="{{number_format($detail->s_qty+$detail->spdt_qty,0,',','.')}}"  readonly=""></td>

          <td style="display:none"><input class="jumlahAwal{{$detail->m_item->i_id}}" style="width:100%;text-align:right;border:none" name="jumlahAwal[]" value="{{number_format($detail->spdt_qty,0,',','.')}}" autocomplete="off"></td>
          
          <td><input onblur="validationForm();setQty(event,'fQty{{$detail->m_item->i_id}}')" onclick="setAwal(event,'fQty{{$detail->m_item->i_id}}')" onkeyup="hapus(event,'{{$detail->m_item->i_id}}');validationForm();hitungTotalPerItem('{{$detail->m_item->i_id}}')" class="jumlah fQty{{$detail->m_item->i_id}}" style="width:100%;text-align:right;border:none" name="sd_qty[]" value="{{number_format($detail->spdt_qty,0,',','.')}}" autocomplete="off"></td>

          <td><div style="padding-top:6px">{{$detail->s_name}}</div></td>
          <td><input class="harga{{$detail->m_item->i_id}} alignAngka" style="width:100%;border:none" name="spdt_price[]" value="{{number_format($detail->spdt_price,0,',','.')}}"" readonly></td>

          <td><input class="alignAngka discRp{{$detail->m_item->i_id}}" style="width:100%;border:none" name="spdt_disc_value[]" id="discRp" onkeyup="hitungTotalPerItem('{{$detail->m_item->i_id}}');rege(event,'discRp{{$detail->m_item->i_id}}')" onblur="setRupiah(event,'{{$detail->m_item->i_id}}')" onclick="setAwal(event,'{{$detail->m_item->i_id}}')" value="{{number_format($detail->spdt_disc_value,0,',','.')}}" ></td>

          <td><input class="alignAngka discP{{$detail->m_item->i_id}}" onkeyup="hitungTotalPerItem('{{$detail->m_item->i_id}}')" style="width:100%;border:none" name="spdt_disc_percent[]" id="discP" value="{{$detail->spdt_disc_percent}}"></td>

          <td style="display:none"><input class="alignAngka discPV{{$detail->m_item->i_id}}" onkeyup="hitungTotalPerItem('{{$detail->m_item->i_id}}')" style="width:100%;border:none" name="spdt_disc_percentvalue[]" id="discPV" value="{{number_format($detail->spdt_disc_percentvalue,0,',','.')}}"></td>          

          <td style="display:none"><input style="width:100%;border:none" name="spdt_total[]" class="totalPerItem alignAngka totalPerItem{{$detail->m_item->i_id}}" readonly value="{{$detail->spdt_qty*$detail->spdt_price}}"></td>

          <td><input style="width:100%;border:none" name="spdt_total_disc[]" class="totalPerItemDisc alignAngka totalPerItemDisc{{$detail->m_item->i_id}}" readonly value="{{number_format($detail->spdt_total,0,',','.')}}"></td>
          <td>
               <button type="button" class="btn btn-sm btn-danger hapus" onclick="hapusButton('{{$detail->m_item->i_id}}')"><i class="fa fa-trash-o"></i></button>
          </td>
          </tr>
          @endforeach

<script type="text/javascript">

     
     tamp= [];
     hapusSalesDt=[];
</script>




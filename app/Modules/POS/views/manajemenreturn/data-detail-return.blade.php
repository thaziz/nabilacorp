@foreach($sales as $data)
<tr>
  <td>
      <input  name="i_name[]" readonly class="form-control " value="{{$data->i_name}}">
      <input  name="i_id[]" readonly type="hidden" class="form-control text-right" value="">
  </td>
  <td>
      <input  name="sd_qty[]" class="form-control text-right qty-item" value="{{$data->sd_qty}}">
  </td>
  <td>
      <input  name="s_name[]" class="form-control text-right" value="{{$data->s_name}}">
  </td>
  <td>
      <input name="sd_price[]" readonly class="form-control text-right harga-item" value="Rp. {{number_format($data->sd_price,2,',','.')}}">
  </td>
  <td>
      <div class="input-group">
        <input  name="sd_disc_percent[]" class="form-control text-right dPersen-item discpercent" value="{{$data->sd_disc_percent}}">
        <span class="input-group-addon" id="basic-addon1">%</span>
      </div>
      <input  name="value_disc_percent[]" class="form-control value-persen totalPersen" style="display:none" 
       value="{{$data->sd_disc_percentvalue}}">
  </td>
  <td>
    <input  name="sd_disc[]" type="text" class="form-control text-right field_harga discvalue dValue-item" 
        value="{{number_format($data->sd_disc_value / $data->sd_qty,2,',','.')}}">
    <input  name="sd_disc_value[]" type="text" style="display:none" class="form-control text-right sd_disc_value totalPersen" value="{{$data->sd_disc_value}}">
  </td>
  <td>
    <input  name="sd_total[]" readonly class="form-control text-right totalHarga totalNet" value="Rp. {{number_format($data->sd_total,2,',','.')}}">
  </td>
  <td>
        @if($metode=='TB')
            <div class="text-center">
              <select class="form-control" name="description[]">
                <option value="" selected>- pilih -</option>
                <option value="Rusak">Rusak</option>
              </select>
            </div>
        @else
            <div class="text-center">
              <select class="form-control" name="description[]">
                <option value="" selected>- pilih -</option>
                <option value="Kelebihan">Kelebihan</option>
                <option value="Rusak">Rusak</option>
              </select> 
            </div>
        @endif
  </td>
</tr>
@endforeach
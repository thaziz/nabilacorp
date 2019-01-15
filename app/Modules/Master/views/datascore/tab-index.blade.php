<div id="index-tab" class="tab-pane fade in active">
  <div class="row" style="margin-top:-15px;">
    <div align="left" class="col-md-6 col-sm-6 col-xs-6" style="margin-bottom:10px;">
      <button class="btn btn-box-tool btn-sm btn-flat" type="button" id="btn_refresh_index" onclick="refresh()">
        <i class="fa fa-undo" aria-hidden="true">&nbsp;</i> Refresh
      </button>
    </div>

    <div align="right" class="col-md-6 col-sm-6 col-xs-6" style="margin-bottom:10px;">
      <a href="{{ url('master/datascore/tambah-score') }}">
        <button type="button" class="btn btn-box-tool" title="Tambahkan Data Item">
          <i class="fa fa-plus" aria-hidden="true">
          &nbsp;
          </i>Tambah Data
        </button>
      </a>
    </div>
   
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="table-responsive">
        <table class="table tabelan table-hover table-bordered" width="100%" cellspacing="0" id="tbl-index">
          <thead>
            <tr>
              <th class="wd-15p" width="5%">NO</th>
              <th class="wd-15p" width="5%">Nama Parameter</th>
              <th class="wd-15p" width="5%">Pegawai</th>
              <th class="wd-15p" width="5%">Divisi</th>
              <th class="wd-15p" width="5%">Posisi</th>
              <th class="wd-15p" width="10%">Aksi</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table> 
      </div>                                       
    </div>
  </div>
</div>
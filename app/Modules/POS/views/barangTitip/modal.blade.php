<div class="modal fade" id="serahTerima" role="dialog">
  <div class="modal-dialog modal-lg">
      
    
      <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background-color: #e77c38;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="color: white;">Detail Item</h4>
          </div>

          <div class="modal-body">

            <div class="table-responsive">
              <table class="table tabelan table-hover table-bordered" cellspacing="0">
                 <table class="table tabelan table-bordered table-hover dt-responsive">
               <thead align="right">
                <tr>                 
                 <th width="23%">Nama</th>
                 <th width="4%">Stok</th>                 
                 <th width="4%">Jumlah</th>                 
                 <th width="4%">Sisa</th>                 
                 <th width="5%">Satuan</th>
                 <th width="6%">Harga</th>                                
                 <th width="10%">Total</th>                                                
                 <th width="10%">Aksi</th>              
                </tr>
               </thead> 
               <tbody class="terimaDt">
               </tbody>
              </table>
            </div>
            
            
          </div>
      
          <div class="modal-footer">
            <button id="simpan" type="button" class="btn btn-xs btn-primary btn-disabled btn-flat simpan" title="Simpan   Data (Ctrl + F10)" onclick="btnSimpan()" disabled="disabled">
                  <i class="fa fa-save"></i> &nbsp;&nbsp; Bayar (Ctrl + F10)
            </button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          </div>
        </div>
         
    </div>
</div>
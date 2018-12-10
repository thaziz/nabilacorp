<div class="modal fade" id="autoModalPlan" role="dialog">
  <div class="modal-dialog modal-lg" >
      
    <form id="myForm" onsubmit="return false">
      <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background-color: #e77c38;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="color: white;">Form Rencana Produksi</h4>
          </div>

          <div class="modal-body">

            <div class="table-responsive">
                <table class="table tabelan table-hover table-bordered" width="100%" cellspacing="0" id="data">
                 <thead>
                    <tr>
                     <th>Kode - Nama Item</th>
                     <th>Jumlah Kebutuhan</th>
                     <th>Jumlah Rencana</th>
                    </tr>
                  </thead>
                  <tbody>
                                
                  </tbody>
                </table> 
              </div>  
            
          </div>
      
          <div class="modal-footer" style="border-top: none;">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan Data</button>
          </div>

           
        </div>

      </form>   
      
    </div>

</div>
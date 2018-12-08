<div class="modal fade" id="form_detail" role="dialog">
  <div class="modal-dialog" style="width: 90%;margin: auto;">
      
    <form method="get" action="#" id="form_m_price">
      <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background-color: #e77c38;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="color: white;">Form Manajemen Harga</h4>
          </div>

          <div class="modal-body">

            <div class="col-md-12 col-sm-12 col-xs-12 tamma-bg" style="margin-bottom: 15px;padding-top: 15px; ">
                                        
              <div class="col-md-12 col-sm-12 col-xs-12">
                <label class="tebal">Kode Item</label>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">  
                  <p id="r_code"></p>
                </div>
              </div>
                                        
              <div class="col-md-12 col-sm-12 col-xs-12">
                <label class="tebal">Ref</label>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">  
                  <p id="r_ref"></p>
                </div>
              </div>

              
              <div class="col-md-12 col-sm-12 col-xs-12">
                <label class="tebal">Tanggal Piutang</label>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">  
                  <p id="r_date"></p>
                </div>
              </div>
                    
              <div class="col-md-12 col-sm-12 col-xs-12">
                <label class="tebal">Tanggal Jatuh Tempo</label>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">  
                  <p id="r_duedate"></p>
                </div>
              </div>
                    
              <div class="col-md-12 col-sm-12 col-xs-12">
                <label class="tebal">Jumlah Piutang</label>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">  
                  <p id="r_value"></p>
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <label class="tebal">Jumlah Piutang Terbayar</label>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">  
                  <input type="hidden" name="m_pid" id="m_pid">
                  <input type="text" class="form-control input-sm" readonly name="r_pay" id='r_pay' >
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="list-group list_d_receivable_dt"></div>
              </div>

              
            </div>
          
          </div>
      
          <div class="modal-footer" style="border-top: none;">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            
          </div>
        </div>
      </form>   
    </div>
</div>
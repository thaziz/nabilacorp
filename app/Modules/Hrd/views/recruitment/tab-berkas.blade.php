<div class="tab-pane" role="tabpanel" id="step3">
    <h1 class="text-md-center">Upload Berkas</h1>
    <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label font-weight-bold">File Foto
              <span style="color: red">*</span>
            </label>
            <div class="col-sm-10">
                <div class="file-upload">
                  <div class="file-select">
                    <div class="file-select-button" id="fileName">Foto</div>
                    <div class="file-select-name" id="noFile">Pilih Foto...</div> 
                    <input type="file" name="image" onchange="loadFile(event)" id="foto" accept="image/*">
                  </div>
                </div>
            </div>
            @if ($errors->has('image'))
              <span style="color: red;" class="col-sm-12">{{$errors->first('image')}}</span>
            @endif
          </div>
        </div>

        <div class="col-lg-10 mx-auto">
          <div class="form-group row">
            <label for="output_foto" class="col-sm-2 col-form-label font-weight-bold">Preview Foto</label>
            <div class="col-sm-10">
              <div class="preview_td">
                <img style="width: 100px;height: 100px;border:1px solid pink" id="output_foto" >
            </div>
            </div>
          </div>
        </div>

        <div class="col-lg-10 mx-auto">
          <div class="form-group row">
            <label for="KTP" class="col-sm-2 col-form-label font-weight-bold">File KTP</label>
            <div class="col-sm-10">
              <!-- <input type="file" class="form-control" id="sertifikat" name="sertifikat" onchange="loadFile(event)" > -->
              <input type="file" class="form-control" id="sertifikat" name="sertifikat" accept="image/jpeg,image/png,application/pdf">
            </div>
          </div>
        </div>
        <div class="col-lg-10 mx-auto">
          <div class="form-group row">
            <label for="ijazah" class="col-sm-2 col-form-label font-weight-bold">File Ijazah</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="ijazah" name="ijazah" accept="application/pdf">
            </div>
          </div>
        </div>
        <div class="col-lg-10 mx-auto">
          <div class="form-group row">
            <label for="file_lain_lain" class="col-sm-2 col-form-label font-weight-bold">File Lain-lain</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="file_lain_lain" name="file_lain_lain" accept="application/pdf">
            </div>
          </div>
        </div>
        
        <div class="col-lg-10 mx-auto">
          <div class="form-group row">
            <div class="col-lg-12">
              <label class="tebal" style="color: red; float: left;">Keterangan : * Wajib diisi.</label>  
            </div>
            <div class="col-lg-12">
              <label class="tebal" style="color: blue; float: left;">File KTP Dapat menggunakan file PDF/Image (Jpg, Jpeg dan Png)</label>
            </div>
            <div class="col-lg-12">
              <label class="tebal" style="color: blue; float: left;">Untuk File Ijasah dan lain-lain wajib dengan file PDF. Semakin Lengkap data anda, menjadi nilai plus bagi kami.</label>
            </div>
          </div>
        </div>

    </div>
    <ul class="list-inline text-md-center">
        <li><a href="#form_wizard" class="btn btn-lg btn-primary next-step next-button js-scroll-trigger">Next Step</a></li>
        <li><a href="#form_wizard" class="btn btn-lg btn-common prev-step next-button js-scroll-trigger">Back</a></li>
    </ul>
</div>
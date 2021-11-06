<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <ul class="nav navbar-right panel_toolbox">

      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br />
      <form id="form" class="form-horizontal form-label-left" enctype="multipart/form-data">
          <input type="hidden" id="id_ba" name="id_ba" required="required" value="<?php echo $id_ba; ?>" class="form-control col-md-7 col-xs-12" readonly>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_buku">Tanggal <span class="required">*</span>
          </label>
          <div class="col-md-2 col-sm-2 col-xs-12">
            <input type="text" id="tgl" name="tgl" required="required" value="<?php echo date('d-m-Y'); ?>" class="form-control col-md-7 col-xs-12" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pengarang">Nama Barang <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="nama_barang" name="nama_barang" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kategori <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" id="kategori" name="kategori" required>
                <option value="" >Pilih kategori</option>
                <?php
                $qk=$this->db->get('kategori');
                foreach($qk->result() as $dt):
                echo '<option value="'.$dt->kode_kategori.'">'.$dt->kategori.'</option>';
                endforeach;
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Supplier</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" id="supplier" name="supplier" >
                  <option value="" >Pilih Supplier</option>
                  <?php
                  $qs=$this->db->get('supplier');
                  foreach($qs->result() as $ds):
                  echo '<option value="'.$ds->kode_supplier.'">'.$ds->supplier.'</option>';
                  endforeach;
                  ?>
                </select>
              </div>
            </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pengarang">Harga Pokok (Rp.) <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="harga_pokok" name="harga_pokok" data-parsley-type="digits" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="isbn">Harga Jual (Rp.) <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="harga_jual" name="harga_jual" data-parsley-type="digits" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="diskon">Diskon (%) <span class="required">*</span>
          </label>
          <div class="col-md-2 col-sm-2 col-xs-12">
            <input type="number" id="diskon" name="diskon" data-parsley-maxlength="3" value="0" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pengarang">Satuan <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="satuan" name="satuan" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pengarang">Deskripsi
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea id="deskripsi" name="deskripsi" class="form-control col-md-7 col-xs-12" rows="6"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="diskon">Stok <span class="required">*</span>
          </label>
          <div class="col-md-2 col-sm-2 col-xs-12">
            <input type="number" id="stok" name="stok"  value="0" required="required" data-parsley-min="1" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pengarang">Upload Gambar
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="file" name="userfile[]" accept=".png,.jpg,.jpeg,.gif" multiple>
          </div>
        </div>


        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button class="btn btn-danger" type="button" id="close">Close</button>
            <button class="btn btn-warning" type="reset">Reset</button>
            <button class="btn btn-success" type="button" id="new">Baru</button>
            <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

      $("#simpan").click(function(e) {
        e.preventDefault();
        if($('#form').parsley().validate()){
          var form = $('form')[0];
          var form_data = new FormData(form);
          $.ajax({
            type    : 'POST',
            data    : form_data,
            contentType : false,
            processData : false,
            cache: false,
            async:false,
            url     : "<?php echo site_url('a_data_stok_awal/simpan');?>",
            success : function(data) {
              alert(data);
              location.replace("<?php echo site_url('a_data_stok_awal/edit?id_ba='.$id_ba.'');?>");
            }
          });

        }else {
          return false();
        }

      });

      $("#new").click(function(e) {
        location.replace("<?php echo site_url('a_data_stok_awal/add');?>");
      });

      $("#close").click(function(e) {
        location.replace("<?php echo site_url('a_data_stok_awal');?>");
      });

    });



</script>

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
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pengarang">
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?php
              $qg=$this->db->select('id,image')->where('id_ba',$id_ba)->get('barang_image_awal');
              echo '<table class="table table-striped table-bordered" id="table_gambar">';
              foreach ($qg->result() as $dg) {
                echo '<tr>';
                echo '<td class="center"><img src="'.base_url().'assets/img/barang/'.$dg->image.'" height="100px" width="100px"></img></td>';
                echo '<td class="center"><a class="hapus_gambar" data-id="'.$dg->id.'"><i class="fa fa-trash red"></i></a></td>';
                echo "</tr>";
              }
              echo "</table>";
            ?>
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
      cari_data();

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
              location.reload();
            }
          });

        }else {
          return false();
        }

      });

      function cari_data(){
        var id_ba = $("#id_ba").val();
        $.ajax({
          type    : 'POST',
          data    : {id_ba:id_ba},
          url     : "<?php echo site_url('a_data_stok_awal/cari_stok_awal');?>",
          dataType: "json",
          success : function(data) {
            $("#nama_barang").val(data.nama_barang);
            $("#kategori").val(data.kategori);
            $("#harga_jual").val(data.harga_jual);
            $("#harga_pokok").val(data.harga_pokok);
            $("#diskon").val(data.diskon);
            $("#satuan").val(data.satuan);
            $("#supplier").val(data.supplier);
            $("#deskripsi").val(data.deskripsi);
            $("#stok").val(data.stok);
          }
        });
      }

      $("#new").click(function(e) {
        location.replace("<?php echo site_url('a_data_stok_awal/add');?>");
      });

      $("#close").click(function(e) {
        location.replace("<?php echo site_url('a_data_stok_awal');?>");
      });

      $('#table_gambar').on( 'click', 'tr .hapus_gambar', function () {
          var id = $(this).data("id");
          var r = confirm("Anda Yakin Ingin menghapus Data Ini?");
          if (r == true) {
            $.ajax({
              type    : 'POST',
              data    : {id:id},
              url     : "<?php echo site_url('a_data_stok_awal/hapus_gambar');?>",
              success : function(data) {
                alert(data);
                location.reload();
              }
            });
          } else {
              return false;
          }

        });

    });



</script>

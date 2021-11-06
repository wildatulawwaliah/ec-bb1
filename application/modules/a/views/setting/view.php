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
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_buku">Nama Toko <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="nama_toko" name="nama_toko" required="required" value="<?php echo $nama_toko; ?>" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pengarang">Telephone
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="telephone" name="telephone" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $telephone; ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pengarang">Motto
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="motto" name="motto" class="form-control col-md-7 col-xs-12" value="<?php echo $motto; ?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-primary" id="simpan">Update</button>
          </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pengarang">Reset DataBase
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
              <button type="submit" class="btn btn-danger" id="reset">Reset</button>
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
          var string = $('#form').serialize();

          $.ajax({
            type    : 'POST',
            data    : string,
            url     : "<?php echo site_url('a_data_setting/simpan');?>",
            success : function(data) {
              alert(data);
              location.reload();
            }
          });
        }else {
          return false();
        }

      });

      $("#reset").click(function(e) {
        e.preventDefault();
        var r = confirm("Anda Yakin? Database akan dikosongkan!");
        if (r == true) {
          $.ajax({
            type    : 'POST',
            url     : "<?php echo site_url('a_data_setting/reset_database');?>",
            success : function(data) {
              alert(data);
              location.reload();
            }
          });
        }else {
          return false();
        }

      });


    });



</script>

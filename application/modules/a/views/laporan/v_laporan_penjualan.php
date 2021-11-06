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
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Dari Tanggal <span class="required">*</span>
            </label>
            <div class='input-group date col-md-2 col-sm-2 col-xs-12' id='datetimepicker1'>
                <input type='text' class="form-control col-md-7 col-xs-12" id="tgl_awal" name="tgl_awal" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Sampai Tanggal<span class="required">*</span>
            </label>
            <div class='input-group date col-md-2 col-sm-2 col-xs-12' id='datetimepicker2'>
                <input type='text' class="form-control col-md-7 col-xs-12" id="tgl_akhir" name="tgl_akhir" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>


        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-primary" id="cetak">Cetak</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

      $("#cetak").click(function(e) {
        e.preventDefault();
        var tgl_awal=$('#tgl_awal').val();
        var tgl_akhir=$('#tgl_akhir').val();
        window.open("<?php echo site_url('a_laporan_penjualan/cetak?tgl_awal=');?>"+tgl_awal+'&tgl_akhir='+tgl_akhir);
      });

    });

    $(function () {
         $('#datetimepicker1').datetimepicker({
           format: 'DD-MM-YYYY'
         });
         $('#datetimepicker2').datetimepicker({
           format: 'DD-MM-YYYY'
         });
     });

</script>

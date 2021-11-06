<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <span class="nav navbar-right panel_toolbox">
        <button type="button" class="btn btn-success btn-m" id="tambah" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Tambah</button>
      </span>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="table_supplier" class="table table-striped dtable table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Vendor</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
            foreach($data->result() as $d){
              echo '<tr>';
              echo '<td class="center">'.$i++.'</td>';
              echo '<td class="center">'.$d->kode_supplier.'</td>';
              echo '<td class="center">'.$d->supplier.'</td>';
              echo '<td class="center"><center>
																<a data-toggle="modal" class="edit" data-target="#modal-tambah" data-id="'.$d->kode_supplier.'"><i class="fa fa-edit green"></i></a>
																<a class="hapus" data-id="'.$d->kode_supplier.'"><i class="fa fa-trash red"></i></a>
														</center>
                    </td>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-m">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Vendor</h4>
      </div>
      <div class="modal-body">
        <form id="form" class="form-horizontal form-label-left">
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-5 col-xs-12 left" for="kode">Kode <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="kode" name="kode"  class="form-control col-md-7 col-xs-12" required readonly />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-5 col-xs-12 left" for="supplier">Nama Vendor <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="supplier" name="supplier" class="form-control col-md-7 col-xs-12" required>
                  </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="simpan" name="simpan" class="btn btn-primary">Save</button>
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
            url     : "<?php echo site_url('a_data_supplier/simpan');?>",
            success : function(data) {
              alert(data);
              location.reload();
            }
          });
        }else {
          return false();
        }

      });

      $("#tambah").click(function() {
        $.ajax({
          url     : "<?php echo site_url('a_data_supplier/tambah');?>",
          dataType: "json",
          success : function(data) {
            $("#kode").val(data.kode_supplier);
            $("#supplier").val('');
          }
        });
      });


      $('#table_supplier').on( 'click', 'tr .edit', function () {
        var kode = $(this).data("id");
        $.ajax({
          type    : 'POST',
          data    : {kode:kode},
          url     : "<?php echo site_url('a_data_supplier/cari_supplier');?>",
          dataType: "json",
          success : function(data) {
            $("#kode").val(data.kode_supplier);
            $("#supplier").val(data.supplier);
          }
        });
      });

      $('#table_supplier').on( 'click', 'tr .hapus', function () {
        var kode = $(this).data("id");
        var r = confirm("Anda Yakin Ingin menghapus Data Ini?");
        if (r == true) {
          $.ajax({
            type    : 'POST',
            data    : {kode:kode},
            url     : "<?php echo site_url('a_data_supplier/hapus');?>",
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

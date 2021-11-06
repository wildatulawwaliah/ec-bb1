<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <span class="nav navbar-right panel_toolbox">
        <button type="button" class="btn btn-success btn-m" id="tambah" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Tambah</button>
      </span>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="table_user" class="table table-striped dtable table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Level</th>
            <th>Nama Lengkap</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
            foreach($data->result() as $d){
              if($d->level=='a'){$level='Admin';}else{$level='Pemilik';}
              if($d->aktif=='1'){$aktif='<span class="label label-success">Aktif</span>';}else{$aktif='<span class="label label-danger">Tidak Aktif</span>';}
              echo '<tr>';
              echo '<td class="center">'.$i++.'</td>';
              echo '<td class="center">'.$d->username.'</td>';
              echo '<td class="center">'.$level.'</td>';
              echo '<td class="center">'.$d->nama_lengkap.'</td>';
              echo '<td class="center">'.$aktif.'</td>';
              echo '<td class="center"><center>
																<a class="hapus" data-id="'.$d->id_user.'"><i class="fa fa-trash red"></i></a>
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
        <h4 class="modal-title" id="myModalLabel">User</h4>
      </div>
      <div class="modal-body">
        <form id="form" class="form-horizontal form-label-left">
                <input type="hidden" id="id_user" name="id_user"  class="form-control col-md-7 col-xs-12" readonly />
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-5 col-xs-12 left" for="kode">Username <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="username" name="username"  class="form-control col-md-7 col-xs-12" required />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-5 col-xs-12 left" for="kode">Password <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="password" name="password"  class="form-control col-md-7 col-xs-12" required />
                  </div>
                </div>
                <div class="form-group">
                    <label  class="control-label col-md-5 col-sm-5 col-xs-12 left">Level <span class="required">*</span></label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <select class="form-control col-md-7 col-xs-12" id="level" name="level" required>
                        <?php
                        $level=array('Admin' =>'a' ,'Pemilik'=>'p');
                        foreach($level as $lvl => $value):
                        echo '<option value="'.$value.'">'.$lvl.'</option>';
                        endforeach;
                        ?>
                      </select>
                    </div>
                  </div>
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-5 col-xs-12 left" for="nama_lengkap">Nama Lengkap <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control col-md-7 col-xs-12" required>
                  </div>
                </div>
                <div class="form-group">
                    <label  class="control-label col-md-5 col-sm-5 col-xs-12 left">Status <span class="required">*</span></label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <select class="form-control col-md-7 col-xs-12" id="aktif" name="aktif" required>
                        <?php
                        $aktif=array('Aktif' =>'1' ,'Tidak Aktif'=>'0');
                        foreach($aktif as $akt => $value):
                        echo '<option value="'.$value.'">'.$akt.'</option>';
                        endforeach;
                        ?>
                      </select>
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
            url     : "<?php echo site_url('a_data_admin/simpan');?>",
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
          $("#id_user").val('');
          $("#username").val('');
          $("#password").val('');
          $("#nama_lengkap").val('');
          $("#level").val('a');
          $("#aktif").val('1');
      });


      $('#table_user').on( 'click', 'tr .edit', function () {
        var id_user = $(this).data("id");
        $.ajax({
          type    : 'POST',
          data    : {id_user:id_user},
          url     : "<?php echo site_url('a_data_admin/cari_user');?>",
          dataType: "json",
          success : function(data) {
            $("#id_user").val(data.id_user);
            $("#username").val(data.username);
            $("#password").val(data.password);
            $("#nama_lengkap").val(data.nama_lengkap);
            $("#level").val(data.level);
            $("#aktif").val(data.aktif);
          }
        });
      });

      $('#table_user').on( 'click', 'tr .hapus', function () {
        var id_user = $(this).data("id");
        var r = confirm("Anda Yakin Ingin menghapus Data Ini?");
        if (r == true) {
          $.ajax({
            type    : 'POST',
            data    : {id_user:id_user},
            url     : "<?php echo site_url('a_data_admin/hapus');?>",
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

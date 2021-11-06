<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <span class="nav navbar-right panel_toolbox">
        <!-- <button type="button" class="btn btn-success btn-m" id="tambah" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Tambah</button> -->
      </span>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="table_user" class="table table-striped dtable table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Telephone</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
            foreach($data->result() as $d){
              if($d->aktif=='1'){$aktif='<span class="label label-success">Aktif</span>';}else{$aktif='<span class="label label-danger">Tidak Aktif</span>';}
              echo '<tr>';
              echo '<td class="center">'.$i++.'</td>';
              echo '<td class="center">'.$d->username.'</td>';
              echo '<td class="center">'.$d->nama_lengkap.'</td>';
              echo '<td class="center">'.$d->email.'</td>';
              echo '<td class="center">'.$d->alamat.'</td>';
              echo '<td class="center">'.$d->telephone.'</td>';
              echo '<td class="center">'.$aktif.'</td>';
              echo '<td class="center"><center>
																<a class="hapus" data-id="'.$d->id_account.'"><i class="fa fa-trash red"></i></a>
                                	<a data-toggle="modal" class="edit-password" data-target="#modal-password" data-id="'.$d->id_account.'"><i class="fa fa-key yellow"></i></a>
                  							<a data-toggle="modal" class="edit" data-target="#modal-tambah" data-id="'.$d->id_account.'"><i class="fa fa-pencil green"></i></a>
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
                <input type="hidden" id="id_account" name="id_account"  class="form-control col-md-7 col-xs-12" readonly />
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-5 col-xs-12 left" for="kode">Username <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="username" name="username"  class="form-control col-md-7 col-xs-12" required />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-5 col-xs-12 left" for="kode">Nama Lengkap <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="nama_lengkap" name="nama_lengkap"  class="form-control col-md-7 col-xs-12" required />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-5 col-xs-12 left" for="kode">Email <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="email" name="email"  class="form-control col-md-7 col-xs-12" required />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-5 col-xs-12 left" for="kode">Alamat <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="alamat" name="alamat"  class="form-control col-md-7 col-xs-12" required />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-5 col-xs-12 left" for="kode">Telephone <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="telephone" name="telephone"  class="form-control col-md-7 col-xs-12" required />
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

<div class="modal fade" id="modal-password" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-m">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Ubah Password</h4>
      </div>
      <div class="modal-body">
        <form id="form-password" class="form-horizontal form-label-left">
                <input type="hidden" id="id_account_password" name="id_account_password"  class="form-control col-md-7 col-xs-12" readonly />
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-5 col-xs-12 left" for="kode">Password baru <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="password" name="password"  class="form-control col-md-7 col-xs-12" required />
                  </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="simpan_password" name="simpan_password" class="btn btn-primary">Save</button>
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
            url     : "<?php echo site_url('a_data_users/simpan');?>",
            success : function(data) {
              alert(data);
              location.reload();
            }
          });
        }else {
          return false();
        }

      });

      $("#simpan_password").click(function(e) {
        e.preventDefault();
        if($('#form-password').parsley().validate()){
          var string = $('#form-password').serialize();

          $.ajax({
            type    : 'POST',
            data    : string,
            url     : "<?php echo site_url('a_data_users/simpan_password');?>",
            success : function(data) {
              alert(data);
              location.reload();
            }
          });
        }else {
          return false();
        }

      });


      $('#table_user').on( 'click', 'tr .edit', function () {
        var id_account = $(this).data("id");
        $.ajax({
          type    : 'POST',
          data    : {id_account:id_account},
          url     : "<?php echo site_url('a_data_users/cari_user');?>",
          dataType: "json",
          success : function(data) {
            $("#id_account").val(data.id_account);
            $("#username").val(data.username);
            $("#email").val(data.email);
            $("#telephone").val(data.telephone);
            $("#alamat").val(data.alamat);
            $("#nama_lengkap").val(data.nama_lengkap);
            $("#aktif").val(data.aktif);
          }
        });
      });

      $('#table_user').on( 'click', 'tr .edit-password', function () {
        var id_account = $(this).data("id");
        $("#id_account_password").val(id_account);
        $("#password").val('');
      });

      $('#table_user').on( 'click', 'tr .hapus', function () {
        var id_account = $(this).data("id");
        var r = confirm("Anda Yakin Ingin menghapus Data Ini?");
        if (r == true) {
          $.ajax({
            type    : 'POST',
            data    : {id_account:id_account},
            url     : "<?php echo site_url('a_data_users/hapus');?>",
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

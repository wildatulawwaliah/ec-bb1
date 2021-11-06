<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <span class="nav navbar-right panel_toolbox">
      </span>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="table_pembelian" class="table table-striped dtable table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>No. Transaksi</th>
            <th>Nama Lengkap</th>
            <th>Tgl</th>
            <th>Alamat Tujuan</th>
            <th>Contact Alt.</th>
            <th>Total</th>
            <th>Status Pesanan</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
            foreach($data->result() as $d){
              $nama_lengkap=$this->db->select('nama_lengkap')->where('id_account',$d->id_account)->get('users_account')->row()->nama_lengkap;
              echo '<tr>';
              echo '<td class="center">'.$i++.'</td>';
              echo '<td class="center">'.$d->no_transaksi.'</td>';
              echo '<td class="center">'.$nama_lengkap.'</td>';
              echo '<td class="center">'.datetime($d->w_insert).'</td>';
              echo '<td class="center">'.$d->alamat_tujuan.'</td>';
              echo '<td class="center">'.$d->contact_alt.'</td>';
              echo '<td class="center">Rp. '.toRp($d->total_bayar).'</td>';
              echo '<td class="center">'.$d->status.'</td>';
              echo '<td class="center">'.$d->keterangan.'</td>';
              echo '<td class="center"><center>
																<a data-toggle="modal" class="edit" data-target="#modal-edit" data-id="'.$d->no_transaksi.'"><i class="fa fa-edit green"></i></a>
                                <a data-toggle="modal" class="open" data-target="#modal-detail" data-id="'.$d->no_transaksi.'"><i class="fa fa-eye blue"></i></a>
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

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-m">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Update Pesanan</h4>
      </div>
      <div class="modal-body">
        <form id="form" class="form-horizontal form-label-left">
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-5 col-xs-12 left" for="kode">No. Transaksi <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="no_transaksi" name="no_transaksi"  class="form-control col-md-7 col-xs-12" required readonly />
                  </div>
                </div>
                <div class="form-group">
                    <label  class="control-label col-md-5 col-sm-5 col-xs-12 left">Status <span class="required">*</span></label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <select class="form-control col-md-7 col-xs-12" id="status" name="status" required>
                        <?php
                        $status=array('Dikirim' =>'Dikirim' ,'Pending'=>'Pending');
                        foreach($status as $st => $value):
                        echo '<option value="'.$value.'">'.$st.'</option>';
                        endforeach;
                        ?>
                      </select>
                    </div>
                  </div>
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-5 col-xs-12 left" for="kategori">Keterangan <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="keterangan" name="keterangan" class="form-control col-md-7 col-xs-12" required>
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

<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Detail Pembelian</h4>
      </div>
      <div class="modal-body">
         <div id="pembelian"></div>
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
            url     : "<?php echo site_url('a_data_pesanan/simpan');?>",
            success : function(data) {
              alert(data);
              location.reload();
            }
          });
        }else {
          return false();
        }

      });


      $('#table_pembelian').on( 'click', 'tr .edit', function () {
        var no_transaksi = $(this).data("id");
        $("#no_transaksi").val(no_transaksi);
      });

      $('#table_pembelian').on( 'click', 'tr .open', function () {
        var no_transaksi = $(this).data("id");
        $.ajax({
          type    : 'POST',
          data    : {no_transaksi:no_transaksi},
          url     : "<?php echo site_url('a_data_pesanan/cari_detail');?>",
          dataType: "json",
          success : function(data) {
            $("#pembelian").html(data.pembelian);
          }
        });
      });

    });



</script>

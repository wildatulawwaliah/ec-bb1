<style>
   .list-unstyled{background-color: #cefaff;cursor: pointer;position: absolute;margin-top: 37px;z-index: 1;width: 100%;}
   .list-unstyled li{padding:12px;}
</style>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <?php if($this->session->userdata('level') == 'v') : ?>
      <div class="x_title">
      <span class="nav navbar-right panel_toolbox">
        <button type="button" class="btn btn-success btn-m" id="tambah" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Tambah</button>
      </span>
      <div class="clearfix"></div>
    </div>
    <?php endif ?>
    <div class="x_content">
      <table id="table_stok_masuk" class="table table-striped dtable table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Tgl</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Satuan</th>
            <th>Jumlah</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
            foreach($data->result() as $d){
              echo '<tr>';
              echo '<td class="center">'.$i++.'</td>';
              echo '<td class="center">'.datetime($d->w_insert).'</td>';
              echo '<td class="center">'.$d->kode_barang.'</td>';
              echo '<td class="center">'.$d->nama_barang.'</td>';
              echo '<td class="center">'.$d->kategori.'</td>';
              echo '<td class="center">'.$d->satuan.'</td>';
              echo '<td class="center">'.$d->jumlah.'</td>';
              echo '<td class="center">
                          <a class="hapus" data-id="'.$d->id.'"><i class="fa fa-trash red"></i></a>
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
        <h4 class="modal-title" id="myModalLabel">Stok Masuk</h4>
      </div>
      <div class="modal-body">
        <form id="form" class="form-horizontal form-label-left">
                <input type="hidden" id="id" name="id"  class="form-control col-md-7 col-xs-12" readonly />
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-5 col-xs-12 left" for="id">Cari Barang <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12 has-feedback">
                    <input type="text" id="cari_barang" name="cari_barang"  class="form-control col-md-7 col-xs-12" required placeholder="Kode Barang/Nama Barang" />
                    <span class="fa fa-search form-control-feedback right" aria-hidden="true"></span>
                    <div id="list_barang"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-5 col-xs-12 left" for="id">Kode Barang <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="kode_barang" name="kode_barang"  class="form-control col-md-7 col-xs-12" required readonly />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-5 col-xs-12 left" for="id">Barang <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="barang" name="barang"  class="form-control col-md-7 col-xs-12" required readonly />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-5 col-xs-12 left" for="id">Kategori <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="kategori" name="kategori"  class="form-control col-md-7 col-xs-12" required readonly />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-5 col-xs-12 left" for="id">Supplier <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" id="supplier" name="supplier" required>
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
                    <label class="control-label col-md-5 col-sm-5 col-xs-12 left" for="id">Jumlah <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="number" id="jumlah" name="jumlah"  value="0" required="required" data-parsley-min="1" class="form-control col-md-7 col-xs-12">
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

      $('#cari_barang').keyup(function(){
          reset();
          var query = $(this).val();
          if(query != '')
          {
               $.ajax({
                    url:"<?php echo site_url('a_data_stok_masuk/cari_barang');?>",
                    method:"POST",
                    data:{query:query},
                    success:function(data)
                    {
                         $('#list_barang').fadeIn();
                         $('#list_barang').html(data);
                    }
               });
          }else {
            $('#list_barang').fadeOut();
          }
     });
     $(document).on('click', 'li', function(){
          var string=$(this).text();
          if (string=='Country Not Found'){
            $('#kode_barang').val('');
          }else{
            var explode= string.split(" - ");
            var kode_barang = explode[0];
            var barang = explode[1];
            var kategori = explode[2];
            $('#kode_barang').val(kode_barang);
            $('#barang').val(barang);
            $('#kategori').val(kategori);
            $('#list_barang').fadeOut();
          }
     });

     function reset(){
       $('#kode_barang').val('');
       $('#barang').val('');
       $('#kategori').val('');
     }

      $("#simpan").click(function(e) {
        e.preventDefault();
        if($('#form').parsley().validate()){
          var string = $('#form').serialize();

          $.ajax({
            type    : 'POST',
            data    : string,
            url     : "<?php echo site_url('a_data_stok_masuk/simpan');?>",
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
          url     : "<?php echo site_url('a_data_stok_masuk/tambah');?>",
          dataType: "json",
          success : function(data) {
            $("#id").val('');
            $("#kategori").val('');
          }
        });
      });


      $('#table_stok_masuk').on( 'click', 'tr .edit', function () {
        var id = $(this).data("id");
        $.ajax({
          type    : 'POST',
          data    : {id:id},
          url     : "<?php echo site_url('a_data_stok_masuk/cari_kategori');?>",
          dataType: "json",
          success : function(data) {
            $("#id").val(data.id_kategori);
            $("#kategori").val(data.kategori);
          }
        });
      });

      $('#table_stok_masuk').on( 'click', 'tr .hapus', function () {
        var id = $(this).data("id");
        var r = confirm("Anda Yakin Ingin menghapus Data Ini?");
        if (r == true) {
          $.ajax({
            type    : 'POST',
            data    : {id:id},
            url     : "<?php echo site_url('a_data_stok_masuk/hapus');?>",
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

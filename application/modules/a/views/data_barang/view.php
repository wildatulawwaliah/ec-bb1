<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <span class="nav navbar-right panel_toolbox">
        <button type="button" class="btn btn-success btn-m" id="tambah"><i class="fa fa-plus"></i> Tambah</button>
      </span>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="table_barang" class="table table-striped dtable table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Produk</th>
            <th>Kategori Vendor</th>
            <th>Harga Paket</th>
            <th>Harga Satuan</th>
            <th>Diskon</th>
            <th>Satuan</th>
            <th>Gambar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
            foreach($data->result() as $d){
              $gambar=$this->db->select('image')->where('kode_barang',$d->kode_barang)->get('barang_image')->row()->image;
              echo '<tr>';
              echo '<td class="center">'.$i++.'</td>';
              echo '<td class="center">'.$d->kode_barang.'</td>';
              echo '<td class="center">'.$d->nama_barang.'</td>';
              echo '<td class="center">'.$d->kategori.'</td>';
              echo '<td class="center">'.toRp($d->harga_pokok).'</td>';
              echo '<td class="center">'.toRp($d->harga_jual).'</td>';
              echo '<td class="center">'.$d->diskon.'%</td>';
              echo '<td class="center">'.$d->satuan.'</td>';
              echo '<td class="center"><img src="'.base_url().'assets/img/barang/'.$gambar.'" height="100px" width="100px"></img></td>';
              echo '<td class="center"><center>
																<a class="edit" data-id="'.$d->kode_barang.'"><i class="fa fa-edit green"></i></a>
																<a class="hapus" data-id="'.$d->kode_barang.'"><i class="fa fa-trash red"></i></a>
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
<script type="text/javascript">
   $(document).ready(function(){
     $("#tambah").click(function() {
        location.replace("<?php echo site_url('a_data_barang/add');?>");
      });
   });

   $('#table_barang').on( 'click', 'tr .edit', function () {
        var kode_barang = $(this).data("id");
        $.ajax({
          url     : "<?php echo site_url('a_data_barang/edit');?>",
          success : function(data) {
            location.replace("<?php echo site_url('a_data_barang/edit?kode_barang=');?>"+kode_barang);
          }
        });
      });

      $('#table_barang').on( 'click', 'tr .hapus', function () {
          var kode = $(this).data("id");
          var r = confirm("Anda Yakin Ingin menghapus Data Ini?");
          if (r == true) {
            $.ajax({
              type    : 'POST',
              data    : {kode:kode},
              url     : "<?php echo site_url('a_data_barang/hapus');?>",
              success : function(data) {
                alert(data);
                location.reload();
              }
            });
          } else {
              return false;
          }

        });

</script>

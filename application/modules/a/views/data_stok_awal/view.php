<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <span class="nav navbar-right panel_toolbox">
        <?php
        $cek_publish=$this->db->get_where('stok_awal',array('publish' => '0', 'id_user' => $this->session->userdata('id_user')))->num_rows();
        if($cek_publish!=0){
            $disabled='';
        }
        else{
            $disabled='disabled';
        }
        ?>
        <?php if($this->session->userdata('level') == 'v') : ?>
        <button type="button" class="btn btn-warning btn-m" id="publish" <?php echo $disabled;?>><i class="fa fa-upload"></i> Publish</button>
        <button type="button" class="btn btn-success btn-m" id="tambah"><i class="fa fa-plus"></i> Tambah</button>
      <?php endif ?>
    </span>
    <div class="clearfix"></div>
</div>
<div class="x_content">
  <table id="table_barang" class="table table-striped dtable table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Harga Pokok</th>
        <th>Harga Jual</th>
        <th>Diskon</th>
        <th>Satuan</th>
        <th>Stok</th>
        <th>Tgl</th>
        <th>Gambar</th>
        <th>Publish</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
  <?php
  $i=1;
  foreach($data->result() as $d){
    $gambar=$this->db->select('image')->where('id_ba',$d->id_ba)->get('barang_image_awal')->row()->image;
    $publish=$d->publish;
    if($publish=='1'){
      $publish='<span class="label label-success">Publish</span>';
      $aksi_publish='';
  }else {
      $publish='<span class="label label-warning">Belum</span>';
      $aksi_publish='<center>
      <a class="edit" data-id="'.$d->id_ba.'"><i class="fa fa-edit green"></i></a>
      <a class="hapus" data-id="'.$d->id_ba.'"><i class="fa fa-trash red"></i></a>
      </center>';
  }
  echo '<tr>';
  echo '<td class="center">'.$i++.'</td>';
  echo '<td class="center">'.$d->nama_barang.'</td>';
  echo '<td class="center">'.$d->kategori.'</td>';
  echo '<td class="center">'.toRp($d->harga_pokok).'</td>';
  echo '<td class="center">'.toRp($d->harga_jual).'</td>';
  echo '<td class="center">'.$d->diskon.'%</td>';
  echo '<td class="center">'.$d->satuan.'</td>';
  echo '<td class="center">'.$d->stok_awal.'</td>';
  echo '<td class="center">'.datetime($d->w_insert).'</td>';
  echo '<td class="center"><img src="'.base_url().'assets/img/barang/'.$gambar.'" height="100px" width="100px"></img></td>';
  echo '<td class="center">'.$publish.'</td>';
  echo '<td class="center">'.$aksi_publish.'</td>';
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
        location.replace("<?php echo site_url('a_data_stok_awal/add');?>");
    });

      $("#publish").click(function() {
        var r = confirm("Anda Yakin? Data yang sudah terpublish tidak dapat diedit lagi");
        if (r == true) {
          $.ajax({
            url     : "<?php echo site_url('a_data_stok_awal/publish');?>",
            success : function(data) {
              alert(data);
              location.reload();
          }
      });
      } else {
          return false;
      }

  });

      $('#table_barang').on( 'click', 'tr .edit', function () {
         var id_ba = $(this).data("id");
         $.ajax({
           url     : "<?php echo site_url('a_data_stok_awal/edit');?>",
           success : function(data) {
             location.replace("<?php echo site_url('a_data_stok_awal/edit?id_ba=');?>"+id_ba);
         }
     });
     });

      $('#table_barang').on( 'click', 'tr .hapus', function () {
         var id_ba = $(this).data("id");
         var r = confirm("Anda Yakin Ingin menghapus Data Ini?");
         if (r == true) {
           $.ajax({
             type    : 'POST',
             data    : {id_ba:id_ba},
             url     : "<?php echo site_url('a_data_stok_awal/hapus');?>",
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

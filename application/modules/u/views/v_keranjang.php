<section class="m-top-10">
 <div class="container">
     <div class="row">
       <div class="col-lg-12 text-center">
         <div class="">
            <h4 class="text-uppercase ml-auto mr-auto title-head"><?php echo $title;?></h4>
        </div>
       </div>
     </div>
     <?php
     if($count>0){
     ?>
     <div class="row mt-5">
       <div class="col-lg-12 text-center">
        <table>
          <thead>
            <tr>
              <th></th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Total</th>
              <th></th>
            </tr>
          <thead>
          <tbody>
            <?php
            $total_bayar=0;
            foreach ($data->result() as $dt) {
              $total=$dt->harga_jual*$dt->jumlah;
              $gambar=$this->db->select('image')->where('kode_barang',$dt->kode_barang)->get('barang_image')->row()->image;
              echo '<tr class="border-bottom">';
              echo '<td class="text-center"><img class="barang-image-table" src="'.base_url().'assets/img/barang/'.$gambar.'" alt="'.$dt->nama_barang.'"></td>';
              echo '<td class="text-center">'.$dt->nama_barang.'</td>';
              echo '<td class="text-center">Rp. '.toRp($dt->harga_jual).'</td>';
              echo '<td class="text-center">'.$dt->jumlah.' '.$dt->satuan.'</td>';
              echo '<td class="text-center">Rp. '.toRp($total).'</td>';
              echo '<td class="text-center"><button type="button" name="batal" id="batal" class="btn btn-danger mb-2" onClick="batal('.$dt->id.')">Batal</button></td>';
              echo '</tr>';
              $total_bayar+=$total;
            }
            ?>
          </tbody>
        </table>
       </div>
     </div>
     <div class="row mt-5">
       <div class="col-lg-12">
         <div class="">
            <h2 class="float-right">Rp.<?php echo toRp($total_bayar);?></h2>
        </div>
       </div>
     </div>
     <div class="row mt-1">
       <div class="col-lg-12">
         <div class="">
            <div class="float-right">
              <button type="button" name="beli" id="beli" class="btn btn-success mb-2">Pesan</button>
            </div>
        </div>
       </div>
     </div>
   <?php }else{ ?>
     <div class="row mt-5">
       <div class="col-lg-12 text-center">
         <div class="">
            <h4 class="ml-auto mr-auto red">Pesanan Kosong</h4>
        </div>
       </div>
     </div>
   <?php } ?>
 </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
      $('#beli').click(function(){
        location.replace("<?php echo site_url('profile/beli');?>");
      })
    });

    function batal(id){
      var r = confirm("Anda Yakin Ingin membatalkan Barang Ini?");
      if (r == true) {
        $.ajax({
          type    : 'POST',
          data    : {id:id},
          url     : "<?php echo site_url('profile/hapus_keranjang');?>",
          success : function(data) {
            if(data=='1'){
              location.reload();
            }
          },
          error : function(){
               alert('terjadi masalah. Silangka coba lagi');
          }
        });
      } else {
          return false;
      }
    }
</script>

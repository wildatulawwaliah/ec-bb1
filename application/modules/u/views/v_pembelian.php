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
              <th>No</th>
              <th>No. Transaksi</th>
              <th>Tgl</th>
              <th>Alamat Tujuan</th>
              <th>Contact Alt.</th>
              <th>Total</th>
              <th>Status Pemesanan</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          <thead>
          <tbody>
            <?php
            $i=1;
            foreach ($data->result() as $dt) {
              echo '<tr class="border-bottom">';
              echo '<td class="text-center">'.$i++.'</td>';
              echo '<td class="text-center">'.$dt->no_transaksi.'</td>';
              echo '<td class="text-center">'.datetime($dt->w_insert).'</td>';
              echo '<td class="text-center">'.$dt->alamat_tujuan.'</td>';
              echo '<td class="text-center">'.$dt->contact_alt.'</td>';
              echo '<td class="text-center">Rp. '.toRp($dt->total_bayar).'</td>';
              echo '<td class="text-center">'.$dt->status.'</td>';
              echo '<td class="text-center">'.$dt->keterangan.'</td>';
              echo '<td class="text-center"><button type="button" name="cetak" id="cetak" class="btn btn-danger mb-2 mt-2" onClick="cetak('.'\''.$dt->no_transaksi.'\''.')">Cetak</button></td>';
              echo '</tr>';
            }
            ?>
          </tbody>
        </table>
       </div>
     </div>

   <?php }else{ ?>
     <div class="row mt-5">
       <div class="col-lg-12 text-center">
         <div class="">
            <h4 class="ml-auto mr-auto red">Anda Belum Membeli</h4>
        </div>
       </div>
     </div>
   <?php } ?>
 </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {

    });
    function cetak(id){
      window.open("<?php echo site_url('profile/cetak_pembelian?no_transaksi=');?>"+id);
    }
</script>

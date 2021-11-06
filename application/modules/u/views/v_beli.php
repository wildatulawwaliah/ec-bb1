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
       <div class="col-lg-6 col-12 ml-auto mr-auto">
         <form class="" id="form" enctype="multipart/form-data">
           <input type="hidden" class="form-control" id="total_bayar" name="total_bayar" value="<?php echo $total_bayar;?>">
           <div class="form-group">
             <label for="email">Contact Alternative</label>
             <input type="text" class="form-control" id="contact" name="contact" placeholder="Nama/Telp">
           </div>
           <div class="form-group">
             <label for="email">Alamat Lengkap Tujuan:</label>
             <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"></textarea>
           </div>
           <div class="form-group">
             <label for="email">Daftar No. Rekening Tujuan Transfer :</label>
             <?php
               $qb=$this->db->get('bank');
               foreach ($qb->result() as $db) {
                 echo '<div>'.$db->bank.' <strong>'.$db->norek.'</strong></div>';
               }
             ?>
           </div>
           <div class="form-group">
             <label>Upload Bukti Transfer
             </label>
             <input type="file" name="userfile" id="userfile" accept=".png,.jpg,.jpeg,.gif">
           </div>
           <div id="validation-error"></div>
           <div id="validation-success"></div>
         </form>
       </div>
     </div>
     <div class="row mt-1">
       <div class="col-lg-12">
         <div class="">
            <div class="text-center">
              <button type="submit" name="bayar" id="bayar" class="btn btn-success mb-2">Bayar</button>
              <button type="button" name="pembelian" id="pembelian" class="btn btn-warning mb-2">Cek Pembelian</button>
            </div>
        </div>
       </div>
     </div>
   <?php }else{ ?>
     <div class="row mt-5">
       <div class="col-lg-12 text-center">
         <div class="">
            <h4 class="ml-auto mr-auto red">Tidak Ada Barang</h4>
        </div>
       </div>
     </div>
   <?php } ?>
 </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
      $('#bayar').show();
      $('#pembelian').hide();

      $('#bayar').click(function(e){
        e.preventDefault();
        validation();
        var form = $('form')[0];
        var form_data = new FormData(form);
        $.ajax({
          type    : 'POST',
          data    : form_data,
          contentType : false,
          processData : false,
          cache: false,
          async:false,
          url     : "<?php echo site_url('profile/bayar');?>",
          success : function(data) {
            if(data=='1'){
              $('#bayar').hide();
              $('#pembelian').show();
              success('Terima Kasih telah membeli. Silahkan ikuti status pembelian!');
            }else {
              alert(data);
            }
          }
        });
      });

      $('#pembelian').click(function(){
        location.replace("<?php echo site_url('profile/pembayaran');?>");
      });

      function validation(){
        var contact=$('#contact').val();
        var alamat=$('#alamat').val();
        var userfile=$('#userfile')[0].files.length;

        if(contact.length==0){
          error('Contact Tidak Boleh Kosong');
          $('#contact').focus();
          return false();
        }

        if(alamat.length==0){
          error('Alamat Tidak Boleh Kosong');
          $('#alamat').focus();
          return false();
        }

        if(userfile == 0){
          error('Anda Belum Memasukkan Bukti Transfer');
          $('#userfile').focus();
          return false();
        }

      }

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

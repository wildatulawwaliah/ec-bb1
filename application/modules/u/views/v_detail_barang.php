<section class="m-top-10">
 <div class="container">
     <div class="row">
       <div class="col-lg-5 text-center">
         <div class="detail-barang-wrap">
               <img class="barang-img" src="<?php echo base_url().'assets/img/barang/'.$gambar.''; ?>" alt="'.$nama_barang.'">
        </div>
       </div>
       <div class="col-lg-7">
         <div class="detail-barang-wrap">
          <div class="detail-barang-desc mb-5">
             <h2><?php echo $nama_barang;?></h2>
             <h4><?php echo $kategori;?></h4>
             <h3><?php echo 'Rp. '.toRp($harga);?></h3>
             <h6 class="mt-3">Deskripsi : </h6>
             <p><?php echo $deskripsi;?></p>
             <p><?php echo 'Stok tersedia : '.$stok.' '.$satuan;?></p>
           </div>
           <form class="" name="form" id="form">
            <input type="hidden" id="kode_barang" name="kode_barang" value="<?php echo $kode_barang; ?>">
            <input type="hidden" id="param_jumlah" name="param_jumlah" value="<?php echo $stok; ?>">
            <label for="nama_barang" class="mr-sm-2">Jumlah : </label>
            <input type="number" class="form-control mb-2 mr-sm-2 col-lg-3 col-sm-4 col-6" required min="1" id="jumlah" name="jumlah" value="1">
            <div id="validation-error" class="p-0 col-lg-8 col-sm-12 col-6"></div>
            <div id="validation-success" class="p-0 col-lg-8 col-sm-12 col-6"></div>
            <button type="button" name="beli" id="beli" class="btn btn-success mb-2">Pesan Sekarang</button>
            <button type="button" name="keranjang" id="keranjang" class="btn btn-warning mb-2">Masuk Ke Pemesanan</button>
           </form>
        </div>
       </div>
     </div>
 </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
      $('#keranjang').click(function(){
        validation();
        var string = $('#form').serialize();
        $.ajax({
          type    : 'POST',
          data    : string,
          url     : "<?php echo site_url('profile/simpan_keranjang');?>",
          success : function(data) {
            if(data=='1'){
              success('Barang telah dimasukkan ke keranjang');
            }else {
              error('Silahkan Sign In terlebih dahulu !');
            }
          },
          error : function(){
            error('Silahkan Sign In terlebih dahulu !');
          }
        });
      });

      $('#beli').click(function(){
        validation();
        var string = $('#form').serialize();
        $.ajax({
          type    : 'POST',
          data    : string,
          url     : "<?php echo site_url('profile/beli_quick');?>",
          success : function(data) {
            if(data=='1'){
              location.replace("<?php echo site_url('profile/beli');?>");
            }else {
              error('Silahkan Sign In terlebih dahulu !');
            }
          },
          error : function(){
            error('Silahkan Sign In terlebih dahulu !');
          }
        });
      });

      function validation(){
        var param_jumlah=$('#param_jumlah').val();
        var jumlah=$('#jumlah').val();

        if(jumlah.length==0 || jumlah=='0'){
          error('Jumlah Tidak Boleh Kosong');
          $('#jumlah').focus();
          return false();
        }

        if (parseInt(jumlah)>parseInt(param_jumlah)){
          error('Jumlah melebihi persediaan');
          $('#jumlah').focus();
          return false();
        }

      }

    });
</script>

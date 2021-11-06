<section class="m-top-10">
 <div class="container">
     <div class="row">
       <div class="col-lg-12 text-center">
         <form class="form-inline" name="form-cari" id="form-cari">
          <label for="nama_barang" class="mr-sm-2">Nama Produk:</label>
          <input type="text" class="form-control mb-2 mr-sm-2" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
          <label for="kategori" class="mr-sm-2">Kategori Vendor:</label>
          <select class="form-control mb-2 mr-sm-2" id="kategori" name="kategori" required>
            <option value="" >Semua kategori</option>
            <?php
            $qk=$this->db->get('kategori');
            foreach($qk->result() as $dt):
            echo '<option value="'.$dt->kode_kategori.'">'.$dt->kategori.'</option>';
            endforeach;
            ?>
          </select>
          <button type="button" name="filter" id="filter" class="btn btn-primary mb-2">Filter</button>
         </form>
       </div>

     </div>
 </div>
</section>
<section id="galeri" class="p-0 my-5">
      <div class="container">
        <div class="row" id="view_barang">
        </div>
      </div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
      load_barang('','');
      $('#filter').click(function(){
        var nama_barang=$('#nama_barang').val();
        var kategori=$('#kategori').val();
        load_barang(nama_barang,kategori);
      })
    });

    function load_barang(nama_barang,kategori){
      $.ajax({
        type    : 'POST',
        data    : {nama_barang:nama_barang,kategori:kategori},
        url     : "<?php echo site_url('home/load_barang');?>",
        success : function(data) {
          $("#view_barang").html(data);
        }
      });
    }



</script>

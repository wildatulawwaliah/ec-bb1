<div class="row tile_count">
  <center>
    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Admin</span>
      <div class="count"><?php echo $this->m_data->jumlah_baris('users'); ?></div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-users"></i> Total Users</span>
      <div class="count"><?php echo $this->m_data->jumlah_baris('users_account'); ?></div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-inbox"></i> Total Data Produk</span>
      <div class="count"><?php echo $this->m_data->jumlah_baris('barang'); ?></div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-truck"></i> Total Vendor</span>
      <div class="count"><?php echo $this->m_data->jumlah_baris('supplier'); ?></div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-list"></i> Total Kategori Vendor</span>
      <div class="count"><?php echo $this->m_data->jumlah_baris('kategori'); ?></div>
    </div>
    <!-- <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-bank"></i> Total Bank</span>
      <div class="count"><?php echo $this->m_data->jumlah_baris('bank'); ?></div>
    </div> -->

  </center>
</div>

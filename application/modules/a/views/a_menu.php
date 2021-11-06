<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <ul class="nav side-menu">
      <li><a href="<?php echo base_url();?>a_home"><i class="fa fa-list-alt"></i>Dashboard</a>
      </li>
      <li><a href="<?php echo base_url();?>a_data_pesanan"><i class="fa fa-shopping-cart"></i>Pesanan</a>
      </li>
      <li><a><i class="fa fa-list"></i> Master Data <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?php echo base_url();?>a_data_barang">Data Produk</a></li>
          <li><a href="<?php echo base_url();?>a_data_kategori">Data Kategori Vendor</a></li>
          <li><a href="<?php echo base_url();?>a_data_vendor">Data Vendor</a></li>
          <!-- <li><a href="<?php echo base_url();?>a_data_bank">Data Bank</a></li> -->
        </ul>
      </li>
      <li><a><i class="fa fa-inbox"></i> Persediaan <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?php echo base_url();?>a_data_stok_awal">Produk Awal</a></li>
          <li><a href="<?php echo base_url();?>a_data_stok_masuk">Produk Restok</a></li>
          <li><a href="<?php echo base_url();?>a_data_stok">Stok Produk</a></li>
        </ul>
      </li>
      <li><a  target="_blank" href="<?php echo base_url();?>a_laporan_stok"><i class="fa fa-print"></i>Laporan Pemesanan</a>
      <!-- </li>
      <li><a href="<?php echo base_url();?>a_laporan_penjualan"><i class="fa fa-print"></i>Laporan Penjualan</a>
      </li> -->
      <li><a href="<?php echo base_url();?>a_data_users"><i class="fa fa-users"></i>Data Users</a>
      </li>
      <li><a href="<?php echo base_url();?>a_data_admin"><i class="fa fa-user"></i>Data Admin</a>
      </li>
      <li><a href="<?php echo base_url();?>a_data_setting"><i class="fa fa-gears"></i>Setting</a>
      </li>
      <li><a href="<?php echo base_url();?>a_login/logout"><i class="fa fa-sign-out"></i>Log Out</a>
      </li>
    </ul>
  </div>

</div>

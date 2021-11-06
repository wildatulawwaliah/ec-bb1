<div class="nav-polygon">
</div>
<div class="container">
  <div>
    <a class="navbar-brand" href="<?php echo base_url();?>home">
    
      <div class="background-logo">
        <img class="logo" src="<?php echo base_url();?>assets/images/ws-logo.png"></img>
      </div>
      <div class="name-shop">
           <h4><?php echo $this->db->select('nama_toko')->where('id','system')->get('setting')->row()->nama_toko; ?></h4>
           <h5><?php echo $this->db->select('motto')->where('id','system')->get('setting')->row()->motto; ?></h5>
           <h6 style="margin-top:-4px;"><?php echo 'Contact : '.$this->db->select('telephone')->where('id','system')->get('setting')->row()->telephone; ?></h6>
      </div>
   
    </a>
  </div>
  <div>
    <div class="top">
    </div>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>">HOME</a>
        </li>
        <?php
         if ($login=='1'){
          $nama_lengkap=$this->session->userdata('nama_lengkap');
          $id_account=$this->session->userdata('id_account');
        ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>profile/pembayaran">Pembayaran</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>profile/pemesanan">Pemesanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url().'profile/sign_out';?>">SIGN OUT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url().'profile';?>"><?php echo $nama_lengkap;?></a>
            </li>
        <?php
        }else {
        ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>create_account">CREATE ACCOUNT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>sign_in">SIGN IN</a>
            </li>
        <?php
        }
        ?>
      </ul>

    </div>
  </div>


</div>

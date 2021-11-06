<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Wilda">

    <title><?php echo $this->db->select('nama_toko')->where('id','system')->get('setting')->row()->nama_toko; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
		<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/slick.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/slick-theme.css"/>
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/app.js"></script>
  </head>

  <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top p-0" id="mainNav">
      <?php echo $this->load->view('nav');?>
    </nav>
    <!-- Content -->
    <div id="content">
        <?php echo $this->load->view($content);?>
    </div>

    <!-- Footer -->
    <footer class="text-center">
      <a class="" href="<?php echo base_url();?>home">
          <i class="button-up fa fa-angle-double-up"></i>
      </a>
      <div class="info-box">
        <div class="footnote">Wilda<span class="highlight">2020</span></div>
      </div>
    </footer>
  </body>
</html>

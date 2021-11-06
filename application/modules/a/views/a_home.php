<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Home</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/a/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>assets/a/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>assets/a/css/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url();?>assets/a/css/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url();?>assets/a/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url();?>assets/a/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/a/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <!-- <link href="<?php echo base_url();?>assets/a/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/a/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/a/css/scroller.bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/a/css/gentelella.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/a/css/custom.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/a/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assets/a/js/bootstrap.min.js"></script>
</head>

<?php
$user=$this->session->userdata('nama_lengkap');
?>

<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <!-- <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-home"></i> <span><strong>PT. BAHAN BANGUNAN</strong></span></a>
          </div> -->

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url();?>assets/a/images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $user; ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <?php $this->load->view('a_menu');?>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->

        <!-- /menu footer buttons -->
    </div>
</div>

<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>
    <div class="shop-name"><?php echo $this->db->select('nama_toko')->where('id','system')->get('setting')->row()->nama_toko; ?></div>

    <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo base_url();?>assets/a/images/img.jpg" alt=""><?php echo $user; ?>
            <span class=" fa fa-angle-down"></span>
        </a>
        <ul class="dropdown-menu dropdown-usermenu pull-right">                  
            <li><a href="<?php echo base_url();?>a_login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
        </ul>
    </li>
</ul>
</nav>
</div>
</div>
<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
  <div class="page-title col-md-12 col-sm-12 col-xs-12">
    <div class="title_left">
      <?php echo $title; ?>
  </div>
</div>
<div class="row">
    <?php $this->load->view($content);?>
</div>
</div>
<!-- /page content -->


<!-- footer content -->
<footer>
  <div class="pull-right">
    Copyright Wildatul Awwaliah
</div>
<div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<script src="<?php echo base_url();?>assets/a/js/nprogress.js"></script>
<script src="<?php echo base_url();?>assets/a/js/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/a/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/a/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/a/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/a/js/parsley.min.js"></script>
<script src="<?php echo base_url();?>assets/a/js/id.js"></script>
<script src="<?php echo base_url();?>assets/a/js/gentelella.min.js"></script>
<script src="<?php echo base_url();?>assets/a/js/app.js"></script>

</body>
</html>

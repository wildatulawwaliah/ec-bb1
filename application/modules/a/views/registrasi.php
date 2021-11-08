<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vendor | Registrasi</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/css/login.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php echo form_open('registrasi'); ?>
              <h1>Registrasi Vendor</h1>
              <div>
                <input type="text" class="form-control" placeholder="Nama" name="nama" value="<?php echo set_value('nama');?>"/> <?php echo form_error('nama');?>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username"  value="<?php echo set_value('username');?>"/> <?php echo form_error('username');?>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password"  value="<?php echo set_value('password');?>"/> <?php echo form_error('password');?>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Nama Vendor" name="nama_vendor" value="<?php echo set_value('nama_vendor');?>"/> <?php echo form_error('nama_vendor');?>
              </div>
              <?php
                if ($this->session->flashdata('f_error')){
                ?>
                <div style="color:rgb(209, 18, 18);margin-top:-15px;">
                <?php
                  echo '*'.$this->session->flashdata('f_error');
                ?>
                </div>
              <?php } ?>
              <div>
                <button type="submit" class="btn btn-default submit" name="registrasi">Registrasi</button>
              </div>
              <div class="separator">
                <div>
                  <p>©2021 All Rights Reserved. Wildatul Awwaliah. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

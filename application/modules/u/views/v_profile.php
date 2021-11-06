<section class="m-top-10">
 <div class="container">
     <div class="row">
       <div class="col-lg-12 text-center">
         <div class="">
            <h4 class="text-uppercase ml-auto mr-auto title-head"><?php echo $title;?></h4>
        </div>
       </div>
     </div>
     <div class="row mt-5">
       <div class="col-lg-6 col-12 ml-auto mr-auto">
         <form class="" name="form" id="form">
           <input type="hidden" class="form-control" id="id_account" name="id_account" value="<?php echo $id_account; ?>" placeholder="Id">
           <div class="form-group">
             <label for="email">Username:</label>
             <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>" readonly>
           </div>
           <div class="form-group">
             <label for="email">Nama Lengkap:</label>
             <input type="email" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>">
           </div>
           <div class="form-group">
             <label for="email">Email address:</label>
             <input type="email" class="form-control" id="email" name="email" placeholder="user@mail.com" value="<?php echo $email; ?>">
           </div>
           <div class="form-group">
             <label for="email">Alamat:</label>
             <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>">
           </div>
           <div class="form-group">
             <label for="email">Telephone:</label>
             <input type="text" class="form-control" id="telephone" name="telephone" placeholder="085XXX" value="<?php echo $telephone; ?>">
           </div>
           <div id="validation-error"></div>
           <div id="validation-success"></div>
          <button type="button" name="update_data" id="update_data" class="btn btn-primary mb-2">Update Data</button>
         </form>
       </div>
     </div>

     <div class="row mt-5">
       <div class="col-lg-6 col-12 ml-auto mr-auto">
         <form class="" name="form_password" id="form_password">
           <input type="hidden" class="form-control" id="id_account_password" name="id_account_password" value="<?php echo $id_account; ?>" placeholder="Id">
           <div class="form-group">
             <label for="email">Password Baru</label>
             <input type="password" class="form-control" id="password" name="password" placeholder="***">
           </div>
           <div class="form-group">
             <label for="email">Konfirmasi Password Baru:</label>
             <input type="password" class="form-control" id="password2" name="password2" placeholder="***">
           </div>
           <div id="validation-error2"></div>
           <div id="validation-success2"></div>
          <button type="button" name="update_password" id="update_password" class="btn btn-warning mb-2">Update Password</button>
         </form>
       </div>
     </div>

 </div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
      $('#update_data').click(function(){
        validation_data();
        var string = $('#form').serialize();
        $.ajax({
          type    : 'POST',
          data    : string,
          url     : "<?php echo site_url('profile/update_data');?>",
          success : function(data) {
            success(data);
          }
        });

      })

      $('#update_password').click(function(){
        validation_password();
        var string = $('#form_password').serialize();
        $.ajax({
          type    : 'POST',
          data    : string,
          url     : "<?php echo site_url('profile/update_password');?>",
          success : function(data) {
            success2(data);
          }
        });

      })

      function validation_data(){
        var nama_lengkap=$('#nama_lengkap').val();
        var email=$('#email').val();
        var alamat=$('#alamat').val();
        var telephone=$('#telephone').val();

        if(nama_lengkap.length==0){
          error('Nama Lengkap tidak boleh kosong')
          $('#nama_lengkap').focus();
          return false();
        }

        if(email.length==0){
          error('Email tidak boleh kosong')
          $('#email').focus();
          return false();
        }

        if(alamat.length==0){
          error('Alamat tidak boleh kosong')
          $('#alamat').focus();
          return false();
        }

        if(telephone.length==0){
          error('Telephone tidak boleh kosong')
          $('#telephone').focus();
          return false();
        }
      }

      function validation_password(){
        var password=$('#password').val();
        var password2=$('#password2').val();

        if(password.length==0){
          error2('Password tidak boleh kosong')
          $('#password').focus();
          return false();
        }

        if(password2.length==0){
          error2('Konfirmasi Password tidak boleh kosong')
          $('#password2').focus();
          return false();
        }

        if(password2!=password){
          error2('Konfirmasi Password tidak sesuai Password')
          $('#password2').focus();
          return false();
        }

      }

    });
</script>

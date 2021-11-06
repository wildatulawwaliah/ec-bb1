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
           <div class="form-group">
             <label for="email">Username:</label>
             <input type="text" class="form-control" id="username" name="username" placeholder="Username">
           </div>
           <div class="form-group">
             <label for="email">Nama Lengkap:</label>
             <input type="email" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap">
           </div>
           <div class="form-group">
             <label for="email">Email address:</label>
             <input type="email" class="form-control" id="email" name="email" placeholder="user@mail.com">
           </div>
           <div class="form-group">
             <label for="email">Alamat:</label>
             <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
           </div>
           <div class="form-group">
             <label for="email">Telephone:</label>
             <input type="text" class="form-control" id="telephone" name="telephone" placeholder="085XXX">
           </div>
           <div class="form-group">
             <label for="email">Password:</label>
             <input type="password" class="form-control" id="password" name="password" placeholder="***">
           </div>
           <div class="form-group">
             <label for="email">Konfirmasi Password:</label>
             <input type="password" class="form-control" id="password2" name="password2" placeholder="***">
           </div>
           <div id="validation-error"></div>
           <div id="validation-success"></div>
          <button type="button" name="create_account" id="create_account" class="btn btn-warning mb-2">Create Account</button>
         </form>
       </div>
     </div>

 </div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
      $('#create_account').click(function(){
        validation();

        $.ajax({
          type    : 'POST',
          data    : {username:$('#username').val()},
          url     : "<?php echo site_url('create_account/cek_username');?>",
          success : function(data) {
            if(data=='1'){
              error('Username ini sudah terdaftar. Coba username yang lain!')
              $('#username').focus();
              return false();
            }else {
              var string = $('#form').serialize();
              $.ajax({
                type    : 'POST',
                data    : string,
                url     : "<?php echo site_url('create_account/simpan');?>",
                success : function(data) {
                  success(data);
                }
              });
            }
          }
        });
      })

      function validation(){
        var username=$('#username').val();
        var nama_lengkap=$('#nama_lengkap').val();
        var email=$('#email').val();
        var alamat=$('#alamat').val();
        var telephone=$('#telephone').val();
        var password=$('#password').val();
        var password2=$('#password2').val();

        if(username.length==0){
          error('Username tidak boleh kosong')
          $('#username').focus();
          return false();
        }

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

        if(password.length==0){
          error('Password tidak boleh kosong')
          $('#password').focus();
          return false();
        }

        if(password2.length==0){
          error('Konfirmasi Password tidak boleh kosong')
          $('#password2').focus();
          return false();
        }

        if(password2!=password){
          error('Konfirmasi Password tidak sesuai Password')
          $('#password2').focus();
          return false();
        }


      }

    });
</script>

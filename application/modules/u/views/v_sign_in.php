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
             <label for="email">Password:</label>
             <input type="password" class="form-control" id="password" name="password" placeholder="***">
           </div>
           <div id="validation-error"></div>
           <div id="validation-success"></div>
          <button type="button" name="create_account" id="create_account" class="btn btn-warning mb-2">Create Account</button>
          <button type="button" name="sign_in" id="sign_in" class="btn btn-success mb-2">Sign In</button>
         </form>
       </div>
     </div>
 </div>
</section>
<script type="text/javascript">
    $(document).ready(function() {

      $('#create_account').click(function(){
        location.replace("<?php echo site_url('create_account');?>");
      });

      $('#sign_in').click(function(){
        validation();
        var string = $('#form').serialize();
        $.ajax({
          type    : 'POST',
          data    : string,
          url     : "<?php echo site_url('sign_in/cek');?>",
          success : function(data) {
            if(data=='1'){
              location.replace("<?php echo site_url('home');?>");
            }else {
              error('Username and password is not valid');
              return false();
            }
          }
        });
      });

      function validation(){
        var username=$('#username').val();
        var password=$('#password').val();

        if(username.length==0){
          error('Username tidak boleh kosong')
          $('#username').focus();
          return false();
        }

        if(password.length==0){
          error('Password tidak boleh kosong')
          $('#password').focus();
          return false();
        }

      }

    });
</script>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= $base_url ?>vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?= $base_url ?>vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?= $base_url ?>css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="<?= $base_url ?>/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="<?= $base_url ?>vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= $base_url ?>css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= $base_url ?>css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= $base_url ?>/assets/imgs/logo/pnk-logo.jpeg">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo text-uppercase"><span>Login</span><strong class="text-primary">to My Dashboard</strong></div>
            <p>Enter your name and password below to login.</p>
            <div class="response"></div>
            <form method="POST" id="loginForm" action="<?= $base_url ?>admin/login" class="text-left form-validate">
              <div class="form-group-material">
                <input id="login-username" type="email" name="email" required data-msg="Please enter your username" class="input-material">
                <label for="login-username" class="label-material">Email</label>
              </div>
              <div class="form-group-material">
                <input id="login-password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                <label for="login-password" class="label-material">Password</label>
              </div>
              <div class="form-group text-center">
                <button id="login-btn" class="btn btn-primary">Login</button>
                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
              </div>
            </form><a href="#" class="forgot-pass">Forgot Password?</a><small>Do not have an account? </small><a href="register.html" class="signup">Signup</a>
          </div>
          <div class="copyrights text-center">
            <p>copyright &copy; <?= date('Y') ?><a href="<?= $base_url ?>" class="external"> PNK ADVOCATES</a></p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="<?= $base_url ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= $base_url ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $base_url ?>js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="<?= $base_url ?>vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?= $base_url ?>vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= $base_url ?>vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="<?= $base_url ?>js/front.js"></script>
    <script>
      $(document).ready(()=>{

        $("#loginForm").on('submit', function(event){
          event.preventDefault();
          $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serializeArray(),
            beforeSend: ()=> {
              $("#login-btn").attr('disabled', true)
              .html("<span class='spinner-border spinner-border-sm'></span> authenticating...");

            },
            success: (response) => {
              let resp = JSON.parse(response);

              $(".response").html(resp.message);

              if(resp.status === 200)
              {
                window.location.href = resp.url;
              }
            }
          });

        });
      });
    </script>
  </body>
</html>
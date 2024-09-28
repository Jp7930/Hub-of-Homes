<!DOCTYPE html><html lang="zxx">
<head>
  <meta charset="utf-8">
  <title>Login - Hub of Homes</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="css/prism.css" rel="stylesheet">
  <link rel="stylesheet" href="css/icons.css">
  <link rel="stylesheet" href="css/slick.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link href="css/theme.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.png" type="image/x-icon">

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9rV6yesIygoVKTD6QLf_iCa9eiIIHqZ0&amp;libraries=geometry"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/prism.js"></script>
  <script src="js/isotope.min.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/countup.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/scrollit.min.js"></script>
  <script src="js/magnific-popup.min.js"></script>
  <script src="js/script.js"></script>
  <script type="text/JavaScript" src="js/sha512.js"></script> 
  <script type="text/JavaScript" src="js/forms.js"></script> 

</head>

<body>
    
<!-- 
  #############
  Login Modals Section
  #############
-->
<!-- Modal Log In -->
<div id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="loginLabel">Log In</h4>                    
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="modal-property-details-form">
            <form class="contact-form-items row" action="includes/process_login.php" method="post" name="login_form">
              <div class="col-12">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="ph-user"></i>
                  </span>
                  <input type="text" class="form-control" placeholder="Email" id="login" name="email">
                </div>
              </div>
              <div class="col-12">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="ph-keyhole"></i>
                  </span>
                  <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                </div>
                <?php if(isset($_GET['error'])) {echo "<p class=\"text-danger text-center\" style=\"margin:0;\">Password is Incorrect!</p>";} ?>
              </div>
              <div class="col-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Remember Me
                  </label>
                </div>
              </div>
              <div class="col-6">
                <div class="form-check text-end">
                  <a href="#resetPassword" data-bs-toggle="modal" data-bs-dismiss="modal"> Forgot Password?</a>
                </div>
              </div>
              <div class="w-100 contact-form-button">
                <button type="submit" class="btn btn-large d-block w-100" value="Login" onclick="formhash(this.form, this.form.password);">Log In</button>
              </div>
              <div class="w-100 contact-form-button">
                <button type="submit" class="btn btn-large btn-outline d-block w-100  mt-3">
                  <i class="ph-google-logo align-top"></i>
                  <span> &nbsp;Log In with Google </span> 
                </button>
              </div>

            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer text-center justify-content-center">
        <p class="bold">Don’t have an account? <a href="signup.php">Create Account</a> </p>
      </div>
    </div>
  </div>
</div>

<!-- Modal Reset Password -->
<div class="modal fade modal-resetPassword" id="resetPassword" tabindex="-1" aria-labelledby="loginLabel2" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="loginLabel2">Reset Password</h4>
        <button type="button" class="btn-modal-close" data-bs-dismiss="modal" aria-label="Close">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#1C4456" stroke-width="2.3" stroke-miterlimit="10"></path>
              <path d="M15 9L9 15" stroke="#1C4456" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M15 15L9 9" stroke="#1C4456" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>             
        </button>
        
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="modal-property-details-form">
            <p>Enter the email address associated with your account and we will send you a link to reset your password.</p>
            <form class="contact-form-items row">
              <div class="col-12">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="ph-user"></i>
                  </span>
                  <input type="email" class="form-control" placeholder="Email Address">
                </div>
              </div>

              <div class="w-100 contact-form-button">
                <button type="submit" class="btn btn-large d-block w-100 mt-3" data-bs-target="#otp" data-bs-toggle="modal" data-bs-dismiss="modal">Get OTP</button>
              </div>
              <div class="w-100 contact-form-button">
                <button type="submit" class="btn btn-large btn-outline d-block w-100  mt-3" data-bs-target="#" data-bs-toggle="" data-bs-dismiss="modal">
                  <span>  Return To sign In </span> 
                </button>
              </div>

            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer text-center justify-content-center">
        <p class="bold">Don’t have an account? <a href="#createAccount" data-bs-toggle="modal" data-bs-dismiss="modal">Create Account</a> </p>
      </div>
    </div>
  </div>
</div>

<!-- Modal OTP -->
<div class="modal fade modal-otp" id="otp" tabindex="-1" aria-labelledby="loginLabel3" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 id="loginLabel3">Enter OTP</h4>
        <button type="button" class="btn-modal-close" data-bs-dismiss="modal" aria-label="Close">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#1C4456" stroke-width="2.3" stroke-miterlimit="10"></path>
              <path d="M15 9L9 15" stroke="#1C4456" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M15 15L9 9" stroke="#1C4456" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>             
        </button>
        
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="modal-property-details-form text-center">
            <p>Please check your mail, We sent an OTP code</p>
            <form class="contact-form-items row justify-content-center">
              <div class="col-2">
                <input type="text" class="form-control" placeholder="0">
              </div>
              <div class="col-2">
                <input type="text" class="form-control" placeholder="0">
              </div>
              <div class="col-2">
                <input type="text" class="form-control" placeholder="0">
              </div>
              <div class="col-2">
                <input type="text" class="form-control" placeholder="0">
              </div>

              <div class="w-100 contact-form-button">
                <button type="submit" class="btn btn-large d-block w-100 mt-3" data-bs-target="#newPassword" data-bs-toggle="modal" data-bs-dismiss="modal">Confirm</button>
              </div>
              <div class="w-100 contact-form-button">
                <button type="submit" class="btn btn-large btn-outline d-block w-100  mt-3" data-bs-target="#resetPassword" data-bs-toggle="modal" data-bs-dismiss="modal">
                  <span> Request OTP again </span> 
                </button>
              </div>

            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer text-center justify-content-center">
        <p class="bold">Remeber The Password? <a href="#login" data-bs-toggle="modal" data-bs-dismiss="modal">login</a> </p>
      </div>
    </div>
  </div>
</div>

<!-- Modal New Password -->
<div class="modal fade modal-resetPassword" id="newPassword" tabindex="-1" aria-labelledby="loginLabel4" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="loginLabel4">Reset Password</h4>
        <button type="button" class="btn-modal-close" data-bs-dismiss="modal" aria-label="Close">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#1C4456" stroke-width="2.3" stroke-miterlimit="10"></path>
              <path d="M15 9L9 15" stroke="#1C4456" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M15 15L9 9" stroke="#1C4456" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>             
        </button>
        
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="modal-property-details-form">
            <p>Enter your new password.</p>
            <form class="contact-form-items row">
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="ph-keyhole"></i>
                  </span>
                  <input type="password" class="form-control" placeholder="Password">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="ph-keyhole"></i>
                  </span>
                  <input type="password" class="form-control" placeholder="Re-Password">
                </div>
              </div>

              <div class="w-100 contact-form-button">
                <button type="submit" class="btn btn-large d-block w-100 mt-3">Update Password</button>
              </div>

            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer text-center justify-content-center">
        <p class="bold">Remember the Password? <a href="#login" data-bs-toggle="modal" data-bs-dismiss="modal">Log In</a> </p>
      </div>
    </div>
  </div>
</div>

</body>
</html>
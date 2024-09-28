<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>

<!DOCTYPE html><html lang="zxx">
<head>
  <meta charset="utf-8">
  <title>Register - Hub of Homes</title>

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
<!-- Modal Create Account -->
<div id="createAccount" tabindex="-2" aria-labelledby="createAccountLabel" aria-hidden="true" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="createAccountLabel">Create an Account</h4>          
          
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="modal-property-details-form">
            <form class="contact-form-items row" method="post" name="registration_form" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>">
              <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="ph-user"></i>
                  </span>
                  <input type="text" class="form-control" placeholder="Full Name" name='username' id='username'>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="ph-envelope-simple-open"></i>
                  </span>
                  <input type="email" class="form-control" placeholder="Email Address" name="email" id="email">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="ph-phone"></i>
                  </span>
                  <input type="text" class="form-control" placeholder="Phone Number" name="phonenum" id="phonenum">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="ph-map-pin"></i>
                  </span>
                  <input type="text" class="form-control" placeholder="Address" name="address" id="address">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="ph-keyhole"></i>
                  </span>
                  <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="ph-keyhole"></i>
                  </span>
                  <input type="password" class="form-control" placeholder="Re-enter Password" name="confirmpwd" id="confirmpwd">
                </div>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                  <label class="form-check-label" for="flexCheckDefault2">
                    <span>I agree to all </span><a href="">Terms &amp; Conditions</a> 
                  </label>
                </div>
              </div>
              <div class="w-100 contact-form-button">
                <input type="button" class="btn btn-large d-block w-100"
                   value="Register" 
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" />
              </div>
              <div class="w-100 contact-form-button">
                <button type="submit" class="btn btn-large btn-outline d-block w-100  mt-3">
                  <i class="ph-google-logo align-top"></i>
                  <span>  Create Account with Google </span> 
                </button>
              </div>
            </form>
          </div>
        </div>
        
      </div>
      <div class="modal-footer text-center justify-content-center">
        <p class="bold">Have an account? <a href="index.php" data-bs-toggle="" data-bs-dismiss="modal">Log In </a> </p>
      </div>
    </div>
  </div>
</div>
</body>
</html>
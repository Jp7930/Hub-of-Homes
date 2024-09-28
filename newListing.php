<?php
  include_once 'includes/functions.php';
  include_once 'includes/db_connect.php';
  // CSRF Protection
  if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
  }
  sec_session_start();
?>

<!DOCTYPE html><html lang="zxx"><head>
  <meta charset="utf-8">
  <title>Add a new Listing</title>

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

  <style>
    .custom-file-upload:hover {
        background-color: #e0e0e0;
      }
    
      .custom-file-upload {
        transition: background-color 0.3s ease;
        margin-left: 0.1px !important;
        padding-top: 12px;
        max-width: 230px;
        overflow: hidden;
        text-overflow: ellipsis;
      }
  </style>

</head>

<body>
<?php if (login_check($mysqli) == true) : ?>

<script>
    function showFileName(inputId, outputId) {
        var fileInput = document.getElementById(inputId);
        fileInput.onchange = function() {
            var fileName = this.files[0].name;
            document.getElementById(outputId).textContent = fileName;
        };
    }
</script>

<!-- 
  #############
  Navigation Menu
  #############
-->
<header>
  <nav class="navbar navbar-expand-lg navbar-white" id="navigationBar">
    <div class="container-fluid navbar-container">
      <div class="d-flex align-items-center">
        <a class="navbar-brand" href="home.php">
          <img src="images/logo.png" alt="logo">
        </a>
        <a href="tel:2329872 " class="navbar-number align-items-center">                   
        </a>
      </div>
      <div class=" d-none d-sm-flex navbar-search align-items-center ms-auto ms-lg-0 order-lg-last">
        <ul class="list-unstyled m-0">
          <li class="nav-item ">
            <a class="nav-link nav-search-link d-flex align-items-center" href="search.html">
              <i class="ph-magnifying-glass-bold"></i>
              Search
            </a>
          </li>
        </ul>
        <a class="btn btn-small btn-outline" href="/includes/logout.php" role="button">Log Out</a>
      </div>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="open ">
          <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="1" y1="14.4004" x2="23" y2="14.4004" stroke="#1C4456" stroke-width="2" stroke-linecap="round"></line>
            <line x1="1" y1="8.40039" x2="23" y2="8.40039" stroke="#1C4456" stroke-width="2" stroke-linecap="round"></line>
            <line x1="1" y1="1.2002" x2="23" y2="1.2002" stroke="#1C4456" stroke-width="2" stroke-linecap="round"></line>
          </svg>
            Menu
        </span>
        
        <span class="close">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#1C4456" stroke-width="2.3" stroke-miterlimit="10"></path>
            <path d="M15 9L9 15" stroke="#1C4456" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M15 15L9 9" stroke="#1C4456" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
          Close              
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="property-details.php">Property</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link " href="listing.php">Listings</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="agent-details.php">Agent Profile</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="contact.php">Contact</a>
          </li>
 
          <li class="nav-item d-none d-sm-inline-block d-lg-none">
          <a class="btn btn-small btn-outline" href="/includes/logout.php" role="button">Log Out</a>
          </li>
        </ul>
        <div class="d-flex navbar-search align-items-center ms-auto ms-lg-0 order-lg-last d-sm-none">
          <ul class="list-unstyled m-0 search-dropdown">
            <li class="nav-item ">
                <a class="nav-link nav-search-link d-flex align-items-center" href="search.html">
                  <i class="ph-magnifying-glass-bold"></i>
                  Search
                </a>
            </li>
          </ul>
          <a class="btn btn-small btn-outline" href="/includes/logout.php" role="button">Log Out</a>
        </div>
      </div>
    </div>
  </nav>
</header>

<!-- -------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="filter" style="padding-top: 115px;">
    <div class="container">
        <div class="row">
            <div style="margin-bottom: 20px;"><h3>Add a new Listing</h3></div>
            <div class="property-details-form">
                <h4>Enter property details</h4>
                <form class="contact-form-items" style="margin-top: 32px;" method="POST" action="/includes/addProperty.php" enctype="multipart/form-data">
                    <div class="input-group">
                        <span class="input-group-text"><i class="ph-house"></i></span>
                        <input type="text" class="form-control" placeholder="Property Name" id="property-name" name="property-name" maxlength="100" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i class="ph-map-pin"></i></span>
                        <input type="text" class="form-control" placeholder="Property Address" id="property-addr" name="property-addr" maxlength="150" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i class="ph-bed"></i></span>
                        <input style="margin-left: 0.1px;" type="number" class="form-control" placeholder="Bedrooms" id="bedrooms" name="bedrooms" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i class="ph-shower"></i></span>
                        <input type="number" class="form-control" placeholder="Bathrooms" id="bathrooms" name="bathrooms" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i class="ph-armchair"></i></span>
                        <input type="number" class="form-control" placeholder="Property Area (in SqFt)" id="area" name="area" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i class="ph-users-three"></i></span>
                        <input type="text" class="form-control" placeholder="Residence Type (Family / Commerical / Industrial)" id="res_type" name="res_type" maxlength="20" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i class="ph-currency-inr"></i></span>
                        <input type="number" class="form-control" placeholder="Price" id="price" name="price" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i class="ph-money"></i></span>
                        <input style="margin-left: 0.1px;" type="number" class="form-control" placeholder="Rent" id="rent" name="rent" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i class="ph-textbox"></i></span>
                        <input style="margin-left: 0.1px;" type="text" class="form-control" placeholder="Short Description" id="short-desc" name="short-desc" maxlength="100" required>
                    </div>
                    <div class="input-group">
                        <textarea class="form-control" placeholder="    Property Description" cols="20" id="description" name="description" maxlength="500"></textarea>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i class="ph-file-arrow-up"></i></span>
                        <label for="ext-photo" class="form-control custom-file-upload">Choose Exterior Photo</label>
                        <input type="file" class="form-control d-none" id="ext-photo" name="ext-photo" required>
                        <span id="ext-photo-name" class="form-control" style="padding-top: 12px;"></span>
                        <script>showFileName("ext-photo", "ext-photo-name");</script>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i class="ph-file-arrow-up"></i></span>
                        <label for="int-photo1" class="form-control custom-file-upload">Choose Interior Photo 1</label>
                        <input type="file" class="form-control d-none" id="int-photo1" name="int-photo1" required>
                        <span id="int-photo1-name" class="form-control" style="padding-top: 12px;"></span>
                        <script>showFileName("int-photo1", "int-photo1-name");</script>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i class="ph-file-arrow-up"></i></span>
                        <label for="int-photo2" class="form-control custom-file-upload">Choose Interior Photo 2</label>
                        <input type="file" class="form-control d-none" id="int-photo2" name="int-photo2" required>
                        <span id="int-photo2-name" class="form-control" style="padding-top: 12px;"></span>
                        <script>showFileName("int-photo2", "int-photo2-name");</script>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i class="ph-file-arrow-up"></i></span>
                        <label for="int-photo3" class="form-control custom-file-upload">Choose Interior Photo 3</label>
                        <input type="file" class="form-control d-none" id="int-photo3" name="int-photo3" required>
                        <span id="int-photo3-name" class="form-control" style="padding-top: 12px;"></span>
                        <script>showFileName("int-photo3", "int-photo3-name");</script>
                    </div>
                    <div class="w-100 contact-form-button">
                        <button type="submit" class="btn btn-large d-block w-100">Add Listing</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- -------------------------------------------------------------------------------------------------------------------------------------- -->

<!-- 
  #############
  Footer Navigation Section
  #############
-->
<!--For Desktops -->
<section class="footer d-none d-xl-block">
  <div class="container-fluid footer-container">
    <div class="row">
      <div class="offset-xl-1 col-xl-3">
        <div class="footer-widget">
          <div class="footer-logo">
            <img src="images/logo.png" alt="logo">
          </div>
          <div class="footer-address">
            <p>
              01 City Centre, Rajkot <br> 
              Gujarat, India.
            </p>
            <p class="contact-number mb-0"><a href="tel:+05656565656">+(91) 12345 67890</a></p>
            <p class="contact-email mb-0"><a href="mailto:info@staticmania.com">info@hubofhomes.com</a></p>
          </div>
          <div class="footer-social">
            <ul class="list-unstyled list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 26.25C21.2132 26.25 26.25 21.2132 26.25 15C26.25 8.7868 21.2132 3.75 15 3.75C8.7868 3.75 3.75 8.7868 3.75 15C3.75 21.2132 8.7868 26.25 15 26.25Z" stroke="#417086" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M19.6875 10.3125H17.8125C17.0666 10.3125 16.3512 10.6088 15.8238 11.1363C15.2963 11.6637 15 12.3791 15 13.125V26.25" stroke="#417086" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M11.25 16.875H18.75" stroke="#417086" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                                        
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.0001 10.3128C15.0002 9.23584 15.3712 8.19171 16.0505 7.35601C16.7299 6.5203 17.6762 5.94397 18.7305 5.72391C19.7848 5.50386 20.8827 5.6535 21.8396 6.14767C22.7966 6.64185 23.5542 7.45042 23.9851 8.43746L28.1251 8.4375L24.3444 12.2183C24.0982 16.021 22.414 19.5875 19.6338 22.1935C16.8536 24.7996 13.1858 26.2499 9.37514 26.25C5.62514 26.25 4.68764 24.8438 4.68764 24.8438C4.68764 24.8438 8.43764 23.4375 10.3126 20.625C10.3126 20.625 2.81264 16.875 4.68764 6.5625C4.68764 6.5625 9.37514 11.25 14.9985 12.1875L15.0001 10.3128Z" stroke="#417086" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                                       
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 19.6875C17.5888 19.6875 19.6875 17.5888 19.6875 15C19.6875 12.4112 17.5888 10.3125 15 10.3125C12.4112 10.3125 10.3125 12.4112 10.3125 15C10.3125 17.5888 12.4112 19.6875 15 19.6875Z" stroke="#417086" stroke-width="2" stroke-miterlimit="10"></path>
                    <path d="M20.1562 4.21875H9.84375C6.73715 4.21875 4.21875 6.73715 4.21875 9.84375V20.1562C4.21875 23.2629 6.73715 25.7812 9.84375 25.7812H20.1562C23.2629 25.7812 25.7812 23.2629 25.7812 20.1562V9.84375C25.7812 6.73715 23.2629 4.21875 20.1562 4.21875Z" stroke="#417086" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M21.0938 10.3125C21.8704 10.3125 22.5 9.6829 22.5 8.90625C22.5 8.1296 21.8704 7.5 21.0938 7.5C20.3171 7.5 19.6875 8.1296 19.6875 8.90625C19.6875 9.6829 20.3171 10.3125 21.0938 10.3125Z" fill="#417086"></path>
                  </svg>                                     
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24.8438 4.21875H5.15625C4.63848 4.21875 4.21875 4.63848 4.21875 5.15625V24.8438C4.21875 25.3615 4.63848 25.7812 5.15625 25.7812H24.8438C25.3615 25.7812 25.7812 25.3615 25.7812 24.8438V5.15625C25.7812 4.63848 25.3615 4.21875 24.8438 4.21875Z" stroke="#417086" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M14.0625 13.125V20.625" stroke="#417086" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.3125 13.125V20.625" stroke="#417086" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M14.0625 16.4063C14.0625 15.536 14.4082 14.7014 15.0236 14.0861C15.6389 13.4707 16.4735 13.125 17.3438 13.125C18.214 13.125 19.0486 13.4707 19.6639 14.0861C20.2793 14.7014 20.625 15.536 20.625 16.4063V20.625" stroke="#417086" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.3125 10.7812C11.0892 10.7812 11.7188 10.1517 11.7188 9.375C11.7188 8.59835 11.0892 7.96875 10.3125 7.96875C9.53585 7.96875 8.90625 8.59835 8.90625 9.375C8.90625 10.1517 9.53585 10.7812 10.3125 10.7812Z" fill="#417086"></path>
                  </svg>                                                            
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.75 15L13.125 11.25V18.75L18.75 15Z" stroke="#417086" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M2.8125 15C2.8125 18.4869 3.17275 20.5328 3.44661 21.5843C3.51982 21.8715 3.6604 22.1371 3.85671 22.3591C4.05302 22.5812 4.2994 22.7532 4.57546 22.861C8.49853 24.3686 15 24.3272 15 24.3272C15 24.3272 21.5014 24.3686 25.4245 22.861C25.7006 22.7532 25.9469 22.5812 26.1433 22.3592C26.3396 22.1371 26.4802 21.8715 26.5534 21.5844C26.8272 20.5329 27.1875 18.4869 27.1875 15C27.1875 11.513 26.8272 9.4671 26.5534 8.41559C26.4802 8.12842 26.3396 7.86282 26.1433 7.6408C25.947 7.41878 25.7006 7.24673 25.4245 7.13891C21.5015 5.63132 15 5.67272 15 5.67272C15 5.67272 8.49861 5.63132 4.57549 7.1389C4.29944 7.24671 4.05305 7.41876 3.85674 7.64078C3.66043 7.8628 3.51984 8.1284 3.44664 8.41557C3.17277 9.46707 2.8125 11.513 2.8125 15Z" stroke="#417086" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                    
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xl-2">
        <div class="footer-widget">
          <h5>Pages</h5>
          <ul class="list-unstyled">
            <li><a href="home.php" class="footer-link">Home</a></li>
            <li><a href="about.html" class="footer-link">About</a></li>
            <li><a href="contact.php" class="footer-link">Contact</a></li>
            <li><a href="search.html" class="footer-link">Search</a></li>
          </ul>
        </div>
      </div>
      <div class="col-xl-2">
        <div class="footer-widget">
          <h5>Company Details</h5>
          <ul class="list-unstyled">
            <li><a href="listing.php" class="footer-link">Listing</a></li>
            <li><a href="property-details.php" class="footer-link">Property Details</a></li>
            <li><a href="agent-details.php" class="footer-link">Agent Profile</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="offset-1 col-11">
        <p class="footer-copyright">Hub of Homes Limited © 2024 <span class="newYear"></span></p>
      </div>
    </div>
  </div>
</section>

<!--
  #############
  Footer Area
  #############
-->
<!-- Mark up for Script Section-->
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
<script src="js/s

  <?php else : ?>
  <p><span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.</p>
  <?php endif; ?>

</body>
</html>
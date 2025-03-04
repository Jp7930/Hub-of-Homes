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
  <title>Agent Details</title>

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
</head>

<body>
<?php if (login_check($mysqli) == true) : ?>

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
        <a class="btn btn-small btn-outline d-none d-lg-inline-block" data-bs-toggle="modal" href="/includes/logout.php" role="button">Log Out</a>
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
            <a class="nav-link" href="home.php">
              Home
            </a>
            <!-- <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="home.php">Home v1</a></li>
              <li><a class="dropdown-item" href="index2.html">Home v2</a></li>
            </ul> -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">about</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="property-details.php">Property</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link " href="listing.php">
              Listings
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="agent-details.php">
              Agent Profile
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="contact.php">
              Contact
            </a>
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
<!-- 
  #############
  Agent Details Page Section
  #############
-->
<section class="agent-details">
  <!--Agent Hero Section-->
  <div class="agent-details--hero">
    <div class="agent-details--hero-banner">
      <img src="images/agent-cover-bg.png" alt="agent-cover-bg">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="agent-details--content">
            <div class="agent-details--content-thumb">
              <img src="images/agent-single.png" alt="agent">
            </div>
            <div class="agent-details--content-name">
              <h5>Bruno Fernandes</h5>
              <div class="review-stars d-flex align-items-end">
                <ul class="list-unstyled mb-0">
                  <li class="list-inline-item active">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>                        
                  </li>
                  <li class="list-inline-item active">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>                        
                  </li>
                  <li class="list-inline-item active">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>                        
                  </li>
                  <li class="list-inline-item active">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>                        
                  </li>
                  <li class="list-inline-item ">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>                          
                  </li>
                </ul>
                <span>4.5 review</span>
              </div>
            </div>
            <div class="agent-details--content-contact">
              <a href="tel:+05656565656" class="phone d-flex align-items-center">
                <i class="ph-phone"></i>
                <span>(302) 555-0107</span>
              </a>
              <a href="tel:+05656565656" class="mail d-flex align-items-center">
                <i class="ph-envelope-simple-open"></i>
                <span>staticmania@gmail.com</span>
              </a>
            </div>
            <div class="agent-details--content-button">
              <a href="contact.php" class="btn">
                Contact
              </a>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  <div class="agent-details--items">
    <div class="container">
      <div class="row scrollspy">
        <div class="col-12">
          <ul class="list-unstyled">
            <li class="list-inline-item">
              <a class="btn btn-small btn-outline active" data-scroll-nav="0">For rent</a>
            </li>
            <li class="list-inline-item">
              <a data-scroll-nav="1" class="btn btn-small btn-outline">About</a>
            </li>
            <li class="list-inline-item">
              <a data-scroll-nav="2" class="btn btn-small btn-outline">Review</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
   <!--Agent Properties Section-->
  <div class="container" data-scroll-index="0">
    <div class="agent-details--properties row row-cols-xl-3 row-cols-md-2 g-4">
      <!-- ----------------------------------------------------------------------------------------------------------- -->

<!-- -----------------------------------------SQL QUERY------------------------------------------ -->
<?php $result = $mysqli->query("SELECT * FROM PROPERTIES"); while ($row = $result->fetch_assoc()) {?>
            <div class="properties-card industrial commercial resident">
              <div class="properties-card--thumb">
                <img src="images/<?php echo $row['image_name']; ?>" alt="properties1">
              </div>
              <div class="properties-card--content ">
                <div class="d-flex align-items-center properties-card--content--address">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.75 21H14.1131C14.8932 20.3046 15.629 19.5609 16.316 18.7734C18.8896 15.8136 20.25 12.6934 20.25 9.75C20.25 7.56196 19.3808 5.46354 17.8336 3.91637C16.2865 2.36919 14.188 1.5 12 1.5C9.81196 1.5 7.71354 2.36919 6.16637 3.91637C4.61919 5.46354 3.75 7.56196 3.75 9.75C3.75 12.6934 5.11038 15.8136 7.68402 18.7734C8.37102 19.5609 9.10676 20.3046 9.8869 21H5.25C5.05109 21 4.86032 21.079 4.71967 21.2197C4.57902 21.3603 4.5 21.5511 4.5 21.75C4.5 21.9489 4.57902 22.1397 4.71967 22.2803C4.86032 22.421 5.05109 22.5 5.25 22.5H18.75C18.9489 22.5 19.1397 22.421 19.2803 22.2803C19.421 22.1397 19.5 21.9489 19.5 21.75C19.5 21.5511 19.421 21.3603 19.2803 21.2197C19.1397 21.079 18.9489 21 18.75 21ZM12 6.75C12.5934 6.75 13.1734 6.92595 13.6667 7.25559C14.1601 7.58524 14.5446 8.05377 14.7717 8.60195C14.9987 9.15013 15.0581 9.75333 14.9424 10.3353C14.8266 10.9172 14.5409 11.4518 14.1213 11.8713C13.7018 12.2909 13.1672 12.5766 12.5853 12.6924C12.0034 12.8081 11.4002 12.7487 10.852 12.5216C10.3038 12.2946 9.83526 11.9101 9.50562 11.4167C9.17597 10.9234 9.00002 10.3433 9.00002 9.75C9.00002 9.35603 9.07761 8.96592 9.22838 8.60194C9.37914 8.23797 9.60012 7.90725 9.8787 7.62867C10.1573 7.3501 10.488 7.12912 10.852 6.97835C11.2159 6.82759 11.6061 6.75 12 6.75Z" fill="#1C4456"></path>
                  </svg>
                  <span><?php echo $row['address']; ?></span>
                </div>
                <ul class="list-unstyled properties-card--content--features">
                  <li class="d-flex align-items-center">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M16.25 5.625H1.875V3.75C1.875 3.58424 1.80915 3.42527 1.69194 3.30806C1.57473 3.19085 1.41576 3.125 1.25 3.125C1.08424 3.125 0.925268 3.19085 0.808058 3.30806C0.690848 3.42527 0.625 3.58424 0.625 3.75V16.25C0.625 16.4158 0.690848 16.5747 0.808058 16.6919C0.925268 16.8092 1.08424 16.875 1.25 16.875C1.41576 16.875 1.57473 16.8092 1.69194 16.6919C1.80915 16.5747 1.875 16.4158 1.875 16.25V13.75H18.125V16.25C18.125 16.4158 18.1908 16.5747 18.3081 16.6919C18.4253 16.8092 18.5842 16.875 18.75 16.875C18.9158 16.875 19.0747 16.8092 19.1919 16.6919C19.3092 16.5747 19.375 16.4158 19.375 16.25V8.75C19.3741 7.92149 19.0445 7.12717 18.4587 6.54132C17.8728 5.95548 17.0785 5.62593 16.25 5.625ZM1.875 6.875H7.5V12.5H1.875V6.875Z" fill="#417086"></path>
                    </svg>                    
                    <span><?php echo $row['bedrooms']; ?> Bed Room</span>                   
                  </li>
                  <li class="d-flex align-items-center">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.625 17.8125C5.625 17.9979 5.57002 18.1792 5.467 18.3334C5.36399 18.4875 5.21757 18.6077 5.04627 18.6786C4.87496 18.7496 4.68646 18.7682 4.5046 18.732C4.32275 18.6958 4.1557 18.6065 4.02459 18.4754C3.89348 18.3443 3.80419 18.1773 3.76801 17.9954C3.73184 17.8135 3.75041 17.625 3.82136 17.4537C3.89232 17.2824 4.01248 17.136 4.16665 17.033C4.32082 16.93 4.50208 16.875 4.6875 16.875C4.93614 16.875 5.1746 16.9738 5.35041 17.1496C5.52623 17.3254 5.625 17.5639 5.625 17.8125ZM6.875 14.6875C6.68958 14.6875 6.50832 14.7425 6.35415 14.8455C6.19998 14.9485 6.07982 15.0949 6.00886 15.2662C5.93791 15.4375 5.91934 15.626 5.95551 15.8079C5.99169 15.9898 6.08098 16.1568 6.21209 16.2879C6.3432 16.419 6.51025 16.5083 6.6921 16.5445C6.87396 16.5807 7.06246 16.5621 7.23377 16.4911C7.40507 16.4202 7.55149 16.3 7.6545 16.1459C7.75752 15.9917 7.8125 15.8104 7.8125 15.625C7.8125 15.3764 7.71373 15.1379 7.53791 14.9621C7.3621 14.7863 7.12364 14.6875 6.875 14.6875ZM2.1875 14.375C2.00208 14.375 1.82082 14.43 1.66665 14.533C1.51248 14.636 1.39232 14.7824 1.32136 14.9537C1.25041 15.125 1.23184 15.3135 1.26801 15.4954C1.30419 15.6773 1.39348 15.8443 1.52459 15.9754C1.6557 16.1065 1.82275 16.1958 2.0046 16.232C2.18646 16.2682 2.37496 16.2496 2.54627 16.1786C2.71757 16.1077 2.86399 15.9875 2.967 15.8334C3.07002 15.6792 3.125 15.4979 3.125 15.3125C3.125 15.0639 3.02623 14.8254 2.85041 14.6496C2.6746 14.4738 2.43614 14.375 2.1875 14.375ZM5.3125 13.125C5.3125 12.9396 5.25752 12.7583 5.1545 12.6042C5.05149 12.45 4.90507 12.3298 4.73377 12.2589C4.56246 12.1879 4.37396 12.1693 4.1921 12.2055C4.01025 12.2417 3.8432 12.331 3.71209 12.4621C3.58098 12.5932 3.49169 12.7603 3.45551 12.9421C3.41934 13.124 3.43791 13.3125 3.50886 13.4838C3.57982 13.6551 3.69998 13.8015 3.85415 13.9045C4.00832 14.0075 4.18958 14.0625 4.375 14.0625C4.62364 14.0625 4.8621 13.9637 5.03791 13.7879C5.21373 13.6121 5.3125 13.3736 5.3125 13.125ZM19.375 2.5H17.1339C16.9696 2.49955 16.807 2.53168 16.6553 2.59453C16.5035 2.65738 16.3658 2.74969 16.25 2.86614L14.0747 5.04143L4.2202 6.68385C3.99366 6.72162 3.7819 6.82106 3.60816 6.97128C3.43443 7.1215 3.30544 7.31667 3.23535 7.53539C3.16526 7.7541 3.15679 7.9879 3.21085 8.21111C3.26492 8.43433 3.37943 8.63834 3.54183 8.80074L11.1993 16.4581C11.3617 16.6205 11.5657 16.7351 11.7889 16.7892C12.0121 16.8432 12.2459 16.8348 12.4646 16.7647C12.6833 16.6946 12.8785 16.5656 13.0287 16.3919C13.179 16.2181 13.2784 16.0064 13.3162 15.7798L14.9586 5.92534V5.9253L17.1339 3.75H19.375C19.5408 3.75 19.6997 3.68416 19.8169 3.56695C19.9342 3.44974 20 3.29076 20 3.125C20 2.95924 19.9342 2.80027 19.8169 2.68306C19.6997 2.56585 19.5408 2.5 19.375 2.5Z" fill="#417086"></path>
                    </svg>                    
                    <span><?php echo $row['bathrooms']; ?> Bath</span>                   
                  </li>
                  <li class="d-flex align-items-center">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M18.1114 2.9601L15.6168 5.45467L17.3538 7.19168C17.4597 7.29764 17.5318 7.43263 17.5611 7.57958C17.5903 7.72654 17.5753 7.87886 17.5179 8.01728C17.4606 8.15571 17.3635 8.27402 17.2389 8.35727C17.1143 8.44052 16.9679 8.48496 16.8181 8.48497H12.2726C12.0717 8.48496 11.879 8.40514 11.7369 8.26307C11.5949 8.121 11.515 7.92832 11.515 7.7274V3.18195C11.515 3.03212 11.5595 2.88565 11.6427 2.76108C11.726 2.6365 11.8443 2.53941 11.9827 2.48207C12.1211 2.42473 12.2735 2.40972 12.4204 2.43894C12.5674 2.46816 12.7024 2.54029 12.8083 2.64623L14.5453 4.38323L17.0399 1.88865C17.1103 1.8183 17.1938 1.76249 17.2857 1.72442C17.3776 1.68634 17.4761 1.66675 17.5756 1.66675C17.6751 1.66675 17.7736 1.68634 17.8656 1.72442C17.9575 1.76249 18.041 1.8183 18.1114 1.88865C18.1817 1.959 18.2375 2.04252 18.2756 2.13444C18.3137 2.22636 18.3333 2.32488 18.3333 2.42437C18.3333 2.52387 18.3137 2.62238 18.2756 2.7143C18.2375 2.80622 18.1817 2.88974 18.1114 2.9601ZM7.72715 11.5153H3.1817C3.03187 11.5153 2.88541 11.5597 2.76083 11.643C2.63626 11.7262 2.53916 11.8445 2.48182 11.983C2.42448 12.1214 2.40947 12.2737 2.43869 12.4207C2.46791 12.5676 2.54005 12.7026 2.64598 12.8086L4.38299 14.5456L1.88841 17.0402C1.81806 17.1105 1.76225 17.194 1.72417 17.2859C1.6861 17.3779 1.6665 17.4764 1.6665 17.5759C1.6665 17.6754 1.6861 17.7739 1.72417 17.8658C1.76225 17.9577 1.81806 18.0412 1.88841 18.1116C2.03049 18.2537 2.22319 18.3335 2.42413 18.3335C2.52362 18.3335 2.62214 18.3139 2.71406 18.2758C2.80598 18.2378 2.8895 18.1819 2.95985 18.1116L5.45443 15.617L7.19143 17.354C7.29739 17.46 7.43238 17.5321 7.57934 17.5613C7.72629 17.5905 7.87861 17.5755 8.01704 17.5182C8.15546 17.4608 8.27378 17.3637 8.35703 17.2392C8.44027 17.1146 8.48471 16.9681 8.48473 16.8183V12.2728C8.48472 12.0719 8.4049 11.8792 8.26283 11.7372C8.12076 11.5951 7.92807 11.5153 7.72715 11.5153Z" fill="#417086"></path>
                    </svg>                    
                    <span><?php echo $row['area']; ?> sqft</span>                   
                  </li>
                  <li class="d-flex align-items-center">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M14.6166 7.34154C15.9789 7.34154 17.0832 6.23717 17.0832 4.87487C17.0832 3.51257 15.9789 2.4082 14.6166 2.4082C13.2543 2.4082 12.1499 3.51257 12.1499 4.87487C12.1499 6.23717 13.2543 7.34154 14.6166 7.34154Z" fill="#417086"></path>
                      <path d="M5.38341 7.34154C6.74572 7.34154 7.85008 6.23717 7.85008 4.87487C7.85008 3.51257 6.74572 2.4082 5.38341 2.4082C4.02111 2.4082 2.91675 3.51257 2.91675 4.87487C2.91675 6.23717 4.02111 7.34154 5.38341 7.34154Z" fill="#417086"></path>
                      <path d="M14.6166 17.5915C15.9789 17.5915 17.0832 16.4872 17.0832 15.1249C17.0832 13.7626 15.9789 12.6582 14.6166 12.6582C13.2543 12.6582 12.1499 13.7626 12.1499 15.1249C12.1499 16.4872 13.2543 17.5915 14.6166 17.5915Z" fill="#417086"></path>
                      <path d="M5.38341 17.5915C6.74572 17.5915 7.85008 16.4872 7.85008 15.1249C7.85008 13.7626 6.74572 12.6582 5.38341 12.6582C4.02111 12.6582 2.91675 13.7626 2.91675 15.1249C2.91675 16.4872 4.02111 17.5915 5.38341 17.5915Z" fill="#417086"></path>
                    </svg>                    
                    <span><?php echo $row['residencetype']; ?></span>                   
                  </li>
                </ul>
                <div class="properties-card--footer d-flex align-items-center justify-content-between">
                  <form action="property-details.php">
                    <input type="hidden" name="id" value="<?php echo $row['property_id']; ?>">
                    <button type="submit" class="btn btn-small">View Details</button>
                  </form>
                  <h5>₹<?php echo $row['price']; ?></h5>
                </div>
              </div> 
            </div>
            <?php } mysqli_free_result($result); ?>
<!-- ----------------------------------------------------------------------------------------------------------- -->
     
    </div>
    <div class="row">
      <div class="col-12">
      </div>
    </div>
  </div>
  <div class="container" data-scroll-index="1">
    <div class="row">
      <div class="col-12">
        <div class="agent-details--about" style="margin-top: 50px;">
          <div class="agent-details--about-info">
            <div class="agent-details--about-info-author d-flex align-items-center">
              <div class="agent-details--about-info-author-thumb">
                <img src="images/agent-single.png" alt="agent">
              </div>
              <div class="agent-details--about-info-author-details">
                <h5>Bruno Fernandes</h5>
                <div class="review-stars d-flex align-items-end">
                  <ul class="list-unstyled mb-0">
                    <li class="list-inline-item active">
                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>                        
                    </li>
                    <li class="list-inline-item active">
                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>                        
                    </li>
                    <li class="list-inline-item active">
                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>                        
                    </li>
                    <li class="list-inline-item active">
                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>                        
                    </li>
                    <li class="list-inline-item ">
                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>                          
                    </li>
                  </ul>
                  <span>4.5 review</span>
                </div>
                <a href="tel:+05656565656" class="phone d-flex align-items-center">
                  <i class="ph-phone"></i>
                  <span>(302) 555-0107</span>
                </a>
                <a href="tel:+05656565656" class="mail d-flex align-items-center">
                  <i class="ph-envelope-simple-open"></i>
                  <span>staticmania@gmail.com</span>
                </a>
              </div>
            </div>
            <p class="agent-details--about-info-author-description">A slider is great way to display a slideshow featuring images or videos, usually on your homepage.
              Adding sliders to your site is no longer difficult. You don’t have to know coding anymore. 
              Just use a slider widget and it will automatically insert the slider on your web page.<br><br>
              One of the best ways to add beautiful sliders with excellent responsiveness and advanced options. </p>
            <a href="contact.php" class="btn">
              Contact
            </a>
          </div>
          <div class="agent-details--about-profile">
            <div class="agent-details--about-profile-experience">
              <h6>Experience</h6>
              <p>15+ years experience</p>
            </div>
            <div class="agent-details--about-profile-experience">
              <h6>Property Types</h6>
              <p>Private House, Villa, Townhouse, Apartment</p>
            </div>
            <div class="agent-details--about-profile-experience">
              <h6>Aria</h6>
              <p>California, San Jose, Miami</p>
            </div>
            <div class="agent-details--about-profile-experience">
              <h6>Address</h6>
              <p>59 Orchard, NY 5005, US</p>
            </div>
            <div class="agent-details--about-profile-experience d-flex align-items-center justify-content-between flex-wrap">
              <div class="agent-details--about-profile-experience">
                <h6>Licencse No.</h6>
                <p>BF-0535</p>
              </div>
              <div class="agent-details--about-profile-experience">
                <h6>Website</h6>
                <p>www.staticmania.com</p>
              </div>
            </div>
            <div class="contact-social">
              <h6>Socila Links</h6>
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
      </div>
    </div>
  </div>

  <div class="container" data-scroll-index="2">
    <div class="row">
      <div class="col-12">
        <div class="agent-details--review">
          <div class="agent-details--review-title d-flex align-items-center justify-content-between">
            <h4>Clients Review</h4>
            <a href="#" class="btn btn-large">
              <span>Write a Review</span>
              <i class="ph-plus"></i>
            </a>
          </div>
          <!--agent review item -->
          <div class="agent-details--review-item">
            <p class="agent-details--review-item-description">Eget eu massa et consectetur. Mauris donec. Leo a, id sed duis proin sodales. 
              Turpis viverra diam porttitor mattis morbi ac amet. Euismod commodo.
               We get you customer relationships that last. </p>

            <div class="review-stars d-flex align-items-end">
              <ul class="list-unstyled mb-0">
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item ">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                          
                </li>
              </ul>
              <span class="me-5">4.5 review</span>
              <span>02 June 2022</span>
            </div>
            <div class="agent-details--review-item-author d-flex align-items-center">
              <div class="agent-details--review-item-author-thumb">
                <img src="images/review.png" alt="review">
              </div>
              <div class="agent-details--review-item-author-details">
                <h4>Taylor Wilson</h4>
                <p>Product Manager - Static Mania</p>
              </div>
            </div>
          </div>
          <!--agent review item -->
          <div class="agent-details--review-item">
            <p class="agent-details--review-item-description">Eget eu massa et consectetur. Mauris donec. Leo a, id sed duis proin sodales. 
              Turpis viverra diam porttitor mattis morbi ac amet. Euismod commodo.
               We get you customer relationships that last. </p>

            <div class="review-stars d-flex align-items-end">
              <ul class="list-unstyled mb-0">
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item ">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                          
                </li>
              </ul>
              <span class="me-5">4.5 review</span>
              <span>02 June 2022</span>
            </div>
            <div class="agent-details--review-item-author d-flex align-items-center">
              <div class="agent-details--review-item-author-thumb">
                <img src="images/review.png" alt="review">
              </div>
              <div class="agent-details--review-item-author-details">
                <h4>Taylor Wilson</h4>
                <p>Product Manager - Static Mania</p>
              </div>
            </div>
          </div>
          <!--agent review item -->
          <div class="agent-details--review-item">
            <p class="agent-details--review-item-description">Eget eu massa et consectetur. Mauris donec. Leo a, id sed duis proin sodales. 
              Turpis viverra diam porttitor mattis morbi ac amet. Euismod commodo.
               We get you customer relationships that last. </p>

            <div class="review-stars d-flex align-items-end">
              <ul class="list-unstyled mb-0">
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item ">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                          
                </li>
              </ul>
              <span class="me-5">4.5 review</span>
              <span>02 June 2022</span>
            </div>
            <div class="agent-details--review-item-author d-flex align-items-center">
              <div class="agent-details--review-item-author-thumb">
                <img src="images/review.png" alt="review">
              </div>
              <div class="agent-details--review-item-author-details">
                <h4>Taylor Wilson</h4>
                <p>Product Manager - Static Mania</p>
              </div>
            </div>
          </div>
          <!--agent review item -->
          <div class="agent-details--review-item">
            <p class="agent-details--review-item-description">Eget eu massa et consectetur. Mauris donec. Leo a, id sed duis proin sodales. 
              Turpis viverra diam porttitor mattis morbi ac amet. Euismod commodo.
               We get you customer relationships that last. </p>

            <div class="review-stars d-flex align-items-end">
              <ul class="list-unstyled mb-0">
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item ">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                          
                </li>
              </ul>
              <span class="me-5">4.5 review</span>
              <span>02 June 2022</span>
            </div>
            <div class="agent-details--review-item-author d-flex align-items-center">
              <div class="agent-details--review-item-author-thumb">
                <img src="images/review.png" alt="review">
              </div>
              <div class="agent-details--review-item-author-details">
                <h4>Taylor Wilson</h4>
                <p>Product Manager - Static Mania</p>
              </div>
            </div>
          </div>
          <!--agent review item -->
          <div class="agent-details--review-item">
            <p class="agent-details--review-item-description">Eget eu massa et consectetur. Mauris donec. Leo a, id sed duis proin sodales. 
              Turpis viverra diam porttitor mattis morbi ac amet. Euismod commodo.
               We get you customer relationships that last. </p>

            <div class="review-stars d-flex align-items-end">
              <ul class="list-unstyled mb-0">
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item ">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                          
                </li>
              </ul>
              <span class="me-5">4.5 review</span>
              <span>02 June 2022</span>
            </div>
            <div class="agent-details--review-item-author d-flex align-items-center">
              <div class="agent-details--review-item-author-thumb">
                <img src="images/review.png" alt="review">
              </div>
              <div class="agent-details--review-item-author-details">
                <h4>Taylor Wilson</h4>
                <p>Product Manager - Static Mania</p>
              </div>
            </div>
          </div>
          <!--agent review item -->
          <div class="agent-details--review-item">
            <p class="agent-details--review-item-description">Eget eu massa et consectetur. Mauris donec. Leo a, id sed duis proin sodales. 
              Turpis viverra diam porttitor mattis morbi ac amet. Euismod commodo.
               We get you customer relationships that last. </p>

            <div class="review-stars d-flex align-items-end">
              <ul class="list-unstyled mb-0">
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item active">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                        
                </li>
                <li class="list-inline-item ">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.27549 11.9188L11.4255 13.9188C11.8317 14.175 12.3317 13.7938 12.213 13.325L11.3005 9.73752C11.2758 9.63807 11.2797 9.53369 11.3118 9.43638C11.3439 9.33907 11.4028 9.2528 11.4817 9.18752L14.3067 6.83127C14.6755 6.52502 14.488 5.90627 14.0067 5.87502L10.3192 5.63752C10.2186 5.63166 10.1219 5.59663 10.0409 5.53669C9.95984 5.47675 9.89803 5.39451 9.86299 5.30002L8.48799 1.83752C8.45159 1.73745 8.38528 1.65102 8.29807 1.58994C8.21086 1.52886 8.10696 1.49609 8.00049 1.49609C7.89401 1.49609 7.79012 1.52886 7.7029 1.58994C7.61569 1.65102 7.54938 1.73745 7.51299 1.83752L6.13799 5.30002C6.10294 5.39451 6.04113 5.47675 5.96011 5.53669C5.87908 5.59663 5.78235 5.63166 5.68174 5.63752L1.99424 5.87502C1.51299 5.90627 1.32549 6.52502 1.69424 6.83127L4.51924 9.18752C4.5982 9.2528 4.6571 9.33907 4.68917 9.43638C4.72124 9.53369 4.72516 9.63807 4.70049 9.73752L3.85674 13.0625C3.71299 13.625 4.31299 14.0813 4.79424 13.775L7.72549 11.9188C7.80768 11.8665 7.90308 11.8387 8.00049 11.8387C8.0979 11.8387 8.19329 11.8665 8.27549 11.9188Z" fill="" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>                          
                </li>
              </ul>
              <span class="me-5">4.5 review</span>
              <span>02 June 2022</span>
            </div>
            <div class="agent-details--review-item-author d-flex align-items-center">
              <div class="agent-details--review-item-author-thumb">
                <img src="images/review.png" alt="review">
              </div>
              <div class="agent-details--review-item-author-details">
                <h4>Taylor Wilson</h4>
                <p>Product Manager - Static Mania</p>
              </div>
            </div>
          </div>

          <div class="agent-details--review-item-more">
            <a href="#" class="btn btn-outline">
              <span>See More</span>
              <i class="ph-caret-down"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

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
      <!-- <div class="col-xl-2">
        <div class="footer-widget">
          <h5>Other Pages</h5>
          <ul class="list-unstyled">
            <li><a href="blog.html" class="footer-link">Blog</a></li>
            <li><a href="blog-single.html" class="footer-link">Blog-single</a></li>
            <li><a href="privacy.html" class="footer-link">Privacy Policy</a></li>
            <li><a href="license.html" class="footer-link">License</a></li>
            <li><a href="404.html" class="footer-link">404 Page</a></li>
          </ul>
        </div>
      </div>
      <div class="col-xl-2">
        <div class="footer-widget">
          <h5>Others</h5>
          <ul class="list-unstyled">
            <li><a href="/includes/logout.php" role="button" class="footer-link">Log Out</a></li>
            <li><a data-bs-toggle="modal" href="#otp" role="button" class="footer-link">Enter OTP</a></li>
            <li><a data-bs-toggle="modal" href="#newPassword" role="button" class="footer-link">New password</a></li>
            <li><a data-bs-toggle="modal" href="#resetPassword" role="button" class="footer-link">Reset password</a></li>
            <li><a data-bs-toggle="modal" href="#createAccount" role="button" class="footer-link">Create Account</a></li>
          </ul>
        </div>
      </div> -->
    </div>
    <div class="row">
      <div class="offset-1 col-11">
        <p class="footer-copyright">Hub of Homes Limited © <span class="newYear"></span></p>
      </div>
    </div>
  </div>
</section>

<!--For Tablet -->
<section class="footer d-none d-sm-block d-xl-none">
  <div class="container-fluid footer-container">
    <div class="row">
      <div class="col-sm-6">
        <div class="footer-widget">
          <div class="footer-logo">
            <img src="images/logo.png" alt="logo">
          </div>
          <div class="footer-address">
            <p>
              59 Bervely Hill Ave, Brooklyn Town, <br> 
              New York, NY 5630, CA, US
            </p>
            <p class="contact-number mb-0"><a href="tel:+05656565656">+056 686 56 56 98</a></p>
            <p class="contact-email mb-0"><a href="mailto:info@staticmania.com">info@staticmania.com</a></p>
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
            <p class="footer-copyright">Hub of Homes Limited ©<span class="newYearDesktop"></span></p>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="row row-cols-2 gutter-5">
          <div class="col">
            <div class="footer-widget">
              <h5>Pages</h5>
              <ul class="list-unstyled">
                <li><a href="home.php" class="footer-link">Home v1</a></li>
                <li><a href="index2.html" class="footer-link">Home v2</a></li>
                <li><a href="about.html" class="footer-link">About</a></li>
                <li><a href="contact.php" class="footer-link">Contact</a></li>
                <li><a href="search.html" class="footer-link">Search</a></li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="footer-widget">
              <h5>Company Details</h5>
              <ul class="list-unstyled">
                <li><a href="listing.php" class="footer-link">Listing</a></li>
                <li><a href="property-details.php" class="footer-link">Property Details</a></li>
                <li><a href="agent.html" class="footer-link">Agent List</a></li>
                <li><a href="agent-details.php" class="footer-link">Agent Profile</a></li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="footer-widget">
              <h5>Other Pages</h5>
              <ul class="list-unstyled">
                <li><a href="blog.html" class="footer-link">Blog</a></li>
                <li><a href="blog-single.html" class="footer-link">Blog-single</a></li>
                <li><a href="privacy.html" class="footer-link">Privacy Policy</a></li>
                <li><a href="license.html" class="footer-link">License</a></li>
                <li><a href="404.html" class="footer-link">404 Page</a></li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="footer-widget">
              <h5>Others</h5>
              <ul class="list-unstyled">
                <li><a href="/includes/logout.php" role="button" class="footer-link">Log Out</a></li>
                <li><a data-bs-toggle="modal" href="#otp" role="button" class="footer-link">Enter OTP</a></li>
                <li><a data-bs-toggle="modal" href="#newPassword" role="button" class="footer-link">New password</a></li>
                <li><a data-bs-toggle="modal" href="#resetPassword" role="button" class="footer-link">Reset password</a></li>
                <li><a data-bs-toggle="modal" href="#createAccount" role="button" class="footer-link">Create Account</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>

<!--For Mobile -->
<section class="footer d-block d-sm-none ">
  <div class="container-fluid footer-container">
    <div class="row gutter-5">
      <div class="col-12">
        <div class="footer-widget">
          <div class="footer-logo">
            <img src="images/logo.png" alt="logo">
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="row row-cols-2 gutter-5">
          <div class="col">
            <div class="footer-widget">
              <h5>Pages </h5>
              <ul class="list-unstyled">
                <li><a href="home.php" class="footer-link">Home v1</a></li>
                <li><a href="index2.html" class="footer-link">Home v2</a></li>
                <li><a href="about.html" class="footer-link">About</a></li>
                <li><a href="contact.php" class="footer-link">Contact</a></li>
                <li><a href="search.html" class="footer-link">Search</a></li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="footer-widget">
              <h5>Company Details</h5>
              <ul class="list-unstyled">
                <li><a href="listing.php" class="footer-link">Listing</a></li>
                <li><a href="property-details.php" class="footer-link">Property Details</a></li>
                <li><a href="agent.html" class="footer-link">Agent List</a></li>
                <li><a href="agent-details.php" class="footer-link">Agent Profile</a></li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="footer-widget">
              <h5>Other Pagess</h5>
              <ul class="list-unstyled">
                <li><a href="blog.html" class="footer-link">Blog</a></li>
                <li><a href="blog-single.html" class="footer-link">Blog-single</a></li>
                <li><a href="privacy.html" class="footer-link">Privacy Policy</a></li>
                <li><a href="license.html" class="footer-link">License</a></li>
                <li><a href="404.html" class="footer-link">404 Page</a></li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="footer-widget">
              <h5>Others</h5>
              <ul class="list-unstyled">
                <li><a href="/includes/logout.php" role="button" class="footer-link">Log Out</a></li>
                <li><a data-bs-toggle="modal" href="#otp" role="button" class="footer-link">Enter OTP</a></li>
                <li><a data-bs-toggle="modal" href="#newPassword" role="button" class="footer-link">New password</a></li>
                <li><a data-bs-toggle="modal" href="#resetPassword" role="button" class="footer-link">Reset password</a></li>
                <li><a data-bs-toggle="modal" href="#createAccount" role="button" class="footer-link">Create Account</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="footer-widget">
          <div class="footer-address">
            <p>
              59 Bervely Hill Ave, Brooklyn Town, <br> 
              New York, NY 5630, CA, US
            </p>
            <p class="contact-number mb-0"><a href="tel:+05656565656">+056 686 56 56 98</a></p>
            <p class="contact-email mb-0"><a href="mailto:info@staticmania.com">info@staticmania.com</a></p>
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
    </div>
  </div>
  <p class="footer-copyright">Hub of Homes Limited ©<span class="newYearMobile"></span></p>
</section>

<!-- 
  #############
  Login Modals Section
  #############
-->
<!-- Modal Log In -->
<div class="modal fade modal-login" id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="loginLabel">Log In</h4>
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
            <form class="contact-form-items row">
              <div class="col-12">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="ph-user"></i>
                  </span>
                  <input type="text" class="form-control" placeholder="user / email address">
                </div>
              </div>
              <div class="col-12">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="ph-keyhole"></i>
                  </span>
                  <input type="password" class="form-control" placeholder="Password">
                </div>
              </div>
              <div class="col-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Remember
                  </label>
                </div>
              </div>
              <div class="col-6">
                <div class="form-check text-end">
                  <a href="#resetPassword" data-bs-toggle="modal" data-bs-dismiss="modal"> Forget Password</a>
                </div>
              </div>
              <div class="w-100 contact-form-button">
                <button type="submit" class="btn btn-large d-block w-100">Log In</button>
              </div>
              <div class="w-100 contact-form-button">
                <button type="submit" class="btn btn-large btn-outline d-block w-100  mt-3">
                  <i class="ph-google-logo align-top"></i>
                  <span>  Log In with Google </span> 
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

<!-- Modal Create Account -->
<div class="modal fade modal-createAccount" id="createAccount" tabindex="-2" aria-labelledby="createAccountLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="createAccountLabel">Request for Visit</h4>
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
            <form class="contact-form-items row">
              <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="ph-user"></i>
                  </span>
                  <input type="text" class="form-control" placeholder="Full Name">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="ph-envelope-simple-open"></i>
                  </span>
                  <input type="email" class="form-control" placeholder="Email Address">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="ph-phone"></i>
                  </span>
                  <input type="text" class="form-control" placeholder="Phone Number">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="ph-map-pin"></i>
                  </span>
                  <input type="text" class="form-control" placeholder="Address">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="ph-keyhole"></i>
                  </span>
                  <input type="password" class="form-control" placeholder="Password">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="ph-keyhole"></i>
                  </span>
                  <input type="password" class="form-control" placeholder="Re-Password">
                </div>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                  <label class="form-check-label" for="flexCheckDefault2">
                    <span>I agree to All </span><a href="">Terms &amp; Conditions</a> 
                  </label>
                </div>
              </div>
              <div class="w-100 contact-form-button">
                <button type="submit" class="btn btn-large d-block w-100">Create Account</button>
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
        <p class="bold">Have an account? <a href="#login" data-bs-toggle="modal" data-bs-dismiss="modal">Log In </a> </p>
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
            <p>Enter the email address associated with your account and we'll send you a link to reset your password.</p>
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
                <button type="submit" class="btn btn-large btn-outline d-block w-100  mt-3" data-bs-target="#login" data-bs-toggle="modal" data-bs-dismiss="modal">
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
<script src="js/script.js"></script>

  <?php else : ?>
  <p><span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.</p>
  <?php endif; ?>

</body>
</html>
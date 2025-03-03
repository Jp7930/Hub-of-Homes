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
  <title>Hub of Homes</title>

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
            <a class="nav-link " href="newListing.php">
              Add Listing
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
  Hero Section
  #############
-->
<section class="hero">
  <div class="container">
    <div class="row">
      <div class="col-xl-8 col-lg-10">
        <div class="hero-shape">
          <img src="images/hero-bg.png" alt="hero-bg">
        </div>
        <div class="hero-content" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000">
           <h1 class="hero-content-title">
            Find a perfect property 
            Where you'll love to live
           </h1>
           <p class="hero-content-description">
            We helps businesses customize, automate and scale up their ad production and delivery.
           </p>
        </div>
        <div class="hero-form" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000">
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-buy-tab" data-bs-toggle="tab" data-bs-target="#nav-buy" type="button" role="tab" aria-controls="nav-buy" aria-selected="true">Buy</button>
              <button class="nav-link" id="nav-sell-tab" data-bs-toggle="tab" data-bs-target="#nav-sell" type="button" role="tab" aria-controls="nav-sell" aria-selected="false">Sell</button>
              <button class="nav-link" id="nav-rent-tab" data-bs-toggle="tab" data-bs-target="#nav-rent" type="button" role="tab" aria-controls="nav-rent" aria-selected="false">Rent</button>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-buy" role="tabpanel" aria-labelledby="nav-buy-tab">
              <form class="row align-items-center gutter-2" action="listing.php">
                <div class="col-md-3 col-6">
                  <label class="form-label">City/Street</label>
                  <div class="dropholder">
                    <div class="customdropdown d-flex justify-content-between align-items-center">
                      <p>New York City</p>
                      <i class="ph-map-pin-bold"></i>
                    </div>
                    <ul class="dropdownMenu">
                      <li>New York City</li>
                      <li>Washington DC</li>
                      <li>Florida</li>
                      <li>Orlendo</li>
                      <li>Alaska</li>
                      <li>Mexico City</li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-3 col-6">
                  <label class="form-label">Property Type</label>
                  <div class="dropholder">
                    <div class="customdropdown d-flex justify-content-between align-items-center">
                      <p>Duplex House</p>
                      <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.33333 9L4.16667 14L0 9" fill="#417086"></path>
                        <path d="M0.000163078 5L4.16683 -3.64256e-07L8.3335 5" fill="#417086"></path>
                      </svg>                        
                    </div>
                    <ul class="dropdownMenu">
                      <li>Duplex House</li>
                      <li>Single House</li>
                      <li>Multiplex House</li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-8">
                  <label class="form-label">Property Price</label>
                  <div class="dropholder">
                    <div class="customdropdown d-flex justify-content-between align-items-center">
                      <p>₹15000 - ₹350000</p>
                      <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.33333 9L4.16667 14L0 9" fill="#417086"></path>
                        <path d="M0.000163078 5L4.16683 -3.64256e-07L8.3335 5" fill="#417086"></path>
                      </svg>                        
                    </div>
                    <ul class="dropdownMenu">
                      <li>₹15000 - ₹350000</li>
                      <li>₹10000 - ₹30000</li>
                      <li>₹20000 - ₹40000</li>
                    </ul>
                  </div>
                </div>
    
                <div class="col-md-2 col-sm-6 text-md-end">
                  <button class="btn btn-large submit-button d-flex align-items-center w-100 justify-content-center" type="submit">
                    <i class="ph-magnifying-glass-bold"></i>
                    <span class="d-md-none d-inline-block">Search</span>
                  </button>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="nav-sell" role="tabpanel" aria-labelledby="nav-sell-tab">
              <form class="row align-items-center gutter-2">
                <div class="col-md-3 col-6">
                  <label class="form-label">City/Street</label>
                  <div class="dropholder">
                    <div class="customdropdown d-flex justify-content-between align-items-center">
                      <p>New York City</p>
                      <i class="ph-map-pin-bold"></i>
                    </div>
                    <ul class="dropdownMenu">
                      <li>New York City</li>
                      <li>Washington DC</li>
                      <li>Florida</li>
                      <li>Orlendo</li>
                      <li>Alaska</li>
                      <li>Mexico City</li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-3 col-6">
                  <label class="form-label">Property Type</label>
                  <div class="dropholder">
                    <div class="customdropdown d-flex justify-content-between align-items-center">
                      <p>Duplex House</p>
                      <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.33333 9L4.16667 14L0 9" fill="#417086"></path>
                        <path d="M0.000163078 5L4.16683 -3.64256e-07L8.3335 5" fill="#417086"></path>
                      </svg>                        
                    </div>
                    <ul class="dropdownMenu">
                      <li>Duplex House</li>
                      <li>Single House</li>
                      <li>Multiplex House</li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-8">
                  <label class="form-label">Property Price</label>
                  <div class="dropholder">
                    <div class="customdropdown d-flex justify-content-between align-items-center">
                      <p>₹15000 - ₹350000</p>
                      <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.33333 9L4.16667 14L0 9" fill="#417086"></path>
                        <path d="M0.000163078 5L4.16683 -3.64256e-07L8.3335 5" fill="#417086"></path>
                      </svg>                        
                    </div>
                    <ul class="dropdownMenu">
                      <li>₹15000 - ₹350000</li>
                      <li>₹10000 - ₹30000</li>
                      <li>₹20000 - ₹40000</li>
                    </ul>
                  </div>
                </div>
    
                <div class="col-md-2 col-sm-6 text-md-end">
                  <button class="btn btn-large submit-button d-flex align-items-center w-100 justify-content-center" type="submit">
                    <i class="ph-magnifying-glass-bold"></i>
                    <span class="d-md-none d-inline-block">Search</span>
                  </button>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="nav-rent" role="tabpanel" aria-labelledby="nav-rent-tab">
              <form class="row align-items-center gutter-2">
                <div class="col-md-3 col-6">
                  <label class="form-label">City/Street</label>
                  <div class="dropholder">
                    <div class="customdropdown d-flex justify-content-between align-items-center">
                      <p>New York City</p>
                      <i class="ph-map-pin-bold"></i>
                    </div>
                    <ul class="dropdownMenu">
                      <li>New York City</li>
                      <li>Washington DC</li>
                      <li>Florida</li>
                      <li>Orlendo</li>
                      <li>Alaska</li>
                      <li>Mexico City</li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-3 col-6">
                  <label class="form-label">Property Type</label>
                  <div class="dropholder">
                    <div class="customdropdown d-flex justify-content-between align-items-center">
                      <p>Duplex House</p>
                      <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.33333 9L4.16667 14L0 9" fill="#417086"></path>
                        <path d="M0.000163078 5L4.16683 -3.64256e-07L8.3335 5" fill="#417086"></path>
                      </svg>                        
                    </div>
                    <ul class="dropdownMenu">
                      <li>Duplex House</li>
                      <li>Single House</li>
                      <li>Multiplex House</li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-8">
                  <label class="form-label">Property Price</label>
                  <div class="dropholder">
                    <div class="customdropdown d-flex justify-content-between align-items-center">
                      <p>₹15000 - ₹350000</p>
                      <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.33333 9L4.16667 14L0 9" fill="#417086"></path>
                        <path d="M0.000163078 5L4.16683 -3.64256e-07L8.3335 5" fill="#417086"></path>
                      </svg>                        
                    </div>
                    <ul class="dropdownMenu">
                      <li>₹15000 - ₹350000</li>
                      <li>₹10000 - ₹30000</li>
                      <li>₹20000 - ₹40000</li>
                    </ul>
                  </div>
                </div>
    
                <div class="col-md-2 col-sm-6 text-md-end">
                  <button class="btn btn-large submit-button d-flex align-items-center w-100 justify-content-center" type="submit">
                    <i class="ph-magnifying-glass-bold"></i>
                    <span class="d-md-none d-inline-block ms-1">Search</span>
                  </button>
                </div>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</section>

<!--
  ###########
  Work Process Area Section
  ###########
-->
<section class="work-area" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000">
  <div class="container">
    <div class="row g-3">
      <div class="col-xl-6 col-lg-5">
        <div class="work-area--card">
          <h3>Simple &amp; easy way to find your dream apartment</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
          <a href="contact.php" class="btn btn-small">Get Started</a>
        </div>
      </div>
      <div class="col-xl-6 col-lg-7">
        <div class="d-grid work-area--service">
          <div class="work-area--service--items order-2 order-md-1">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M2.5 14.375C2.5 7.8125 7.8125 2.5 14.375 2.5" stroke="#1C4456" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M26.2499 14.375C26.2499 20.9375 20.9374 26.25 14.3749 26.25C9.6999 26.25 5.6499 23.55 3.7124 19.6125" stroke="#1C4456" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M17.5 6.25H25" stroke="#1C4456" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M17.5 10H21.25" stroke="#1C4456" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M27.5 27.5L25 25" stroke="#1C4456" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
              
            <h4>Search <br> your location</h4>
          </div>
          <div class="work-area--service--items order-1 order-md-2">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11.2875 17.4999C10.8 16.7874 10.525 15.9249 10.525 14.9999C10.525 12.5249 12.525 10.5249 15 10.5249C17.475 10.5249 19.475 12.5249 19.475 14.9999C19.475 17.4749 17.475 19.4749 15 19.4749" stroke="#1C4456" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M21.95 6.9751C19.8375 5.4751 17.4625 4.6626 15 4.6626C10.5875 4.6626 6.47505 7.2626 3.61255 11.7626C2.48755 13.5251 2.48755 16.4876 3.61255 18.2501C6.47505 22.7501 10.5875 25.3501 15 25.3501C19.4125 25.3501 23.525 22.7501 26.3875 18.2501C27.5125 16.4876 27.5125 13.5251 26.3875 11.7626" stroke="#1C4456" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
              
            <h4>Visit <br> Apartment</h4>
          </div>
          <div class="work-area--service--items order-4 order-md-3">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.50011 13.0751C6.26261 13.0751 6.01261 12.9751 5.83761 12.8001C5.57511 12.5251 5.48761 12.1251 5.63761 11.7751L7.96261 6.22509C8.01261 6.11259 8.03761 6.03759 8.07511 5.97509C9.92511 1.71259 12.2876 0.67509 16.4626 2.27509C16.7001 2.36259 16.8876 2.55009 16.9876 2.78759C17.0876 3.02509 17.0876 3.28759 16.9876 3.52509L13.3251 12.0251C13.1751 12.3751 12.8376 12.5876 12.4626 12.5876H8.90011C8.18761 12.5876 7.51261 12.7251 6.86261 13.0001C6.75011 13.0501 6.62511 13.0751 6.50011 13.0751ZM13.2626 3.43759C11.7126 3.43759 10.7626 4.45009 9.77511 6.75009C9.76261 6.78759 9.73761 6.82509 9.72511 6.86259L8.08761 10.7501C8.36261 10.7251 8.62511 10.7126 8.90011 10.7126H11.8376L14.8501 3.71259C14.2626 3.52509 13.7376 3.43759 13.2626 3.43759Z" fill="#1C4456"></path>
              <path d="M22.8625 12.8376C22.775 12.8376 22.675 12.8251 22.5875 12.8001C22.1125 12.6626 21.6125 12.5876 21.0875 12.5876H12.4625C12.15 12.5876 11.85 12.4251 11.675 12.1626C11.5125 11.9001 11.475 11.5626 11.6 11.2751L15.225 2.86255C15.4125 2.41255 15.9625 2.10005 16.425 2.26255C16.575 2.31255 16.7125 2.37505 16.8625 2.43755L19.8125 3.67505C21.5375 4.38755 22.6875 5.13755 23.4375 6.03755C23.5875 6.21255 23.7125 6.40005 23.8375 6.60005C23.975 6.81255 24.1 7.06255 24.1875 7.32505C24.225 7.41255 24.2875 7.57505 24.325 7.75005C24.675 8.93755 24.5 10.3876 23.75 12.2626C23.5875 12.6126 23.2375 12.8376 22.8625 12.8376ZM13.8875 10.7126H21.1C21.5 10.7126 21.8875 10.7501 22.275 10.8126C22.625 9.72505 22.7 8.88755 22.5 8.21255C22.475 8.10005 22.45 8.05005 22.4375 8.00005C22.3625 7.80005 22.3125 7.68755 22.25 7.58755C22.1625 7.45005 22.1 7.33755 22 7.22505C21.4625 6.57505 20.5125 5.97505 19.0875 5.38755L16.625 4.36255L13.8875 10.7126Z" fill="#1C4456"></path>
              <path d="M19.875 28.4376H10.125C9.775 28.4376 9.45 28.4126 9.125 28.3751C4.7375 28.0876 2.2375 25.5751 1.9375 21.1376C1.9 20.8626 1.875 20.5251 1.875 20.1876V17.7501C1.875 14.9376 3.55 12.4001 6.1375 11.2751C7.025 10.9001 7.95 10.7126 8.9125 10.7126H21.1125C21.825 10.7126 22.5125 10.8126 23.15 11.0126C26.0875 11.9001 28.15 14.6751 28.15 17.7501V20.1876C28.15 20.4626 28.1375 20.7251 28.125 20.9751C27.85 25.8626 25 28.4376 19.875 28.4376ZM8.9 12.5876C8.1875 12.5876 7.5125 12.7251 6.8625 13.0001C4.9625 13.8251 3.7375 15.6876 3.7375 17.7501V20.1876C3.7375 20.4501 3.7625 20.7126 3.7875 20.9626C4.025 24.5251 5.775 26.2751 9.2875 26.5126C9.6 26.5501 9.85 26.5751 10.1125 26.5751H19.8625C23.9875 26.5751 26.0125 24.7626 26.2125 20.8876C26.225 20.6626 26.2375 20.4376 26.2375 20.1876V17.7501C26.2375 15.4876 24.725 13.4626 22.575 12.8001C22.1 12.6626 21.6 12.5876 21.075 12.5876H8.9Z" fill="#1C4456"></path>
              <path d="M2.80005 18.6875C2.28755 18.6875 1.86255 18.2625 1.86255 17.75V14.0875C1.86255 10.15 4.65005 6.75 8.50005 6C8.83755 5.9375 9.18755 6.0625 9.41255 6.325C9.62505 6.5875 9.68755 6.9625 9.55005 7.275L7.36255 12.5C7.26255 12.725 7.08755 12.9 6.87505 13C4.97505 13.825 3.75005 15.6875 3.75005 17.75C3.73755 18.2625 3.32505 18.6875 2.80005 18.6875ZM7.00005 8.525C5.40005 9.425 4.23755 11 3.87505 12.8375C4.42505 12.275 5.06255 11.8 5.78755 11.45L7.00005 8.525Z" fill="#1C4456"></path>
              <path d="M27.1999 18.6875C26.6874 18.6875 26.2624 18.2625 26.2624 17.75C26.2624 15.4875 24.7499 13.4625 22.5999 12.8C22.3499 12.725 22.1374 12.55 22.0249 12.3125C21.9124 12.075 21.8999 11.8 21.9999 11.5625C22.5874 10.1 22.7374 9.03747 22.4999 8.21247C22.4749 8.09997 22.4499 8.04997 22.4374 7.99997C22.2749 7.63747 22.3624 7.21247 22.6499 6.93747C22.9374 6.66247 23.3749 6.59997 23.7249 6.78747C26.4499 8.21247 28.1374 11.0125 28.1374 14.0875V17.75C28.1374 18.2625 27.7124 18.6875 27.1999 18.6875ZM24.0624 11.3625C24.8499 11.725 25.5499 12.2375 26.1374 12.85C25.8999 11.625 25.3124 10.5125 24.4499 9.63747C24.3874 10.1625 24.2624 10.7375 24.0624 11.3625Z" fill="#1C4456"></path>
            </svg>
              
            <h4>Get your <br> dream house</h4>
          </div>
          <div class="work-area--service--items order-3 order-md-4">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11.25 27.5H18.75C25 27.5 27.5 25 27.5 18.75V11.25C27.5 5 25 2.5 18.75 2.5H11.25C5 2.5 2.5 5 2.5 11.25V18.75C2.5 25 5 27.5 11.25 27.5Z" stroke="#1C4456" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M19.375 12.1875C20.4105 12.1875 21.25 11.348 21.25 10.3125C21.25 9.27697 20.4105 8.4375 19.375 8.4375C18.3395 8.4375 17.5 9.27697 17.5 10.3125C17.5 11.348 18.3395 12.1875 19.375 12.1875Z" stroke="#1C4456" stroke-width="2.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M10.625 12.1875C11.6605 12.1875 12.5 11.348 12.5 10.3125C12.5 9.27697 11.6605 8.4375 10.625 8.4375C9.58947 8.4375 8.75 9.27697 8.75 10.3125C8.75 11.348 9.58947 12.1875 10.625 12.1875Z" stroke="#1C4456" stroke-width="2.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M10.5 16.625H19.5C20.125 16.625 20.625 17.125 20.625 17.75C20.625 20.8625 18.1125 23.375 15 23.375C11.8875 23.375 9.375 20.8625 9.375 17.75C9.375 17.125 9.875 16.625 10.5 16.625Z" stroke="#1C4456" stroke-width="2.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
              
            <h4>Enjoy your <br> Apartment</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--
  ###########
  counter Section
  ###########
-->
<section class="counter " data-aos="fade-up" data-aos-once="true" data-aos-duration="1000">
  <div class="container">
    <div class="row">
      <!--==== Srart counter-up Section  =====-->
      <div class="col-12 ">
        <div class="counter--container d-flex">

          <div class="counter--content">
            <div class="counter--content-icon">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.0001 2.66675C13.363 2.66675 10.7851 3.44873 8.59248 4.91382C6.39983 6.37891 4.69086 8.46129 3.68169 10.8976C2.67253 13.334 2.40848 16.0149 2.92295 18.6013C3.43742 21.1877 4.7073 23.5635 6.572 25.4282C8.4367 27.2929 10.8125 28.5627 13.3989 29.0772C15.9853 29.5917 18.6662 29.3276 21.1025 28.3185C23.5389 27.3093 25.6213 25.6003 27.0863 23.4077C28.5514 21.215 29.3334 18.6372 29.3334 16.0001C29.3334 14.2491 28.9885 12.5153 28.3185 10.8976C27.6484 9.27996 26.6663 7.81011 25.4282 6.57199C24.1901 5.33388 22.7202 4.35175 21.1025 3.68169C19.4849 3.01162 17.751 2.66675 16.0001 2.66675ZM16.0001 26.6667C13.8904 26.6667 11.8281 26.0412 10.074 24.8691C8.31988 23.697 6.95271 22.0311 6.14537 20.082C5.33804 18.133 5.1268 15.9882 5.53838 13.9191C5.94995 11.85 6.96586 9.94937 8.45761 8.45761C9.94938 6.96585 11.85 5.94995 13.9191 5.53837C15.9883 5.1268 18.133 5.33803 20.082 6.14537C22.0311 6.9527 23.697 8.31987 24.8691 10.074C26.0412 11.8281 26.6668 13.8904 26.6668 16.0001C26.6668 18.8291 25.5429 21.5422 23.5426 23.5426C21.5422 25.5429 18.8291 26.6667 16.0001 26.6667Z" fill="#417086"></path>
                <path d="M16.0001 14.6667C13.3334 14.6667 13.3334 13.8267 13.3334 13.3333C13.3334 12.84 14.2667 12 16.0001 12C17.7334 12 17.8534 12.8533 17.8667 13.3333H20.5334C20.5154 12.425 20.1887 11.5499 19.6071 10.8519C19.0255 10.154 18.2236 9.67486 17.3334 9.49333V8H14.6667V9.45333C12.0001 9.89333 10.6667 11.6133 10.6667 13.3333C10.6667 14.8267 11.3601 17.3333 16.0001 17.3333C18.6667 17.3333 18.6667 18.24 18.6667 18.6667C18.6667 19.0933 17.8401 20 16.0001 20C13.5467 20 13.3334 18.8533 13.3334 18.6667H10.6667C10.6667 19.8933 11.5467 22.0667 14.6667 22.56V24H17.3334V22.56C20.0001 22.1067 21.3334 20.3867 21.3334 18.6667C21.3334 17.1733 20.6401 14.6667 16.0001 14.6667Z" fill="#417086"></path>
              </svg>                  
            </div>
            <div class="counter--content-percent">
              <h2> ₹<span class="counter--content-number">150</span>+ </h2>
            </div>
            <p class="bold">Owned from <br> Properties transactions</p>
          </div>

          <div class="counter--content">
            <div class="counter--content-icon">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.0001 22.6667L17.3334 20.0001V13.1441C19.6281 12.5481 21.3334 10.4774 21.3334 8.00008C21.3334 5.05875 18.9414 2.66675 16.0001 2.66675C13.0587 2.66675 10.6667 5.05875 10.6667 8.00008C10.6667 10.4774 12.3721 12.5481 14.6667 13.1441V20.0001L16.0001 22.6667Z" fill="#417086"></path>
                <path d="M21.6894 14.0841L20.9787 16.6548C24.4334 17.6094 26.6667 19.4454 26.6667 21.3334C26.6667 23.8561 22.2867 26.6668 16.0001 26.6668C9.71341 26.6668 5.33341 23.8561 5.33341 21.3334C5.33341 19.4454 7.56675 17.6094 11.0227 16.6534L10.3121 14.0828C5.59608 15.3868 2.66675 18.1641 2.66675 21.3334C2.66675 25.8188 8.52408 29.3334 16.0001 29.3334C23.4761 29.3334 29.3334 25.8188 29.3334 21.3334C29.3334 18.1641 26.4041 15.3868 21.6894 14.0841Z" fill="#417086"></path>
              </svg>                                  
            </div>
            <div class="counter--content-percent">
              <h2> <span class="counter--content-number">25</span>K+ </h2>
            </div>
            <p class="bold">Properties for Buy <br> &amp; sell Successfully</p>
          </div>

          <div class="counter--content">
            <div class="counter--content-icon">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.425 17.5C21.2096 18.8613 20.5686 20.1195 19.5941 21.0941C18.6195 22.0686 17.3613 22.7096 16 22.925" stroke="#417086" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M9 8.17505C7.075 11.075 5.5 14.4001 5.5 17.5001C5.5 20.2848 6.60625 22.9555 8.57538 24.9247C10.5445 26.8938 13.2152 28.0001 16 28.0001C18.7848 28.0001 21.4555 26.8938 23.4246 24.9247C25.3938 22.9555 26.5 20.2848 26.5 17.5001C26.5 11 22 6.00005 18.35 2.36255L14 11.5L9 8.17505Z" stroke="#417086" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>                                 
            </div>
            <div class="counter--content-percent">
              <h2> <span class="counter--content-number">500</span> </h2>
            </div>
            <p class="bold">Daily completed <br> transactions</p>
          </div>

          <div class="counter--content">
            <div class="counter--content-icon">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.525 27.475C18.3822 27.8223 17.1944 27.9992 16 28C13.6266 28 11.3066 27.2962 9.33316 25.9776C7.35977 24.6591 5.8217 22.7849 4.91345 20.5922C4.0052 18.3995 3.76756 15.9867 4.23058 13.6589C4.6936 11.3312 5.83649 9.19295 7.51472 7.51472C9.19295 5.83649 11.3312 4.6936 13.6589 4.23058C15.9867 3.76756 18.3995 4.0052 20.5922 4.91345C22.7849 5.8217 24.6591 7.35977 25.9776 9.33316C27.2962 11.3066 28 13.6266 28 16C27.9992 17.1944 27.8223 18.3822 27.475 19.525L19.525 27.475Z" stroke="#417086" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M21.2 19C20.6714 19.9107 19.9128 20.6667 19.0003 21.1922C18.0877 21.7176 17.0531 21.9942 16 21.9942C14.947 21.9942 13.9124 21.7176 12.9998 21.1922C12.0873 20.6667 11.3287 19.9107 10.8 19" stroke="#417086" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M20.5 15C21.3284 15 22 14.3284 22 13.5C22 12.6716 21.3284 12 20.5 12C19.6716 12 19 12.6716 19 13.5C19 14.3284 19.6716 15 20.5 15Z" fill="#417086"></path>
                <path d="M11.5 15C12.3284 15 13 14.3284 13 13.5C13 12.6716 12.3284 12 11.5 12C10.6716 12 10 12.6716 10 13.5C10 14.3284 10.6716 15 11.5 15Z" fill="#417086"></path>
              </svg>                 
            </div>
            <div class="counter--content-percent">
              <h2> ₹<span class="counter--content-number">600</span>+ </h2>
            </div>
            <p class="bold">Reagular Clients</p>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>


<!-- 
  #############
  Properties Section
  #############
-->
<section class="properties" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex align-items-center justify-content-between properties-header">
          <h3>Featured Properties</h3>
          <a href="listing.php" class="d-md-flex align-items-center d-none">
            <span>Explore All </span>
            <i class="ph-arrow-right"></i> 
          </a>
        </div>
        <div style="margin: 24px;"></div>
      </div>
    </div>
    <div class="grid row row-cols-xl-3 row-cols-md-2 g-4">
      <div class="properties-card">
        <div class="properties-card--thumb">
          <img src="images/1.png" alt="properties1">
        </div>
        <div class="properties-card--content ">
          <div class="d-flex align-items-center properties-card--content--address">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18.75 21H14.1131C14.8932 20.3046 15.629 19.5609 16.316 18.7734C18.8896 15.8136 20.25 12.6934 20.25 9.75C20.25 7.56196 19.3808 5.46354 17.8336 3.91637C16.2865 2.36919 14.188 1.5 12 1.5C9.81196 1.5 7.71354 2.36919 6.16637 3.91637C4.61919 5.46354 3.75 7.56196 3.75 9.75C3.75 12.6934 5.11038 15.8136 7.68402 18.7734C8.37102 19.5609 9.10676 20.3046 9.8869 21H5.25C5.05109 21 4.86032 21.079 4.71967 21.2197C4.57902 21.3603 4.5 21.5511 4.5 21.75C4.5 21.9489 4.57902 22.1397 4.71967 22.2803C4.86032 22.421 5.05109 22.5 5.25 22.5H18.75C18.9489 22.5 19.1397 22.421 19.2803 22.2803C19.421 22.1397 19.5 21.9489 19.5 21.75C19.5 21.5511 19.421 21.3603 19.2803 21.2197C19.1397 21.079 18.9489 21 18.75 21ZM12 6.75C12.5934 6.75 13.1734 6.92595 13.6667 7.25559C14.1601 7.58524 14.5446 8.05377 14.7717 8.60195C14.9987 9.15013 15.0581 9.75333 14.9424 10.3353C14.8266 10.9172 14.5409 11.4518 14.1213 11.8713C13.7018 12.2909 13.1672 12.5766 12.5853 12.6924C12.0034 12.8081 11.4002 12.7487 10.852 12.5216C10.3038 12.2946 9.83526 11.9101 9.50562 11.4167C9.17597 10.9234 9.00002 10.3433 9.00002 9.75C9.00002 9.35603 9.07761 8.96592 9.22838 8.60194C9.37914 8.23797 9.60012 7.90725 9.8787 7.62867C10.1573 7.3501 10.488 7.12912 10.852 6.97835C11.2159 6.82759 11.6061 6.75 12 6.75Z" fill="#1C4456"></path>
            </svg>
            <span>2861 62nd Ave, Oakland, CA 94605</span>
          </div>
          <ul class="list-unstyled properties-card--content--features">
            <li class="d-flex align-items-center">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.25 5.625H1.875V3.75C1.875 3.58424 1.80915 3.42527 1.69194 3.30806C1.57473 3.19085 1.41576 3.125 1.25 3.125C1.08424 3.125 0.925268 3.19085 0.808058 3.30806C0.690848 3.42527 0.625 3.58424 0.625 3.75V16.25C0.625 16.4158 0.690848 16.5747 0.808058 16.6919C0.925268 16.8092 1.08424 16.875 1.25 16.875C1.41576 16.875 1.57473 16.8092 1.69194 16.6919C1.80915 16.5747 1.875 16.4158 1.875 16.25V13.75H18.125V16.25C18.125 16.4158 18.1908 16.5747 18.3081 16.6919C18.4253 16.8092 18.5842 16.875 18.75 16.875C18.9158 16.875 19.0747 16.8092 19.1919 16.6919C19.3092 16.5747 19.375 16.4158 19.375 16.25V8.75C19.3741 7.92149 19.0445 7.12717 18.4587 6.54132C17.8728 5.95548 17.0785 5.62593 16.25 5.625ZM1.875 6.875H7.5V12.5H1.875V6.875Z" fill="#417086"></path>
              </svg>                    
              <span>3 Bed Room</span>                   
            </li>
            <li class="d-flex align-items-center">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.625 17.8125C5.625 17.9979 5.57002 18.1792 5.467 18.3334C5.36399 18.4875 5.21757 18.6077 5.04627 18.6786C4.87496 18.7496 4.68646 18.7682 4.5046 18.732C4.32275 18.6958 4.1557 18.6065 4.02459 18.4754C3.89348 18.3443 3.80419 18.1773 3.76801 17.9954C3.73184 17.8135 3.75041 17.625 3.82136 17.4537C3.89232 17.2824 4.01248 17.136 4.16665 17.033C4.32082 16.93 4.50208 16.875 4.6875 16.875C4.93614 16.875 5.1746 16.9738 5.35041 17.1496C5.52623 17.3254 5.625 17.5639 5.625 17.8125ZM6.875 14.6875C6.68958 14.6875 6.50832 14.7425 6.35415 14.8455C6.19998 14.9485 6.07982 15.0949 6.00886 15.2662C5.93791 15.4375 5.91934 15.626 5.95551 15.8079C5.99169 15.9898 6.08098 16.1568 6.21209 16.2879C6.3432 16.419 6.51025 16.5083 6.6921 16.5445C6.87396 16.5807 7.06246 16.5621 7.23377 16.4911C7.40507 16.4202 7.55149 16.3 7.6545 16.1459C7.75752 15.9917 7.8125 15.8104 7.8125 15.625C7.8125 15.3764 7.71373 15.1379 7.53791 14.9621C7.3621 14.7863 7.12364 14.6875 6.875 14.6875ZM2.1875 14.375C2.00208 14.375 1.82082 14.43 1.66665 14.533C1.51248 14.636 1.39232 14.7824 1.32136 14.9537C1.25041 15.125 1.23184 15.3135 1.26801 15.4954C1.30419 15.6773 1.39348 15.8443 1.52459 15.9754C1.6557 16.1065 1.82275 16.1958 2.0046 16.232C2.18646 16.2682 2.37496 16.2496 2.54627 16.1786C2.71757 16.1077 2.86399 15.9875 2.967 15.8334C3.07002 15.6792 3.125 15.4979 3.125 15.3125C3.125 15.0639 3.02623 14.8254 2.85041 14.6496C2.6746 14.4738 2.43614 14.375 2.1875 14.375ZM5.3125 13.125C5.3125 12.9396 5.25752 12.7583 5.1545 12.6042C5.05149 12.45 4.90507 12.3298 4.73377 12.2589C4.56246 12.1879 4.37396 12.1693 4.1921 12.2055C4.01025 12.2417 3.8432 12.331 3.71209 12.4621C3.58098 12.5932 3.49169 12.7603 3.45551 12.9421C3.41934 13.124 3.43791 13.3125 3.50886 13.4838C3.57982 13.6551 3.69998 13.8015 3.85415 13.9045C4.00832 14.0075 4.18958 14.0625 4.375 14.0625C4.62364 14.0625 4.8621 13.9637 5.03791 13.7879C5.21373 13.6121 5.3125 13.3736 5.3125 13.125ZM19.375 2.5H17.1339C16.9696 2.49955 16.807 2.53168 16.6553 2.59453C16.5035 2.65738 16.3658 2.74969 16.25 2.86614L14.0747 5.04143L4.2202 6.68385C3.99366 6.72162 3.7819 6.82106 3.60816 6.97128C3.43443 7.1215 3.30544 7.31667 3.23535 7.53539C3.16526 7.7541 3.15679 7.9879 3.21085 8.21111C3.26492 8.43433 3.37943 8.63834 3.54183 8.80074L11.1993 16.4581C11.3617 16.6205 11.5657 16.7351 11.7889 16.7892C12.0121 16.8432 12.2459 16.8348 12.4646 16.7647C12.6833 16.6946 12.8785 16.5656 13.0287 16.3919C13.179 16.2181 13.2784 16.0064 13.3162 15.7798L14.9586 5.92534V5.9253L17.1339 3.75H19.375C19.5408 3.75 19.6997 3.68416 19.8169 3.56695C19.9342 3.44974 20 3.29076 20 3.125C20 2.95924 19.9342 2.80027 19.8169 2.68306C19.6997 2.56585 19.5408 2.5 19.375 2.5Z" fill="#417086"></path>
              </svg>                    
              <span>1 Bath</span>                   
            </li>
            <li class="d-flex align-items-center">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.1114 2.9601L15.6168 5.45467L17.3538 7.19168C17.4597 7.29764 17.5318 7.43263 17.5611 7.57958C17.5903 7.72654 17.5753 7.87886 17.5179 8.01728C17.4606 8.15571 17.3635 8.27402 17.2389 8.35727C17.1143 8.44052 16.9679 8.48496 16.8181 8.48497H12.2726C12.0717 8.48496 11.879 8.40514 11.7369 8.26307C11.5949 8.121 11.515 7.92832 11.515 7.7274V3.18195C11.515 3.03212 11.5595 2.88565 11.6427 2.76108C11.726 2.6365 11.8443 2.53941 11.9827 2.48207C12.1211 2.42473 12.2735 2.40972 12.4204 2.43894C12.5674 2.46816 12.7024 2.54029 12.8083 2.64623L14.5453 4.38323L17.0399 1.88865C17.1103 1.8183 17.1938 1.76249 17.2857 1.72442C17.3776 1.68634 17.4761 1.66675 17.5756 1.66675C17.6751 1.66675 17.7736 1.68634 17.8656 1.72442C17.9575 1.76249 18.041 1.8183 18.1114 1.88865C18.1817 1.959 18.2375 2.04252 18.2756 2.13444C18.3137 2.22636 18.3333 2.32488 18.3333 2.42437C18.3333 2.52387 18.3137 2.62238 18.2756 2.7143C18.2375 2.80622 18.1817 2.88974 18.1114 2.9601ZM7.72715 11.5153H3.1817C3.03187 11.5153 2.88541 11.5597 2.76083 11.643C2.63626 11.7262 2.53916 11.8445 2.48182 11.983C2.42448 12.1214 2.40947 12.2737 2.43869 12.4207C2.46791 12.5676 2.54005 12.7026 2.64598 12.8086L4.38299 14.5456L1.88841 17.0402C1.81806 17.1105 1.76225 17.194 1.72417 17.2859C1.6861 17.3779 1.6665 17.4764 1.6665 17.5759C1.6665 17.6754 1.6861 17.7739 1.72417 17.8658C1.76225 17.9577 1.81806 18.0412 1.88841 18.1116C2.03049 18.2537 2.22319 18.3335 2.42413 18.3335C2.52362 18.3335 2.62214 18.3139 2.71406 18.2758C2.80598 18.2378 2.8895 18.1819 2.95985 18.1116L5.45443 15.617L7.19143 17.354C7.29739 17.46 7.43238 17.5321 7.57934 17.5613C7.72629 17.5905 7.87861 17.5755 8.01704 17.5182C8.15546 17.4608 8.27378 17.3637 8.35703 17.2392C8.44027 17.1146 8.48471 16.9681 8.48473 16.8183V12.2728C8.48472 12.0719 8.4049 11.8792 8.26283 11.7372C8.12076 11.5951 7.92807 11.5153 7.72715 11.5153Z" fill="#417086"></path>
              </svg>                    
              <span>1,032 sqft</span>                   
            </li>
            <li class="d-flex align-items-center">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.6166 7.34154C15.9789 7.34154 17.0832 6.23717 17.0832 4.87487C17.0832 3.51257 15.9789 2.4082 14.6166 2.4082C13.2543 2.4082 12.1499 3.51257 12.1499 4.87487C12.1499 6.23717 13.2543 7.34154 14.6166 7.34154Z" fill="#417086"></path>
                <path d="M5.38341 7.34154C6.74572 7.34154 7.85008 6.23717 7.85008 4.87487C7.85008 3.51257 6.74572 2.4082 5.38341 2.4082C4.02111 2.4082 2.91675 3.51257 2.91675 4.87487C2.91675 6.23717 4.02111 7.34154 5.38341 7.34154Z" fill="#417086"></path>
                <path d="M14.6166 17.5915C15.9789 17.5915 17.0832 16.4872 17.0832 15.1249C17.0832 13.7626 15.9789 12.6582 14.6166 12.6582C13.2543 12.6582 12.1499 13.7626 12.1499 15.1249C12.1499 16.4872 13.2543 17.5915 14.6166 17.5915Z" fill="#417086"></path>
                <path d="M5.38341 17.5915C6.74572 17.5915 7.85008 16.4872 7.85008 15.1249C7.85008 13.7626 6.74572 12.6582 5.38341 12.6582C4.02111 12.6582 2.91675 13.7626 2.91675 15.1249C2.91675 16.4872 4.02111 17.5915 5.38341 17.5915Z" fill="#417086"></path>
              </svg>                    
              <span>Family</span>                   
            </li>
          </ul>
          <div class="properties-card--footer d-flex align-items-center justify-content-between">
            <a href="property-details.php?id=1" class="btn btn-small">View Details</a>
            <h5>₹649,900</h5>
          </div>
        </div> 
      </div>
      
      <div class="properties-card">
        <div class="properties-card--thumb">
          <img src="images/2.png" alt="properties1">
        </div>
        <div class="properties-card--content ">
          <div class="d-flex align-items-center properties-card--content--address">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18.75 21H14.1131C14.8932 20.3046 15.629 19.5609 16.316 18.7734C18.8896 15.8136 20.25 12.6934 20.25 9.75C20.25 7.56196 19.3808 5.46354 17.8336 3.91637C16.2865 2.36919 14.188 1.5 12 1.5C9.81196 1.5 7.71354 2.36919 6.16637 3.91637C4.61919 5.46354 3.75 7.56196 3.75 9.75C3.75 12.6934 5.11038 15.8136 7.68402 18.7734C8.37102 19.5609 9.10676 20.3046 9.8869 21H5.25C5.05109 21 4.86032 21.079 4.71967 21.2197C4.57902 21.3603 4.5 21.5511 4.5 21.75C4.5 21.9489 4.57902 22.1397 4.71967 22.2803C4.86032 22.421 5.05109 22.5 5.25 22.5H18.75C18.9489 22.5 19.1397 22.421 19.2803 22.2803C19.421 22.1397 19.5 21.9489 19.5 21.75C19.5 21.5511 19.421 21.3603 19.2803 21.2197C19.1397 21.079 18.9489 21 18.75 21ZM12 6.75C12.5934 6.75 13.1734 6.92595 13.6667 7.25559C14.1601 7.58524 14.5446 8.05377 14.7717 8.60195C14.9987 9.15013 15.0581 9.75333 14.9424 10.3353C14.8266 10.9172 14.5409 11.4518 14.1213 11.8713C13.7018 12.2909 13.1672 12.5766 12.5853 12.6924C12.0034 12.8081 11.4002 12.7487 10.852 12.5216C10.3038 12.2946 9.83526 11.9101 9.50562 11.4167C9.17597 10.9234 9.00002 10.3433 9.00002 9.75C9.00002 9.35603 9.07761 8.96592 9.22838 8.60194C9.37914 8.23797 9.60012 7.90725 9.8787 7.62867C10.1573 7.3501 10.488 7.12912 10.852 6.97835C11.2159 6.82759 11.6061 6.75 12 6.75Z" fill="#1C4456"></path>
            </svg>
            <span>2861 62nd Ave, Oakland, CA 94605</span>
          </div>
          <ul class="list-unstyled properties-card--content--features">
            <li class="d-flex align-items-center">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.25 5.625H1.875V3.75C1.875 3.58424 1.80915 3.42527 1.69194 3.30806C1.57473 3.19085 1.41576 3.125 1.25 3.125C1.08424 3.125 0.925268 3.19085 0.808058 3.30806C0.690848 3.42527 0.625 3.58424 0.625 3.75V16.25C0.625 16.4158 0.690848 16.5747 0.808058 16.6919C0.925268 16.8092 1.08424 16.875 1.25 16.875C1.41576 16.875 1.57473 16.8092 1.69194 16.6919C1.80915 16.5747 1.875 16.4158 1.875 16.25V13.75H18.125V16.25C18.125 16.4158 18.1908 16.5747 18.3081 16.6919C18.4253 16.8092 18.5842 16.875 18.75 16.875C18.9158 16.875 19.0747 16.8092 19.1919 16.6919C19.3092 16.5747 19.375 16.4158 19.375 16.25V8.75C19.3741 7.92149 19.0445 7.12717 18.4587 6.54132C17.8728 5.95548 17.0785 5.62593 16.25 5.625ZM1.875 6.875H7.5V12.5H1.875V6.875Z" fill="#417086"></path>
              </svg>                    
              <span>3 Bed Room</span>                   
            </li>
            <li class="d-flex align-items-center">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.625 17.8125C5.625 17.9979 5.57002 18.1792 5.467 18.3334C5.36399 18.4875 5.21757 18.6077 5.04627 18.6786C4.87496 18.7496 4.68646 18.7682 4.5046 18.732C4.32275 18.6958 4.1557 18.6065 4.02459 18.4754C3.89348 18.3443 3.80419 18.1773 3.76801 17.9954C3.73184 17.8135 3.75041 17.625 3.82136 17.4537C3.89232 17.2824 4.01248 17.136 4.16665 17.033C4.32082 16.93 4.50208 16.875 4.6875 16.875C4.93614 16.875 5.1746 16.9738 5.35041 17.1496C5.52623 17.3254 5.625 17.5639 5.625 17.8125ZM6.875 14.6875C6.68958 14.6875 6.50832 14.7425 6.35415 14.8455C6.19998 14.9485 6.07982 15.0949 6.00886 15.2662C5.93791 15.4375 5.91934 15.626 5.95551 15.8079C5.99169 15.9898 6.08098 16.1568 6.21209 16.2879C6.3432 16.419 6.51025 16.5083 6.6921 16.5445C6.87396 16.5807 7.06246 16.5621 7.23377 16.4911C7.40507 16.4202 7.55149 16.3 7.6545 16.1459C7.75752 15.9917 7.8125 15.8104 7.8125 15.625C7.8125 15.3764 7.71373 15.1379 7.53791 14.9621C7.3621 14.7863 7.12364 14.6875 6.875 14.6875ZM2.1875 14.375C2.00208 14.375 1.82082 14.43 1.66665 14.533C1.51248 14.636 1.39232 14.7824 1.32136 14.9537C1.25041 15.125 1.23184 15.3135 1.26801 15.4954C1.30419 15.6773 1.39348 15.8443 1.52459 15.9754C1.6557 16.1065 1.82275 16.1958 2.0046 16.232C2.18646 16.2682 2.37496 16.2496 2.54627 16.1786C2.71757 16.1077 2.86399 15.9875 2.967 15.8334C3.07002 15.6792 3.125 15.4979 3.125 15.3125C3.125 15.0639 3.02623 14.8254 2.85041 14.6496C2.6746 14.4738 2.43614 14.375 2.1875 14.375ZM5.3125 13.125C5.3125 12.9396 5.25752 12.7583 5.1545 12.6042C5.05149 12.45 4.90507 12.3298 4.73377 12.2589C4.56246 12.1879 4.37396 12.1693 4.1921 12.2055C4.01025 12.2417 3.8432 12.331 3.71209 12.4621C3.58098 12.5932 3.49169 12.7603 3.45551 12.9421C3.41934 13.124 3.43791 13.3125 3.50886 13.4838C3.57982 13.6551 3.69998 13.8015 3.85415 13.9045C4.00832 14.0075 4.18958 14.0625 4.375 14.0625C4.62364 14.0625 4.8621 13.9637 5.03791 13.7879C5.21373 13.6121 5.3125 13.3736 5.3125 13.125ZM19.375 2.5H17.1339C16.9696 2.49955 16.807 2.53168 16.6553 2.59453C16.5035 2.65738 16.3658 2.74969 16.25 2.86614L14.0747 5.04143L4.2202 6.68385C3.99366 6.72162 3.7819 6.82106 3.60816 6.97128C3.43443 7.1215 3.30544 7.31667 3.23535 7.53539C3.16526 7.7541 3.15679 7.9879 3.21085 8.21111C3.26492 8.43433 3.37943 8.63834 3.54183 8.80074L11.1993 16.4581C11.3617 16.6205 11.5657 16.7351 11.7889 16.7892C12.0121 16.8432 12.2459 16.8348 12.4646 16.7647C12.6833 16.6946 12.8785 16.5656 13.0287 16.3919C13.179 16.2181 13.2784 16.0064 13.3162 15.7798L14.9586 5.92534V5.9253L17.1339 3.75H19.375C19.5408 3.75 19.6997 3.68416 19.8169 3.56695C19.9342 3.44974 20 3.29076 20 3.125C20 2.95924 19.9342 2.80027 19.8169 2.68306C19.6997 2.56585 19.5408 2.5 19.375 2.5Z" fill="#417086"></path>
              </svg>                    
              <span>1 Bath</span>                   
            </li>
            <li class="d-flex align-items-center">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.1114 2.9601L15.6168 5.45467L17.3538 7.19168C17.4597 7.29764 17.5318 7.43263 17.5611 7.57958C17.5903 7.72654 17.5753 7.87886 17.5179 8.01728C17.4606 8.15571 17.3635 8.27402 17.2389 8.35727C17.1143 8.44052 16.9679 8.48496 16.8181 8.48497H12.2726C12.0717 8.48496 11.879 8.40514 11.7369 8.26307C11.5949 8.121 11.515 7.92832 11.515 7.7274V3.18195C11.515 3.03212 11.5595 2.88565 11.6427 2.76108C11.726 2.6365 11.8443 2.53941 11.9827 2.48207C12.1211 2.42473 12.2735 2.40972 12.4204 2.43894C12.5674 2.46816 12.7024 2.54029 12.8083 2.64623L14.5453 4.38323L17.0399 1.88865C17.1103 1.8183 17.1938 1.76249 17.2857 1.72442C17.3776 1.68634 17.4761 1.66675 17.5756 1.66675C17.6751 1.66675 17.7736 1.68634 17.8656 1.72442C17.9575 1.76249 18.041 1.8183 18.1114 1.88865C18.1817 1.959 18.2375 2.04252 18.2756 2.13444C18.3137 2.22636 18.3333 2.32488 18.3333 2.42437C18.3333 2.52387 18.3137 2.62238 18.2756 2.7143C18.2375 2.80622 18.1817 2.88974 18.1114 2.9601ZM7.72715 11.5153H3.1817C3.03187 11.5153 2.88541 11.5597 2.76083 11.643C2.63626 11.7262 2.53916 11.8445 2.48182 11.983C2.42448 12.1214 2.40947 12.2737 2.43869 12.4207C2.46791 12.5676 2.54005 12.7026 2.64598 12.8086L4.38299 14.5456L1.88841 17.0402C1.81806 17.1105 1.76225 17.194 1.72417 17.2859C1.6861 17.3779 1.6665 17.4764 1.6665 17.5759C1.6665 17.6754 1.6861 17.7739 1.72417 17.8658C1.76225 17.9577 1.81806 18.0412 1.88841 18.1116C2.03049 18.2537 2.22319 18.3335 2.42413 18.3335C2.52362 18.3335 2.62214 18.3139 2.71406 18.2758C2.80598 18.2378 2.8895 18.1819 2.95985 18.1116L5.45443 15.617L7.19143 17.354C7.29739 17.46 7.43238 17.5321 7.57934 17.5613C7.72629 17.5905 7.87861 17.5755 8.01704 17.5182C8.15546 17.4608 8.27378 17.3637 8.35703 17.2392C8.44027 17.1146 8.48471 16.9681 8.48473 16.8183V12.2728C8.48472 12.0719 8.4049 11.8792 8.26283 11.7372C8.12076 11.5951 7.92807 11.5153 7.72715 11.5153Z" fill="#417086"></path>
              </svg>                    
              <span>1,032 sqft</span>                   
            </li>
            <li class="d-flex align-items-center">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.6166 7.34154C15.9789 7.34154 17.0832 6.23717 17.0832 4.87487C17.0832 3.51257 15.9789 2.4082 14.6166 2.4082C13.2543 2.4082 12.1499 3.51257 12.1499 4.87487C12.1499 6.23717 13.2543 7.34154 14.6166 7.34154Z" fill="#417086"></path>
                <path d="M5.38341 7.34154C6.74572 7.34154 7.85008 6.23717 7.85008 4.87487C7.85008 3.51257 6.74572 2.4082 5.38341 2.4082C4.02111 2.4082 2.91675 3.51257 2.91675 4.87487C2.91675 6.23717 4.02111 7.34154 5.38341 7.34154Z" fill="#417086"></path>
                <path d="M14.6166 17.5915C15.9789 17.5915 17.0832 16.4872 17.0832 15.1249C17.0832 13.7626 15.9789 12.6582 14.6166 12.6582C13.2543 12.6582 12.1499 13.7626 12.1499 15.1249C12.1499 16.4872 13.2543 17.5915 14.6166 17.5915Z" fill="#417086"></path>
                <path d="M5.38341 17.5915C6.74572 17.5915 7.85008 16.4872 7.85008 15.1249C7.85008 13.7626 6.74572 12.6582 5.38341 12.6582C4.02111 12.6582 2.91675 13.7626 2.91675 15.1249C2.91675 16.4872 4.02111 17.5915 5.38341 17.5915Z" fill="#417086"></path>
              </svg>                    
              <span>Family</span>                   
            </li>
          </ul>
          <div class="properties-card--footer d-flex align-items-center justify-content-between">
            <a href="property-details.php?id=2" class="btn btn-small">View Details</a>
            <h5>₹649,900</h5>
          </div>
        </div> 
      </div>

      <div class="properties-card">
        <div class="properties-card--thumb">
          <img src="images/3.png" alt="properties1">
        </div>
        <div class="properties-card--content ">
          <div class="d-flex align-items-center properties-card--content--address">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18.75 21H14.1131C14.8932 20.3046 15.629 19.5609 16.316 18.7734C18.8896 15.8136 20.25 12.6934 20.25 9.75C20.25 7.56196 19.3808 5.46354 17.8336 3.91637C16.2865 2.36919 14.188 1.5 12 1.5C9.81196 1.5 7.71354 2.36919 6.16637 3.91637C4.61919 5.46354 3.75 7.56196 3.75 9.75C3.75 12.6934 5.11038 15.8136 7.68402 18.7734C8.37102 19.5609 9.10676 20.3046 9.8869 21H5.25C5.05109 21 4.86032 21.079 4.71967 21.2197C4.57902 21.3603 4.5 21.5511 4.5 21.75C4.5 21.9489 4.57902 22.1397 4.71967 22.2803C4.86032 22.421 5.05109 22.5 5.25 22.5H18.75C18.9489 22.5 19.1397 22.421 19.2803 22.2803C19.421 22.1397 19.5 21.9489 19.5 21.75C19.5 21.5511 19.421 21.3603 19.2803 21.2197C19.1397 21.079 18.9489 21 18.75 21ZM12 6.75C12.5934 6.75 13.1734 6.92595 13.6667 7.25559C14.1601 7.58524 14.5446 8.05377 14.7717 8.60195C14.9987 9.15013 15.0581 9.75333 14.9424 10.3353C14.8266 10.9172 14.5409 11.4518 14.1213 11.8713C13.7018 12.2909 13.1672 12.5766 12.5853 12.6924C12.0034 12.8081 11.4002 12.7487 10.852 12.5216C10.3038 12.2946 9.83526 11.9101 9.50562 11.4167C9.17597 10.9234 9.00002 10.3433 9.00002 9.75C9.00002 9.35603 9.07761 8.96592 9.22838 8.60194C9.37914 8.23797 9.60012 7.90725 9.8787 7.62867C10.1573 7.3501 10.488 7.12912 10.852 6.97835C11.2159 6.82759 11.6061 6.75 12 6.75Z" fill="#1C4456"></path>
            </svg>
            <span>2861 62nd Ave, Oakland, CA 94605</span>
          </div>
          <ul class="list-unstyled properties-card--content--features">
            <li class="d-flex align-items-center">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.25 5.625H1.875V3.75C1.875 3.58424 1.80915 3.42527 1.69194 3.30806C1.57473 3.19085 1.41576 3.125 1.25 3.125C1.08424 3.125 0.925268 3.19085 0.808058 3.30806C0.690848 3.42527 0.625 3.58424 0.625 3.75V16.25C0.625 16.4158 0.690848 16.5747 0.808058 16.6919C0.925268 16.8092 1.08424 16.875 1.25 16.875C1.41576 16.875 1.57473 16.8092 1.69194 16.6919C1.80915 16.5747 1.875 16.4158 1.875 16.25V13.75H18.125V16.25C18.125 16.4158 18.1908 16.5747 18.3081 16.6919C18.4253 16.8092 18.5842 16.875 18.75 16.875C18.9158 16.875 19.0747 16.8092 19.1919 16.6919C19.3092 16.5747 19.375 16.4158 19.375 16.25V8.75C19.3741 7.92149 19.0445 7.12717 18.4587 6.54132C17.8728 5.95548 17.0785 5.62593 16.25 5.625ZM1.875 6.875H7.5V12.5H1.875V6.875Z" fill="#417086"></path>
              </svg>                    
              <span>3 Bed Room</span>                   
            </li>
            <li class="d-flex align-items-center">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.625 17.8125C5.625 17.9979 5.57002 18.1792 5.467 18.3334C5.36399 18.4875 5.21757 18.6077 5.04627 18.6786C4.87496 18.7496 4.68646 18.7682 4.5046 18.732C4.32275 18.6958 4.1557 18.6065 4.02459 18.4754C3.89348 18.3443 3.80419 18.1773 3.76801 17.9954C3.73184 17.8135 3.75041 17.625 3.82136 17.4537C3.89232 17.2824 4.01248 17.136 4.16665 17.033C4.32082 16.93 4.50208 16.875 4.6875 16.875C4.93614 16.875 5.1746 16.9738 5.35041 17.1496C5.52623 17.3254 5.625 17.5639 5.625 17.8125ZM6.875 14.6875C6.68958 14.6875 6.50832 14.7425 6.35415 14.8455C6.19998 14.9485 6.07982 15.0949 6.00886 15.2662C5.93791 15.4375 5.91934 15.626 5.95551 15.8079C5.99169 15.9898 6.08098 16.1568 6.21209 16.2879C6.3432 16.419 6.51025 16.5083 6.6921 16.5445C6.87396 16.5807 7.06246 16.5621 7.23377 16.4911C7.40507 16.4202 7.55149 16.3 7.6545 16.1459C7.75752 15.9917 7.8125 15.8104 7.8125 15.625C7.8125 15.3764 7.71373 15.1379 7.53791 14.9621C7.3621 14.7863 7.12364 14.6875 6.875 14.6875ZM2.1875 14.375C2.00208 14.375 1.82082 14.43 1.66665 14.533C1.51248 14.636 1.39232 14.7824 1.32136 14.9537C1.25041 15.125 1.23184 15.3135 1.26801 15.4954C1.30419 15.6773 1.39348 15.8443 1.52459 15.9754C1.6557 16.1065 1.82275 16.1958 2.0046 16.232C2.18646 16.2682 2.37496 16.2496 2.54627 16.1786C2.71757 16.1077 2.86399 15.9875 2.967 15.8334C3.07002 15.6792 3.125 15.4979 3.125 15.3125C3.125 15.0639 3.02623 14.8254 2.85041 14.6496C2.6746 14.4738 2.43614 14.375 2.1875 14.375ZM5.3125 13.125C5.3125 12.9396 5.25752 12.7583 5.1545 12.6042C5.05149 12.45 4.90507 12.3298 4.73377 12.2589C4.56246 12.1879 4.37396 12.1693 4.1921 12.2055C4.01025 12.2417 3.8432 12.331 3.71209 12.4621C3.58098 12.5932 3.49169 12.7603 3.45551 12.9421C3.41934 13.124 3.43791 13.3125 3.50886 13.4838C3.57982 13.6551 3.69998 13.8015 3.85415 13.9045C4.00832 14.0075 4.18958 14.0625 4.375 14.0625C4.62364 14.0625 4.8621 13.9637 5.03791 13.7879C5.21373 13.6121 5.3125 13.3736 5.3125 13.125ZM19.375 2.5H17.1339C16.9696 2.49955 16.807 2.53168 16.6553 2.59453C16.5035 2.65738 16.3658 2.74969 16.25 2.86614L14.0747 5.04143L4.2202 6.68385C3.99366 6.72162 3.7819 6.82106 3.60816 6.97128C3.43443 7.1215 3.30544 7.31667 3.23535 7.53539C3.16526 7.7541 3.15679 7.9879 3.21085 8.21111C3.26492 8.43433 3.37943 8.63834 3.54183 8.80074L11.1993 16.4581C11.3617 16.6205 11.5657 16.7351 11.7889 16.7892C12.0121 16.8432 12.2459 16.8348 12.4646 16.7647C12.6833 16.6946 12.8785 16.5656 13.0287 16.3919C13.179 16.2181 13.2784 16.0064 13.3162 15.7798L14.9586 5.92534V5.9253L17.1339 3.75H19.375C19.5408 3.75 19.6997 3.68416 19.8169 3.56695C19.9342 3.44974 20 3.29076 20 3.125C20 2.95924 19.9342 2.80027 19.8169 2.68306C19.6997 2.56585 19.5408 2.5 19.375 2.5Z" fill="#417086"></path>
              </svg>                    
              <span>1 Bath</span>                   
            </li>
            <li class="d-flex align-items-center">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.1114 2.9601L15.6168 5.45467L17.3538 7.19168C17.4597 7.29764 17.5318 7.43263 17.5611 7.57958C17.5903 7.72654 17.5753 7.87886 17.5179 8.01728C17.4606 8.15571 17.3635 8.27402 17.2389 8.35727C17.1143 8.44052 16.9679 8.48496 16.8181 8.48497H12.2726C12.0717 8.48496 11.879 8.40514 11.7369 8.26307C11.5949 8.121 11.515 7.92832 11.515 7.7274V3.18195C11.515 3.03212 11.5595 2.88565 11.6427 2.76108C11.726 2.6365 11.8443 2.53941 11.9827 2.48207C12.1211 2.42473 12.2735 2.40972 12.4204 2.43894C12.5674 2.46816 12.7024 2.54029 12.8083 2.64623L14.5453 4.38323L17.0399 1.88865C17.1103 1.8183 17.1938 1.76249 17.2857 1.72442C17.3776 1.68634 17.4761 1.66675 17.5756 1.66675C17.6751 1.66675 17.7736 1.68634 17.8656 1.72442C17.9575 1.76249 18.041 1.8183 18.1114 1.88865C18.1817 1.959 18.2375 2.04252 18.2756 2.13444C18.3137 2.22636 18.3333 2.32488 18.3333 2.42437C18.3333 2.52387 18.3137 2.62238 18.2756 2.7143C18.2375 2.80622 18.1817 2.88974 18.1114 2.9601ZM7.72715 11.5153H3.1817C3.03187 11.5153 2.88541 11.5597 2.76083 11.643C2.63626 11.7262 2.53916 11.8445 2.48182 11.983C2.42448 12.1214 2.40947 12.2737 2.43869 12.4207C2.46791 12.5676 2.54005 12.7026 2.64598 12.8086L4.38299 14.5456L1.88841 17.0402C1.81806 17.1105 1.76225 17.194 1.72417 17.2859C1.6861 17.3779 1.6665 17.4764 1.6665 17.5759C1.6665 17.6754 1.6861 17.7739 1.72417 17.8658C1.76225 17.9577 1.81806 18.0412 1.88841 18.1116C2.03049 18.2537 2.22319 18.3335 2.42413 18.3335C2.52362 18.3335 2.62214 18.3139 2.71406 18.2758C2.80598 18.2378 2.8895 18.1819 2.95985 18.1116L5.45443 15.617L7.19143 17.354C7.29739 17.46 7.43238 17.5321 7.57934 17.5613C7.72629 17.5905 7.87861 17.5755 8.01704 17.5182C8.15546 17.4608 8.27378 17.3637 8.35703 17.2392C8.44027 17.1146 8.48471 16.9681 8.48473 16.8183V12.2728C8.48472 12.0719 8.4049 11.8792 8.26283 11.7372C8.12076 11.5951 7.92807 11.5153 7.72715 11.5153Z" fill="#417086"></path>
              </svg>                    
              <span>1,032 sqft</span>                   
            </li>
            <li class="d-flex align-items-center">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.6166 7.34154C15.9789 7.34154 17.0832 6.23717 17.0832 4.87487C17.0832 3.51257 15.9789 2.4082 14.6166 2.4082C13.2543 2.4082 12.1499 3.51257 12.1499 4.87487C12.1499 6.23717 13.2543 7.34154 14.6166 7.34154Z" fill="#417086"></path>
                <path d="M5.38341 7.34154C6.74572 7.34154 7.85008 6.23717 7.85008 4.87487C7.85008 3.51257 6.74572 2.4082 5.38341 2.4082C4.02111 2.4082 2.91675 3.51257 2.91675 4.87487C2.91675 6.23717 4.02111 7.34154 5.38341 7.34154Z" fill="#417086"></path>
                <path d="M14.6166 17.5915C15.9789 17.5915 17.0832 16.4872 17.0832 15.1249C17.0832 13.7626 15.9789 12.6582 14.6166 12.6582C13.2543 12.6582 12.1499 13.7626 12.1499 15.1249C12.1499 16.4872 13.2543 17.5915 14.6166 17.5915Z" fill="#417086"></path>
                <path d="M5.38341 17.5915C6.74572 17.5915 7.85008 16.4872 7.85008 15.1249C7.85008 13.7626 6.74572 12.6582 5.38341 12.6582C4.02111 12.6582 2.91675 13.7626 2.91675 15.1249C2.91675 16.4872 4.02111 17.5915 5.38341 17.5915Z" fill="#417086"></path>
              </svg>                    
              <span>Family</span>                   
            </li>
          </ul>
          <div class="properties-card--footer d-flex align-items-center justify-content-between">
            <a href="property-details.php?id=3" class="btn btn-small">View Details</a>
            <h5>₹649,900</h5>
          </div>
        </div> 
      </div>
      
    </div>
    <div class="row">
      <div class="col-6">
        <a href="listing.php" class="btn btn-small btn-outline btn-mobile d-md-none align-items-center d-flex w-auto">
          <span>Explore All </span>
          <i class="ph-caret-right"></i>
        </a>
      </div>
    </div>
  </div>
</section>


<!-- 
  #############
  Feature Section
  #############
-->
<section class="feature">
  <div class="container">
    <div class="row align-items-center feature-top" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000">
      <div class="col-lg-6 order-lg-1 order-2">
        <div class="feature-content">
          <h3>
            Simple &amp; easy way to find your dream Apartment
          </h3>
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed.
          </p>
          <a href="#contact.php" class="btn btn-small">Get Started</a>
        </div>
      </div>
      <div class="col-lg-6 order-lg-2 order-1">
        <div class="row">
          <div class="col-6 ">
            <div class="feature-grid-image">
              <img src="images/feature1.png" alt="feature1">
              <img src="images/feature2.png" alt="feature2">
            </div>
          </div>
          <div class="col-6">
            <div class="feature-grid-image">
              <img src="images/feature3.png" alt="feature3">
              <img src="images/feature4.png" alt="feature4">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row align-items-center feature-bottom" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000" data-aos-delay="200">
      <div class="col-md-6 order-xl-1 order-md-2">
        <div class="feature-content-thumb">
          <img src="images/feature5.png" alt="feature">
        </div>
      </div>
      <div class="col-md-6 col-lg-5 me-lg-auto ms-xl-auto order-xl-2 order-md-1">
        <div class="feature-content">
          <h3>
            Secure payment system
          </h3>
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. In a free hour, when our power of choice is untrammelled.
          </p>
          <ul class="">
            <li>
              <span class="bold">Find excellent deals</span>
            </li>
            <li>
              <span class="bold">Friendly host &amp; Fast support</span>
            </li>
            <li>
              <span class="bold">
                Secure payment system
              </span>
            </li>
          </ul>
          <a href="about.html" class="btn btn-small">Learn More</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 
  #############
  Testimonial Section
  #############
-->
<section class="testimonial" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000">
  <div class="testimonial-shape-left">
    <img src="images/testimonial-shape-1.png" alt="testimonial-shape">
  </div>
  <div class="testimonial-shape-right-top">
    <img src="images/testimonial-shape-2.png" alt="testimonial-shape">
  </div>
  <div class="testimonial-shape-right-bottom"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-11 offset-lg-1">
        <div class="testimonial-slider">
          <!--Testimonial Slider Items-->
          <div class="testimonial-slider--item">
            <div class="testimonial-slider--item--thumb">
              <img src="images/client1.png" alt="client">
            </div>
            <div class="testimonial-slider--item--content">
              <div class="testimonial-slider--item--header d-flex align-items-center justify-content-between">
                <div class="testimonial-slider--item--author">
                  <h4>Taylor Wilson</h4>
                  <p>Quality Manager - Static Mania</p>
                </div>
                <svg width="71" height="53" viewBox="0 0 71 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M63.1002 45.1484C68.0656 40.3016 70.5 32.8932 70.5 23.0288C70.5 16.1032 68.9173 10.5945 65.692 6.56205L65.6921 6.56202L65.6877 6.5567C62.3665 2.51965 57.9712 0.50001 52.5486 0.50001C47.8662 0.50001 43.9762 2.01153 40.9198 5.05125L40.9198 5.05121L40.9145 5.05655C37.8712 8.17499 36.3424 11.9046 36.3424 16.2199C36.3424 20.6903 37.7213 24.503 40.4905 27.6271C43.1951 30.8699 46.9685 32.4738 51.7432 32.4738C54.171 32.4738 56.142 32.0035 57.5924 31.007C57.0019 33.771 55.739 36.1062 53.807 38.0277C51.2415 40.5791 47.5803 41.8874 42.749 41.8874C41.2557 41.8874 39.5337 41.7563 37.5808 41.4914L37.0136 41.4145L37.0136 41.9869L37.0136 51.5995L37.0136 52.0995L37.5136 52.0995C37.8358 52.0995 38.2992 52.14 38.9143 52.2272C39.4596 52.3173 40.0056 52.3637 40.552 52.3664C41.0048 52.454 41.4248 52.5 41.8093 52.5C50.9364 52.5 58.0582 50.0717 63.1002 45.1484ZM63.1002 45.1484L62.751 44.7906L63.1002 45.1484ZM29.8496 6.56205L29.8497 6.56202L29.8453 6.55669C26.5241 2.51964 22.1288 0.500007 16.7062 0.500007C12.0238 0.500006 8.1338 2.01153 5.07734 5.0512L5.07213 5.05654C2.02878 8.17499 0.499996 11.9046 0.499995 16.2199C0.499995 20.6903 1.87891 24.503 4.64807 27.6271C7.35271 30.8699 11.1261 32.4738 15.9008 32.4738C18.3286 32.4738 20.2995 32.0035 21.75 31.007C21.1595 33.771 19.8966 36.1062 17.9645 38.0277C15.3991 40.5791 11.7379 41.8874 6.90662 41.8874C5.41328 41.8874 3.69132 41.7563 1.7384 41.4914L1.1712 41.4145L1.1712 41.9869L1.1712 51.5995L1.1712 52.0995L1.6712 52.0995C1.99337 52.0995 2.45676 52.14 3.07186 52.2272C3.61721 52.3173 4.16318 52.3637 4.70956 52.3664C5.16239 52.454 5.58237 52.5 5.96693 52.5C15.094 52.5 22.2158 50.0717 27.2578 45.1484C32.2232 40.3016 34.6576 32.8932 34.6576 23.0288C34.6576 16.1032 33.0749 10.5945 29.8496 6.56205Z" stroke="#5D8A9E"></path>
                </svg>                  
              </div>
              <div class="testimonial-slider--item--details">
                <h5>Eget eu massa et consectetur. Mauris donec. Leo a, id sed duis proin sodales. Turpis viverra diam porttitor mattis morbi ac amet. Euismod commodo. We get you customer relationships that last. </h5>
              </div>
            </div>
          </div>
          <!--Testimonial Slider Items-->
          <div class="testimonial-slider--item">
            <div class="testimonial-slider--item--thumb">
              <img src="images/client2.png" alt="client">
            </div>
            <div class="testimonial-slider--item--content">
              <div class="testimonial-slider--item--header d-flex align-items-center justify-content-between">
                <div class="testimonial-slider--item--author">
                  <h4>Willy Madison</h4>
                  <p>Management - Static Mania</p>
                </div>
                <svg width="71" height="53" viewBox="0 0 71 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M63.1002 45.1484C68.0656 40.3016 70.5 32.8932 70.5 23.0288C70.5 16.1032 68.9173 10.5945 65.692 6.56205L65.6921 6.56202L65.6877 6.5567C62.3665 2.51965 57.9712 0.50001 52.5486 0.50001C47.8662 0.50001 43.9762 2.01153 40.9198 5.05125L40.9198 5.05121L40.9145 5.05655C37.8712 8.17499 36.3424 11.9046 36.3424 16.2199C36.3424 20.6903 37.7213 24.503 40.4905 27.6271C43.1951 30.8699 46.9685 32.4738 51.7432 32.4738C54.171 32.4738 56.142 32.0035 57.5924 31.007C57.0019 33.771 55.739 36.1062 53.807 38.0277C51.2415 40.5791 47.5803 41.8874 42.749 41.8874C41.2557 41.8874 39.5337 41.7563 37.5808 41.4914L37.0136 41.4145L37.0136 41.9869L37.0136 51.5995L37.0136 52.0995L37.5136 52.0995C37.8358 52.0995 38.2992 52.14 38.9143 52.2272C39.4596 52.3173 40.0056 52.3637 40.552 52.3664C41.0048 52.454 41.4248 52.5 41.8093 52.5C50.9364 52.5 58.0582 50.0717 63.1002 45.1484ZM63.1002 45.1484L62.751 44.7906L63.1002 45.1484ZM29.8496 6.56205L29.8497 6.56202L29.8453 6.55669C26.5241 2.51964 22.1288 0.500007 16.7062 0.500007C12.0238 0.500006 8.1338 2.01153 5.07734 5.0512L5.07213 5.05654C2.02878 8.17499 0.499996 11.9046 0.499995 16.2199C0.499995 20.6903 1.87891 24.503 4.64807 27.6271C7.35271 30.8699 11.1261 32.4738 15.9008 32.4738C18.3286 32.4738 20.2995 32.0035 21.75 31.007C21.1595 33.771 19.8966 36.1062 17.9645 38.0277C15.3991 40.5791 11.7379 41.8874 6.90662 41.8874C5.41328 41.8874 3.69132 41.7563 1.7384 41.4914L1.1712 41.4145L1.1712 41.9869L1.1712 51.5995L1.1712 52.0995L1.6712 52.0995C1.99337 52.0995 2.45676 52.14 3.07186 52.2272C3.61721 52.3173 4.16318 52.3637 4.70956 52.3664C5.16239 52.454 5.58237 52.5 5.96693 52.5C15.094 52.5 22.2158 50.0717 27.2578 45.1484C32.2232 40.3016 34.6576 32.8932 34.6576 23.0288C34.6576 16.1032 33.0749 10.5945 29.8496 6.56205Z" stroke="#5D8A9E"></path>
                </svg>                  
              </div>
              <div class="testimonial-slider--item--details">
                <h5>Eget eu massa et consectetur. Mauris donec. Leo a, id sed duis proin sodales. Turpis viverra diam porttitor mattis morbi ac amet. Euismod commodo. We get you customer relationships that last. </h5>
              </div>
            </div>
          </div>
          <!--Testimonial Slider Items-->
          <div class="testimonial-slider--item">
            <div class="testimonial-slider--item--thumb">
              <img src="images/client3.png" alt="client">
            </div>
            <div class="testimonial-slider--item--content">
              <div class="testimonial-slider--item--header d-flex align-items-center justify-content-between">
                <div class="testimonial-slider--item--author">
                  <h4>Mike lerson</h4>
                  <p>Product Manager - Static Mania</p>
                </div>
                <svg width="71" height="53" viewBox="0 0 71 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M63.1002 45.1484C68.0656 40.3016 70.5 32.8932 70.5 23.0288C70.5 16.1032 68.9173 10.5945 65.692 6.56205L65.6921 6.56202L65.6877 6.5567C62.3665 2.51965 57.9712 0.50001 52.5486 0.50001C47.8662 0.50001 43.9762 2.01153 40.9198 5.05125L40.9198 5.05121L40.9145 5.05655C37.8712 8.17499 36.3424 11.9046 36.3424 16.2199C36.3424 20.6903 37.7213 24.503 40.4905 27.6271C43.1951 30.8699 46.9685 32.4738 51.7432 32.4738C54.171 32.4738 56.142 32.0035 57.5924 31.007C57.0019 33.771 55.739 36.1062 53.807 38.0277C51.2415 40.5791 47.5803 41.8874 42.749 41.8874C41.2557 41.8874 39.5337 41.7563 37.5808 41.4914L37.0136 41.4145L37.0136 41.9869L37.0136 51.5995L37.0136 52.0995L37.5136 52.0995C37.8358 52.0995 38.2992 52.14 38.9143 52.2272C39.4596 52.3173 40.0056 52.3637 40.552 52.3664C41.0048 52.454 41.4248 52.5 41.8093 52.5C50.9364 52.5 58.0582 50.0717 63.1002 45.1484ZM63.1002 45.1484L62.751 44.7906L63.1002 45.1484ZM29.8496 6.56205L29.8497 6.56202L29.8453 6.55669C26.5241 2.51964 22.1288 0.500007 16.7062 0.500007C12.0238 0.500006 8.1338 2.01153 5.07734 5.0512L5.07213 5.05654C2.02878 8.17499 0.499996 11.9046 0.499995 16.2199C0.499995 20.6903 1.87891 24.503 4.64807 27.6271C7.35271 30.8699 11.1261 32.4738 15.9008 32.4738C18.3286 32.4738 20.2995 32.0035 21.75 31.007C21.1595 33.771 19.8966 36.1062 17.9645 38.0277C15.3991 40.5791 11.7379 41.8874 6.90662 41.8874C5.41328 41.8874 3.69132 41.7563 1.7384 41.4914L1.1712 41.4145L1.1712 41.9869L1.1712 51.5995L1.1712 52.0995L1.6712 52.0995C1.99337 52.0995 2.45676 52.14 3.07186 52.2272C3.61721 52.3173 4.16318 52.3637 4.70956 52.3664C5.16239 52.454 5.58237 52.5 5.96693 52.5C15.094 52.5 22.2158 50.0717 27.2578 45.1484C32.2232 40.3016 34.6576 32.8932 34.6576 23.0288C34.6576 16.1032 33.0749 10.5945 29.8496 6.56205Z" stroke="#5D8A9E"></path>
                </svg>                  
              </div>
              <div class="testimonial-slider--item--details">
                <h5>Eget eu massa et consectetur. Mauris donec. Leo a, id sed duis proin sodales. Turpis viverra diam porttitor mattis morbi ac amet. Euismod commodo. We get you customer relationships that last. </h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 
  #############
  Blog Home Section
  #############
-->
<section class="blog">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex align-items-center justify-content-between blog-header">
          <h3>News &amp; Consultant</h3>
          <a href="blog.html" class="d-md-flex align-items-center d-none ">
            <span>Explore All </span>
            <i class="ph-arrow-right"></i>               
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000" data-aos-delay="0">
        <div class="blog-card position-relative">
          <div class="blog-card-thumb">
            <img src="images/blog1.png" alt="blog-image">
          </div>
          <div class="blog-card-content">
            <a href="blog-single.html">
              <h5>10 popular Buliding designs that increse site values</h5>
            </a>
            <a href="blog-single.html" class="d-flex align-items-center stretched-link ">
              <span>Read the Article</span>
              <i class="ph-arrow-right"></i>               
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-once="true" data-aos-duration="1500" data-aos-delay="50">
        <article class="blog-card position-relative">
          <div class="blog-card-thumb">
            <img src="images/blog2.png" alt="blog-image">
          </div>
          <div class="blog-card-content">
            <a href="blog-single.html">
              <h5>Popular designs to beautify your Construction </h5>
            </a>
            <a href="blog-single.html" class="d-flex align-items-center stretched-link ">
              <span>Read the Article</span>
              <i class="ph-arrow-right"></i>               
            </a>
          </div>
        </article>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-once="true" data-aos-duration="2000" data-aos-delay="100">
        <article class="blog-card position-relative">
          <div class="blog-card-thumb">
            <img src="images/blog3.png" alt="blog-image">
          </div>
          <div class="blog-card-content">
            <a href="blog-single.html">
              <h5>Delightful home decor trend for Summer</h5>
            </a>
            <a href="blog-single.html" class="d-flex align-items-center stretched-link ">
              <span>Read the Article</span>
              <i class="ph-arrow-right"></i>               
            </a>
          </div>
        </article>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <a href="blog.html" class="btn btn-small btn-outline btn-mobile d-md-none align-items-center d-flex w-auto">
          <span>Explore All </span>
          <i class="ph-caret-right"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-7 mx-auto">
        <div class="cta">
          <h4>For Recent Update, News.</h4>
          <p>We helps businesses customize, automate and scale up their ad production and delivery.</p>
          <form action="GET" class="flex align-items-center">
            <input type="text" class="form-control" placeholder="Enter Your Email">
            <button class="btn d-block d-md-inline-block w-md-auto w-100">
              Subscribe
            </button>
          </form>
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
                <li><a data-bs-toggle="modal" href="/includes/logout.php" role="button" class="footer-link">Log Out</a></li>
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
                <li><a data-bs-toggle="modal" href="/includes/logout.php" role="button" class="footer-link">Log Out</a></li>
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
<?php
include('includes/dbconn.php');

// Check if form is submitted
if(isset($_POST['fetch_data'])) {
    // Check if mobile number is provided
    if(isset($_POST['mobilenumber'])) {
        $mobilenumber = $_POST['mobilenumber'];

        // Query to fetch data from server based on mobile number
        $query = "SELECT * FROM tblvisitor WHERE MobileNumber = '$mobilenumber'";
        $result = mysqli_query($con, $query);

        // Check if any rows are returned
        if(mysqli_num_rows($result) > 0) {
            // Mobile number exists in the database, redirect to webx.php
            header("Location: visitor/webx.php?mobilenumber=$mobilenumber");
            exit();
        } else {
            // Mobile number not found in the database, redirect to web.php
            header("Location: visitor/web.php?mobilenumber=$mobilenumber");
            exit();
        }
    } else {
        echo "Mobile number not provided.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Append Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Append
  * Template URL: https://bootstrapmade.com/append-bootstrap-website-template/
  * Updated: May 18 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
      <a href="index.html" class="">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        
<img src="assets/img/logo-black.png" alt="Trulli" width="200" height="70">
      </a>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </div>
  </header>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <img src="assets/img/main.png" alt="" data-aos="fade-in">
      <div class="container">
        <div class="row">
          <div class="col">
          </div>
          <div class="col-8">
            <h2 data-aos="fade-up" data-aos-delay="100">Welcome to NetForChoice </h2>
            <p data-aos="fade-up" data-aos-delay="200">Diverse Range of IT Infrastructure Products & Services</p>
            <form id="registrationForm" class="sign-up-form d-flex" data-aos="fade-up" data-aos-delay="300" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" required pattern="[0-9]{10}" required maxlength="10" title="Please enter a 10-digit numeric contact number" oninput="restrictToNumeric(this)" placeholder="Enter your mobile number">
              <div class="invalid-feedback">Please enter a 10-digit numeric contact number.</div>
              <input type="submit" name="fetch_data" value="Register" class="btn btn-primary" value="Registration" >
            </form>
          </div>
        </div>
      </div>
    </section><!-- /Hero Section -->

    <!-- Your other sections/content here -->

    
  </main><!-- End #main -->



  <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="sitename">NetForChoice</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://www.netforchoice.com/">NetForChoice</a>
      </div>
    </div>
    <br>









  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Script to restrict input to numeric only -->
  <script>
    function restrictToNumeric(input) {
      // Remove any non-numeric characters from the input
      input.value = input.value.replace(/\D/g, '');
    }
  </script>


<script>
    window.addEventListener('popstate', function(event) {
        // Reload the current page to prevent going back
        window.location.reload();
    });
</script>


<!-- <script>
  window.onpageshow = function(event) {
    if (event.persisted) {
      document.querySelector("form").reset();
    }
  };
</script> -->

</body>

</html>

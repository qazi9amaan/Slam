<?php 
  session_start();

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Knight Bootstrap Template - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Knight - v2.0.0
  * Template URL: https://bootstrapmade.com/knight-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
  <style>
    
  .user i {
          font-size: 18px;
  color: #7cc576;
  float: right;
  width: 35px;
  height: 35px;
  background: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50px;
  transition: all 0.3s ease-in-out;
  }
  .user{
      position: fixed;
      right: 15px;

  top: 20px;
  z-index: 9998;
  border: 0;
  background: none;
  font-size: 24px;
  transition: all 0.4s;
  outline: none !important;
  line-height: 1;
  cursor: pointer;
  text-align: right;
  }
  .user #askquestion {
      right: 45px;
      top: -5px;
      position: absolute;
  }
  .user #askquestion:hover  {
      border: 1px solid #7cc576;
      color: #7cc576;
  }
  
  .mobile-nav-toggle{
    z-index: 500;
  }

.modal-content {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: transparent;
    background-clip: padding-box;
    border: none;
    padding: 0px;
}

#large_searchresult{
   position: absolute;
  border: 1px;
  background-clip: border-box;
  border-radius: .25rem;
}

#searchmodal i {
      background: #fff;
    padding: 9.53px;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    font-size: 16px !important;
    margin-left: -34px;
    border-left: none;
    border-bottom-left-radius: 0px;
    border-top-left-radius: 0px;
}

  

  </style>
<body>

<!-- SEARCH -->
<div class="modal fade bd-example-modal-lg" id="searchmodal" tabindex="-1" role="dialog" aria-labelledby="searchmodalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        
          <div class="container">
           <div class="row">
             
            <div class="col-10 my-2 ">
              <input type="search" name="" id ="large_search_box" class="form-control p-2" placeholder="Use @ to search by username ...">
                <div id="large_searchresult" class="container">
                  
                </div>

            </div>
            <div style = "margin-top: 7px;" class="col px-3 pt-2 ">
              <i style ="font-size: 15px;" class="icofont-search"></i>
            </div>
           </div>
          </div>
      </div>
    </div>
  </div>
</div>


  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <a href="index.html" class="hero-logo" data-aos="zoom-in"><img src="assets/img/hero-logo.png" alt=""></a>
      <h1 data-aos="zoom-in">BE-KUS</h1>
      <h2 data-aos="fade-up">Curious? Find Mates & ask Anonymously</h2>
            <?php
            if(isset($_SESSION['currentuserid'])) {
          ?>
            <a data-aos="fade-up" href="user/useraccount.php" class="btn-get-started">My Account </a>
         <?php
          }else{
         ?> 
             <a data-aos="fade-up" href="login.php" class="btn-get-started scrollto">Get Started</a>
            
         <?php
          }
         ?>

    </div>
  </section><!-- End Hero -->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container">

      <!-- The main logo is shown in mobile version only. The centered nav-logo in nav menu is displayed in desktop view  -->
      <div class="logo d-block d-lg-none">
        <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      </div>

      <div class="user">
            <a class = "searchbtn_small" href=""><i id = "askquestion" class="icofont-search"></i></a>
          </div>


      <nav class="nav-menu d-none d-lg-block">
        <ul class="nav-inner">


          <?php
            if(isset($_SESSION['currentuserid'])) {
          ?>
           <li><a href="user/useraccount.php">My Account</a></li>
          <li><a href="#">Share Link</a></li>

          <li class="nav-logo"><a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a></li>
           <li><a href="public/showuser.php?username=<?php echo $_SESSION['currentusername']; ?> ">  <?php echo $_SESSION['currentusername']; ?>'s Wall</a></li>
          <li><a href="logout.php">Logout</a></li>

       <?php
          }else{
         ?> 
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="#services">About</a></li>
          <li class="nav-logo"><a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="login.php#register">Register</a></li>            
         <?php
          }
         ?>


          

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>BE-KUS . ML</h2>
          <p>
            Let world find you! we allows you to receive feedback from whoever there is and give you a feeling of what world thinks about you.
            </p>
        </div>

        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1">
            <div class="icon-box mt-5 mt-lg-0" data-aos="fade-up">
              <i class="bx bx-receipt"></i>
              <h4>Answer Questions</h4>
              <p>What they think about me? isn't too difficult to find! signup now and let world find you!</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-cube-alt"></i>
              <h4>Anonymous Compliments</h4>
              <p>Being reserved is not a choice,let them express themselves in their way.</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-images"></i>
              <h4>Privacy</h4>
              <p>Your answers get deleted once seen, nothing stays so long.</p>
            </div>
            
          </div>
          <div class="image col-lg-6 order-1 order-lg-2" style='background-image: url("assets/img/services.jpg");' data-aos="fade-left" data-aos-delay="100"></div>
        </div>

      </div>
    </section><!-- End Services Section -->

 
   


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Knight</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    $('.searchbtn_small').click(function(e){
      e.preventDefault();
            $('#searchmodal').modal('show');

})

$('#large_search_box').keyup(function(){
   if($(this).val()!=""||$(this).val()!=null)
   {
      $.ajax({
    url : "user/func/userfunctions.php",
    type:'get',
    data: "searchuser=true&value="+$(this).val(),
    success: function(data) {
       $('#large_searchresult').css('background','#fff');
        $('#large_searchresult').css('border','1px solid rgba(0,0,0,.125)');
        $('#large_searchresult').html(data);
    }
  });
   }
});

$('#searchmodal').on('hide.bs.modal', function (e) {
   $('#large_searchresult').css('background','none');
        $('#large_searchresult').css('border','none');
})

  </script>
</body>

</html>
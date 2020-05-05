<?php 
  session_start();

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Zaan- Ask, Confess and Answer</title>
  <meta content="Find out what people think about you. Confess your feelings and get answers on any topic!" name="descriptison">
  <meta content="Ask, Confess, complements, slambook, slam, questions abut me, answer anonymously, ask anonymously, anonymously, confessions" name="keywords">

  <link class="title-img" href="/assets/img/friends/friends-outline-green.png" rel="icon">
    <link class="title-img" href="/assets/img/friends/friends-outline-green.png" rel="apple-touch-icon">


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
  <link   href="assets/css/style.css" rel="stylesheet">
  <link  href="assets/css/login_darkmode.css" rel="stylesheet">

 
</head>
<style>
        @media (prefers-color-scheme: dark) {
        /* 
        -----------------------
        # INDEX PAGE
        -----------------------
        */

        html {
  --text-color-normal: #0a244d;
  --text-color-light: #8cabd9;
}
        #large_searchresult {
        background: #2d2d2d  !important;
        }
        .btn-get-started{
          background: #2d2d2d !important;
          color: #999 !important;
          box-shadow: 0 4px 15px -2px rgba(0, 0, 0, 0.5) !important;
        }

        #searchmodal i{
          background: #4d4d4d !important;
          color:#fafafa !important;
        }

        
        /* -----------------------
            # END INDEX
        -------------------------- */
        }

        #searchmodal .modal-content{
          background: none !important;
        }

        .st0{fill:#fafafa !important;}

    </style>
  <style>

    
    
  .user i {
      font-size: 18px;
      color: #fff;
      float: right;
      width: 35px;
      height: 35px;
      background: #7cc576;
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
      color: #fff;
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

  

#hero h1 {
    color:#6c757d;
  }
  
 
.st0{fill:#7CC576;}
 #img-hero{
   height:150px;
 }
 #i
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

<?php 
  if(isset($_COOKIE['user_name'])) {
?>
  <style>
  
  .hero-logo img{
    border-radius:50%;
    width: 9.8rem;
    height: 9.8rem;
    border:3px solid  #7cc576;
  }
  
  </style>
  <section id="hero">
    <div class="hero-container">
      <a href="#" class="hero-logo" data-aos="zoom-in"><img src="<?php echo $_COOKIE['profile_pic']; ?>" alt=""></a>
      <h1  class ="hero-name" data-aos="zoom-in">Hey <?php echo $_COOKIE['f_name'];?>!<h2>
            <?php
            if(isset($_SESSION['currentuserid'])) {
          ?>
            <a data-aos="fade-up" href="account" class="btn-get-started">My Account</a>
         <?php
          }else{
         ?> 
             <a data-aos="fade-up" id="cookie_login" href="#" class="btn-get-started scrollto">login as <?php echo $_COOKIE['f_name'];?></a>
             <p class="text-center text-white mt-2">
                 <a href="logout" class="text-muted text-white">NOT <?php echo $_COOKIE['f_name'];?>?</a>
             </p>
         <?php
          }
         ?>

    </div>
  </section>

  <?php 
   }else{
  ?>

  <section id="hero">
      <div class="hero-container">
        <a href="/home" class="hero-logo mb-sm-5" data-aos="zoom-in">
        <img style = "height:150px;" class = "big-main img-fluid mb-3" responsive src = "/assets/img/test/main.svg"  alt="">
       
     
       
       
       
       
        <h1 class ="hero-name" data-aos="zoom-in">ZAAN, ASK & CONFESS</h1>
        <h2 data-aos="fade-up">CURIOUS? FIND MATES & ASK ANONYMOUSLY</h2>
              <?php
              if(isset($_SESSION['currentuserid'])) {
            ?>
              <a data-aos="fade-up" href="account" class="btn-get-started">My Account </a>
          <?php
            }else{
          ?> 
              <a data-aos="fade-up" href="login" class="btn-get-started scrollto">Get Started</a>
              
          <?php
            }
          ?>
      </div>
    </section>

<?php 
   }   
  ?>



  <header id="header" class="d-flex align-items-center">
    <div class="container">

      <!-- The main logo is shown in mobile version only. The centered nav-logo in nav menu is displayed in desktop view  -->
      <div class="logo d-block d-lg-none">
      </div>

      <div class="user">
            <a class = "searchbtn_small" href=""><i id = "askquestion" class="icofont-search"></i></a>
          </div>


      <nav class="nav-menu d-none d-lg-block">
        <ul class="nav-inner">


          <?php
            if(isset($_SESSION['currentuserid'])) {
          ?>
           <li><a href="account">My Account</a></li>
          <li><a href="#">Share Link</a></li>
          <!-- IMAGES CHANGE -->
          <li class="nav-logo"><a href="home"><img style = "height: 46px;" src="/assets/img/friends/friends-green.png" alt="" class="img-fluid center-img"></a></li>
           <li><a href="account/wall/<?php echo $_SESSION['currentusername']; ?> ">  <?php echo $_SESSION['currentusername']; ?>'s Wall</a></li>
          <li><a href="logout">Logout</a></li>

       <?php
          }else{
         ?> 
          <li class="active"><a href="home">Home</a></li>
          <li><a href="#services">About</a></li>
          <!-- IMAGES CHANGE -->
          <li class="nav-logo"><a href="home"><img style = "height: 46px;" src="/assets/img/friends/friends-green.png" alt="" class="center-img img-fluid"></a></li>
          <li><a href="login">Login</a></li>
          <li><a href="register">Register</a></li>            
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
          <h2>ZAAN . ML</h2>
          <p id ="loac">
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
        &copy; Copyright <strong><span>Zaan 2020</span></strong>. All Rights Reserved 
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

});

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
});




$('#cookie_login').click(function(){
 
                jQuery.ajax({
                   url: "forms/authentication.php",
                   type: "POST",
                    data: "cookielogin=true",
                   success: function(data) {
                    if (data == 'OK') {
                           window.location = 'account';
                           }
                       else{ 
                           $('#login_help').html(data);
                          
                            }
                   
               }
                });
});
     

if (window.matchMedia &&
    window.matchMedia('(prefers-color-scheme: dark)').matches) {
      $('.center-img').attr('src','/assets/img/friends/999.png');
      $('.big-main').attr('src','/assets/img/test/999.svg');
}


  </script>
</body>

</html>
<?php 
  session_start();
  if(isset($_SESSION['currentuserid']))
  {
     header("Location: account");
}
     ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Zaan- Login & Signup</title>
  <meta content="Find out what people think about you. Confess your feelings and get answers on any topic!" name="descriptison">
  <meta content="Ask, Confess, complements, slambook, slam, questions abut me, answer anonymously, ask anonymously, anonymously, confessions" name="keywords">


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


    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/login_darkmode.css" rel="stylesheet">

    <style>
        @media (prefers-color-scheme: dark) {
        /* 
        -----------------------
        # LOGIN PAGE
        -----------------------
        */nav {
        background: #3d3d3d !important;
    }
        
        /* -----------------------
            # END LOGIN
        -------------------------- */
        }
    </style>

</head>

<body>


    <!-- ======= Header ======= -->
     <div class="logo d-block d-lg-none">
      </div>


      <nav class="nav-menu d-none d-lg-block">
        <ul class="nav-inner">
               <li class=""><a href="home">Home</a></li>
                  <li><a href="home#services">About</a></li>
                  <li class="nav-logo"><a href="home"><img src="assets/img/logo.png" alt="" class="img-fluid"></a></li>
                  <li class="active"><a  href="login">Login</a></li>
                   <li><a href="home#askquestion">Search</a></li>

                </ul>
            </nav>
            <!-- .nav-menu -->

        </div>
    </header>
    <!-- End Header -->

    <main id="main">

        <!-- ======= Signup Section ======= -->
        <section id="contact" class="contact section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Curious? Find Mates!</h2>
                    <p>Please sign up to let people find you, login to continue</p>
                </div>

                <div class="row">

                    <div class="col-lg-4">
                        <div class="info d-flex flex-column justify-content-center" data-aos="fade-right">
                            <div class="address">
                                <i class="icofont-login"></i>
                                <h4>Login</h4>
                                <p> Curious? Find Mates!</p>
                            </div>

                            <?php
                                if(isset($_COOKIE['user_name']))
                                {
                            ?>
                            <style>
                               .php-email-form img{
                                   width:150px;
                                   border-radius:50%;
                                   border:3px solid #7cc576;
                               }                             
                            </style>
                            <form  class="php-email-form" data-aos="fade-right">
                                    <div class="form-row">
                                        <div class="col-md-12 form-group text-center">
                                            <img src="<?php echo $_COOKIE['profile_pic']; ?>" alt="">          
                                        </div>  
                                        <div class="col-md-12 px-3 form-group">
                                  
                                        <input type="text" name="password" disabled class="form-control" placeholder="Your username"
                                        value ="<?php echo $_COOKIE['user_name']?>"
                                        data-rule="minlen:4" data-msg="Please enter at least 4 chars of password." />
                                            <div id = "login_help" class="validate"></div>
                                        </div>
                                   </div>
                                        <div class="text-center "><button id = "cookielogin" type="submit">Login as <span class="text-lowercase"><?php echo $_COOKIE['f_name']; ?></span></button></div>
                                </form>
                                    <small class ="text-center" >  <a href="logout">Not  <?php echo $_COOKIE['f_name']; ?>?</a></small>
                            
                            <?php
                            }else{
                            ?>
                                <form id = "loginform"   class="php-email-form" data-aos="fade-right">
                                    <div class="form-row">
                                        <div class="col-md-12 form-group">
                                        <input type="text" name="username" class="form-control" id="login_username" placeholder="Username /email" 
                                        data-rule="required" data-msg="Please provide an input." />
                                            <div class="validate"></div>
                                        </div>
                                        <div class="col-md-12 form-group">
                                    
                                        <input type="password" name="password" class="form-control" id="login_password" placeholder="Your Password" 
                                        data-rule="minlen:4" data-msg="Please nter at least 4 chars of password." />
                                            <div id = "login_help" class="validate"></div>

                                        </div>
                                    <div class="col-md-12 form-group">
                                        <div class="custom-control custom-checkbox">
                                        <input checked type="checkbox" name="signedin" class="custom-control-input" id="keepmesignedin" >
                                            <label class="custom-control-label" for="keepmesignedin">Keep me signed in</label>
                                        
                                        </div>
                                    </div></div>
                                        <div class="text-center"><button id = "loginbtn" type="submit">Login</button></div>
                                </form>
                                    <small class ="text-center" >  <a href="forgotpassword.php">Forgot password?</a></small>
                            <?php
                            }
                            ?>

                        </div>

                    </div>

                    <div id="register" class="col-lg-8 mt-5 mt-lg-0">

                        <form action="forms/authentication.php" name="create_account" method="post" id="registerform" role="form" class="php-email-form" data-aos="fade-left">
                            <div class="address">
                                <h4>SignUp</h4>
                                <p>Find your mates!</p>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Your First Name" data-rule="required" data-msg="Please provide an input." />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Your Last Name" data-rule="required" data-msg="Please provide an input." />
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input type="text" title = "Please dont include spaces and other special characters, follow( firstname_lastname )" class="form-control" name="username" id="username" pattern="[a-zA-Z0-9_]+" placeholder="Your Username" data-rule="required" data-msg="Please provide an input." />
                                    <div id="username-validate" class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="phonenumber" id="phonenumber" placeholder="Your Email" data-rule="email"  title="Please put a vaild email" data-msg="Please provide a vaild email." />
                                    <div id="emailvalid" class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Your Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars of password." />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder=" Confirm your Password" data-rule="match" data-msg="Confirm password doesnot match." />
                                <div class="validate"></div>
                            </div>



                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                            </div>

                            <div class="text-center"><button name="register" id="create_account" type="submit">Sign Up</button></div>
                        </form>
                    </div>

                </div>

            </div>

            </div>
        </section>
        <!-- End Signup Section -->

    </main>
    <!-- End #main -->


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


           


      
        // REGISTER  
        $(document).on('click', '#create_account', function() {
            var request = new XMLHttpRequest();
            request.open('GET', 'https://api.ipdata.co/?api-key=eca0458f84dd578dfa6f649bae55f9137da51a3194c9d89b430758f6');
            request.setRequestHeader('Accept', 'application/json');
            request.onreadystatechange = function() {
                if (this.readyState === 4) {
                    var data = JSON.parse(this.responseText);
                    console.log(data.region.toLowerCase())
                    
                    document.cookie = 'region='+ data.region.toLowerCase();
                }
            };
            request.send();

            $(this).find('.loading').slideUp();

        });

        $('#username').focusout(function() {
                    jQuery.ajax({
                    url: "forms/authentication.php",
                    type: "POST",
                    data: {
                        checkusername: true,
                        username: $('#username').val(),
                    },
                    success: function(data) {
                        if(data=="exits")
                        {
                            $('.contact .php-email-form .validate').css('display', 'block');
                            $('#username-validate').html('username already exists');
                            $('#create_account').prop('disabled',true);
                    }
                    else{
                            $('#username-validate').html('');
                            $('#create_account').prop('disabled',false);
                        }
                    }
            });
            

        });

        $('#phonenumber').focusout(function() {
                 jQuery.ajax({
                    url: "forms/authentication.php",
                    type: "POST",
                    data: {
                        checkemail: true,
                        email: $('#phonenumber').val(),
                    },
                success: function(data) {
                    if(data=="exits")
                    
                      {
                        $('.contact .php-email-form .validate').css('display', 'block');
                        $('#emailvalid').html('Email Address already exists');
                        $('#create_account').prop('disabled',true);

                    }else{
                        $('#emailvalid').html('');
                        $('#create_account').prop('disabled',false);
                    }
                }
            });
            

        });


        $('#loginbtn').click(function(){
                
            
             var str = $("#loginform").serialize();
             jQuery.ajax({
                url: "forms/authentication.php",
                type: "POST",
                 data: "login=true&" + str,
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



        $('#cookielogin').click(function(){
            
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
    
    </script>
</body>

</html>
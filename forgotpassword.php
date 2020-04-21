<?php 
  session_start();
  if(isset($_SESSION['currentuserid']))
  {
     header("Location: user/useraccount.php");
  }
 include('connection.php');
  $error =0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta conntent="width=device-width, initial-scale=1.0" name="viewport">

    <title>Knight Bootstrap Template - Index</title>
    <meta conntent="" name="descriptison">
    <meta conntent="" name="keywords">

    <!-- Faviconns -->
    <link href="assets/img/faviconn.png" rel="iconn">
    <link href="assets/img/apple-touch-iconn.png" rel="apple-touch-iconn">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxiconns/css/boxiconns.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">


    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/login_darkmode.css" rel="stylesheet">



    <style>
        @media (prefers-color-scheme: dark) {
          .card{
        background: #3d3d3d !important;
        border-color: #3d3d3d !important;
        box-shadow: 0 4px 15px -2px rgba(0, 0, 0, 0.5) !important;
    }
        }
    </style>

    
    <style>
      .card-title img{
        width: 110px;
        height: 110px;
        border-radius: 50%;
      }

      #sendresetlink{
        display: none;
      }

      
      

    .aligner {
      display: flex;
      justify-conntent: center;
      flex-direction: column;
    }



body{
  background: whitesmoke;
}

user i {
  font-size: 24px;
  color: #7cc576;
  float: right;
  width: 38px;
  height: 38px;
  border: 1px solid #7cc576;
  display: flex;
  justify-conntent: center;
  align-items: center;
  border-radius: 50px;
  transition: all 0.3s ease-in-out;
  }

.user{
  position: fixed;
  left: 20px;
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
    top: -5px;
    background: #fff;
    color: #7cc576;
    position: absolute;

    border-radius: 50%;
    padding: 9px;
    size: 33px;
    font-size: 26px;
    border-color: #7cc576;
    border: 1px solid;
}


#not{
  display: none;
}
    </style>

</head>

<body>


  

    <div class="aligner">
      
          <main id="main" class="mt-5">

     
  
  <?php 
        if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) 
          && ($_GET["action"]=="reset") && !isset($_POST["action"])){

          $key = $_GET["key"];
          $email = $_GET["email"];
          $curDate = date("Y-m-d H:i:s");
          $query = mysqli_query($conn,
          "SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';"
          );
          $row = mysqli_num_rows($query);

          if($row==""){
            $error = 1;
            
          ?>
            
        <section id="conntact" >
            <div class="conntainer">
                  <div class="row">
                    <div class="col-12">
                      <div class="card text-center p-3 mx-xl-5">
                            <div class="card-body">
                          <h5 class="card-title lead">INVALID / EXPIRED LINK</h5>
                              <p class="card-text px-4 text-center px-lg-5">
                                  <p class="text-center m-3 p-3">
                                  <small class="lead" style="font-size: 1rem">
                                      The link is invalid/expired. Either you did not copy the correct link
                                      from the email, or you have already used the key in which case it is 
                                      deactivated.                                   
                                    </small><br><br>
                                    <a href="forgotpassword.php" class="btn btn-outline-success">Reset Again</a>
                                </p>
                                </p>
                            </div>
                          </div>
                    </div>
                  </div>
            </div>
        </section>



          <?php

          }else{

          $row = mysqli_fetch_assoc($query);
          $expDate = $row['expDate'];
          if ($expDate >= $curDate){
       
    ?>
        <section id="conntact">
                <div class="conntainer">
                  <div class="row">
                    <div class="col-12">
                      <div class="card text-center p-3 mx-xl-5">
                             <div class="card-body">
                               <form id = "changepassword" >
                              <h5 class="card-title"><img id ="userimg" src="/assets/img/default.png" alt=""></h5>
                              <p class="card-text px-3 text-center px-lg-5">
                                <p class="text-left">

                                <!-- EMAIL ADDRESS -->
                                <input type="email" name="email"  hidden value ="<?php echo $_GET['email']; ?>">

                                  <small class="lead">
                                  New password
                                </small>
                                <input required type="password" name="password" id="newpass" class="form-control">
                                </p>
                                <p class="text-left">
                                  <small class="lead ">
                                 Confirm New password
                                </small>
                                <input required type="password" name="confirmpassword" id="confirmnewpass" class="form-control">
                                </p>
                                <p class="text-left">
                                  <small class="lead" style="color: red;" id="changenewpass-helptext"></small>
                                </p>
                              </p>

                              <div class="text-center">
                                <button id ="changeoldpassword" class="btn btn-outline-success">Change password</button>
                              </div>
                              </form>
                            </div>
                          
                          </div>
                    </div>
                  </div>
            </div>
        </section>

        <?php

          }else{
            $error = $error+1;
           

           ?>

            <section id="conntact" >
            <div class="conntainer">
                  <div class="row">
                    <div class="col-12">
                      <div class="card text-center p-3 mx-xl-5">
                            <div class="card-body">
                                <h5 class="card-title lead"> EXPIRED LINK</h5>
                              <p class="card-text px-4 text-center px-lg-5">
                                  <p class="text-center m-3 p-2">
                                  <small class="lead " style="font-size: 1rem">
                                     Sorry, the link is expired. You are trying to use the expired link which 
                                     was valid only for 24 hours.                    
                                    </small><br><br>
                                    <a href="forgotpassword.php" class="btn btn-outline-success">Reset Again</a>
                                </p>
                                </p>
                            </div>
                          </div>
                    </div>
                  </div>
            </div>
        </section>

           <?php
          }

          }
        }else{

          if($error==0)
          {
        ?>

        <section id="conntact" >
          <div class="user">
            <a class  href="index.php"><i id = "askquestion" class="icofont-home"></i></a>
          </div>
          </div>


            <div class="conntainer">
                  <div class="textleft">
                  
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="card text-center p-3 mx-xl-5">
                           
                            <div class="card-body">
                               <form id = "findaccount" >
                              <h5 class="card-title"><img id ="userimg" src="/assets/img/default.png" alt=""></h5>
                              <p class="card-text px-4 text-center px-lg-5">
                                <p id ="mainname" class="text-muted lead ">Find your account?</p>
                                  
                                  <p class="text-left">
                                  <small class="lead" style="font-size: .9rem">
                                      Please enter you email address or username to find
                                   </small>
                                  <input type="text" name="username" id="username" class="form-control">
                                </p>
                                </p>

                              <div class="text-center">
                                <button href="#" id ="sendlinkbtn" class="btn btn-outline-success">Find Account</button>
                               <button href="#" id ="sendresetlink" class="btn btn-outline-success mx-auto">Send Reset Link</button>
                                <button href="forgotpassword.php" id ="not" class="btn btn-outline-danger mx-auto mt-2"></button>
                              </div>
                              </form>
                            </div>
                          
                          </div>
                    </div>
                  </div>
            </div>
        </section>

        <?php
      }
        }
        ?>


        <!-- End Signup Section -->
        <form id ="resetlink">
      <input type="text" name ="useremail" hidden id="useremailid">

      </form>
    </main>
    

    </div>

    
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
    <div id="result"></div>
    <!-- Vendor JS Files -->
    <script>
      
    $('#sendlinkbtn').click(function(e){
       e.preventDefault();
      $('#sendlinkbtn').html('Finding your account...');
     var str = $("#findaccount").serialize();
      jQuery.ajax({
        url: "forms/authentication.php",
        type: "get",
         data: "findaccount=true&"+ str,
        success: function(data) {
             if (data == 'NO') 
             {
                
                $('#sendlinkbtn').css('display','block');
                $('#not').css('display','none');
                $('#sendlinkbtn').html('Not found');
            }
            else
            { 
                $('#result').html(data);

             }
            setTimeout(function(){ $('#sendlinkbtn').html('Not found, Find again?'); }, 2000);

        }
    });
    });
    
     $('#sendresetlink').click(function(e){
         e.preventDefault();
        $('#sendresetlink').html("Sending!");
       var str = $("#resetlink").serialize();
        jQuery.ajax({
          url: "forms/authentication.php",
          type: "POST",
           data: "sendlink=true&"+ str,
          success: function(data) {
             if(data = 'SUCCESS')
             {
                $('#sendresetlink').html('Your link is sent, check your email!');
                setTimeout(function(){
                   window.location = "forgotpassword.php";
                 }, 2000);

             }else{
              alert('Some error has occured!');
             }
          }
    });
    });


$('#changeoldpassword').click(function(e){
         e.preventDefault();

        if($('#newpasss').val()!="" && $('#newpasss').val() == $('#confirmnewpass').val())
        {
          $('#changenewpass-helptext').html('Password not same!');
        }else{
            $(this).html('Changing...');

              var str = $("#changepassword").serialize();
              jQuery.ajax({
                url: "forms/authentication.php",
                type: "POST",
                 data: "changepassword=true&"+ str,
                success: function(data) {
                      window.location = "user/useraccount.php";
                }
              });

        }

    });


    </script>
</body>

</html>
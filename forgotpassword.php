<?php 
  session_start();
  if(isset($_SESSION['currentuserid']))
  {
     header("Location: user/useraccount.php");
  }


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


    <link href="assets/css/style.css" rel="stylesheet">
    
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
  justify-content: center;
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
  justify-content: center;
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

    </style>

</head>

<body>


  

    <div class="aligner">
      
          <main id="main" class="mt-5">

     
  
  <?php 
      if(isset($_GET['changepassword']))
      {
    ?>
        <section id="resetpass">
                <div class="container">
                  <div class="row">
                    <div class="col-12">
                      <div class="card text-center p-3 mx-xl-5">
                            <div class="card-body">
                               <form id = "forgetform" >
                              <h5 class="card-title"><img id ="userimg" src="/assets/img/default.png" alt=""></h5>
                              <p class="card-text px-4 text-center px-lg-5">
                                <p id ="mainname" class="text-muted lead ">Reset your password</p>
                              <p class="text-left mb-0"> 
                                 <small class="lead " style="font-size: 0.9rem !important">  Password</small>
                              </p>
                                  <input type="password" name="password" id="password" class="form-control ">
                                   <p class="text-left mb-0"> 
                                 <small class="lead " style="font-size: 0.9rem !important">  Confirm Password</small>
                              </p>
                                  <input type="password" name="confirmpassword" id="confirmpassword" class="form-control ">
                                  <p id ="">
                                    <small class="lead " id ="messagealert" style="font-size: 0.9rem !important; color:#dc3545"></small>
                                  </p>
                              </p>
                              <div class="text-center">
                                <button href="#" id ="changepass" type="submit" class="btn btn-outline-success">Change password</button>
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
        ?>

        <section id="contact" >
          <div class="user">
            <a class  href="index.php"><i id = "askquestion" class="icofont-home"></i></a>
          </div>
          </div>


            <div class="container">
                  <div class="textleft">
                  
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="card text-center p-3 mx-xl-5">
                          
                            <div class="card-body">
                               <form id = "changepassword" >
                              <h5 class="card-title"><img id ="userimg" src="/assets/img/default.png" alt=""></h5>
                              <p class="card-text px-4 text-center px-lg-5">
                                <p id ="mainname" class="text-muted lead ">Find your account?</p>
                              <p class="text-left mb-0"> 
                                 <small class="lead " style="font-size: 0.9rem !important">   Please enter you email address or username to find</small>
                              </p>
                                  <input type="text" name="username" id="userinput" class="form-control ">
                                    <input type="text" hidden name="emailaddress" id="userinput" value ="<?php $user;?>" class="form-control ">
                              </p>
                              <div class="text-center">
                                <button href="#" id ="sendlinkbtn" class="btn btn-outline-success">Find Account</button>
                               <button href="#" id ="sendresetlink" class="btn btn-outline-success mx-auto">Send Reset Link</button>
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
        ?>


        <!-- End Signup Section -->
        <form id ="resetlink">
      <input type="text" name ="useremail" hidden id="useremailid">
      <input type="text" name ="fullname" hidden id="useremailid">

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
      $('#sendlinkbtn').prop('disabled',true);
      $('#sendlinkbtn').html('Finding your account...');
     var str = $("#forgetform").serialize();
      jQuery.ajax({
        url: "forms/authentication.php",
        type: "get",
         data: "findaccount=true&"+ str,
        success: function(data) {
             if (data == 'NO') 
             {
                $('#login_help').html(data);
                $('#sendlinkbtn').css('display','block');
                $('#sendlinkbtn').prop('disabled',false);
                $('#sendlinkbtn').html('Not found');
                $("#forgetform").reset();
                setTimeout(function(){ $('#sendlinkbtn').html('Find Account'); }, 3000);
            }
            else
            { 
                $('#result').html(data);

             }
        }
    });
    });
    
     $('#sendresetlink').click(function(e){
         e.preventDefault();
        
       var str = $("#resetlink").serialize();
        jQuery.ajax({
          url: "forms/authentication.php",
          type: "POST",
           data: "sendlink=true&"+ str,
          success: function(data) {
              alert(data);
          }
    });
    });


$('#changepass').click(function(e){
         e.preventDefault();
        if($('#password').val()==$('#confirmpassword').val())
        {         
          $('#changepass').html('Changing ...')
                  var str = $("#changepassword").serialize();

                  jQuery.ajax({
                    url: "forms/authentication.php",
                    type: "POST",
                     data: "sendlink=true&"+ str,
                    success: function(data) {
                        alert(data);
                    }
            });
        }
        else{
          $('#messagealert').html('Password doesnot match');
        }
       
    });


    </script>
</body>

</html>
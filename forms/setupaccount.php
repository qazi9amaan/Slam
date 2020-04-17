
<?php 
session_start();
if(!isset($_SESSION['currentusername']))
{
    header("Location: /login.php");
}

 if(isset($_GET['accountcreated']))
    {
        include('../connection.php');
        $usr = $_SESSION['currentusername'];
        $sql = "SELECT * FROM users WHERE username ='$usr'";
        if ($result = mysqli_query($conn, $sql)) {
         while ($row = mysqli_fetch_assoc($result)){
             $_SESSION['currentuserid']=  $row["userid"];
             $_SESSION['currentimageurl'] = $row["profile_picture"];
              $_SESSION['currentuserbio'] = $row["bio"];
              $_SESSION['selected_questions']= $row["selected_questions"];
              $_SESSION['accountstatus']= $row["accountstatus"];
          }     
        }
    }


 if(!isset($_GET['accountcreated']))
{
        include('../connection.php');
        $usr = $_SESSION['currentusername'];
        $sql = "SELECT * FROM users WHERE username ='$usr'";
        if ($result = mysqli_query($conn, $sql)) {
         while ($row = mysqli_fetch_assoc($result)){
            $userid    =  $row["userid"];
            $fname    = $row["firstname"];
            $lname    = $row["lastname"];
            $username   = $row["username"];
            
          }     
        }
}
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Account</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">

    <link href="/assets/css/style.css" rel="stylesheet">

</head>
<style>
    #hero .fans i {
        font-size: 24px;
        color: #7cc576;
        float: left;
        width: 50px;
        height: 50px;
        background: #eaf6e9;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50px;
        transition: all 0.3s ease-in-out;
    }
    
    #hero .fans:hover i {
        background: #7cc576;
        color: #fff;
    }
    
    
    .active_btn i{
         background: #7cc576 !important;
        color: #fff !important;
    }

    #hero .fans {
        margin-top: 40px;
    }
    
    
    
    .profile_image {
        border-radius: 50%;
        border: 3px solid #7cc576;
         height: 160px;
          width: 160px;
            border-radius: 50%;
  border: 3px solid #7cc576;   
   }
    
    

    
        
.user-box {
    padding: 10px;
    position: relative;
}

.user-box form{display: inline;}

.editLink {
    border-radius: 50%;
    position:absolute;
    top: 65px;
    right: 63px;
    color: #7cc576;
    opacity:0;
    transition: all 0.3s ease-in-out 0s;
    -mox-transition: all 0.3s ease-in-out 0s;
    -webkit-transition: all 0.3s ease-in-out 0s;
    background: rgba(0, 0, 0, 0.23)
   -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.17);
    -moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.17);
    box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.17);
}
.img-relative:hover .editLink{opacity:1;}
.overlay{
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 2;
    border-radius: 50%;
    background: rgba(255,255,255,0.7);
}
.overlay-content {
    position: absolute;
    transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    top: 50%;
    left: 0;
    right: 0;
    text-align: center;
    color: #555;
    padding: 5px;
}
.uploadProcess img{
    max-width: 207px;
    border: none;
    box-shadow: none;
    -webkit-border-radius: 0;
    display: inline;
}

.editLink  i {
        font-size: 35px;
        color: #eaf6e9;
        float: left;
        width: 50px;
        height: 50px;
        background: #7cc576;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50px;
        transition: all 0.3s ease-in-out;
    }

main{
    color: #7cc576;
}
main input[type="password"],main input[type="text"], main textarea{
    color:#7cc576;
    border-color: #7cc576;

}

#username{
    border-color: transparent;
}

main textarea{
    border-color: #7cc576 !important;
}
main .h3 {
    color: #7cc576;
}

::-webkit-input-placeholder  { /* Edge */
  color: #7cc576;
}

:-ms-input-placeholder { /* Internet Explorer */
  color: #7cc576;
}

main ::placeholder {
  color: #7cc576;
}

main .form-control{
    color: #7cc576;
}
main .form-control:focus {
  border-color: #7cc576;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(124, 197, 118, 0.68);
}

#deletetbn{
    color: #fff;
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
    right: 27px;
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

<body>

 <?php 
            if(!isset($_GET['accountcreated'])){
            ?>
  

            <div class="user">
            <a class  href="/user/useraccount.php"><i id = "askquestion" class="icofont-home"></i></a>
          </div>
          </div>
<?php 
            }
            ?>

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div class="user-box">
                    <div class="img-relative">
                        <!-- Loading image -->
                        <div class="overlay uploadProcess" style="display: none;">
                            <div class="overlay-content"><img src="/assets/img/loading.gif"/></div>
                        </div>

                        <!-- Hidden upload form -->
                        <form method="post" action="upload.php" enctype="multipart/form-data" id="picUploadForm" target="uploadTarget">
                            <input type="file" name="picture" id="fileInput"  style="display:none"/>
                        </form>
                        <iframe id="uploadTarget" name="uploadTarget" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                        <!-- Image update link -->
                        <a class="editLink" href="javascript:void(0);">
                             <i class="icofont-arrow-up"></i>
                        </a>

                     <?php
                        if(isset($_SESSION['currentuserid'])) {
                      ?>
                          <img src="<?php echo $_SESSION['currentimageurl']; ?>" class = "profile_image" id="imagePreview">
                     <?php
                      }else{
                     ?> 
                         <img src="/assets/img/default.png" class = "profile_image" id="imagePreview">
                     <?php
                      }
                     ?>
                                <!-- Profile image -->
                            </div>
        
             </div>
                <div class="container">
                      <form method="post" action="authentication.php" id="setupform" >
                    <h1 id = "username" data-aos="zoom-in"><?php echo $_SESSION['currentusername']; ?> </h1>
                        <input hidden type="text" value ="" name ="ImageUrL" id = "image_upload_name">
                        <input hidden type="text" value ="<?php echo $_SESSION['currentusername']; ?>" name ="username" id = "image_upload_name">

                </div>
                                     <?php
                        if(isset($_SESSION['currentuserbio'])) {
                      ?>

               <div class="container">
                        <div class="col-12">
                           <textarea name = "bio" maxlength="50"rows ="4" data-aos="fade-up" type="text" id="user-bio" 
                           placeholder = "Write about yourself?" class="form-control "></textarea>
                       </div>
               </div>
    
        <?php
          }else{

        ?>
           <div class="container">
                        <div class="col-12">
                           <textarea name = "bio" maxlength="50"rows ="4" data-aos="fade-up" type="text" id="user-bio" 
                           placeholder = "Write about yourself?" class="form-control "><?php echo $_SESSION['currentuserbio']; ?></textarea>
                       </div>
               </div>


        <?php 

      }?>
           <div class="row" data-aos="fade-down">
                <div class="col-12 text-center">
                    <div class="fans active_btn">
                        <i type = "submit"  id = "uploadbtn" class="icofont-tick-mark "></i>
                    </div>
                </div>
            </div>

            <?php 
           if(!isset($_GET['accountcreated']))
            {
            ?>
            <div class="row" data-aos="fade-down">
                <div class="col-12 text-center">
                    <div class="fans">
                        <a href="#marker"><i type = "submit"  class="icofont-arrow-down"></i></a>
                    </div>
                </div>
            </div>

             <?php 
            }
            ?>
            </div>
        </form>
    </div>
    </section>
    <!-- End Hero -->


     <?php 
       if(!isset($_GET['accountcreated']))
        {
    ?>
    <main id="main">
                  <div id="marker"></div>

    <!-- =======  Section ======= -->
    <section id="about" class="about">

        <!-- GENERAl -->

      <div data-aos="fade-up" class="container">
        <p class="h3 mb-4">General Settings </p>
          <form id="generalsetting" name="generalsetting">
          <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input  name="username" type="text" readonly class="form-control-plaintext" id="username" value="<?php echo $username; ?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="firstname" class="col-sm-2 col-form-label">F-Name </label>
            <div class="col-sm-10">
              <input name="firstname"  type="text" class="form-control" id="firstname" value ="<?php echo $fname; ?>"  placeholder="First Name">
            </div>
          </div>

           <div class="form-group row">
            <label for="lastname" class="col-sm-2 col-form-label">L-Name </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="lastname" name="lastname" value ="<?php echo $lname; ?>" placeholder="Last Name">
            </div>
          </div>
           <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">About </label>
            <div class="col-sm-10">
              <textarea name="bio" id="bio_update" class="form-control"><?php echo $_SESSION['currentuserbio'] ; ?></textarea>
            </div>
          </div>
          <div class="text-right">
          <button disabled id="updatedetailsbtn" type="button" class="btn btn-outline-success text-right" >Update</button>
          </div>
          </form>
      </div>

      <!-- PRIVACY -->

          <div data-aos="fade-up" class="container">  
         <p class="h3 my-4">Privacy  Settings</p>
            <form name="privacysetting" id="privacysetting">
        
           <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">New Password </label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword" name="password"  placeholder="Password">
            </div>
          </div>
           <div class="form-group row">
            <label for="confirmpassword" class="col-sm-2 col-form-label">Confirm  Password </label>
            <div class="col-sm-10">
              <input  name="confirmpassword" type="password" class="form-control" id="confirmpassword" placeholder="Confirm password">
              <small id="passwordhelp" class="form-text text-muted"></small>

            </div>
          </div>
            <div class="text-right">
          <button  id = "updatepassword" type="button" class="btn btn-outline-success text-right">Update</button>
          </div>
        </form>
      </div>

 <!-- Account -->

          <div data-aos="fade-up" class="container">  
         <p class="h3 my-4">Account  Settings</p>
        
        <div class="form-group">
          <label style = "color:#dc3545" for="disabledTextInput">Delete My Account</label>
          <button id = "deletetbn" type="button" class="btn btn-danger form-control">Delete Account Permanently</button>
        </div>
        
        <div class="form-group">
          <label for="disabledTextInput">Return back</label>
          <button id="home" type="button" class="btn btn-outline-success form-control">Home</button>
        </div>

      </div>


            

          
      
    </section><!-- End Section -->

    
</main>
 <?php 
    }
    ?>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>
    <script src="/assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="/assets/vendor/venobox/venobox.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="/assets/vendor/aos/aos.js"></script>


    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

    <script>
        $(document).ready(function () {
            //If image edit link is clicked
            $(".editLink").on('click', function(e){
                e.preventDefault();
                $("#fileInput:hidden").trigger('click');
            });

            //On select file to upload
            $("#fileInput").on('change', function(){
                var image = $('#fileInput').val();
                var img_ex = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
                
                //validate file type
                if(!img_ex.exec(image)){
                    alert('Please upload only .jpg/.jpeg/.png/.gif file.');
                    $('#fileInput').val('');
                    return false;
                }else{
                    $('.uploadProcess').show();
                    $('#uploadForm').hide();
                    $( "#picUploadForm" ).submit();
                }
            });
        });

        //After completion of image upload process
        function completeUpload(success, fileName) {
            if(success == 1){
                $('#imagePreview').attr("src", "");
                $('#imagePreview').attr("src", fileName);
                $('#fileInput').attr("value", fileName);
                $('#image_upload_name').attr("value", fileName);
                
                $('.uploadProcess').hide();
            }else{
                $('.uploadProcess').hide();
                alert('There was an error during file upload!');
            }
            return true;
        }

        // UPDATING USER INFORMATION

        $('#uploadbtn').click(function(){
             var str = $("#setupform").serialize();
             jQuery.ajax({
                url: "authentication.php",
                type: "POST",
                 data: "update_details=true&" + str,
                success: function(data) {
                     if (data == 'OK') {
                             window.location = '/user/useraccount.php';
                        }
                    else{
                        alert(data);
                    }
                }
            });
        });


      function resetbtn(btnn,msg){
        $(btnn).html(msg);
        setTimeout(function(){ $(btnn).html('Update'); }, 5000);
      }
  $('.btn').on('click', function() {
      var $this = $(this);
    $this.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Loading...</span>')
     
  });



 $('#updatepassword').click(function(){
  if($('#inputPassword').val()==$('#confirmpassword').val())
  {
             var str = $("#privacysetting").serialize();
             jQuery.ajax({
                url: "authentication.php",
                type: "POST",
                 data: "updatepassword=true&" + str,
                success: function(data) {
                     if (data == 'OK') {
                           resetbtn('#updatepassword','Updated');
                        }
                    else{
                        resetbtn('#updatepassword','Try again!');
                    }
                }
            });
           }else{
              $('#passwordhelp').html('Confirm passwords doesnot match!');
              resetbtn('#updatepassword','Update');
           }
         
        });



 $('#updatedetailsbtn').click(function(){
        var str = $("#generalsetting").serialize();
             jQuery.ajax({
                url: "authentication.php",
                type: "POST",
                 data: "updateuserdetails=true&" + str,
                success: function(data) {
                     if (data == 'OK') {
                           resetbtn('#updatedetailsbtn','Updated');
                        }
                    else{
                        resetbtn('#updatedetailsbtn','Try again!');
                    }
                }
            });
          
         
 });

 $('#firstname').keyup(function(){
  $('#updatedetailsbtn').prop('disabled',false);
 });
 $('#lastname').keyup(function(){
  $('#updatedetailsbtn').prop('disabled',false);
 });
 $('#bio_update').keyup(function(){
  $('#updatedetailsbtn').prop('disabled',false);
 });


$('#deletetbn').click(function(){
        if(confirm('Do you really want to delete your account?')){

             jQuery.ajax({
                url: "authentication.php",
                type: "POST",
                 data: "deleteuser=true",
                success: function(data) {
                     if (data == 'OK') {
                           window.location='/logout.php';
                        }
                    else{
                        
                    }
                }
            });
           }else{
             resetbtn('#deletetbn','Delete Account Permanently');
           }
          
         
 });

$('#home').click(function(){
   window.location='/user/useraccount.php';
});


    </script>




</body>

</html>
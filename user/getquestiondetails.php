

<?php 
  session_start();
  include('../connection.php');
  if(!isset($_SESSION['currentusername']))
  {
     header("Location: /index.php");
  }else{
    if(!isset($_GET['id']))
    {
       header("Location: /user/useraccount.php");
    }
    $usr = $_GET['id'];
    $sql = "SELECT * FROM confessions WHERE confessionid='$usr'";
        if ($result = mysqli_query($conn, $sql)) {
         while ($row = mysqli_fetch_assoc($result)){
            $replier = $row["replier"];
            $udate =   $row["udate"];
            $msg =   $row["msg"];
            $sentby  =   $row["sentby"];
            $feedback  =   $row["feedback"];

            // UPADTING STATUS
            $sql2 = "UPDATE confessions SET STATUS = 'seen' WHERE confessionid='$usr';";
            mysqli_query($conn, $sql2);
            
          }     
        }else{
          header("Location: /user/useraccount.php");
        }
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Zaan- Confess details</title>
  <meta content="Find out what people think about you. Confess your feelings and get answers on any topic!" name="descriptison">
  <meta content="Ask, Confess, complements, slambook, slam, questions abut me, answer anonymously, ask anonymously, anonymously, confessions" name="keywords">


  <link class ="title-img" href="/assets/img/friends/friends-outline-green.png" rel="icon">
    <link class ="title-img" href="/assets/img/friends/friends-outline-green.png" rel="apple-touch-icon">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Knight - v2.0.0
  * Template URL: https://bootstrapmade.com/knight-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
    .user i {
        font-size: 25px;
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


.user:hover i {
    background: #7cc576;
    color: #fff;
}
 .user h4 {
  padding: 0 0 0 60px;
  font-size: 22px;
  font-weight: 600;
  margin-bottom: 2px;
  color: #7cc576;
}
 .user p {
  padding: 0 0 0 60px;
  margin-bottom: 0;
  font-size: 14px;
  color: #7cc576;
}
.user {
  margin-top: 40px;
}




  /* MOBILE NAVIGATION  */
      #header .logo img {
      padding: 0;
      margin: 0;
      max-height: 48px;
    }

     .profile_image_main{
      border-radius: 50%;
      border: 3px solid #7cc576;
      
      padding: 2px;
      width: 49px;

     }
  /* END MOBILE NAVIGATION  */

  /* DESKTOP NAVIGATION  */
     .large{
          border-radius: 50%;
          border: 3px solid #7cc576;
          padding: 2px;
          width: 86px;
          height: 75px !important;

         }

   /* END DESKTOP NAVIGATION  */


.nav-link{
    color: #7cc576;
    border: 1.3px solid #7cc576;
    margin: 2px;
}
.nav-pills .nav-link.active{
    background-color: #7cc576;
}

.tab-pane{
    background: #7cc576;
    padding-left: .2rem;
    padding-right: .2rem;
    color: #fafafa !important;
    padding-bottom: 1rem;
    
    }
    .tab-content small{
        color: #fafafa !important;
    }

    .body {
    color: #7cc576;
    overflow-y: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2; /* number of lines to show */
    -webkit-box-orient: vertical;
    }
    .sender
    {
        color: #7cc576;
        
    }
    .card{
        background: #7cc576;
        border-color: #7cc576;
        padding: 1rem;
        border-radius:.45rem ;
     
    }

 
.navbaritem{
    width: 60px;
    height: 60px;
}

section {
    padding: 10px 0;
    overflow: hidden;
}

.question-block{
    padding-left: .5rem;
    color: #ffff;
}
.question-block .answer{
    font-style:inherit;
}

.pinit{
  background: none;
}

.pinit .answer{
  color: #7cc576;
}
.pin i {
  background: #7cc576;
  color:  #fff;
  }
  
.emoji-title{
  position: relative;
top: 3px;
left: 12px;
color: #999;
}




  
</style>
<body>

<div class="modal fade bd-example-modal-sm" id="submitted" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <div class="container">
           <div class="row">
             <div class="col-12">
              <h4 style="color:#7cc576;" >
             Your post is successfully pinned!
             </h4> 
            </div>
           </div>
          </div>
      </div>
    </div>
  </div>
</div>


  <div class="modal fade bd-example-modal-lg" id="askmodel" 
  tabindex="-1" role="dialog" aria-labelledby="askmodel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        
          <div class="container">
           <div class="row">
             <div class="col-12 text-muted">
               
                
              <div class="col-12 mt-2 pl-0">
                <div class="user pin my-4 ml-0">
                   <a href="/user/useraccount.php"><i class="icofont-reply"></i></a>
                   <h4><?php echo $replier; ?></h4>
                    <p><?php echo $udate; ?></p>
                  </div>
            </div></div>
            <div class="container mb-2">
                 <div class="col-12 mb-1">
                        <!-- QUESTION -->
                        <div class="card pinit">
                          
                            <div class="question-block  py-2 text-justify">
                                <div class="answer">
                                   <?php echo $msg; ?>
                   
                                </div>
                            </div>
                           </div>
                        </div>
                        <!-- END QUESTION -->
                    </div>
            </div>
           
            <div class="row px-2">
                
              <div class="col-12 px-4">
                <textarea  id = "pincaption" type="text" class="form-control" placeholder="Write a reply?"></textarea>
              </div>
              <div class="col-12">
               <small class ="text-muted px-3" style="float: left;">
                   Seems intresting? Story it to your wall for next 24 Hours.
                 </small>
             </div>
             <div class="container">
                <div class="col-12 mt-3   text-lg-right text-md-right">
                  <a id = "pinit" data-dismiss="modal" href="#" class="btn btn-success rounded  ">Attach it!</a>
              </div>
             </div>
             </div>
           </div>
          </div>
      </div>
    </div>
  </div>



 <header id="header" class="d-flex align-items-center">
    <div class="container">

      <!-- The main logo is shown in mobile version only. The centered nav-logo in nav menu is displayed in desktop view  -->
      <div class="logo d-block d-lg-none">
        <a href="/account" class="img-fluid"><img class = "profile_image_main img-responsive" src="<?php echo $_SESSION['currentimageurl']; ?>" alt=""></a>
        &nbsp; &nbsp;<a><?php echo $_SESSION['currentusername']; ?></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul class="nav-inner">
          <li><a href="/<?php echo $_SESSION['currentusername']; ?> ">My wall</a></li>

          <li><a href="#">Share Link</a></li>

          <li class="nav-logo"><a href="/account"><img src="<?php echo $_SESSION['currentimageurl']; ?>" alt="" class="img-responsive profile_image_main large img-fluid"></a></li>

          <li><a href="/account">My Account</a></li>
                    
          <li><a href="/logout">Logout</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->




  <main id="main">

    <!-- =======  Section ======= -->
    <section id="about" class="about">
      <div class="container">
          <div class="row">
              <div class="col-6">
                <div class="user ">
                   <a id= "back" ><i class="icofont-reply"></i></a>
                   <h4><?php echo $replier; ?></h4>
                    <p><?php echo $udate; ?></p>
                  </div>
            </div>
            <div class="col-6 text-right ">
                <div class="user ml-0 ">
                   <a id ="pin_to_wall" data-postid="<?php echo $_GET['id']; ?>" href="#"><i  style = "float: right;" class="icofont-tack-pin"></i></a>
                  </div>
            </div>
          </div>
      </div>
      <br>
            <div class="container">
                <div class="row">
                    <!-- QUESTION CARD  -->
                    <div class="col-12 mb-1">
                        <!-- QUESTION -->
                        <div class="card">
                          
                            <div class="question-block py-2 text-justify">
                                <div class="answer">
                                   <?php echo $msg; ?>
                   
                                </div>
                            </div>
                           </div>
                        </div>
                        <!-- END QUESTION -->
                    </div>
                  </div>


                  <?php 
                    if($sentby != 0)
                    {
                  ?>
                    <!-- END QUESTION CARD -->
                    <div class = "container">
                    <div class="row">
                      
                       <div class="col-12 d-flex justify-content-center">

                       <?php 
                          if($feedback == 'eye-alt')
                          {                        
                        ?>
                            <div class="user feedbtn mr-3">
                            <a  data-sentto="<?php echo $sentby; ?>" data-feedback="liked the confession where you said " data-symbol="like" id= "feedbackbtn" ><i class="icofont-like"></i></a>
                            <br>
                            <small class="emoji-title">Like</small>
                            </div>
                            <div class="user feedbtn mr-3 ">
                            <a data-sentto="<?php echo $sentby; ?>" data-feedback="disliked the confession where you said" data-symbol="thumbs-down"  id= "feedbackbtn" ><i class="icofont-thumbs-down"></i></a>
                            <br>
                            <small class="emoji-title">Dislike</small>
                            </div>
                            <div class="user feedbtn mr-3">
                            <a data-sentto="<?php echo $sentby; ?>" data-feedback="loved the confession where you said" data-symbol="love"  id= "feedbackbtn" ><i class="icofont-ui-love "></i></a>
                            <br>
                            <small class="emoji-title">Love</small>
                            </div>
                            <div class="user feedbtn mr-3 ">
                            <a  data-sentto="<?php echo $sentby; ?>" data-feedback="felt that it was savage to say " data-symbol="ember" id= "feedbackbtn" ><i class="icofont-ember"></i></a>
                            <br>
                            <small class="emoji-title">Savage</small>
                            </div>
                            <div class="user feedbtn mr-3 ">
                            <a  data-sentto="<?php echo $sentby; ?>" data-feedback="felt that it was cute to say " data-symbol="qq" id= "feedbackbtn" ><i class="icofont-qq"></i></a>
                            <br>
                            <small class="emoji-title">Cute</small>
                            </div>
                       <?php 
                          }else{
                      ?>
                        <div class="user">
                            <a><i class="icofont-<?php echo $feedback; ?>"></i></a>
                          </div>
                      <?php 
                        }
                      ?>
                      

                       </div>
                       <div class="col-12 text-center mt-5">
                       <div class="d-flex justify-content-center" 
                       id="feedbackreply">
                       
                       </div>
                      </div>
                      </div>
                    </div>
                    <?php 
                    }
                  ?>

                   
                    <!-- END QUESTION CARD -->
                   
              
            
    </section><!-- End Section -->

    
</main>
    
  <input type="text" value="<?php  echo  $usr; ?>" id="confession_id" hidden>
  <a href="#main" class="back-to-top"><i class="icofont-simple-up"></i></a>

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

    function upload(cap)
    {
        $.ajax({
      url : "/user-helper",
      type:'post',
      data: "pinpost=true&cap="+cap+"&id="+$('#pin_to_wall').attr('data-postid'),
      success: function(data) {
        if(data=="OK")
        {
        window.location ="/account";
        }else{
          alert(data);
        }
      }
    });

    }

    $('#pin_to_wall').click(function(){
         $('#askmodel').modal('show');
    });

    $('#pinit').click(function(){
         upload($('#pincaption').val());
    });

    $('.feedbtn >a').click(function(){
     
      
      var sendto = $(this).attr('data-sentto');
      var feedback = $(this).attr('data-feedback');
      var symbol= $(this).attr('data-symbol');
      var msg = $('.answer').html();
      

      $.ajax({
      url : "/user-helper",
      type:'post',
      data: "addfeedback=true"+"&sendto="+sendto+"&feedback="+feedback+"&symbol="+symbol+"&msg="+msg+"&confession_id="+$('#confession_id').val(),
      success: function(data) {
        window.location ="/account";
      }
    });


    })
    
    $('.feedbtn > a>i').on('click', function() {

      var $this = $('.feedbtn > a>i');
      $this.attr('class','');
    $this.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Loading...</span>')
     
  });

    $('#back').click(function(){
      window.location ="/account";

    //     $.ajax({
    //   url : "/user-helper",
    //   type:'post',
    //   data: "deleteconfession=true",
    //   success: function(data) {
    //     if(data=="OK")
    //     {
    //             window.location ="/account";

    //     }else{
    //       window.location ="/account";
    //     }
    //   }
    // });
});


  $(document).on('click','#donebtn', function(){

    window.location ="/account";
    //     $.ajax({
    //   url : "/user-helper",
    //   type:'post',
    //   data: "deleteconfession=true",
    //   success: function(data) {
    //     if(data=="OK")
    //     {
    //             window.location ="/account";

    //     }else{
    //       window.location ="/account";
    //     }
    //   }
    // });
});
  </script>
</body>


    



</html>






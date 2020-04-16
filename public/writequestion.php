<?php 
  session_start();
  include('../connection.php');
  if(!isset($_GET['username']))
  {
     header("Location: /index.php");
  }else{
    $usr = $_GET['username'];
    $sql = "SELECT * FROM users WHERE username ='$usr'";
        if ($result = mysqli_query($conn, $sql)) {
         while ($row = mysqli_fetch_assoc($result)){
            $username = $row["username"];
            $fname =   $row["firstname"];
            $lname =   $row["lastname"];
            $profile = $row["profile_picture"];
            $fans =   $row["fans"];
            $bio =   $row["bio"];
            $questions =   $row["selected_questions"];
            $friends =   $row["friends"];
            $userid =  $row["userid"];
          }     
        }else{
          header("Location: /index.php");
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

  
</head>
<style>
   

.navbaritem{
    width: 75px;
    height: px;
}
.profile_image{
    border-radius: 50%;
    border: 3px solid #7cc576;

}
section {
    padding: 10px 0;
    overflow: hidden;
}
.user i {
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
.user #askquestion{
    right: -2px;
top: 42px;
    background: #7cc576;
    color: #fff;
    position: absolute;
}
.user #askquestion:hover  {
    background: #fff;
    color: #7cc576;
}
.user #home:hover  {
    background: #7cc576;
    color: #fff;
}
#header{
    height: auto;
    padding: 25px;
    border-bottom-right-radius: 2rem;
    border-bottom-left-radius: 2rem;
}
#header .logo img {
    padding: 0;
    max-height: 94px;
    margin-left: -30px;
}
.mobile-nav-toggle i {
    color: #7cc576;
    display: none;
    

}
.fans i {
    font-size: 16px;
    color: #7cc576;
float: left;
border: 1px solid #7cc576;
padding: 5px;
display: flex;
justify-content: center;
align-items: center;
border-radius: 50px;
transition: all 0.3s ease-in-out;
}
.fans span{
    margin-top: -11px;
    position: absolute;
    top: 13px;
    left: 45px;

}


.sendbtn{
    margin-top: 4rem;
align-content: center;
display: flex;
flex-direction: column;
align-items: center;
}
.sendbtn i{
    font-size: 35px;
    color: #fff;
    float: center;
    padding: 5px;
    height: 59px;
    background: #7cc576;
    width: 59px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50px;
    transition: all 0.3s ease-in-out;
}


.form-control::placeholder {
    color: #6c757d;
    opacity: 1;
}
.form-control {
    border: 1px solid rgb(124, 197, 118);
    border-radius: 0.55rem;
    padding: .85rem;
    margin: 0rem;
    height: 273px;
}
.form-control:focus {
    color: none;
    border-color: #7cc576;
    outline: 0;
    box-shadow: none;
}

.modal-dialog .modal-content {
    border: 0;
    margin: 1rem;
    padding: 1.2rem;
    border-radius: 0.45rem;
    -webkit-box-shadow: 0 5px 11px 0 rgba(0,0,0,0.18), 0 4px 15px 0 rgba(0,0,0,0.15);
    box-shadow: 0 5px 11px 0 rgba(0,0,0,0.18), 0 4px 15px 0 rgba(0,0,0,0.15);
}
.break-text  {
  word-wrap: break-word;
}

.mobile-nav-toggle{
  z-index: 500;
}

.user{
    z-index: 500;

}


/* PINNED POSTS */

#pinnedpostmodal{
  background: #333;
}
.pinnedpost-content {
    box-shadow: none !important;
    background-color: transparent; 
    border: none; 
}


.pin i {
        font-size: 18px;
color: #fff;
float: left;
width: 35px;
height: 35px;
background: #7cc576;
display: flex;
justify-content: center;
align-items: center;
border-radius: 50px;
transition: all 0.3s ease-in-out;
}

.pin  h4 {
      padding: 0 0 0 25px;
    font-size: 18px;
    top: 7px;
    position: absolute;
    color: #7cc576;
}

.modal-header {
     border-bottom:none;
      margin-bottom: -16px;

  
    }

.modal-footer{
  color: #fff;
          border-top:none;

    }

    #msgbox{
      border: 1px solid;
    border-radius: .75rem;
    border-color: #7cc576;
    background :#7cc576;
    padding-top: .65rem !important;
    }

  .lead {
    color: #fff;
    padding: 2px;
    font-size: 1.05rem;
    font-weight: 300;
}

.pin img {
            margin-left: -18px;
float: left;
width: 35px;
height: 35px;
background: #7cc576;
display: flex;
justify-content: center;
align-items: center;
border-radius: 50px;
transition: all 0.3s ease-in-out;
}

.caption{

    color: #7cc576;
    background: none;
}

.carousel-item.active{
  padding: 3px;
}


</style>
<body>

  <!-- STORIES -->
<div class="modal fade fade bd-example-modal-lg" id="pinnedpostmodal" tabindex="-1" role="dialog" aria-labelledby="pinnedpostmodalTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
    <div class="modal-content pinnedpost-content ">
    <div class="modal-header">
       <div class="container">
         <div class="col-12">
            <div class="pin">
             <a href="/user/useraccount.php?message"><img src="<?php echo $profile; ?>" alt=""></a>
             <h4> <?php echo $username; ?></h4>
            </div>
          </div>
       </div>
    </div>
      <div class="modal-body">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div id="posts">
                   
                </div>
            </div>
          </div> 
      </div>
    </div>
    </div>
  </div>





  <div class="modal fade bd-example-modal-sm" id="askmodel" 
  tabindex="-1" role="dialog" aria-labelledby="askmodel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        
          <div class="container">
           <div class="row">
             <div class="col-12">
             <h4 style="color:#7cc576;" >
               Do you want to reveal your identity?
             </h4> 
            </div>
            <div class="col-12 text-lg-right text-md-right">
                <a id = "revealname" data-dismiss="modal" href="#" class="btn btn-dark rounded ">Reveal</a>
                <a id = "stayhidden" data-dismiss="modal" href="#" class="btn btn-success rounded ">Anonymous</a>
            </div>
           </div>
          </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade bd-example-modal-sm" id="submitted" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <div class="container">
           <div class="row">
             <div class="col-12">
              <h4 style="color:#7cc576;" >
              Your confession was successfully sent!
             </h4> 
            </div>
           </div>
          </div>
      </div>
    </div>
  </div>
</div>


  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container">

      <!-- The main logo is shown in mobile version only. The centered nav-logo in nav menu is displayed in desktop view  -->
      <div class="logo d-block d-lg-none">
          <div class="container">
           
             <div class="row">
                <div class="col-3">
                    <a href="#" class="img-fluid"><img class = "profile_image" src="<?php echo $profile; ?>" alt=""></a>
                </div>
               
                <div class="col-9">
                    <div class="">
                        <div class="row">
                          <div class="col-12 text-left text-capitalize">
                            <?php echo $fname; ?>
                            <?php echo $lname; ?>
                          </div>
                            <div class="col-12 text-left">
                               @<a><?php echo $username; ?></a>
                            </div>
                            <div class="col-12 text-left">
                                <?php echo $bio; ?>
                            </div>
                            <div class="col-12 mt-2">
                               <div class="row">
                                   <div class="col">
                                    <div class="fans">
                                        <i class="icofont-star-shape"></i>
                                        <span><?php echo $fans; ?></span>
                                    </div>  
                                   
                                   </div>
                                   <div style = "margin-left: -5rem;" class="col  text-left">
                                    <div class="fans">
                                        <i class="icofont-ui-user-group"></i>
                                        <span><?php echo $friends; ?></span>
                                    </div>  
                                   </div>
                               </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
          
          </div>
       
        <div class="user">
         <a href="/user/useraccount.php#main"><i id = "home" class="icofont-home"></i></a> 
        <a href="showuser.php?username=<?php  echo $username;   ?>"><i id = "askquestion" class="icofont-speech-comments"></i></a>
          </div>

      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul class="nav-inner">
         
            

          <li class="nav-logo"><a href="#"><img class = "profile_image navbaritem" src="<?php echo $profile; ?>" alt=""/></a></li>
            <li>

                <div class="row">
                    <div class="col-12">
                            <?php echo $fname; ?>
                            <?php echo $lname; ?>
                    </div>
                    <div class="col-12" style="width: 250px;">
                            <?php echo $bio; ?>

                    </div>
                    <div class="col-12 mt-1">
                        <div class="row">
                            <div class="col">
                             <div class="fans">
                                 <i class="icofont-star-shape"></i>
                                 <span>
                                <?php echo $fans; ?>
                                 </span>
                             </div>  
                            
                            </div>
                            <div style = "margin-left: -5rem;" class="col  text-left">
                             <div class="fans">
                                 <i class="icofont-ui-user-group"></i>
                                 <span>
                                <?php echo $friends; ?>
                                 </span>
                             </div>  
                            </div>
                        </div>

                     </div>
                </div>
            </li>
            <li><a href="showuser.php?username=<?php  echo $username;   ?>"><?php echo $fname; ?>'s Slam</a></li>
        
          <li><a href="/user/useraccount.php#main">Home</a></li>
                  <?php
            if(isset($_SESSION['currentuserid'])) {
          ?>
                  <li><a href="/logout.php">Logout</a></li>
         <?php
          }else{
         ?> 
                  <li><a href="/login.html">Login</a></li>
            
         <?php
          }
         ?>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- =======  Section ======= -->
    <section id="about" class="about">
      <div class="container">
            <div class="col-12">
              </div>
      </div>
      <br>
            <div class="container mt-3 ">
                <div class="row px-1">

                    <!-- QUESTION CARD  -->
                    <div class="col-12 mb-1">
                      <form id = "askform" action="">
                          <textarea placeholder ="Curious? write an anonymous message." name="" id="" cols="30" rows="10" class="form-control"></textarea>
                      
                            <div class="container">
                                <div class="col-12 text-center">
                                    <div class="sendbtn">
                                      <a id = "ask" href="#"> <i class="icofont-paper-plane"></i></a>
                                    </div>
                                </div>
                            </div>
                      
                        </form>

                    </div>
                    <!-- END QUESTION CARD -->

                    

                </div>
               
            </div>
      

          
      
    </section><!-- End Section -->

    
</main>
    

<?php
    if(isset($_SESSION['currentuserid'])) {
  ?>
    <input  hidden value = "<?php echo $_SESSION['currentusername']; ?>" id = "user_id" class="text-muted"/>
 <?php
  }else{
 ?> 
    <input  hidden value = "a" id = "user_id" class="text-muted"/>
    
 <?php
  }
 ?>
  <input  hidden value = "<?php echo $userid; ?>" id = "masteruserid" class="text-muted"/>
   <input  hidden value = "" id = "storiescount" class="text-muted"/>


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
  


     function askby(user){
      $('#ask').prop('disabled', true);
          jQuery.ajax({
            url: "func/functions.php",
            type: "POST",
            data: "submitquestion=true&replier="+user+"&questioner="+$("#masteruserid").val()+"&msg="+$("textarea").val(),
            success: function(response){
              $('#submitted').modal('show');
               $('#ask').prop('disabled', false);
            },
            complete:function(response){
              $('#submitted').modal('hide');
              $('#submitted').on('hide.bs.modal', function (e) {
                location.reload();
              });
                                        }
           
           
          });
    }




      $('#revealname').click(function(){
        askby($('#user_id').val());
      });



    $('#stayhidden').click(function(){
       askby('Anonymous');
    });


     $('#ask').click(function(){
        
        if( $("textarea").val() == "" ||  $("textarea").val() == null)
        {
          alert("Can't be empty!");
        }else{


          if($('#user_id').val() =="a")
          {
                  askby('Anonymous');

          }else{
              $('#askmodel').modal('show');
          }
          }

      
    });
      
    

      // COUNTING THE STORIES
function getcountfor(string){
  var count = 0;
  $.ajax({
    url : "func/functions.php",
    type:'get',
    data: "storycount=true&id="+$('#masteruserid').val(),
    success: function(data) {
      console.log(data); 
      $('#storiescount').attr("value",data);
      if(data !=0)
      {
        $('#new_'+string).html(data);
        $('.profile_image_main').css('border','3px solid #ee0979'); 
        $('.profile_image').css('border','3px solid #ee0979'); 
        $('.large').css('border','3px solid #ee0979 ');  
      }
    }
  });
  return count;
}


function initialise_counter(){
getcountfor('stories');
}

initialise_counter();



// PINNED POSTS
function getallpinnedposts(){
    $.ajax({
    url : "func/functions.php",
    type:'get',
    data: "getpinnedposts=true&id="+$('#masteruserid').val(),
    success: function(data) {
          if(data != "NO")
          {
            $('#pinnedpostmodal').modal('show');
            $('#posts').html(data);
          }
    }
  });
}

// IMAGES CLICK FOR STORIES
$('.profile_image_main').click(function(e){
  e.preventDefault();
  if($('#storiescount').attr("value")>0)
  {
  getallpinnedposts();  
  }
  

});
$('.profile_image').click(function(e){
  e.preventDefault();
  if($('#storiescount').attr("value")>0)
  {
  getallpinnedposts();  
  }
  

});
$('.large').click(function(e){
  e.preventDefault();
  if($('#storiescount').attr("value")>0)
  {
  getallpinnedposts();  
  }
  

});


setInterval(function()
{
  initialise_counter();
} , 3000);


   


  </script>
</body>

</html>




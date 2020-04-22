<?php 
  session_start();
  include('../connection.php');

  if(!isset($_GET['username']))
  {
     header("Location: home");
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
            $region =  $row["region"];


            $sql2 = "DELETE FROM pinnedposts WHERE utime<=DATE_SUB(NOW(), INTERVAL 1 DAY)";
            $result2 = mysqli_query($conn, $sql2);






          }     
        }else{
          header("Location: home");
        }

       if((!isset( $username)) || (!isset($fname)) || (!isset($lname)) || (!isset($profile)) || (!isset($fans)) || (!isset($bio)) || (!isset($questions)) || (!isset($friends)) || (!isset($userid)))
       {
         header("Location: home");
       }

  }
   
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Zaan- Let's see who knows more?</title>
  <meta content="Find out what people think about you. Confess your feelings and get answers on any topic!" name="descriptison">
  <meta content="Ask, Confess, complements, slambook, slam, questions abut me, answer anonymously, ask anonymously, anonymously, confessions" name="keywords">


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

  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.15.0/css/mdb.min.css" rel="stylesheet">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.15.0/js/mdb.min.js"></script>
</head>
<style>




/* UI */
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

/* SLAM QUESTIONS */
.md-form input[type="text"]:not(.browser-default):focus:not([readonly]) {
    border-bottom: 1px solid #7cc576;
    -webkit-box-shadow: 0 1px 0 0 #7cc576;
    box-shadow: 0 1px 0 0 #7cc576;
}

.md-form textarea.md-textarea {
    padding: 2px;
    overflow-y: hidden;
    border-bottom: 1px solid #7cc576;
}
a{
    color: #7cc576;
}
.Answered{
    display: none;
    position: relative;
}

.Answered i{
    font-size: 16px;
    color: #7cc576;
    float: left;
    padding: 5px;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50px;
    transition: all 0.3s ease-in-out;
}

.progress-bar {
   
    background-color: #7cc576;
   
}

.progress
{
    background-color: initial;
}

.btn:hover, .btn:focus, .btn:active {
    outline: 0;
    -webkit-box-shadow: none;
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

.carousel-indicators li {
    
      
    background-color: #7cc576;
   width: .625rem;
    height: .625rem;
    cursor: pointer;
    border-radius: 50%;
  }

.carousel-indicators {
    top: -230%;
    position: absolute;
    right: 0;
  }
#posts :hover{
  cursor: pointer;
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
             <a href="account"><img src="<?php echo $profile; ?>" alt=""></a>
             <h4> <?php echo $username; ?></h4>
            </div>
          </div>
       </div>
    </div>
      <div class="modal-body">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div id="posts">
                   
                </div>
            </div>
          </div> 
      </div>
    </div>
    </div>
  </div>


<!-- Modal -->

<div class="modal fade bd-example-modal-sm" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        
          <div class="container">
           <div class="row">
             <div class="col-12">
             <h4 >
               Do you want to reveal your identity?
             </h4> 
            </div>
            <div class="col-12 mb-2">
              <input type="text" placeholder = "Let <?php echo $fname; ?> know your name." id = "identityname" class="form-control">
                      <span style = "color: red;" id ="supporttext" class="help-block"></span>

            </div>
            <div class="col-12 text-lg-right text-md-right">
                <a id = "revealname" href="#" class="btn btn-dark rounded ">Reveal</a>
            
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
              Your answers are successfully submitted!
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
            <a href="account"><i id = "home" class="icofont-home"></i></a>
            <a href="<?php  echo $username;?>/ask"><i id = "askquestion" class="icofont-paper-plane"></i></a>

            
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
            <li><a href="<?php  echo $username;   ?>/ask"> Ask <?php echo $fname; ?></a></li>

          <li><a href="/account">Home</a></li>
                <?php
            if(isset($_SESSION['currentuserid'])) {
          ?>
                  <li><a href="/logout">Logout</a></li>
         <?php
          }else{
         ?> 
                  <li><a href="login">Login</a></li>
            
         <?php
          }
         ?>

        </ul>

      </nav><!-- .nav-menu -->
        <div class="progress mt-3 mx-3" style="height: 2px; ">
    <div id = "progressbar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
  </div>
    </div>
    
  </header><!-- End Header -->
  
  <main id="main">
    
    <!-- =======  Section ======= -->
    <section id="about" class="about">
            <div class="container">
                    <form id ="answersform" action="" class="px-lg-5 mt-1">
                        <!-- ======= Frequently Asked Questions Section ======= -->
                        <section id="faq" class="faq">
                            <div class="container">
                    
                            <div class="section-title" data-aos="fade-up">
                                <h3>Shoot it!</h3>
                                <p>You can answer once only!</p>
                            </div>
                    
                            <ul id = "getallquestions" class="faq-list">
                                <!-- <div class="question">
                                    <li id = "hidefaq1" data-aos="fade-up">
                                        <a data-toggle="collapse" class="collapsed" href="#faq1f">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
                                        <div id="faq1f" class="collapse" data-parent=".faq-list">
                                            <div class="md-form">
                                                <input data-id = "faq1" type="text" id="form1" class="form-control">
                                            </div>
                                        </div>
                                        </li>
                                        <li  id = "showfaq1" class = "Answered">
                                            
                                        </li>
                                   </div>
                              -->

                                
                                
                            </ul>
                    
                            </div>
                        </section>
                                           <!-- End Frequently Asked Questions Section -->

                          <?php
                                  if(isset($_SESSION['currentuserid']) && $_SESSION['currentuserid'] ==  $userid)  {
                                ?>
                                        <div class="text-center">
                                              <a   href = "account" class="btn btn-success rounded" >Home</a>
                                             </div>

                               <?php
                                }else{
                               ?> 
                                             <div class="text-center">
                                              <a  id = "shoot" href = "#" class="btn btn-success rounded" >Shoot!</a>
                                             </div>
                                  
                               <?php
                                }
                               ?>


                      

                    </form>

            </div>
    </section>
    <!-- End Section -->
    </main>
  
  <?php
    if(isset($_SESSION['currentuserid'])) {
  ?>
    <input  hidden value = "<?php echo $_SESSION['currentusername']; ?>" id = "user_id" class="text-muted"/>
 <?php
  }else{
 ?> 
    <input  hidden value = "Anonymous" id = "user_id" class="text-muted"/>
    
 <?php
  }
 ?>
 <input  hidden value = "<?php echo $userid; ?>" id = "masteruserid" class="text-muted"/>
 <input  hidden value = "" id = "storiescount" class="text-muted"/>
  <input type="text" id ="questions" hidden value="<?php echo $questions; ?>">
  <input type="text" id ="region" hidden value="<?php echo $region; ?>">



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
    var question_ini = $("#questions").val();
    var selected_questions_list = getArray(question_ini);
    var region = $("#region").val();
    $.ajax({
        url : "/assets/json/"+region+".json",
        dataType:"json",
        type:'get',
        
        success: function(data)
        {
            var i =0;
            $(data.questions).each(function(index,value){
                if(jQuery.inArray(value.id, selected_questions_list)!== -1) {
                    
                  var t = '   <div class="question"><li id = "hidefaq'+i+'" ><a id = "showhandler" data-toggle="collapse" class="collapsed" href="#faq'+i+'">'+value.question+'<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a><div id="faq'+i+'" class="collapse" data-parent=".faq-list"><div class="md-form"><input title ="question" required name = "'+value.id+'" data-id = "faq'+i+'" type="text" id="question'+i+'" class="form-control"></div></div></li><li  id = "showfaq'+i+'" class = "Answered"></li></div>';
                   $('#getallquestions').append(t);
                   i =i+1;
                } 

               
            });
        }
    });


    function sendanswersby(user){
       setInterval(function() {
            if(progress<=100){
                  progress+=2;
                      $('#progressbar').css('width',progress+'%');
                      console.log(progress)
              }
              }, 20);

         var progress =0;
         var str = $("#answersform").serialize();
          jQuery.ajax({
            url: "public-helper",
            type: "POST",
            data: "submitanswers=true&replier="+user+"&questioner="+$("#masteruserid").val()+"&"+str,
            success: function(response){
              $('#submitted').modal('show');
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
       if($('#identityname').val() == "")
       {
        $('#supporttext').html("Please provide your name.");
       }else{
        $('#exampleModalCenter').modal('hide');
        sendanswersby($('#identityname').val());
       }
      });

    $('#stayhidden').click(function(){
       sendanswersby('Anonymous');
    });


    $('#shoot').click(function(){
      $('#progressbar').css('width','0%');
      if( $("[title*='question']").val() == "" ||  $("[title*='question']").val() == null )
      {
          alert("Fill values");
      }else{
        if($('#user_id').val() == "Anonymous")
      {
        $('#exampleModalCenter').modal(
        {
          backdrop : 'static',
          keyboard :false,
          show:true,
        });
      }else{
        sendanswersby($('#user_id').val());
      }
      }
    });

  
  // COUNTING THE STORIES
function getcountfor(string){
  var count = 0;
  $.ajax({
    url : "public-helper",
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
    url : "public-helper",
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


$(document).on('click', '#posts', function(e){  
   $('#carouselExampleIndicators').carousel('next');
});


$(document).on('focusout', '.form-control', function(e){  
  console.log('yes');
  var currentid =parseInt($(this).attr('id').substring(8));
  console.log(this)
   var newid = currentid+1;
   $('#faq'+newid).addClass('show');
console.log(newid)
   $('#faq'+currentid).removeClass('show');
   $('#hidefaq'+newid+' a').removeClass('collapsed');
  
  $('#question'+newid).focus();
   
});


$(document).on('change', '.form-control', function(e){  
  var currentid =parseInt($(this).attr('id').substring(8));
   var newid = currentid+1;
   
   $('#faq'+currentid).removeClass('show');
   $('#hidefaq'+newid+' a').removeClass('collapsed');
   $('#faq'+newid).addClass('show');

  $('#question'+newid).focus();
   
});



</script>
</body>

</html>




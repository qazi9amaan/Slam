<?php 
    session_start();
   
    if(!isset($_SESSION['currentusername']))
    {
    	     header("Location: home");
    }
    $sharelink = "zaan.ml/".trim($_SESSION['currentusername']);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Zaan- Account</title>
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
  <link href="/user/css/useraccount.css" rel="stylesheet">

 
</head>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">




<link href="/darkmode/dark-user.css" rel="stylesheet">

<body>


<!-- STARTUP -->
<div class="modal fade bd-example-modal-lg" id="hello" tabindex="-1" role="dialog" aria-labelledby="helloTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
          <div class="container">
               <div class="row text-center">
                <div class="col-12 ">
                <p class="h3">ZAAN</p>
                <p class="h5"> <small>Ask & confess </small> </p>
                </div>
                <div class="col-12 text-center mt-1">
                <a id = "profile" href="#"><img src="<?php echo $_SESSION['currentimageurl']; ?>" alt=""></a>
                </div>
                <div class="col-12 mt-2">
                 <p> Hola <?php echo $_SESSION['currentusername']; ?>!</p>
                </div>
               </div> 
               <div class="row text-center">
               <div class="col-12 ">
                <p> <small>We are happy to see you here <?php echo $_COOKIE['f_name']; ?>! Please get familiar to those points to get started with zaan.</small>  </p>
                </div>
               </div>
               <div class="row">
              <ul class="list-group mx-auto">
                <li class="list-group-item">
                  <div class="container">
                  <div class="row">
                  <div class="col-1" style = "padding-left: 20px;padding-top: 13px;">
                  <i class="icofont-star-shape"></i> 
                  </div>
                  <div class="col mt-1 ">
                   <small> are the anonymous replies to your profile, we call it as fans.</small>
                  </div>
                  </div>
                  </div>
                </li>
                <li class="list-group-item">
                <div class="container">
                  <div class="row">
                  <div class="col-1" style = "padding-left: 20px;padding-top: 13px;">
                  <i class="icofont-ui-user-group"></i>                   
                  </div>
                  <div class="col mt-1 ">
                   <small> are the replies to your profile from your friends.</small>
                  </div>
                  </div>
                  </div>
                </li>
                <li class="list-group-item">
                <small>Only the top <strong>8 questions will be shown to the users,</strong> please choose your questions and save your changes.</small>
                </li>
                <li class="list-group-item">
                  <small>All of your messages & answers gets deleted after 10 minutes once seen you can screenshot your favourites.</small>
                </li>

                <li class="list-group-item">
                  <small>You can pin a confessions as story to let people find it, visit the message to pin it with a reply.</small>
                </li>
                <li class="list-group-item">
                  <small>You can reset all your questions back to default by resetting the language. A minimum of 8 questions is required, 
                    please save your changes</small>
                </li>
                <li class="list-group-item">
                  <small>You can make changes to your profile in settings, changing the profile picture doesnot require you to save  changes</small>
                </li>
                <li class="list-group-item">
                  <small> We tend to store your privacy details encypted in your device for better and faster login</small>
                </li>
                <li class="list-group-item">
                  <small> 
                   If a registered user tends to send you a confession you will get option to feedback his confession and he will be notified about it!
                </small>
                </li>
              </ul>
               </div> 
               <div class="row text-center mt-1">
               <div class="col-12 ">
                <p> <small>Well we hope you will love zaan, thankyou <?php echo $_COOKIE['f_name']; ?>!</small>  </p>
                </div>
               </div>
               <div class="row text-center mt-1">
                  <div class="col-12">
                  <a id ="understandbtn" href="#" data-dismiss="modal" class="btn btn-success" >I understood!</a>

                  </div>
               </div>
         </div>
      </div>
    </div>
  </div>
</div>



<!-- LANGUAGES -->
<div class="modal fade bd-example-modal-lg" id="languagemodal" tabindex="-1" role="dialog" aria-labelledby="searchmodalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
          <div class="container">
                <ul id="language_holder" class="list-group">
                  </ul>        
         </div>
      </div>
    </div>
  </div>
</div>



<!-- SEARCH -->
<div class="modal fade bd-example-modal-lg" id="searchmodal" tabindex="-1" role="dialog" aria-labelledby="searchmodalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        
          <div class="container">
           <div class="row">
             
            <div class="col-11 my-2 ">
              <input type="search" name="" id ="large_search_box" class="form-control" placeholder="Use @ to search by username ...">
                <div id="large_searchresult" class="container">
                  
                </div>

            </div>
            <div style = "margin-top :.3rem !important;" class="col px-2 pt-2 ">
              <i style ="font-size: 15px;" class="icofont-search"></i>
            </div>
           </div>
          </div>
      </div>
    </div>
  </div>
</div>





<!-- SHARE IT -->
<div class="modal fade bd-example-modal-lg" id="sharemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center text-uppercase">
            <h5>ZAAN | Share it now!</h5>
          </div>

        </div>
      </div>
    </div>
      <div class="modal-body">
          <div class="container">
           <div class="row">
             <div class="col-4">
                  <div class="share_image pull-right ">
                 <a href="#"><img src="<?php echo $_SESSION['currentimageurl']; ?>" alt=""></a>
                </div>
            </div>
            <div class="col-7">
              <h4><?php echo $_SESSION['currentusername']; ?></h4>
              <p><?php echo $_SESSION['currentuserbio']; ?></p>
              <div class="container">
                <div id ="share_count_btn" class="count">
                </div>
              </div>
            </div>
           </div>

            <div class="row">
              <div id = "help_share" class="col-12 mt-5 text-justify">
                Please share your link with your friends, family, co-workers to get started with, see what they think about you!
              </div>
              <div class="col-12 mt-3">
                  <div class="input-group mb-3">
             
                <input id = "share_link" type="text" name="" class="form-control" value = "<?php  echo $sharelink; ?>" id="">
                
              </div>

              </div>
            </div>

          </div>
      </div>
      <div   class="modal-footer">
        <div class="container">
          <div class="row text-center">
              <div class="col-md-12">

                    <ul class="social-network social-circle">
                        <li><a href="whatsapp://send?text=Lets see how much you know about me? <?php  echo $sharelink; ?> " data-action="share/whatsapp/share" class="icowhatsapp" title="Whatsapp"><i class="icofont-whatsapp "></i></a></li>
                        <li><a href="http://www.instagram.com" class="icoinstagram" title="Instagram"><i class="icofont-instagram "></i></a></li>
                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php  echo $sharelink; ?>&quote=Lets see how much you know about me , visit at" target="_blank" class="icoFacebook" title="Facebook"><i class="icofont-facebook"></i></a></li>
                        <li><a href="https://twitter.com/intent/tweet?text=Lets see how much you know about me, visit at <?php  echo $sharelink; ?>  "class="icoTwitter" title="Twitter"><i class="icofont-twitter"></i></a></li>
                    </ul>       

        </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>






<!-- STORIES -->
<div class="modal fade fade bd-example-modal-lg" id="pinnedpostmodal" tabindex="-1" role="dialog" aria-labelledby="pinnedpostmodalTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
    <div class="modal-content pinnedpost-content ">
    
    <div class="modal-header">
       <div class="container">
         <div class="col-12">
            <div class="pin">
             <a href="/user/useraccount.php?message"><img src="<?php echo $_SESSION['currentimageurl']; ?>" alt=""></a>
             <h4> <?php echo $_SESSION['currentusername']; ?></h4>
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



<div class="loader">
    <img src="/assets/img/loading.gif" alt="Loader!">
</div>


      <!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
  <div class="container">

    <!-- The main logo is shown in mobile version only. The centered nav-logo in nav menu is displayed in desktop view  -->
    <div class="logo d-block d-lg-none">
      <div class="container">
        <div class="row">
          <div id="profilepicture"class="col-1 p-0 m-0 text-left">
            <a href="<?php echo $_SESSION['currentusername']; ?> " class="img-fluid">
            <img class = "profile_image_main img-responsive" src="<?php echo $_SESSION['currentimageurl']; ?>" alt="">
            <span id = "notification-number" class="badge badge-pill badge-gradient notification-number "></span>               

            </a>
          </div>
          
          <div id = "searchbtn" class="col-1 ml-4 pl-2 p-0 m-0 mt-2 mr-0 text-left">
            <a href=""> <i class="icofont-search"></i></a>
          </div>

          <div id ="searchdiv" style="margin-right: 5rem !important" class="col p-0 m-0 mt-2 mt-2 text-left">
          <a id ="showusername"><?php echo $_SESSION['currentusername']; ?></a>
          <input type="search" name="" id="showsearchbar" class="form-control" placeholder="Use @ to search by username">
          <div id="searchresult" class="container">
            
          </div>
          </div>
        </div>
      </div>
        

             
 <!-- &nbsp; -->
              <div class="user">
            <a class = "pinnedpostshowbtn" href=""><i id = "askquestion" class="icofont-tack-pin"></i></a>
          </div>
          </div>
        
          <nav class="nav-menu d-none d-lg-block">
            <ul class="nav-inner">
              <li><a id = "notification-navbarbtn" href="#"><i  class="icofont-notification"></i>
              <span id = "notification-number" class="badge badge-pill badge-gradient notification-number "></span>               

            </a></li>
              <li><a class="searchbtnlg" href="#">Search</a></li>
              <li><a class="pinnedpostshowbtn" href="#">Pinned Stories</a></li>
              <li><a class="sharebtn" href="#">Share Link</a></li>
              <li class="nav-logo"><a href="<?php echo $_SESSION['currentusername']; ?> ">
              <img src="<?php echo $_SESSION['currentimageurl']; ?>" alt="" 
              class="img-responsive profile_image_main large img-fluid">
              <!-- LARGE -->
                  

            </a></li>

              <li><a  href="account/settings">Settings</a></li>


                        <li><a href="<?php echo $_SESSION['currentusername']; ?> ">My wall</a></li>
                        <li><a href="/account/start">About</a></li>
              <li><a href="logout">Logout</a></li>

            </ul>
          </nav><!-- .nav-menu -->
         
</header><!-- End Header -->


<!-- NOTIFICATIONS -->



<main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about ">
      <div class="container">
            <div class="section-title" data-aos="fade-up">
                <ul class="nav nav-pills  nav-fill justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active b_slam" id="pills-create_slam-tab"
                         data-toggle="pill" href="#pills-create_slam" role="tab" 
                         aria-controls="pills-create_slam" aria-selected="true">My Slam</a>
                      </li>
                    <li class="nav-item">
                      <a class="nav-link b_answers " id="pills-answers-tab" data-toggle="pill" href="#pills-answers" role="tab" aria-controls="pills-answers" aria-selected="true">
                        Answers &nbsp;<span id = "new_messages" class="badge badge-pill badge-gradient "></span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link b_messages" id="pills-questions-tab" data-toggle="pill" href="#pills-questions" 
                      role="tab" aria-controls="pills-questions" aria-selected="true">
                      Messages &nbsp;<span id = "new_answers" class="badge badge-pill badge-gradient  "></span>
                    </a>
                    </li>
                   
                   
                  </ul>
                  
            </div>
                    <div class="row-fluid mx-2 my-0" data-aos="fade-up" aria-describedby="passwordHelpBlock">
              <small id="passwordHelpBlock" class="form-text text-muted">
              Please remember, all of your questions and answers will be deleted after 10 minutes once seen, we dont keep any of your data wih us. You can use other socail forums to reply to your audience
              </small>
            </div>
            <br>
            <div class="row-fluid" data-aos="fade-up">
                <div class="tab-content" id="pills-tabContent">


                    <!-- CREATE SLAM -->
                    <div class="tab-pane plain fade show active t_slam" id="pills-create_slam" role="tabpanel" aria-labelledby="pills-profile-tab">
                        
                       <div >
                            <!-- DATE -->
                          <div class="date ">
                           <div class="row">
                              <div class="col-8 p-2 mb-1">
                                <small id= "" class="form-text text-muted text-center">
                                  Please choose your questions.
                                </small>
                            </div>
                           
                            <div class="col p-2">
                            <button href = "#" id ="chooselanguage" class=" btn btn-outline-success btn-sm">Language</button>
                            </div>
                           </div>
                          </div>
                          <!-- END DATE -->

                           
                          <div id="getallquestions">

                          </div>
                    
                           
                            <div class="container text-center mt-2">
                              <div class="col-12">
                                <button href = "#"  class=  " save_choosed_questions btn btn-outline-success px-5 m-1">Save changes</button>
                              </div>
                              
                            </div>

                        </div>

                    </div>
                    <!-- END SLAM -->



                 <!-- START  ANSWERS -->
                    <div class="tab-pane fade  t_answers " id="pills-answers" role="tabpanel" aria-labelledby="pills-profile-tab">
                        
                        <div id="getuseranswers">
                           <div id="answers">
                           
                        </div>
                        </div>

                    </div>
                  <!-- END  ANSWERS -->
                  
                    <!-- QUESTION -->
                    <div class="tab-pane fade  t_messages" id="pills-questions" role="tabpanel" aria-labelledby="pills-contact-tab">

                      <div id="getuseranswers">
                       <div id="messages">
                           
                        </div>

                       
                    </div>


                    </div>
                    <!-- END QUESTIONS  -->
                  </div>
            </div>
       
      </div>
    </section><!-- End About Us Section -->

    
</main>

<main id="notifications-wrapper">
    <section id="about" class="about p-0">
      <div class="container">
        <br>
      <div class="notification-plane">
          <div class="mt-0">
            <div id = "wrapper" class="card">
            <div id = "notification-list" class="list-group">

            <!-- // GETTING NOTIFICATIONS -->
              


               </div>  
            
            </div>
          </div>
        </div>
      </div>
  </div>
</section>
</main>



    <!-- FROM DATABASE -->
    <input  hidden value = "<?php echo $_SESSION['currentuserid']; ?>" id = "user_id" class="text-muted"/>
    <input type="text" id ="questions" hidden value="<?php echo $_SESSION['selected_questions']; ?>">
    <input  hidden value = "<?php echo $_SESSION['region']; ?>" id = "region" class="text-muted"/>



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


<!-- DATA RETRIVAL -->
<script>




// LOADING QUESTIONS  
var question_ini = $("#questions").val();
var selected_questions_list = getArray(question_ini);

function readalllanguages (){
  console.log('Inside');
  $.ajax({
      url : "/assets/json/languages.json",
      dataType:"json",
      type:'get',
      success: function(data)
      {
          $(data.languages).each(function(index,value){
                 var t='<a href="#" id="changelanguage" data-region = "'+value.region+'" class="list-group-item list-group-item-action">'+value.language+'</a>';
                $('#language_holder').append(t);
          });
      }
  });

}



$(document).on('click', '#changelanguage', function(e){  
  $(this).attr('class','list-group-item list-group-item-action active');
  $(this).html("Changing Language");

  var region = $(this).data('region');
  document.cookie = 'region='+ region.toLowerCase();
  $.ajax({
		url : "user-helper",
		type:'POST',
		data: "changelanguage=true&region="+region,
		success: function(data) {
      $('#languagemodal').modal('hide');
      window.location = "/account";
		}
	});

  });





$(document).on('click', '#chooselanguage', function(e){ 
  $('#language_holder').html('');
 
  readalllanguages();
   $('#languagemodal').modal('show');
  });




$(document).ready(function () {
  $(".loader").css("display","block");
  $('#chooselanguage').html(capitalizeFirstLetter($('#region').val()));

  initialise_counter();
  notification_color();
  getnotificationCount();
      setInterval(function()
  {
    getnotificationCount();
    initialise_counter();
  } ,1000);
  
  // CHECKING LANGUAGE PRESENCE
  $.ajax({
      url : "/assets/json/languages.json",
      dataType:"json",
      type:'get',
      success: function(data)
      {
        var flag =0;
          $(data.languages).each(function(index,value){
                 if($('#region').val()== value.region)
                 {
                  flag = 1;
                 }
                 
                
          });
          if(flag ==0)
          {
            $('#region').attr("value","english");
            $('#chooselanguage').html("Default");
          }
      },
      complete:function(data)
      {
        $.ajax({
      
      url : "/assets/json/"+$('#region').val()+".json",
      dataType:"json",
      type:'get',
      success: function(data)
      {
        $(".loader").fadeOut(800);
        console.log(selected_questions_list)
          $(data.questions).each(function(index,value){
            console.log(index);
              if(jQuery.inArray(value.id, selected_questions_list)!== -1) {
                  
                 var t = '<div class="message my-2 questionid-'+index+'"><div class="col-12"><div class="row"><div class="col-10"><div  class="card card-plain p-4 questionid-'+index+'"><div class="body">'+value.question+'</div></div></div><div id = "insbtn"class="col-2 questionid-'+index+'" style="margin-left: -1rem;">';
                 t+= '<div class="show"><i data-questionid="'+index+'" data-visibility ="show"  data-questionidname= "'+value.id+'"  id = "select_question_btn" class="icofont-bin" ></i></div></div></div></div></div>';
                  $('#getallquestions').append(t);
              } 
             
          });
      }
  });
      }
  });

 


});

    
// DEACTIVATING BUTTONS
if(selected_questions_list.length<9){
   $('.save_choosed_questions').css('display','none');
   $('.b_slam').attr("class","nav-link b_slam");
   $('.b_answers').attr("class","nav-link active b_answers");
   $('.t_slam').attr("class","tab-pane plain fade  t_slam");
   $('.t_answers').attr("class","tab-pane fade  t_answers active show ");
   getallanswers();
}


// COUNTING FANS / FRIENDS
function getCount()
{
  $.ajax({
      url : "user-helper",
      type:'get',
      data: "getcount=true",
     success: function(data) {
          $('.count').html(data);
      }
  });
}
function getnotificationCount()
{
 var user_id = $('#user_id').val();
  $.ajax({
      url : "user-helper",
      type:'get',
      data: "notificationcount=true&userid=" + user_id,
     success: function(data) {
      if(data !=0)
			{
          $('.notification-number').html(data);
      }
      }
  });
}

// SAVING THE NEW QUESTION LIST
function upload_question_changes(list)
{
  $.ajax({
      url : "user-helper",
      type:'get',
      data: "savequestions=true&list=" + list,
     success: function(data) {

      if(data == "OK") {
         $("#questions").val(list);
      }
      else{
          alert(data);  
          
       }
        $('.save_choosed_questions').html("Changes Saved!");
         $('.save_choosed_questions').prop('disabled', false);
         location.reload();
      }
  });
}

$('.save_choosed_questions').click(function(e){
	e.preventDefault();
	$('.save_choosed_questions').html("Saving changes..");
	$('.save_choosed_questions').prop('disabled', true);
	var list = selected_questions_list.reduce(getStringFromArray);
	upload_question_changes(list);          
})

// loading answers
function getallanswers(){
	$.ajax({
		url : "user-helper",
		type:'get',
		data: "loadanswers=true",
		success: function(data) {
		$('#answers').html(data);
		}
	});
}

   
// loading messages
function getallmsgs(){
	$.ajax({
		url : "user-helper",
		type:'get',
		data: "loadmsgs=true",
		success: function(data) {
		$('#messages').html(data);
		}
	});
}
         
// COUNTING THE UNSEEN
function getcountfor(string){
	var count = 0;
	$.ajax({
		url : "user-helper",
		type:'get',
		data: string+"count=true",
		success: function(data) {
			if(data !=0)
			{
				$('#new_'+string).html(data);
			}else{
        $('#new_'+string).html("");
      }
		}
	});
	return count;
}

// NOTIFICATIONS
function initialise_counter(){
notification_color();
getcountfor('answers');
getcountfor('messages');
}

// ACCOUNT SETTINGS
$('#update_account').click(function(){
	window.location = 'account/settings';
});




// FUNCTION CALLERS

$('.b_messages').click(function(){
  initialise_counter();
	getallmsgs();
});

$('.b_answers').click(function(){
  initialise_counter();
      getallanswers();
});

function notification_color(){
    $.ajax({
        url : "user-helper",
        type:'get',
        data:"notificationcolor=true",
        success: function(data) {
          if(data !=0)
          {
            $
            $('.profile_image_main').addClass('coloured-notification'); 
            $('.profile_image').addClass('coloured-notification');  
            $('.large').addClass('coloured-notification'); 
          }else{
            $('.profile_image_main').removeClass('coloured-notification'); 
            $('.profile_image').removeClass('coloured-notification');  
            $('.large').removeClass('coloured-notification'); 
          }
        }
      });
}






// PINNED POSTS

function getallpinnedposts(){
    $.ajax({
    url : "user-helper",
    type:'get',
    data: "getpinnedposts=true",
    success: function(data) {
          $('#pinnedpostmodal').modal('show');
          $('#posts').html(data);
    }
  });
}

$('.pinnedpostshowbtn').click(function(e){
        e.preventDefault();

  if($('#askquestion').attr('class')=='icofont-tack-pin')
  {
    if ($('body').hasClass('mobile-nav-active')) {
        $('body').removeClass('mobile-nav-active');
        $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
        $('.mobile-nav-overly').fadeOut();
    }
  getallpinnedposts()
  }else if($('#askquestion').attr('class')=='icofont-home')
  {
    window.location = '\account';
  }else{

    // CLOSING THE SEARCH MENu
    $('#profilepicture').css('display','block');
   $('#searchbtn').css('display','block');
   $('#showusername').css('display','block');
   $('#showsearchbar').css('display','none');
    $('#showsearchbar').css('margin-left','0rem !important');
     $('#searchdiv').attr('style',' margin-right: 6rem!important;');
       $('#searchdiv').attr('class','col p-0 m-0 mt-2 text-left');
         $('#askquestion').attr('class','icofont-tack-pin');
         $('#searchresult').css('display','none');
         $('.mobile-nav-toggle').css('display','block');
         $('#askquestion').css('right','45px');
         

  }

});




// DELETE THE STORY
$(document).on('click', '#delete_pin', function(e){  
    e.preventDefault();
  
   $.ajax({
    url : "user-helper",
    type:'post',
    data: "deletestory=true&id="+$(this).data('postid'),
    success: function(data) {
       if(data=="OK")
        {
        }      
    }
  });
});


//SHARE IT
$(document).on('click', '.sharebtn', function(e){  
    e.preventDefault();
    getCount();
    if ($('body').hasClass('mobile-nav-active')) {
        $('body').removeClass('mobile-nav-active');
        $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
        $('.mobile-nav-overly').fadeOut();
    }
  $('#sharemodal').modal('show');
});

$(document).on('click', '#copybtn', function(e){  
    e.preventDefault();
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($('#share_link').text()).select();
    document.execCommand("copy");
    $temp.remove();
    $(this).html("Successfully copied!");


});

// SEARCHING

$('#searchbtn').click(function(e){
  e.preventDefault();
  $('#profilepicture').css('display','none');
  $('#searchbtn').css('display','none');
  $('#showusername').css('display','none');
  $('#showsearchbar').css('display','block');
  $('#searchresult').css('display','block');
  $('.mobile-nav-toggle').css('display','none');


 $('#showsearchbar').css('margin-left','2.2rem !important');
 $('#searchdiv').attr('style','margin-left: 0rem !important; margin-right: 3rem!important;');
  $('#searchdiv').attr('class','col p-0 m-0 mt-1 text-left');
 $('#askquestion').attr('class','icofont-close');
 $('#askquestion').css('right','1px');
});

$('#showsearchbar').keyup(function(){
   if($(this).val()!=""||$(this).val()!=null)
   {
      $.ajax({
    url : "user-helper",
    type:'get',
    data: "searchuser=true&value="+$(this).val(),
    success: function(data) {
      $('#searchresult').css( 'border','1px solid rgba(0,0,0,.125)');
        $('#searchresult').html(data);
    }
  });
   }else
    {
      $('#searchresult').html('');
    }
});


// NOTIFICATIONS
function getNotificationCount()
{
  return $('#notification-number').html();
}

// GETTING NOTIFICATIONS
function getallnotifications()
{
  $(".loader").css("display","block");
  $.ajax({
    url : "user-helper",
    type:'get',
    data: "searchnotifications=true",
    success: function(data) {
      $(".loader").fadeOut(300);
     $('#notification-list').html(data);
    }
  });
}

$('.profile_image_main').click(function(e){
  if(getNotificationCount()!=0)
  {
    e.preventDefault();
    $('.mobile-nav-toggle').css('display','none');
    $('#searchbtn').css('display','none');
    $('#showusername').css('margin-left','35px');

    $('#askquestion').attr('class','icofont-home');
    $('#askquestion').css('right','1px');
    $('#main').css('display','none');
    $('#notifications-wrapper').fadeIn(300);
      getallnotifications();
  }
});

$('#notification-number').click(function(e){

  if(getNotificationCount()!=0)
  {
    e.preventDefault();
  }
});

$(document).on('click', '#notification-navbarbtn' , function (e){
  if($('#notification-navbarbtn >i').attr('class')=='icofont-home')
  {
    window.location = '\account';
  }else{
  e.preventDefault();
  if ($('body').hasClass('mobile-nav-active')) {
        $('body').removeClass('mobile-nav-active');
        $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
        $('.mobile-nav-overly').fadeOut();
    }
  $('.mobile-nav-toggle').css('display','none');
    $('#searchbtn').css('display','none');
    $('#showusername').css('margin-left','35px');
    $('#notification-navbarbtn >i').attr('class','icofont-home');
    $('#askquestion').attr('class','icofont-home');
    $('#askquestion').css('right','1px');
    $('#main').css('display','none');
    $('#notifications-wrapper').fadeIn(300);
      getallnotifications();
  }
});


$('.searchbtnlg').click(function(){
  if ($('body').hasClass('mobile-nav-active')) {
      $('body').removeClass('mobile-nav-active');
      $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
      $('.mobile-nav-overly').fadeOut();
  }
     $('#searchmodal').modal('show');

})



$('#large_search_box').keyup(function(){
   if($(this).val()!=""||$(this).val()!=null)
   {
      $.ajax({
    url : "user-helper",
    type:'get',
    data: "searchuser=true&value="+$(this).val(),
    success: function(data) {
        $('#large_searchresult').html(data);
    }
  });
   }
});



$(document).on('click', '#posts', function(e){  
   $('#carouselExampleIndicators').carousel('next');
});


$('#understandbtn').click(function(){
            window.location='/account';
        });          

        $('#notification-modal').modal('show');

</script>

<?php if(isset($_GET['start'])){?>                   
<script>
  $('#hello').modal('show');
</script>
<?php }?>                   



</body>

</html>




			
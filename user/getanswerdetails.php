<?php 
  session_start();
  $main;
  include('../connection.php');
  if(!isset($_SESSION['currentusername']))
  {
     header("Location: /home");
  }else{
    if(!isset($_GET['answer']))
    {
       header("Location: /account");
    }
    $usr = $_GET['answer'];
    $sql = "SELECT * FROM answers WHERE answer_id='$usr';";
    

        if ($result = mysqli_query($conn, $sql)) {
         while ($row = mysqli_fetch_assoc($result)){
            $main = $row;
            $replier = $row["replier"];
            $udate =   $row["udate"];
            
            // UPADTING STATUS
            $sql2 = "UPDATE answers SET STATUS = 'seen' WHERE answer_id='$usr';";
            mysqli_query($conn, $sql2);

          }     
        }else{
          header("Location: /account");       
           }
  }
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Zaan- Answer Details</title>
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

 
</head>
<style>
    #about .user i {
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


#abour .user:hover i {
    background: #7cc576;
    color: #fff;
}

#about .user h4 {
  padding: 0 0 0 60px;
  font-size: 22px;
  font-weight: 600;
  margin-bottom: 2px;
  color: #7cc576;
}

#about .user p {
  padding: 0 0 0 60px;
  margin-bottom: 0;
  font-size: 14px;
  color: #7cc576;
}
#about .user {
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
</style>
<body>
 
<!-- ======= Header ======= -->
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

          <li><a href=" /account">My Account</a></li>
                    
          <li><a href="/logout">Logout</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->


  <main id="main">

    <!-- =======  Section ======= -->
    <section id="about" class="about">
      <div class="container">
            <div class="col-12">
                <div class="user ">
                   <a href="/account"><i class="icofont-reply"></i></a>
                    <h4><?php echo $replier; ?></h4>
                    <p><?php echo $udate; ?></p>
                    
                  </div>
            </div>
      </div>
      <br>
            <div class="container">
                <div id = "getallquestions" class="row">

                   
                            <!-- QUESTION CARD  -->
               <!--      <div class="col-12 mb-1">
                        <div class="card">
                            <div class="question-block">
                                <div class="question">
                                    <small>
                                        What was my childhood pet name?
                                    </small>
                                </div>
                                <div class="answer">
                                    Amaan
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- END QUESTION CARD -->

                </div>
               
            </div>
      

          
      
    </section><!-- End Section -->

    
</main>
      <input  hidden value = "<?php echo $_SESSION['currentuserid']; ?>" id = "user_id" class="text-muted"/>
    <input type="text" id ="questions" hidden value="<?php echo $_SESSION['selected_questions']; ?>">
    <input  hidden value = "<?php echo $_COOKIE['region']; ?>" id = "region" class="text-muted"/>


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
    var main = <?php echo json_encode($main); ?>;

    $(document).ready(function () {

           $.ajax({
            url : "/assets/json/"+$('#region').val()+".json",
                dataType:"json",
                type:'get',
                success: function(data)
                {
                    $(data.questions).each(function(index,value){
                        if(jQuery.inArray(value.id, selected_questions_list)!== -1) {
                            
                           var t =  '<div class="col-12 mb-1"><div class="card"><div class="question-block"><div class="question"><small>'+value.question+'</small></div><div id = "'+value.id+'"class="answer">'+main[value.id]+'</div> </div></div></div>';

                            $('#getallquestions').append(t);
                        } 
                       
                    });
                }
            });

        });


  </script>
</body>

</html>


  
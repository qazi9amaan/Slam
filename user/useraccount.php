<?php 
    session_start();
   
    if(!isset($_SESSION['currentusername']))
    {
    	     header("Location: home");
    }
    $sharelink = "".$_SESSION['currentusername'];


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
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<style>
          
        section{
          padding: 41px 0px;
        }

        .nav-link{
            color: #7cc576;
            border: 1.3px solid #7cc576;
            margin: 2px;
        }
        .nav-pills .nav-link.active{
            background-color: #7cc576;
        }

        .tab-pane{
            padding-left: .2rem;
            padding-right: .2rem;
            color: #fafafa !important;
            padding-bottom: 1rem;
            
            }
            .tab-content small{
                color: #7cc576 !important;
                font-size: 12px;
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
                border-radius:.45rem ;
                border-bottom-right-radius: 0rem;
                border-top-right-radius: 0rem;
            }

            #insbtn {
            border: 1px solid rgba(0,0,0,.125);
            display: flex;
            background: #ffff;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-bottom-right-radius: .45rem;
            border-left-color: transparent;
            border-top-right-radius: .45rem;
        }
          
            .show i{
                font-size: 2.3rem;
                color: #7cc576;
                margin-left: -1.3rem;
                
            }


            .plain{
                background: #fff;
            }


            .plain .card{
              background: #7cc576;
              border-color: #7cc576;
            }
            .plain .card .body{
            color: #fff;
            }

            .plain #insbtn{
                background: #7cc576;
            }

            .plain #insbtn i{
                color: #fff;
            }

            .plain .body {
            overflow-y: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3; /* number of lines to show */
            -webkit-box-orient: vertical;
            }

            .plain .date small{
                color: #7cc576 !important;
            }

            #select_question_btn{
                cursor: pointer;
            }

          .profile_image {
                border-radius: 50%;
                height: 160px;
                width: 160px;
                margin-bottom: 3rem;
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
          .break-text h1 {
            word-wrap: break-word;
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
          .user #askquestion {
              right: 45px;
              top: -5px;
              background: #fff;
              color: #7cc576;
              position: absolute;
          }
          .user #askquestion:hover  {
              background: #7cc576;
              color: #fff;
          }
          

          .share_card i {
            font-size: 50px;
            color: #7cc576;
            width: 70px;
            height: 70px;
            border: 1px solid #7cc576;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50px;
            padding: 2px;
            transition: all 0.3s ease-in-out;
            margin-top: 1rem;
          }

          .share_card i:hover {
          background: #7cc576;
              color: #fff;
          }


        .badge-gradient {
            color: #fff;
            background: linear-gradient(90deg, #ee0979, #ff6a00);
        }

        .mobile-nav-toggle{
          z-index: 500;
        }

        .user{
            z-index: 500;

        }
        .back-to-top{
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

        #delete_pin{
          font-size: 1.3rem;
            color: #fff;
            margin-left: 0rem;
        }


        /*=========================
          SHARING
        ================= */

        /* footer social icons */
        ul.social-network {
          list-style: none;
          display: inline;
          margin-left:0 !important;
          padding: 1px;
        }
        ul.social-network li {
          display: inline;
          margin: 0 5px;
        }


        /* footer social icons */

        .social-network a.icowhatsapp:hover {
          background: #fff;
        -webkit-background-clip: text;
                  background-clip: text;
          -webkit-text-fill-color: transparent;

        }

        .social-network a.icoinstagram:hover {
        background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
          -webkit-background-clip: text;
                  background-clip: text;
          -webkit-text-fill-color: transparent;

        }
        .social-network a.icoFacebook:hover {
          background-color:#3B5998;
          -webkit-background-clip: text;
                  background-clip: text;
          -webkit-text-fill-color: transparent;
        }
        .social-network a.icoTwitter:hover {
          background-color:#33ccff;
          -webkit-background-clip: text;
                  background-clip: text;
          -webkit-text-fill-color: transparent;
        }


        .social-network a.icoinstagram:hover i, .social-network a.icowhatsapp:hover i, .social-network a.icoFacebook:hover i, .social-network a.icoTwitter:hover i {
          color:#fff;
        }
        a.socialIcon:hover, .socialHoverClass {
          color:#44BCDD;
        }

        .social-circle li a {
          display:inline-block;
          position:relative;
          margin:0 auto 0 auto;
          -moz-border-radius:50%;
          -webkit-border-radius:50%;
          border-radius:50%;
          text-align:center;
          width: 50px;
          height: 50px;
          font-size:20px;
        }
        .social-circle li i {
          margin:0;
          line-height:50px;
          text-align: center;
        }


        .social-circle i {
          color: #fff;
          -webkit-transition: all 0.8s;
          -moz-transition: all 0.8s;
          -o-transition: all 0.8s;
          -ms-transition: all 0.8s;
          transition: all 0.8s;
        }


        #sharemodal .modal-footer {
          background: #7cc576;
          margin-bottom: -2px;
        }

        #sharemodal .modal-header{
          padding: 1.5rem;
        }

        .share_image img{
        float: left;
        width: 105px;
        height: 105px;
        background: #7cc576;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50px;
        border: 2px solid #7cc576;
        transition: all 0.3s ease-in-out;
        }

        #share_count_btn{
          color: #7cc576;
        }

        #share_count_btn i{
        size: 12px;
        }
        #share_count_btn .fans h4{
        position: absolute;
        left: 38px;
        top: 5px;
        size: 12px;
        }
        #share_count_btn .fans p{
        position: absolute;
        left:38px;
        top: 18px;
        size: 12px;
        }

        #sharemodal .modal-header h5{
          color: #7cc576;
        }

        #sharemodal .modal-content{
          background-color: #fff;
        }

        .btn-dark i{
          margin-left: 0px;
          color: #fff;
          font-size: 1.3rem;
        }

        .btn-dark {
            border-radius: .45rem;

          background-color:#7cc576;
          background: #7cc576;
          border-color: #7cc576;
        }

        .btn-dark:hover {
          background-color:#fff;
          background: #fff;
          border-color: #7cc576;
          color: #7cc576
        }

        .btn-dark:hover i {

          color: #7cc576
        }
        #share_link{
          border-color: #7cc576;
          color: #7cc576;
        }

        #sharemodal h4 , #sharemodal p , #help_share{
        color: #7cc576
        }

        .twitter-share-button{
          opacity: 0;}



        /* SEARCHBAR */

        #showsearchbar{
          display: none;
        }

        #searchresult{
          display: none;
          position: absolute;
          z-index: 500;
          background: #fff;
          border: 1px;
          background-clip: border-box;
        
          border-radius: .25rem;
        }
        #large_searchresult{
          position: absolute;
          background: #fff;
          border: 1px;
          background-clip: border-box;
          border: 1px solid rgba(0,0,0,.125);
          border-radius: .25rem;
        }

        #searchmodal i {
            padding: 9.87px;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            font-size: 17px;
            margin-left: -28px;
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

  #languagemodal .modal-content{
    background:none;
    border:none;
  }

    .share_card {
        color: #7cc576 !important;
    }

    .coloured-notification{
      border: 3px solid #ee0979 !important ;
    }
</style>


<link href="/darkmode/dark-user.css" rel="stylesheet">

<body>


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
            <div style = "margin-top :.3rem !important;" class="col px-3 pt-2 ">
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
        <h5>BE-KUS | Share it now!</h5>
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
                <div class="input-group-prepend">
                  <button id="copybtn" class="btn btn-dark" type="button">Copy to Clipboard</button>
                </div>
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






      <!-- ======= Header ======= -->
      <header id="header" class="d-flex align-items-center">
        <div class="container">

          <!-- The main logo is shown in mobile version only. The centered nav-logo in nav menu is displayed in desktop view  -->
          <div class="logo d-block d-lg-none">
            <div class="container">
              <div class="row">
                <div class="col-1 p-0 m-0 text-left">
                  <a href="<?php echo $_SESSION['currentusername']; ?> " class="img-fluid">
                  <img class = "profile_image_main img-responsive" src="<?php echo $_SESSION['currentimageurl']; ?>" alt="">
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
              <li><a class="searchbtnlg" href="#">Search</a></li>
              <li><a class="pinnedpostshowbtn" href="#">Pinned Stories</a></li>
              <li><a class="sharebtn" href="#">Share Link</a></li>


              <li class="nav-logo"><a href="<?php echo $_SESSION['currentusername']; ?> "><img src="<?php echo $_SESSION['currentimageurl']; ?>" alt="" class="img-responsive profile_image_main large img-fluid"></a></li>

              <li><a  href="account/settings">Settings</a></li>


                        <li><a href="<?php echo $_SESSION['currentusername']; ?> ">My wall</a></li>
              <li><a href="logout">Logout</a></li>

            </ul>
          </nav><!-- .nav-menu -->

        </div>
      </header><!-- End Header -->



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
              Please remember, all of your questions and answers will be deleted once seen, we dont keep any of your data wih us. You can use other socail forums to reply to your audience
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
  $('#chooselanguage').html(capitalizeFirstLetter($('#region').val()));

  initialise_counter();
  notification_color();
   
      setInterval(function()
  {
    initialise_counter();
  } ,1300);
  
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
if(selected_questions_list.length<8){
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
 var user_id = $('#user_id').val();
  $.ajax({
      url : "user-helper",
      type:'get',
      data: "getcount=true&userid=" + user_id,
     success: function(data) {
          $('.count').html(data);
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
  getallpinnedposts()
  }else{

    // CLOSING THE SEARCH MENu

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
          $('#pinnedpostmodal').modal('hide');
        }      
    }
  });
});


//SHARE IT
$(document).on('click', '.sharebtn', function(e){  
    e.preventDefault();
    getCount();
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
  $('#searchbtn').css('display','none');
 $('#showusername').css('display','none');
 $('#showsearchbar').css('display','block');
 $('#searchresult').css('display','block');
  $('.mobile-nav-toggle').css('display','none');


 $('#showsearchbar').css('margin-left','2.2rem !important');
 $('#searchdiv').attr('style','margin-left: 2.2rem !important; margin-right: 3rem!important;');
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


$('.searchbtnlg').click(function(){
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


</script>

                        





</body>

</html>




						
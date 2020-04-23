
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Zaan- Search</title>
  <meta content="Find out what people think about you. Confess your feelings and get answers on any topic!" name="descriptison">
  <meta content="Ask, Confess, complements, slambook, slam, questions abut me, answer anonymously, ask anonymously, anonymously, confessions" name="keywords">

    <!-- Favicons -->
    <link class ="title-img"  href="/assets/img/friends/friends-outline-green.png" rel="icon">
    <link  class ="title-img" href="/assets/img/friends/friends-outline-green.png" rel="apple-touch-icon">


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
    <link href="/assets/css/login_darkmode.css" rel="stylesheet">

    <style>
    @media (prefers-color-scheme: dark) {
        header ,input {
            background:   #2d2d2d !important;
            border: 1px solid #111 !important;
        } 
        .progress-bar{
            background: #999 !important;
         }
         .progress{
            background:   #1d1d1d  !important;
         }
         header i{
            color: #999 !important;
            border: 1px solid #4d4d4d !important;
            background: #4d4d4d !important;
        }

        #showmore{
            background: #4d4d4d !important;
            color: #222 !important;
            border: 1px solid #4d4d4d !important;
            box-shadow: 0 0 2rem .1rem #111 !important;
        }

        #home i{
            color: #999 !important;
            border: 1px solid #4d4d4d !important;
            background: #4d4d4d !important;
         }
         #show_home p{
            color: #999 !important;

         }

         header input[type="search"]:focus {
        color: #fafafa;
    }
  

    }

    header input[type="search"] {
            border-radius:0px;
            height :70px;
            position relative;
            background: #7cc576;
             color: #fafafa;
        }
    
    header input[type="search"]:focus {
        border-color:none;
        height :70px;
        position relative;
        box-shadow:none;
        background: #28a745;
        color: #fff;
    }
  
    header i{
        position: fixed;
        top: 13px;
        padding: 9px;
        color: #7cc576;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
        border: 1px solid #fafafa;
        border-radius: 50%;
        background: #fafafa;
    }
    
    #cancel{
        display :none;

    }

    .card{
        background: #fafafa;
        color: #7cc576;
        border-radius:.75rem;
    }
    
    #home i{
        padding: 7px;
        font-size: 39px;
        border: 1px solid #7cc576;
        border-radius: 50%;
    }
    #home_main{
        position: fixed;
        top: 13px;
        padding: 9px;
        color: #7cc576;
        right: 58px;
        font-size: 20px;
        cursor: pointer;
        border: 1px solid #fafafa;
        border-radius: 50%;
        background: #fafafa;
    }
    #show_results{
        display:none;
    }

    .progress-bar{
        background-color:#28a745;
    }

    .progress{
        display:none;
    }
    </style>
</head>

<body>

    
    <header>
    
    <nav class="navbar  fixed-top navbar-dark bg-dark m-0 p-0">
    <a href="/home"><i id ="home_main" class="icofont-home"></i></a>

    <?php if(isset($_GET['search']))
    {
    ?>
    <style>
        #cancel{
            display :block;
        }
        #search{
            display :none;
        }
    </style>
    <input type="search" class ="form-control" placeholder ="Search for user" value = "<?php echo $_GET['search']; ?>" id="searchvalue">
    <i id ="cancel" class="icofont-close    "></i>
    <i id ="search" class="icofont-search-1"></i>

    <?php
    }else{
        ?>
       
       <input type="search" class ="form-control" placeholder ="Search for user" name="" id="searchvalue">
        <i id ="search" class="icofont-search-1"></i>
        <i id ="cancel" class="icofont-close    "></i>

    <?php }?>
       
       

        </nav>

    </header>
   

    <main id="main">
        <section id="contact" class="contact section-bg">
        <div class="progress mt-0">
        <div class="progress-bar progress-bar-striped progress-bar-animated mt-0" role="progressbar" 
        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
        </div>

                                

        <div id ="show_results" class="container mt-3">
              <div id="getsearches">
              
              </div>      
            <div class="addmoresearches mx-0">
            </div>
            <div class="pagination mt-3">
            
                    <div class="col-12 text-center">
                        <a id = "showmore" class="btn btn-block btn-success">Show more</a>
                    </div>
            </div>
            </div>
        </div>

            <div id ="show_home" class="container-fluid mt-5">
                <div class="container">
                    <div class="card p-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <p class="lead text-justify">
                                        Please make a search to find the user by name, you can find using username also just
                                          add @ in prefix.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 text-center my-3">
                          <a id ="home" href="/home"> <i class="icofont-home"></i></a> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->
           <input type="text" hidden id="last">
            <input type="text" hidden id="total" >
            <input type="text" hidden id="counter" value ="0">

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

    function getsearchesfor(value,id,c){

             $('#show_home').css('display','none');
             $('#show_results').css('display','block');
        $.ajax({
            url : "/user/func/userfunctions.php",
            type:'get',
            data: "searchallusers=true&value="+value+"&id="+id+'&counter='+c,
            success: function(data) {
                $('#getsearches').append(data);
                if($('#counter').val()>=$('#total').val())
                {
                    $('.pagination').css('display','none');
                }else{
                    $('.pagination').css('display','block');
                }
            }
        });
    }


    $('#searchvalue').keyup(function(){
        $('#getsearches').html('')
        if($('#searchvalue').val()!=""||$('#searchvalue').val()!=null)
        {
            $('#search').css('display','none');
            $('#cancel').css('display','block');
            $('.progress').css('display','block');
            $("#last").attr("value","0");
            $("#total").attr("value","0");
            $("#counter").attr("value","0");
            getsearchesfor($('#searchvalue').val(),0, $("#counter").val());
        }
    });

    $('#cancel').click(function(){
        $('#search').css('display','block');
        $('#cancel').css('display','none');
        $('#show_home').css('display','block');
        $('#show_results').css('display','none');
        $('#progress').css('display','none');
        $('#searchvalue').val(" ");
    });

    $('#showmore').click(function(){
        if($('#searchvalue').val()!=""||$('#searchvalue').val()!=null)
        {
            $('#search').css('display','none');
            $('#cancel').css('display','block');
            $('.progress').css('display','block');
            getsearchesfor($('#searchvalue').val(),$('#last').val(),$("#counter").val());
        }
        });


    </script>

<?php if(isset($_GET['search']))
    {
    ?>
    <script>
            $('#search').css('display','none');
            $('#cancel').css('display','block');
            $('.progress').css('display','block');
            $("#last").attr("value","0");
            $("#total").attr("value","0");
            $("#counter").attr("value","0");
         getsearchesfor($('#searchvalue').val(),$('#last').val(),$("#counter").val());
    </script>
    <?php
    }?>
</body>

</html>
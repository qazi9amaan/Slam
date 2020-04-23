<?php
include('/var/www/html/connection.php');

session_start();
if(isset($_SESSION['currentuserid']))
{
  $Current_user_id =  $_SESSION['currentuserid'];
}
        

function getcountfor($conn, $user)
{
  $user = (int)$user;

  //DELETEING THE SEEN ANSWERS
  $delete_sql = "DELETE FROM answers WHERE questioner='$user' AND status ='seen'";
  mysqli_query($conn, $delete_sql);

  $sql = "SELECT fans, friends FROM users WHERE userid ='$user'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
          echo '
          <div  class="row" >
        <div class="col-6">
                <div class="fans">
                    <i class="icofont-star-shape"></i>
                    <h4>'.$row["fans"].'</h4>
                    
                </div>  
                </div>
            <div class="col-6">
                <div class="fans">
                    <i class="icofont-ui-user-group"></i>
                    <h4>'.$row["friends"].'</h4>
                    
                  </div>
            </div>
        </div>
        
          ';

      
      }
  }
}

function savequestionsfor($conn, $list, $user){
  $sql = "UPDATE users set selected_questions = '$list' WHERE userid ='$user'";
  if (mysqli_query($conn, $sql)) {
    $_SESSION['selected_questions']= $list;

    echo "OK";
  } else {
      echo "Error";
  }
}


    

// GET USER FANS AND FRIENDS COUNT
if(isset($_GET['getcount'])){
  $user = $_GET['userid'];
  getcountfor($conn, $user);
}

// UPLOADING THE SAVED QUESTIONS
if(isset($_GET['savequestions'])){
  $list = $_GET['list'];
  savequestionsfor($conn, $list, $Current_user_id);
}

function getallanswers($conn, $user){
  $showdate ="";
  //DELETEING THE SEEN ANSWERS
  $delete_sql = "DELETE FROM answers WHERE questioner='$user' AND status ='seen'";
  mysqli_query($conn, $delete_sql);

  $sql = "SELECT udate , DATE_FORMAT(udate, '%e %b, %Y') AS u_date FROM answers WHERE questioner='$user' ORDER BY udate DESC ";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $date = $row['udate'];
    if($date != $showdate)
    {
      echo '
          <!-- DATE -->
        <div class="date">
          <div class="col-12 p-2 mb-1">
              <small id= "" class="form-text text-muted text-center">
                  '.$row['u_date'].'
              </small>
          </div>
        </div>
      ';
      $sql2 = "SELECT answer_id, replier FROM answers WHERE questioner ='$user' and udate = '$date' ORDER BY utime DESC ";
      $result2 = mysqli_query($conn, $sql2);
      if (mysqli_num_rows($result2) > 0) {
          while($row = mysqli_fetch_assoc($result2)) {
            echo'

                <div class="message my-2">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-10">
                                        <div class="card  p-4">
                                            
                                            <div class="body">
                                                <span>'.$row['replier'].'</span>   
                                                answered your questions
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div id = "insbtn"class="col-2" style="margin-left: -1rem;">
                                        <div class="show">
                                            <a href = "account/answer/'.$row['answer_id'].'"><i class="icofont-eye-alt"></i></a>
                                        </div>

                                    </div>
                                </div>
                                
                            </div>
                        </div>

            ';
          }
      }
      $showdate = $date;
    }
    }
  }else{
      echo'
          <script>
            $(\'#pills-questions\').css("background","none");
            $(\'#share_card_id\').css("border-radius",".45rem");
          </script>
              <div class="row">
                  <div class="col-12">
                      <div id= "share_card_id"class="card mt-4 p-4">
                          
                          <div class="share_card">
                              You\'re all caught! Good things take time. Please wait while people find you again! Help people to find you share your link with your friends, family, coworkers and see what they think about you, share your link now.
                                  
                              <div class="col-6 mx-auto" style="display: flex;flex-direction: column; align-items: center;">
                                  <a class="sharebtn" href=""> <i class="icofont-share"></i></a>
                              </div>
                                  <div.col-6
                              <div class="col-6 mx-auto">
                                  <p class = "text-center mt-1"> bekus.ml/'.$_SESSION['currentusername'] .'</p>
                              </div>
                                      </div>
                      </div>
                  </div>
                  </div>
                  ';
  }
}

// LOADING ALL ANSWERS    
if(isset($_GET['loadanswers'])){
  getallanswers($conn, $Current_user_id);
}

function getallmsgs($conn, $user){
  $showdate ="";
  //DELETEING THE SEEN MESSAGES
  $delete_sql = "DELETE FROM confessions WHERE questioner='$user' AND status ='seen'";
  mysqli_query($conn, $delete_sql);
  $sql = "SELECT udate, DATE_FORMAT(udate, '%e %b, %Y') AS u_date FROM confessions WHERE questioner='$user' ORDER BY udate DESC ";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $date = $row['udate'];
    
    if($date != $showdate)
    {
        echo '
              <!-- DATE -->
            <div class="date">
              <div class="col-12 p-2 mb-1">
                  <small id= "" class="form-text text-muted text-center">
                      '.$row['u_date'].'
                  </small>
              </div>
            </div>
    ';
  $sql2 = "SELECT * FROM confessions WHERE questioner ='$user' and udate = '$date' ORDER BY utime DESC ";
  $result2 = mysqli_query($conn, $sql2);
  if (mysqli_num_rows($result2) > 0) {
      while($row = mysqli_fetch_assoc($result2)) {
      echo'
      <div class="message my-2">
              <div class="col-12">
                  <div class="row">
                      <div class="col-10">
                          <div class="card  p-4">
                              <div class="body">
                                  <span>'.$row['replier'].'</span> says   
                                  <span>
                                    '.$row['msg'].'
                                  </span>
                              </div>
                          </div>
                      </div>
                      <div id = "insbtn"class="col-2" style="margin-left: -1rem;">
                          <div class="show">
                            <a href = "account/message/'.$row['confessionid'].'"><i class="icofont-eye-alt"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        ';
      }
  }
  $showdate = $date;
    }
  }
  }else{
    echo'
    <script>
      $(\'#pills-questions\').css("background","none");
      $(\'#share_card_id\').css("border-radius",".45rem");
    </script>
        <div class="row">
            <div class="col-12">
                <div id= "share_card_id"class="card mt-4 p-4">
                    
                    <div class="share_card">
                        You\'re all caught! Good things take time. Please wait while people find you again! Help people to find you share your link with your friends, family, coworkers and see what they think about you, share your link now.
                            
                        <div class="col-6 mx-auto" style="display: flex;flex-direction: column; align-items: center;">
                            <a class = "sharebtn" href=""> <i class="icofont-share"></i></a>
                        </div>
                            <div.col-6
                        <div class="col-6 mx-auto">
                            <p class = "text-center mt-1"> localhost/'.$_SESSION['currentusername'] .'</p>
                        </div>
                                </div>
                </div>
            </div>
            </div>
            ';
    }
}




// LOADING ALL MESSAGES    
if(isset($_GET['loadmsgs'])){
  getallmsgs($conn, $Current_user_id);
}


// COUNTING THE UNSEEN REQUESTS
function getcount($conn, $user,$table)
{   
  $sql="SELECT COUNT(*) as t_number FROM $table  WHERE questioner  ='$user'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
          echo $row['t_number'];
      }
  }  

  $sql2 = "DELETE FROM pinnedposts WHERE utime<=DATE_SUB(NOW(), INTERVAL 1 DAY)";
  $result2 = mysqli_query($conn, $sql2);
}

if(isset($_GET['answerscount'])){
    getcount($conn, $Current_user_id,'confessions');
}

if(isset($_GET['messagescount'])){
    getcount($conn, $Current_user_id,'answers');
}

if(isset($_POST['deleteconfession'])){
    $user =$Current_user_id;
      $delete_sql = "DELETE FROM confessions WHERE questioner='$user' AND status ='seen'";
            mysqli_query($conn, $delete_sql);
            echo 'OK';
}

// ATATCHING THE POST TO WALL 
function pushtopined($conn,$replier,$user,$msg,$cap){
    $sql = "INSERT INTO pinnedposts(owner,questioner,message,caption)
    VALUES ('$user','$replier', '$msg','$cap')";
    if (mysqli_query($conn, $sql)) {
        //DELETEING THE SEEN MESSAGES
            $delete_sql = "DELETE FROM confessions WHERE questioner='$user' AND status ='seen'";
            mysqli_query($conn, $delete_sql);
            echo 'OK';
    } else{
        echo 'ERROR';
    }
}

if(isset($_POST['pinpost'])){
  // GETING POST DETAIL
  $usr = $_POST['id'];
  $cap = $_POST['cap'];
  $select = "SELECT * FROM confessions WHERE confessionid='$usr'";
  if ($post_detail = mysqli_query($conn, $select)) {
    while ($post = mysqli_fetch_assoc($post_detail)){
      $replier = $post["replier"];
      $udate =   $post["udate"];
      $msg =   $post["msg"];
          // UPADTING STATUS
      $sql2 = "UPDATE confessions SET STATUS = 'seen' WHERE confessionid='$usr';";
      mysqli_query($conn, $sql2);
      pushtopined($conn,$replier, $Current_user_id,$msg ,$cap);
  }
}
}

function getallpinnedposts($conn, $user)
{
  $active =1;

  $sql = "SELECT * FROM pinnedposts WHERE owner='$user' ORDER BY udate DESC ";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    if($active ==1 ){
        echo ' <div class="carousel-item active">
          <div id ="msgbox" class="post p-3 mt-3">
          <div class="container ">
          <div class="row">
              <div class="col-12">
                <p  class="lead text-justify ">
                '.$row['message'].'
                </p>
              </div>
          </div>
        </div>
          </div>
          <div class="container mt-2">
            <div class="row">
              <div class="col-11">
                <small class="caption text-lowercase">
                    <span class = "text-lowercase" style="color: #fff;">@'.$row['questioner'].' </span>&nbsp;
                    '.$row['caption'].'

                </small>
              </div>
                <div class="col-1">
                <small class="text-right text-lowercase">
                <a href="#"> <i data-postid ='.$row['post_id'].' id ="delete_pin" class="icofont-bin"></i></a>
                </small>
              </div>
            </div>
          </div>
        </div>   
              ';
              $active=2;
          }else{
            echo ' <div class="carousel-item ">
          <div id ="msgbox" class="post p-3 mt-3">
          <div class="container ">
          <div class="row">
              <div class="col-12">
                <p  class="lead text-justify ">
                '.$row['message'].'
                </p>
              </div>
          </div>
        </div>
          </div>
          <div class="container mt-2">
            <div class="row">
              <div class="col-11 text-justify">
                <small class="caption text-lowercase">
                    <span class = "text-lowercase" style="color: #fff;">@'.$row['questioner'].' </span>&nbsp;
                    '.$row['caption'].'

                </small>
              </div>
              <div class="col-1">
                <small class="text-right text-lowercase">
                <a href="#"> <i data-postid ='.$row['post_id'].' id ="delete_pin" class="icofont-bin"></i></a>
                </small>
              </div>
            </div>
          </div>
        </div>   
              ';
        echo '<script>
          $(".carousel-indicators").append(\'<li data-target= "#carouselExampleIndicators"data-slide-to="'.$active.'" class=""></li>\');
        </script>';
        $active =  $active+1;
          }
      }
    }else{
      echo ' <div class="carousel-item active">
        <div id ="msgbox" class="post p-3 mt-3">
        <div class="container ">
        <div class="row">
            <div class="col-12">
              <p  class="lead text-justify ">
              You don\'t have any pinned post yet! Pin a post now in messages.
              </p>
            </div>
        </div>
      </div>
        </div>
      </div> ';
    }
}

if(isset($_GET['getpinnedposts'])){
    getallpinnedposts($conn, $Current_user_id);
}

// DELETING THE PINNEDPOST
if(isset($_POST['deletestory'])){
    $id = $_POST['id'];
    $sql2 = "DELETE FROM pinnedposts WHERE post_id = '$id'";
    $result2 = mysqli_query($conn, $sql2);
    if($result2)
    {
        echo "OK";
    }
}

// NOTIFICATION COLOR
if(isset($_GET['notificationcolor'])){
   $sql="SELECT COUNT(*) as t_number FROM notifications  WHERE user_id  ='$Current_user_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo $row['t_number'];
        }
    }  
}

//SEARCH USER
if(isset($_GET['searchuser'])){

  $name = $_GET['value'];

  if(substr($_GET['value'],0,1) =='@')
  {
    $name = substr($_GET['value'],1);
    if($name!= "" || $name != null)
    {


      $sql ="SELECT * FROM users u WHERE  username LIKE '".$name."%' LIMIT 4";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo '
              <div class="row">
        <div class="col-12">
          <div class="card" style="
                border-bottom-left-radius: 0rem;
                border-top: none;
                border-left: none;
                border-right: none;
                ">
                <div class="card-body" style="margin: 0;">
              <div class="container">
                    <div class="row">
                <div class="col-3 pl-0 ml-0">
                  <img src="'.$row['profile_picture'].'" alt="" style="border-radius: 50%;
                    WIDTH: 46px;
                    HEIGHT: 46px;
                ">
                </div>

                <div class="col" style="
                    padding: 0;
                ">
                  <div class="container">
                    <div class="row">
                      <div class="col-12 text-capitalize" style="
                            font-size: 17px;
                            margin-top: -7px;
                        ">
                        '.$row['firstname'].' '.$row['lastname'] .'
                      </div>
                      <div class="col-12" style="
                            margin-top: -4px;
                        ">
                            <small style="
                        ">   @ '.$row['username'].'</small>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
                <a href="/'.$row['username'].'" class="stretched-link"></a>
          </div>
        </div>
      </div>
            ';
        }
        echo '
        <div class="row">
    <div class="col-12">
      <div class="card" style="
            border-bottom-left-radius: 0rem;
            border-top: none;
            border-left: none;
            border-right: none;
            ">
            <div class="card-body" style="margin: 0;">
              <div class="container">
              <div class="col-12 mb-0">    
                    Show more ...
                </div>
              </div>
            </div>
            <a href="/fullsearch/'.$name.'" class="stretched-link"></a>
            </div>
          </div>
        </div>
          
    
      ';
    }else{
        echo '
    <div class="row">
        <div class="col-12">
          <div class="card" style="
                border-bottom-left-radius: 0rem;
                border-top: none;
                border-left: none;
                border-right: none;
                ">
                <div class="card-body" style="margin: 0;">
              <div class="container text-center">
                    <div class="row">
                            <div class="col-12 mb-0">    
                                        Sorry no results found!
                            </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>

    ';
            }}
  }else{

  if($name=='')
  {

  }else{
    $sql ="SELECT * FROM users u WHERE  firstname LIKE '".$name."%' OR lastname LIKE '".$name."%' LIMIT 4";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo '
              <div class="row">
        <div class="col-12">
          <div class="card" style="
                border-bottom-left-radius: 0rem;
                border-top: none;
                border-left: none;
                border-right: none;
                ">
                <div class="card-body" style="margin: 0;">
              <div class="container">
                    <div class="row">
                <div class="col-3 ml-0 pl-0">
                  <img src="'.$row['profile_picture'].'" alt="" style="border-radius: 50%;
                    WIDTH: 46px;
                    HEIGHT: 46px;
                ">
                </div>

                <div class="col" style="
                    padding: 0;
                ">
                  <div class="container">
                    <div class="row">
                      <div class="col-12 text-capitalize" style="
                            font-size: 17px;
                            margin-top: -7px;
                        ">
                        '.$row['firstname'].' '.$row['lastname'] .'
                      </div>
                      <div class="col-12" style="
                            margin-top: -4px;
                        ">
                            <small style="
                        ">   @ '.$row['username'].'</small>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
                <a href="/'.$row['username'].'" class="stretched-link"></a>
          </div>
        </div>
      </div>
            ';
        }

        echo '
        <div class="row">
    <div class="col-12">
      <div class="card" style="
            border-bottom-left-radius: 0rem;
            border-top: none;
            border-left: none;
            border-right: none;
            ">
            <div class="card-body" style="margin: 0;">
              <div class="container text-center">
              <div class="col-12 mb-0 text-center">    
                    Show more ...
                </div>
              </div>
            </div>
            <a href="/fullsearch/'.$name.'" class="stretched-link"></a>
            </div>
          </div>
        </div>
          
    
      ';


    }else{
        echo '
    <div class="row">
        <div class="col-12">
          <div class="card" style="
                border-bottom-left-radius: 0rem;
                border-top: none;
                border-left: none;
                border-right: none;
                ">
                <div class="card-body" style="margin: 0;">
              <div class="container">
                    <div class="row">
                            <div class="col-12 mb-0">    
                                        Sorry no results found!
                            </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>

    ';
    }
  }
    }  

}


if(isset($_POST['changelanguage'])){
  $region = $_POST['region'];
  $sql = "UPDATE users set region = '$region'  WHERE userid ='$Current_user_id';";
  $sql .= "UPDATE users set selected_questions = 'ABCDEFGHIJKLMNOPQRST'  WHERE userid ='$Current_user_id';";
  if (mysqli_multi_query($conn, $sql)){
  $_SESSION['selected_questions'] = 'ABCDEFGHIJKLMNOPQRST';
  $_SESSION['region'] = $_POST['region']; 
    echo "OK";
  } else {
      echo "Error";
  }
}


//SEARCH ALL USERS
if(isset($_GET['searchallusers'])){
  $name = trim($_GET['value']);
  $id = (int)$_GET['id'];
  $counter=(int)$_GET['counter'];
  if(substr($_GET['value'],0,1) =='@')
  {
    $name = substr($_GET['value'],1);
    if($name!= "" || $name != null)
    {
        $count ="SELECT count(*) as t_number FROM users u WHERE  firstname LIKE '".$name."%' ";
        $count_res = mysqli_query($conn, $count);
        if (mysqli_num_rows($count_res) > 0) {
            while($count = mysqli_fetch_assoc($count_res)) {
                $total= $count['t_number'];
            }
        }  

     $sql ="SELECT * FROM users u WHERE  userid >= '$id' AND  username LIKE '".$name."%' LIMIT 10";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $last_id ="";
        while($row = mysqli_fetch_assoc($result)) {
          echo '
          <div class="row mt-1">
              <div class="col-12">
                  <div class="card" style="">
                      <div class="card-body" style="margin: 0;">
                              <div class="container">
                                  <div class="row">
                                      <div class="col-2 text-right pl-0 ml-0">
                                          <img src="'.$row['profile_picture'].'" alt="" style="border-radius: 50%; WIDTH: 46px;HEIGHT: 46px;">
                                      </div>
                                          <div class="col p-0 m-0" >
                                              <div class="container">
                                                  <div class="row">
                                                      <div class="col-12 text-capitalize" style="font-size: 20px; margin-top: -7px;">
                                                      '.$row['firstname'].' '.$row['lastname'].'
                                                      </div>
                                                      <div class="col-12" style=" margin-top: -4px;">
                                                      <small>  @'.$row['username'].' </small>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                  </div>
                              </div>
                      </div>
                      <a href="/'.$row['username'].'" class="stretched-link"></a>
                  </div>
              </div>
          </div>
          ';
          $last_id = $row['userid']+1;
          $counter =$counter+1;
        }

        echo '
        <script>
        $("#last").attr("value","'.$last_id.'");
        $("#total").attr("value","'.$total.'");
        $("#counter").attr("value","'.$counter.'");
        </script>
          
        ';  

       
    }else
    {
      echo '
      <div class="row mt-1">
          <div class="col-12">
              <div class="card" style="">
                  <div class="card-body" style="margin: 0; font-size: 18px">
                          <div class="container">
                              <div class="row">
                                  <div class="col-12">
                                  <p class="lead">
                                  Sorry, no results found!
                                  </p></div> 
                              </div>
                          </div>
                  </div>
              </div>
          </div>
      </div>
      ';
      }
    }
  }else{

  if($name=='')
  {
  
  }else{

    $count ="SELECT count(*) as t_number FROM users u WHERE  firstname LIKE '".$name."%' ";
    $count_res = mysqli_query($conn, $count);
    if (mysqli_num_rows($count_res) > 0) {
        while($count = mysqli_fetch_assoc($count_res)) {
            $total= $count['t_number'];
        }
    }  

    $sql ="SELECT * FROM users u WHERE  userid >= '$id' AND firstname LIKE '".$name."%' OR lastname LIKE '".$name."%' LIMIT 10 ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $last_id ="";
        
        while($row = mysqli_fetch_assoc($result)) {
          echo '
          <div class="row mt-1">
              <div class="col-12">
                  <div class="card" style="">
                      <div class="card-body" style="margin: 0;">
                              <div class="container">
                                  <div class="row">
                                      <div class="col-2 text-right pl-0 ml-0">
                                          <img src="'.$row['profile_picture'].'" alt="" style="border-radius: 50%; WIDTH: 46px;HEIGHT: 46px;">
                                      </div>
                                          <div class="col p-0 m-0" >
                                              <div class="container">
                                                  <div class="row">
                                                      <div class="col-12 text-capitalize" style="font-size: 20px; margin-top: -7px;">
                                                      '.$row['firstname'].' '.$row['lastname'].'
                                                      </div>
                                                      <div class="col-12" style=" margin-top: -4px;font-size: 18px">
                                                      <small>  @'.$row['username'].' </small>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                  </div>
                              </div>
                      </div>
                      <a href="/'.$row['username'].'" class="stretched-link"></a>
                  </div>
              </div>
          </div>
          ';
          $last_id = $row['userid']+1;
          $counter =$counter+1;
        }
       
         echo '
         <script>
         $("#last").attr("value","'.$last_id.'");
         $("#total").attr("value","'.$total.'");
         $("#counter").attr("value","'.$counter.'");
         </script>
           
         ';  
      
         

    }else{
       echo '
      <div class="row mt-1">
          <div class="col-12">
              <div class="card" style="">
                  <div class="card-body" style="margin: 0;">
                          <div class="container">
                              <div class="row">
                                  <div class="col-12">
                                  <p class="lead">
                                  Sorry, no results found!
                                  </p></div> 
                              </div>
                          </div>
                  </div>
              </div>
          </div>
      </div>
  ';
    }
  }
   }  

}

?>

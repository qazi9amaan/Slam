<?php
        include('connection.php');
        session_start();

   
function savecookie($user,$auth)
{
  $cookie_username = $user;
  $cookie_password = $auth;
  setcookie('user_name', $cookie_username, time() + (86400 * 30), "/");
  setcookie('pass_word', $cookie_password, time() + (86400 * 30), "/");
}    
       


// LOGIN PROCESS
function setSession($conn,$user,$auth)
{
        $usr = $_SESSION['currentusername'];
        $sql = "SELECT * FROM users WHERE username ='$usr'";
        if ($result = mysqli_query($conn, $sql)) {
         while ($row = mysqli_fetch_assoc($result)){
             $_SESSION['currentuserid']=  $row["userid"];
             $_SESSION['currentimageurl'] = $row["profile_picture"];
              $_SESSION['currentuserbio'] = $row["bio"];
              $_SESSION['selected_questions']= $row["selected_questions"];
               $_SESSION['accountstatus']= $row["accountstatus"];
               if(isset($_POST['signedin']))
                {
                          savecookie($user,$auth);
                }
          }     
        }
}




if(isset($_POST['login'])){
    if(empty($_POST['username']) || empty($_POST['password']))
    {
       echo "The fields are empty!";
    }
    else
    {	
        $user = $_POST['username'];
        if(!isset($_COOKIE['pass_word']))
        {
          $auth = md5($_POST['password']);
        }else{
          $auth = $_POST['password'];
        }
        
        $query="select * from authenticate where username = '$user' or  emailaddress = '$user'";
         if ($result = mysqli_query($conn, $query)) 
         {
               while ($row = mysqli_fetch_row($result)) 
               {
                      if($row[2]==$auth)
                      {
                         $_SESSION['currentusername']=$row[1];
                         
                          setSession($conn,$user,$auth) ;                         
                          echo 'OK';


                      }else{
                        echo('Sorry wrong credential!');
                      }
                }
          }else{
              
                echo('No user found!');
                  
          }
            
    }
} 


// REGISTRATION PROCESS
 function presentindb($username,$conn)
 {
   $sql="select * from authenticate where username = '$username' or  emailaddress = '$username'";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) == 0) { 
     return false;
    }else{
     return true;
    }   

    
      
}

function create_account($username,$pass,$firstname,$lastname,$phonenumber,$conn)
{
  $pass =md5($pass);
  $sql = "INSERT INTO authenticate(username,password,firstname,emailaddress)
    VALUES ('$username', '$pass', '$firstname', '$phonenumber');";
  $sql .= "INSERT INTO users(username,firstname,lastname)
  VALUES ('$username', '$firstname', '$lastname');";
  if (mysqli_multi_query($conn, $sql)) {
    return true;
  } else {
      return false;
  }
}



if(isset($_POST['checkusername']))
{
  $username = $_POST['username'];
  if($username != "")
  {
     if(presentindb($username,$conn))
      {
        echo "exits";
      }  
  }   
}

if(isset($_POST['checkemail']))
{
  $email = $_POST['email'];
 if($email != "")
  {
     if(presentindb($email,$conn))
      {
        echo "exits";
      }  
  }   
}



if(isset($_POST['register_now']))
{

 if(empty($_POST['username']) || empty($_POST['phonenumber']) || empty($_POST['password']) )
 {
   echo 'empty!';
 }
 else{
   $username = $_POST['username'];
   $pass = $_POST['password'];
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $phonenumber = $_POST['phonenumber'];
   
   
    if(create_account($username,$pass,$firstname,$lastname,$phonenumber,$conn))
    {
        $_SESSION['currentusername']=$_POST['username'];
          echo 'success';
    }
    else
    {
      echo 'exists';
    }
 }
}

   

 

// UPDATING USER DEATILS
function updateaccount($username,$bio,$conn)
{
    $sql = "UPDATE users set  bio = '$bio' WHERE username ='$username';";
    $sql .= "UPDATE users set  accountstatus ='complete'  WHERE username ='$username';";
    if (mysqli_multi_query($conn, $sql)) {
      return true;
    } else {
        return false;
    }
}
if(isset($_POST['update_details']))
{
    $bio = $_POST['bio'];
    $username = $_POST['username']; 
    if($bio == "" || $bio == null)
    {
      $bio= "Hey there!";
    } 
    if(updateaccount($username,$bio,$conn))
    {
         $_SESSION['currentuserbio'] = $bio;
         $_SESSION['status']='active';

          echo 'OK';
    }
    else
    {
        echo 'exists';
      }  
}





//UPDATING USER DETAILS

function execute($conn, $sql){
  
      if (mysqli_query($conn, $sql)) {
        echo 'OK';
        return true;
      } else {
          echo mysqli_error($conn);
                  return false;

      }
    

}


if(isset($_POST['updatepassword']))
{
  $user = $_SESSION['currentusername'];
  $password = $_POST['password'];
  $password = md5($password);
  $sql = "UPDATE authenticate set  password = '$password' WHERE username ='$user'";
   if(execute($conn, $sql))
   {
    if(isset($_COOKIE['user_name']) && $_COOKIE['user_name'] == $user )
    {
      $_COOKIE['pass_word'] = $password;
    }
   }
}

if(isset($_POST['updateuserdetails']))
{
  $user = $_SESSION['currentusername'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $bio = $_POST['bio'];  

  $sql = "UPDATE users set  firstname = '$firstname' , lastname = '$lastname' , bio = '$bio' WHERE username ='$user'";
   if(execute($conn, $sql))
   {
    $_SESSION['currentuserbio'] = $bio;
   }
}


if(isset($_POST['deleteuser']))
{
  $user = $_SESSION['currentusername'];

   // DELETING THE PREVIOUS PICTURE
            $delete_sql = "SELECT profile_picture FROM users WHERE username ='$user';";
               if ($result = mysqli_query($conn, $delete_sql)) {
                    while ($row = mysqli_fetch_assoc($result)){

                        if($row['profile_picture'] !='../assets/img/default.png')
                            unlink($row['profile_picture']);
                        }
                    }

  $sql = "DELETE FROM authenticate WHERE username ='$user';";   
   execute($conn, $sql);
}




//RESET ACCOUNT
if(isset($_GET['findaccount']))
{

    $user = mysqli_real_escape_string($conn,$_GET['username']);
    $q="select * from authenticate where username = '$user' or  emailaddress = '$user'";

    if($result = mysqli_query($conn, $q))
    {
      while ($row1 = mysqli_fetch_assoc($result)){

          $username = $row1['username'];
       $sql = "SELECT * FROM users WHERE username ='$username'";
        if ($result = mysqli_query($conn, $sql)) {
         while ($row = mysqli_fetch_assoc($result)){
          echo "
              <script>
                $('#userimg').attr('src','".substr($row['profile_picture'],3)."');
                 $('#sendlinkbtn').css('display','none');
                $('#sendresetlink').css('display','block');
                 $('#useremailid').val('".$row1['emailaddress']."');
                $('#userfullname').val('".$row['firstname']." ".$row['lastname']."');
                $('#mainname').html('".$row['firstname']." ".$row['lastname']."');
                </script>
             ";
            
            }

          }
        else{
          ECHO 'NO';
        }
      }
    }else{
      echo "NO";
    }

   
}

  // SENDING MAIL
  if(isset($_POST['sendlink']))
  {
    $email = $_POST['useremail'];
   
    $expFormat = mktime(date("H")+4, date("i"), date("s"), date("m") ,date("d"), date("Y"));
    $expDate = date("Y-m-d H:i:s",$expFormat);
    $key = md5(2418*2+(int)$email);
    $addKey = substr(md5(uniqid(rand(),1)),3,10);
    $key = $key . $addKey;


    // Insert Temp Table
    mysqli_query($conn,"INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('".$email."', '".$key."', '".$expDate."');");

      $output='<p>Dear user,</p>';
      $output.='<p>You have recently requested for the reset link to change your accounts password.</p>';
       $output.='<p>Please click on the attached link or be sure to copy the entire link into your browser, to navigate to the reset page.
      The link will expire after 4 hours for security reason.</p>';

      $output.= '<p>................................................</p>';
      $output.='<p><a href=" localhost/forgotpassword.php?
      key='.$key.'&email='.$email.'&action=reset" target="_blank">
      localhost/forgotpassword.php
      ?key='.$key.'&email='.$email.'&action=reset</a></p> <br>';   
      $output.= '<p>................................................</p>';

      $output.='<p>If you did not request this forgotten password email, no action 
      is needed, your password will not be reset. However, you may want to log into 
      your account and change your security password as someone may have guessed it.</p>';    
      $output.='<p>Thanks,</p>';
      $output.='<p>Team</p>';

      $body=$output;
      $subject = "Password Recovery - MY-SLAM";
      $email_to = $email;
      $fromserver = "qazi9amaan@gmail.com"; 


      require("PHPMailer/PHPMailerAutoload.php");
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->Host = "smtp.gmail.com"; // Enter your host here
      $mail->SMTPAuth = true;
      $mail->Username = "qazi9amaan@gmail.com"; // Enter your email here
      $mail->Password = "prvkjphlnydkxenq"; //Enter your password here
      $mail->Port = 587;
      $mail->IsHTML(true);
      $mail->From = "noreply@bekus.com";
      $mail->FromName = "My-SLAM | Password Recovery";
      $mail->Sender = $fromserver; // indicates ReturnPath header
      $mail->Subject = $subject;
      $mail->Body = $body;
      $mail->AddAddress($email_to);

      if(!$mail->Send()){
      echo "Mailer Error: " . $mail->ErrorInfo;
      }else{
      echo "SUCCESS";
    }
  }
  
// CHANGING PASSWORS
if(isset($_POST['changepassword']))
{

    $user = $_POST['email'];
    $pass =md5($_POST['password']);
    mysqli_query($conn,"DELETE FROM `password_reset_temp` WHERE `email`='".$user."';");
    if(mysqli_query($conn,"UPDATE `authenticate` SET `password`='".$pass."'WHERE `emailaddress`='".$user."';"))
    {
        $host = "localhost";
        $path = "forms/authentication.php";
        $data = "username=".$user."&password=".$_POST['password'];
        $data = urlencode($data);

        $query="select * from authenticate where emailaddress = '$user'";
         if ($result = mysqli_query($conn, $query)) 
         {
               while ($row = mysqli_fetch_row($result)) 
               {
                      
                         $_SESSION['currentusername']=$row[1];
                          $user = $row[1];
                          setSession($conn,$user,null) ;                         
                          echo 'OK';

                          


                      }
                }
         
          
         
    }
   
  
      
}



?>

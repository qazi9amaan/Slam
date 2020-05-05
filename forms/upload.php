<?php

session_start();

if(!empty($_FILES['picture']['name'])){
    //Include database configuration file
    include('connection.php');

    //File uplaod configuration
    $result = 0;
    $uploadDir = "../uploads/images/";
    $fileName = $_SESSION['currentusername'].'_'.time().'_'.basename($_FILES['picture']['name']);
    $targetPath = $uploadDir. $fileName;
    
    //Upload file to server
    if(@move_uploaded_file($_FILES['picture']['tmp_name'], $targetPath)){
        //Get current user ID from session
            $username = $_SESSION['currentusername'];

            // DELETING THE PREVIOUS PICTURE
            $delete_sql = "SELECT profile_picture FROM users WHERE username ='$username';";
               if ($result = mysqli_query($conn, $delete_sql)) {
                    while ($row = mysqli_fetch_assoc($result)){

                        if($row['profile_picture'] != '/assets/img/default.png')
                            unlink( '..'.$row['profile_picture']);
                        }
                    }


            $upload_target = substr($targetPath, 2);
            $sql = "UPDATE users set profile_picture = '$upload_target' WHERE username ='$username';";
            if (mysqli_query($conn, $sql)) {
                $_SESSION['currentimageurl'] =$targetPath;
                setcookie('profile_pic', $targetPath, time() + (86400 * 30), "/");

              echo "Profile Updated!";
            } else{
                echo("failed!");
            }
            
        //Update status
        // if($update){
            $result = 1;
        // }
        
    }
    
    //Load JavaScript function to show the upload status
    echo '<script type="text/javascript">window.top.window.completeUpload(' . $result . ',\'' . $targetPath . '\');</script>  ';
}
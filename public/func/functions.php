<?php
   include('/var/www/html/connection.php');



   	function addpointto($user,$conn,$mode){
   		$sql = "UPDATE users set $mode = $mode+ 1 WHERE userid ='$user'";
	     if (mysqli_query($conn, $sql)) {
		}
   	}

   // UPLOADING THE SAVED ANSWERS
          if(isset($_POST['submitanswers'])){

          	$replier = mysqli_real_escape_string($conn, $_POST['replier']);
          	$questioner = mysqli_real_escape_string($conn, $_POST['questioner']);
            $dt = date('Y-m-d');
	        $sql = "INSERT INTO answers(replier,questioner,udate)
	        VALUES ('$replier', '$questioner','$dt')";
	        if (mysqli_query($conn, $sql)) {
			    $last_id = mysqli_insert_id($conn);
			} else{
				echo("Failure");	
			}


	        if($replier=="Anonymous")
	        {
	        	addpointto($questioner,$conn,"fans");
	        }else{
	        	addpointto($questioner,$conn,'friends');
	        }

		    foreach ($_POST as $key => $value) {
				if($key == "submitanswers" || $key == "replier" || $key == "questioner")
				{

				}else
				{
          $value = mysqli_real_escape_string($conn,$value);
					$sql2 = "UPDATE answers set $key = '$value' WHERE answer_id = '$last_id'";
		    	  if (mysqli_query($conn, $sql2)) {
					} else{
						echo"Failure". mysqli_error($conn);	
					}

				}
		    	
			}	

        }


        //SUBMITTING CONFESSION
         if(isset($_POST['submitquestion'])){

          	$replier = mysqli_real_escape_string($conn,$_POST['replier']);
          	$questioner = mysqli_real_escape_string($conn,$_POST['questioner']);
            $msg =mysqli_real_escape_string($conn, $_POST['msg']);
            $dt = date('Y-m-d');
	        $sql = "INSERT INTO confessions(replier,questioner,msg ,udate)
	        VALUES ('$replier', '$questioner','$msg','$dt')";
	        if (mysqli_query($conn, $sql)) {
			} else{
				echo("Failure");	
			}


	        if($replier=="Anonymous")
	        {
	        	addpointto($questioner,$conn,"fans");
	        }else{
	        	addpointto($questioner,$conn,'friends');
	        }

		   	

        }



        // STORIES
         if(isset($_GET['storycount'])){
         	 $user_id = $_GET['id'];
         	 $sql="SELECT COUNT(*) as t_number FROM  pinnedposts WHERE owner  ='$user_id'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo $row['t_number'];
                }
            } 
}



               function getallpinnedposts($conn, $user){
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
                                     <div class="col-12">
                                       <small class="caption text-lowercase">
                                            <span class = "text-lowercase" style="color: #fff;">@'.$row['questioner'].' </span>&nbsp;
                                            '.$row['caption'].'

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
                                     <div class="col-12 text-justify">
                                       <small class="caption text-lowercase">
                                            <span class = "text-lowercase" style="color: #fff;">@'.$row['questioner'].' </span>&nbsp;
                                            '.$row['caption'].'

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
                	echo 'NO';
                }
            }




        if(isset($_GET['getpinnedposts'])){
            getallpinnedposts($conn, $_GET['id']);
        }




        ?>
        




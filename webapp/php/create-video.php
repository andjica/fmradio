<?php 
if(isset($_POST['create']))
    {
        require_once "../config/connection.php";
 

        $sl = $_FILES['video']['name'];
        $sltype = $_FILES['video']['type'];
        $slsize = $_FILES['video']['size'];
        $sltmp = $_FILES['video']['tmp_name'];

        $name = $_POST['songname'];
        $artist = $_POST['artist'];
        $errors = [];
       


        $allowedExts = array("video/mp4","video/avi","video/3gp","video/mov","video/mpeg");

    
        /*if($slsize > 10000000){
            array_push($errors, "Max size is 10MB");
        }*/
        /*if(!in_array($sltype,$allowedExts))
        {
            array_push($errors, "Video extension must be in video/mp4","video/avi","video/3gp","video/mov","video/mpeg ");
        }*/
        if(empty($sl))
        {
            array_push($errors, "Choose file");
        }
        if(empty($name))
        {
            array_push($errors, "Name of song is required field");
        }
        if(empty($artist))
        {
            array_push($errors, "Artis name is required field");
        }
        if(count($errors) == 0)
        {
            

            $putanjaOrg = "assets/videos/".$sl;
            
            if(move_uploaded_file($sltmp, "../".$putanjaOrg))
            {
                   
                    $insert = "INSERT INTO videos VALUES('',?,?,?)";
                    $st=$connection->prepare($insert);
                    $st->execute([
                        $putanjaOrg,
                        $name,
                        $artist
             
                    ]);

                    if($st)
                    {
                        header("Location: ../admin-video.php?success=done");
                    }
                
                
                
            }
           

        }
        else{
            foreach($errors as $g)
            {
                echo $g."<br>";
            }
        }
    }
?>
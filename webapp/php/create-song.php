<?php

    if(isset($_POST['create']))
    {
        require_once "../config/connection.php";
 

        $sl = $_FILES['mp3']['name'];
        $sltype = $_FILES['mp3']['type'];
        $slsize = $_FILES['mp3']['size'];
        $sltmp = $_FILES['mp3']['tmp_name'];

        $name = $_POST['songname'];
        $desc = $_POST['desc'];
        $artist = $_POST['artist'];
        $album = $_POST['album'];
        $errors = [];
       


        $allowedExts = array("image/jpg", "image/jpeg", "image/gif", "image/png", "audio/mp3", "audio/mp4", "audio/wma");

        
        if($slsize > 10000000){
            array_push($errors, "Max size is 10MB");
        }
        if(!in_array($sltype,$allowedExts))
        {
            array_push($errors, "Allowed extensions for song is mp3");
        }
        if(empty($sl))
        {
            array_push($errors, "Choose file");
        }
        if(empty($name))
        {
            array_push($errors, "Name of song is required field");
        }
        if(empty($desc))
        {
            array_push($errors, "Descritpion is required field");
        }
        if(empty($artist))
        {
            array_push($errors, "Artis name is required field");
        }
        if(empty($album))
        {
            array_push($errors, "Album name is required field");
        }
        if(count($errors) == 0)
        {
            

            $putanjaOrg = "assets/songs/".$sl;
            
            if(move_uploaded_file($sltmp, "../".$putanjaOrg))
            {
                    $imgId = 0;
                    $imgActive = 0;
                    $insert = "INSERT INTO songs VALUES('',?,?,?,?,?,?,?)";
                    $st=$connection->prepare($insert);
                    $st->execute([
                        $name,
                        $putanjaOrg,
                        $desc,
                        $artist,
                        $album,
                        $imgId,
                        $imgActive
                    ]);

                    if($st)
                    {
                        header("Location: ../admin.php?success=done");
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
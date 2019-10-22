<?php

    if(isset($_POST['create']))
    {
        require_once "../config/connection.php";
 

        $sl = $_FILES['img']['name'];
        $sltype = $_FILES['img']['type'];
        $slsize = $_FILES['img']['size'];
        $sltmp = $_FILES['img']['tmp_name'];

        $title = $_POST['title'];
        $desc = $_POST['desc'];

        $errors = [];
       


        $allowedExts = array("image/jpg", "image/jpeg", "image/gif", "image/png");

        
        if($slsize > 10000000){
            array_push($errors, "Max size is 10MB");
        }
        if(!in_array($sltype,$allowedExts))
        {
            array_push($errors, "Allowed extensions for song is img");
        }
        if(empty($sl))
        {
            array_push($errors, "Choose file");
        }
        if(empty($title))
        {
            array_push($errors, "Name of song is required field");
        }
        if(empty($desc))
        {
            array_push($errors, "Descritpion is required field");
        }
        
            

            $putanjaOrg = "assets/news-images/".$sl;
            
            if(move_uploaded_file($sltmp, "../".$putanjaOrg))
            {
                    $imgId = 0;
                    $imgActive = 0;
                    $insert = "INSERT INTO news VALUES('',?,?,?)";
                    $st=$connection->prepare($insert);
                    $st->execute([
                        $title,
                        $desc,
                        $putanjaOrg,
                       
                    ]);

                    if($st)
                    {
                        header("Location: ../admin-news.php?success=done");
                    }
                
                
                
            }
           

        }
        else{
            foreach($errors as $g)
            {
                echo $g."<br>";
            }
        }
    
?>
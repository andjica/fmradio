<?php

if(isset($_POST['create']))
    {
        require_once "../config/connection.php";
 

        $sl = $_FILES['img']['name'];
        $sltype = $_FILES['img']['type'];
        $slsize = $_FILES['img']['size'];
        $sltmp = $_FILES['img']['tmp_name'];

        $song = $_POST['songs'];
        
        $allowedExts = array("image/jpg", "image/jpeg", "image/gif", "image/png");
        $errors = [];
        
        if($slsize > 6000000){
            array_push($errors, "Max size is 6MB");
        }
        if(empty($song))
        {
            array_push($errors, "Choose song");
        }

        if(count($errors) == 0)
        {
            

            $putanjaOrg = "assets/images/".$sl;
            
            if(move_uploaded_file($sltmp, "../".$putanjaOrg))
            {
               
                    $insert = "INSERT INTO images VALUES('',?)";
                    $st=$connection->prepare($insert);
                     $st->execute([
                        $putanjaOrg
                    ]);
                    $last_id = $connection->lastInsertId();
                     

                    $update= "UPDATE songs SET img_id= :img, active_img=:active WHERE id = :idsong";
                    $stupdate = $connection->prepare($update);
                    $ac= 1;
                    $stupdate->bindParam(":idsong", $song);
                    $stupdate->bindParam(":img", $last_id);
                    $stupdate->bindParam(":active", $ac);
                   
                    $stupdate->execute();
                    if($stupdate)
                    {
                        header("Location: ../admin-image.php?success=done");
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
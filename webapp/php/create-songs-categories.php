<?php

    if(isset($_POST['create']))
    {
        $idSong = $_POST['songs'];
        $idCat = $_POST['cat'];
        
        $errors = [];

        if(empty($idSong))
        {
            array_push($errors, "You must set a song");
        }
        if(empty($idCat))
        {
            array_push($errors, "You must choose a category");
        }

        if(count($errors)==0)
        {
            require_once "../config/connection.php";

            $insert = "INSERT INTO songs_categories VALUES('', ?, ?)";
            $st = $connection->prepare($insert);
            $res= $st->execute([
                $idSong,
                $idCat
            ]);
            if($res)
            {
                
                header("Location: ../admin-android.php?success=done");
            }
        }
        else{
            foreach($errors as $error)
            {
                echo $error;
            }
        }
    }

?>
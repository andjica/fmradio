<?php 
if(isset($_POST['create']))
{
     require_once "../config/connection.php";

     $playlist = $_POST['list-playlist'];
     $song = $_POST['list-song'];

      $errors = [];


     if(empty($playlist))
     {
         $_SESSION['errors'] = "Playlist is required field";
         array_push($errors, "Playlist is requred field");
     }
     if(empty($song))
     {
         $_SESSION['errors'] = "Song is required field";
         array_push($errors, "Song is requred field");

     }

     if(count($errors) == 0)
     {
        $insert = "INSERT INTO playlists_songs VALUES(?,?)";
        $st = $connection->prepare($insert);
        $st->execute([
            $playlist,
            $song
        ]);
        if($st)
        {
            header("Location: ../admin-playlist.php?success=done");
        }
     }
     else{

        if($errors)
        {
            foreach($errors as $er)
            {
                echo $er;
            }
            Header("Location: ../admin-playlist.php?greske=greska".$er);
        }
     }

    

}
?>
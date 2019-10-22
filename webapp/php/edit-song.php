<?php 

    if(isset($_POST['update']))
    {

        require_once "../config/connection.php";

        $idS = $_POST['idSong'];

        $name = $_POST['songname'];
        $desc = $_POST['desc'];
        $artist = $_POST['artist'];
        $album = $_POST['album'];
        $errors = [];

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
            
            try{
                $query = "UPDATE songs SET song_name=:name, description=:desc, artist_name=:artist, album_name=:album
                WHERE id = :idSong";
                $st = $connection->prepare($query);
                $st->bindParam(":name", $name);
                $st->bindParam(":desc", $desc);
                $st->bindParam(":artist", $artist);
                $st->bindParam(":album", $album);
                $st->bindParam(":idSong", $idS);
                $st->execute();
                if($st)
                {
                    header("Location: ../admin-update.php");
                }
            }
            catch(PDOException $e)
            {
                return http_response_code(404);
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
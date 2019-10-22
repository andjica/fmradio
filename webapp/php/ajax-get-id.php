<?php
    include "../config/connection.php";
    header("Content-Type: application/json", true);
    if(isset($_POST['id'])){

        $id = $_POST['id'];
        
   
            try{
                $query= "SELECT s.id, s.song_url, s.description,
            s.song_name, s.artist_name, s.album_name, i.url AS url
            FROM songs s INNER JOIN images i ON s.img_id=i.id WHERE s.id = :id";
            $stmp = $connection->prepare($query);
            $stmp->bindParam(":id", $id);
            $stmp->execute();
            $res = $stmp->fetch();
            
            echo json_encode($res);
            }
            catch(PDOException $e)
            {
                return http_response_code(404);
            }
            
      
       

    }
?>
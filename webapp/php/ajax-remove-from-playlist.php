<?php
    include "../config/connection.php";
    header("Content-Type: application/json", true);

    $id = $_POST['id'];
    
    $delete = "DELETE FROM playlists_songs WHERE id_song = ?";

    try{
        $st = $connection->prepare($delete);
        $st->execute([
            $id
        ]);
        echo json_encode(202);
    }

    catch(PDOException $e)
    {
        return http_response_code(404);
    }
    
   



?>
<?php
     header('Content-Type: application/json; Charset=UTF-8');

     $q = "SELECT s.id as idSong, c.name AS name, s.id, s.song_name AS songName, 
     s.active_img, i.url AS imageUrl, s.song_url AS urlSong, s.artist_name AS artist 
     FROM songs s INNER JOIN images i ON s.img_id = i.id 
     INNER JOIN songs_categories sg ON s.id=sg.id_song 
     INNER JOIN categories c ON sg.id_category = c.id 
     WHERE s.active_img = 1";


    require_once "../config/connection.php";
    
    $res = executeQuery($q);

    echo json_encode($res);
?>
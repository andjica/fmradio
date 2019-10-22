<?php

    header('Content-Type: application/json; Charset=UTF-8');
    $search = $_POST['trazi'];

    $q = "SELECT c.name AS name, s.id, s.song_name AS songName, 
    s.active_img, i.url AS imageUrl, s.song_url AS urlSong, s.artist_name AS artist 
    FROM songs s LEFT OUTER JOIN images i ON s.img_id = i.id 
    LEFT OUTER JOIN songs_categories sg ON s.id=sg.id_song 
    LEFT OUTER JOIN categories c ON sg.id_category = c.id 
    WHERE s.active_img = 1 AND s.song_name LIKE ?";

    require_once "../config/connection.php";
    
    $st = $connection->prepare($q);
    
    $st->execute(array("%$search%"));

    $res = $st->fetchAll();

    echo json_encode($res);
    
    
?>
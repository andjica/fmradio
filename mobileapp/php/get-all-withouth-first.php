<?php
    
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json; Charset=UTF-8');

     $q = "SELECT s.id as idSong, s.song_name AS SongName, 
     s.active_img, s.song_url AS urlSong
      FROM songs s 
     INNER JOIN playlists_songs pl ON s.id = pl.id_song 
     INNER JOIN playlists p ON pl.id_playlist = p.id WHERE p.active = 1 LIMIT 200 OFFSET 1
     ";


    require_once "../config/connection.php";
    
    $res = executeQuery($q);

    echo json_encode($res);
?>
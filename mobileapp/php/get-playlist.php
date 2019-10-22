<?php
     header("Access-Control-Allow-Origin: *");
     header('Content-Type: application/json; Charset=UTF-8');

     $q = "SELECT s.song_name AS songName, s.song_url AS songUrl,
      s.artist_name AS artist_name
     FROM songs s INNER JOIN playlists_songs pl ON s.id = pl.id_song 
     INNER JOIN playlists p 
     on pl.id_playlist = p.id WHERE p.active = 1";


    require_once "../config/connection.php";
    
    $res = executeQuery($q);

    echo json_encode($res);
?>
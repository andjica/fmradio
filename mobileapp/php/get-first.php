<?php

    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json; Charset=UTF-8');

     $q = "SELECT s.id AS songId, s.song_url, s.song_name AS songName 
     FROM songs s INNER JOIN playlists_songs pl
     ON s.id = pl.id_song LIMIT 1";


    require_once "../config/connection.php";
    
    $st = $connection->prepare($q);
    $st->execute();
    $res = $st->fetch();
    echo json_encode($res);
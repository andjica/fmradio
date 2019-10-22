<?php
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json; Charset=UTF-8');

    $query = "SELECT * FROM videos";

    require_once "../config/connection.php";

    $res = executeQuery($query);
    
    echo json_encode($res);
?>
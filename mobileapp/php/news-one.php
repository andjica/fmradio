<?php
    header("Access-Control-Allow-Origin: *");
     header('Content-Type: application/json; Charset=UTF-8');

     $q = "SELECT * FROM news LIMIT 1";


    require_once "../config/connection.php";
    
    $res = executeQuery($q);

    echo json_encode($res);
?>
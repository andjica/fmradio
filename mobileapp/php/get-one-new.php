<?php
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json; Charset=UTF-8');
            
    $id = $_POST['catchId'];

    $q = "SELECT * FROM news WHERE id = ?";

    require_once "../config/connection.php";

    $st = $connection->prepare($q);
    $st->execute([$id]);
    $res = $st->fetch();

    echo json_encode($res);
?>
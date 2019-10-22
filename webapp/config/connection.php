<?php

$host = "localhost";
$dbname = "andjicabazicaradio";
$username = "andjicabazica";
$password = "andjicabazica";


    
    

    try{
        $connection = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }

    function executeQuery($query)
    {
        global $connection;

        return $connection->query($query)->fetchAll();
    }

    function zabeleziPristup()
    {
        $open = fopen(LOG_FAJL, "a");

        if($open)
        {
            $date = date("m-d-y H:i:s");

            fwrite($open, "{$_SERVER['PHP_SELF']}\t{$date}\t{$_SERVER['REMOTE_ADDR']}\t\n");
            fclose($open);
        }
    }
?>
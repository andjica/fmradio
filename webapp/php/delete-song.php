<?php



    if(isset($_GET['id']))
    {

        $id = $_GET['id'];
        require_once "../config/connection.php";

        try{
            
            $query = "DELETE FROM songs WHERE id = ?";
            $st = $connection->prepare($query);
            $res = $st->execute([$id]);
    
            if($res)
            {
                return header("Location: ../admin-update.php");
            }
                
              
            
        }
        catch(PDOException $e){
            
             http_response_code(500);
        }

    } 
    else {
        http_response_code(400); // 400 - Bad request
    }

        
         
    

?>
<?php
     $input = json_decode(file_get_contents('php://input'), true);

     require '../models/database.php';
     $Database = new Database;
    

     if(isset($input['value']))
     {
        $idElement = htmlentities($input['value']);
       
        $result = $Database->selectElementById($idElement);

        if(empty($result[0]))
        {

            $return = json_encode(['404']);
        }
        else{
        $return = json_encode($result);
        }
        echo $return;

     }
     else{
         echo 'pas ok';
     }

?>
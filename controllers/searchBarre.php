<?php
     $input = json_decode(file_get_contents('php://input'), true);

     require '../models/database.php';
     $Database = new Database;
    

     if(isset($input['value']))
     {
        $valueName = htmlentities($input['value']);
       
        $resultBegin = $Database->selectResultSearchBar($valueName, 'begin');
        $resultUnder = $Database->selectResultSearchBar($valueName, 'under');
        

        foreach ($resultBegin as $key => $value) {
            
            for ($i=0; $i < count($resultUnder); $i++) { 

                if(array_key_exists($i,$resultUnder) && $value['nom'] == $resultUnder[$i]['nom'])
                {
                    unset($resultUnder[$i]);
                }
            }   
        }

        $result = ['begin' => $resultBegin, 'under' => array_values($resultUnder)];
        $return = json_encode($result);
        echo $return;
     }
     else{
         echo 'pas ok';
     }

?>
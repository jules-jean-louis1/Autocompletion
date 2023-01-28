<?php

     class Database{
         private $dbh;

         public function __construct()
         {
             $this->dbh = new PDO('mysql:host=localhost;dbname=autocompletion_deux;charset=utf8', 'root', '');
         }

         /**
          * Retourne un tableau de resultat selon LIKE
          * @param string valueName - contient les caractère a rechercher dans la base de donnée
          * @param string pos - définit la position de recherche dans la base de donnée
          *             - under : La recherche du like en position avant après
          *             - before : recherche du like en première position
          */
         public function selectResultSearchBar($valueName, $pos)
         {
            if($pos == 'under')
            {
                $like = ['nom' => '%'.$valueName.'%'];
            }
            elseif($pos == 'begin')
            {
                $like = ['nom' => $valueName.'%'];
            }

            $stmt = $this->dbh->prepare('SELECT `nom`,`id` FROM atome WHERE `nom` LIKE :nom');
            $stmt->execute($like);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
         }

         public function selectALLResultSearch($valueName, $pos)
         {
            if($pos == 'under')
            {
                $like = ['nom' => '%'.$valueName.'%'];
            }
            elseif($pos == 'begin')
            {
                $like = ['nom' => $valueName.'%'];
            }

            $stmt = $this->dbh->prepare('SELECT * FROM atome WHERE `nom` LIKE :nom');
            $stmt->execute($like);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
         }

         public function selectElementById($id){

            $value = ['id'=> $id];
            $stmt = $this->dbh->prepare('SELECT * FROM atome WHERE `id` = :id');
            $stmt->execute($value);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
         }
     }
?>
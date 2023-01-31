<?php
class Query{

    private $db;

    public function __construct()
    {
        // Connexion a la base de données
        try {
            $this->db = new PDO(
                'mysql:host=localhost;dbname=autocompletion;charset=utf8',
                'root',
                ''
            );
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit;
        }
    }

}

?>
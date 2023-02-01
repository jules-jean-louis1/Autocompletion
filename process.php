<?php
require "connexion/bddConnect.php";

if (isset($_GET['query'])) {
    $query = $pdo->query("SELECT * FROM livre WHERE book LIKE '{$_GET['query']}%' LIMIT 0, 10");
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}


?>
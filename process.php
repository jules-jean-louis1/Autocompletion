<?php

if (isset($_GET['query'])) {
    $pdo = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', '');
    $query = $pdo->query("SELECT * FROM livre WHERE book LIKE '{$_GET['query']}%' LIMIT 0, 10");
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}


?>
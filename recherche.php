<?php
if (isset($_GET['query'])) {
    $pdo = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', '');
    $query = $pdo->query("SELECT * FROM fruits WHERE nom LIKE '{$_GET['query']}%' LIMIT 0, 10");
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    var_dump($result);
    $lenFirstResult = 10 - count($result);
    $query2 = $pdo->query("SELECT * FROM fruits WHERE nom LIKE '{$_GET['query']}%' LIMIT 0, 10");
    $result2 = $query2->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result2 as $element) {
        if (!in_array($element, $result)) {
            $result[] = $element;
        }
    }
    echo json_encode($result);
}
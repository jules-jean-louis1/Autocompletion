<?php

$pdo = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', '');
$query = $pdo->query("SELECT * FROM livre");
$result = $query->fetchAll(PDO::FETCH_ASSOC);

?>

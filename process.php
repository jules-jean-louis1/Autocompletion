<?php
//Ce code PHP traite une requête GET envoyée à ce fichier et implémente une fonction d'autocomplétion en utilisant la base de données.
//
//    La première étape vérifie si le paramètre query a été envoyé avec la requête GET en utilisant isset($_GET['query']).
//
//    Si query a été envoyé, la variable $query est définie en exécutant une requête SQL à l'aide de la méthode query sur un objet PDO. La requête SELECT récupère tous les enregistrements de la colonne "book" de la table "livre" où le contenu de "book" commence par la valeur envoyée dans "query" et limite le nombre de résultats à 10.
//
//    La variable $result est définie en appelant la méthode fetchAll sur $query pour récupérer tous les enregistrements sous forme d'un tableau associatif.
//
//    Enfin, la fonction json_encode est appelée pour encoder $result en JSON et l'envoyer en réponse à la requête.
require "connexion/bddConnect.php";
// requete pour récupérer les données lorsque l'utilisateur tape dans l'input

if (isset($_GET['query'])) {
    $query = $pdo->query("SELECT * FROM livre WHERE book LIKE '{$_GET['query']}%' LIMIT 0, 10");
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}


?>
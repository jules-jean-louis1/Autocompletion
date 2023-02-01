<?php
require_once "connexion/bddConnect.php";

if (isset($_GET['query'])) {
    $query = $pdo->query("SELECT * FROM livre WHERE book LIKE '{$_GET['query']}%' LIMIT 0, 10");
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="script/main.js"></script>
    <script src="https://kit.fontawesome.com/8b26d30613.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/main.css">
    <!-- tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Details</title>
</head>
<body>
<header class="border-b-[1px] border-gray-600">
    <nav class="flex justify-between items-center mx-4 py-4" id="navbarStyle">
        <div id="containerLogo">
            <a href="index.php">
                <i class="fa-solid fa-bookmark fa-xl"></i>
                <span class="hidden mb:block">
                 BookStore
                </span>
            </a>
        </div>
        <div id="listLink" class="rounded border-[1px] border-gray-600">
            <ul class="flex items-center">
                <li class="mx-2 text-gray-500 hover:text-gray-200">
                    <a href="index.php">Recherche</a>
                </li>
                <li class="mx-2 text-gray-500 hover:text-gray-200">
                    <a href="livreList.php">Livres</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main>

</main>
<footer class="w-full fixed bottom-0 border-t-[1px] border-gray-600 ">
    <div id="containerFooter">
        <div class="py-2"">
        <ul class="flex justify-center space-x-5 " id="linkWebFooter">
            <li>
                <a href="index.php">
                    <i class="fa-brands fa-github fa-lg"></i>
                </a>
            </li>
            <li>
                <a href="index.php">
                    <i class="fa-solid fa-globe fa-lg"></i>
                </a>
            </li>
        </ul>
    </div>
    </div>
</footer>
</body>
</html>

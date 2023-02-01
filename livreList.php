<?php

$pdo = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', '');
$query = $pdo->query("SELECT * FROM livre");
$result = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
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
    <title>Liste des Livres</title>
</head>
<body>
    <header class="border-b-[1px] border-gray-600">
        <nav class="flex justify-between items-center mx-4 py-4" id="navbarStyle">
            <div id="containerLogo">
                <a href="index.php">
                    <i class="fa-solid fa-bookmark fa-xl"></i>
                    <span class="hidden mb:">
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
    <article>
        <section>
            <div id="containerListeLivre">
                <?php
                foreach ($result as $livre) {
                    echo "<div class='border-b-[1px] border-gray-600 py-2'>";
                    echo "<h2 class='text-2xl font-bold text-gray-500'>{$livre['book']}</h2>";
                    echo "<p class='text-gray-500'>{$livre['author']}</p>";
                    echo "</div>";
                }
                ?>
            </div>
        </section>
    </article>
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

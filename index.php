<?php
include 'process.php';
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
    <title>Auto</title>
</head>
<body>
<header>
    <nav class="flex justify-between items-center mx-4 py-4" id="navbarStyle">
        <div id="containerLogo">
            <a href="index.php">
                <i class="fa-solid fa-bookmark fa-xl"></i>
                <span class="hidden mb:">
                 BookStore
                </span>
            </a>
        </div>
        <div id="listLink">
            <ul class="flex items-center text-gray-700 hover:text-gray-200">
                <li class="mx-2">
                    <a href="index.php">Recherche</a>
                </li>
                <li>
                    <a href="recherche.php">Livres</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
    <main>
        <article>
            <section>
                <div id="containerSearch">
                    <h2>
                        <span class="text-2xl">Search</span>
                    </h2>
                </div>
                <div id="search">
                    <form action="recherche.php" method="get" id="searchForm" class="flex flex-row">
                        <div id="form-field">
                            <input type="search" name="search" id="searchInput" placeholder="Rechecher un fruits" autofocus autocomplete="off" required>
                            <div id="results"></div>
                        </div>
                        <button type="submit">Rechercher</button>
                    </form>
                </div>
            </section>
        </article>
    </main>
<footer>

</footer>
</body>
</html>
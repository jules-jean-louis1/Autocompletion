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
        <article class="mx-4">
            <section class="flex flex-col items-center">
                <div id="containerSearch" class="my-4">
                    <h2 id="titreSectionSearch">
                        <span class="text-2xl font-medium">Rechercher un livre</span>
                    </h2>
                </div>
                <div id="search">
                    <form action="recherche.php" method="get" id="searchForm" class="flex flex-row items-center">
                        <div id="form-field">
                            <input type="search" name="search" id="searchInput" placeholder="Rechecher un fruits" autofocus autocomplete="off" required
                                   class="border-[1px] border-gray-600 rounded-l-[5px] bg-gray-300 text-black"
                            >
                            <button type="submit" class="border-r-[2px] border-y-[2px] border-gray-600 rounded-r-[5px] px-2 py-[0.4px]">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            <div id="results" class="border-[1px] border-gray-600 rounded"></div>
                        </div>
                    </form>
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
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
                 BooKS
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
                <div id="warpperForm" class=" flex flex-col items-center mt-[15%] w-[92vw] rounded-[1.4rem] bg-[#ff6c4d] p-4">
                    <div id="imgLivres">
                        <i class="fa-solid fa-book fa-5x"></i>
                    </div>
                    <div id="containerSearch" class="my-4">
                        <h2 id="titreSectionSearch" class="flex flex-col">
                            <span class="text-[1.4em] font-medium">Chercher un livre</span>
                        </h2>
                    </div>

                    <div id="search">
                        <form action="search.php" method="get" id="searchForm" class="flex flex-row items-center pb-3">
                            <div id="form-field">
                                <div class="flex flex-row items-center">
                                    <input type="search" name="search" id="searchInput" placeholder="Rechecher un livre" autofocus autocomplete="off" required
                                           class="rounded-l-[0.2rem] bg-black text-white p-2 py-3">
                                    <button type="submit" class="rounded-r-[0.2rem] p-2 py-3 bg-black hover:bg-violet-900">
                                        <i class="fa-solid fa-magnifying-glass fa-xl"></i>
                                    </button>
                                </div>
                                <div id="results" class="rounded"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </article>
    </main>
<footer class="w-full fixed bottom-0">
    <div id="containerFooter">
        <div class="py-2"">
            <ul class="flex justify-center space-x-5 " id="linkWebFooter">
                <li class="flex items-center rounded-[1.4rem] bg-[#ff6c4d] px-7 py-[2px]">
                    <a href="index.php">
                        <i class="fa-brands fa-github fa-lg"></i>
                    </a>
                </li>
                <li class="rounded-[1.4rem] bg-[#ba59ff] px-7 py-[2px] hover:bg-[#483285]">
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
<?php
require "connexion/bddConnect.php";


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
        <section class="flex justify-center mx-[1px]">
            <div id="containerListeLivre" class="flex justify-center flex-wrap mt-10 mx-2 text-center">
                <?php
                foreach ($result as $livre) { ?>
                    <div class='border-[1px] rounded border-gray-600 py-2 flex flex-col items-center justify-center m-2' id="containerLivre">
                        <h2 class='min-w-40 text-[1em] font-bold text-gray-500 px-2 '>
                            <?php echo $livre['book'];?>
                        </h2>
                        <img src="<?= $livre['cover'];?>" alt="img" class="w-20 h-20 my-2">
                        <p class='text-gray-500'>
                            <?= $livre['author'];?>
                        </p>
                    </div>
                <?php } ?>
            </div>
        </section>
    </article>
    </main>
    <footer class="w-full">
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

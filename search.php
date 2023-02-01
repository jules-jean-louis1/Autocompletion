<?php
// ajoute de la connexion à la bdd
require_once "connexion/bddConnect.php";
// on utlise la variable globale $_GET pour récupérer la valeur de l'input du formulaire
// si la variable $_GET['search'] existe alors on la stocke dans la variable $livreSelect
if (isset($_GET['search'])){
    $livreSelect = $_GET['search'];
    $pdo = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', '');
    $query = $pdo->query("SELECT * FROM livre WHERE book LIKE " . $pdo->quote($livreSelect));
    if (!$query) {
        $error = $pdo->errorInfo();
        echo "Error: " . $error[2];
    }
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
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
    <article>
        <section class="h-5/6">
            <div id="diplayBook" class=" pt-[20%]" >
                <div id="resultsearchbook">
                    <h2 class="text-2xl font-semibold text-center py-4">
                        Résultat de la recherche:
                    </h2>
                </div>
                <div class="flex  justify-center">
                    <?php
                    foreach ($result as $book):
                        ?>
                        <div class="w-10/12 flex flex-col items-center border-[1px] border-gray-600 rounded py-4 px-2" style="background-color: rgba(0,0,0,.5);">
                            <div class="flex flex-col items-center">
                                <img src="<?= $book['cover'] ?>" alt="img" class="w-40 h-60">
                                <div class="flex flex-col items-center">
                                    <div class="flex my-[1.4px]">
                                        <h1 class="text-base font-semibold">
                                            Titre:
                                        </h1>
                                        <h1 class="text-base mx-2">
                                            <?= $book['book'] ?>
                                        </h1>
                                    </div>
                                    <div class="flex my-[1.4px]">
                                        <h1 class="text-base font-semibold">
                                            Auteur:
                                        </h1>
                                        <h1 class="text-base mx-2">
                                            <?= $book['author'] ?>
                                        </h1>
                                    </div>
                                    <div class="flex my-[1.4px]">
                                        <h1 class="text-base font-semibold">
                                            <?= $book['bookDescription'] ?>
                                        </h1>
                                    </div>
                                    <div class="flex my-[1.4px]">
                                        <h1 class="text-base font-semibold">
                                            Année:
                                        </h1>
                                        <h1 class="text-base mx-2">
                                            <?= $book['releaseBook']  ?>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
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

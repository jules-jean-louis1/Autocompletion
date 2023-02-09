<?php
$pdo = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', '');

// Envoi des données du formulaire d'inscription à la base de données sql
if (isset($_POST['emailR'])) {
    $email = $_POST['emailR'];
    $password = $_POST['passwordR'];
    $c_password = $_POST['c_passwordR'];

    $query = $pdo->prepare("INSERT INTO utilisateurs (email, password) VALUES (:email, :password)");
    $result = $query->execute([
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    if ($result) {
        header('HTTP/1.1 201 Votre resource a bien été créée');
        echo json_encode(['status' => '201', 'responseText' => 'Votre utilisateur a bien était crée']);
    }

    die();
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"> </script>
    <script src="script/loginReg.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Mon site - Connexion</title>
</head>

<body>
<main>
    <div class="flex flex-col items-center">
        <div class="logo">
            <i class="fas fa-user"></i>
        </div>
    <!--    FormConnexion-->
        <div class="tab-body" data-id="connexion">
            <form action="" method="post" id="LoginForm">
                <div class="flex">
                    <div class="flex flex-col">
                        <label for="email">Email :</label>
                        <input type="text" class="input rounded bg-slate-300 p-2" placeholder="Nom d'utilisateur">
                        <small></small>
                    </div>
                </div>
                <div class="flex">
                    <div class="flex flex-col">
                        <label for="password">Mot de passe</label>
                        <input placeholder="Mot de Passe" type="password"  class="input rounded bg-slate-300 p-2">
                        <small></small>
                    </div>
                </div>
                <div class="flex flex-col">
                    <a href="#" class="link">Mot de passe oublié ?</a>
                    <button type="submit" class="rounded bg-purple-500 py-2 text-white hover:bg-purple-700" id="loginbtn">Connexion</button>
                </div>
            </form>
        </div>
    <!--    FormInscription-->
        <div class="flex">
            <div class="tab-body" data-id="inscription">
                <form action="connexion.php" method="post" id="register-form">
                    <div class="flex py-2">
                        <div class="flex flex-col">
                            <label for="emailR">Email :</label>
                            <input type="text" class="input rounded bg-slate-300 p-2 " placeholder="Adresse Mail" id="emailR" name="emailR">
                            <small></small>
                        </div>
                    </div>
                    <div class="flex py-2">
                        <div class="flex flex-col">
                            <label for="passwordR">Mot de passe</label>
                            <input type="password" class="input rounded bg-slate-300 p-2" placeholder="Mot de Passe" id="passwordR" name="passwordR">
                            <small></small>
                        </div>
                    </div>
                    <div class="flex py-2">
                        <div class="flex flex-col">
                            <label for="c_passwordR">Confirmer Mot de passe</label>
                            <input type="password" name="c_passwordR" class="input rounded bg-slate-300 p-2" placeholder="Confirmer Mot de Passe" id="c_passwordR">
                            <small></small>
                        </div>
                    </div>
                    <button type="submit" class="rounded bg-purple-500 py-2 text-white hover:bg-purple-700 w-full">
                        Inscription
                    </button>
                </form>
            </div>
        </div>

        <div class="tab-footer flex space-x-5 m-2 text-white">
            <a class="tab-link active p-2 rounded bg-pink-600 " data-ref="connexion" href="javascript:void(0)">Connexion</a>
            <a class="tab-link p-2 rounded bg-pink-800" data-ref="inscription" href="javascript:void(0)">Inscription</a>
        </div>
    </div>
</main>
</body>


</html>
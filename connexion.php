<?php
require "connexion/bddConnect.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $pdo->prepare("INSERT INTO utilisateurs (email, password) VALUES (:email, :password)");
    $result = $query->execute([
        'username' => $username,
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
    <div class="">
        <div class="logo">
            <i class="fas fa-user"></i>
        </div>
    <!--    FormConnexion-->
        <div class="tab-body flex" data-id="connexion">
            <form action="" method="post" id="LoginForm">
                <div class="flex">
                    <i class="far fa-user"></i>
                    <div class="flex flex-col">
                        <label for="email">Email :</label>
                        <input type="text" class="input rounded bg-slate-300" placeholder="Nom d'utilisateur">
                        <small></small>
                    </div>
                </div>
                <div class="flex">
                    <i class="fas fa-lock"></i>
                    <div class="flex flex-col">
                        <label for="password">Mot de passe</label>
                        <input placeholder="Mot de Passe" type="password" class="input rounded bg-slate-300">
                        <small></small>
                    </div>
                </div>
                <div class="flex flex-col">
                    <a href="#" class="link">Mot de passe oublié ?</a>
                    <button type="submit" class="rounded bg-purple-500 w-[30%] py-2 text-white hover:bg-purple-700" id="loginbtn">Connexion</button>
                </div>
            </form>
        </div>
    <!--    FormInscription-->
        <div class="tab-body" data-id="inscription">
            <form action="" method="post" id="register-form">
                <div class="row">
                    <i class="far fa-user"></i>
                    <input type="email" class="input" placeholder="Adresse Mail" id="email">
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="input" placeholder="Mot de Passe" id="password">
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="input" placeholder="Confirmer Mot de Passe" id="c_password">
                </div>
                <button type="submit">Inscription</button>
            </form>
        </div>

        <div class="tab-footer flex space-x-5">
            <a class="tab-link active" data-ref="connexion" href="javascript:void(0)">Connexion</a>
            <a class="tab-link" data-ref="inscription" href="javascript:void(0)">Inscription</a>
        </div>
    </div>
</main>
</body>


</html>
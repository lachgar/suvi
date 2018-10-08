<?php

include_once 'connexion/Connexion.php';
include_once 'service/ProfilService.php';
include_once 'service/UserService.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST["login"] !== "" && isset($_POST["password"]) ) {
        getUserByLogin($_POST['login'], $_POST['password']);
    }
}

function getUserByLogin($login, $password) {
    $cnx = new Connexion();
    $req = "SELECT p.libelle FROM user u INNER JOIN profil p ON u.idprofil = p.id WHERE u.login = :login and u.password=:pss";
    $req = $cnx->getConnexion()->prepare($req);
    $req->execute(array(
                ":login" => $login,
                ":pss" => $password
            )) or die('Mst getUserByLogin Error');
    if($e = $req->fetch(PDO::FETCH_OBJ)){
        $user = $e->libelle;
        if ($user == "directeur") {
            echo '<script> document.location.replace("public/directeur");</script>';
        } elseif ($user == "admin") {
            echo '<script> document.location.replace("public/admin");</script>';
        } elseif ($user == "secretaire") {
            echo '<script> document.location.replace("public/secretaire");</script>';
        } elseif ($user == "chef") {
            echo '<script> document.location.replace("public/chef");</script>';
        }
    } else {
        echo '<div class="alert alert-warning">
            <strong>Warning!</strong> your username or password are inncorrect thank you for trying again.
          </div>';
    }
}

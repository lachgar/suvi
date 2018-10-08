<?php
error_reporting(E_ALL);
chdir('..');chdir('..');chdir('..');
include_once 'service/UserService.php';
include_once 'beans/User.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ps = new UserService();
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $idprofil = $_POST['idprofil'];
   
    $u = new User(0,$nom,$prenom,$date,$email,$tel,$idprofil);
    $us->create($u);
    
    $all = $us->findAll();
    header('Content-type: application/json');
    echo json_encode($all);
}
<?php
error_reporting(E_ALL);
chdir('..');chdir('..');
include_once 'service/ProfilService.php';
include_once 'beans/Profil.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $os = new ProfilService();
    $id = $_POST['id'];
    $code = $_POST['code'];
    $libelle = $_POST['libelle'];
    $o = new Profil($id,$code,$libelle);
    $os->create($o);
    
    $all = $os->findAll();
    header('Content-type: application/json');
    echo json_encode($all);
}


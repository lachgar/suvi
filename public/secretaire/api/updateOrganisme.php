<?php
error_reporting(E_ALL);
chdir('..');chdir('..');chdir('..');
include_once 'service/OrganismeService.php';
include_once 'beans/Organisme.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $os = new OrganismeService();
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $tel = $_POST['tel'];
    $fax = $_POST['fax'];
    $mail = $_POST['mail'];
    $site = $_POST['site'];
    $contact = $_POST['contact'];
    $adresse = $_POST['adresse'];
    
    $all = $os->findAll();
    header('Content-type: application/json');
    echo json_encode($all);
}
?>


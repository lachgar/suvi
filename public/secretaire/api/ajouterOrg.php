<?php
error_reporting(E_ALL);
chdir('..');chdir('..');chdir('..');
include_once 'service/OrganismeService.php';
include_once 'beans/Organisme.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $os = new OrganismeService();
    $nomo = $_POST['nom'];
    $telo = $_POST['tel'];
    $faxo = $_POST['fax'];
    $mailo = $_POST['mail'];
    $siteo = $_POST['site'];
    $contacto = $_POST['contact'];
    $adresseo = $_POST['adresse'];
    $o = new Organisme(0,$nomo,$telo,$faxo,$mailo,$siteo,$contacto,$adresseo);
    $os->create($o);
    
    $all = $os->findAll();
    header('Content-type: application/json');
    echo json_encode($all);
}
?>


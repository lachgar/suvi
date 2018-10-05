<?php
error_reporting(E_ALL);
chdir('..');chdir('..');
include_once 'service/OrganismeService.php';
include_once 'beans/Organisme.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $os = new OrganismeService();
    $ido = $_POST['id'];
    $nomo = $_POST['nom'];
    $telo = $_POST['tel'];
    $faxo = $_POST['fax'];
    $mailo = $_POST['mail'];
    $siteo = $_POST['site'];
    $contacto = $_POST['contact'];
    $adresseo = $_POST['adresse'];
    $o = new Organisme($ido,$nomo,$telo,$faxo,$mailo,$siteo,$contacto,$adresseo);
    $os->update($o);
    
    $all = $os->findAll();
    header('Content-type: application/json');
    echo json_encode($all);
}
?>


<?php
error_reporting(E_ALL);
chdir('..');chdir('..');chdir('..');
include_once 'service/ProjetService.php';
include_once 'beans/Projet.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ps = new ProjetService();
    $intitule = $_POST['intitule'];
    $description = $_POST['description'];
    $datedebut = $_POST['datedebut'];
    $datefin = $_POST['datefin'];
    $chef = $_POST['chef'];
    $idorganisme = $_POST['idorganisme'];
    $etat = $_POST['etat'];
    $montant = $_POST['montant'];
    $p = new Projet(0,$intitule,$description,$datedebut,$datefin,$etat,$montant,$idorganisme,$chef);
    $ps->create($p);
    
    $all = $ps->findProOrgChef();
    header('Content-type: application/json');
    echo json_encode($all);
}


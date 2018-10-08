<?php
error_reporting(E_ALL);
chdir('..');chdir('..');chdir('..');
include_once 'service/ProjetService.php';
include_once 'beans/Projet.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ps = new ProjetService();
    $id = $_POST['id'];
    $intitule = $_POST['intitule'];
    $description = $_POST['description'];
    $datedebut = $_POST['datedebut'];
    $datefin = $_POST['datefin'];
    $chef = 5;
    $idorganisme = $_POST['idorganisme'];
    $etat = $_POST['etat'];
    $montant = 00000;
    $p = new Projet($id,$intitule,$description,$datedebut,$datefin,$etat,$montant,$idorganisme,$chef);
    $p->setId($id);
    $ps->update($p);
    
    $all = $ps->findProOrgChef();
    header('Content-type: application/json');
    echo json_encode($all);
}
?>


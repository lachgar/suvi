<?php
error_reporting(E_ALL);
chdir('..');chdir('..');chdir('..');
include_once 'service/ProjetService.php';
include_once 'beans/Projet.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ps = new ProjetService();
    $id = $_POST['id'];
    $p = $ps->findById($id);
    $ps->delete($p);
    
    $all = $ps->findProOrgChef();
    header('Content-type: application/json');
    echo json_encode($all);
}
?>


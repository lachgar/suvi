<?php
error_reporting(E_ALL);
chdir('..');chdir('..');chdir('..');
include_once 'service/OrganismeService.php';
include_once 'beans/Organisme.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $os = new OrganismeService();
    $id = $_POST['id'];
    $o = $os->findById($id);
    $os->delete($o);
    
    $all = $os->findAll();
    header('Content-type: application/json');
    echo json_encode($all);
}
?>


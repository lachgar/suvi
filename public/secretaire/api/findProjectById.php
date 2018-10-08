<?php
error_reporting(E_ALL);
chdir('..');chdir('..');chdir('..');
include_once 'service/ProjetService.php';

$ps = new ProjetService();
$id = $_POST['id'];
$all = $ps->findById($id);
header('Content-type: application/json');
echo json_encode($all);

?>


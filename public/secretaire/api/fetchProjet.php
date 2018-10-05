<?php
error_reporting(E_ALL);
chdir('..');chdir('..');chdir('..');
include_once 'service/OrganismeService.php';

$os = new OrganismeService();

$all = $os->findAll();
header('Content-type: application/json');
echo json_encode($all);

?>


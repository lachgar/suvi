<?php
error_reporting(E_ALL);
chdir('..');chdir('..');
include_once 'service/ProfilService.php';

$os = new ProfilService();

$all = $os->findAll();
header('Content-type: application/json');
echo json_encode($all);



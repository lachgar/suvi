<?php
error_reporting(E_ALL);
chdir('..');chdir('..');chdir('..');
include_once 'service/UserService.php';

$us = new UserService();

$all = $us->findAll();
header('Content-type: application/json');
echo json_encode($all);

?>
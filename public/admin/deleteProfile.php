<?php

chdir("..");chdir("..");
include_once 'service/ProfilService.php';

if($_SERVER["REQUEST_METHOD"] == "GET"){
    delete();
}

function delete(){
    $id = $_GET["id"];
    $os = new ProfilService();
    $os->delete($id);
    
    header('location:addProfil.php');
}

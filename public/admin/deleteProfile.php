<?php

error_reporting(E_ALL);
chdir("..");chdir("..");
include_once 'service/ProfilService.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    delete();
}

function delete(){
    $id = $_POST["id"];
    $os = new ProfilService();
    $o = $os->findById($id);
    $os->delete($o);
    
        
    $all = $os->findAll();
    header('Content-type: application/json');
    echo json_encode($all);

}

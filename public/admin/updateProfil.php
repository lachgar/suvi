<?php


chdir("..");chdir("..");
include_once 'service/ProfilService.php';


if($_SERVER["REQUEST_METHOD"] == "POST"){
    update();
}

function update(){
    $code = $_POST["code"];
    $libelle = $_POST["libelle"];
    $id = $_POST["id"];
    
    $os = new ProfilService();
    $o = $os->findById($id);
    $o[0]['code'] = $code;
    $o[0]['libelle'] = $libelle;
    
    $os->update($o);

}


	


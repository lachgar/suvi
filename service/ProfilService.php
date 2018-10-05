<?php

include_once 'dao/IDao.php';
include_once 'connexion/Connexion.php';
include_once 'beans/Profil.php';


class ProfilService implements IDao {
    
     private  $connexion;
    
    function __construct() {
        $this->connexion = new Connexion();
    }
    
    
    public function create($o) {
        
        $query = "INSERT INTO Profil VALUES (NULL,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCode(), $o->getLibelle() )) or die('Delete Error');
    
    }

    public function delete($o) {
        $query = "delete from Profil where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o[0]['id'])) or die('Delete Error');
    }

    public function findAll() {
        $query = "select * from Profil";
        $req = $this->connexion->getConnexion()->query($query);
        $prof = $req->fetchAll();
        return $prof;
    }

    public function findById($id) {
        $query = "select * from Profil where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));  
        $prof=$req->fetchAll();
        return $prof;
    }

    public function update($o) {
         $query = "UPDATE Profil SET code =?,libelle=? WHERE id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o[0]['code'],$o[0]['libelle'],$o[0]['id'])) or die(' Update Error');
    
    }

}

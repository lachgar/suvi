<?php

include_once 'dao/IDao.php';
include_once 'connexion/Connexion.php';
include_once 'beans/User.php';

class UserService  implements IDao{

    private  $connexion;
    
    function __construct() {
        $this->connexion = new Connexion();
    }

  public function create($o) {
        $query = "INSERT INTO User VALUES (NULL,?,?,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(),$o->getPrenom(), $o->getDate(),$o->getEmail(),$o->getTel(),$o->getIdprofil(),$o->getLogin(),$o->getPassword())) or die('Delete Error');
    }

    public function delete($o) {
        $query = "delete from User where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o[0]['id'])) or die('Delete Error');
    }

    public function findAll() {
        $query = "select * from User";
        $req = $this->connexion->getConnexion()->query($query);
        $user = $req->fetchAll();
        return $user;
    }

    public function findById($id) {
        $query = "select * from User where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));  
        $user=$req->fetchAll();
        return $user;
    }

    public function update($o) {
        $query = "UPDATE User SET nom =?,prenom=?,date=?,email=?,tel=?,idprofil=?,login=?,password=? WHERE id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(),$o->getPrenom(), $o->getDate(),$o->getEmail(),$o->getTel(),$o->getIdprofil(),$o->getLogin(),$o->getPassword())) or die(' Update Error');
    }
}

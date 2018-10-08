<?php

include_once 'dao/IDao.php';
include_once 'connexion/Connexion.php';
include_once 'beans/Organisme.php';

class OrganismeService implements IDao {

    private  $connexion;
    
    function __construct() {
        $this->connexion = new Connexion();
    }

  public function create($o) {
        $query = "INSERT INTO Organisme VALUES (NULL,?,?,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(), $o->getTel(), $o->getFax(), $o->getMail(), $o->getSite(), $o->getContact(), $o->getAdresse())) or die('Delete Error');
    }

    public function delete($o) {
        $query = "delete from Organisme where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o[0]['id'])) or die('Delete Error');
    }

    public function findAll() {
        $query = "select * from Organisme";
        $req = $this->connexion->getConnexion()->query($query);
        $org = $req->fetchAll();
        return $org;
    }

    public function findById($id) {
        $query = "select * from Organisme where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));  
        $org=$req->fetchAll();
        return $org;
    }

    public function update($o) {
        $query = "UPDATE Organisme SET nom =?,tel=?,fax=?,mail=?,site=?,contact=?,adresse=? WHERE id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(),$o->getTel(),$o->getFax(),$o->getMail(),$o->getSite(),$o->getContact(),$o->getAdresse(),$o->getId())) or die(' Update Error service organisme');
    }

}

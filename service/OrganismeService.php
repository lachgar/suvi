<?php

include_once 'dao/IDao.php';

include_once 'connexion/Connexion.php';
include_once 'beans/Organisme.php';

class OrganismeService implements IDao {

    private  $connexion;
    
    function __construct() {
        $this->connexion = new Connexion();
    }

    //put your code here
    public function create($o) {
        $query = "INSERT INTO Organisme VALUES (NULL,?,?,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(), $o->getTel(), $o->getFax(), $o->getMail(), $o->getSite(), $o->getContact(), $o->getAdresse())) or die('Delete Error');
    }

    public function delete($o) {
        
    }

    public function findAll() {
        $query = "select * from Organisme";
        $req = $this->connexion->getConnexion()->query($query);
        $etds = $req->fetchAll();
        return $org;
    }

    public function findById($id) {
        
    }

    public function update($o) {
        
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OrganismeService
 *
 * @author a
 */

include_once '../dao/IDao.php';
class OrganismeService implements IDao {
    //put your code here
    public function create($o) {
        $query = "INSERT INTO Organisme VALUES (NULL,'".$o->getNom()."','".$o->getTel()."', '".$o->getFax()."','".$o->getMail()."','".$o->getSite()."','".$o->getContact()."','".$o->getAdresse()."');";
        $req = $this->connexion->getConnexion()->prepare($query);
	$req->execute() or die('Create Error');
    }

    public function delete($o) {
        
    }

    public function findAll() {
        
    }

    public function findById($id) {
        
    }

    public function update($o) {
        
    }

}

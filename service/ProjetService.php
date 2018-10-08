<?php

include_once 'dao/IDao.php';
include_once 'connexion/Connexion.php';
include_once 'beans/projet.php';

class ProjetService implements IDao {

    private  $connexion;
    
    function __construct() {
        $this->connexion = new Connexion();
    }
    
    public function create($p) {
            $query = "INSERT INTO Projet VALUES(NULL,?,?,?,?,?,?,?,?)";
            $req = $this->connexion->getConnexion()->prepare($query);
            $req->execute(array($p->getIntitule(), $p->getDescription(), $p->getDatedebut(), $p->getDatefin(), $p->getEtat(), $p->getMontant(), $p->getIdorganisme(), $p->getIdchef())) or die('create error'); 
    }
    public function delete($p){
        $query = "delete from Projet where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($p[0]['id'])) or die('Delete Error');
    }
    
    public function update($p){
        $query = "UPDATE Projet SET Intitule =?,descreption=?,datedebut=?,datefin=?,etat=?,montant=?, idoranisme = ?, idchef=? WHERE id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($p->getIntitule(),$p->getDatedebut(),$p->getDatefin(),$p->getEtat(),$p->getMontant(),$p->getIdorganisme(), $p->getIdchef())) or die(' Update Error service projet');
        
    }
    public function findAll(){
        $query = "select * from Projet";
        $req = $this->connexion->getConnexion()->query($query);
        $proj = $req->fetchAll();
        return $proj;
    }
    public function findProOrgChef(){
        $query = "select p.*,o.nom as 'nomo',u.nom as 'nomu',u.prenom as 'prenomu' from Projet p inner join Organisme o on o.id=p.idorganisme inner join user u on p.chef=u.id";
        $req = $this->connexion->getConnexion()->query($query);
        $proj = $req->fetchAll();
        return $proj;
     }
     
    public function findById($id){
         $query = "select * from Projet where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));  
        $proj=$req->fetchAll();
        return $proj;
    }
  

}

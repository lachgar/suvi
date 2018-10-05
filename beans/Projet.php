<?php

class Projet {
    private $id;
    private $intitule;
    private $description;
    private $datedebut;
    private $datefin;
    private $etat;
    private $montant;
    private $idorganisme;
    private $idchef;
    
    function __construct($id, $intitule, $description, $datedebut, $datefin, $etat, $montant, $idorganisme, $idchef) {
        $this->id = $id;
        $this->intitule = $intitule;
        $this->description = $description;
        $this->datedebut = $datedebut;
        $this->datefin = $datefin;
        $this->etat = $etat;
        $this->montant = $montant;
        $this->idorganisme =$idorganisme;
        $this->idchef = $idchef;
    }

    function getId() {
        return $this->id;
    }

    function getIntitule() {
        return $this->intitule;
    }

    function getDescription() {
        return $this->description;
    }

    function getDatedebut() {
        return $this->datedebut;
    }

    function getDatefin() {
        return $this->datefin;
    }

    function getEtat() {
        return $this->etat;
    }

    function getMontant() {
        return $this->montant;
    }
    
    function getIdorganisme() {
        return $this->idorganisme;
    }

    function getIdchef() {
        return $this->idchef;
    }

        
    public function __toString() {
        return $this->intitule;
    }
}


<?php

class Organisme {
    private $id;
    private $nom;
    private $tel;
    private $fax;
    private $mail;
    private $site;
    private $contact;
    private $adresse;
    
    function __construct($id, $nom, $tel, $fax, $mail, $site, $contact, $adresse) {
        $this->id = $id;
        $this->nom = $nom;
        $this->tel = $tel;
        $this->fax = $fax;
        $this->mail = $mail;
        $this->site = $site;
        $this->contact = $contact;
        $this->adresse = $adresse;
    }
    
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getTel() {
        return $this->tel;
    }

    function getFax() {
        return $this->fax;
    }

    function getMail() {
        return $this->mail;
    }

    function getSite() {
        return $this->site;
    }

    function getContact() {
        return $this->contact;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setFax($fax) {
        $this->fax = $fax;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

    function setSite($site) {
        $this->site = $site;
    }

    function setContact($contact) {
        $this->contact = $contact;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }
          
}

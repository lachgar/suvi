<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author a
 */
class User {

    private $id;
    private $nom;
    private $prenom;
    private $date;
    private $email;
    private $tel;
    private $idprofil;
    private $login;
    private $password;

    function __construct($id, $nom, $prenom, $date, $email, $tel, $idprofil, $login, $password) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date = $date;
        $this->email = $email;
        $this->tel = $tel;
        $this->idprofil = $idprofil;
        $this->login = $login;
        $this->password = $password;
    }

    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getDate() {
        return $this->date;
    }

    function getEmail() {
        return $this->email;
    }

    function getTel() {
        return $this->tel;
    }

    function getIdprofil() {
        return $this->idprofil;
    }

    function getLogin() {
        return $this->login;
    }

    function getPassword() {
        return $this->password;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setIdprofil($idprofil) {
        $this->idprofil = $idprofil;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setPassword($password) {
        $this->password = $password;
    }

}

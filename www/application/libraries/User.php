<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *-------------------------------------------------------------------------------
 * USER CLASS
 *-------------------------------------------------------------------------------
 */

class User {

    /*
     *-------------------------
     * ATTRIBUTES
     *-------------------------
     */
    private $idUser;
    private $email;
    private $password;
    private $name;
    private $photo;
    private $country;
    private $estate;
    private $city;
    private $zipcode;
    private $registeredDate;
    private $status;
    

    /*
     *-------------------------
     * METHODS
     *-------------------------
     */
    // Constructor
    public function __construct($data = NULL) {
        if(is_array($data)) {

        }
    }
    /*
    public function __construct($idUser, $email, $password, $name, $photo, $country, 
        $estate, $city, $zipcode, $registeredDate, $status) {
        $this->setIdUser($idUser);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setName($name);
        $this->setPhoto($photo);
        $this->setCountry($country);
        $this->setEstate($estate);
        $this->setCity($city);
        $this->setZipcode($zipcode);
        $this->setRegisteredDate($registeredDate);
        $this->setStatus($status);
    }
    //*/

    // Setters
    public function setIdUser($newValue) {
        $this->idUser = $newValue;
    }

    public function setEmail($newValue) {
        $this->email = $newValue;
    }

    public function setPassword($newValue) {
        $this->password = $newValue;
    }

    public function setName($newValue) {
        $this->name = $newValue;
    }

    public function setPhoto($newValue) {
        $this->photo = $newValue;
    }

    public function setCountry($newValue) {
        $this->country = $newValue;
    }

    public function setEstate($newValue) {
        $this->estate = $newValue;
    }

    public function setCity($newValue) {
        $this->city = $newValue;
    }

    public function setZipcode($newValue) {
        $this->zipcode = $newValue;
    }

    public function setRegisteredDate($newValue) {
        $this->registeredDate = $newValue;
    }

    public function setStatus($newValue) {
        $this->status = $newValue;
    }

    // Getters
    public function getIdUser() {
        return $this->idUser;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getName() {
        return $this->name;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getEstate() {
        return $this->estate;
    }

    public function getCity() {
        return $this->city;
    }

    public function getZipcode() {
        return $this->zipcode;
    }

    public function getRegisteredDate() {
        return $this->registeredDate;
    }

    public function getStatus() {
        return $this->status;
    }
}

/* End of file User.php */
/* Location: ./application/libraries/User.php */
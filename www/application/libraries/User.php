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
    private $permission;
    private $status;
    

    /*
     *-------------------------
     * METHODS
     *-------------------------
     */
    // Constructor
    public function __construct($data = NULL) {
        if(is_array($data)) {
            $this->setIdUser($data[0]);
            $this->setEmail($data[1]);
            $this->setPassword($data[2]);
            $this->setName($data[3]);
            $this->setPhoto($data[4]);
            $this->setCountry($data[5]);
            $this->setEstate($data[6]);
            $this->setCity($data[7]);
            $this->setZipcode($data[8]);
            $this->setRegisteredDate($data[9]);
            $this->setPermission($data[10]);
            $this->setStatus($data[11]);
        }
    }

    /*
    public function __construct($idUser, $email, $password, $name, $photo, $country, 
        $estate, $city, $zipcode, $registeredDate, $permission, $status) {
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
        $this->setPermission($permission);
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

    public function setPermission($newValue) {
        $this->permission = $newValue;
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

    public function getPermission() {
        return $this->permission;
    }

    public function getStatus() {
        return $this->status;
    }

    public function copyUserData($data) {
        $this->setIdUser($data->getIdUser());
        $this->setEmail($data->getEmail());
        $this->setPassword($data->getPassword());
        $this->setName($data->getName());
        $this->setPhoto($data->getPhoto());
        $this->setCountry($data->getCountry());
        $this->setEstate($data->getEstate());
        $this->setCity($data->getCity());
        $this->setZipcode($data->getZipcode());
        $this->setRegisteredDate($data->getRegisteredDate());
        $this->setPermission($data->getPermission());
        $this->setStatus($data->getStatus());
    }
}

/* End of file User.php */
/* Location: ./application/libraries/User.php */
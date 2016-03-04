<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'User.php';
/*
 *-------------------------------------------------------------------------------
 * MANAGER CLASS
 *-------------------------------------------------------------------------------
 */

class Manager extends User{

    /*
     *-------------------------
     * ATTRIBUTES
     *-------------------------
     */
    private $agencyName;
    private $description;
    private $website;
    private $facebook;
    private $twitter;
    private $youtube;
    private $myspace;
    private $phone;
    private $contactEmail;

    /*
     *-------------------------
     * METHODS
     *-------------------------
     */
    // Constructor
    public function __construct($idUser, $email, $password, $name, $photo, $country, 
        $estate, $city, $zipcode, $registeredDate, $status, $agencyName, $description, 
        $website, $facebook, $twitter, $youtube, $myspace, $phone, $contactEmail) {
        parent::__construct($idUser, $email, $password, $name, $photo, $country, $estate, 
            $city, $zipcode, $registeredDate, $status);
        $this->setAgencyName($agencyName);
        $this->setDescription($description);
        $this->setWebsite($website);
        $this->setFacebook($facebook);
        $this->setTwitter($twitter);
        $this->setYoutube($youtube);
        $this->setMyspace($myspace);
        $this->setPhone($phone);
        $this->setContactEmail($contactEmail);
    }

    // Setters
    public function setAgencyName($newValue) {
        $this->agencyName = $newValue;
    }

    public function setDescription($newValue) {
        $this->description = $newValue;
    }

    public function setWebsite($newValue) {
        $this->website = $newValue;
    }

    public function setFacebook($newValue) {
        $this->facebook = $newValue;
    }

    public function setTwitter($newValue) {
        $this->twitter = $newValue;
    }

    public function setYoutube($newValue) {
        $this->youtube = $newValue;
    }

    public function setMyspace($newValue) {
        $this->myspace = $newValue;
    }

    public function setPhone($newValue) {
        $this->phone = $newValue;
    }

    public function setContactEmail($newValue) {
        $this->contactEmail = $newValue;
    }

    // Getters
    public function getAgencyName() {
        return $this->agencyName;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getWebsite() {
        return $this->website;
    }

    public function getFacebook() {
        return $this->facebook;
    }

    public function getTwitter() {
        return $this->twitter;
    }

    public function getYoutube() {
        return $this->youtube;
    }

    public function getMyspace() {
        return $this->myspace;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getContactEmail() {
        return $this->contactEmail;
    }
}

/* End of file Manager.php */
/* Location: ./application/libraries/Manager.php */
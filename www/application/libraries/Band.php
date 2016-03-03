<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *-------------------------------------------------------------------------------
 * BAND CLASS
 *-------------------------------------------------------------------------------
 */

class Band {

    /*
     *-------------------------
     * ATTRIBUTES
     *-------------------------
     */
    private $idBand;
    private $name;
    private $about;
    private $photo;
    private $website;
    private $facebook;
    private $twitter;
    private $youtube;
    private $myspace;
    private $country;
    private $estate;
    private $city;
    private $contactEmail;
    private $phone;

    /*
     *-------------------------
     * METHODS
     *-------------------------
     */
    // Constructor
    public function __construct($idBand, $name, $about, $photo, $website, $facebook, 
        $twitter, $youtube, $myspace, $country, $estate, $city, $contactEmail, $phone) {
        $this->setIdBand($idBand);
        $this->setName($name);
        $this->setAbout($about);
        $this->setPhoto($photo);
        $this->setWebsite($website);
        $this->setFacebook($facebook);
        $this->setTwitter($twitter);
        $this->setYoutube($youtube);
        $this->setMyspace($myspace);
        $this->setCountry($country);
        $this->setEstate($estate);
        $this->setCity($city);
        $this->setContactEmail($contactEmail);
        $this->setPhone($phone);
    }

    // Setters
    public function setIdBand($newValue) {
        $this->idBand = $newValue;
    }

    public function setName($newValue) {
        $this->name = $newValue;
    }

    public function setAbout($newValue) {
        $this->about = $newValue;
    }

    public function setPhoto($newValue) {
        $this->photo = $newValue;
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

    public function setCountry($newValue) {
        $this->country = $newValue;
    }

    public function setEstate($newValue) {
        $this->estate = $newValue;
    }

    public function setCity($newValue) {
        $this->city = $newValue;
    }

    public function setContactEmail($newValue) {
        $this->contactEmail = $newValue;
    }

    public function setPhone($newValue) {
        $this->phone = $newValue;
    }

    // Getters
    public function getIdBand() {
        return $this->idBand;
    }

    public function getName() {
        return $this->name;
    }

    public function getAbout() {
        return $this->about;
    }

    public function getPhoto() {
        return $this->photo;
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

    public function getCountry() {
        return $this->country;
    }

    public function getEstate() {
        return $this->estate;
    }

    public function getCity() {
        return $this->city;
    }

    public function getContactEmail() {
        return $this->contactEmail;
    }

    public function getPhone() {
        return $this->phone;
    }
}

/* End of file Band.php */
/* Location: ./application/libraries/Band.php */
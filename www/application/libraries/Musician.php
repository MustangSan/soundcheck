<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'User.php';
/*
 *-------------------------------------------------------------------------------
 * MUSICIAN CLASS
 *-------------------------------------------------------------------------------
 */

class Musician extends User{

    /*
     *-------------------------
     * ATTRIBUTES
     *-------------------------
     */
    private $biography;
    private $website;
    private $facebook;
    private $twitter;
    private $youtube;
    private $myspace;

    /*
     *-------------------------
     * METHODS
     *-------------------------
     */
    // Constructor
    public function __construct($idUser, $email, $password, $name, $photo, $country, 
        $estate, $city, $zipcode, $registeredDate, $status, $biography, $website, 
        $facebook, $twitter, $youtube, $myspace) {
        parent::__construct($idUser, $email, $password, $name, $photo, $country, $estate, 
            $city, $zipcode, $registeredDate, $status);
        $this->setBiography($biography);
        $this->setWebsite($website);
        $this->setFacebook($facebook);
        $this->setTwitter($twitter);
        $this->setYoutube($youtube);
        $this->setMyspace($myspace);
    }

    // Setters
    public function setBiography($newValue) {
        $this->biography = $newValue;
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

    // Getters
    public function getBiography() {
        return $this->biography;
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
}

/* End of file Muscian.php */
/* Location: ./application/libraries/Muscian.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *-------------------------------------------------------------------------------
 * STUDIO CLASS
 *-------------------------------------------------------------------------------
 */

class Studio {

    /*
     *-------------------------
     * ATTRIBUTES
     *-------------------------
     */
    private $idStudio;
    private $idUser;
    private $name;
    private $about;
    private $website;
    private $facebook;
    private $twitter;
    private $youtube;
    private $country;
    private $estate;
    private $city;
    private $district;
    private $street;
    private $number;
    private $complement;
    private $zipcode;
    private $phone;
    private $phoneAuxiliar;
    private $contactEmail;
    private $latitude;
    private $longitude;

    /*
     *-------------------------
     * METHODS
     *-------------------------
     */
    // Constructor
    public function __construct($data = NULL) {
        if(is_array($data)) {
            $this->setIdStudio($data[0]);
            $this->setIdUser($data[1]);
            $this->setName($data[2]);
            $this->setAbout($data[3]);
            $this->setWebsite($data[4]);
            $this->setFacebook($data[5]);
            $this->setTwitter($data[6]);
            $this->setYoutube($data[7]);
            $this->setCountry($data[8]);
            $this->setEstate($data[9]);
            $this->setCity($data[10]);
            $this->setDistrict($data[11]);
            $this->setStreet($data[12]);
            $this->setNumber($data[13]);
            $this->setComplement($data[14]);
            $this->setZipcode($data[15]);
            $this->setPhone($data[16]);
            $this->setPhoneAuxiliar($data[17]);
            $this->setContactEmail($data[18]);
            $this->setLatitude($data[19]);
            $this->setLongitude($data[20]);
        }
    }
    /*
    public function __construct($idStudio, $idUser, $name, $about, $website, $facebook, 
        $twitter, $youtube, $country, $estate, $city, $district, $street,
        $number, $complement, $zipcode, $phone, $phoneAuxiliar, $contactEmail) {
        $this->setIdStudio($idStudio);
        $this->setIdUser($idUser);
        $this->setName($name);
        $this->setAbout($about);
        $this->setWebsite($website);
        $this->setFacebook($facebook);
        $this->setTwitter($twitter);
        $this->setYoutube($youtube);
        $this->setCountry($country);
        $this->setEstate($estate);
        $this->setCity($city);
        $this->setDistrict($district);
        $this->setStreet($street);
        $this->setNumber($number);
        $this->setComplement($complement);
        $this->setZipcode($zipcode);
        $this->setPhone($phone);
        $this->setPhoneAuxiliar($phoneAuxiliar);
        $this->setContactEmail($contactEmail);
    }
    //*/

    // Setters
    public function setIdStudio($newValue) {
        $this->idStudio = $newValue;
    }

    public function setIdUser($newValue) {
        $this->idUser = $newValue;
    }

    public function setName($newValue) {
        $this->name = $newValue;
    }

    public function setAbout($newValue) {
        $this->about = $newValue;
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

    public function setCountry($newValue) {
        $this->country = $newValue;
    }

    public function setEstate($newValue) {
        $this->estate = $newValue;
    }

    public function setCity($newValue) {
        $this->city = $newValue;
    }

    public function setDistrict($newValue) {
        $this->district = $newValue;
    }

    public function setStreet($newValue) {
        $this->street = $newValue;
    }

    public function setNumber($newValue) {
        $this->number = $newValue;
    }

    public function setComplement($newValue) {
        $this->complement = $newValue;
    }

    public function setZipcode($newValue) {
        $this->zipcode = $newValue;
    }

    public function setPhone($newValue) {
        $this->phone = $newValue;
    }

    public function setPhoneAuxiliar($newValue) {
        $this->phoneAuxiliar = $newValue;
    }

    public function setContactEmail($newValue) {
        $this->contactEmail = $newValue;
    }

    public function setLatitude($newValue) {
        $this->latitude = $newValue;
    }

    public function setLongitude($newValue) {
        $this->longitude = $newValue;
    }

    // Getters
    public function getIdStudio() {
        return $this->idStudio;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function getName() {
        return $this->name;
    }

    public function getAbout() {
        return $this->about;
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

    public function getCountry() {
        return $this->country;
    }

    public function getEstate() {
        return $this->estate;
    }

    public function getCity() {
        return $this->city;
    }

    public function getDistrict() {
        return $this->district;
    }

    public function getStreet() {
        return $this->street;
    }

    public function getNumber() {
        return $this->number;
    }

    public function getComplement() {
        return $this->complement;
    }

    public function getZipcode() {
        return $this->zipcode;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getPhoneAuxiliar() {
        return $this->phoneAuxiliar;
    }

    public function getContactEmail() {
        return $this->contactEmail;
    }

    public function getLatitude() {
        return $this->latitude;
    }

    public function getLongitude() {
        return $this->longitude;
    }
}

/* End of file Studio.php */
/* Location: ./application/libraries/Studio.php */
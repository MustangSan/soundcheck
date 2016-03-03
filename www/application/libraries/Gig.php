<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *-------------------------------------------------------------------------------
 * GIG CLASS
 *-------------------------------------------------------------------------------
 */

class Gig {

    /*
     *-------------------------
     * ATTRIBUTES
     *-------------------------
     */
    private $idGig;
    private $idUser;
    private $description;
    private $status;
    private $place;
    private $date;
    private $country;
    private $estate;
    private $city;
    private $district;
    private $street;
    private $number;
    private $complement;
    private $zipcode;
    private $phone;
    private $contactEmail;

    /*
     *-------------------------
     * METHODS
     *-------------------------
     */
    // Constructor
    public function __construct($idGig, $idUser, $description, $status, $place, $date, 
        $country, $estate, $city, $district, $street, $number, $complement, $zipcode, 
        $phone, $contactEmail) {
        $this->setIdGig($idGig);
        $this->setIdUser($idUser);
        $this->setDescription($description);
        $this->setStatus($status);
        $this->setPlace($place);
        $this->setDate($date);
        $this->setCountry($country);
        $this->setEstate($estate);
        $this->setCity($city);
        $this->setDistrict($district);
        $this->setStreet($street);
        $this->setNumber($number);
        $this->setComplement($complement);
        $this->setZipcode($zipcode);
        $this->setPhone($phone);
        $this->setContactEmail($contactEmail);
    }

    // Setters
    public function setIdGig($newValue) {
        $this->idGig = $newValue;
    }

    public function setIdUser($newValue) {
        $this->idUser = $newValue;
    }

    public function setDescription($newValue) {
        $this->description = $newValue;
    }

    public function setStatus($newValue) {
        $this->status = $newValue;
    }

    public function setPlace($newValue) {
        $this->place = $newValue;
    }

    public function setDate($newValue) {
        $this->date = $newValue;
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

    public function setContactEmail($newValue) {
        $this->contactEmail = $newValue;
    }

    // Getters
    public function getIdGig() {
        return $this->idGig;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getPlace() {
        return $this->place;
    }

    public function getDate() {
        return $this->date;
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

    public function getContactEmail() {
        return $this->contactEmail;
    }
}

/* End of file Gig.php */
/* Location: ./application/libraries/Gig.php */
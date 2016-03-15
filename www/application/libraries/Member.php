<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *-------------------------------------------------------------------------------
 * MEMBER CLASS
 *-------------------------------------------------------------------------------
 */

class Member {

    /*
     *-------------------------
     * ATTRIBUTES
     *-------------------------
     */
    private $idMember;
    private $idBand;
    private $name;
    private $photo;
    private $instrument;

    /*
     *-------------------------
     * METHODS
     *-------------------------
     */
    // Constructor
    public function __construct($data = NULL) {
        if(is_array($data)) {
            $this->setIdMember($data[0]);
            $this->setIdBand($data[1]);
            $this->setName($data[2]);
            $this->setPhoto($data[3]);
            $this->setInstrument($data[4]);
        }
    }
    /*
    public function __construct($idMember, $idBand, $name, $photo, $instrument) {
        $this->setIdMember($idMember);
        $this->setIdBand($idBand);
        $this->setName($name);
        $this->setPhoto($photo);
        $this->setInstrument($instrument);
    }
    //*/

    // Setters
    public function setIdMember($newValue) {
        $this->idMember = $newValue;
    }

    public function setIdBand($newValue) {
        $this->idBand = $newValue;
    }

    public function setName($newValue) {
        $this->name = $newValue;
    }

    public function setPhoto($newValue) {
        $this->photo = $newValue;
    }

    public function setInstrument($newValue) {
        $this->instrument = $newValue;
    }

    // Getters
    public function getIdMember() {
        return $this->idMember;
    }

    public function getIdBand() {
        return $this->idBand;
    }

    public function getName() {
        return $this->name;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function getInstrument() {
        return $this->instrument;
    }
}

/* End of file Member.php */
/* Location: ./application/libraries/Member.php */
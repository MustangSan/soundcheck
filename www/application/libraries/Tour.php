<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *-------------------------------------------------------------------------------
 * TOUR CLASS
 *-------------------------------------------------------------------------------
 */

class Tour {

    /*
     *-------------------------
     * ATTRIBUTES
     *-------------------------
     */
    private $idTour;
    private $idBand;
    private $name;
    private $description;
    private $beginDate;
    private $endDate;

    /*
     *-------------------------
     * METHODS
     *-------------------------
     */
    // Constructor
    public function __construct($idTour, $idBand, $name, $description, $beginDate, 
        $endDate) {
        $this->setIdTour($idTour);
        $this->setIdBand($idBand);
        $this->setName($name);
        $this->setDescription($description);
        $this->setBeginDate($beginDate);
        $this->setEndDate($endDate);
    }

    // Setters
    public function setIdTour($newValue) {
        $this->idTour = $newValue;
    }

    public function setIdBand($newValue) {
        $this->idBand = $newValue;
    }

    public function setName($newValue) {
        $this->name = $newValue;
    }

    public function setDescription($newValue) {
        $this->description = $newValue;
    }

    public function setBeginDate($newValue) {
        $this->beginDate = $newValue;
    }

    public function setEndDate($newValue) {
        $this->endDate = $newValue;
    }

    // Getters
    public function getIdTour() {
        return $this->idTour;
    }

    public function getIdBand() {
        return $this->idBand;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getBeginDate() {
        return $this->beginDate;
    }

    public function getEndDate() {
        return $this->endDate;
    }
}

/* End of file Tour.php */
/* Location: ./application/libraries/Tour.php */
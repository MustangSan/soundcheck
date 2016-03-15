<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *-------------------------------------------------------------------------------
 * SHOW CLASS
 *-------------------------------------------------------------------------------
 */

class Show {

    /*
     *-------------------------
     * ATTRIBUTES
     *-------------------------
     */
    private $idShow;
    private $idBand;
    private $idTour;
    private $name;
    private $description;
    private $date;
    private $timetable;
    private $place;

    /*
     *-------------------------
     * METHODS
     *-------------------------
     */
    // Constructor
    public function __construct($data = NULL) {
        if(is_array($data)) {
            $this->setIdShow($data[0]);
            $this->setIdBand($data[1]);
            $this->setIdTour($data[2]);
            $this->setName($data[3]);
            $this->setDescription($data[4]);
            $this->setDate($data[5]);
            $this->setTimetable($data[6]);
            $this->setPlace($data[7]);
        }
    }
    /*
    public function __construct($idShow, $idBand, $idTour, $name, $description, $date, 
        $timetable, $place) {
        $this->setIdShow($idShow);
        $this->setIdBand($idBand);
        $this->setIdTour($idTour);
        $this->setName($name);
        $this->setDescription($description);
        $this->setDate($date);
        $this->setTimetable($timetable);
        $this->setPlace($place);
    }
    //*/

    // Setters
    public function setIdShow($newValue) {
        $this->idShow = $newValue;
    }

    public function setIdBand($newValue) {
        $this->idBand = $newValue;
    }

    public function setIdTour($newValue) {
        $this->idTour = $newValue;
    }

    public function setName($newValue) {
        $this->name = $newValue;
    }

    public function setDescription($newValue) {
        $this->description = $newValue;
    }

    public function setDate($newValue) {
        $this->date = $newValue;
    }

    public function setTimetable($newValue) {
        $this->timetable = $newValue;
    }

    public function setPlace($newValue) {
        $this->place = $newValue;
    }

    // Getters
    public function getIdShow() {
        return $this->idShow;
    }

    public function getIdBand() {
        return $this->idBand;
    }

    public function getIdTour() {
        return $this->idTour;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDate() {
        return $this->date;
    }

    public function getTimetable() {
        return $this->timetable;
    }

    public function getPlace() {
        return $this->place;
    }
}

/* End of file Show.php */
/* Location: ./application/libraries/Show.php */
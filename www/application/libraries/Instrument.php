<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *-------------------------------------------------------------------------------
 * INSTRUMENT CLASS
 *-------------------------------------------------------------------------------
 */

class Instrument {

    /*
     *-------------------------
     * ATTRIBUTES
     *-------------------------
     */
    private $idInstrument;
    private $name;

    /*
     *-------------------------
     * METHODS
     *-------------------------
     */
    // Constructor
    public function __construct($data = NULL) {
        if(is_array($data)) {
            $this->setIdInstrument($data[0]);
            $this->setName($data[1]);
        }
    }
    /*
    public function __construct($idInstrument, $name) {
        $this->setIdInstrument($idInstrument);
        $this->setName($name);
    }
    //*/

    // Setters
    public function setIdInstrument($newValue) {
        $this->idInstrument = $newValue;
    }

    public function setName($newValue) {
        $this->name = $newValue;
    }

    // Getters
    public function getIdInstrument() {
        return $this->idInstrument;
    }

    public function getName() {
        return $this->name;
    }
}

/* End of file Instrument.php */
/* Location: ./application/libraries/Instrument.php */
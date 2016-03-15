<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *-------------------------------------------------------------------------------
 * MUSIC GENRE CLASS
 *-------------------------------------------------------------------------------
 */

class Music_Genre {

    /*
     *-------------------------
     * ATTRIBUTES
     *-------------------------
     */
    private $idMusicGenre;
    private $name;

    /*
     *-------------------------
     * METHODS
     *-------------------------
     */
    // Constructor
    public function __construct($data = NULL) {
        if(is_array($data)) {
            $this->setIdMusicGenre($data[0]);
            $this->setName($data[1]);
        }
    }
    /*
    public function __construct($idMusicGenre, $name) {
        $this->setIdMusicGenre($idMusicGenre);
        $this->setName($name);
    }
    //*/

    // Setters
    public function setIdMusicGenre($newValue) {
        $this->idMusicGenre = $newValue;
    }

    public function setName($newValue) {
        $this->name = $newValue;
    }

    // Getters
    public function getIdMusicGenre() {
        return $this->idMusicGenre;
    }

    public function getName() {
        return $this->name;
    }
}

/* End of file Music_Genre.php */
/* Location: ./application/libraries/Music_Genre.php */
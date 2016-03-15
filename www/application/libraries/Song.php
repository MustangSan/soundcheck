<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *-------------------------------------------------------------------------------
 * SONG CLASS
 *-------------------------------------------------------------------------------
 */

class Song {

    /*
     *-------------------------
     * ATTRIBUTES
     *-------------------------
     */
    private $idSong;
    private $idAlbum;
    private $idBand;
    private $name;
    private $trackNumber;
    private $genre;

    /*
     *-------------------------
     * METHODS
     *-------------------------
     */
    // Constructor
    public function __construct($data = NULL) {
        if(is_array($data)) {
            $this->setIdSong($data[0]);
            $this->setIdAlbum($data[1]);
            $this->setIdBand($data[2]);
            $this->setName($data[3]);
            $this->setTrackNumber($data[4]);
            $this->setGenre($data[5]);
        }
    }
    /*
    public function __construct($idSong, $idAlbum, $idBand, $name, $genre) {
        $this->setIdSong($idSong);
        $this->setIdAlbum($idAlbum);
        $this->setIdBand($idBand);
        $this->setName($name);
        $this->setGenre($genre);
    }
    //*/

    // Setters
    public function setIdSong($newValue) {
        $this->idSong = $newValue;
    }

    public function setIdAlbum($newValue) {
        $this->idAlbum = $newValue;
    }

    public function setIdBand($newValue) {
        $this->idBand = $newValue;
    }

    public function setName($newValue) {
        $this->name = $newValue;
    }

    public function setTrackNumber($newValue) {
        $this->trackNumber = $newValue;
    }

    public function setGenre($newValue) {
        $this->genre = $newValue;
    }

    // Getters
    public function getIdSong() {
        return $this->idSong;
    }

    public function getIdAlbum() {
        return $this->idAlbum;
    }

    public function getIdBand() {
        return $this->idBand;
    }

    public function getName() {
        return $this->name;
    }

    public function getTrackNumber() {
        return $this->trackNumber;
    }

    public function getGenre() {
        return $this->genre;
    }
}

/* End of file Song.php */
/* Location: ./application/libraries/Song.php */
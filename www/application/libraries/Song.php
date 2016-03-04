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
    private $genre;

    /*
     *-------------------------
     * METHODS
     *-------------------------
     */
    // Constructor
    public function __construct($idSong, $idAlbum, $idBand, $name, $genre) {
        $this->setIdSong($idSong);
        $this->setIdAlbum($idAlbum);
        $this->setIdBand($idBand);
        $this->setName($name);
        $this->setGenre($genre);
    }

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

    public function getGenre() {
        return $this->genre;
    }
}

/* End of file Song.php */
/* Location: ./application/libraries/Song.php */
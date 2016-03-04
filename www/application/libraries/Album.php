<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *-------------------------------------------------------------------------------
 * ALBUM CLASS
 *-------------------------------------------------------------------------------
 */

class Album {

    /*
     *-------------------------
     * ATTRIBUTES
     *-------------------------
     */
    private $idAlbum;
    private $idBand;
    private $name;
    private $coverArt;
    private $genre;
    private $releaseDate;
    private $label;
    private $copyrightDate;
    private $sellerLink;
    private $listeningLink;

    /*
     *-------------------------
     * METHODS
     *-------------------------
     */
    // Constructor
    public function __construct($idAlbum, $idBand, $name, $coverArt, $genre, 
        $releaseDate, $label, $copyrightDate, $sellerLink, $listeningLink) {
        $this->setIdAlbum($idAlbum);
        $this->setIdBand($idBand);
        $this->setName($name);
        $this->setCoverArt($coverArt);
        $this->setGenre($genre);
        $this->setReleaseDate($releaseDate);
        $this->setLabel($label);
        $this->setCopyrightDate($copyrightDate);
        $this->setSellerLink($sellerLink);
        $this->setListeningLink($listeningLink);
    }

    // Setters
    public function setIdAlbum($newValue) {
        $this->idAlbum = $newValue;
    }

    public function setIdBand($newValue) {
        $this->idBand = $newValue;
    }

    public function setName($newValue) {
        $this->name = $newValue;
    }

    public function setCoverArt($newValue) {
        $this->coverArt = $newValue;
    }

    public function setGenre($newValue) {
        $this->genre = $newValue;
    }

    public function setReleaseDate($newValue) {
        $this->releaseDate = $newValue;
    }

    public function setLabel($newValue) {
        $this->label = $newValue;
    }

    public function setCopyrightDate($newValue) {
        $this->copyrightDate = $newValue;
    }

    public function setSellerLink($newValue) {
        $this->sellerLink = $newValue;
    }

    public function setListeningLink($newValue) {
        $this->listeningLink = $newValue;
    }

    // Getters
    public function getIdAlbum() {
        return $this->idAlbum;
    }

    public function getIdBand() {
        return $this->idBand;
    }

    public function getName() {
        return $this->name;
    }

    public function getCoverArt() {
        return $this->coverArt;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function getReleaseDate() {
        return $this->releaseDate;
    }

    public function getLabel() {
        return $this->label;
    }

    public function getCopyrightDate() {
        return $this->copyrightDate;
    }

    public function getSellerLink() {
        return $this->sellerLink;
    }

    public function getListeningLink() {
        return $this->listeningLink;
    }

}

/* End of file Album.php */
/* Location: ./application/libraries/Album.php */
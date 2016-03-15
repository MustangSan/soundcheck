<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *-------------------------------------------------------------------------------
 * POST CLASS
 *-------------------------------------------------------------------------------
 */

class Post {

    /*
     *-------------------------
     * ATTRIBUTES
     *-------------------------
     */
    private $idPost;
    private $idBand;
    private $idAuthor;
    private $postName;
    private $title;
    private $content;
    private $featuredImage;
    private $date;
    private $status;

    /*
     *-------------------------
     * METHODS
     *-------------------------
     */
    // Constructor
    public function __construct($data = NULL) {
        if(is_array($data)) {
            $this->setIdPost($data[0]);
            $this->setIdBand($data[1]);
            $this->setIdAuthor($data[2]);
            $this->setPostName($data[3]);
            $this->setTitle($data[4]);
            $this->setContent($data[5]);
            $this->setFeaturedImagem($data[6]);
            $this->setDate($data[7]);
            $this->setStatus($data[8]);
        }
    }
    /*
    public function __construct($idPost, $idBand, $idAuthor, $postName, $title, $content,
        $featuredImage, $date, $status) {
        $this->setIdPost($idPost);
        $this->setIdBand($idBand);
        $this->setIdAuthor($idAuthor);
        $this->setPostName($postName);
        $this->setTitle($title);
        $this->setContent($content);
        $this->setFeaturedImagem($featuredImage);
        $this->setDate($date);
        $this->setStatus($status);
    }
    //*/

    // Setters
    public function setIdPost($newValue) {
        $this->idPost = $newValue;
    }

    public function setIdBand($newValue) {
        $this->idBand = $newValue;
    }

    public function setIdAuthor($newValue) {
        $this->idAuthor = $newValue;
    }

    public function setPostName($newValue) {
        $this->postName = $newValue;
    }

    public function setTitle($newValue) {
        $this->title = $newValue;
    }

    public function setContent($newValue) {
        $this->content = $newValue;
    }

    public function setFeaturedImagem($newValue) {
        $this->featuredImage = $newValue;
    }

    public function setDate($newValue) {
        $this->date = $newValue;
    }

    public function setStatus($newValue) {
        $this->status = $newValue;
    }

    // Getters
    public function getIdPost() {
        return $this->idPost;
    }

    public function getIdBand() {
        return $this->idBand;
    }

    public function getIdAuthor() {
        return $this->idAuthor;
    }

    public function getPostName() {
        return $this->postName;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getFeaturedImagem() {
        return $this->featuredImage;
    }

    public function getDate() {
        return $this->date;
    }

    public function getStatus() {
        return $this->status;
    }
}

/* End of file Post.php */
/* Location: ./application/libraries/Post.php */
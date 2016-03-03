<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *-------------------------------------------------------------------------------
 * ADMINISTRATOR CLASS
 *-------------------------------------------------------------------------------
 */

class Administrator {

    /*
     *-------------------------
     * ATTRIBUTES
     *-------------------------
     */
    private $idAdministrator;
    private $email;
    private $password;
    private $name;
    private $status;

    /*
     *-------------------------
     * METHODS
     *-------------------------
     */
    // Constructor
    public function __construct($idAdministrator, $email, $password, $name, $status) {
        $this->setIdAdministrator($idAdministrator);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setName($name);
        $this->setStatus($status);
    }

    // Setters
    public function setIdAdministrator($newValue) {
        $this->idAdministrator = $newValue;
    }

    public function setEmail($newValue) {
        $this->email = $newValue;
    }

    public function setPassword($newValue) {
        $this->password = $newValue;
    }

    public function setName($newValue) {
        $this->name = $newValue;
    }

    public function setStatus($newValue) {
        $this->status = $newValue;
    }

    // Getters
    public function getIdAdministrator() {
        return $this->idAdministrator;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getName() {
        return $this->name;
    }

    public function getStatus() {
        return $this->status;
    }
}

/* End of file Administrator.php */
/* Location: ./application/libraries/Administrator.php */
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
    private $permission;
    private $status;

    /*
     *-------------------------
     * METHODS
     *-------------------------
     */
    // Constructor
    public function __construct($data = NULL) {
        if(is_array($data)) {
            $this->setIdAdministrator($data[0]);
            $this->setEmail($data[1]);
            $this->setPassword($data[2]);
            $this->setName($data[3]);
            $this->setPermission($data[4]);
            $this->setStatus($data[5]);
        }
    }
    /*
    public function __construct($idAdministrator = NULL, $email = NULL, $password = NULL, $name = NULL, $status = NULL) {
        if(is_null($email)) {
            $this->setIdAdministrator($idAdministrator);
            $this->setEmail($email);
            $this->setPassword($password);
            $this->setName($name);
            $this->setStatus($status);
        }
    }
    //*/

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

    public function setPermission($newValue) {
        $this->permission = $newValue;
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

    public function getPermission() {
        return $this->permission;
    }

    public function getStatus() {
        return $this->status;
    }
}

/* End of file Administrator.php */
/* Location: ./application/libraries/Administrator.php */
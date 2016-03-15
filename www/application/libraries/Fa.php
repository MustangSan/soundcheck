<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'User.php';
/*
 *-------------------------------------------------------------------------------
 * FA CLASS
 *-------------------------------------------------------------------------------
 */

class Fa extends User{

    /*
     *-------------------------
     * ATTRIBUTES
     *-------------------------
     */


    /*
     *-------------------------
     * METHODS
     *-------------------------
     */
    // Constructor
    public function __construct($data = NULL) {
        if(is_array($data)) {

        }
    }
    /*
    public function __construct($idUser, $email, $password, $name, $photo, $country, 
        $estate, $city, $zipcode, $registeredDate, $status) {
        parent::__construct($idUser, $email, $password, $name, $photo, $country, $estate, 
            $city, $zipcode, $registeredDate, $status);
    }
    //*/
}

/* End of file Fa.php */
/* Location: ./application/libraries/Fa.php */
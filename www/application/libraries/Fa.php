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
            parent::__construct([$data[0], $data[1], $data[2], $data[3], $data[4],
                $data[5], $data[6], $data[7], $data[8], $data[9], $data[10], $data[11]]);
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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * USER MODEL 
 *---------------------------------------------------------------
 * 
 *
 *
 */

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('Library');
    }

    public function startDatabase() {
        $this->load->database();
    }

    public function closeDatabase() {
        $this->db->close();
    }

    private function dismountClass($class) {
        $reflectionClass = new ReflectionClass(get_class($class));
        $data = array();
        foreach ($reflectionClass->getProperties() as $property) {
            $property->setAccessible(true);
            $data[$property->getName()] = $property->getValue($class);
            $property->setAccessible(false);
        }
        return $data;
    }
    
    /*
     *-------------------------
     * USER METHODS
     *-------------------------
     */
    public function readUsers() {
        $this->db->trans_start();
        $this->db->order_by('name ASC');
        $query = $this->db->get('users');
        $this->db->trans_complete();

        if($query->num_rows() > 0) {
            return $query->custom_result_object('User');
        }
        return FALSE;
    }

    /*
     *-------------------------
     * FA METHODS
     *-------------------------
     */
    public function createFa($fa) {
        if($fa instanceof Fa) {
            $data = new User();
            $data->copyUserData($fa);

            $this->db->trans_start();
            $this->db->insert('users', $this->dismountClass($data));
            
            if($this->db->trans_status()){
                //$data = $this->dismountClass($data);
                unset($data);
                $data['idUser'] = $this->db->insert_id();
                $this->db->insert('fans', $data);
            }
            
            $this->db->trans_complete();
            
            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    /*
     *-------------------------
     * MUSICIAN METHODS
     *-------------------------
     */
    public function createMusician($musician) {
        if($musician instanceof Musician) {
            $data = new User();
            $data->copyUserData($musician);

            $this->db->trans_start();
            $this->db->insert('users', $this->dismountClass($data));
            
            if($this->db->trans_status()){
                $fa['idUser'] = $this->db->insert_id();
                $this->db->insert('fans', $fa);
                $data = $this->dismountClass($musician);
                $data['idUser'] = $fa['idUser'];
                $this->db->insert('musicians', $data);
            }
            
            $this->db->trans_complete();
            
            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function upgradeToManager($managerData, $idUser){
        if($managerData instanceof Manager) {
            $data = $this->dismountClass($managerData);
            $data['idUser'] = $idUser;
            
            $this->db->trans_start();
            $this->db->insert('managers', $data);
            $this->db->query('UPDATE users SET permission=´M&M´ WHERE idUser='.$idUser);
            $this->db->trans_complete();
            
            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    /*
     *-------------------------
     * MANAGER METHODS
     *-------------------------
     */
    public function createManager($manager) {
        if($manager instanceof Manager) {
            $data = new User();
            $data->copyUserData($manager);

            $this->db->trans_start();
            $this->db->insert('users', $this->dismountClass($data));
            
            if($this->db->trans_status()){
                $fa['idUser'] = $this->db->insert_id();
                $this->db->insert('fans', $fa);
                $data = $this->dismountClass($manager);
                $data['idUser'] = $fa['idUser'];
                $this->db->insert('managers', $data);
            }
            
            $this->db->trans_complete();
            
            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function upgradeToMusician($musicianData, $idUser){
        if($musicianData instanceof Musician) {
            $data = $this->dismountClass($musicianData);
            $data['idUser'] = $idUser;
            
            $this->db->trans_start();
            $this->db->insert('musicians', $data);
            $this->db->query('UPDATE users SET permission=´M&M´ WHERE idUser='.$idUser);
            $this->db->trans_complete();
            
            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }
}
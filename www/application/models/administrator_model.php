<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * ADMINISTRATOR MODEL 
 *---------------------------------------------------------------
 * 
 *
 *
 */

class Administrator_model extends CI_Model {

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

    public function record_count() {
        return $this->db->count_all('administrators');
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

    public function createAdministrator($data) {
        if($data instanceof Administrator) {
            $this->db->trans_start();
            $this->db->insert('administrators', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function updateAdministrator($data) {
        if($data instanceof Administrator) {
            $this->db->trans_start();
            $this->db->where('idAdministrator', $data->getIdAdministrator());
            $this->db->update('administrators', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function readAdministrators() {
        $this->db->trans_start();
        $this->db->order_by('name ASC');
        $query = $this->db->get('administrators');
        $this->db->trans_complete();

        if($query->num_rows() > 0) {
            return $query->custom_result_object('Administrator');
        }
        return FALSE;
    }

    public function getAdministrator($id) {
        $this->db->trans_start();
        $this->db->where('idAdministrator', $id);
        $query = $this->db->get('administrators');
        $this->db->trans_complete();

        if($query->num_rows() == 1) {
            return $query->custom_result_object('Administrator')[0];
        }
        return FALSE;
    }
}

/* End of file administrator_model.php */
/* Location: ./application/libraries/administrator_model.php */
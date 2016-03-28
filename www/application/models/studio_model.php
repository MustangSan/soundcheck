<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * STUDIO MODEL 
 *---------------------------------------------------------------
 * 
 *
 *
 */

class Studio_model extends CI_Model {

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
        return $this->db->count_all('studios');
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

    public function createStudio($data) {
        if($data instanceof Studio) {
            $this->db->trans_start();
            $this->db->insert('studios', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function updateStudio($data) {
        if($data instanceof Studio) {
            $this->db->trans_start();
            $this->db->where('idStudio', $data->getIdStudio());
            $this->db->update('studios', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function readStudios($idUser = NULL) {
        $this->db->trans_start();
        $this->db->order_by('name ASC');
        if(!is_null($idUser))
            $this->db->where('idUser', $idUser);
        $query = $this->db->get('studios');
        $this->db->trans_complete();

        if($query->num_rows() > 0) {
            return $query->custom_result_object('Studio');
        }
        return FALSE;
    }

    public function getStudio($id) {
        $this->db->trans_start();
        $this->db->where('idStudio', $id);
        $query = $this->db->get('studios');
        $this->db->trans_complete();

        if($query->num_rows() == 1) {
            return $query->custom_result_object('Studio')[0];
        }
        return FALSE;
    }
}

/* End of file studio_model.php */
/* Location: ./application/libraries/studio_model.php */
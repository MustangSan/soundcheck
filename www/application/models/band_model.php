<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * BAND MODEL 
 *---------------------------------------------------------------
 *
 *
 *
 */

class Band_model extends CI_Model {

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
        return $this->db->count_all('bands');
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

    public function createBand($data) {
        if($data instanceof Band) {
            $this->db->trans_start();
            $this->db->insert('bands', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function updateBand($data) {
        if($data instanceof Band) {
            $this->db->trans_start();
            $this->db->where('idBand', $data->getIdBand());
            $this->db->update('bands', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function readBands() {
        $this->db->trans_start();
        $this->db->order_by('name ASC');
        $query = $this->db->get('bands');
        $this->db->trans_complete();

        if($query->num_rows() > 0) {
            return $query->custom_result_object('Band');
        }
        return FALSE;
    }

    public function getBand($id) {
        $this->db->trans_start();
        $this->db->where('idBand', $id);
        $query = $this->db->get('bands');
        $this->db->trans_complete();

        if($query->num_rows() == 1) {
            return $query->custom_result_object('Band')[0];
        }
        return FALSE;
    }
}

/* End of file band_model.php */
/* Location: ./application/libraries/band_model.php */
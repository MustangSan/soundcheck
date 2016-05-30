<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * SHOW MODEL 
 *---------------------------------------------------------------
 * 
 *
 *
 */

class Show_model extends CI_Model {

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
        return $this->db->count_all('shows');
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

    public function createShow($data) {
        if($data instanceof Show) {
            $this->db->trans_start();
            $this->db->insert('shows', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function updateShow($data) {
        if($data instanceof Show) {
            $this->db->trans_start();
            $this->db->where('idShow', $data->getIdShow());
            $this->db->update('shows', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function readShows($idBand = NULL, $idTour = NULL) {
        $this->db->trans_start();
        $this->db->order_by('name ASC');
        if(!is_null($idBand))
            $this->db->where('idBand', $idBand);
        $this->db->where('idTour', $idTour);
        $query = $this->db->get('shows');
        $this->db->trans_complete();

        if($query->num_rows() > 0) {
            return $query->custom_result_object('Show');
        }
        return FALSE;
    }

    public function getShow($id) {
        $this->db->trans_start();
        $this->db->where('idShow', $id);
        $query = $this->db->get('shows');
        $this->db->trans_complete();

        if($query->num_rows() == 1) {
            return $query->custom_result_object('Show')[0];
        }
        return FALSE;
    }
}

/* End of file show_model.php */
/* Location: ./application/libraries/show_model.php */
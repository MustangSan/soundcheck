<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * TOUR MODEL 
 *---------------------------------------------------------------
 * 
 *
 *
 */

class Tour_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Library');
    }

    public function record_count() {
        return $this->db->count_all('tours');
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

    public function createTour($data) {
        if($data instanceof Tour) {
           $this->db->trans_start();
           $this->db->insert('tours', $this->dismountClass($data));
           $this->db->trans_complete();
           $this->db->close();

           if($this->db->trans_status())
              return TRUE;
           return FALSE;
        }
        return FALSE;
    }

    public function updateTour($data) {
        if($data instanceof Tour) {
            $this->db->trans_start();
            $this->db->where('idTour', $data->getIdTour());
            $this->db->update('tours', dismountClass($data));
            $this->db->trans_complete();
            $this->db->close();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function readTours($idBand = NULL) {
        $this->db->trans_start();
        $this->db->order_by('name ASC');
        if(!is_null($idBand))
            $this->db->where('idBand', $idBand);
        $query = $this->db->get('tours');
        $this->db->trans_complete();
        $this->db->close();

        if($query->num_rows() > 0) {
            return $query->custom_result_object('Tour');
        }
        return FALSE;
    }

    public function getTour($id) {
        $this->db->trans_start();
        $this->db->where('idTour', $id);
        $query = $this->db->get('tours');
        $this->db->trans_complete();
        $this->db->close();

        if($query->num_rows() == 1) {
            return $query->custom_result_object('Tour')[0];
        }
        return FALSE;
    }
}

/* End of file tour_model.php */
/* Location: ./application/libraries/tour_model.php */
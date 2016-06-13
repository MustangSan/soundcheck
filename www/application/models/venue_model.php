<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * VENUE MODEL 
 *---------------------------------------------------------------
 * 
 *
 *
 */

class Venue_model extends CI_Model {

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
        return $this->db->count_all('venues');
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

    public function createVenue($data) {
        if($data instanceof Venue) {
            $this->db->trans_start();
            $this->db->insert('venues', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function updateVenue($data) {
        if($data instanceof Venue) {
            $this->db->trans_start();
            $this->db->where('idVenue', $data->getIdVenue());
            $this->db->update('venues', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function readVenues($idUser = NULL) {
        $this->db->trans_start();
        $this->db->order_by('name ASC');
        if(!is_null($idUser))
            $this->db->where('idUser', $idUser);
        $query = $this->db->get('venues');
        $this->db->trans_complete();

        if($query->num_rows() > 0) {
            return $query->custom_result_object('Venue');
        }
        return FALSE;
    }

    public function getVenue($id) {
        $this->db->trans_start();
        $this->db->where('idVenue', $id);
        $query = $this->db->get('venues');
        $this->db->trans_complete();

        if($query->num_rows() == 1) {
            return $query->custom_result_object('Venue')[0];
        }
        return FALSE;
    }

    public function followVenue($idVenue, $idUser) {
        $this->db->trans_start();
        //$data['idVenue'] = $idVenue;
        $data['idVenues'] = $idVenue;
        $data['idUser'] = $idVenue;
        $this->db->insert('venue_followers', $data);
        $this->db->trans_complete();

        if($this->db->trans_status())
            return TRUE;
        return FALSE;
    }
}

/* End of file venue_model.php */
/* Location: ./application/libraries/venue_model.php */
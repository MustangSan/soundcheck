<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * GIG MODEL 
 *---------------------------------------------------------------
 * 
 *
 *
 */

class Gig_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Library');
    }

    public function record_count() {
        return $this->db->count_all('gigs');
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

    public function createGig($data) {
        if($data instanceof Gig) {
           $this->db->trans_start();
           $this->db->insert('gigs', $this->dismountClass($data));
           $this->db->trans_complete();
           $this->db->close();

           if($this->db->trans_status())
              return TRUE;
           return FALSE;
        }
        return FALSE;
    }

    public function updateGig($data) {
        if($data instanceof Gig) {
            $this->db->trans_start();
            $this->db->where('idGig', $data->getIdGig());
            $this->db->update('gigs', dismountClass($data));
            $this->db->trans_complete();
            $this->db->close();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function readGigs($idUser = NULL) {
        $this->db->trans_start();
        $this->db->order_by('status ASC');
        $this->db->order_by('idGig ASC');
        if(!is_null($idUser))
            $this->db->where('idUser', $idUser);
        $query = $this->db->get('gigs');
        $this->db->trans_complete();
        $this->db->close();

        if($query->num_rows() > 0) {
            return $query->custom_result_object('Gig');
        }
        return FALSE;
    }

    public function getGig($id) {
        $this->db->trans_start();
        $this->db->where('idGig', $id);
        $query = $this->db->get('gigs');
        $this->db->trans_complete();
        $this->db->close();

        if($query->num_rows() == 1) {
            return $query->custom_result_object('Gig')[0];
        }
        return FALSE;
    }
}

/* End of file gig_model.php */
/* Location: ./application/libraries/gig_model.php */
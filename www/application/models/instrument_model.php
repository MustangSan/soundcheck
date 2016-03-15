<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * INSTRUMENT MODEL 
 *---------------------------------------------------------------
 * 
 *
 *
 */

class Instrument_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Library');
    }

    public function record_count() {
        return $this->db->count_all('instruments');
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

    public function createInstrument($data) {
        if($data instanceof Instrument) {
           $this->db->trans_start();
           $this->db->insert('instruments', $this->dismountClass($data));
           $this->db->trans_complete();
           $this->db->close();

           if($this->db->trans_status())
              return TRUE;
           return FALSE;
        }
        return FALSE;
    }

    public function updateInstrument($data) {
        if($data instanceof Instrument) {
            $this->db->trans_start();
            $this->db->where('idInstrument', $data->getIdInstrument());
            $this->db->update('instruments', dismountClass($data));
            $this->db->trans_complete();
            $this->db->close();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function readInstruments() {
        $this->db->trans_start();
        $this->db->order_by('name ASC');
        $query = $this->db->get('instruments');
        $this->db->trans_complete();
        $this->db->close();

        if($query->num_rows() > 0) {
            return $query->custom_result_object('Instrument');
        }
        return FALSE;
    }

    public function getInstrument($id) {
        $this->db->trans_start();
        $this->db->where('idInstrument', $id);
        $query = $this->db->get('instruments');
        $this->db->trans_complete();
        $this->db->close();

        if($query->num_rows() == 1) {
            return $query->custom_result_object('Instrument')[0];
        }
        return FALSE;
    }
}

/* End of file instrument_model.php */
/* Location: ./application/libraries/instrument_model.php */
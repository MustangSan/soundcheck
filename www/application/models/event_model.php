<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * EVENT MODEL 
 *---------------------------------------------------------------
 * 
 *
 *
 */

class Event_model extends CI_Model {

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
        return $this->db->count_all('events');
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

    public function createEvent($data) {
        if($data instanceof Event) {
            $this->db->trans_start();
            $this->db->insert('events', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function updateEvent($data) {
        if($data instanceof Event) {
            $this->db->trans_start();
            $this->db->where('idEvent', $data->getIdEvent());
            $this->db->update('events', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function readEvents() {
        $this->db->trans_start();
        $this->db->order_by('name ASC');
        $query = $this->db->get('events');
        $this->db->trans_complete();

        if($query->num_rows() > 0) {
            return $query->custom_result_object('Event');
        }
        return FALSE;
    }

    public function getEvent($id) {
        $this->db->trans_start();
        $this->db->where('idEvent', $id);
        $query = $this->db->get('events');
        $this->db->trans_complete();

        if($query->num_rows() == 1) {
            return $query->custom_result_object('Event')[0];
        }
        return FALSE;
    }
}

/* End of file event_model.php */
/* Location: ./application/libraries/album_model.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * MEMBER MODEL 
 *---------------------------------------------------------------
 * 
 *
 *
 */

class Member_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Library');
    }

    public function record_count() {
        return $this->db->count_all('members');
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

    public function createMember($data) {
        if($data instanceof Member) {
           $this->db->trans_start();
           $this->db->insert('members', $this->dismountClass($data));
           $this->db->trans_complete();
           $this->db->close();

           if($this->db->trans_status())
              return TRUE;
           return FALSE;
        }
        return FALSE;
    }

    public function updateMember($data) {
        if($data instanceof Member) {
            $this->db->trans_start();
            $this->db->where('idMember', $data->getIdMember());
            $this->db->update('members', dismountClass($data));
            $this->db->trans_complete();
            $this->db->close();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function readMembers() {
        $this->db->trans_start();
        $this->db->order_by('name ASC');
        $query = $this->db->get('members');
        $this->db->trans_complete();
        $this->db->close();

        if($query->num_rows() > 0) {
            return $query->custom_result_object('Member');
        }
        return FALSE;
    }

    public function getMember($id) {
        $this->db->trans_start();
        $this->db->where('idMember', $id);
        $query = $this->db->get('members');
        $this->db->trans_complete();
        $this->db->close();

        if($query->num_rows() == 1) {
            return $query->custom_result_object('Member')[0];
        }
        return FALSE;
    }
}

/* End of file member_model.php */
/* Location: ./application/libraries/member_model.php */
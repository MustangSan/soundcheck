<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * LOGIN MODEL 
 *---------------------------------------------------------------
 * 
 *
 *
 */

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
        //$this->load->library('Library');
    }

    public function sing_in() {
        $this->load->database();
        $this->db->trans_start();

        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', md5($this->input->post('password')));
        $this->db->where('status', 'Active');

        $query = $this->db->get('administrators');

        $this->db->trans_complete();
        $this->db->close();

        if($query->num_rows() == 1) {
            return $query->row();
        }

        return NULL;
    }

    public function is_logged() {
        $data = $this->session->userdata('admin');
        $idAdministrator = $data['idAdministrator'];
        $email = $data['email'];
        $permission = $data['permission'];
        
        if(!empty($idAdministrator) && !empty($email)) {
            $this->load->database();
            $this->db->trans_start();

            $this->db->where('idAdministrator', $idAdministrator);
            $this->db->where('email', $email);

            $query = $this->db->get('administrators');

            $this->db->trans_complete();
            $this->db->close();

            if($permission == 'Administrator' || $permission == 'Super-Administrator' || $permission == 'Overlord') {
                //return ($query->num_rows == 1);
                if($query->num_rows() == 1)
                    return TRUE;
                else
                    return FALSE;
            }
            else {
                redirect('administration/login', 'refresh');
            }
        }
        else {
            redirect('administration/login', 'refresh');
        }
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * LOGIN USER MODEL 
 *---------------------------------------------------------------
 * 
 *
 *
 */

class Login_user_model extends CI_Model {

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

        $query = $this->db->get('users');

        $this->db->trans_complete();
        $this->db->close();

        if($query->num_rows() == 1) {
            return $query->row();
        }

        return NULL;
    }

    public function is_logged() {
        $data = $this->session->userdata('user');
        $idUser = $data['idUser'];
        $email = $data['email'];
        //$permission = $this->session->userdata('permission');
        
        if(!empty($idUser) && !empty($email)) {
            $this->load->database();
            $this->db->trans_start();

            $this->db->where('idUser', $idUser);
            $this->db->where('email', $email);

            $query = $this->db->get('users');

            $this->db->trans_complete();
            $this->db->close();

            //if($permission == 'Musician' || $permission == 'Manager' || $permission == 'Overlord') {
                //return ($query->num_rows == 1);
                if($query->num_rows() == 1)
                    return TRUE;
                else
                    return FALSE;
            /*}
            else {
                redirect('login', 'refresh');
            }*/
        }
        else {
            redirect('login', 'refresh');
        }
    }
}
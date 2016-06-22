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
            $this->db->update('members', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function readMembers($idBand = NULL) {
        $this->db->trans_start();
        $this->db->order_by('name ASC');
        if(!is_null($idBand))
            $this->db->where('idBand', $idBand);
        $query = $this->db->get('members');
        $this->db->trans_complete();

        if($query->num_rows() > 0) {
            return $query->custom_result_object('Member');
        }
        return FALSE;
    }

    public function readMembersSignup($idBand = NULL) {
        $this->db->trans_start();
        if(!is_null($idBand))
            $this->db->where('idBand', $idBand);
        $query = $this->db->get('band_members');
        $this->db->trans_complete();

        $users = array();
        if($query->num_rows() > 0) {
            $queryUsers = $query->custom_result_object('User');
            foreach ($queryUsers as $row) {
                $this->db->trans_start();
                /*$this->db->order_by('name ASC');
                $this->db->where('idUser', $row->getIdUser());
                $query = $this->db->get('users');*/

                $this->db->select('u.name, u.photo, bm.instrument');
                $this->db->from('users as u, band_members as bm');
                $this->db->where('u.idUser = bm.idUser and bm.idBand = '.$idBand.' and u.idUser = '.$row->getIdUser());
                $query = $this->db->get();


                $this->db->trans_complete();
                $users[] = array(   'idUser'     => $row->getIdUser(),
                                    'idBand'     => $idBand,
                                    'name'       => $query->row()->name,
                                    'photo'      => $query->row()->photo,
                                    'instrument' => $query->row()->instrument
                                );
            }
            return $users;
        }
        return FALSE;
    }

    public function getMember($id) {
        $this->db->trans_start();
        $this->db->where('idMember', $id);
        $query = $this->db->get('members');
        $this->db->trans_complete();

        if($query->num_rows() == 1) {
            return $query->custom_result_object('Member')[0];
        }
        return FALSE;
    }

    public function insertBandMember($username, $idBand, $instrument) {
        $this->db->trans_start();
        $this->db->where('email', $username);
        $query = $this->db->get('users');

        if($query->num_rows() == 1) {
            $data['idUser'] = $query->row()->idUser;
            $data['idBand'] = $idBand;
            $data['instrument'] = $instrument;
            $this->db->insert('band_members', $data);
            $this->db->trans_complete();
        }
        else
            return FALSE;

        if($this->db->trans_status())
            return TRUE;
        return FALSE;
    }

    public function uptadeSignUpMember($data) {
        $this->db->trans_start();
        $this->db->where('idUser', $data['idUser']);
        $this->db->where('idBand', $data['idBand']);
        $this->db->update('band_members', $data);
        $this->db->trans_complete();

        if($this->db->trans_status())
            return TRUE;
        return FALSE;
    }

    public function getMemberInstrument($idBand, $idUser) {
        $this->db->trans_start();
        $this->db->where('idUser', $idUser);
        $this->db->where('idBand', $idBand);
        $query = $this->db->get('band_members');
        $this->db->trans_complete();

        if($query->num_rows() == 1) {
            return $query->row()->instrument;
        }

        return FALSE;
    }
}

/* End of file member_model.php */
/* Location: ./application/libraries/member_model.php */
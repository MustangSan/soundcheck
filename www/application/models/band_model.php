<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * BAND MODEL 
 *---------------------------------------------------------------
 *
 *
 *
 */

class Band_model extends CI_Model {

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
        return $this->db->count_all('bands');
    }

    public function countMembers($idBand) {
        $this->db->trans_start();
        $query = $this->db->query("select * from members where idBand=".$idBand);
        $this->db->trans_complete();
        $membersCreate = $query->num_rows();

        $this->db->trans_start();
        $query = $this->db->query("select * from band_members where idBand=".$idBand);
        $this->db->trans_complete();
        $membersInsert = $query->num_rows();

        $countMembers = $membersCreate+$membersInsert;
        if($this->db->trans_status())
            return $countMembers;
        return FALSE;
    }

    public function countAlbuns($idBand) {
        $this->db->trans_start();
        $query = $this->db->query("select * from albuns where idBand=".$idBand);
        $this->db->trans_complete();

        if($this->db->trans_status())
            return $query->num_rows();
        return FALSE;
    }

    public function countShows($idBand) {
        $this->db->trans_start();
        $query = $this->db->query("select * from shows where idTour is null and idBand=".$idBand);
        $this->db->trans_complete();

        if($this->db->trans_status())
            return $query->num_rows();
        return FALSE;
    }

    public function countTours($idBand) {
        $this->db->trans_start();
        $query = $this->db->query("select * from tours where idBand=".$idBand);
        $this->db->trans_complete();

        if($this->db->trans_status())
            return $query->num_rows();
        return FALSE;
    }

    public function countPosts($idBand) {
        $this->db->trans_start();
        $query = $this->db->query("select * from posts where idBand=".$idBand);
        $this->db->trans_complete();

        if($this->db->trans_status())
            return $query->num_rows();
        return FALSE;
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

    public function createBand($data) {
        if($data instanceof Band) {
            $this->db->trans_start();
            $this->db->insert('bands', $this->dismountClass($data));
            
            if($this->db->trans_status()){
                unset($data);
                $data['idBand'] = $this->db->insert_id();
                $data['idUser'] = $this->session->userdata('user')['idUser'];

                $this->db->insert('band_members', $data);
            }

            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function updateBand($data) {
        if($data instanceof Band) {
            $this->db->trans_start();
            $this->db->where('idBand', $data->getIdBand());
            $this->db->update('bands', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function readBands($idUser = NULL) {
        $this->db->trans_start();
        $this->db->order_by('name ASC');
        if(!is_null($idUser)) {
            $this->db->select('b.*');
            $this->db->from('bands as b, band_members as bm');
            $this->db->where('b.idBand = bm.idBand and bm.idUser = '.$idUser);
            $query = $this->db->get();
        }
        else
            $query = $this->db->get('bands');
        $this->db->trans_complete();

        if($query->num_rows() > 0) {
            return $query->custom_result_object('Band');
        }
        return FALSE;
    }

    public function getBand($id) {
        $this->db->trans_start();
        $this->db->where('idBand', $id);
        $query = $this->db->get('bands');
        $this->db->trans_complete();

        if($query->num_rows() == 1) {
            return $query->custom_result_object('Band')[0];
        }
        return FALSE;
    }

    public function followBand($idBand,$idUser) {
        $this->db->trans_start();
        $data['idBand'] = $idBand;
        $data['idUser'] = $idUser;
        $this->db->insert('band_followers', $data);
        $this->db->trans_complete();

        if($this->db->trans_status())
            return TRUE;
        return FALSE;
    }
}

/* End of file band_model.php */
/* Location: ./application/libraries/band_model.php */
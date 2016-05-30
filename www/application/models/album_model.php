<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * ALBUM MODEL 
 *---------------------------------------------------------------
 * 
 *
 *
 */

class Album_model extends CI_Model {

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
        return $this->db->count_all('albuns');
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

    public function createAlbum($data) {
        if($data instanceof Album) {
            $this->db->trans_start();
            $this->db->insert('albuns', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function updateAlbum($data) {
        if($data instanceof Album) {
            $this->db->trans_start();
            $this->db->where('idAlbum', $data->getIdAlbum());
            $this->db->update('albuns', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function readAlbuns($idBand = NULL) {
        $this->db->trans_start();
        $this->db->order_by('name ASC');
        if(!is_null($idBand))
            $this->db->where('idBand', $idBand);
        $query = $this->db->get('albuns');
        $this->db->trans_complete();

        if($query->num_rows() > 0) {
            return $query->custom_result_object('Album');
        }
        return FALSE;
    }

    public function getAlbum($id) {
        $this->db->trans_start();
        $this->db->where('idAlbum', $id);
        $query = $this->db->get('albuns');
        $this->db->trans_complete();

        if($query->num_rows() == 1) {
            return $query->custom_result_object('Album')[0];
        }
        return FALSE;
    }
}

/* End of file album_model.php */
/* Location: ./application/libraries/album_model.php */
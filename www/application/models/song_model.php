<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * SONG MODEL 
 *---------------------------------------------------------------
 * 
 *
 *
 */

class Song_model extends CI_Model {

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
        return $this->db->count_all('songs');
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

    public function createSong($data) {
        if($data instanceof Song) {
            $this->db->trans_start();
            $this->db->insert('songs', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function updateSong($data) {
        if($data instanceof Song) {
            $this->db->trans_start();
            $this->db->where('idSong', $data->getIdSong());
            $this->db->update('songs', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function readSongs($idAlbum = NULL) {
        $this->db->trans_start();
        $this->db->order_by('idAlbum ASC');
        $this->db->order_by('idBand ASC');
        $this->db->order_by('trackNumber ASC');
        if(!is_null($idAlbum))
            $this->db->where('idAlbum', $idAlbum);
        $query = $this->db->get('songs');
        $this->db->trans_complete();

        if($query->num_rows() > 0) {
            return $query->custom_result_object('Song');
        }
        return FALSE;
    }

    public function getSong($id) {
        $this->db->trans_start();
        $this->db->where('idSong', $id);
        $query = $this->db->get('songs');
        $this->db->trans_complete();

        if($query->num_rows() == 1) {
            return $query->custom_result_object('Song')[0];
        }
        return FALSE;
    }
}

/* End of file song_model.php */
/* Location: ./application/libraries/song_model.php */
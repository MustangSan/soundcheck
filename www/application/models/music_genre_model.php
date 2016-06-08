<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * Music_Genre MODEL 
 *---------------------------------------------------------------
 * 
 *
 *
 */

class Music_Genre_model extends CI_Model {

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
        return $this->db->count_all('music_genres');
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

    public function createMusicGenre($data) {
        if($data instanceof Music_Genre) {
            $this->db->trans_start();
            $this->db->insert('music_genres', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function updateMusicGenre($data) {
        if($data instanceof Music_Genre) {
            $this->db->trans_start();
            $this->db->where('idMusicGenre', $data->getIdMusicGenre());
            $this->db->update('music_genres', $this->dismountClass($data));
            $this->db->trans_complete();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function readMusicGenres($idBand = NULL) {
        $this->db->trans_start();
        $this->db->order_by('name ASC');
        if(!is_null($idBand))
            $this->db->where('idBand', $idBand);
        $query = $this->db->get('music_genres');
        $this->db->trans_complete();

        if($query->num_rows() > 0) {
            return $query->custom_result_object('Music_Genre');
        }
        return FALSE;
    }

    public function getMusicGenre($id) {
        $this->db->trans_start();
        $this->db->where('idMusicGenre', $id);
        $query = $this->db->get('music_genres');
        $this->db->trans_complete();

        if($query->num_rows() == 1) {
            return $query->custom_result_object('Music_Genre')[0];
        }
        return FALSE;
    }
}

/* End of file music_genre_model.php */
/* Location: ./application/libraries/music_genre_model.php */
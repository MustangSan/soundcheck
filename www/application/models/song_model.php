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

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Library');
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
           $this->db->close();

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
            $this->db->update('songs', dismountClass($data));
            $this->db->trans_complete();
            $this->db->close();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function readSongs($idAlbum) {
        $this->db->trans_start();
        $this->db->order_by('name ASC');
        $this->db->where('idAlbum', $idAlbum);
        $query = $this->db->get('songs');
        $this->db->trans_complete();
        $this->db->close();

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
        $this->db->close();

        if($query->num_rows() == 1) {
            return $query->custom_result_object('Song')[0];
        }
        return FALSE;
    }
}

/* End of file song_model.php */
/* Location: ./application/libraries/song_model.php */
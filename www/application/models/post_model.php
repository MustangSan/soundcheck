<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * POST MODEL 
 *---------------------------------------------------------------
 * 
 *
 *
 */

class Post_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Library');
    }

    public function record_count() {
        return $this->db->count_all('posts');
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

    public function createPost($data) {
        if($data instanceof Post) {
           $this->db->trans_start();
           $this->db->insert('posts', $this->dismountClass($data));
           $this->db->trans_complete();
           $this->db->close();

           if($this->db->trans_status())
              return TRUE;
           return FALSE;
        }
        return FALSE;
    }

    public function updatePost($data) {
        if($data instanceof Post) {
            $this->db->trans_start();
            $this->db->where('idPost', $data->getIdPost());
            $this->db->update('posts', dismountClass($data));
            $this->db->trans_complete();
            $this->db->close();

            if($this->db->trans_status())
                return TRUE;
            return FALSE;
        }
        return FALSE;
    }

    public function readPosts($idBand) {
        $this->db->trans_start();
        $this->db->order_by('date DESC');
        $this->db->where('idBand', $idBand);
        $query = $this->db->get('posts');
        $this->db->trans_complete();
        $this->db->close();

        if($query->num_rows() > 0) {
            return $query->custom_result_object('Post');
        }
        return FALSE;
    }

    public function getPost($id) {
        $this->db->trans_start();
        $this->db->where('idPost', $id);
        $query = $this->db->get('posts');
        $this->db->trans_complete();
        $this->db->close();

        if($query->num_rows() == 1) {
            return $query->custom_result_object('Post')[0];
        }
        return FALSE;
    }
}

/* End of file post_model.php */
/* Location: ./application/libraries/post_model.php */
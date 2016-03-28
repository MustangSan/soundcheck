<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER MUSIC GENRE
 *---------------------------------------------------------------
 *
 *
 *
 */

class Music_genres extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');

        $this->load->model('Music_genre_model', 'MGenre');
    }

    public function index() {
        $this->MGenre->startDatabase();
        $data['music_genres'] = $this->MGenre->readMusicGenres();
        $this->MGenre->closeDatabase();
        $this->load->view('music_genre/music_genre_list_view', $data);
    }

    public function createMusicGenre() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'name' => $this->input->post('name')
                        );
            $this->load->view('music_genre/music_genre_create_view', $data);
        }
        else {
            $data = new Music_genre ([NULL, $this->input->post('name')]);
            $this->MGenre->startDatabase();
            $result = $this->MGenre->createMusicGenre($data);
            $this->MGenre->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('music_genres');
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('music_genres');
            }
        }
    }

    public function updateMusicGenre($id) {
        $this->MGenre->startDatabase();
        $music_genre = $this->MGenre->getMusicGenre($id);
        $this->MGenre->closeDatabase();

        if(!empty($music_genre)) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');

            if($this->form_validation->run() == FALSE) {
                $data = array(  'name' => $music_genre->getName()
                            );
                $this->load->view('music_genre/music_genre_update_view', $data);
            }
            else {
                $data = new Music_genre ([  $music_genre->getIdMusicGenre(),
                                            $this->input->post('name')
                                        ]);
                $this->MGenre->startDatabase();
                $result = $this->MGenre->updateMusicGenre($data);
                $this->MGenre->closeDatabase();

                if($result) {
                    $this->session->set_flashdata('result', 'updateSuccess');
                    redirect('music_genres');
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('music_genres');
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }
}
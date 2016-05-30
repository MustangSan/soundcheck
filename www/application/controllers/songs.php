<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER SONG
 *---------------------------------------------------------------
 *
 *
 *
 */

class Songs extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');

        $this->load->model('Song_model', 'Song');
        $this->load->model('Login_user_model', 'Login');

        if(!$this->Login->is_logged())
            redirect('login', 'refresh');

        if($this->session->userdata('user')['permission'] !== 'musician' && $this->session->userdata('user')['permission'] !== 'M&M')
            redirect('home', 'refresh');
    }

    public function index() {
        $this->Song->startDatabase();
        $data['songs'] = $this->Song->readSongs();
        $this->Song->closeDatabase();
        $this->load->view('song/song_list_view', $data);
    }

    public function createSong() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('trackNumber', 'Track Number', 'trim|required');
        $this->form_validation->set_rules('genre', 'Genre', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'name'          => $this->input->post('name'),
                            'trackNumber'   => $this->input->post('trackNumber'),
                            'genre'         => $this->input->post('genre')
                        );
            $this->load->view('song/song_create_view', $data);
        }
        else {
            $data = new Song ([ NULL, 1, 1,
                                $this->input->post('name'),
                                $this->input->post('trackNumber'),
                                $this->input->post('genre')
                            ]);
            $this->Song->startDatabase();
            $result = $this->Song->createSong($data);
            $this->Song->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('songs');
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('songs');
            }
        }
    }

    public function updateSong($id) {
        $this->Song->startDatabase();
        $song = $this->Song->getSong($id);
        $this->Song->closeDatabase();

        if(!empty($song)) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('trackNumber', 'Track Number', 'trim|required');
            $this->form_validation->set_rules('genre', 'Genre', 'trim|required');

            if($this->form_validation->run() == FALSE) {
                $data = array(  'name'          => $song->getName(),
                                'trackNumber'   => $song->getTrackNumber(),
                                'genre'         => $song->getGenre()
                            );
                $this->load->view('song/song_update_view', $data);
            }
            else {
                $data = new Song ([ $song->getIdSong(),
                                    $song->getIdAlbum(),
                                    $song->getIdBand(),
                                    $this->input->post('name'),
                                    $this->input->post('trackNumber'),
                                    $this->input->post('genre')
                                ]);
                $this->Song->startDatabase();
                $result = $this->Song->updateSong($data);
                $this->Song->closeDatabase();

                if($result) {
                    $this->session->set_flashdata('result', 'updateSuccess');
                    redirect('songs');
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('songs');
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER ALBUM
 *---------------------------------------------------------------
 *
 *
 *
 */

class Albuns extends CI_Controller {

    private $album;

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');

        $this->load->model('Album_model', 'Album');

        $config['upload_path']      = './content-uploaded/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 900;
        $config['max_width']        = 300;
        $config['max_height']       = 300;
        $this->load->library('upload', $config);
    }

    public function handle_upload() {
        if (isset($_FILES['coverArt']) && !empty($_FILES['coverArt']['name'])) {
            if ($this->upload->do_upload('coverArt')) {
                if(!empty($this->album))
                    unlink('./content-uploaded/'.$this->album->getCoverArt());
                
                $upload_data    = $this->upload->data();
                $_POST['coverArt'] = $upload_data['file_name'];
                return TRUE;
            }
            else {
                $this->form_validation->set_message('handle_upload', $this->upload->display_errors());
                return FALSE;
            }
            return TRUE;
        }
        else {
            if(empty($this->album)) {
                $this->form_validation->set_message('handle_upload', "You must upload an image!");
                return FALSE;
            }
            else
                $_POST['coverArt'] = $this->album->getCoverArt();
        }
    }

    public function index() {
        $this->Album->startDatabase();
        $data['albuns'] = $this->Album->readAlbuns();
        $this->Album->closeDatabase();
        $this->load->view('album/album_list_view', $data);
    }

    public function createAlbum() {
        $this->form_validation->set_rules('coverArt', 'Cover Art', 'callback_handle_upload');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('genre', 'Genre', 'trim|required');
        $this->form_validation->set_rules('releaseDate', 'Release Date', 'trim|required');
        $this->form_validation->set_rules('label', 'Label', 'trim|required');
        $this->form_validation->set_rules('copyrightDate', 'Copyright Date', 'trim|required');
        $this->form_validation->set_rules('sellerLink', 'Sellers Link', 'trim');
        $this->form_validation->set_rules('listeningLink', 'Listening Link', 'trim');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'name'          => $this->input->post('name'),
                            'genre'         => $this->input->post('genre'),
                            'releaseDate'   => $this->input->post('releaseDate'),
                            'label'         => $this->input->post('label'),
                            'copyrightDate' => $this->input->post('copyrightDate'),
                            'sellerLink'    => $this->input->post('sellerLink'),
                            'listeningLink' => $this->input->post('listeningLink')
                        );
            $this->load->view('album/album_create_view', $data);
        }
        else {
            $data = new Album ([NULL,1,
                                $this->input->post('name'),
                                $this->input->post('coverArt'),
                                $this->input->post('genre'),
                                $this->input->post('releaseDate'),
                                $this->input->post('label'),
                                $this->input->post('copyrightDate'),
                                $this->input->post('sellerLink'),
                                $this->input->post('listeningLink')
                            ]);
            $this->Album->startDatabase();
            $result = $this->Album->createAlbum($data);
            $this->Album->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('albuns');
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('albuns');
            }
        }
    }

    public function updateAlbum($id) {
        $this->Album->startDatabase();
        $this->album = $this->Album->getAlbum($id);
        $this->Album->closeDatabase();

        if(!empty($this->album)) {
            $this->form_validation->set_rules('coverArt', 'Cover Art', 'callback_handle_upload');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('genre', 'Genre', 'trim|required');
            $this->form_validation->set_rules('releaseDate', 'Release Date', 'trim|required');
            $this->form_validation->set_rules('label', 'Label', 'trim|required');
            $this->form_validation->set_rules('copyrightDate', 'Copyright Date', 'trim|required');
            $this->form_validation->set_rules('sellerLink', 'Sellers Link', 'trim');
            $this->form_validation->set_rules('listeningLink', 'Listening Link', 'trim');

            if($this->form_validation->run() == FALSE) {
                $data = array(  'name'          => $this->album->getName(),
                                'genre'         => $this->album->getGenre(),
                                'releaseDate'   => $this->album->getReleaseDate(),
                                'label'         => $this->album->getLabel(),
                                'copyrightDate' => $this->album->getCopyrightDate(),
                                'sellerLink'    => $this->album->getSellerLink(),
                                'listeningLink' => $this->album->getListeningLink()
                            );
                $this->load->view('album/album_update_view', $data);
            }
            else {
                $data = new Album ([$this->album->getIdAlbum(),
                                    $this->album->getIdBand(),
                                    $this->input->post('name'),
                                    $this->input->post('coverArt'),
                                    $this->input->post('genre'),
                                    $this->input->post('releaseDate'),
                                    $this->input->post('label'),
                                    $this->input->post('copyrightDate'),
                                    $this->input->post('sellerLink'),
                                    $this->input->post('listeningLink')
                                ]);
                $this->Album->startDatabase();
                $result = $this->Album->updateAlbum($data);
                $this->Album->closeDatabase();

                if($result) {
                    $this->session->set_flashdata('result', 'updateSuccess');
                    redirect('albuns');
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('albuns');
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }
}
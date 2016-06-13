<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER BAND
 *---------------------------------------------------------------
 *
 *
 *
 */

class Bands extends CI_Controller {

    private $band;

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');

        $this->load->model('Band_model', 'Band');
        $this->load->model('Album_model', 'Album');
        $this->load->model('Song_model', 'Song');
        $this->load->model('Tour_model', 'Tour');
        $this->load->model('Show_model', 'Show');
        $this->load->model('Member_model', 'Member');
        $this->load->model('Post_model', 'Post');
        $this->load->model('Login_user_model', 'Login');

        if(!$this->Login->is_logged())
            redirect('login', 'refresh');

        //if($this->session->userdata('user')['permission'] !== 'musician' && $this->session->userdata('user')['permission'] !== 'M&M')
            //redirect('home', 'refresh');        

        $config['upload_path']      = './content-uploaded/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 900;
        $config['max_width']        = 300;
        $config['max_height']       = 300;
        $this->load->library('upload', $config);
    }

    public function permissionTest() {
        if($this->session->userdata('user')['permission'] !== 'musician' && $this->session->userdata('user')['permission'] !== 'M&M')
            redirect('home', 'refresh');
    }

    public function handle_upload() {
        if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
            if ($this->upload->do_upload('photo')) {
                if(!empty($this->band))
                    unlink('./content-uploaded/'.$this->band->getPhoto());
                
                $upload_data    = $this->upload->data();
                $_POST['photo'] = $upload_data['file_name'];
                return TRUE;
            }
            else {
                $this->form_validation->set_message('handle_upload', $this->upload->display_errors());
                return FALSE;
            }
            return TRUE;
        }
        else {
            if(empty($this->band)) {
                $this->form_validation->set_message('handle_upload', "You must upload an image!");
                return FALSE;
            }
            else
                $_POST['photo'] = $this->band->getPhoto();
        }
    }

    public function index() {
        //redirect('home', 'refresh');
        $this->Band->startDatabase();
        $data['bands'] = $this->Band->readBands();
        $this->Band->closeDatabase();
        $this->load->view('band/band_search_view', $data);
    }

    public function myBands() {
        $this->permissionTest();
        $this->Band->startDatabase();
        $data['bands'] = $this->Band->readBands($this->session->userdata('user')['idUser']);
        $this->Band->closeDatabase();
        $this->load->view('band/band_list_view', $data);
    }

    public function createBand() {
        $this->permissionTest();
        $this->form_validation->set_rules('photo', 'Photo', 'callback_handle_upload');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('about', 'About', 'trim|required');
        $this->form_validation->set_rules('website', 'Website', 'trim');
        $this->form_validation->set_rules('facebook', 'Facebook', 'trim');
        $this->form_validation->set_rules('twitter', 'Twitter', 'trim');
        $this->form_validation->set_rules('youtube', 'Youtube', 'trim');
        $this->form_validation->set_rules('myspace', 'Myspace', 'trim');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('estate', 'Estate', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim');
        $this->form_validation->set_rules('contactEmail', 'Contact Email', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'name'          => $this->input->post('name'),
                            'about'         => $this->input->post('about'),
                            'website'       => $this->input->post('website'),
                            'facebook'      => $this->input->post('facebook'),
                            'twitter'       => $this->input->post('twitter'),
                            'youtube'       => $this->input->post('youtube'),
                            'myspace'       => $this->input->post('myspace'),
                            'country'       => $this->input->post('country'),
                            'estate'        => $this->input->post('estate'),
                            'city'          => $this->input->post('city'),
                            'phone'         => $this->input->post('phone'),
                            'contactEmail'  => $this->input->post('contactEmail')
                        );
            $this->load->view('band/band_create_view', $data);
        }
        else {
            $data = new Band ([ NULL,
                                $this->input->post('name'),
                                $this->input->post('about'),
                                $this->input->post('photo'),
                                $this->input->post('website'),
                                $this->input->post('facebook'),
                                $this->input->post('twitter'),
                                $this->input->post('youtube'),
                                $this->input->post('myspace'),
                                $this->input->post('country'),
                                $this->input->post('estate'),
                                $this->input->post('city'),
                                $this->input->post('phone'),
                                $this->input->post('contactEmail')
                            ]);
            $this->Band->startDatabase();
            $result = $this->Band->createBand($data);
            $this->Band->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('bands');
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('bands');
            }
        }
    }

    public function updateBand($id) {
        $this->permissionTest();
        $this->Band->startDatabase();
        $this->band = $this->Band->getBand($id);
        $this->Band->closeDatabase();
        
        if(!empty($this->band)) {
            $this->form_validation->set_rules('photo', 'Photo', 'callback_handle_upload');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('about', 'About', 'trim|required');
            $this->form_validation->set_rules('website', 'Website', 'trim');
            $this->form_validation->set_rules('facebook', 'Facebook', 'trim');
            $this->form_validation->set_rules('twitter', 'Twitter', 'trim');
            $this->form_validation->set_rules('youtube', 'Youtube', 'trim');
            $this->form_validation->set_rules('myspace', 'Myspace', 'trim');
            $this->form_validation->set_rules('country', 'Country', 'trim|required');
            $this->form_validation->set_rules('estate', 'Estate', 'trim|required');
            $this->form_validation->set_rules('city', 'City', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone', 'trim');
            $this->form_validation->set_rules('contactEmail', 'Contact Email', 'trim|required');

            if($this->form_validation->run() == FALSE) {
                $data = array(  'name'          => $this->band->getName(),
                                'about'         => $this->band->getAbout(),
                                'website'       => $this->band->getWebsite(),
                                'facebook'      => $this->band->getFacebook(),
                                'twitter'       => $this->band->getTwitter(),
                                'youtube'       => $this->band->getYoutube(),
                                'myspace'       => $this->band->getMyspace(),
                                'country'       => $this->band->getCountry(),
                                'estate'        => $this->band->getEstate(),
                                'city'          => $this->band->getCity(),
                                'phone'         => $this->band->getPhone(),
                                'contactEmail'  => $this->band->getContactEmail()
                            );
                $this->load->view('band/band_update_view', $data);
            }
            else {
                $data = new Band ([ $this->band->getIdBand(),
                                    $this->input->post('name'),
                                    $this->input->post('about'),
                                    $this->input->post('photo'),
                                    $this->input->post('website'),
                                    $this->input->post('facebook'),
                                    $this->input->post('twitter'),
                                    $this->input->post('youtube'),
                                    $this->input->post('myspace'),
                                    $this->input->post('country'),
                                    $this->input->post('estate'),
                                    $this->input->post('city'),
                                    $this->input->post('phone'),
                                    $this->input->post('contactEmail')
                                ]);
                $this->Band->startDatabase();
                $result = $this->Band->updateBand($data);
                $this->Band->closeDatabase();

                if($result) {
                    $this->session->set_flashdata('result', 'updateSuccess');
                    redirect('bands');
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('bands');
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }

    public function editProfile($id) {
        $this->permissionTest();
        $this->Band->startDatabase();
        $this->band = $this->Band->getBand($id);
        $this->Band->closeDatabase();

        if(!empty($this->band)) {
            $data['band'] = $this->band;
            $this->load->view('band/band_editProfile_view', $data);
        }
        else
            $this->load->view('errors/html/error_404');
    }

    public function profile($id) {
        $this->Band->startDatabase();
        $this->band = $this->Band->getBand($id);
        $this->Band->closeDatabase();

        if(!empty($this->band)) {
            $data['band'] = $this->band;
            $this->load->view('band/band_profile_view', $data);
        }
        else
            $this->load->view('errors/html/error_404');
    }

    public function followBand($idBand) {
        if(!isset($idBand) || empty($idBand))
            redirect('bands', 'refresh');

        $this->Band->startDatabase();
        $result = $this->Band->followBand($idBand, $this->session->userdata('user')['idUser']);
        $this->Band->closeDatabase();

        if(isset($_SERVER['HTTP_REFERER']))
        {
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
        else
        {
            header('Location: http://'.$_SERVER['SERVER_NAME']);
        }
        exit;
    }

    public function albuns($idBand) {
        if(!isset($idBand) || empty($idBand))
            redirect('bands', 'refresh');

        $data['idBand'] = $idBand;
        $this->Album->startDatabase();
        $albuns = $this->Album->readAlbuns($idBand);
        $this->Album->closeDatabase();

        if(!empty($albuns))
            foreach ($albuns as $album) {
                $info['album'] = $album;
                $this->Song->startDatabase();
                $info['songs'] = $this->Song->readSongs($album->getIdAlbum());
                $this->Song->closeDatabase();
                $data['albuns'][] = $info;
            }
        $this->load->view('band/band_album_view', $data);
    }

    public function shows($idBand) {
        if(!isset($idBand) || empty($idBand))
            redirect('home', 'refresh');
        
        $data['idBand'] = $idBand;
        $this->Show->startDatabase();
        $data['shows'] = $this->Show->readShows($idBand);
        $this->Show->closeDatabase();
        $this->load->view('band/band_show_view', $data);
    }

    public function tours($idBand) {
        if(!isset($idBand) || empty($idBand))
            redirect('bands', 'refresh');

        $data['idBand'] = $idBand;
        $this->Tour->startDatabase();
        $tours = $this->Tour->readTours($idBand);
        $this->Tour->closeDatabase();

        if(!empty($tours))
            foreach ($tours as $tour) {
                $info['tour'] = $tour;
                $this->Show->startDatabase();
                $info['shows'] = $this->Show->readShows($idBand, $tour->getIdTour());
                $this->Show->closeDatabase();
                $data['tours'][] = $info;
            }
        /*echo "<pre><code>";
        var_dump($data);
        echo "</pre></code>";
        exit();*/
        $this->load->view('band/band_tour_view', $data);
    }

    public function members($idBand) {
        if(!isset($idBand) || empty($idBand))
            redirect('home', 'refresh');
        
        $data['idBand'] = $idBand;
        $this->Member->startDatabase();
        $data['members'] = $this->Member->readMembers($idBand);
        $data['membersSignup'] = $this->Member->readMembersSignup($idBand);
        $this->Member->closeDatabase();
        $this->load->view('band/band_member_view', $data);
    }

    public function blog($idBand) {
        if(!isset($idBand) || empty($idBand))
            redirect('home', 'refresh');
        
        $data['idBand'] = $idBand;
        $this->Post->startDatabase();
        $data['posts'] = $this->Post->readPosts($idBand);
        $this->Post->closeDatabase();
        $this->load->view('band/band_blog_view', $data);
    }
}
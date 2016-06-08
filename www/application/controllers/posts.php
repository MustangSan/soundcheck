<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER POST
 *---------------------------------------------------------------
 *
 *
 *
 */

class Posts extends CI_Controller {

    private $post;

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');

        $this->load->model('Post_model', 'Post');
        $this->load->model('Login_user_model', 'Login');

        if(!$this->Login->is_logged())
            redirect('login', 'refresh');

        $config['upload_path']      = './content-uploaded/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 900;
        $config['max_width']        = 300;
        $config['max_height']       = 300;
        $this->load->library('upload', $config);
    }

    public function handle_upload() {
        if (isset($_FILES['featuredImage']) && !empty($_FILES['featuredImage']['name'])) {
            if ($this->upload->do_upload('featuredImage')) {
                if(!empty($this->post))
                    unlink('./content-uploaded/'.$this->post->getFeaturedImage());
                
                $upload_data = $this->upload->data();
                $_POST['featuredImage'] = $upload_data['file_name'];
                return TRUE;
            }
            else {
                $this->form_validation->set_message('handle_upload', $this->upload->display_errors());
                return FALSE;
            }
            return TRUE;
        }
        else {
            if(empty($this->post)) {
                $this->form_validation->set_message('handle_upload', "You must upload an image!");
                return FALSE;
            }
            else
                $_POST['featuredImage'] = $this->post->getFeaturedImage();
        }
    }

    public function index() {
        redirect('home', 'refresh');
        /*$this->Post->startDatabase();
        $data['posts'] = $this->Post->readPosts();
        $this->Post->closeDatabase();
        $this->load->view('post/post_list_view', $data);*/
    }

    public function myPosts($idBand = NULL) {
        if(!isset($idBand) || empty($idBand))
            redirect('home', 'refresh');
        
        $data['idBand'] = $idBand;
        $this->Post->startDatabase();
        $data['posts'] = $this->Post->readPosts($idBand);
        $this->Post->closeDatabase();
        $this->load->view('post/post_list_view', $data);
    }

    public function createPost($idBand = NULL) {
        if(!isset($idBand) || empty($idBand))
            redirect('home', 'refresh');

        $this->form_validation->set_rules('featuredImage', 'Featured Image', 'callback_handle_upload');
        $this->form_validation->set_rules('postName', 'Post Name', 'trim|required');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'postName'          => $this->input->post('postName'),
                            'title'             => $this->input->post('title'),
                            'content'           => $this->input->post('content'),
                            'date'              => $this->input->post('date'),
                            'status'            => $this->input->post('status')
                        );
            $data['idBand'] = $idBand;
            $this->load->view('post/post_create_view', $data);
        }
        else {
            $data = new Post ([ NULL,
                                $idBand,
                                $this->session->userdata('user')['idUser'],
                                $this->input->post('postName'),
                                $this->input->post('title'),
                                $this->input->post('content'),
                                $this->input->post('featuredImage'),
                                $this->input->post('date'),
                                $this->input->post('status')
                            ]);
            $this->Post->startDatabase();
            $result = $this->Post->createPost($data);
            $this->Post->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('posts/myPosts/'.$idBand);
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('posts/myPosts/'.$idBand);
            }
        }
    }

    public function updatePost($id) {
        if(!isset($id) || empty($id))
            redirect('home', 'refresh');

        $this->Post->startDatabase();
        $this->post = $this->Post->getPost($id);
        $this->Post->closeDatabase();

        if(!empty($this->post)) {
            $this->form_validation->set_rules('featuredImage', 'Featured Image', 'callback_handle_upload');
            $this->form_validation->set_rules('postName', 'Post Name', 'trim|required');
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('content', 'Content', 'trim|required');
            $this->form_validation->set_rules('date', 'Date', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');

            if($this->form_validation->run() == FALSE) {
                $data = array(  'postName'          => $this->post->getPostName(),
                                'title'             => $this->post->getTitle(),
                                'content'           => $this->post->getContent(),
                                'date'              => $this->post->getDate(),
                                'status'            => $this->post->getStatus()
                            );
                $data['idBand'] = $this->post->getIdBand();
                $this->load->view('post/post_update_view', $data);
            }
            else {
                $data = new Post ([ $this->post->getIdPost(),
                                    $this->post->getIdBand(),
                                    $this->post->getIdAuthor(),
                                    $this->input->post('postName'),
                                    $this->input->post('title'),
                                    $this->input->post('content'),
                                    $this->input->post('featuredImage'),
                                    $this->input->post('date'),
                                    $this->input->post('status')
                                ]);
                $this->Post->startDatabase();
                $result = $this->Post->updatePost($data);
                $this->Post->closeDatabase();

                if($result) {
                    $this->session->set_flashdata('result', 'updateSuccess');
                    redirect('posts/myPosts/'.$this->post->getIdBand());
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('posts/myPosts/'.$this->post->getIdBand());
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }
}
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

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');

        $this->load->model('Post_model', 'Post');
        $this->load->model('Login_user_model', 'Login');

        if(!$this->Login->is_logged())
            redirect('login', 'refresh');

<<<<<<< HEAD
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
=======
        if($this->session->userdata('user')['permission'] !== 'musician' || $this->session->userdata('user')['permission'] !== 'M&M')
            redirect('home', 'refresh');
>>>>>>> f4ca37eac2f6d9c6c4c4f7a8c198de6116273c16
    }

    public function index() {
        $this->Post->startDatabase();
        $data['posts'] = $this->Post->readPosts();
        $this->Post->closeDatabase();
        $this->load->view('post/post_list_view', $data);
    }

    public function createPost() {
        $this->form_validation->set_rules('postName', 'Post Name', 'trim|required');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');
        $this->form_validation->set_rules('featuredImage', 'Featured Image', 'callback_handle_upload');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'postName'          => $this->input->post('postName'),
                            'title'             => $this->input->post('title'),
                            'content'           => $this->input->post('content'),
                            'featuredImage'     => $this->input->post('featuredImage'),
                            'date'              => $this->input->post('date'),
                            'status'            => $this->input->post('status')
                        );
            $this->load->view('post/post_create_view', $data);
        }
        else {
            $data = new Post ([ NULL,1,1,
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
                redirect('posts');
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('posts');
            }
        }
    }

    public function updatePost($id) {
        $this->Post->startDatabase();
        $post = $this->Post->getPost($id);
        $this->Post->closeDatabase();

        if(!empty($post)) {
            $this->form_validation->set_rules('postName', 'Post Name', 'trim|required');
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('content', 'Content', 'trim|required');
            $this->form_validation->set_rules('featuredImage', 'Featured Image', 'callback_handle_upload');
            $this->form_validation->set_rules('date', 'Date', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');

            if($this->form_validation->run() == FALSE) {
                $data = array(  'postName'          => $post->getPostName(),
                                'title'             => $post->getTitle(),
                                'content'           => $post->getContent(),
                                'featuredImage'     => $post->getFeaturedImage(),
                                'date'              => $post->getDate(),
                                'status'            => $post->getStatus()
                            );
                $this->load->view('post/post_update_view', $data);
            }
            else {
                $data = new Post ([ $post->getIdPost(),
                                    $post->getIdBand(),
                                    $post->getIdAuthor(),
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
                    redirect('posts');
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('posts');
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }
}
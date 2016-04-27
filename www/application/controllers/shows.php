<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER SHOW
 *---------------------------------------------------------------
 *
 *
 *
 */

class Shows extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');

        $this->load->model('Show_model', 'Show');
        $this->load->model('Login_user_model', 'Login');

        if(!$this->Login->is_logged())
            redirect('login', 'refresh');
    }

    public function index() {
        $this->Show->startDatabase();
        $data['shows'] = $this->Show->readShows();
        $this->Show->closeDatabase();
        $this->load->view('show/show_list_view', $data);
    }

    public function createShow() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('timetable', 'Timetable', 'trim|required');
        $this->form_validation->set_rules('place', 'Place', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'name'          => $this->input->post('name'),
                            'description'   => $this->input->post('description'),
                            'date'          => $this->input->post('date'),
                            'timetable'     => $this->input->post('timetable'),
                            'place'         => $this->input->post('place')
                        );
            $this->load->view('show/show_create_view', $data);
        }
        else {
            $data = new Show ([ NULL,1,
                                NULL,
                                $this->input->post('name'),
                                $this->input->post('description'),
                                $this->input->post('date'),
                                $this->input->post('timetable'),
                                $this->input->post('place')
                            ]);
            $this->Show->startDatabase();
            $result = $this->Show->createShow($data);
            $this->Show->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('shows');
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('shows');
            }
        }
    }

    public function updateShow($id) {
        $this->Show->startDatabase();
        $show = $this->Show->getShow($id);
        $this->Show->closeDatabase();

        if(!empty($show)) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            $this->form_validation->set_rules('date', 'Date', 'trim|required');
            $this->form_validation->set_rules('timetable', 'Timetable', 'trim|required');
            $this->form_validation->set_rules('place', 'Place', 'trim|required');

            if($this->form_validation->run() == FALSE) {
                $data = array(  'name'          => $show->getName(),
                                'description'   => $show->getDescription(),
                                'date'          => $show->getDate(),
                                'timetable'     => $show->getTimetable(),
                                'place'         => $show->getPlace()
                            );
                $this->load->view('show/show_update_view', $data);
            }

            else {
                $data = new Show ([ $show->getIdShow(),
                                    $show->getIdBand(),
                                    $show->getIdTour(),
                                    $this->input->post('name'),
                                    $this->input->post('description'),
                                    $this->input->post('date'),
                                    $this->input->post('timetable'),
                                    $this->input->post('place')
                                ]);
                $this->Show->startDatabase();
                $result = $this->Show->updateShow($data);
                $this->Show->closeDatabase();

                if($result) {
                    $this->session->set_flashdata('result', 'updateSuccess');
                    redirect('shows');
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('shows');
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }
}
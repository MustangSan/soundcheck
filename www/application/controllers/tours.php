<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER TOUR
 *---------------------------------------------------------------
 *
 *
 *
 */

class Tours extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');

        $this->load->model('Tour_model', 'Tour');
        $this->load->model('Login_user_model', 'Login');

        if(!$this->Login->is_logged())
            redirect('login', 'refresh');
    }

    public function index() {
        $this->Tour->startDatabase();
        $data['tours'] = $this->Tour->readTours();
        $this->Tour->closeDatabase();
        $this->load->view('tour/tour_list_view', $data);
    }

    public function createTour() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('beginDate', 'Begin Date', 'trim|required');
        $this->form_validation->set_rules('endDate', 'End Date', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'name'          => $this->input->post('name'),
                            'description'   => $this->input->post('description'),
                            'beginDate'     => $this->input->post('beginDate'),
                            'endDate'       => $this->input->post('endDate')
                        );
            $this->load->view('tour/tour_create_view', $data);
        }
        else {
            $data = new Tour ([ NULL, 1,
                                $this->input->post('name'),
                                $this->input->post('description'),
                                $this->input->post('beginDate'),
                                $this->input->post('endDate')
                            ]);
            $this->Tour->startDatabase();
            $result = $this->Tour->createTour($data);
            $this->Tour->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('tours');
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('tours');
            }
        }
    }

    public function updateTour($id) {
        $this->Tour->startDatabase();
        $tour = $this->Tour->getTour($id);
        $this->Tour->closeDatabase();

        if(!empty($tour)) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            $this->form_validation->set_rules('beginDate', 'Begin Date', 'trim|required');
            $this->form_validation->set_rules('endDate', 'End Date', 'trim|required');

            if($this->form_validation->run() ==FALSE) {
                $data = array(  'name'          => $tour->getName(),
                                'description'   => $tour->getDescription(),
                                'beginDate'     => $tour->getBeginDate(),
                                'endDate'       => $tour->getEndDate()
                            );
                $this->load->view('tour/tour_update_view', $data);
            }
            else {
                $data = new Tour ([ $tour->getIdTour(),
                                    $tour->getIdBand(),
                                    $this->input->post('name'),
                                    $this->input->post('description'),
                                    $this->input->post('beginDate'),
                                    $this->input->post('endDate')
                                ]);
                $this->Tour->startDatabase();
                $result = $this->Tour->updateTour($data);
                $this->Tour->closeDatabase();

                if($result) {
                    $this->session->set_flashdata('result', 'updateSuccess');
                    redirect('tours');
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('tours');
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }
}
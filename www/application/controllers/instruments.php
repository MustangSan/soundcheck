<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER INSTRUMENT
 *---------------------------------------------------------------
 *
 *
 *
 */

class Instruments extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');

        $this->load->model('Instrument_model', 'Instrument');
    }

    public function index() {
        $this->Instrument->startDatabase();
        $data['instruments'] = $this->Instrument->readInstruments();
        $this->Instrument->closeDatabase();
        $this->load->view('instrument/instrument_list_view', $data);
    }

    public function createInstrument() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'name' => $this->input->post('name')
                        );
            $this->load->view('instrument/instrument_create_view', $data);
        }
        else {
            $data = new Instrument ([NULL, $this->input->post('name')]);
            $this->Instrument->startDatabase();
            $result = $this->Instrument->createInstrument($data);
            $this->Instrument->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('instruments');
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('instruments');
            }
        }
    }

    public function updateInstrument($id) {
        $this->Instrument->startDatabase();
        $instrument = $this->Instrument->getInstrument($id);
        $this->Instrument->closeDatabase();

        if(!empty($instrument)) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');

            if($this->form_validation->run() == FALSE) {
                $data = array( 'name' => $instrument->getName()
                            );
                $this->load->view('instrument/instrument_update_view', $data);
            }
            else {
                $data = new Instrument ([   $instrument->getIdInstrument(), 
                                            $this->input->post('name')
                                        ]);
                $this->Instrument->startDatabase();
                $result = $this->Instrument->updateInstrument($data);
                $this->Instrument->closeDatabase();

                if($result) {
                    $this->session->set_flashdata('result', 'updateSuccess');
                    redirect('instruments');
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('instruments');
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }
}
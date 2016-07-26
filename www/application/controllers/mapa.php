<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapa extends CI_Controller {

    function __construct() {
        
        // Chama todas as models e bibliotecas necessárias no controller
        parent::__construct();
        $this->load->library('Library');
    }
    
    public function index()
    {
        $this->load->view('mapa');
    }
}
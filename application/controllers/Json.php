<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json extends CI_Controller {
    public function index()
    {
        $this->load->view('header');
        $this->load->view('json');
        $this->load->view('footer');
    }
}
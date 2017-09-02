<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $domain = (base_url()) ? str_replace('/', '', str_replace('https:', '', str_replace('http:', '', base_url()))) : 'localhost';

        $this->load->view('ratchet/ratchet', array('domain' => $domain));
    }
}
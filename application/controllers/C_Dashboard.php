<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_Dashboard extends CI_Controller
{

    public function index()
    {

        $data = array(
            "base" => base_url(),
            "site" => site_url(),
        ); {
            $this->load->view('template/index', $data);
        }
    }
}

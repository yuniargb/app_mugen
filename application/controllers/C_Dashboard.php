<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_Dashboard extends CI_Controller
{

    public function index()
    {

        $data = array(
            "base" => base_url(),
            "site" => site_url(),
<<<<<<< HEAD
        ); {
            $this->load->view('template/index', $data);
=======
        ); 
        {
          $this->load->view('template/index', $data);
          // $this->load->view('template/Dashboard_cms', $data);
         
>>>>>>> d45323a4af42f33d09d19f15e8d7cd56036b9266
        }
    }
}

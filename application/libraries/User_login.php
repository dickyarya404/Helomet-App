<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class user_login{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        
    }

    public function proteksi_halaman(){
        //jika belum ada session yang login
        if ($this->ci->session->userdata('email') == "") {
            //$this->ci->session->set_flashdata('message', 'Anda Belum Login');
            $this->ci->session->set_flashdata(
                'message',
                '
                <div class="alert alert-danger" role="alert">
                    <strong>Alert!</strong> You havent logged in yet, please sign in !
                </div>'
            );
            redirect('c_login');
            
        }
    }

    
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_report');
    }
    public function index()
    {
        $data = [
            'profilePage' => 'active',
            'reportPage' => '',
            'title' => 'Hellomet | Profile'
        ];
        $data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('email')])->row_array();

        $queryAllReport = $this->m_report->getReport();
        $DATA2 = array('queryAllReport' => $queryAllReport);

        $this->user_login->proteksi_halaman();
        $this->load->view('template/header', $data);
        $this->load->view('v_profile', $DATA2);
        $this->load->view('template/footer');
    }
}

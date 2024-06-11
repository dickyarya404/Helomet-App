<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_report');
    }
    public function index()
    {
        $data = [
            'reportPage' => 'active',
            'profilePage' => '',
            'title' => 'Hellomet - Report'
        ];
        $data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('email')])->row_array();

        $queryAllReport = $this->m_report->getReport();
        $DATA2 = array('queryAllReport' => $queryAllReport);
        //echo 'Selamat datang'. $data['tb_user']['user_name'];

        $this->user_login->proteksi_halaman();
        $this->load->view('template/header', $data);
        $this->load->view('v_report', $DATA2);
        $this->load->view('template/footer');
    }

    public function admin_report()
    {
        $data = array(
            'title' => 'Report',
            'queryAllReport' => $this->m_report->getReport(),
            'isi' => 'v_admin_report',
        );

        $data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('layout/v_wrapper_backend_admin', $data, FALSE);
    }

    public function filterlaporan()
    {
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $nilaifilter = $this->input->post('nilaifilter');
        $dateawal = date_create($tanggalawal);
        $dateakhir = date_create($tanggalakhir);

        $data = [
            'reportPage' => '',
            'profilePage' => 'active',
            'title' => 'Helmet Wearing Report',
            'subtitle' => date_format($dateawal, "d/m/Y") . " - " . date_format($dateakhir, "d/m/Y"),
            'filter' => $this->m_report->filterbytanggal($tanggalawal, $tanggalakhir)
        ];

        $data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('email')])->row_array();

        if ($nilaifilter == 1 || $nilaifilter == null) {

            $data['subtitle'] = date_format($dateawal, "d/m/Y") . " - " . date_format($dateakhir, "d/m/Y");
            $data['filter'] = $this->m_report->filterbytanggal($tanggalawal, $tanggalakhir);

            //$this->load->view('print_laporanpenjualan.php', $data);
            $this->user_login->proteksi_halaman();
            $this->load->view('template/header', $data);
            $this->load->view('v_print_report', $data, FALSE);
            $this->load->view('template/footer');
        }
    }

    public function admin_filterlaporan()
    {
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');

        $tgl1 = DateTime::createFromFormat('Y-m-d', $tanggalawal);
        $tgl2 = DateTime::createFromFormat('Y-m-d', $tanggalakhir);

        $nilaifilter = $this->input->post('nilaifilter');
        $dateawal = date_create($tanggalawal);
        $dateakhir = date_create($tanggalakhir);

        $data = [
            'title' => 'Helmet Wearing Report',
            'subtitle' => date_format($dateawal, "d/m/Y") . " - " . date_format($dateakhir, "d/m/Y"),
            'filter' => $this->m_report->filterbytanggal2($tanggalawal, $tanggalakhir)
        ];

        $data['user'] = $this->db->get_where('tb_user', ['user_email' =>
        $this->session->userdata('email')])->row_array();

        if ($nilaifilter == 1 || $nilaifilter == null) {

            $data['subtitle'] = date_format($dateawal, "d/m/Y") . " - " . date_format($dateakhir, "d/m/Y");
            $data['filter'] = $this->m_report->filterbytanggal2($tanggalawal, $tanggalakhir);

            //$this->load->view('print_laporanpenjualan.php', $data);
            $this->user_login->proteksi_halaman();
            $this->load->view('v_admin_report_print', $data, FALSE);
            //$this->load->view('layout/v_wrapper_backend',$data,FALSE);

        }
    }
}

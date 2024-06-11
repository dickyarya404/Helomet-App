<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_instructor extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_report');
		$this->load->model('m_admin');
	}

	public function index()
	{
		$data['chartpie'] = $this->m_admin->chartpieAllData();
		$data['chartbar'] = $this->m_admin->chartbarAllData();
		if ($this->input->post()) {
			$tAwal = $this->input->post('tanggalawal');
			$tAkhir = $this->input->post('tanggalakhir');
			$data['chartpie'] = $this->m_admin->chartpieByDate($tAwal, $tAkhir);
			$data['chartbar'] = $this->m_admin->chartbarByDate($tAwal, $tAkhir);
			$data['tanggalawal'] = $tAwal;
			$data['tanggalakhir'] = $tAkhir;
			$dateawal = date_create($tAwal);
			$dateakhir = date_create($tAkhir);
			$this->session->set_userdata('chartpie', $this->m_admin->chartpieByDate($tAwal, $tAkhir));
			$this->session->set_userdata('chartbar', $this->m_admin->chartbarByDate($tAwal, $tAkhir));
			$this->session->set_userdata('tanggalawal', $dateawal);
			$this->session->set_userdata('tanggalakhir', $dateakhir);
		} else {
			$dateawal = date_create('2022-11-28');
			$dateakhir = date_create(date('Y-m-d'));
			$data['chartpie'] = $this->m_admin->chartpieAllData();
			$data['chartbar'] = $this->m_admin->chartbarAllData();
			$this->session->set_userdata('chartpie', $this->m_admin->chartpieAllData());
			$this->session->set_userdata('chartbar', $this->m_admin->chartbarAllData());
			$this->session->set_userdata('tanggalawal', $dateawal);
			$this->session->set_userdata('tanggalakhir', $dateakhir);
		}

		$data['title'] = 'Dashboard Instructor';
		$data['queryAllReport'] = $this->m_report->getReport();
		$data['dashboard1'] = $this->m_admin->datafieldterakhir();
		$data['isi'] = 'v_instructor';


		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
		$this->session->userdata('email')])->row_array();


		$this->load->view('layout/v_wrapper_backend_instructor', $data, FALSE);
	}

	public function report()
	{
		$data = array(
			'title' => 'Instructor Report',
			'queryAllReport' => $this->m_report->getReport(),
			'isi' => 'v_instructor_report',
		);
		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
		$this->session->userdata('email')])->row_array();

		$queryAllReport = $this->m_report->getReport();
		$DATA2 = array('queryAllReport' => $queryAllReport);
		//echo 'Selamat datang'. $data['tb_user']['user_name'];

		$this->load->view('layout/v_wrapper_backend_instructor', $data, FALSE);
	}

	public function profile()
	{
		$data = array(
			'title' => 'Report',
			'queryAllReport' => $this->m_report->getReport(),
			'isi' => 'v_instructor_profile',
		);

		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
		$this->session->userdata('email')])->row_array();


		$this->load->view('layout/v_wrapper_backend_instructor', $data, FALSE);
	}

	public function dashboard()
	{

		$dashboard = $this->m_admin->datafieldterakhir();
		header('Content-Type: application/json');
		echo json_encode(
			array(
				'data' => $dashboard
			)
		);
	}
}

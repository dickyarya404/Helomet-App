<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_admin extends CI_Controller
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
		$data['title'] = 'Dashboard Admin';
		$data['queryAllReport'] = $this->m_report->getReport();
		$data['dashboard1'] = $this->m_admin->datafieldterakhir();
		$data['isi'] = 'v_admin';

		/* $data = array(
			'title' => 'Dashboard Admin',
			'queryAllReport' => $this->m_report->getReport(),
			'dashboard1' => $this->m_admin->datafieldterakhir(),
			'isi' => 'v_admin',
            'chartbar' => $this->m_admin->chartbarAllData(),
		); */


		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
		$this->session->userdata('email')])->row_array();


		$this->load->view('layout/v_wrapper_backend_admin', $data, FALSE);
	}




	/* API DASHBOARD */
	public function data()
	{
		$serverName = "LAPTOP-9FK4RQP7";
		$uid = "admin";
		$pwd = "admin123";
		$databaseName = "hellomet";

		$connectionInfo = array(
			"UID" => $uid,
			"PWD" => $pwd,
			"Database" => $databaseName
		);

		#$con = mysqli_connect("localhost", "root", "", "hellomet"); //for mysql
		$conn = sqlsrv_connect($serverName, $connectionInfo); //for sql server

		if (!$conn) {
			echo "Problem in database connection..." . sqlsrv_error();
		} else {
			$sql = "SELECT TOP 5 * FROM tb_dt_report ORDER BY dt_report_id";
			$sql2 = "SELECT TOP 5 dt_report_datetime, SUM (dt_report_countusing) as sumcountusing, SUM (dt_report_countnotusing) as sumcountnotusing FROM  tb_dt_report
			GROUP BY tb_dt_report.dt_report_datetime 
			ORDER BY tb_dt_report.dt_report_datetime DESC";
			$result = sqlsrv_query($conn, $sql);
			$result2 = sqlsrv_query($conn, $sql2);
			$chart_data = "";
			while ($row = sqlsrv_fetch_array($result)) {
				$datetime[] =  $row['dt_report_datetime']->format('Y-m-d H:i:s');
				$countusing[] = $row['dt_report_countusing'];
				$countnotusing[] = $row['dt_report_countnotusing'];
			}

			while ($row = sqlsrv_fetch_array($result2)) {
				$datetime2[] =  $row['dt_report_datetime']->format('Y-m-d H:i:s');
				$countusing2[] = $row['sumcountusing'];
				$countnotusing2[] = $row['sumcountnotusing'];
			}
		}

		$lastdata = $this->m_admin->datafieldterakhir();

		header('Content-Type: application/json');
		echo json_encode(
			array(
				'lastdata' => $lastdata,
				'datetime' => $datetime2,
				'countusing' => $countusing2,
				'countnotusing' => $countnotusing2,
			)
		);
	}
}

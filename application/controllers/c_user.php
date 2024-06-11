<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_user extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = array(
			'title' => 'User',
			'queryAllUser' => $this->m_user->getAllUser(),
			'isi' => 'user/v_user_view',
		);

		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
		$this->session->userdata('email')])->row_array();


		$this->load->view('layout/v_wrapper_backend_admin', $data, FALSE);
	}

	public function view_add()
	{
		$data = array(
			'title' => 'User Add Page',
			'isi' => 'user/v_user_add',
		);

		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
		$this->session->userdata('email')])->row_array();


		$this->load->view('layout/v_wrapper_backend_admin', $data, FALSE);
	}

	public function add()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_user.user_username]', [
			'is_unique' => 'This username has already registered!'
		]);
		$this->form_validation->set_rules('id', 'Employee ID', 'required|trim|is_unique[tb_user.user_id]', [
			'is_unique' => 'This employee id has already registered!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.user_email]', [
			'is_unique' => 'This email has already registered!'
		]);
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');
		$this->form_validation->set_rules('phone', 'Phone Number', 'required|trim');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[confpassword]');
		$this->form_validation->set_rules('confpassword', 'Confirmation Password', 'required|trim|matches[password]');

		if ($this->form_validation->run() == false) {
			$data = array(
				'title' => 'User Add Page',
				'isi' => 'user/v_user_add',
			);

			$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
			$this->session->userdata('email')])->row_array();


			$this->load->view('layout/v_wrapper_backend_admin', $data, FALSE);
		} else {

			date_default_timezone_set("Asia/Jakarta");
			# get the current time in the proper format for a sql timestamp field
			#$timestamp = date('Y-m-d H:i:s');

			$data = [
				'user_id' => $this->input->post('id'),
				'user_username' => $this->input->post('username'),
				'user_name' => $this->input->post('name'),
				'user_gender' => $this->input->post('gender'),
				'user_email' => htmlspecialchars($this->input->post('email', true)),
				'user_password' => $this->input->post('password'),
				'user_phonenumber' => $this->input->post('phone'),
				'user_address' => $this->input->post('address'),
				#'user_lastlogin' => $timestamp,
				'user_image' => 'default.jpg',
				'user_role' => $this->input->post('role'),
				'user_statusactivated' => '1'
			];

			$this->db->insert('tb_user', $data);


			$this->session->set_flashdata(
				'message',
				'
				<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
				role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<strong>Success - </strong> A new user has been added!
				</div>'
			);
			redirect('c_user');
		}
	}

	public function update($user_id = NULL)
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('id', 'Employee ID', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');
		$this->form_validation->set_rules('phone', 'Phone Number', 'required|trim');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[confpassword]');
		$this->form_validation->set_rules('confpassword', 'Confirmation Password', 'required|trim|matches[password]');

		# get the current time in the proper format for a sql timestamp field
		$timestamp = date('Y-m-d H:i:s');

		if ($this->form_validation->run() == true) {
			date_default_timezone_set("Asia/Jakarta");

			$data = [
				'user_id' => $user_id,
				'user_username' => $this->input->post('username'),
				'user_name' => $this->input->post('name'),
				'user_gender' => $this->input->post('gender'),
				'user_email' => htmlspecialchars($this->input->post('email', true)),
				'user_password' => $this->input->post('password'),
				'user_phonenumber' => $this->input->post('phone'),
				'user_address' => $this->input->post('address'),
				'user_lastlogin' => $timestamp,
				'user_image' => 'default.jpg',
				'user_role' => $this->input->post('role'),
				'user_statusactivated' => $this->input->post('statusactivated')
			];

			/*  $this->db->insert('tb_user', $data); */

			$this->m_user->update($data);
			$this->session->set_flashdata(
				'message',
				'
				<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
				role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<strong>Success - </strong> A user has been updated!
				</div>'
			);
			redirect('c_user');
		}

		$data = array(
			'title' => 'User Edit Page',
			'row' => $this->m_user->get_data($user_id),
			'isi' => 'user/v_user_edit',
		);

		$data['user'] = $this->db->get_where('tb_user', ['user_email' =>
		$this->session->userdata('email')])->row_array();


		$this->load->view('layout/v_wrapper_backend_admin', $data, FALSE);
	}

	public function delete($user_id = NULL)
	{
		/*  //hapus gambar
        $user = $this->m_product->get_data($id_product);
         */

		//end hapus gambar
		$data = array('user_id' => $user_id);
		$this->m_user->delete($data);
		$this->session->set_flashdata(
			'message',
			'
			<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
			role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Success - </strong> A user deleted successfully!
			</div>'
		);
		redirect('c_user');
	}
}

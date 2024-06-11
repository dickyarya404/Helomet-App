<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

 
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Hellomet | Login',
            ];

            $this->load->view('template/header_login', $data);
            $this->load->view('v_login');
            $this->load->view('template/footer');
        } else {
            //validasi sukses
            $this->_login();
        }
    }

    //fungsi login
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['user_email' => $email])->row_array();

        //jika user ada
        if ($user) {
            //jika user aktif
            if ($user['user_statusactivated'] == 1) {
                //cek password
                if ($user['user_password'] == $password) {
                    //cek role 1=admin 2=instruktur
                    if ($user['user_role'] == 1) {
                        //data session
                        $data = [
                            'id' => $user['user_id'],
                            'email' => $user['user_email'],
                            'username' => $user['user_username'],
                            'name' => $user['user_name'],
                            'gender' => $user['gender'],
                            'password' => $user['user_password'],
                            'phone' => $user['user_phonenumber'],
                            'address' => $user['user_address'],
                            'image' => $user['user_image'],
                            'role' => $user['user_role'],
                            'lastlogin' => $user['user_lastlogin'],
                            'statusactivated' => $user['user_statusactivated']

                        ];
                        $this->session->set_userdata($data);
                        redirect('c_admin');
                    }elseif ($user['user_role'] == 2) {
                        //data session
                        $data = [
                            'id' => $user['user_id'],
                            'email' => $user['user_email'],
                            'username' => $user['user_username'],
                            'name' => $user['user_name'],
                            'gender' => $user['gender'],
                            'password' => $user['user_password'],
                            'phone' => $user['user_phonenumber'],
                            'address' => $user['user_address'],
                            'image' => $user['user_image'],
                            'role' => $user['user_role'],
                            'lastlogin' => $user['user_lastlogin'],
                            'statusactivated' => $user['user_statusactivated']

                        ];
                        $this->session->set_userdata($data);
                        redirect('c_instructor');
                    }

                    
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '
                    <div class="alert alert-danger" role="alert">
                        <strong>Alert!</strong> Wrong password!
                    </div>'
                    );
                    redirect('c_login');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '
                <div class="alert alert-danger" role="alert">
                    <strong>Alert!</strong> This email has not been activated!
                </div>'
                );
                redirect('c_login');
            }
        } else {
            //jika user tidak ada
            $this->session->set_flashdata(
                'message',
                '
            <div class="alert alert-danger" role="alert">
                <strong>Alert!</strong> Email is not registered. Please Sign up
            </div>'
            );
            redirect('c_login');
        }
    }

    //fungsi register
    public function register()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('id', 'Employee ID', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[confpassword]');
        $this->form_validation->set_rules('confpassword', 'Confirmation Password', 'required|trim|matches[password]');


        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Hellomet | Register',
            ];

            $this->load->view('template/header_login', $data);
            $this->load->view('v_register');
            $this->load->view('template/footer');
        } else {

            date_default_timezone_set("Asia/Jakarta");

            $data = [
                'user_id' => $this->input->post('id'),
                'user_username' => $this->input->post('username'),
                'user_email' => htmlspecialchars($this->input->post('email', true)),
                'user_name' => $this->input->post('name'),
                'user_phonenumber' => $this->input->post('phone'),
                'user_address' => $this->input->post('address'),
                'user_password' => $this->input->post('password'),
                'user_accountactivated' => date('Y-m-d H:i:s', time()),
                'user_image' => 'default.jpg',
                'user_downloadcount' => '0',
                'user_statusactivated' => '1'
            ];

            $this->db->insert('tb_user', $data);

            //$this->_sendEmail();


            $this->session->set_flashdata(
                'message',
                '
            <div class="alert alert-success" role="alert">
                <strong>Congratulation!</strong> your account has been created. Please login
            </div>'
            );
            redirect('c_login');
        }
    }

    //mengirim verifikasi email
    // private function _sendEmail()
    // {
    //     $config = [
    //         'protocol'   => 'smtp',
    //         'smtp_host' => 'ssl://smtp.googlemail.com',
    //         'smtp_user' => 'hellometsystem@gmail.com',
    //         'smtp_pass' => 'PoltekAstra@2022',
    //         'smtp_port' =>  465,
    //         'mailtype'   => 'html',
    //         'charset'    => 'utf-8',
    //         'newline'    => "\r\n"
    //     ];


    //     $this->load->library('email', $config);

    //     $this->email->from('hellometsystem@gmail.com', 'Hellomet System');
    //     $this->email->to('qihsyahrial@gmail.com');
    //     $this->email->subject('Testing');
    //     $this->email->message('Hello World!');

    //     if ($this->email->send()) {
    //         echo 'Abc';
    //     } else {
    //         echo $this->email->print_debugger();
    //         die;
    //     }
    // }


    //fungsi logout
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('phone');
        $this->session->unset_userdata('address');
        $this->session->unset_userdata('accountactivated');
        $this->session->unset_userdata('lastlogin');
        $this->session->unset_userdata('downloadcount');
        $this->session->unset_userdata('statusactivated');
        $this->session->unset_userdata('image');

        $this->session->set_flashdata(
            'message',
            '
            <div class="alert alert-success" role="alert">
                <strong>Success!</strong> You have been logget out!
            </div>'
        );
        redirect('c_login');
    }
}
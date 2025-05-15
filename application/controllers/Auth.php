<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }
        $data['title'] = 'Login';
        $this->load->view('auth/login', $data);
    }

    public function login() {
        $this->form_validation->set_rules('username', 'Username/NIP', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('auth');
        }

        $username = $this->input->post('username');
        $password = md5($this->input->post('password')); // Ganti dengan password_hash untuk produksi

        // Cek login admin
        $admin = $this->Auth_model->check_admin($username, $password);
        if ($admin) {
            $this->session->set_userdata([
                'logged_in' => TRUE,
                'role' => 'admin',
                'id' => $admin->id_admin,
                'nama' => $admin->nama_lengkap
            ]);
            redirect('dashboard');
        }

        // Cek login dosen
        $dosen = $this->Auth_model->check_dosen($username, $password);
        if ($dosen) {
            $this->session->set_userdata([
                'logged_in' => TRUE,
                'role' => 'dosen',
                'id' => $dosen->id_dosen,
                'nama' => $dosen->nama_dosen
            ]);
            redirect('dashboard');
        }

        // Cek login keuangan
        $keuangan = $this->Auth_model->check_keuangan($username, $password);
        if ($keuangan) {
            $this->session->set_userdata([
                'logged_in' => TRUE,
                'role' => 'keuangan',
                'id' => $keuangan->id_keuangan,
                'nama' => $keuangan->nama_lengkap
            ]);
            redirect('dashboard');
        }

        $this->session->set_flashdata('error', 'Username atau password salah!');
        redirect('auth');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
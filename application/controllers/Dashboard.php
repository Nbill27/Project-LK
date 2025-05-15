<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Sesi tidak valid, silakan login ulang.');
            redirect('auth');
        }
        $this->load->model('Role_model'); // Muat model untuk dosen
    }

    public function index() {
        $data['title'] = 'Dashboard';
        $data['role'] = $this->session->userdata('role');
        $data['id'] = $this->session->userdata('id');
        $data['nama'] = $this->session->userdata('nama');

        // Tentukan aksi berdasarkan role
        if ($data['role'] == 'admin') {
            $view_data = [
                'header' => 'template/header',
                'navbar' => 'template/navbar',
                'sidebar' => 'template/sidebar_admin',
                'content' => 'dashboard/admin',
                'footer' => 'template/footer'
            ];
        } elseif ($data['role'] == 'dosen') {
            $current_role = $this->Role_model->get_current_role($data['id']);
            $this->session->set_userdata('current_role', $current_role); // Simpan ke session

            if ($current_role == 'Kaprodi') {
                redirect('kaprodi/dashboard');
            } elseif ($current_role == 'Dekan') {
                redirect('dekan/dashboard');
            } else {
                $data['current_role'] = $current_role;
                $view_data = [
                    'header' => 'template/header',
                    'navbar' => 'template/navbar',
                    'sidebar' => 'template/sidebar_dosen',
                    'content' => 'dashboard/dosen',
                    'footer' => 'template/footer'
                ];
            }
        } elseif ($data['role'] == 'keuangan') {
            $view_data = [
                'header' => 'template/header',
                'navbar' => 'template/navbar',
                'sidebar' => 'template/sidebar_keuangan',
                'content' => 'dashboard/keuangan',
                'footer' => 'template/footer'
            ];
        } else {
            $this->session->set_flashdata('error', 'Role tidak dikenali, silakan login ulang.');
            redirect('auth');
        }

        // Load view berdasarkan role
        $this->load->view($view_data['header'], $data);
        $this->load->view($view_data['navbar'], $data);
        $this->load->view($view_data['sidebar'], $data);
        $this->load->view($view_data['content'], $data);
        $this->load->view($view_data['footer'], $data);
    }
}
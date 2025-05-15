<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Autentikasi sederhana: pastikan role adalah 'admin'
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth'); // Redirect ke halaman login jika bukan admin
        }
        $this->load->model('Admin_model'); // Load model
    }

    public function index() {
        $data['title'] = 'Admin Dashboard';
        $data['user_count'] = $this->Admin_model->get_user_count(); // Ambil jumlah pengguna
        $data['surat_count'] = $this->Admin_model->get_surat_count(); // Ambil jumlah surat
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/footer', $data);
    }

    public function kelola_pengguna() {
        $data['title'] = 'Kelola Pengguna';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin');
        $this->load->view('admin/kelola_pengguna', $data);
        $this->load->view('template/footer', $data);
    }

    public function laporan_sistem() {
        $data['title'] = 'Laporan Sistem';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin');
        $this->load->view('admin/laporan_sistem', $data);
        $this->load->view('template/footer', $data);
    }

    public function pengaturan() {
        $data['title'] = 'Pengaturan';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin');
        $this->load->view('admin/pengaturan', $data);
        $this->load->view('template/footer', $data);
    }
}
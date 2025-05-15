<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kaprodi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'dosen' || $this->session->userdata('current_role') != 'Kaprodi') {
            redirect('auth');
        }
        $this->load->model('Surat_model');
    }

    public function dashboard() {
        $data['title'] = 'Dashboard Kaprodi';
        $data['nama'] = $this->session->userdata('nama');
        $data['role'] = $this->session->userdata('role');
        $data['id'] = $this->session->userdata('id');
        $data['current_role'] = $this->session->userdata('current_role');

        // Ambil data surat
        $data['surat_masuk'] = $this->Surat_model->get_surat_by_status($data['id'], 'Masuk');
        $data['surat_diproses'] = $this->Surat_model->get_surat_by_status($data['id'], 'Diproses');
        $data['surat_selesai'] = $this->Surat_model->get_surat_by_status($data['id'], 'Selesai');

        // Hitung jumlah untuk summary
        $data['count_masuk'] = $this->Surat_model->count_surat_by_status($data['id'], 'Masuk');
        $data['count_diproses'] = $this->Surat_model->count_surat_by_status($data['id'], 'Diproses');
        $data['count_selesai'] = $this->Surat_model->count_surat_by_status($data['id'], 'Selesai');

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar_dosen', $data);
        $this->load->view('kaprodi/dashboard', $data);
        $this->load->view('template/footer');
    }
}
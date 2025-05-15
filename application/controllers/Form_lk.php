<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_lk extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'dosen') {
            redirect('auth');
        }
        $this->load->model('Surat_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index() {
        $data['title'] = 'Form Input Surat';
        $data['nama'] = $this->session->userdata('nama');
        $data['role'] = $this->session->userdata('role');
        $data['id'] = $this->session->userdata('id');
        $data['current_role'] = $this->session->userdata('current_role');

        // Atur aturan validasi
        $this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required|trim');
        $this->form_validation->set_rules('judul_surat', 'Judul Surat', 'required|trim');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar_dosen', $data);
            $this->load->view('form_lk/index', $data); // Sesuai dengan folder view Anda
            $this->load->view('template/footer', $data);
        } else {
            // Konfigurasi upload file
            $config['upload_path'] = './uploads/surat/';
            $config['allowed_types'] = 'pdf|jpg|jpeg|png';
            $config['max_size'] = 2048; // 2MB
            $config['file_name'] = 'surat_' . time();
            $this->upload->initialize($config);

            $lampiran_path = NULL;
            if (!empty($_FILES['lampiran']['name'])) {
                if ($this->upload->do_upload('lampiran')) {
                    $upload_data = $this->upload->data();
                    $lampiran_path = 'uploads/surat/' . $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('form_lk');
                }
            }

            // Simpan data ke database
            $data_surat = [
                'id_dosen' => $data['id'],
                'nomor_surat' => $this->input->post('nomor_surat'),
                'judul_surat' => $this->input->post('judul_surat'),
                'kategori' => $this->input->post('kategori'),
                'pengirim' => $this->input->post('pengirim'),
                'deskripsi' => $this->input->post('deskripsi'),
                'tanggal_masuk' => $this->input->post('tanggal_masuk'),
                'status' => 'Masuk',
                'tanggal_selesai' => NULL,
                'lampiran' => $lampiran_path,
                'created_at' => date('Y-m-d H:i:s')
            ];

            if ($this->Surat_model->insert_surat($data_surat)) {
                $this->session->set_flashdata('success', 'Surat berhasil diajukan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengajukan surat.');
            }
            redirect('form_lk');
        }
    }
}
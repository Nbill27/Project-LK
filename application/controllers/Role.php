<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'dosen') {
            redirect('auth');
        }
        $this->load->model('Role_model');
    }

    public function change() {
        $data['title'] = 'Change Role';
        $id_dosen = $this->session->userdata('id');
        $data['roles'] = $this->Role_model->get_allowed_roles($id_dosen);

        // Jika tidak ada role yang diizinkan, tampilkan pesan error
        if (empty($data['roles'])) {
            $this->session->set_flashdata('error', 'Tidak ada role yang diizinkan untuk Anda.');
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar', $data); // Tambahkan $data untuk $current_role
            $this->load->view('role/change', $data);
            $this->load->view('template/footer');
            return;
        }

        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar_dosenB', $data); // Tambahkan $data untuk $current_role
            $this->load->view('role/change', $data);
            $this->load->view('template/footer');
        } else {
            $new_role = $this->input->post('role');
            // Validasi bahwa role yang dipilih diizinkan
            if (in_array($new_role, $data['roles'])) {
                if ($this->Role_model->update_role($id_dosen, $new_role)) {
                    // Simpan current_role ke session
                    $this->session->set_userdata('current_role', $new_role);
                    $this->session->set_flashdata('success', 'Role berhasil diubah menjadi ' . $new_role);

                    // Redirect berdasarkan role baru
                    if ($new_role == 'Dekan') {
                        redirect('dekan/dashboard');
                    } elseif ($new_role == 'Kaprodi') {
                        redirect('kaprodi/dashboard');
                    } else {
                        redirect('dashboard');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Gagal mengubah role. Role tidak valid.');
                }
            } else {
                $this->session->set_flashdata('error', 'Role tidak diizinkan!');
            }
            redirect('role/change'); // Hanya dijalankan jika ada error
        }
    }
}
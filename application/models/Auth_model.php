<?php
class Auth_model extends CI_Model {
    public function check_admin($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('admin')->row();
    }

    public function check_dosen($username, $password) {
        $this->db->where('nip', $username);
        $this->db->where('password', $password);
        return $this->db->get('dosen')->row();
    }

    public function check_keuangan($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('keuangan')->row();
    }
}
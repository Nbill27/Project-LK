<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function get_user_count() {
        return $this->db->count_all('users');
    }

    public function get_surat_count() {
        return $this->db->count_all('surat');
    }
}
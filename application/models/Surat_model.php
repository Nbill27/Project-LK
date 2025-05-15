<?php
class Surat_model extends CI_Model {
    public function insert_surat($data) {
        return $this->db->insert('surat', $data);
    }

    public function get_surat_by_status($id_dosen, $status) {
        $this->db->where('id_dosen', $id_dosen);
        $this->db->where('status', $status);
        $this->db->order_by('tanggal_masuk', 'DESC');
        return $this->db->get('surat')->result();
    }

    public function count_surat_by_status($id_dosen, $status) {
        $this->db->where('id_dosen', $id_dosen);
        $this->db->where('status', $status);
        return $this->db->count_all_results('surat');
    }
}
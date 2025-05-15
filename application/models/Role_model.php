<?php
class Role_model extends CI_Model {
    public function get_allowed_roles($id_dosen) {
        $this->db->select('allowed_roles');
        $this->db->where('id_dosen', $id_dosen);
        $query = $this->db->get('dosen_roles')->row();
        if ($query && !empty($query->allowed_roles)) {
            return explode(',', $query->allowed_roles);
        }
        return [];
    }

    public function update_role($id_dosen, $new_role) {
        $allowed_enum = ['Dekan', 'Kaprodi', ''];
        if (!in_array($new_role, $allowed_enum)) {
            return false;
        }
        $this->db->where('id_dosen', $id_dosen);
        $result = $this->db->update('dosen_roles', ['current_role' => $new_role]);
        return $result;
    }

    public function get_current_role($id_dosen) {
        $this->db->select('current_role');
        $this->db->where('id_dosen', $id_dosen);
        $query = $this->db->get('dosen_roles')->row();
        return $query ? $query->current_role : '';
    }
}
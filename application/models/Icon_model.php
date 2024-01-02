<?php
class Icon_model extends CI_Model
{
    public function get($id_icon = null)
    {
        $this->db->select('*');
        $this->db->from('icon');
        if ($id_icon != null) {
            $this->db->where('id_icon', $id_icon);
        }

        return $this->db->get();
    }

    public function update($data, $id_icon)
    {
        $this->db->where('id_icon', $id_icon);
        $this->db->update('icon', $data);
        return $this->db->affected_rows();
    }

    public function insert($data)
    {
        $this->db->insert('icon', $data);
        return $this->db->insert_id();
    }

    public function delete($id_icon)
    {
        $this->db->delete('icon', ['id_icon' => $id_icon]);
        return $this->db->affected_rows();
    }
}

<?php
class log_model extends CI_Model
{
    public function get($id_log = null)
    {
        $this->db->select('*');
        $this->db->from('log');
        if ($id_log != null) {
            $this->db->where('id_log', $id_log);
        }

        return $this->db->get();
    }

    public function update($data, $id_log)
    {
        $this->db->where('id_log', $id_log);
        $this->db->update('log', $data);
        return $this->db->affected_rows();
    }

    public function insert($data)
    {
        $this->db->insert('log', $data);
        return $this->db->insert_id();
    }

    public function delete($id_log)
    {
        $this->db->delete('log', ['id_log' => $id_log]);
        return $this->db->affected_rows();
    }
}

<?php
class Fasilitas_model extends CI_Model
{
    public function get($id_fasilitas = null)
    {
        $this->db->select('*');
        $this->db->from('fasilitas');
        if ($id_fasilitas != null) {
            $this->db->where('id_fasilitas', $id_fasilitas);
        }

        return $this->db->get();
    }

    public function update($data, $id_fasilitas)
    {
        $this->db->where('id_fasilitas', $id_fasilitas);
        $this->db->update('fasilitas', $data);
        return $this->db->affected_rows();
    }

    public function insert($data)
    {
        $this->db->insert('fasilitas', $data);
        return $this->db->insert_id();
    }

    public function delete($id_fasilitas)
    {
        $this->db->delete('fasilitas', ['id_fasilitas' => $id_fasilitas]);
        return $this->db->affected_rows();
    }
    public function delete_gambar_fasilitas($id_fasilitas)
    {
        $this->db->delete('gambar_fasilitas', ['fasilitas_id' => $id_fasilitas]);
        return $this->db->affected_rows();
    }
}

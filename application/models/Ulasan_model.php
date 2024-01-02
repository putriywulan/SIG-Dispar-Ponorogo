<?php
class Ulasan_model extends CI_Model
{
    public function get($id_ulasan = null, $id_wisata = null)
    {
        $this->db->select('ulasan.*');
        $this->db->from('ulasan');
        $this->db->join('wisata', 'ulasan.wisata_id = wisata.id_wisata');
        if ($id_ulasan != null) {
            $this->db->where('ulasan.id_ulasan', $id_ulasan);
        }
        if ($id_wisata != null) {
            $this->db->where('ulasan.wisata_id', $id_wisata);
        }
        $this->db->order_by('ulasan.id_ulasan','desc');
        return $this->db->get();
    }

    public function update($data, $id_ulasan)
    {
        $this->db->where('id_ulasan', $id_ulasan);
        $this->db->update('ulasan', $data);
        return $this->db->affected_rows();
    }

    public function insert($data)
    {
        $this->db->insert('ulasan', $data);
        return $this->db->insert_id();
    }
    public function delete($id_ulasan)
    {
        $this->db->delete('ulasan', ['id_ulasan' => $id_ulasan]);
        return $this->db->affected_rows();
    }
}

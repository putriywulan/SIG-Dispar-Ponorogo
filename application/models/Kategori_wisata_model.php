<?php
class Kategori_wisata_model extends CI_Model
{
    public function get($id_kategori_wisata = null)
    {
        $this->db->select('*');
        $this->db->from('kategori_wisata');
        if ($id_kategori_wisata != null) {
            $this->db->where('id_kategori_wisata', $id_kategori_wisata);
        }

        return $this->db->get();
    }

    public function update($data, $id_kategori_wisata)
    {
        $this->db->where('id_kategori_wisata', $id_kategori_wisata);
        $this->db->update('kategori_wisata', $data);
        return $this->db->affected_rows();
    }

    public function insert($data)
    {
        $this->db->insert('kategori_wisata', $data);
        return $this->db->insert_id();
    }

    public function delete($id_kategori_wisata)
    {
        $this->db->delete('kategori_wisata', ['id_kategori_wisata' => $id_kategori_wisata]);
        return $this->db->affected_rows();
    }
}

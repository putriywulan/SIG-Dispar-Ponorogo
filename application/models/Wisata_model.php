<?php
class Wisata_model extends CI_Model
{
    public function get($id_wisata = null, $id_kategori_wisata = null, $search = null, $id_kategori_wisata_array = null)
    {
        $this->db->select('*,wisata.deskripsi as deskripsi_wisata');
        $this->db->from('wisata');
        $this->db->join('kategori_wisata', 'kategori_wisata.id_kategori_wisata = wisata.kategori_wisata_id');
        if ($id_wisata != null) {
            $this->db->where('id_wisata', $id_wisata);
        }
        if ($id_kategori_wisata != null) {
            $this->db->where('kategori_wisata.id_kategori_wisata', $id_kategori_wisata);
        }
        if ($search != null) {
            $this->db->like('wisata.nama_wisata', $search);
            $this->db->or_like('kategori_wisata.nama_kategori_wisata', $search);
        }
        if ($id_kategori_wisata_array != null) {
            $this->db->where_in('kategori_wisata.id_kategori_wisata', $id_kategori_wisata_array);
        }

        return $this->db->get();
    }
    public function getLainnya($id_wisata = null)
    {
        $this->db->select('*');
        $this->db->from('gambar_wisata');
        if ($id_wisata != null) {
            $this->db->where('wisata_id', $id_wisata);
        }

        return $this->db->get();
    }
    public function update($data, $id_wisata)
    {
        $this->db->where('id_wisata', $id_wisata);
        $this->db->update('wisata', $data);
        return $this->db->affected_rows();
    }

    public function insert($data)
    {
        $this->db->insert('wisata', $data);
        return $this->db->insert_id();
    }
    public function insertGambar($data)
    {
        $this->db->insert('gambar_wisata', $data);
        return $this->db->insert_id();
    }

    public function delete($id_wisata)
    {
        $this->db->delete('wisata', ['id_wisata' => $id_wisata]);
        return $this->db->affected_rows();
    }
    public function delete_gambar_wisata($id_wisata)
    {
        $this->db->delete('gambar_wisata', ['wisata_id' => $id_wisata]);
        return $this->db->affected_rows();
    }
}

<?php
class Rating_model extends CI_Model
{
    public function get($id_rating = null, $id_wisata = null)
    {
        $this->db->select('rating.*');
        $this->db->from('rating');
        $this->db->join('wisata', 'rating.wisata_id = wisata.id_wisata');
        if ($id_rating != null) {
            $this->db->where('rating.id_rating', $id_rating);
        }
        if ($id_wisata != null) {
            $this->db->where('rating.wisata_id', $id_wisata);
        }
        return $this->db->get();
    }

    public function update($data, $id_rating)
    {
        $this->db->where('id_rating', $id_rating);
        $this->db->update('rating', $data);
        return $this->db->affected_rows();
    }

    public function insert($data)
    {
        $this->db->insert('rating', $data);
        return $this->db->insert_id();
    }
    public function delete($id_rating)
    {
        $this->db->delete('rating', ['id_rating' => $id_rating]);
        return $this->db->affected_rows();
    }
}

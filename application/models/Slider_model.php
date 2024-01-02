<?php
class Slider_model extends CI_Model
{
    public function get($id_slider = null)
    {
        $this->db->select('*');
        $this->db->from('slider');
        if ($id_slider != null) {
            $this->db->where('id_slider', $id_slider);
        }

        return $this->db->get();
    }

    public function update($data, $id_slider)
    {
        $this->db->where('id_slider', $id_slider);
        $this->db->update('slider', $data);
        return $this->db->affected_rows();
    }

    public function insert($data)
    {
        $this->db->insert('slider', $data);
        return $this->db->insert_id();
    }

    public function delete($id_slider)
    {
        $this->db->delete('slider', ['id_slider' => $id_slider]);
        return $this->db->affected_rows();
    }
}

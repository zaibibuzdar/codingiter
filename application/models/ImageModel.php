<?php
class ImageModel extends CI_Model
{
    public function insertproducts($data)
    {
        $this->db->insert('imagescrud', $data);
    }
    public function upload_data($data)
    {
        $this->db->insert('imagegallery', $data);
    }
    public function getproducts()
    {
        $product_details = $this->db->get('imagescrud');
        return $product_details->result();
    }

    public function getgallery()
    {
        $this->db->select('*');
        $this->db->from('imagescrud');
        // $this->db->where('imagescrud.id', 4);
        $this->db->join('imagegallery', 'imagegallery.product_id = imagescrud.id');
        return $this->db->get()->result();
    }


    public function getdetails($id)
    {
        $category_edit = $this->db->get_where('imagescrud', array('id' => $id))->row();
        return $category_edit;
    }

    public function imagesdetails($id)
    {
        $this->db->select('*');
        $this->db->from('imagescrud');
        $this->db->where('imagescrud.id', $id);
        $this->db->join('imagegallery', 'imagegallery.product_id = imagescrud.id');
        return $this->db->get()->result();
    }

    public function updateproducts($data, $id)
    {
        return $this->db->update('imagescrud', $data, ['id' => $id]);
    }

    public function update_gallery($data, $id)
    {
        // return $id;
        return $this->db->update('imagegallery', $data, ['id' => $id]);
    }

    public function deleteedit($imageid)
    {
        $query =        $this->db->delete('imagegallery', array('id' => $imageid));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function product_delete($id)
    {
        $this->db->delete('imagescrud', array('id' => $id));
        $this->db->delete('imagegallery', array('product_id' => $id));
    }
}

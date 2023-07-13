<?php
class ProductImageModel extends CI_Model
{
    public function upload_data($data)
    {
        $this->db->insert('imagegallery', $data);
    }
}

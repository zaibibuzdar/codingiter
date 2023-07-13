<?php
class Upload_file extends CI_Model
{
    function upload_data($data)
    {
        $this->db->insert('images', $data);
    }
}

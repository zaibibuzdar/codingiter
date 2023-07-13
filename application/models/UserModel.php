<?php
 
 class UserModel extends CI_Model {

    public function register($user_data)
    {
        return $this->db->insert('users',$user_data);

    }
 }

?>
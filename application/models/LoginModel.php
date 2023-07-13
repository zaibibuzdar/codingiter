<?php
  
  class LoginModel extends CI_Model{
    public function Can_login($username,$password){

         $this->db->where('username',$username,'password',$password);
       $users = $this->db->get('users')->row();
       return $users;
        // if(!$user) {
        //     $this->session->set_flashdata('login_error', 'Please check your email or password and try again.', 300);
        //     redirect(base_url('Login'));
        // }


        // if(!password_verify($user_data,$user->password)) {
        //     $this->session->set_flashdata('login_error', 'Please check your email or password and try again.', 300);
        //     redirect(base_url('Login'));
        // }
    }
  }
?>
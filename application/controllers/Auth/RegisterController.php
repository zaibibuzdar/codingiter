<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RegisterController extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('UserModel');
   }

   public function index()
   {
      $page_data['pages_title'] = 'Pages / Register - NiceAdmin Bootstrap Template';
      $page_data['pages'] = 'register';
      $this->load->view('Admin/layout', $page_data);
   }

   public function register()
   {

      $page_data['pages_title'] = 'Pages / Register - NiceAdmin Bootstrap Template';
      $page_data['pages'] = 'register';

      if ($this->input->post()) {

         $this->form_validation->set_rules('name', 'Your Name', 'required');
         $this->form_validation->set_rules('email', 'Your Email', 'required|valid_email');
         $this->form_validation->set_rules('username', 'Your Username', 'required');
         $this->form_validation->set_rules('password', 'Password', 'required');
         $this->form_validation->set_rules('passconf', 'Confirm Password', 'required|matches[password]');

         if ($this->form_validation->run() == false) {

            $this->index();
            // echo validation_errors();
         } else {
           // echo "successfully";
            $user_data = array(
               'name' => $this->input->post('name'),
               'email' => $this->input->post('email'),
               'username' => $this->input->post('username'),
               'password' => $this->input->post('password'),
            );

            //$register_user = new UserModel;
              $this->UserModel->register($user_data);

            // if ($cheking) {
               // $this->session->set_flashdata('status', 'Registered successfully !Go to Login');
            //    redirect(base_url('login'));
            // } else {
               // $this->session->set_flashdata('status', 'Registered Successfully !GO to login');
               redirect(base_url('Login'));
            // }
         }

      }

   }

}

?>
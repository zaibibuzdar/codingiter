<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
    }

    public function index()
    {
        $page_data['pages_title'] = 'Pages / Login - NiceAdmin Bootstrap Template';
        $page_data['pages'] = 'login';
        $this->load->view('Admin/layout', $page_data);
    }

    public function validation(){

        $this->form_validation->set_rules('username', 'User Name','required');
        $this->form_validation->set_rules('password','User Password','required');
          
        
        if($this->form_validation->run() == true){
            
             $username = $this->input->post('username');
              $password = $this->input->post('password');

            $userDetail = $this->LoginModel->Can_login($username,$password);
            if($userDetail)
            {
                // print_r($userDetail);die;
                //$suer_name['name'] = $userDetail['name'];
                    $_SESSION['name'] = $userDetail->name;
                    $_SESSION['username'] = $userDetail->username;
                    $_SESSION['email'] = $userDetail->email;
                    // echo $_SESSION['email'];

                    
             redirect(base_url('dashboard'));
            
            }
            else
            {
                echo 'password incorrect';
            }

            //redirect('dahsboard');
            
        // }else{
        //     $this->index();
        }
    }


  


}
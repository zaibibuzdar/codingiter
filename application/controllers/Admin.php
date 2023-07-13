<?php
 class  Admin extends CI_Controller{

   public function index(){
    $username = $_SESSION['username'];
    // echo $username;
    // die;
    if(isset($username) && !empty($username)){
      // echo "dash";
      // die;
      $page_data['pages_title'] = 'Dashboard - NiceAdmin Bootstrap Template';
      $page_data['pages'] = 'dashboard';
      $this->load->view('Admin/master',$page_data);
    }else{
      redirect(base_url('Login'));
    }
  
   }
   public function error404()
	{
        // $page_data['pages_title'] = 'Pages / Not Found 404 - NiceAdmin Bootstrap Template';
	      	// $page_data['pages'] = 'error';
        $this->load->view('Admin/error.php');
	}   

  public function profile(){


    $this->load->view('Admin/users-profile');
  }
  public function logout(){
    $this->session->unset_userdata('id');
    redirect(base_url('Login'));
}



// public function store(){

     
//   $data = array(
//       'name' =>$this->input->post('name'),
//       'email' =>$this->input->post('email'),
//       'phone' =>$this->input->post('phone'),
//       'course' =>$this->input->post('course'),
//       'country' =>$this->input->post('country'),

//   );

//   $data = ['status' => 'student add successfuly'];
//   $this->AjaxModel->inserstudents($data);
//   return $this->response->setJSON($data);

// }
// public function test(){
        
//   $this->load->view('Crud/test');
// }

 }
?>
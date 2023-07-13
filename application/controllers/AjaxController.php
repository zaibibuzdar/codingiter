<?php

use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class AjaxController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AjaxModel');
        $this->load->model('Upload_file');
    }

    public function index()
    {

        $this->load->view('Crud/Ajax');
    }

    public function store()
    {


        $data_student = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'course' => $this->input->post('course'),
            'country' => $this->input->post('country'),

        ];

        $this->AjaxModel->inserstudents($data_student);
        $response['record_row'] = $data_student;
        $response['status'] = 1;
        //$data_student=[' => data_student];
        //return $this->response->setJSON($data);
        echo json_encode($response);
    }


    public function fetch()
    {
        $data['students'] = $this->AjaxModel->getdata();
        echo json_encode($data);
    }


    public function edit()
    {
        $getdata = $this->input->post('student_id');
        $result  =  $this->AjaxModel->find_student($getdata);
        $response['records'] = $result;
        echo json_encode($response);
    }

    public function update()
    {

        $id = $this->input->post('std_id');

        $this->AjaxModel->updatetudents($id);
        $response['record_row'] = $id;
        echo json_encode($response);
    }

    public function delete()
    {
        $studentId = $this->input->post('record_id');
        $resultdata = $this->AjaxModel->deletestudent($studentId);
        $response['deletedata'] = $resultdata;
        echo json_encode($response);
    }



    public function image()
    {

        $this->load->view('Crud/test');
    }
    function upload()
    {

        $countFiles = count($_FILES['uploadedFiles']['name']);
        $countUploadedFiles = 0;
        $countErrorUploadFiles = 0;
        for ($i = 0; $i < $countFiles; $i++) {
            $_FILES['uploadFile']['name'] = $_FILES['uploadedFiles']['name'][$i];
            $_FILES['uploadFile']['type'] = $_FILES['uploadedFiles']['type'][$i];
            $_FILES['uploadFile']['size'] = $_FILES['uploadedFiles']['size'][$i];
            $_FILES['uploadFile']['tmp_name'] = $_FILES['uploadedFiles']['tmp_name'][$i];
            $_FILES['uploadFile']['error'] = $_FILES['uploadedFiles']['error'][$i];

            $uploadStatus = $this->uploadFile('uploadFile');
            if ($uploadStatus != false) {
                $countUploadedFiles++;
                $this->load->model('upload_file');
                $data = array(
                    'uploadedFiles' => $uploadStatus,

                );
                $this->upload_file->upload_data($data);
            } else {
                $countErrorUploadFiles++;
            }
        }

        $this->session->set_flashdata('messgae', 'Files Uploaded. Successfull Files Uploaded:' . $countUploadedFiles . ' and Error Uploading Files:' . $countErrorUploadFiles);
        redirect(base_url('AjaxController/image'));
    }

    function uploadFile($name)
    {
        $uploadPath = 'uploads/images/';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, TRUE);
        }

        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'jpeg|JPEG|JPG|jpg|png|PNG';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload($name)) {
            $fileData = $this->upload->data();
            return $fileData['file_name'];
        } else {
            return false;
        }
    }
}

<?php
class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ImageModel');
        $this->load->model('ProductImageModel');
    }
    public function index()
    {

        $data['products'] = $this->ImageModel->getproducts();
        $data['table'] = $this->ImageModel->getgallery();
        // echo '<pre>';
        // print_r($data['table']);
        // die;
        $this->load->view('Crud/imagecrud', $data);
    }




    public function create()
    {
        $this->load->view('Crud/createimage');
    }

    public function store()
    {
        $this->form_validation->set_rules('title', 'Prodcut Title', 'required');
        $this->form_validation->set_rules('description', 'Product-Description', 'required');
        $this->form_validation->set_rules('price', 'Prodcut Price', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('Test/create'));
        } else {
            $org_filse = $_FILES['image']['name'];
            $new_name = time() . "" . str_replace('', '-', $org_filse);
            $config = array(
                'upload_path' => "./uploads/",
                'allowed_types' => "jpg|png|jpeg|gif",
                'max_size' => "1024000", // file size , here it is 1 MB(1024 Kb)
                'file_name' => $new_name,
            );
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $data['error'] = array('error' => $this->upload->display_errors());

                $this->load->view('Crud/createimage', $data);
            } else {
                $pro_filename =  $this->upload->data('file_name');
                $data = [
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'price' => $this->input->post('price'),
                    'image' => $pro_filename
                ];
                $this->ImageModel->insertproducts($data);
                $last_inserted_id = $this->db->insert_id();

                // echo '<pre>';
                // print_r($last_inserted_id);


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
                            'product_id' => $last_inserted_id
                        );
                        echo '<pre>';
                        print_r($data);
                        die;
                        // $this->ImageModel->upload_data($data);
                    } else {
                        $countErrorUploadFiles++;
                    }
                }
                // $this->session->set_flashdata('success', "Successfully added product");

                // redirect(base_url('Test/index'));
            }
        }
    }
    function uploadFile($name)
    {
        $uploadPath = './uploads/';
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

    public function edit($id)
    {

        $page_data['editrecords'] = $this->ImageModel->getdetails($id);
        $page_data['editimages'] = $this->ImageModel->imagesdetails($id);
        $this->load->view('Crud/editimages', $page_data);
    }

    public function update($id)
    {


        $this->form_validation->set_rules('title', 'Prodcut Title', 'required');
        $this->form_validation->set_rules('description', 'Product-Description', 'required');
        $this->form_validation->set_rules('price', 'Prodcut Price', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('Test/edit/' . $id));
        } else {

            $old_filename = $this->input->post('old_image');
            $new_filename = $_FILES['image']['name'];

            if ($new_filename == TRUE) {

                // time() . "" . str_replace('','-',$ori_filename )

                $update_filename = time() . "" . str_replace('', '-', $_FILES['image']['name']);
                $config = [
                    'upload_path' => "./uploads/",
                    'allowed_types' => "jpg|png|jpeg|gif",
                    'file_name' => $update_filename,
                ];
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    if (file_exists("./uploads/" . $old_filename)) {
                        unlink("./uploads/" . $old_filename);
                    }
                }
            } else {
                $update_filename = $old_filename;
            }
            $data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'image' => $update_filename
            ];
            $this->ImageModel->updateproducts($data, $id);

            $countFiles = count($_FILES['uploadedFiles']['name']);
            $countUploadedFiles = 0;
            // echo '<pre>';
            // print_r($countFiles);
            // die;
            $countErrorUploadFiles = 0;
            for ($i = 0; $i < $countFiles; $i++) {

                $idgallery =  $this->input->post('galleryid');
                $postid = isset($idgallery[$i]) ? ($idgallery[$i]) : '';
                // echo '<pre>';
                // print_r($postid);
                // die;

                $_FILES['uploadFile']['name'] = $_FILES['uploadedFiles']['name'][$i];
                $_FILES['uploadFile']['type'] = $_FILES['uploadedFiles']['type'][$i];
                $_FILES['uploadFile']['size'] = $_FILES['uploadedFiles']['size'][$i];
                $_FILES['uploadFile']['tmp_name'] = $_FILES['uploadedFiles']['tmp_name'][$i];
                $_FILES['uploadFile']['error'] = $_FILES['uploadedFiles']['error'][$i];

                $uploadStatus = $this->updateFile('uploadFile');
                if ($uploadStatus != false) {
                    $countUploadedFiles++;
                    $this->load->model('upload_file');
                    $data = array(
                        'uploadedFiles' => $uploadStatus,

                    );
                    if ($postid) {
                        $gallerydat = $this->ImageModel->update_gallery($data, $postid);
                    } else {
                        $data = array(
                            'uploadedFiles' => $uploadStatus,
                            'product_id' => $id
                        );
                        $this->ImageModel->upload_data($data);
                    }


                    // echo '<pre>';
                    // print_r($gallerydat);
                    // die;
                } else {
                    $countErrorUploadFiles++;
                }
            }

            $this->session->set_flashdata('success', "Product Update Successfully");

            redirect(base_url('Test/index'));
        }
    }

    function updateFile($name)
    {
        $uploadPath = './uploads/';
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

    public function deleteimage()
    {
        $imageid = $this->input->post('deleteid');
        if ($imageid) {
            $delete =   $this->ImageModel->deleteedit($imageid);
            if ($delete == true) {
                $respone['success'] = '1';
            } else {
                $respone['error'] = '0';
            }
            echo json_encode($respone);
        }
    }

    public function delete($id)
    {
        $this->ImageModel->product_delete($id);
        $this->session->set_flashdata('delete', "Category delete Successfullly");

        redirect(base_url('Test/index'));
    }


    public function show($id)
    {

        $page_data['singlerocords'] = $this->ImageModel->getdetails($id);
        $page_data['productgallery'] = $this->ImageModel->imagesdetails($id);

        $this->load->view('Crud/product-detail', $page_data);
    }
}

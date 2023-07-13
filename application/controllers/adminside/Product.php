<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->model('NewProduct');
        $this->load->model('ProductModel');
        $this->load->model('CategoryModel');
    }

    public function index()
    {

        $data['categries'] = $this->NewProduct->getcategories();
        $data['products'] = $this->NewProduct->getdata();

        // $category_id = isset($row->category_id) ? explode(',',$row->category_id):'';
        // $row_record = $this->CategoryModel->get_categories($category_id);
        // $new_record['productDeatl']=  $row_record;

        $data['pages_title'] = 'Table/ Product - NiceAdmin Bootstrap Template';
        $data['pages'] = 'prdouctindex';
        $this->load->view('Admin/master', $data);
    }

    public function create()
    {
        $data['category'] = $this->CategoryModel->getdata();
        $data['pages_title'] = 'productcreate';
        $data['pages'] = 'productcreate';
        $this->load->view('Admin/master', $data);
    }

    public function store()
    {

        $this->form_validation->set_rules('title', 'product-Title', 'required');
        // $this->form_validation->set_rules('image', 'Product-image', 'required');
        $this->form_validation->set_rules('description', 'Product-Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('adminside/Product/create'));
        } else {
            $ori_filename = $_FILES['image']['name'];
            $new_name = time() . "" . str_replace('', '-', $ori_filename);
            $config = array(

                'upload_path' => "./uploads/",
                'allowed_types' => "jpg|png|jpeg|gif",
                'max_size' => "1024000", // file size , here it is 1 MB(1024 Kb)
                'file_name' => $new_name,
            );
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $data['error'] = array('error' => $this->upload->display_errors());

                $data['pages_title'] = 'Product-Create';
                $data['pages'] = 'product-create';
                $this->load->view('Admin/master', $data);
            } else {
                $pro_filename =  $this->upload->data('file_name');

                // $pro_category = implode(',', $category_id);
                // echo '<pre>';
                // print_r($category_id);
                // die;
                $data = [
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'price' => $this->input->post('price'),

                    'image' => $pro_filename
                ];
                $this->NewProduct->insertproducts($data);

                $last_inserted_id = $this->db->insert_id();
                // echo '<pre>';
                // print_r($last_inserted_id);
                // die;
                $category_id = $this->input->post('category_id');
                $countFilse = count($category_id);
                for ($i = 0; $i < $countFilse; $i++) {
                    $data = array(
                        'category_id ' => $category_id[$i],
                        'Product_id' => $last_inserted_id
                    );
                    // echo '<pre>';
                    // print_r($data);
                    $this->NewProduct->upload_data($data);
                }

                // foreach ($category_id as $productid) {
                //     $category['category_id '] = $productid;
                //     $category['Product_id'] = $last_inserted_id;
                // }
                // echo '<pre>';
                // print_r($countfilse);



                // $this->session->set_flashdata('success', "Successfully added product");

                // redirect(base_url('products'));
            }
        }
    }



    public function edit($id)
    {
        $data['product'] = $this->ProductModel->finditms($id);
        // $data['product'] = $this->ProductModel->findproduct($id);
        // echo $id;
        // die;
        $data['pages_title'] = 'Product-Edit';
        $data['pages'] = 'product-edit';
        $this->load->view('Admin/master', $data);
    }


    public function update($id)
    {
        $this->form_validation->set_rules('title', 'product Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('products-edit/' . $id));
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

            $this->session->set_flashdata('success', "Successfully Updated Product");
            $this->ProductModel->updatedata($data, $id);
            redirect(base_url('products'));
            // $this->session->set_flashdata('success', 'Your product update Successfully ');
            // $this->ProductModel->updatedata($id);
            // redirect(base_url('products'));
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;


class CategoryController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CategoryModel');
    }


    public function index()
    {
        //$this->load->helper('general');

        // $this->load->view('Admin/categories/index');
        // $query['categorydata'] = $this->CategoryModel->getdata();
        $data['category'] = $this->CategoryModel->getdata();
        // print_r($data);
        // die();
        $data['pages_title'] = "Table/ Categories - NiceAdmin Bootstrap Template";
        $data['pages'] = 'categories-index';
        $this->load->view('Admin/master', $data);
    }

    public function create()
    {
        $page_data['category'] = $this->CategoryModel->getdata();
        $page_data['pages_title'] = "Create-Categroy";
        $page_data['pages'] = 'categories-create';
        $this->load->view('Admin/master', $page_data);
    }


    public function store()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('discription', 'Descriptioin', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('categories-create'));
        } else {
            $this->session->set_flashdata('success', "SUCCESS_MESSAGE_HERE");
            $this->CategoryModel->insert();
            // $insertId = $this->db->insert_id();

            // echo '<pre>';
            // print_r($insertId);
            redirect(base_url('categories'));
        }
    }

    public function edit($id)
    {
        $page_data['category'] = $this->CategoryModel->getdata();
        $page_data['category_edit'] = $this->CategoryModel->finditms($id);
        // $page_data['category'] = $this->->finditms($id);
        $page_data['pages_title'] = "Edit Category";
        $page_data['pages'] = "edit-category";
        $this->load->view('Admin/master', $page_data);
    }

    public function update($id)
    {
        //   echo $id;die;
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('discription', 'Descriptioin', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            // $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('Edit-category/' . $id));
        } else {
            $this->session->set_flashdata('success', "Category update successfully");
            $this->CategoryModel->updatedata($id);
            redirect(base_url('categories'));
        }
    }

    public function delete($id)
    {

        $this->CategoryModel->delete_category($id);
        $this->session->set_flashdata('delete', "Category delete Successfullly");

        redirect(base_url('categories'));
    }

    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        foreach (range('A', 'F') as $coulumID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($coulumID)->setAutosize(true);
        }
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Title category');
        $sheet->setCellValue('C1', 'Parent category');
        $sheet->setCellValue('D1', 'category Description');


        $categories = $this->db->query("SELECT * FROM categories")->result_array();
        $x = 1; //start from row 2
        foreach ($categories as $row) {
            $sheet->setCellValue('A' . $x, $row['id']);
            $sheet->setCellValue('B' . $x, $row['title']);
            $sheet->setCellValue('C' . $x, $row['parent_id']);
            $sheet->setCellValue('D' . $x, $row['discription']);

            $x++;
        }

        $writer = new Csv($spreadsheet);
        $fileName = 'categorydetails_details_export2023.CSV';
        //$writer->save($fileName);  //this is for save in folder


        /* for force download */

        header('Content-Type: appliction/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        $writer->save('php://output');
        /* force download end */
    }


    ////  Import data////
    public function import()
    {



        $file = $_FILES['upload_excel']['tmp_name'];
        $handle = fopen($file, "r");
        $c = 0; //
        while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
            $post['id'] = $filesop[0];
            $post['title'] = $filesop[1];
            $post['parent_id'] = $filesop[2];
            $post['discription'] = $filesop[3];
            if ($c <> 0) {                    /* SKIP THE FIRST ROW */
                $this->CategoryModel->importcategory($post);
            }
            $c = $c + 1;
        }
        // echo "sucessfully import data !";

        $this->session->set_flashdata('success', 'import successfuly');
        redirect(base_url('categories'));
    }
}

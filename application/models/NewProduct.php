<?php

use Stripe\Product;

class NewProduct extends CI_Model
{


    public function insertproducts($data)
    {


        $this->db->insert('producting', $data);
    }

    public function getdata()
    {
        // $products_details = $this->db->get('products');
        // return $this->$products_details->result();


        $product_details = $this->db->get('producting');
        return $product_details->result();
    }


    public function finditms($id)
    {
        $product_edit = $this->db->get_where('products', array('id' => $id))->row();
        return $product_edit;
        //    $product_details = $this->db->get_where('prodcuts', array('id' => $id))->row();
        //     return $product_details;


    }

    public function updatedata($data, $id)
    {

        return $this->db->update('products', $data, ['id' => $id]);
    }

    public function upload_data($data)
    {
        $this->db->insert('prdocuts_categories', $data);
    }



    public function getcategories()
    {
        $this->db->select('*');
        $this->db->from('producting');
        //  $this->db->where('producting.pro_id ', $Product_id);
        $this->db->join('prdocuts_categories', 'prdocuts_categories.Product_id  = producting.pro_id');

        return $this->db->get()->result();
    }
}

<?php
use Stripe\Product;

class ProductModel extends CI_Model{


    public function insertproducts($data){


        $this->db->insert('products', $data);
    }

    public function getdata(){
        // $products_details = $this->db->get('products');
        // return $this->$products_details->result();


        $product_details = $this->db->get('products');
        return $product_details->result_array();
    }


    public function finditms($id){
        $product_edit = $this->db->get_where('products',array('id' => $id))->row();
        return $product_edit;
    //    $product_details = $this->db->get_where('prodcuts', array('id' => $id))->row();
    //     return $product_details;


    }

    public function updatedata($data,$id){

        return $this->db->update('products', $data,['id'=>$id]);

    }
}

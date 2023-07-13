<?php
class CategoryModel extends CI_Model
{

   public function insert()
   {

      $data_category = array(

         'title' => $this->input->post('title'),
         'discription' => $this->input->post('discription'),
         'parent_id'   => $this->input->post('parent_id')
      );
      return $this->db->insert('categories', $data_category);
   }


   public function importcategory($post)
   {

      return $this->db->insert('categories', $post);
   }

   public function getdata()
   {

      $category_details = $this->db->get('categories');
      return $category_details->result();
   }

   public function finditms($id)
   {
      $category_edit = $this->db->get_where('categories', array('id' => $id))->row();
      return $category_edit;
   }

   public function updatedata($id)
   {

      $data = [
         'title'        => $this->input->post('title'),
         'discription' => $this->input->post('discription'),
         'parent_id'   => $this->input->post('parent_id')
      ];

      $result = $this->db->where('id', $id)->update('categories', $data);
      return $result;
   }

   public function delete_category($id)
   {
      return $this->db->delete('categories', array('id' => $id));
      //   $destroy_data= $this->db->delete('categories',array('id' => $id))->row();
      // return $destroy_data;
   }


   public function getOne($id)
   {
      $parent =   $this->db->get_where('categories', array('id' => $id))->row();
      return $parent;
   }

   public function get_categories($category_data)
   {
      $val = explode(',', $category_data);
      $this->db->select('*');
      $this->db->from('categories');
      $this->db->where_in('id', $val);
      $query = $this->db->get();
      return $query->result_array();
   }
}

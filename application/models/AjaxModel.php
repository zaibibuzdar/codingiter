<?php
class AjaxModel extends CI_Model
{


    public function inserstudents($data_student)
    {

        $this->db->insert('students', $data_student);
    }

    public function getdata()
    {
        $students_data = $this->db->get('students');
        return $students_data->result();
    }

    public function find_student($getdata)
    {
        $students_edit = $this->db->get_where('students', array('id' => $getdata));
        return $students_edit->row();
    }

    public function updatetudents($id)
    {
        $updatestudent = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'course' => $this->input->post('course'),
            'country' => $this->input->post('country'),
        ];
        $result = $this->db->where('id', $id)->update('students', $updatestudent);
        return $updatestudent;
    }

    public function deletestudent($studentId)
    {
        return $this->db->delete('students', array('id' => $studentId));
    }
}

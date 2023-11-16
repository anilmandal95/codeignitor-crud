<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeModel extends CI_Model{

    public function getEmployee(){
        $query = $this->db->get('employees');
        return $query->result();
    }

    public function postEmployee($data){
        return $this->db->insert('employees', $data);
    }

    public function editEmployee($id){
        $this->db->where('id',$id);
        $query = $this->db->get('employees');
        return $query->row();
    }

    public function updateEmployee($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('employees', $data);
    }

}

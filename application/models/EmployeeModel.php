<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeModel extends CI_Model{

    public function getEmployee(){
        $query = $this->db->get('employees');

        return $query->result();
    }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class ApiEmployeeController extends RestController{

    public function __construct(){
        parent::__construct();
        $this->load->model('EmployeeModel');
    }

    public function index_get(){

        echo "I am from getEmployee index";

    }
    public function getEmployee_get(){
        $employee = new EmployeeModel;
        $result = $employee->getEmployee();
        $this->response($result,200);
       // echo "This is from getEmployee method";
    }

}



?>
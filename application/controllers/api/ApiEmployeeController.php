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

    public function storeEmployee_post(){
        $employee = new EmployeeModel;
        $data =[
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'profile_image' => $this->input->post('profile_image')
        ];
        // $this->response($data,200);
        $result = $employee->postEmployee($data);
       if ($result > 0) {
        $this->response([
            'status' => true,
            'message' => 'Employee created successfully'
        ], RestController::HTTP_OK);

       }else {
        $this->response([
            'status' => false,
            'message' => 'Failed to create employee'
        ], RestController::HTTP_BAD_REQUEST);
       }
        //echo "employee data will store here";

    }

    public function findEmployee_get($id){

        $employee = new EmployeeModel;

        $result = $employee->editEmployee($id);
        $this->response($result,200);
       // echo "Here you can find employee";
    }

    public function updateEmployeeData_put($id){
        $employee = new EmployeeModel;
        $data =[
            'name' => $this->input->put('name'),
            'email' => $this->input->put('email'),
            'profile_image' => $this->input->put('profile_image')
        ];
        // $this->response($data,200);
        $update_result = $employee->updateEmployee($id, $data);
       if ($update_result > 0) {
        $this->response([
            'status' => true,
            'message' => 'Employee updated successfully'
        ], RestController::HTTP_OK);

       }else {
        $this->response([
            'status' => false,
            'message' => 'Failed to update employee'
        ], RestController::HTTP_BAD_REQUEST);
       }

       // echo "here we will update the thing";

    }

}



?>
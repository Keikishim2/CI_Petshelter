<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index1 extends CI_Controller {
    function index()
	{
		$data["title"] = "CodeIgniter Pets";
		$this->load->view('index1', $data);
	}
	function fetch_user(){
		$this->load->model("crud_model");
		$fetch_data = $this->crud_model->make_datatables();
		$data = array();
		foreach($fetch_data as $row){
			$sub_array[] = array();
			$sub_array[] = $row->name;
			$sub_array[] = $row->type;
			$sub_array[] = '<button type="button" name="details" id="'.$row->id.'" class="btn btn-warning btn-xs update">Update</button>';  
			$sub_array[] = '<button type="button" name="edit" id="'.$row->id.'" class="btn btn-danger btn-xs update">Edit</button>';  
			$data[] = $sub_array;  
			}
		$output = array(
					"draw"                  =>		intval($_POST["draw"]),  
					"recordsTotal"          =>		$this->crud_model->get_all_data(),  
					"recordsFiltered"    	=>		$this->crud_model->get_filtered_data(),  
					"data"                  =>		$data  
			);  
			echo json_encode($output);  
		}
	function user_action(){
		if($_POST["action"] == "Add"){
			$insert_data = array(
				"name"					=>		$this->input->post("name"),
				"type"					=>		$this->input->post("type")	
			);
		$this->load->model('crud_model');
		$this->crud_model->insert_crud($insert_data);
		echo "Data inserted!";
		}
		if($_POST["action"] == 'Edit'){
			$updated_data = array(
				"name"					=>		$this->input->post("name"),
				"type"					=>		$this->input->post("type")
			);
		$this->load->model("crud_model");
		$this->crud_model->update_crud($this->input->post("user_id"), $updated_data);
		echo "Data Updated!";
		}
	}
	function fetch_single_user()  
    {  
        $output = array();  
        $this->load->model("crud_model");  
        $data = $this->crud_model->fetch_single_user($_POST["user_id"]);  
        foreach($data as $row){  
            $output["name"] = $row->name;  
            $output["type"] = $row->type; 
		}
		echo json_encode($output);
	}
}
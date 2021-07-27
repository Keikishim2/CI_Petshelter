<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* DOCU:
    Fetching index to route
        
    OWNER: Kei Kishimoto
*/
class Index1 extends CI_Controller {
    function index()
	{
		$data["title"] = "PetShelter";
		$this->load->view('index1', $data);
	}
}
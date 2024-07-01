<?php

class LocationsController extends CI_Controller
{
	public $data;
	public function home(){
		$this->load->admin_dashboard('locations/home', $this->data);
	}
}

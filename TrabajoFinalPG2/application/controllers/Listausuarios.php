<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listausuarios extends CI_Controller {

	public function index()
	{
	    $data['data'] = "";
	    
	    $this->load->model('usuarios_model');
	    $data['data'] = $this->usuarios_model->listaUsuarios();
	    $this->load->view('jsonreturn', $data);

	}
}

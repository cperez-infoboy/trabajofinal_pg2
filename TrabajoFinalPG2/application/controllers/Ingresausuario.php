<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingresausuario extends CI_Controller {

	public function index()
	{
	    $data['data'] = "";
	    
	    try {
    	    $datosusuario = json_decode(file_get_contents('php://input'));
    	    //$data['data'] = print_r($datosusuario, true);
    	    
    	    $this->load->model('usuarios_model');
    	    
    	    $this->usuarios_model->insertaUsuario($datosusuario);

	    } catch(Exception $e) {
	        $data['data'] = $e->getMessage();
    	}
    	
    	$this->load->view('jsonreturn', $data);
    	
	}
}

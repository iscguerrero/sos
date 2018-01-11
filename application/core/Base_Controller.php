<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends CI_Controller {
	public $templates;
	public function __construct(){
		parent::__construct();
		# Cargamos la base de datos por defecto
			$this->load->database();
		# Cargamos Helpers basicos
			$this->load->helper(array('url','form'));
		# Cargamos la libreria para la validacion de los formularios
			$this->load->library(array('form_validation', 'session'));
		# Configuracion inicial del motor de plantillas Plates
			$this->templates = new League\Plates\Engine(APPPATH . '/views');
			$this->templates->addFolder('partials', APPPATH . '/views/partials');
	}
	public function exitController($data){
		echo json_encode($data);
		exit();
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Base_Controller{
	function __construct(){
		parent::__construct();
		# Cargamos el modelo de la tabla de usuarios
			$this->load->model('tbl_usuarios_model');
	}
	function index(){
		isset($this->session->userdata['logged_in'])?header('Location:'.base_url('home')):$this->load->view('login');
	}
	public function process_login(){
		# Comprobamos que sea una ´peticion ajax la que hizo la peticin
			if(!$this->input->is_ajax_request()) show_404();
		# Validamos el formulario
			$this->form_validation->set_error_delimiters('', '<br>');
			$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required');
			$this->form_validation->set_rules('contrasenia', 'Contrasena', 'trim|required');
		# Establecemos los mensajes de error de validacion
			$this->form_validation->set_message('required','%s es obligatorio');
		# Enviamos los mensajes de error en caso de que el formulario no cumpla con las validaciones correspondientes
			if($this->form_validation->run()==false) $this->exitController(array('flag'=>false, 'class'=>'warning', 'message'=>'Por favor, atiende...', 'errors'=>validation_errors()));
		# Mandamos llamar el modelo con los datos del formulario
			$usuario = $this->input->post('usuario');
			$contrasenia = $this->input->post('contrasenia');
			$result = $this->tbl_usuarios_model->login($usuario, $contrasenia);
			if($result==false) $this->exitController(array('flag'=>false, 'class'=>'warning', 'message'=>'La combinacion de usuario y contraseña no es correcta'));
		# Llamamos el modelo nuevamente para llenar las variables de sesion
			$result = $this->tbl_usuarios_model->read_row($usuario);
			if($result!=false){
				$session_data = array(
					'id_usuario'=> $result[0]->id,
					'usuario' => $result[0]->usuario,
					'nombre'=> $result[0]->nombre,
					'oficina'=> $result[0]->tbl_oficinas_id,
					'perfil'=> $result[0]->tbl_perfiles_usuario_id,
				);
				$this->session->set_userdata('logged_in', $session_data);
				$this->exitController(array('flag'=>true, 'location'=>base_url()));
			}

	}
	public function logout(){
		$sess_array = array('usuario'=>'');
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message'] = 'La sesión finalizó correctamente.';
		header('Location:'.base_url());
	}	

}

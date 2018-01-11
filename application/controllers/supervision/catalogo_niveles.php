<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Catalogo_niveles extends Base_Controller {
	public function __construct(){
		parent::__construct();
		if(!isset($this->session->userdata['logged_in'])) header('Location:'.base_url());
		$this->load->model('ctl_niveles_model');
	}
	public function index(){
		echo $this->templates->render('supervision/catalogo_niveles');
	}
	public function list_rows(){
		$rows = $this->ctl_niveles_model->get_rows();
		$this->exitController(array('flag'=>true, 'class'=>'success', 'response'=>'Registros cargados con exito', 'rows'=>$rows));
	}
	public function row(){
		# Comprobamos que sea una peticion ajax la que hizo la peticin
			if(!$this->input->is_ajax_request()) show_404();
		# Validamos el formulario
			$this->form_validation->set_error_delimiters('', '<br>');
			$this->form_validation->set_rules('nivel', 'Nivel', 'trim|required|min_length[10]|max_length[85]');
			$this->form_validation->set_rules('e_a', 'E-A', 'trim|required|exact_length[1]|alpha');
			$this->form_validation->set_rules('nivel_dos', 'Tipo', 'trim|required|min_length[1]|max_length[35]');
		# Establecemos los mensajes de error
			$this->form_validation->set_message('required','%s es obligatorio');
			$this->form_validation->set_message('min_length', '%s no puede tener menos de %s carácteres');
			$this->form_validation->set_message('max_length', '%s no puede tener más de %s carácteres');
			$this->form_validation->set_message('alpha', '%s solo admite carácteres del alfabeto');
		# Enviamos los mensajes de error en caso de que el formulario no cumpla con las validaciones correspondientes
			if($this->form_validation->run()==false) $this->exitController(array('flag'=>false, 'class'=>'warning', 'message'=>'Por favor, atiende estas observaciones antes de continuar...', 'errors'=>validation_errors()));
			$data = array(
				'nivel'=>$this->input->post('nivel'),
				'e_a'=>$this->input->post('e_a'),
				'nivel_dos'=>$this->input->post('nivel_dos')
			);
		# Comprobamos si se trata de un insert o un update
			$this->input->post('id')==''?$this->ctl_niveles_model->insert_row($data):$this->ctl_niveles_model->update_row($data, $this->input->post('id'));
		#Finalizar el script en caso de exito
			$this->exitController(array('flag'=>true, 'class'=>'success', 'message'=>'Entraste al controlador con exito'));
	}
}
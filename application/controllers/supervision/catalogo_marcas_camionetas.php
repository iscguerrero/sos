<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Catalogo_marcas_camionetas extends Base_Controller {
	public function __construct(){
		parent::__construct();
		if(!isset($this->session->userdata['logged_in'])) header('Location:'.base_url());
		$this->load->model('ctl_marcas_camionetas_model');
	}
	public function index(){
		echo $this->templates->render('supervision/catalogo_marcas_camionetas');
	}
	public function list_rows(){
		$rows = $this->ctl_marcas_camionetas_model->get_rows();
		$this->exitController(array('flag'=>true, 'class'=>'success', 'response'=>'Registros cargados con exito', 'rows'=>$rows));
	}
	public function row(){
		# Comprobamos que sea una peticion ajax la que hizo la peticin
			if(!$this->input->is_ajax_request()) show_404();
		# Validamos el formulario
			$this->form_validation->set_error_delimiters('', '<br>');
			$this->form_validation->set_rules('marca', 'Marca', 'trim|required');
			$this->form_validation->set_rules('status', 'Estatus', 'trim|required');
		# Establecemos los mensajes de error
			$this->form_validation->set_message('required','%s es obligatorio');
		# Enviamos los mensajes de error en caso de que el formulario no cumpla con las validaciones correspondientes
			if($this->form_validation->run()==false) $this->exitController(array('flag'=>false, 'class'=>'warning', 'message'=>'Por favor, atiende estas observaciones antes de continuar...', 'errors'=>validation_errors()));
			$data = array(
				'marca'=>$this->input->post('marca'),
				'status'=>$this->input->post('status')
			);
		# Comprobamos si se trata de un insert o un update
			$this->input->post('id')==''?$this->ctl_marcas_camionetas_model->insert_row($data):$this->ctl_marcas_camionetas_model->update_row($data, $this->input->post('id'));
		#Finalizar el script en caso de exito
			$this->exitController(array('flag'=>true, 'class'=>'success', 'message'=>'Entraste al controlador con exito'));
	}
}
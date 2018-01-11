<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sequence extends Base_Controller {
	public function __construct(){
		parent::__construct();
		if(!isset($this->session->userdata['logged_in'])) header('Location:'.base_url());
		$this->load->model('sequence_model');
	}
	public function index(){
		echo $this->templates->render('supervision/sequence');
	}
	public function list_rows(){
		$rows = $this->sequence_model->get_rows();
		$this->exitController(array('flag'=>true, 'class'=>'success', 'response'=>'Registros cargados con exito', 'rows'=>$rows));
	}
	public function add_row(){
		# Comprobamos que sea una ´peticion ajax la que hizo la peticin
			if(!$this->input->is_ajax_request()) show_404();
		# Comprobamos que todas las variables necesarias hayan sido enviadas
			#if(!$this->input->post('seq_name') || !$this->input->post('seq_group') || !$this->input->post('seq_val') || !$this->input->post('type_seq')) show_404();
		# Validamos el formulario
			$this->form_validation->set_error_delimiters('', '<br>');
			$this->form_validation->set_rules('seq_name', 'Nombre', 'trim|required|min_length[8]|max_length[50]|alpha_numeric');
			$this->form_validation->set_rules('seq_group', 'Grupo', 'trim|required|exact_length[3]|alpha');
			$this->form_validation->set_rules('seq_val', 'Consecutivo', 'trim|required|min_length[1]|max_length[10]');
			$this->form_validation->set_rules('type_seq', 'Tipo', 'trim|required|exact_length[1]');
		# Establecemos los mensajes de error
			$this->form_validation->set_message('required','%s es obligatorio');
			$this->form_validation->set_message('min_length', '%s no puede tener menos de %s carácteres');
			$this->form_validation->set_message('max_length', '%s no puede tener más de %s carácteres');
			$this->form_validation->set_message('alpha_numeric', '%s solo puede contener carácteres alfanuméricos');
			$this->form_validation->set_message('exact_length', '%s solo puede contener %s carácteres');
			$this->form_validation->set_message('alpha', '%s solo admite carácteres del alfabeto');
		# Enviamos los mensajes de error en caso de que el formulario no cumpla con las validaciones correspondientes
			if($this->form_validation->run()==false) $this->exitController(array('flag'=>false, 'class'=>'warning', 'message'=>'Por favor, atiende estas observaciones antes de continuar...', 'errors'=>validation_errors()));
		# Insertamos el nuevo registro en el modelo
			$data = array(
				'seq_name'=>$this->input->post('seq_name'),
				'seq_group'=>$this->input->post('seq_group'),
				'seq_val'=>$this->input->post('seq_val'),
				'type_seq'=>$this->input->post('type_seq')
			);
			$this->sequence_model->insert_row($data);
		#Finalizar el script en caso de exito
			$this->exitController(array('flag'=>true, 'class'=>'success', 'message'=>'Entraste al controlador con exito'));
	}
}
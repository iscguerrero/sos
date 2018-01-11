<?
class Ctl_modelos_dispositivos_model extends CI_Model{
	public $data = array(
		'id'=>'',
		'modelo'=>'',
		'status'=>'',
		'ctl_modelos_dispositivos_id'=>''
	);
	public function __construct(){
		parent::__construct();
	}
	public function get_rows(){
		$query = $this->db->get('ctl_modelos_dispositivos');
		return $query->result();
	}
	public function insert_row($data){
		$this->db->insert('ctl_modelos_dispositivos', $data);
	}
	public function update_row($data, $id){
		$this->db->update('ctl_modelos_dispositivos', $data, array('id'=>$id));
	}
}
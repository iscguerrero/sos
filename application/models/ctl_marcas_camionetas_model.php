<?
class Ctl_marcas_camionetas_model extends CI_Model{
	public $data = array(
		'id'=>'',
		'marca'=>'',
		'status'=>''
	);
	public function __construct(){
		parent::__construct();
	}
	public function get_rows(){
		$query = $this->db->get('ctl_marcas_camionetas');
		return $query->result();
	}
	public function insert_row($data){
		$this->db->insert('ctl_marcas_camionetas', $data);
	}
	public function update_row($data, $id){
		$this->db->update('ctl_marcas_camionetas', $data, array('id'=>$id));
	}
}
<?
class Ctl_niveles_model extends CI_Model{
	public $data = array(
		'id'=>'',
		'nivel'=>'',
		'e_a'=>'',
		'nivel_dos'=>''
	);
	public function __construct(){
		parent::__construct();
	}
	public function get_rows(){
		$query = $this->db->get('ctl_niveles');
		return $query->result();
	}
	public function insert_row($data){
		$this->db->insert('ctl_niveles', $data);
	}
	public function update_row($data, $id){
		$this->db->update('ctl_niveles', $data, array('id'=>$id));
	}
}
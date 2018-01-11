<?
class Sequence_model extends CI_Model{
	public $data = array(
		'seq_name'=>'',
		'seq_group'=>'',
		'seq_val'=>'',
		'type_seq'=>''
	);
	public function __construct(){
		parent::__construct();
	}
	public function get_rows(){
		$query = $this->db->get('_sequence');
		return $query->result();
	}
	public function insert_row($data){
		$this->db->insert('_sequence', $data);
	}
	public function update_row(){
		$this->data = $_POST['data'];
		$this->db->update('_sequence', $this, array('seq_name' => $this->seq_name));
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tbl_usuarios_model extends CI_Model{
	public $data = array(
		'id'=>'',
		'usuario'=>'',
		'contrasenia'=>'',
		'nombre'=>'',
		'correo'=>'',
		'celular'=>'',
		'estado'=>'',
		'tbl_perfiles_usuario_id'=>'',
		'tbl_oficinas_id'=>''
	);
	public function __construct(){
		parent::__construct();
	}
	public function login($usuario, $contrasenia){
		$this->db->select('id, usuario, contrasenia');
		$this->db->from('tbl_usuarios');
		$this->db->where('usuario', $usuario);
		$this->db->where('contrasenia', MD5($contrasenia));
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==1)
			return $query->result();
		else
			return false;
	}
	# Consultamos la informacion del usuario para llenar las variables de sesion
	public function read_row($usuario){
		$this->db->select('*');
		$this->db->from('tbl_usuarios');
		$this->db->where('usuario', $usuario);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==1)
			return $query->result();
		else
		return false;
	}
}
<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Base_Controller{
	function __construct(){
		parent::__construct();
	}
	function index(){
		echo $this->templates->render('home');
	}
}
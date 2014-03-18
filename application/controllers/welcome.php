<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Frontend_Controller {

function __construct(){
	parent::__construct();
} // end constructor
/***********************************************/
/***********************************************/
public function index() {
	//$props = $this->prop_m->fetchPropInfo('300');
	var_dump($this->data);
	//$this->load->view('welcome_message', $this->data);
}
/***************************************************/
/***************************************************/
} // end class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
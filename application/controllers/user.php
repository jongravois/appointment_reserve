<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Frontend_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('user_m');
} // end constructor
/***********************************************/
/***********************************************/
public function index() {
	$this->load->view('splash', $this->data);
} // end index function
/***************************************************/
/***************************************************/
public function getValidationForm(){
	$this->load->view('validate', $this->data);
} // end getValidationForm function
/***************************************************/
public function validateUser(){
	$sDate = $this->input->post('DOB');
	if( (!$sDate || $sDate == '') && $this->input->post('SSN') == ''){ 
		redirect('user/index', 'refresh'); 
	}
	$pos = strrpos($sDate, "/");
	if ($pos === false) {
	    $DOB = $sDate;
	} else {
		list($m,$d,$y) = explode('/',$sDate);
		$DOB = $y.'-'.$m.'-'.$d;
	} // end if

	//print_r($DOB); die();

	$prp       = $this->input->post('propNum');
	$fname     = $this->input->post('fname');
	$lname     = $this->input->post('lname');
	$unit      = $this->input->post('unit');
	$email     = $this->input->post('email');
	$SSN       = $this->input->post('SSN');
	$esiteProp = 'AO' . $prp;

	$valInterior = $this->user_m->validateUserByEmail($email);
	//print_r($valInterior);die(); // return OBJECT of User

	if($valInterior){
		if ($valInterior->NOC < 3){
			//valid
			redirect('reserve/index/'.$valInterior->id, 'refresh');
		} else {
			// valid and blocked
			redirect('reserve/blockedUser/'.$prp, 'refresh');
			break;
		} // end if
	} else {
		// unknown user -- Test for ESite and Insert new user, set session variables and proceed
		switch( (int) $prp ){
			//case 300:
			case 700:
				$validate = $this->user_m->validateUserForTesting( $fname, $lname, $unit, $email, $SSN, $DOB, $esiteProp);
				//var_dump($validate);die();
				
				if( !$validate ){
					$val = "invalid";
				} else {
					$val = "valid";
				} // end if			
				break;
			default:
				if( !isset($SSN) || $SSN == ''){ $SSN = '0000'; } // end if
				if( !isset($DOB) || $DOB == ''){ $DOB = '0000-00-00'; } // end if
				$validate = $this->user_m->validateUserXT( $fname, $lname, $unit, $email, $SSN, $DOB, $prp);
				//var_dump($validate); die();  string(12) "bool(false) "

				$pos = strpos($validate, 'false');
				if( $pos === false ){
					$val = "valid";
				} else {
					$val = "invalid";
				} // end if
				break;
		} // end switch

		if( $val == 'invalid'){
			// invalid user
			$frmData = array(
				'fname'      => $fname,
				'lname'      => $lname,
				'unit'       => $unit,
				'email'      => $email,
				'SSN'        => $SSN,
				'DOB'        => $DOB
			);
			$this->data['form'] = $frmData;
			$this->load->view('invalid-user', $this->data);
		} else {
			// insert and harvest id and redirect to reserve/index
			$insArray = array(
				'propNumber' => $prp,
				'fname'      => $fname,
				'lname'      => $lname,
				'unit'       => $unit,
				'email'      => $email,
				'SSN'        => $SSN,
				'DOB'        => $DOB,
				'NOC'        => 0
			);

			$doit = $this->user_m->saveNewUser($insArray);
			redirect('reserve/index/'.$doit, 'refresh');
		} // end if
	} // end if
} // end validateUser function
/***************************************************/
/***************************************************/
/***************************************************/
} // end class

/* End of file user.php */
/* Location: ./application/controllers/user.php */
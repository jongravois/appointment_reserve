<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reserve extends Frontend_Controller {

function __construct(){
	parent::__construct();
} // end constructor
/***********************************************/
/***********************************************/
public function index($userID){
	$user = $this->user_m->getUserInfo($userID);
	$this->data['user'] = $user[0];
	$this->data['message'] = "<div id='splashLogo' style='margin:0 auto;text-align:center;''><img alt='logo' src='http://www.edrpo.com/edrAssets/iResLogos/{$user[0]['propNumber']}.png' /></div><!-- /splashLogo -->";
	
	$this->load->view('valid-user', $this->data);
} // end index function
/***************************************************/
public function blockedReservation($userID, $resourceID){
	$user = $this->user_m->getUserInfo($userID);
	$this->data['user'] = $user[0];
	$this->load->view('too_late', $this->data);
} // end blockedUser function
/**************************************************/
public function blockedUser(){
	$this->load->view('blocked', $this->data);
} // end blockedUser function
/**************************************************/
public function chooseResource($userID){
	$user = $this->user_m->getUserInfo($userID);
	$this->data['resources'] = $this->reserve_m->getAllPropertyResources($user[0]['propNumber']);
	$this->data['user'] = $user[0];
	$this->load->view('choose-resource', $this->data);
} // end chooseResource function
/**************************************************/
public function create_new_reservation($userID,$resID,$resDate,$resStart){
	$user = $this->user_m->getUserInfo($userID);
	$resource = $this->reserve_m->getOneResource($resID);
	$dura = (int)$resource[0]['defaultDuration'];

	list($yr,$mo,$da) = explode('-'.$resDate);
	$sHour = substr($resStart,0,2);
	$sMin = substr($resStart,2,2);
	
	$startTime = date('Y-m-d H:i:s', mktime($sHour,$sMin,0,date('m',strtotime($resDate)),date('d',strtotime($resDate)),date('Y',strtotime($resDate))));
	$endTime = date('Y-m-d H:i:s', mktime($sHour,$sMin+$dura,0,date('m',strtotime($resDate)),date('d',strtotime($resDate)),date('Y',strtotime($resDate))));

	$insArray = array(
		'propNumber' => (int)$user[0]['propNumber'],
		'resourceID' => (int)$resID,
		'user'       => (int)$userID,
		'resDate'    => date('Y-m-d', strtotime($resDate)),
		'start'      => substr($startTime,-8),
		'duration'   => $resource[0]['defaultDuration'],
		'end'        => substr($endTime,-8),
		'resStart'   => $startTime,
		'resEnd'     => $endTime,
		'checkedIn'  => 0
	);

	$doit = $this->reserve_m->saveReservationArray($insArray);
	
	if( $doit ){
		redirect('reserve/sendEmail/'.$doit,'refresh');
	} else {
		redirect('reserve/blockedReservation/'.$insArray['user'].'/'.$insArray['resourceID'],'refresh');
	} // end if
} // end create_new_reservation function
/**************************************************/
public function deleteExisting($userID){
	$user = $this->user_m->getUserInfo($userID);
	$this->data['myReservations'] = $this->reserve_m->getAllUserResources($userID);
	$this->data['user'] = $user[0];

	$this->load->view('choose-delete', $this->data);
} // end deleteExisting function
/***************************************************/
public function deleteReservation($id){
	$thisReservation = $this->reserve_m->getOneReservation($id);
	
	$doit = $this->reserve_m->killReservation($id);

	redirect('reserve/deleteExisting/'.$thisReservation[0]['user'],'refresh');
} // end deleteReservation function
/***************************************************/
public function getAvailTimes($userID,$resID,$rDate){
	$user = $this->user_m->getUserInfo($userID);
	$this->data['user'] = $user[0];
	$this->data['resID'] = $resID;
	$this->data['resDate'] = date('Y-m-d',strtotime($rDate));

	$this->data['availableSlots'] = $this->reserve_m->getAvailableSlots($this->data['resID'], $this->data['resDate']);

	$this->load->view('newReservationForm', $this->data);
} // end getAvailTimes function
/***************************************************/
public function invalidUser(){
	$this->load->view('invalid-user', $this->data);
} // end invalidUser function
/***************************************************/
public function new_success($userID){
	$user = $this->user_m->getUserInfo($userID);
	$this->data['message'] = "<h3>Your Reservation is confirmed!</h3><p>You will receive a confirmation email shortly.</p>";
	$this->data['user'] = $user[0];
	$this->load->view('valid-user', $this->data);
} // end new_success function
/**************************************************/
public function selectResource( $userID, $resID ){
	$user = $this->user_m->getUserInfo($userID);
	$this->data['user'] = $user[0];
	$this->data['resource'] = $this->reserve_m->getOneResource($resID);
	$this->load->view('resource', $this->data);
} // end selectResource function
/***************************************************/
public function sendEmail($id){
	$sql = "SELECT RV.*, PR.propertyName,PR.propertyEmail,FC.ireserveTo, US.fname, US.lname, US.email, US.unit, RS.resource, RS.resourcePropertySpecs FROM iReserve.reservations as RV LEFT JOIN proppro.properties as PR ON RV.propNumber = PR.propNumber LEFT JOIN proppro.formcontacts as FC ON RV.propNumber = FC.propNumber LEFT JOIN iReserve.users as US ON RV.user = US.id LEFT JOIN iReserve.resource as RS ON RV.resourceID = RS.id WHERE RV.id  = {$id}";
	$thisRsv = $this->reserve_m->xSQL($sql);
	
	$this->data['thisRsv'] = $thisRsv;

	// Send Email to Property
	$to = $this->data['property']->ireserveTo;
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: " . $thisRsv->email . "\r\nReply-To: " . $thisRsv->email;
	$headers .= "\r\nCc:";
	$subject = "Reservation Received";
	
	$message = $this->load->view('components/property-email-new',$this->data,TRUE);
		
	if ($thisRsv->email != "") {
		$mail_sent = @mail( $to, $subject, $message, $headers );
	} // end if

	// Send Confirmation Email
	$to = $thisRsv->email;
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: " . $thisRsv->propertyEmail . "\r\nReply-To: " . $thisRsv->propertyEmail;
	$headers .= "\r\nCc:";
	$subject = "Reservation Confirmed";
	
	$message = $this->load->view('components/confirmation-email-new',$this->data,TRUE);
		
	if ($thisRsv->email != "") {
		// Send the mail 
		$mail_sent = @mail( $to, $subject, $message, $headers );
	} // end if

	// Load Success Message
	redirect('reserve/new_success/'.$thisRsv->user,'refresh');
} // end sendEmail function
/***************************************************/
public function quitApplication(){
	$this->load->view('exit_app', $this->data);
} // end quitApplication function
/***************************************************/
/***********************************************/
/***********************************************/
} // end class

/* End of file Frontend_Controller.php */
/* Location: ./application/libraries/Frontend_Controller.php */
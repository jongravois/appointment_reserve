<?php

class User_m extends CI_Model{

function __construct(){
	parent::__construct();
	//$this->DB2 = $this->load->database('reserve',TRUE);
} // end constructor
/***************************************************/
/***************************************************/
public function getUserInfo($val) {
  $this->DB2 = $this->load->database('reserve',TRUE);
  $q = $this->DB2->where('id',$val)->get('users');
    
  if ( $q->num_rows() > 0 ) {
    foreach ($q->result_array() as $row) {
        $data[] = $row;	
    } // end foreach
    return $data;
  } // end if
} // end getUserInfo function
/***************************************************/
public function validateUserByEmail( $email ){
	$this->DB2 = $this->load->database('reserve',TRUE);
  $q = $this->DB2->where('email',$email)->limit(1)->get('users');
	//return $this->DB2->last_query();
	return $q->row();
} // end validateUserIR function
/***************************************************/
public function validateUserForTesting( $fname, $lname, $unit, $email, $SSN, $DOB, $prp ){
    $this->DB2 = $this->load->database('reserve',TRUE);
    if( $DOB == ''){
        $q = $this->DB2->where('propertyid',$prp)
                   ->like('LOWER(resifirstname)',$fname,'both')
                   ->where('LOWER(resilastname)',$lname)
                   ->where('LOWER(propertyid)',$prp)
                   ->where('LOWER(unitid)',$unit)
                   ->where('last4ssn',$SSN)
                   ->limit(1)->get('test_users');
    } else {
        $q = $this->DB2->where('propertyid',$prp)
                   ->like('LOWER(resifirstname)',$fname,'both')
                   ->where('LOWER(resilastname)',$lname)
                   ->where('LOWER(propertyid)',$prp)
                   ->where('LOWER(unitid)',$unit)
                   ->where('birthdate',$DOB)
                   ->limit(1)->get('test_users');
    } // end if

    //return $this->DB2->last_query();
    if ($q->num_rows() > 0) {
        return $q->row();
    } // end if
    return false;
} // end validateUserForTesting function
/**************************************************/
public function validateUserXT( $fname, $lname, $unit, $email, $SSN, $DOB, $prp ) {
    $user = file_get_contents("http://ireserve.edrtrust.com:81/index.php/edr/get_one/{$prp}/{$unit}/{$fname}/{$lname}/{$SSN}/{$DOB}");
    return $user;
} // end validateUserXT function
/**************************************************/
public function saveNewUser( $arr ){
    $this->DB2 = $this->load->database('reserve',TRUE);
    $this->DB2->insert('users',$arr);
    return $this->DB2->insert_id();
} // end saveNewUser function
/***************************************************/
/***************************************************/
/***************************************************/
/***************************************************/
} // end class

?>
<?php

class Reserve_m extends CI_Model{

function __construct(){
	parent::__construct();
	$this->DB2 = $this->load->database('reserve',TRUE);
} // end constructor
/***************************************************/
/***************************************************/
public function checkIfDateAvailable($u, $d, $r ){
	if( (int) $u == 1 ) {
		return 0;
	} else {
		$q = $this->DB2->where('user',$u)
	               ->where('resDate',$d)
	               ->where('resourceID',$r)
	               ->get('reservations');

    	return $q->num_rows();
    } // end if
} // end checkIfDateAvailable function
/**************************************************/
public function getAllPropertyResources( $prp ){
	$q = $this->DB2->where('propNumber',$prp)->order_by('resource')->get('resource');
    
    if ( $q->num_rows() > 0 ) {
    	foreach ($q->result_array() as $row) {
        	$data[] = $row;	
    	} // end foreach
    	return $data;
    } // end if
    return false;
} // end getAllPropertyResources function
/***************************************************/
public function getAllUserResources( $id ){
	$sql = "SELECT rv.*, rr.resource FROM reservations AS rv LEFT JOIN resource AS rr ON rv.resourceID = rr.id WHERE rv.user = {$id} AND rv.resStart >= NOW() ORDER BY rv.resourceID, rv.resStart";
	$q = $this->DB2->query($sql);
	//return $this->DB2->last_query();
	
	if ($q->num_rows() > 0){
		foreach($q->result_array() as $row){
		    $data[] = $row;
		} // end foreach
		return $data;
	} // end if
	return false;
} // end getAllUserResouces function
/***************************************************/
public function getAvailableSlots($resID, $resDate){
	//return $resDate;
	$dtDate = strtotime($resDate); 		// returns a date ( 2011-04-20 )
    $thisDay = date('w', $dtDate); 		// returns day of week 0 - 6
		
    $today  = date('Y-m-d');
		
	$getOpen     = $this->reserve_m->getResourceOpen( $resID, $thisDay );
	$getClose    = $this->reserve_m->getResourceClose( $resID, $thisDay );
	$getDuration = $this->reserve_m->getResourceDuration( $resID );
    
    $dura = (int) $getDuration;
        
	$start    = strtotime( $strDate . ' ' . $getOpen );
	$finish   = strtotime( $strDate . ' ' . $getClose );
	$duration = $dura * 60; // in minutes
	$slots    = ($finish - $start) / $duration;
        
    $arrReserved = $this->reserve_m->getReservationsByResource( $resID, $resDate ); //03:00 PM
        
    $rsTimeSlots = array();
    $timeNow  = date('H:i',time() + 3600);
        
    for ($cnt = 0; $cnt < $slots; $cnt++) {
	    if ($today == $resDate) {
			if (date("H:i",$start + $duration) > $timeNow) {
		        if ( !in_array( date("h:i A",$start),$arrReserved) ) {
			    	array_push($rsTimeSlots, array(
			    		'resource' => $resID,
			    		'resDate' => date("Y-m-d", $start),
			    		'slot' => date("h:i A",$start) . " --- " . date("h:i A",$start+$duration),
			    		'start' => date("Hi",$start)
			    	));
		        } // end if
			} // end if
        } else {
	    	if ( !in_array( date("h:i A",$start),$arrReserved) ) {
				array_push($rsTimeSlots, array(
					'resource' => $resID,
					'resDate' => date("Y-m-d", $start),
					'slot' => date("h:i A",$start) . " --- " . date("h:i A",$start+$duration),
			    	'start' => date("Hi",$start)
				));
			} // end if
	    } // end if
	    $start = $start + $duration;
    } // end for
	
	return $rsTimeSlots;
} // end getAvailableSlots function
/**************************************************/
public function getOneReservation( $id ){
	$q = $this->DB2->where('id',$id)->get('reservations');
		
	if ($q->num_rows() > 0) {
	    foreach($q->result_array() as $row){
	        $data[] = $row;
	    } // end foreach
	    return $data;
	} // end if
	return false;
} // end getOneReservation function
/***************************************************/
public function getOneResource( $id ){
	$q = $this->DB2->where('id',$id)->get('resource');
    
    if ( $q->num_rows() > 0 ) {
    	foreach ($q->result_array() as $row) {
        	$data[] = $row;	
    	} // end foreach
    	return $data;
    } // end if
    return false;
} // end getOneResources function
/***************************************************/
public function getReservationsByResource( $id, $date ){
	$sql = "SELECT Right(resStart,8) AS sDT FROM reservations WHERE resourceID = " . (int) $id . " AND resDate >= '" . $date . "' AND resStart < '" . $date . "' + INTERVAL 1 day";
	$q = $this->DB2->query( $sql );
	$data = array();
	        
    if ( $q->num_rows() > 0 ) {
	    foreach ($q->result_array() as $row) {
			list($hr,$mi,$se) = explode(':',$row['sDT']);
		
			switch( (int) $hr ){
		        case 0:
			    	$thisDate = $hr . ':' . $mi . " AM";
			    	break;
		        case 1:
			    	$thisDate = $hr . ':' . $mi . " AM";
			    	break;
		        case 2:
			    	$thisDate = $hr . ':' . $mi . " AM";
			    	break;
		        case 3:
			    	$thisDate = $hr . ':' . $mi . " AM";
			    	break;
		        case 4:
			    	$thisDate = $hr . ':' . $mi . " AM";
			    	break;
		        case 5:
			    	$thisDate = $hr . ':' . $mi . " AM";
			    	break;
		        case 6:
			    	$thisDate = $hr . ':' . $mi . " AM";
			    	break;
		        case 7:
			    	$thisDate = $hr . ':' . $mi . " AM";
			    	break;
		        case 8:
			    	$thisDate = $hr . ':' . $mi . " AM";
			    	break;
		        case 9:
			    	$thisDate = $hr . ':' . $mi . " AM";
			    	break;
		        case 10:
			    	$thisDate = $hr . ':' . $mi . " AM";
			    	break;
		        case 11:
			    	$thisDate = $hr . ':' . $mi . " AM";
			    	break;
		        case 12:
			    	$thisDate = $hr . ':' . $mi . " PM";
			    	break;
		        case 13:
			    	$thisDate = "0" . ($hr - 12) . ':' . $mi . " PM";
			    	break;
		        case 14:
			    	$thisDate = "0" . ($hr - 12) . ':' . $mi . " PM";
			    	break;
		        case 15:
			    	$thisDate = "0" . ($hr - 12) . ':' . $mi . " PM";
			    	break;
		        case 16:
			    	$thisDate = "0" . ($hr - 12) . ':' . $mi . " PM";
			    	break;
		        case 17:
			    	$thisDate = "0" . ($hr - 12) . ':' . $mi . " PM";
			    	break;
		        case 18:
			    	$thisDate = "0" . ($hr - 12) . ':' . $mi . " PM";
			    	break;
		        case 19:
			    	$thisDate = "0" . ($hr - 12) . ':' . $mi . " PM";
			    	break;
		        case 20:
			    	$thisDate = "0" . ($hr - 12) . ':' . $mi . " PM";
			    	break;
		        case 21:
			    	$thisDate = "0" . ($hr - 12) . ':' . $mi . " PM";
			    	break;
		        case 22:
			    	$thisDate = $hr - 12 . ':' . $mi . " PM";
			    	break;
		        case 23:
			    	$thisDate = $hr - 12 . ':' . $mi . " PM";
			    	break;
		        case 24:
			    	$thisDate = $hr - 12 . ':' . $mi . " PM";
			    	break;
			} // end switch
		
			array_push($data,$thisDate);	
	    } // end foreach
    } // end if
  	return $data;
} // end getReservationsByResource function
/***************************************************/
public function getResourceClose( $res, $day ){
	switch((int)$day){
		case 0:
			$q = $this->DB2->select('close0')->from('resource')->where('id', $res)->get();
			$row = $q->row();
			return $row->close0;
			break;
		case 1:
			$q = $this->DB2->select('close1')->from('resource')->where('id', $res)->get();
			$row = $q->row();
			return $row->close1;
			break;
		case 2:
			$q = $this->DB2->select('close2')->from('resource')->where('id', $res)->get();
			$row = $q->row();
			return $row->close2;
			break;
		case 3:
			$q = $this->DB2->select('close3')->from('resource')->where('id', $res)->get();
			$row = $q->row();
			return $row->close3;
			break;
		case 4:
			$q = $this->DB2->select('close4')->from('resource')->where('id', $res)->get();
			$row = $q->row();
			return $row->close4;
			break;
		case 5:
			$q = $this->DB2->select('close5')->from('resource')->where('id', $res)->get();
			$row = $q->row();
			return $row->close5;
			break;
		case 6:
			$q = $this->DB2->select('close6')->from('resource')->where('id', $res)->get();
			$row = $q->row();
			return $row->close6;
			break;
	} // end switch
} // end getResourceClose function
/***************************************************/
public function getResourceDuration( $val ){
	$q = $this->DB2->select('defaultDuration')->where('id',$val)->get('resource');

    if ($q->num_rows() > 0) {
	    $row = $q->row();
    } // end if
    return $row->defaultDuration;
} // end getResourceDuration function
/***************************************************/
public function getResourceOpen( $res, $day ){
	switch((int)$day){
		case 0:
			$q = $this->DB2->select('open0')->where('id', $res)->get('resource');
			$row = $q->row();
			return $row->open0;
			break;
		case 1:
			$q = $this->DB2->select('open1')->where('id', $res)->get('resource');
			$row = $q->row();
			return $row->open1;
			break;
		case 2:
			$q = $this->DB2->select('open2')->where('id', $res)->get('resource');
			$row = $q->row();
			return $row->open2;
			break;
		case 3:
			$q = $this->DB2->select('open3')->where('id', $res)->get('resource');
			$row = $q->row();
			return $row->open3;
			break;
		case 4:
			$q = $this->DB2->select('open4')->where('id', $res)->get('resource');
			$row = $q->row();
			return $row->open4;
			break;
		case 5:
			$q = $this->DB2->select('open5')->where('id', $res)->get('resource');
			$row = $q->row();
			return $row->open5;
			break;
		case 6:
			$q = $this->DB2->select('open6')->where('id', $res)->get('resource');
			$row = $q->row();
			return $row->open6;
			break;
	} // end switch
} // end getResourceOpen function
/***************************************************/
public function killReservation( $id ){
	$this->DB2->where('id',$id)->delete('reservations');
} // end killReservation function
/***************************************************/
public function saveReservationArray($array){
	$q = $this->DB2->where('propNumber',$array['propNumber'])
	               ->where('resourceID',$array['resourceID'])
	               ->where('resStart',$array['resStart'])
	               ->get('reservations');

	if ($q->num_rows() == 0) {
	    $this->DB2->insert('reservations',$array);
		return $this->DB2->insert_id();
    } // end if
    return false;
} // end saveReservationArray function
/**************************************************/
public function xSQL($sql){
	$q = $this->DB2->query($sql);
    return $q->row();
} // end xSQL function
/**************************************************/
/***************************************************/
/***************************************************/
/***************************************************/
} // end class

?>
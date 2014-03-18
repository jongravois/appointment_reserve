<?php

class Prop_m extends CI_Model{

function __construct(){
	parent::__construct();
} // end constructor
/***************************************************/
/***************************************************/
public function fetchPropInfo( $id ){
	$sql = "SELECT 
		a.propNumber
		,a.propertyName
		,a.propertyAddress 
		,a.propertyCity
		,a.propertyState 
		,a.propertyZip 
		,a.propertyPhone 
		,a.propertyEmail
		,a.propertyProductionURL 
		,b.ireserveTo  
	FROM
		properties a 
	LEFT JOIN
		formcontacts b 
	ON
		a.propNumber = b.propNumber
	WHERE
		a.propStatus = 'active' 
	AND 
		a.propNumber = {$id}";
	$q = $this->db->query($sql);

	if ($q->num_rows() > 0) {
	    foreach($q->result_array() as $row){
	        $data[] = $row;
	    } // end foreach
	    return $data;
	} // end if
	return false;
} // end fetchPropInfo function
/***************************************************/
public function loadFromURL(){
	if (!array_key_exists('HTTP_HOST', $_SERVER)) {
        //return $this->loadDefaultProperty();
        redirect('http://www.edrtrust.com','refresh');
    }

    $hostname = $_SERVER['HTTP_HOST'];
    if (strpos($hostname, ':')) {
        // strip port.
        $hostname = substr($hostname, 0, strpos($hostname, ':'));
    }

    if (substr_count($hostname, '.') < 2) {
        // Not enough info.
        //return $this->loadDefaultProperty();
        redirect('http://www.edrtrust.com','refresh');
    }

    $base_url = implode('.', array_slice(explode('.', $hostname), -2));

    $sql = "SELECT 
		a.propNumber
		,a.propertyName
		,a.propertyAddress 
		,a.propertyCity
		,a.propertyState 
		,a.propertyZip 
		,a.propertyPhone 
		,a.propertyEmail 
		,b.ireserveTo  
	FROM
		properties a 
	LEFT JOIN
		formcontacts b 
	ON
		a.propNumber = b.propNumber
	WHERE 
		a.propertyProductionURL LIKE '%{$base_url}%'
	";

	$query = $this->db->query($sql);
    if ($query->num_rows() === 0) {
        //return $this->loadDefaultProperty();
        redirect('http://www.edrtrust.com','refresh');
    } else {
        return $query->row(0);
    }
} // end loadURL function
/***************************************************/
/***************************************************/
/***************************************************/
} // end class

?>
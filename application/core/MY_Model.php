<?php

class MY_Model extends CI_Model{

	protected $_table_name     = '';
	protected $_primary_key    = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by       = '';
	public $rules              = array();
	protected $_timestamps     = FALSE;

function __construct(){
	parent::__construct();
} // end constructor
/**************************************************/
/**************************************************/
public function get($id = NULL, $single = FALSE){
	if($id != NULL):
		$filter = $this->_primary_filter;
		$id = $filter($id);
		$this->db->where($this->_primary_key, $id);
		$method = 'row';
	elseif ($single == TRUE) :
		$method = 'row';
	else:
		$method = 'result';
	endif;

	if(!count($this->db->ar_orderby)):
		$this->db->order_by($this->_order_by);
	endif;

	return $this->db->get($this->_table_name)->$method();
} // end get function
/**************************************************/
public function get_by($where, $single = FALSE){
	$this->db->where($where);
	return $this->get(NULL, $single);
} // end get_by function
/**************************************************/
public function save($data, $id = NULL){
	// Set timestamps
	if ($this->_timestamps == TRUE) :
		$now = date('Y-m-d H:i:s');
		$id || $data['created'] = $now;
		$data['modified'] = $now;
	endif;
		
	if ($id === NULL) :
		// Insert
		!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
		$this->db->set($data);
		$this->db->insert($this->_table_name);
		$id = $this->db->insert_id();
	else:
		// Update
		$filter = $this->_primary_filter;
		$id = $filter($id);
		$this->db->set($data);
		$this->db->where($this->_primary_key, $id);
		$this->db->update($this->_table_name);
	endif;
		
	return $id;
} // end save function
/**************************************************/
public function delete($id){
	$filter = $this->_primary_filter;
	$id = $filter($id);
		
	if (!$id) { return FALSE; }
		
	$this->db->where($this->_primary_key, $id);
	$this->db->limit(1);
	$this->db->delete($this->_table_name);
} // end delete function
/**************************************************/
/***************************************************/
/**************************************************/
/**************************************************/
} // end class
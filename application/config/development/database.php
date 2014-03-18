<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$active_group = "reserve";
$active_record = TRUE;

$db['reserve']['hostname'] = 'localhost'; // "70.32.74.155";
$db['reserve']['username'] = "dbEdR";
$db['reserve']['password'] = "!EdR@500";
$db['reserve']['database'] = "iDeserve";
$db['reserve']['dbdriver'] = "mysql";
$db['reserve']['dbprefix'] = "";
$db['reserve']['pconnect'] = FALSE;
$db['reserve']['db_debug'] = FALSE;
$db['reserve']['cache_on'] = FALSE;
$db['reserve']['cachedir'] = "";
$db['reserve']['char_set'] = "utf8";
$db['reserve']['dbcollat'] = "utf8_general_ci";

/**********************************/

$db['property']['hostname'] = 'localhost'; // "70.32.74.155";
$db['property']['username'] = "dbEdR";
$db['property']['password'] = "!EdR@500";
$db['property']['database'] = "propdev";
$db['property']['dbdriver'] = "mysql";
$db['property']['dbprefix'] = "";
$db['property']['pconnect'] = FALSE;
$db['property']['db_debug'] = FALSE;
$db['property']['cache_on'] = FALSE;
$db['property']['cachedir'] = "";
$db['property']['char_set'] = "utf8";
$db['property']['dbcollat'] = "utf8_general_ci";

/* End of file database.php */
/* Location: ./application/config/database.php */
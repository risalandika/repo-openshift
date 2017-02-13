<?php 
//connect to database 
$connectionstring = odbc_connect("NZ09", "usr_probis", "usr#probis"); 
function getQuery($Query){
	global $connectionstring;
	$hasil = odbc_do($connectionstring, $Query);
	return $hasil;
}
 ?>
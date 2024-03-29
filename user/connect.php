<?php
/* Database config */
$db_host		= 'sql307.infinityfree.com';
$db_user		= 'if0_34701432';
$db_pass		= 'FUMsWDdMmfdUH';
$db_database	= 'if0_34701432_model'; 

/* End config */

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
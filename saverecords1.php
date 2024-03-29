<?php
session_start();
include('connect.php');
$a = $_POST['rack'];
$k = $_POST['tray'];
$b = $_POST['des'];
$t = $_POST['details'];
$c = $_POST['from'];
$z = $_POST['to'];


// Insert the record into the database
$sql = "INSERT INTO records (rack, tray, des, details,`from`,`to`) VALUES (:a,:k,:b,:t,:c,:z)";
$q = $db->prepare($sql);
$q->execute(array(':a' => $a,':k' => $k,':b' => $b,':t' => $t,':c' => $c,':z' => $z));

header("location: viewrecord.php");
?>

<?php
include('connect.php');
$id = $_GET['id'];
$result = $db->prepare("DELETE FROM userr WHERE id = ?");
$result->execute(array($id));

header("location: usermanagement.php");
?>

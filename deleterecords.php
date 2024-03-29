<?php
include('connect.php');
$id = $_GET['id'];
$result = $db->prepare("DELETE FROM records WHERE id = ?");
$result->execute(array($id));

header("location: viewrecord.php");
?>

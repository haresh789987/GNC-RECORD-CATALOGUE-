<?php
include('connect.php');

// new data
$a = $_POST['rack'];
$h = $_POST['tray'];
$b = $_POST['des'];
$t = $_POST['details'];
$c = $_POST['from'];
$z = $_POST['to'];
$id = $_POST['memi']; // Assuming this is the 'id' of the student you want to update

// Check if the record exists before updating
$check_sql = "SELECT COUNT(*) as count FROM records WHERE id = :id";
$check_q = $db->prepare($check_sql);
$check_q->execute(array(':id' => $id));
$result = $check_q->fetch(PDO::FETCH_ASSOC);
if ($result['count'] > 0) {
    // Record exists, proceed with the update
    $update_sql = "UPDATE records 
                   SET rack=?, tray=?, des=?, details=?, `from`=?, `to`=?
                   WHERE id=?";
    $q = $db->prepare($update_sql);
    $q->execute(array($a, $h, $b, $t, $c, $z, $id));
    header("location: viewrecord.php");
} else {
    // Record not found, handle the error or redirect accordingly
    echo "Error: Record not found.";
}
?>

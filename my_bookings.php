<?php require_once("header.php"); ?>
<?php 
print_r($_REQUEST);

$sql = "select * from bookings where user_id = ".$_REQUEST['user_id'];
$res = $conn->query($sqrt);
?>
<?php
require("./connect.php");

$id = $_GET['id'];
// echo '' . $id . '';
$sql = "delete from expense where id = {$id}";
mysqli_query($conn, $sql);
header("Location: /");
?>
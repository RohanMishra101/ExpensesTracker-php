<?php

require("./connect.php");

$name = $_POST['title'];
$amount = $_POST['amount'];
$description = $_POST['description'];
$expensesDate = $_POST['expDate'];
$categories = $_POST['categories'];

$sql = "INSERT into expense(title,amount,description,expenses_date,category_id) 
        values ('$name','$amount','$description','$expensesDate','$categories')";

mysqli_query($conn, $sql);

header("location: /");
?>
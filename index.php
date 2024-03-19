<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css"> 
    <title>GPA Calculator</title>
</head>
<body class="container pad2">

<?php

$display_form = 'login';


if ($display_form === 'login') {
    include 'login.php';
} elseif ($display_form === 'register') {
    include 'register.php';
} elseif ($display_form === 'calculator') {
    include 'gpa_calculator.php';
}
?>
</body>

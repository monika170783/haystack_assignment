<?php
session_start();
include '../database/mysql.php';
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/assignment/frontend/assets/css/dashboard.css" type="text/css">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="assets/css/dashboard.css" type="text/css">
</head>
<body>
<?php if (isset($_SESSION['username'])): ?>
    <nav>
        <ul>
            <li><a class="<?php if ($current_page == 'dashboard.php') { echo 'current'; } ?>" href="/assignment/frontend/dashboard.php">Dashboard</a></li>
            <li><a class="<?php if ($current_page == 'table1.php') { echo 'current'; } ?>" href="/assignment/frontend/table1.php">Table 1</a></li>
            <li><a class="<?php if ($current_page == 'table2.php') { echo 'current'; } ?>" href="/assignment/frontend/table2.php">Table 2</a></li>
            <li><a class="<?php if ($current_page == 'table3.php') { echo 'current'; } ?>" href="/assignment/frontend/table3.php">Table 3</a></li>
            <li><a class="<?php if ($current_page == 'table4.php') { echo 'current'; } ?>" href="/assignment/frontend/table4.php">Table 4</a></li>
            <li><a href="/assignment/frontend/logout.php">Logout</a></li>
        </ul>
    </nav>
<?php else: ?>
    <nav>
        <ul>
            <li><a href="/assignment/frontend/login.php">Login</a></li>
            <li><a href="/assignment/frontend/register.php">Register</a></li>
        </ul>
    </nav>
<?php endif; ?>
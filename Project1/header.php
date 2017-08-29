<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == '1') {
        include('db.php');
}
?>
<!DOCTYPE HTML>
<html>
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>Life Group</title>

                <meta name="viewport" content="width=device-width, initial-scale=1">
                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

                <!-- jQuery library -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

                <!-- Latest compiled JavaScript -->
                <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>


        </head>
        <body>
                <div class="container">
                        <?php if (isset($_SESSION['login']) && $_SESSION['login'] == '1') { ?>
                                <nav class="navbar navbar-inverse">
                                        <div class="container-fluid">
                                                <div class="navbar-header">
                                                </div>
                                                <ul class="nav navbar-nav">
                                                        <?php if ($_SESSION['user_type'] == 'master') { ?>
                                                        <li><a href="admin.php?page=add_admin">Add Admin</a></li>
                                                        <?php } ?>
                                                        <li><a href="admin.php?page=new_user">New user</a></li>
                                                        <li><a href="admin.php?page=revised_user">Revised user</a></li>
                                                        <li><a href="admin.php?page=history_user">History of users</a></li>
                                                </ul>
                                                <ul class="nav navbar-nav navbar-right">
                                                        <li><a href="logout.php">Logout</a></li>
                                                </ul>
                                        </div>
                                </nav>
                        <?php } ?>
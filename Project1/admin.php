<?php
include('header.php');

if ($_SESSION['login'] != '1') {
        header('Location: index.php');
}
include($_SESSION['user_type'].'_view.php');


include('footer.php'); ?>
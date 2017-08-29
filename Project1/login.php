<?php
include('header.php');
include('db.php');
$status = '';
if (!isset($_SESSION['login']) || $_SESSION['login'] != '1') {
        if (isset($_POST['username']) && $_POST['username'] != '' && isset($_POST['password']) && $_POST['password'] != '') {
                $sql = "SELECT * FROM admin where name='" . $_POST['username'] . "' and password='" . $_POST['password'] . "' and type='" . $_GET['type'] . "'";
                $result = mysql_query($sql);
                if (mysql_num_rows($result) > 0) {
                        $row = mysql_fetch_assoc($result);
                        $_SESSION['login'] = '1';
                        $_SESSION['user_type'] = $_GET['type'];
                        $_SESSION['user_id'] = $row['id'];
                        header('Location: admin.php');
                } else {
                        $status = 'Username or Password is wrong. Please try again..';
                }
        }
} else if ($_SESSION['login'] == '1') {
        header('Location: admin.php');
}
?>



<div class="center-block" style="max-width:600px;margin-top: 15%;">
        <div class="jumbotron">
                <?php if ($status != '') { ?>
                        <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Error!</strong> <?php echo $status; ?>
                        </div>
                <?php } ?>
                <form class="form-horizontal" action="" method="post">
                        <h3 class="text-center">Login</h3>
                        <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Username:</label>
                                <div class="col-sm-10">
                                        <input type="text" name="username" class="form-control" id="email" placeholder="Enter Username" required>
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Password:</label>
                                <div class="col-sm-10"> 
                                        <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password" required>
                                </div>
                        </div>
                        <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">Login</button>
                                </div>
                        </div>
                </form>
        </div>
</div>



<?php include('footer.php'); ?>
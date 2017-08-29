<?php
include('db.php');
$status_e = '';
$status_s = '';

if (isset($_POST['memform']) && $_POST['memform'] == 'submit') {
    if (empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['email']) || empty($_POST['comment'])) {
        $status_e = 'Please enter all fields.';
    } elseif (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $_POST['email'])) {
        $status_e = 'Invalid Email address';
    } else {
        $sql = "INSERT INTO `guest_details` (`name`, `phone`, `email`, `memb_name`, `comment`, `time_start`, `history`) VALUES ('" . $_POST['name'] . "', '" . $_POST['phone'] . "', '" . $_POST['email'] . "', '" . $_POST['memb_name'] . "', '" . $_POST['comment'] . "', '" . time() . "', '0')";
        mysql_query($sql);
        if (mysql_affected_rows() > 0) {

            $to = $_POST['email'];
            $subject = "This is automatic reply";
            $txt = "thanks for contacting us.";
            $headers = "From: delango.bio@gmail.com" . "\r\n";

            //mail($to,$subject,$txt,$headers);

            $status_s = 'Your comment has been Added <strong>Successfully</strong>.';
        } else {
            $status_e = 'Something is wrong. <strong>Please try again</strong>.';
        }
    }
}
include('header.php');
?>



<div class="center-block" style="width:700px;max-width: 100%;margin-top: 15%;">
    <div class="jumbotron">
<?php if ($status_e != '') { ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> <?php echo $status_e; ?>
            </div>
        <?php } ?>
        <?php if ($status_s != '') { ?>
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo $status_s; ?>
            </div>
        <?php } ?>
        <div class="col-sm-12 col-md-3 col-md-push-9">
            <a href="login.php?type=master" class="btn btn-block btn-primary">Master Login</a>
            <br/>
            <a href="login.php?type=admin" class="btn btn-block btn-primary">Leader Login</a>
        </div>
        <div class="col-sm-12 col-md-9 col-md-pull-3">
            <form class="form-horizontal" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="phone">Phone:</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="memb_name">Member Name:</label>
                    <div class="col-sm-10">
                        <input type="text" name="memb_name" class="form-control" id="memb_name" placeholder="Member Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="comment">Member Comment:    </label>
                    <div class="col-sm-10">
                        <textarea  name="comment" class="form-control" id="comment" placeholder="Member Comment" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="memform" value="submit" class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
</div>




<?php include('footer.php'); ?>
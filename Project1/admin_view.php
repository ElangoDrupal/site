<?php
              

$status_e = '';
$status_s = '';
if (!isset($_GET['page']) || $_GET['page'] == '') {
        $_GET['page'] = 'new_user';
}

if (isset($_POST['guest_id']) && $_POST['guest_id'] != '') {
        if (!isset($_POST['name']) && $_POST['name'] == '' && !isset($_POST['email']) && $_POST['email'] == '' && !isset($_POST['phone']) && $_POST['phone'] == '' && !isset($_POST['memb_name']) && $_POST['memb_name'] == '' && !isset($_POST['comment']) && $_POST['comment'] == '') {
                $status_e = 'Please enter all fields.';
        } else {
                $sql = "UPDATE guest_details SET 
                                email='" . $_POST['name'] . "',
                                phone='" . $_POST['phone'] . "',
                                memb_name='" . $_POST['memb_name'] . "',
                                comment='" . $_POST['comment'] . "',
                                name='" . $_POST['name'] . "' where id='" . $_POST['guest_id'] . "'";
                mysql_query($sql);
                if (mysql_affected_rows() > 0) {
                        $status_s = 'User Info has been Updated by admin <strong>Successfully</strong>.';
                } else {
                        $status_e = 'Something is wrong. <strong>Please try again</strong>.';
                }
        }
}

else if (isset($_POST['edit_comment_id']) && $_POST['edit_comment_id'] != '') {
        if (!isset($_POST['acomment']) && $_POST['acomment'] == '') {
                $status_e = 'Please enter all fields.';
        } else {
                $sql = "UPDATE admin_comments SET 
                                admin_id='" . $_SESSION['user_id'] . "',
                                time='" . time() . "',
                                comment='" . $_POST['acomment'] . "' where id='" . $_POST['edit_comment_id'] . "'";
                mysql_query($sql);
                if (mysql_affected_rows() > 0) {
                        $status_s = 'Coomment has been Updated by admin <strong>Successfully</strong>.';
                } else {
                        $status_e = 'Something is wrong. <strong>Please try again</strong>.';
                }
        }
}
else if (isset($_POST['new_comment']) && $_POST['new_comment'] == 'yes') {
        if (!isset($_POST['admin_comment']) && $_POST['admin_comment'] == '' && !isset($_POST['name']) && $_POST['name'] == '') {
                $status_e = 'Please enter all fields.';
        } else {
                $time = time();
                $comment_id = md5($_SESSION['user_id'] . $time);
                if ($_GET['page'] == 'new_user') {
                        $sql = "UPDATE guest_details SET 
                                        comment_id='" . $comment_id . "',
                                        admin_id='" . $_SESSION['user_id'] . "',
                                        respond_time='" . $time . "'
                                        where id='" . $_POST['id'] . "'";
                        mysql_query($sql);
                } else {
                        $comment_id = $_POST['comment_id'];
                }

                $sql = "INSERT INTO `admin_comments` (`admin_id`, `comment_id`, `comment`, `time`) VALUES ('" . $_SESSION['user_id'] . "', '" . $comment_id . "', '" . $_POST['admin_comment'] . "', '" . $time . "')";
                mysql_query($sql);
                if (mysql_affected_rows() > 0) {
                        $status_s = 'Admin Comment has been Added <strong>Successfully</strong>.';
                } else {
                        $status_e = 'Something is wrong. <strong>Please try again</strong>.';
                }
        }
}
else if (isset($_GET['mode']) && $_GET['mode'] == 'history') {
        $sql = "UPDATE guest_details SET history='1' where id='" . $_GET['id'] . "'";
        mysql_query($sql);
        header('Location: admin.php?page=' . $_GET['page']);
        exit();
}
else if (isset($_GET['mode']) && $_GET['mode'] == 'delete') {
        $sql = "DELETE FROM guest_details WHERE id='" . $_GET['id'] . "'";
        mysql_query($sql);
        header('Location: admin.php?page=' . $_GET['page']);
        exit();
}
?>
<div class="center-block" style="width: 400px;max-width: 100%;margin-top: 5%;">
        <?php
        $title = 'New User';
        if (isset($_GET['page']) && $_GET['page'] != '') {
                if ($_GET['page'] == 'new_user')
                        $title = 'New User';
                else if ($_GET['page'] == 'revised_user')
                        $title = 'Revised User';
                else if ($_GET['page'] == 'history_user') {
                        $title = 'history of User';
                }
        }
        ?>
        <h3 class="text-center"><?= $title; ?></h3>
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
        <div class="table-responsive">          
                <table class="table table-hover table-bordered table-striped">
                        <thead>
                                <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <?php /* if ($_GET['page'] == 'history_user') { ?>
                                          <th>Email</th>
                                          <th>Phone</th>
                                          <th>memb Name</th>
                                          <th>memb Comment</th>
                                          <?php } */ ?>
                                        <?php if ($_GET['page'] == 'history_user') { ?>
                                                <th>Action</th>
                                        <?php } ?>
                                </tr>
                        </thead>
                        <tbody>
                                <?php
                                $admin_id = "IS NULL";
                                $history = '0';
                                if (isset($_GET['page']) && $_GET['page'] != '') {
                                        if ($_GET['page'] == 'new_user')
                                                $admin_id = "IS NULL";
                                        else if ($_GET['page'] == 'revised_user')
                                                $admin_id = "IS NOT NULL";
                                        else if ($_GET['page'] == 'history_user') {
                                                $admin_id = "IS NOT NULL";
                                                $history = '1';
                                        }
                                }
                                $sql = "SELECT * FROM guest_details where admin_id " . $admin_id . " and  history='" . $history . "' ORDER BY id DESC";
                                $result = mysql_query($sql);
                                if (mysql_num_rows($result) > 0) {
                                        // output data of each row
                                        $i = 0;
                                        while ($row = mysql_fetch_assoc($result)) {

                                                $i++;
                                                ?>
                                                <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td>
                                                                <?php
                                                                if ($row["respond_time"] != '') {
                                                                        if ((($row["respond_time"] - $row["time_start"]) / 3600) <= 10) {
                                                                                ?>
                                                                                <a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#myModal<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></a>
                                                                        <?php } else if ((($row["respond_time"] - $row["time_start"]) / 3600) > 10 && ((time() - $row["time_start"]) / 3600) <= 24) { ?>
                                                                                <a href="javascript:void(0);" class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></a>
                                                                        <?php } else if ((($row["respond_time"] - $row["time_start"]) / 3600) > 24) { ?>
                                                                                <a href="javascript:void(0);" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></a>
                                                                                <?php
                                                                        }
                                                                } else {
                                                                        if (((time() - $row["time_start"]) / 3600) <= 10) {
                                                                                ?>
                                                                                <a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#myModal<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></a>
                                                                        <?php } else if (((time() - $row["time_start"]) / 3600) > 10 && ((time() - $row["time_start"]) / 3600) <= 24) { ?>
                                                                                <a href="javascript:void(0);" class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></a>
                                                                        <?php } else if (((time() - $row["time_start"]) / 3600) > 24) { ?>
                                                                                <a href="javascript:void(0);" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></a>
                                                                                <?php
                                                                        }
                                                                }
                                                                ?>
                                                                <?php if ($_GET['page'] != 'history_user') { ?>     
                                                                        <div id="myModal<?php echo $row["id"]; ?>" class="modal fade" role="dialog">
                                                                                <div class="modal-dialog modal-xs">
                                                                                        <!-- Modal content-->
                                                                                        <div class="modal-content">

                                                                                                <div class="modal-header">
                                                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                        <h4 class="modal-title">Edit user Detail</h4>
                                                                                                </div>
                                                                                                <div class="modal-body">
                                                                                                        <div class="well">
                                                                                                                <form method="post">
                                                                                                                        <p><b>Name</b> : <input type="text" name="name" placeholder="Name" value="<?php echo $row["name"]; ?>" required/></p>
                                                                                                                        <p><b>Email</b> : <input type="text" name="email" placeholder="Email" value="<?php echo $row["email"]; ?>" required/></p>
                                                                                                                        <p><b>Phone</b> : <input type="text" name="phone" placeholder="Phone" value="<?php echo $row["phone"]; ?>" required/></p>
                                                                                                                        <p><b>Memb Name</b> : <input type="text" name="memb_name" placeholder="memb_name" value="<?php echo $row["memb_name"]; ?>" required/></p>
                                                                                                                        <p><b>Memb Comment</b> : <textarea  name="comment" class="form-control" placeholder="Comment" required><?php echo $row["comment"]; ?></textarea></p>
                                                                                                                        <input type="hidden" name="guest_id" value="<?= $row["id"] ?>"/>

                                                                                                                        <p><b>Time stamp</b> :
                                                                                                                                <?php
                                                                                                                                if ($row["respond_time"] != '') {
                                                                                                                                        if ((($row["respond_time"] - $row["time_start"]) / 3600) <= 10) {
                                                                                                                                                ?>
                                                                                                                                                <span class="label label-success"><?php echo date("d-F-Y h:i:s A", $row["time_start"]); ?></span>
                                                                                                                                        <?php } else if ((($row["respond_time"] - $row["time_start"]) / 3600) > 10 && (($row["respond_time"] - $row["time_start"]) / 3600) <= 24) { ?>
                                                                                                                                                <span class="label label-warning"><?php echo date("d-F-Y h:i:s A", $row["time_start"]); ?></span>
                                                                                                                                        <?php } else if ((($row["respond_time"] - $row["time_start"]) / 3600) > 24) { ?>
                                                                                                                                                <span class="label label-danger"> <?php echo date("d-F-Y h:i:s A", $row["time_start"]); ?></span>
                                                                                                                                                <?php
                                                                                                                                        }
                                                                                                                                } else {
                                                                                                                                        if (((time() - $row["time_start"]) / 3600) <= 10) {
                                                                                                                                                ?>
                                                                                                                                                <span class="label label-success"><?php echo date("d-F-Y h:i:s A", $row["time_start"]); ?></span>
                                                                                                                                        <?php } else if (((time() - $row["time_start"]) / 3600) > 10 && ((time() - $row["time_start"]) / 3600) <= 24) { ?>
                                                                                                                                                <span class="label label-warning"><?php echo date("d-F-Y h:i:s A", $row["time_start"]); ?></span>
                                                                                                                                        <?php } else if (((time() - $row["time_start"]) / 3600) > 24) { ?>
                                                                                                                                                <span class="label label-danger"> <?php echo date("d-F-Y h:i:s A", $row["time_start"]); ?></span>
                                                                                                                                                <?php
                                                                                                                                        }
                                                                                                                                }
                                                                                                                                ?>
                                                                                                                        </p>
                                                                                                                        <input type="submit" class="btn btn-primary" id="submit-btn" value="Update " />
                                                                                                                </form>
                                                                                                        </div>
                                                                                                        <h3>Comments of admin</h3>
                                                                                                        <div class="well">
                                                                                                                <?php
                                                                                                                $sql1 = "SELECT ac.*,a.name as admin_name FROM admin_comments ac INNER JOIN admin a ON ac.admin_id=a.id where ac.comment_id='" . $row["comment_id"] . "' ORDER BY ac.id ASC";
                                                                                                                $result1 = mysql_query($sql1);
                                                                                                                if (mysql_num_rows($result1) > 0) {
                                                                                                                        while ($row1 = mysql_fetch_assoc($result1)) {
                                                                                                                                ?>
                                                                                                                                <blockquote>
                                                                                                                                        <form method="post">                                                                                                                                 
                                                                                                                                                <p><textarea  name="acomment" class="form-control" placeholder="Admin Comment" required><?= $row1['comment'] ?></textarea></p>                                                                                                                                    
                                                                                                                                                <footer>Last updated by <?= $row1['admin_name'] ?>  
                                                                                                                                                        <?php if ((($row1["time"] - $row["time_start"]) / 3600) <= 10) {
                                                                                                                                                                ?>
                                                                                                                                                                <span class="label label-success"><?php echo date("d-F-Y h:i:s A", $row1["time"]); ?></span>
                                                                                                                                                        <?php } else if ((($row1["time"] - $row["time_start"]) / 3600) > 10 && (($row1["time"] - $row["time_start"]) / 3600) <= 24) { ?>
                                                                                                                                                                <span class="label label-warning"><?php echo date("d-F-Y h:i:s A", $row1["time"]); ?></span>
                                                                                                                                                        <?php } else if ((($row1["time"] - $row["time_start"]) / 3600) > 24) { ?>
                                                                                                                                                                <span class="label label-danger"> <?php echo date("d-F-Y h:i:s A", $row1["time"]); ?></span>
                                                                                                                                                        <?php }
                                                                                                                                                        ?>

                                                                                                                                                </footer>
                                                                                                                                                <input type="hidden" name="edit_comment_id"  value="<?= $row1['id'] ?>" />
                                                                                                                                                <input type="submit" class="btn btn-primary" id="submit-btn" value="Update " />
                                                                                                                                        </form>
                                                                                                                                </blockquote>
                                                                                                                                <?php
                                                                                                                        }
                                                                                                                }
                                                                                                                ?>
                                                                                                                <form method="post">
                                                                                                                        <p>Admin New Comment : <textarea  name="admin_comment" class="form-control" id="admin_comment" placeholder="Admin Comment" required></textarea></p>
                                                                                                                        <input type="hidden" name="new_comment"  value="yes" />
                                                                                                                        <?php if ($_GET['page'] == 'revised_user') { ?>
                                                                                                                                <input name="comment_id" type="hidden" value="<?php echo $row["comment_id"]; ?>" />
                                                                                                                        <?php } ?>
                                                                                                                        <input name="id" type="hidden" value="<?php echo $row["id"]; ?>" />
                                                                                                                        <input type="submit" class="btn btn-primary" id="submit-btn" value="Add New Comment" />
                                                                                                                </form>
                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                        <button type="button" class="btn btn-primary edit_myModal<?php echo $row["id"]; ?>" onclick="make_edit('myModal<?php echo $row["id"]; ?>');">Edit</button>
                                                                                                        
                                                                                                        <input name="mode" type="hidden" value="guest_edit" />
                                                                                                        <?php if ($_GET['page'] == 'revised_user') { ?>
                                                                                                                <a href="admin.php?mode=history&id=<?php echo $row["id"]; ?>&page=<?= $_GET['page'] ?>" class="btn btn-success">Successfully Asimulated</a>
                                                                                                        <?php } ?>
                                                                                                        <a href="admin.php?mode=delete&id=<?php echo $row["id"]; ?>&page=<?= $_GET['page'] ?>" class="btn btn-danger">Delete</a>
                                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                                </div>

                                                                                        </div>

                                                                                </div>
                                                                        </div>
                                                                <?php } ?>
                                                        </td>
                                                        <?php /* if ($_GET['page'] == 'history_user') { ?>
                                                          <td><?php echo $row["email"]; ?></td>
                                                          <td><?php echo $row["phone"]; ?></td>
                                                          <td><?php echo $row["memb_name"]; ?></td>
                                                          <td><?php echo $row["comment"]; ?></td>
                                                          <?php } */ ?>
                                                        <?php if ($_GET['page'] == 'history_user') { ?>
                                                                <td>

                                                                        <script>
                                                                                function printDiv(id)
                                                                                {

                                                                                        var divToPrint = document.getElementById('DivIdToPrint' + id);

                                                                                        var newWin = window.open('', 'Print-Window');

                                                                                        newWin.document.open();

                                                                                        newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');

                                                                                        newWin.document.close();

                                                                                        setTimeout(function () {
                                                                                                newWin.close();
                                                                                        }, 10);

                                                                                }
                                                                        </script>
                                                                        <a href="javascript:void(0);" class="btn btn-primary" onclick='printDiv(<?php echo $row["id"]; ?>);'>Print</a>
                                                                        <!-- Modal -->
                                                                        <div id="DivIdToPrint<?php echo $row["id"]; ?>" style=" display: none;">

                                                                                <div class="well">
                                                                                        <p><b>Name</b> : <?php echo $row["name"]; ?></p>
                                                                                        <p><b>Email</b> : <?php echo $row["email"]; ?></p>
                                                                                        <p><b>Phone</b> : <?php echo $row["phone"]; ?></p>
                                                                                        <p><b>Memb Name</b> : <?php echo $row["memb_name"]; ?></p>
                                                                                        <p><b>Memb Comment</b> : <?php echo $row["comment"]; ?></p>
                                                                                        <p><b>Time stamp</b> :
                                                                                                <?php
                                                                                                if ($row["respond_time"] != '') {
                                                                                                        if ((($row["respond_time"] - $row["time_start"]) / 3600) <= 10) {
                                                                                                                ?>
                                                                                                                <span class="label label-success"><?php echo date("d-F-Y h:i:s A", $row["time_start"]); ?></span>
                                                                                                        <?php } else if ((($row["respond_time"] - $row["time_start"]) / 3600) > 10 && (($row["respond_time"] - $row["time_start"]) / 3600) <= 24) { ?>
                                                                                                                <span class="label label-warning"><?php echo date("d-F-Y h:i:s A", $row["time_start"]); ?></span>
                                                                                                        <?php } else if ((($row["respond_time"] - $row["time_start"]) / 3600) > 24) { ?>
                                                                                                                <span class="label label-danger"> <?php echo date("d-F-Y h:i:s A", $row["time_start"]); ?></span>
                                                                                                                <?php
                                                                                                        }
                                                                                                } else {
                                                                                                        if (((time() - $row["time_start"]) / 3600) <= 10) {
                                                                                                                ?>
                                                                                                                <span class="label label-success"><?php echo date("d-F-Y h:i:s A", $row["time_start"]); ?></span>
                                                                                                        <?php } else if (((time() - $row["time_start"]) / 3600) > 10 && ((time() - $row["time_start"]) / 3600) <= 24) { ?>
                                                                                                                <span class="label label-warning"><?php echo date("d-F-Y h:i:s A", $row["time_start"]); ?></span>
                                                                                                        <?php } else if (((time() - $row["time_start"]) / 3600) > 24) { ?>
                                                                                                                <span class="label label-danger"> <?php echo date("d-F-Y h:i:s A", $row["time_start"]); ?></span>
                                                                                                                <?php
                                                                                                        }
                                                                                                }
                                                                                                ?>
                                                                                        </p>
                                                                                </div>
                                                                                <h3>Comments of admin</h3>
                                                                                <div class="well">
                                                                                        <?php
                                                                                        $sql1 = "SELECT *,a.name as admin_name FROM admin_comments ac INNER JOIN admin a ON ac.admin_id=a.id where ac.comment_id='" . $row["comment_id"] . "' ORDER BY ac.id ASC";
                                                                                        $result1 = mysql_query($sql1);
                                                                                        if (mysql_num_rows($result1) > 0) {
                                                                                                while ($row1 = mysql_fetch_assoc($result1)) {
                                                                                                        ?>
                                                                                                        <blockquote>
                                                                                                                <p><b><?= $row1['comment'] ?></b></p>
                                                                                                                <footer>Last updated by <?= $row1['admin_name'] ?>  @ <?php echo date("d-F-Y h:i:s A", $row1["time"]); ?>
                                                                                                                </footer>
                                                                                                        </blockquote>
                                                                                                        <hr/>
                                                                                                        <?php
                                                                                                }
                                                                                        }
                                                                                        ?>
                                                                                </div>
                                                                        </div>


                                                                        <!-- Modal -->


                                                                </td>
                                                        <?php } ?>
                                                </tr>
                                                <?php
                                        }
                                }
                                ?>
                        </tbody>
                </table>
        </div>
</div>
<script>
        $(document).ready(function() {
                $(".modal input").prop('disabled', true);
                $(".modal textarea").prop('disabled', true);
                $(".modal input[type=submit]").hide();
        });
        function make_edit(modal){
               $("#"+modal+" input").prop('disabled', false);
               $("#"+modal+" textarea").prop('disabled', false);
               $("#"+modal+" input[type=submit]").show();
               $(".edit_"+modal).hide();
        }
</script>

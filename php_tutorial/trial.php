<!DOCTYPE html>
<html>
<?php  $status_e='';
  $status_s='';?>
<head>
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
</head>
<?php
  $status_e='';
  $status_s='';
  if($_SERVER["REQUEST_METHOD"] == "POST") {


            if(empty($_POST['user_name']) ||  empty($_POST['user_email']) || empty($_POST['user_website'])|| empty($_POST['comments'])|| empty($_POST['gender']))
             {
                  $status_e="Please enter all fields";
             }
             elseif(!preg_match("/^[a-z,A-Z]*$/", $_POST['user_email']))
             {
                   $status_e= "enter the valid email address";
              }
              elseif(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$_POST['user_website']))
              {
                    $status_e= "enter the valid email URL";
              }
              else
              {
                echo "tinmeis".date("h:i:sa"); 
                echo "every thing os good";
             }
}
?>
<?php if(!empty($status_e)){?> 
    <div class="alert alert-danger">
              <a hef = "#" class="close" data-dismiss='alert' >&times;</a>
              <strong>Error<?php echo $status_e; ?></strong>
    </div>
<?php } ?>


<body>
<div class="center-block" style="width:700px;max-width: 100%;margin-top: 15%;">
    <div class="jumbotron">
        <div class="col-sm-12 col-md-9 col-md-pull-3">
<!--         <form method="POST" action="<?php //echo htmlspecialchars($_SERVER["welcome.php"]);  ?>"> 
 -->
             <form method="POST" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<!--              <form method="post"                    action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 -->
                <div class="form-group">
                 <label class="control-label col-sm-2" for="user_name"> Name: </label>
                     <div class="col-sm-13">
                          <input type=text name="user_name" placeholder="Enter ur name"><br />
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" for="user_email"> Email: </label>
                      <div class="col-sm-13">
                           <input type =text name="user_email" placeholder="Enter ur Email"><br />
                      </div>
                </div>
                <label class="control-label col-sm-2" for="user_website"> Website: </label>
                      <div class="col-sm-13">
                           <input type =text name="user_website" placeholder="Enter ur Website"><br />
                      </div>
                <label class="control-label col-sm-2" for="comments" > Comment: </label>
                        <div class="col-sm-13">
                            <textarea name ="comments"  placeholder="Enter ur comments"></textarea>
                        </div>
                        
                <label class="control-label col-sm-2" for="comments" > Gender: </label>
                         <div class="col-sm-13">
                         <input type="radio" name="gender" value="female">Female
                         <input type="radio" name="gender" value="male">Male
                         </div>
                 <br />
                <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="member_form" value ="submit">submit</button>
                </div>
        </form>
        </div>
        <div class ="clearfix"></div> 
    </div>
</div>
</body>
</html>





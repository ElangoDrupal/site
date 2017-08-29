<!DOCTYPE html>
<html>
<body>

<div class="center-block" style="width:700px;max-width: 100%;margin-top: 15%;">
    <div class="jumbotron">
        <div class="col-sm-12 col-md-9 col-md-pull-3">

        <form method="POST" action="<?php echo $_SERVER['welcome.php'];  ?>"> 
                 <label class="control-label col-sm-2" for="user_name"> Name: 
                     <div class="col-sm-10">
                          <input type=text name="user_name" placeholder="Enter ur name"><br />
                     </div>

                <label class="control-label col-sm-2" for="user_email"> Email: 
                      <div class="col-sm-10">
                           <input type =text name="user_email"><br />
                      </div>


                <label class="control-label col-sm-2" for="user_website"> Website: 
                      <div class="col-sm-10">
                           <input type =text name="user_website"><br />
                      </div>


                <label class="control-label col-sm-2" for="comments"> Comment: 
                        <div class="col-sm-10">
                            <input type=text name ="comments" rows="5" column="5"><br />
                        </div>
                 Gender:
                     <input type="radio" name="gender" value="female">Female
                     <input type="radio" name="gender" value="male">Male
                 <br />
                 <input type="submit">
        </form>
        </div>
    </div>
</div>
</body>
</html>





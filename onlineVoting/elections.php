<?php
 session_start();
 include("includes/loginheader.php");
 if(!$_SESSION['user_email']){
   header("location:login.php");
 }
 ?>
 <br>
 <div class="container">
    <div class="col-md-6 col-md-offset-2">
    <form method="post">
    <div class="form-group">
                <label for="User Id" style="color:black;"> Your generated ID</label>
                <input type="text" name="userid" id="exampleInputEmail" class="form-control" placeholder="Enter your ID">
             </div>
             <div class="form-group">
                <label for="Password" style="color:black;">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
             </div>
             <div class="form-group">
             <button type="submit" class="btn btn-success btn-block" name="login">Enter Voting Area</button>
             </div>
            </form>
            </br>
    </div>
 </div>
<?php
    require("includes/db.php");
        if(isset($_POST['login'])){
            $user_id=$_POST['userid'];
            $user_password=$_POST['password'];
            $select="select * from users_db where user_password='$user_password' and id_generated='$user_id'";
            $run=$conn->query($select);
            if($run->num_rows>0){
                while($row=$run->fetch_array()){
                    $_SESSION['userid']=$id_generated=$row['id_generated'];
                }
                echo "<script>alert('You may now proceed to vote!')</script>";
                echo "<script>window.location.href='vote.php'</script>";
                

            }
            else{
                echo "<script>alert('You have entered an Invalid ID/ Password')</script>";
                echo "<script>window.location.href='elections.php'</script>";
            }

        }

?>
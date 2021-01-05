<?php 
session_start();
include("includes/headera.php");
?>
<?php 
require("includes/db.php");
$error="";
$success="";
if(isset($_POST['logina'])){
   $admin_email=$_POST['emaila'];
   $admin_password=$_POST['passworda'];
  
   $select="select * from admin_db where admin_email = '$admin_email' and admin_password='$admin_password'";
   $run=$conn->query($select);
   if($run->num_rows>0){
      while($row=$run->fetch_array()){
         $_SESSION['admin_name']=$admin_name=$row['admin_name'];
         $_SESSION['admin_email']=$admin_email=$row['admin_email'];
         echo"<script>window.location.href='add_new_election.php'</script>";
         
      }
   }
   else{
      $error="Invalid Email or Password! Try again";
   }
 }
 ?>
<br>
<hr>
    <div class="container">
       <div class="row">
         <div class="col-sm-8 col-sm-offset-2 alert alert-success">
           <form method="post">
            <h4 class="text text-center alert bg-primary" style="color:white;">Admin Login</h4>
            <h5 class="text text-center text-danger"><?php
               if($error != ""){
                  echo $error;
               }
               if($success!=""){
                  echo $success;
               }
               ?></h5>
               <form method="post">
             <div class="form-group">
                <label for="Email" style="color:black;"> Email</label>
                <input type="email" name="emaila" id="exampleInputEmail" class="form-control" placeholder="Enter your email address">
             </div>
             <div class="form-group">
                <label for="Password" style="color:black;">Password</label>
                <input type="password" name="passworda" class="form-control" placeholder="Enter your password">
             </div>
             <div class="form-group">
             <button type="submit" class="btn btn-success btn-block" name="logina">Login</button>
             </div>
            </form>
            </br>
         </div>
       </div>
    </div>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-3.51.js"></script>  
</body>
</html>
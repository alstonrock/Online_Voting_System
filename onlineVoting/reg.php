<?php include("includes/header.php")?>
<?php include("includes/db.php");
if(isset($_POST['register'])){
   $user_name=$_POST['username'];
   $user_email=$_POST['email'];
   $user_gender=$_POST['gender'];
   $user_state=$_POST['state'];
   $user_district=$_POST['district']; 
   $user_city=$_POST['city'];
   $user_password=$_POST['password'];
   $insert="insert into users_db (user_name,user_email,user_gender,user_state,user_district,user_city,user_password) values ('$user_name','$user_email','$user_gender','$user_state','$user_district','$user_city','$user_password')";
   $run=mysqli_query($conn,$insert);
   if($run){
      echo "<script>alert('You have successfully registered.')</script>";
      echo "<script>window.location.href='login.php'</script>";
   }
   else{
      echo "<script>alert('Registration Unsuccessful. Please try again!')</script>";
      echo "<script>window.location.href='reg.php'</script>";
   }
 }
 ?>
<br>
<hr>
    <div class="container">
       <div class="row">
         <div class="col-sm-8 col-sm-offset-2 alert alert-success">
           <form method="post">
            <h4 class="text text-center alert bg-primary" style="color:white;">User Registration</h4>
             <div class="form-group">
                <label for="Username" style="color:black;">Full Name</label>
                <input type="text" id="exampleInputName" name="username" class="form-control" placeholder="Enter your full name">
             </div>
             <div class="form-group">
                <label for="Email" style="color:black;"> Email</label>
                <input type="email" name="email" id="exampleInputEmail" class="form-control" placeholder="Enter your email address">
             </div>
             <div class="form-group">
                <label for="Gender" style="color:black;">Gender</label>
                <select name="gender" class="form-control">
                  <option value="">Select</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="transgender">Transgender</option>
                </select>
             </div>
             <div class="form-group">
                <label for="State" style="color:black;">State</label>
                <select name="state" class="form-control">
                  <option value="">Select</option>
                  <option value="Karnataka">Karnataka</option>
                  <option value="Kerala">Kerala</option>
                  <option value="Tamilnadu">Tamilnadu</option>
                </select>
             </div>
             <div class="form-group">
                <label for="District" style="color:black;">District</label>
                <input type="text" name="district" class="form-control" placeholder="Enter your District">
             </div>
             <div class="form-group">
                <label for="City" style="color:black;">City</label>
                <input type="text" name="city" class="form-control" placeholder="Enter your City">
             </div>
             <div class="form-group">
                <label for="Password" style="color:black;">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
             </div>
             <div class="form-group">
             <button type="submit" class="btn btn-success btn-block" name="register">Submit</button>
             </div>
            </form>
            </br>
         </div>
       </div>
    </div>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-3.5.1.js"></script>  
</body>
</html>
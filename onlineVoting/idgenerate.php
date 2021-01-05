<?php
 session_start();
 include("includes/loginheader.php");
 if(!$_SESSION['user_email']){
   header("location:login.php");
 }
?>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
 <div class="container">
    <?php
            include("includes/db.php");
            $user_email=$_SESSION['user_email'];
            $select="select * from idreq_db where user_email='$user_email'";
              $run=$conn-> query($select);
              if($run->num_rows>0){
               ?>
               <div class="col-sm-6 col-sm-offset-3 bg-success alert">
                  <h4>You have already submitted your request</h4>
               </div>
               <?php
               }
               else{

                  ?>
            <?php
            $select="select * from users_db where user_email='$user_email'";
            $run=$conn->query($select);
            if($run->num_rows>0){
               while($row=$run->fetch_array()){
                  $user_name=$row['user_name'];
                  $user_email=$row['user_email'];
                  $user_state=$row['user_state'];
                  $id_generated=$row['id_generated'];
               }
            if($id_generated!=""){
               ?>
                  <div class="col-sm-6 col-sm-offset-3 bg-success alert">
                     <h4>Your ID is "<span class="text text-danger"><?php echo $id_generated;?></span>"</h4>
                     <p><b>Note:</b>Use this ID and the login password to cast your valuable vote!</p>
                  </div>

               <?php
            }
            else{
               ?>
      <div class="col-sm-6 col-sm-offset-2 bg-success alert">
         <form method="post">
           <div class="form-group">
                <label for="Username" style="color:black;"> User Name</label>
                <input type="text" name="username" id="exampleInputEmail" class="form-control" required value="<?php echo $user_name;?>" readonly>
            </div>
            <div class="form-group">
                <label for="Email" style="color:black;"> Email</label>
                <input type="email" name="email" id="exampleInputEmail" class="form-control" required value="<?php echo $user_email;?>" readonly>
             </div>
             <div class="form-group">
                <label for="State" style="color:black;">State</label>
                <input type="text" name="state" id="exampleInputEmail" class="form-control" required value="<?php echo $user_state;?>" readonly>
            </div>
             <div class="form-group">
             <button type="submit" class="btn btn-info btn-block" name="requestid">Request ID</button>
             </div>
         </form>
      </div>
   </div>    


<?php
            }
         }
    ?>
 

      <?php 
         if(isset($_POST['requestid'])){
               $user_name=$_POST['username'];
               $user_email=$_POST['email'];
               $user_state=$_POST['state'];
               require("includes/db.php");   
              $insert = "insert into idreq_db (user_name,user_email,user_state) values ('$user_name','$user_email','$user_state')";
              $run = $conn -> query($insert);
              if($run){
                     echo "<script>alert('You have successfully submitted your request!')</script>";
              }
               else{
                  echo "Error";
               }
                   
          
      }
   }
      ?>
  
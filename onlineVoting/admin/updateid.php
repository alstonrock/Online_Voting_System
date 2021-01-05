<?php
 session_start();
 include("includes/loginheadera.php");
 if(!$_SESSION['admin_email']){
   header("location:logina.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Update ID Request</title>
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="mystyle.css"/>
<link rel="stylesheet" href="css/fonts.css"/>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
</head>
<body>
    <div class="container">
        <div class="col-sm-6">
           <?php
                        $postfix="";
                        $prefix="";
                        $id_generated="";
                        $rand="";
                        $conn = mysqli_connect("localhost","root","","ovsys_db");
                        $id=$_GET['id'];
                        $select="select * from idreq_db  where id='$id'";
                        $run=$conn->query($select);
                        if($run->num_rows>0){
                              while($row=$run->fetch_array()){
                                    $user_name=$row['user_name'];
                                    $user_email=$row['user_email'];
                                    $user_state=$row['user_state'];
                               }
                               switch ($user_state) {
                                    case 'Karnataka':
                                            $prefix="ka";
                                            $rand=rand(9999999,1234567);
                                            $postfix="xyz";
                                            $id_generated=$prefix.$rand.$postfix;
                                            break;
                                    case 'Kerala':
                                            $prefix="kl";
                                            $rand=rand(9999999,1234567);
                                            $postfix="xyz";
                                            $id_generated=$prefix.$rand.$postfix;
                                            break;
                                    default:
                                            $prefix="ml";
                                            $rand=rand(9999999,1234567);
                                            $postfix="xyz";
                                            $id_generated=$prefix.$rand.$postfix;
                                            break;
                                }
            ?>
                                 <div class="col-md-8 col-md-offset-7"> 
                                  <form method="post">
                                      <div class="form-group">
                                          <label for="Username" style="color:black;"> User Name</label>
                                          <input type="text" name="username" id="exampleInputEmail" class="form-control" required value="<?php echo $user_name;?>" readonly>
                                      </div>
                                      <div class="form-group">
                                          <label for="Email" style="color:black;"> User Email</label>
                                          <input type="text" name="email" id="exampleInputEmail" class="form-control" required value="<?php echo $user_email;?>" readonly>
                                      </div>
                                      <div class="form-group">
                                          <label for="State" style="color:black;"> State</label>
                                          <input type="text" name="state" id="exampleInputEmail" class="form-control" required value="<?php echo $user_state;?>" readonly>
                                      </div>
                                      <div class="form-group">
                                          <label for="ID" style="color:black;"> ID Generated</label>
                                          <input type="text" name="userid" id="exampleInputEmail" class="form-control" required value="<?php echo strtoupper($id_generated);?>" readonly>
                                      </div>
                                      <div class="form-group">
                                        <button type="submit" class="btn btn-info btn-block" name="updateid">Update ID</button>
                                      </div>
                                  </form>
                        </div>
                        <?php     
                           }
                           else{
                               echo "Record not Found";
                           }
                          ?> 
            </div>
            <div class="col-sm-6">

            </div>
    </div>
</body>
</html>
<?php
        if(isset($_POST['updateid'])){
            $user_email=$_POST['email'];
            $id_generated=$_POST['userid'];
            $update="update users_db set id_generated='$id_generated' where user_email='$user_email'";
            $run=$conn->query($update);
            if($run){
                $delete="delete from idreq_db where user_email='$user_email'";
                $del=$conn->query($delete);
                echo "<script>alert('Update Successfully!')</script>";
                echo "<script>window.location.href='idreq.php'</script>";
            }
            else{
                 echo "<script>alert('Something went wrong! Please try again.')</script>";
            }
        }
?>
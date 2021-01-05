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
<title>Online Voting System</title>
<link rel="stylesheet" href="css/bootstrap.css"/>
</head>
<body>
    <div class="container">
        <div class="col-sm-6">
            <h2>All Requested Data</h2>
            <table class="table table-responsive table-hover">
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>State</th>
                    <th>Action</th>
                </tr>
                <?php
                        $conn = mysqli_connect("localhost","root","","ovsys_db");
                        $select="select * from idreq_db";
                        $run=$conn->query($select);
                        if($run->num_rows>0){
                                $total=0;
                                while($row=$run->fetch_array()){
                                $total+=1;
                                $id=$row['id'];
                                ?>
                                <tr>
                                    <td><?php echo $total;?></td>
                                    <td><?php echo $row['user_name'];?></td>
                                    <td><?php echo $row['user_email'];?></td>
                                    <td><?php echo $row['user_state'];?></td>
                                    <td><a href="updateid.php?id=<?php echo $id;?>">Update</a></td>
                                </tr>
                            <?php
                            }
                        }
                        else{
                            ?>
                            <tr>
                                <td colspan="5">No Records Found!</td>
                            </tr>
                            <?php
                        }
                ?>
            </table>
        </div>
        <div class="col-sm-6">

        </div>
    </div>    
</body>
</html>
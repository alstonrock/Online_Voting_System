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
    <link rel="stylesheet" href="mystyle.css"/>
    <link rel="stylesheet" href="css/fonts.css"/>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
<body>
    <div class="container">
        <div class="col-md-6 col-md-offset-2">
            <h3>Add Candidate</h3>
                <label>Select Election Name</label>
                 <form method="get" action="add_candidates_details.php">
                    <div class="form-group">
                    <select name="election_name" class="form-control">
                    <option value="" selected="selected">Select Election</option>
                    <?php
                        $conn = mysqli_connect("localhost","root","","ovsys_db");
                        $select="select * from elections_tbl";
                        $run=$conn->query($select);
                        if($run->num_rows>0){
                            while($row=$run->fetch_array()){
                            
                            
                            ?>
                            <option value="<?php echo $row['elections_name'];?>"><?php echo $row['elections_name'];?></option>
                            <?php
                            }
                        }
                    ?>
             </select>
               </div>
               <div class="form-group">
                <label>Number Of candidates</label>
                <input type="text" name="total_candidates" class="form-control" placeholder="Enter the number of candidates">
             </div>

               <input type="submit" name="add_elections" class="btn btn-success">
            </form>
        </div>
    </div>
</body>
</html>

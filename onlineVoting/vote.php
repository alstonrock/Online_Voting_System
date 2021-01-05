<?php
 session_start();
 include("includes/loginheader.php");
 if(!$_SESSION['userid']){
   header("location:elections.php");
 }
 ?>
 <br>
 <div class="container">
    <div class="col-md-6 col-md-offset-3">
        <form method="post" action="">
            <label>Elections Name:</label>
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
            <br>
            <input type="submit" name="search_candidate" class="btn btn-success" value="Search Candidate">
        </form>
    </div>    
 </div>
<?php
        date_default_timezone_set("Asia/Kolkata");
        if(isset($_POST['search_candidate'])){
            $election_name=$_POST['election_name'];
            $select="select * from elections_tbl where elections_name='$election_name'";
            $run=$conn->query($select);
            if($run->num_rows>0){
                while($row=$run->fetch_array()){
                  $election_start_date=$row['elections_start_date'];
                  $election_end_date=$row['elections_end_date'];
                }
            }
            $current_ts=time();
            $election_start_date_ts=strtotime($election_start_date);
            $election_end_date_ts=strtotime($election_end_date);
            if($election_start_date_ts>$current_ts){
                echo "<script>alert('Elections have not started yet')</script>";
                echo "<script>window.location.href='vote.php'</script>";;
            }
            else if($current_ts>$election_end_date_ts){
                echo "<script>alert('Elections has been closed!')</script>";
                echo "<script>window.location.href='vote.php'</script>";
            }
            else{
                ?>
                <br>
                <div class="col-md-6 col-md-offset-3">
                    <a href="votecast.php?election_name=<?php echo str_replace(' ','-',$election_name);?>" class="btn btn-info" role="button">Click here!</a>
                </div>
                    
                
                <?php
            }
        }
?>
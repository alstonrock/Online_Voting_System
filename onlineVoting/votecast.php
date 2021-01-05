<?php
 session_start();
 include("includes/loginheader.php");
 if(!$_SESSION['userid']){
   header("location:elections.php");
 exit();
 }
 ?>
 <br>
 <div class="container">
    <div class="col-md-6 col-md-offset-3">
        <form method="post" action="">
        <?php 
            $conn = mysqli_connect("localhost","root","","ovsys_db");
            $election_name=$_GET['election_name'];
            $election_name=str_replace('-',' ',$election_name);
        ?>

        <div class="form-group">
            <input type='text' value="<?php echo $election_name;?>" class='form-control' readonly/>
        </div>
            <?php 
                $select="select * from candidates_tbl where elections_name='$election_name'";
                $run=$conn->query($select);
                if($run->num_rows>0){
                    while($row=$run->fetch_array()){
                        ?>
                        <div class="form-group">
                            <input type='radio' name='candidates_name' class='list-group' value="<?php echo $row['candidates_name'];?>">
                            <label><?php echo $row['candidates_name'];?></label>
                        </div>
                        <?php
                    }
                }
                ?>
                <input type="submit" name="vote_caste" class='btn btn-success' value="Vote Now!">
        </form>
    </div>    
 </div>
<?php
$conn = mysqli_connect("localhost","root","","ovsys_db");
if(isset($_POST['vote_caste'])){
     $candidates_name=$_POST['candidates_name'];
     $user_email=$_SESSION['user_email'];
     $select="select * from results_tbl where user_email='$user_email' and elections_name='$election_name'";
     $exe1=$conn->query($select);
     if($exe1->num_rows>0){
         echo "<script>alert('You have already casted your vote for the ".$election_name." elections')</script>";
                echo "<script>window.location.href='vote.php'</script>";
     }
     else{
        $insert="insert into results_tbl (user_email,candidates_name,elections_name) values ('$user_email','$candidates_name','$election_name')";
        $run=$conn->query($insert);
        echo "$election_name";
        if($run){
            $update="update candidates_tbl set total_votes=`total_votes`+ '1' where candidates_name='$candidates_name' and elections_name='$election_name'";
            $exe=$conn->query($update);
            if($exe){
                echo "<script>alert('You have successfully casted your vote.')</script>";
                echo "<script>window.location.href='vote.php'</script>";
            }
            else{
                echo "<script>alert('You couldn't cast ypur vote')</script>";
                echo "<script>window.location.href='vote.php'</script>";
            }
        }
     
    else{
        echo "ERROR";
    }
 }
}
?>

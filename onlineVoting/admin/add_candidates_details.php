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
    <title>Online Voting System-Admins</title>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="mystyle.css"/>
    <link rel="stylesheet" href="css/fonts.css"/>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
<body>
    <div class="container">
        <div class="col-md-6 col-md-offset-2">
            <h3>Add Candidate</h3>
                 <form method="post">
                    <?php
                    $conn = mysqli_connect("localhost","root","","ovsys_db");
                        $elections_name=$_GET['election_name'];
                        $total_candidates=$_GET['total_candidates'];
                        ?>
                        <label>Election Name</label>
                        <input type="text" name="election_name" value="<?php echo $elections_name;?>" class="form-control" readonly="readonly">

                        <?php
                         for($i=1; $i<=$total_candidates; $i++) {
                            ?>
                            <div class="form-group">
                                <label>Candidates Name<?php echo $i;?></label>
                                <input type="text" name="candidates_name<?php echo $i;?>" class="form-control">
                            </div>
                        <?php
                        }
                    ?>
                    <input type="submit" name="add_detail_candidates" class="btn btn-success">
                </form>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['add_detail_candidates'])){
    $total_candidates=$_GET['total_candidates'];
    $elections_name=$_POST['election_name'];
    
    for($i=1;$i<=$total_candidates;$i++){
            $candidates_name[]=$_POST['candidates_name'.$i];
    }
    for($i=0;$i<$total_candidates;$i++){
        $insert="insert into candidates_tbl (candidates_name,elections_name) values ('$candidates_name[$i]','$elections_name')";
        $run=$conn->query($insert);
    }
    if($run){
        echo "<script>alert('You have successfully added the candidates')</script>";
                echo "<script>window.location.href='add_new_candidate.php'</script>";
    }
    else{
        echo "<script>alert('You have not successfully added the candidates')</script>";
                echo "<script>window.location.href='add_new_candidate.php'</script>";
    }

}
    

?>
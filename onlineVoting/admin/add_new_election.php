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
        <div class="col-md-6 col-md-offset-3">
            <h3>Add New Election</h3>
            <form method="post">
                <div class="form-group">
                    <label for="election" style="color:black;"> Election Name </label>
                    <input type="text" name="election_name"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="election" style="color:black;"> Election Start Date </label>
                    <input type="date" name="election_start_date"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="election" style="color:black;"> Election End Date </label>
                    <input type="date" name="election_end_date"  class="form-control">
                </div>
                <div class="col-md-6 col-md-offset-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="electionsub">Add Election</button>
                    </div>
               </div>
        </div>
    </div>
</body>
</html>
<?php
    $conn = mysqli_connect("localhost","root","","ovsys_db");
        if(isset($_POST['electionsub'])){
                $election_name=$_POST['election_name'];
                $election_start_date=$_POST['election_start_date'];
                $election_end_date=$_POST['election_end_date'];
                $insert="insert into elections_tbl (elections_name,elections_start_date,elections_end_date) values ('$election_name','$election_start_date','$election_end_date')";
                $run=$conn->query($insert);
                if($run){
                    echo "<script>alert('You have successfully added an election!')</script>";
                    echo "<script>window.location.href='add_new_election.php'</script>";
                }
                else{
                    echo "<script>alert('You couldn't add an election. Please try again!')</script>";
                    echo "<script>window.location.href='add_new_election.php'</script>";
                }
        }
?>
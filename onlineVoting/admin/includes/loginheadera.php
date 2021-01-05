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
     <nav class="nav navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="admin1.jpg" class="navbar-brand">Online Voting System-Admins</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="">Home</a></li>
                <li><a href="idreq.php">Update ID</a></li>
                <li><a href="add_new_election.php">Add Elections</a></li>
                <li><a href="add_new_candidate.php">Add Candidates</a></li>
                <li><a href="logouta.php">Logout</a></li>
                <li><a href=""><?php echo strtoupper($_SESSION['admin_name']);?></a></li>
            </ul>
        </div>
     </nav>
    </div>
    <div class="container">
       <div class="row">
        <div class="col-sm-8 col-sm-offset-2 img-thumbnail img-responsive" style="background-color:gray;">
            <img src="admin2.jpg" class="img img-thumbnail img-responsive">
       </div> 
    </div>
</body>
</head>
</html>

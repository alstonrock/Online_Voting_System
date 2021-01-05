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
     <nav class="nav navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="" class="navbar-brand">Online Voting System</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="welcome.php">Home</a></li>
                <li><a href="idgenerate.php">ID Generate</a></li>
                <li><a href="elections.php">Election</a></li>
                <li><a href="results.php">Results</a></li>
                <li><a href="vote.php">Vote</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href=""><?php echo strtoupper($_SESSION['user_name']);?></a></li>
            </ul>
        </div>
     </nav>
    </div>
    <div class="container">
       <div class="row">
        <div class="col-sm-7 col-sm-offset-2 img-thumbnail img-responsive" style="background-color:gray;">
            <img src="user1.jpg" class="img img-thumbnail img-responsive">
       </div> 
    </div>
</body>
</head>
</html>

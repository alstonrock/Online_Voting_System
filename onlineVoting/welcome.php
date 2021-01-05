<?php
 session_start();
 include("includes/loginheader.php");
 if(!$_SESSION['user_email']){
   header("location:login.php");
 }
 ?>

<scipt type="text/javascript" src="js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
 <div class="container">
    <div class="row">
      <div class ="col-sm-6">
      <br>
        <h4 class="text text-center text-info alert bg-primary">How to Cast Your Vote<b><i>?</i></b></h4>
        <ul>
        <li>
        First select the <b>"ID Generate"</b> from the navigation bar</li>
        <li>
        Then send a request to the <b>"Admin"</b> to Generate Your ID to vote
        </li>
        <li>
         Once you receive your ID from the Admin click on the <b>"Election"</b> menu from the navigation bar
        </li>
        <li>
        Select the available Elections you would like to vote for
        </li>
        <li>
        The secrecy of your ballot is maintained under the high security standards adhered to by Polyas' online voting software
        </li>
        <li>
        Your vote remains anonymous as our system's architecture strictly separates your personal data from the electronic ballot
        </li>
        </ul>
        </div>
        <br>
        <div class="col-sm-6 ">
            <img src="user2.jpg" class="img img-responsive img-thumbnail">
        </div>
     </div>
  </div>
        </body>
        </html>
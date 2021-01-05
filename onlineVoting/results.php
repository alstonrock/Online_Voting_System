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
    <h3 class="text text-info text-center">Results</h3>
    <p class="text text-danger">This sections displays the timed out elections</p>
        <form method="post" action="">
            <div class="form-group">
                <select class="form-control" name="election_name">
                <option selected="selected" value="">Select Election</option>
                <?php
                $current_ts=time();
                $conn = mysqli_connect("localhost","root","","ovsys_db");
                $select="select * from elections_tbl";
                $run=$conn->query($select);
                if($run->num_rows>0){
                    while($row=$run->fetch_array()){
                        $election_name=$row['elections_name'];
                        $election_start_date=$row['elections_start_date'];
                        $election_end_date=$row['elections_end_date'];
                        ?>
                        <?php
                            $election_end_date_ts=strtotime($election_end_date);
                            echo "$election_end_date_ts";
                            if($election_end_date_ts<$current_ts){
                                ?>
                                <option value="<?php echo $election_name;?>"><?php echo $election_name;?></option>
                                <?php
                            }

                    }
                }
                    ?>
             </select>
            </div>
            <div class="form-group">
                <input type="submit" name="search_results" class="btn btn-success" value="Search Results">
            </div>
        </form>
            <table class="table table-responsive table-hover table-bordered text-center">
                <tr>
                    <td>#</td>
                    <td>Candidate Name</td>
                    <td>Obtain Votes</td>
                    <td>Winning Status</td>
                </tr>
                <?php
            if(isset($_POST['search_results'])){
                $election_name=$_POST['election_name'];
                $select="select * from results_tbl where elections_name='$election_name'";
                $run=$conn->query($select);
                if($run->num_rows>0){
                    $total_election_votes=0;
                    while($row=$run->fetch_array()){
                        $total_election_votes=$total_election_votes+1;
                    }
                }
                $select1="select * from candidates_tbl where elections_name='$election_name'";
                $run1=$conn->query($select1);
                if($run1->num_rows>0){
                    $total=0;
                    while($row2=$run1->fetch_array()){
                        $total=$total+1;
                        $candidates_name=$row2['candidates_name'];
                        $total_votes=$row2['total_votes'];
                        $percentage=(($total_votes/$total_election_votes)*100);
                        ?>
                        <tr>
                            <td></td>
                            <td><?php echo $candidates_name;?></td>
                            <td><?php echo $total_votes;?></td>
                            <td>
                            <?php 
                                    if($percentage>50){
                                        ?>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" 
                                            aria-valuenow="<?php echo $percentage;?>" aria-valuemin="0" aria-valuemax="<?php echo $percentage;?>" 
                                            style="width: <?php echo $percentage;?>%">
                                            <?php echo $percentage;?>%
                                            </div>
                                        </div>
                                        <?php
                                    }                
                                    else if($percentage>40){
                                        ?>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info" role="progressbar" 
                                            aria-valuenow="<?php echo $percentage;?>" aria-valuemin="0" aria-valuemax="<?php echo $percentage;?>" 
                                            style="width: <?php echo $percentage;?>%">
                                            <?php echo $percentage;?>%
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" 
                                            aria-valuenow="<?php echo $percentage;?>" aria-valuemin="0" aria-valuemax="<?php echo $percentage;?>" 
                                            style="width: <?php echo $percentage;?>%">
                                            <?php echo $percentage;?>%
                                            </div>
                                        </div>
                                        <?php
                                    }
                            ?>
                                </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td  colspan="2">Total Votes</td>
                        <td><?php echo $total_election_votes;?></td>
                        </tr>
                        <?php
                }
                else{
                    ?>
                    <tr>
                        <td colspan="4">Record Not Found</td>
                    </tr>
                    <?php
                }
            }
        ?>
        </table>  
        </div>
    </div>    
 </div>

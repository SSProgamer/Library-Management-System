<?php
    require 'connection.php';
    // if($_POST['submit']){
    //     mysqli_begin_transaction($con);
    //     try{
    //         mysqli_commit($con);
    //     }catch (mysqli_sql_exception $exception) {
    //         mysqli_rollback($con);
    //         echo 'bruh';
    //         throw $exception;
    //     }
    // }
    $sql = "SELECT * FROM blacklist";
    $result = mysqli_query($con,$sql);

?>
<div class="container-fluid side-bar">
    <div class="row side-bar">
    <?php
    include('navbar.php');
  ?>
    
    <div class="col bg-light bg-opacity-75">
    <?php while($row = mysqli_fetch_array($result)){?>
        <p><?php echo $row['Member_ID']; ?> 
        <?php echo $row['Cause_Blacklist']; ?>
        <?php echo $row['Start_date'];?> 
        <?php echo $row['End_Date'];?>
        </p>
        <?php
    }?>
    </div>
    </div>
</div>
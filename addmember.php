<?php
    require 'connection.php';
    if(isset($_POST['submit'])){
        //varible
        $name = $_POST['name'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $phone = $_POST['tel'];
        $gender = $_POST['gender'];
        //check เคยสมัครหรือยัง
        $find = "SELECT * FROM `member` WHERE Name = '$name' || Email = '$email'";
        $finding = mysqli_query($con,$find);
        $found = mysqli_num_rows($finding);
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        //if not exist
        if(!$found){
            mysqli_begin_transaction($con);
        try{
            $add = "INSERT INTO `member` (`Name`, `Gender`, `Tel` ,`Email`, `Birth_Date`)
            VALUES ('$name', '$gender', '$phone', '$email', '$dob')";
            mysqli_query($con,$add);
            mysqli_commit($con);
            echo 'Add success';
        }catch (mysqli_sql_exception $exception) {
            mysqli_rollback($con);
    echo $add;
    echo $exception;
    // throw $exception;
        }
        }
        else{
            echo 'เคยมีแล้ว';
        }
        
    }
?>
<html>

<head>
    <link rel="stylesheet" href="main_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
</head>

<body>
<div class="container-fluid side-bar">
    <div class="row side-bar">
    <?php
    include('navbar.php');
  ?>
            <!-- this column shown content or information -->
            <div class="col-9">
            <a href="index.php">กลับไปหน้าหลัก</a>
                <div class="container side-bar bg-light bg-opacity-75">
                    <h2 class="p-3">เพิ่มสมาชิก</h2>
                    <form class="p-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
                            <div class="col">
                                <div class="form-group pb-3">
                                    <label>ชื่อ</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group pb-3">
                                    <label>เพศ</label>
                                    <input type="text" class="form-control" name="gender">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group pb-3">
                                    <label>เบอร์โทร</label>
                                    <input type="text" class="form-control" name="tel">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group pb-3">
                                    <label>อีเมล</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group pb-3">
                                    <label>วันเกิด</label>
                                    <input type="date" class="form-control" name="dob">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3" name="submit">ยืนยันการจอง</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
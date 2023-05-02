<?php
    require 'connection.php';
    if(isset($_POST['submit'])){
    $member = $_POST['memberid'];
    $book = $_POST['bookid'];
    $bookname = $_POST['bookname'];
    $admin = $_SESSION['admin'];
    if ($book = '') {
        $find = "SELECT Book_ID FROM book_list WHERE Book_Name = $bookname";
        $found = mysqli_query($con, $find);
        if ($found) {
            $row = mysqli_fetch_row($found);
            $book = $row[0];
        } else {
            $book = null;
            echo 'ไม่พบหนังสือ';
        }
    }
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    mysqli_begin_transaction($con);
        try{
            $sql = "INSERT INTO appointment (Member_ID, Book_ID, B_Date, App_Date, Lib_ID)
            VALUES ($member, $book, 'กำลังยืม', $start, $end, $admin)";
            mysqli_query($con, $sql);
            mysqli_commit($con);
            echo 'success';
        }catch (mysqli_sql_exception $exception) {
            mysqli_rollback($con);
            echo 'bruh';
            throw $exception;
        }
    }
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title>ยืมหนังสือ</title>
</head>

<body>
<div class="container-fluid side-bar">
    <div class="row side-bar">
    <?php
    include('navbar.php');
  ?>
            <div class="col">
            <a href="index.php">กลับไปหน้าหลัก</a>
                <div class="container side-bar bg-light bg-opacity-75">
                    <h2 class="p-3">จองหนังสือ</h2>
                    <form class="p-3">
                        <div class="row">
                            <div class="col">
                                <div class="form-group pb-3">
                                    <label>รหัสหนังสือ</label>
                                    <input type="text" class="form-control" name="bookid">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group pb-3">
                                    <label>ชื่อหนังสือ</label>
                                    <input type="text" class="form-control" name="bookname">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group pb-3">
                                    <label>วันที่จอง</label>
                                    <input type="date" class="form-control" name="startdate">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group pb-3">
                                    <label>วันที่ยืม</label>
                                    <input type="date" class="form-control" name="enddate">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group pb-3">
                                    <label>รหัสสมาชิก</label>
                                    <input type="text" class="form-control" name="memberid">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group pb-3">
                                    <label>ชื่อสมาชิก</label>
                                    <input type="text" class="form-control" name="membername">
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
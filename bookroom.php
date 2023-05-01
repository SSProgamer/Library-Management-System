<?php
include('connection.php');
// $sql1 = "SELECT * FROM member";
// $L_member = mysqli_query($con,$sql1);

// $sql2 = "SELECT * FROM room";
// $room = mysqli_query($con, $sql2);

if(isset($_POST['submit'])){
  $member = $_POST['memberid'];
  $room_id = $_POST['roomid'];
  $date = $_POST['startdate'];
  $start = $_POST['starttime'];
  $end = $_POST['endtime'];
  $cause = $_POST['cause'];
  $r_name = $_POST['roomname'];

  //check ว่า ในห้องนั้นมีคนจองในช่วงเวลาที่กรอกฟอร์มหรือยัง
  $sql = "SELECT * FROM room_booking WHERE Room_ID = $room_id)";
  $check = mysqli_query($con, $sql);

  if($check){
    mysqli_begin_transaction($con);
    //insert values (ยังไมไ่ด้check ว่ามีคนจองในระหว่างนั้นหรือเปล่า)
  try{
    //หาเลขห้องจากชื่อห้อง
    // $getroom = "SELECT Room_ID FROM room WHERE Room_Name like '%$r_name%'";

    //begin transaction
    
    
    
    $sql = "INSERT INTO room_booking (Member_ID, Room_ID, RB_Date, Start_time, End_Time, Clause_Booking, Lib_ID)
  values ($member, $room_id, $date, $start, $end, $cause, 100)";
    mysqli_query($con,$sql);
    mysqli_commit($con);
    echo 'good';
  }catch (mysqli_sql_exception $exception) {
    mysqli_rollback($mysqli);
    echo 'bruh';
    throw $exception;
}
  }
  else{
    echo '<script>alert("มีคนจองแล้ว")</script>';
  }

}


?>
<html>

<head>
  <link rel="stylesheet" href="main_style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>BookingRoom</title>
</head>

<body>
<div class="container-fluid side-bar">
    <div class="row side-bar">
    <?php
    include('navbar.php');
  ?>
      <div class="col-9 bg-light bg-opacity-75">
      <a href="index.php">กลับไปหน้าหลัก</a>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>จองห้อง</h2>
        <div class="row">
          <div class="col-6">
            <p>รหัสห้อง</p>
            <input class="w-100" type="text" name="roomid">
          </div>
          <div class="col-6">
            <p>ชื่อห้อง</p>
            <input class="w-100" type="text" name="roomname">
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <p>วันที่จอง</p>
            <input type="date" name="startdate">
          </div>
          <div class="col-6">
            <p>เหตุผล</p>
            <input class="w-100" type="text" name="cause">
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <p>เวลาเริ่ม</p>
            <input type="time" name="starttime">
          </div>
          <div class="col-6">
            <p>เวลาจบ</p>
            <input type="time" name="endtime">
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <p>รหัสมาชิก</p>
            <input class="w-100" type="text" name="memberid">
          </div>
          <div class="col-6">
            <p>ชื่อสมาชิก</p>
            <input class="w-100" type="text" name="membername">
          </div>
        </div>
        <div class="row p-4">
          <input type="submit" class="btn btn-primary" value="ยืนยันการจองห้อง" name="submit">
        </div>
      </form>
      </div>
    </div>
  </div>

</body>

</html>
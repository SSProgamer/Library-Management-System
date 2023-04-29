<?php
include('connection.php')
if(submit){
  $query = "SELECT * FROM room_booking" or die(mysqli_error());
$result = mysqli_query($con,$query);
}


?>
<html>

<head>
  <link rel="stylesheet" href="main_style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>BookingRoom</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-3 bg-light">
        <ul class="nav flex-column">
          <l1><a href="index.html">กลับสู่หน้าหลัก</a></l1>
          <l1><a href="borrowbook.html">ยืมหนังสือ</a></l1>
          <l1><a href="bookbook.html">จองหนังสือ</a></l1>
          <l1><a href="bookroom.html">จองห้อง</a></l1>
          <l1><a href="room.html">โปรแกรมจองห้อง</a></l1>
          <l1><a href="addmember.html">เพิ่มสมาชิก</a></l1>
          <l1><a href="member.php">รายชื่อสมาชิก</a></l1>
          <l1><a href="addBlacklist.php">เพิ่มสมาชิกเข้า Blacklist</a></l1>
          <l1><a href="blacklist.html">รายชื่อ Blacklist</a></l1>
        </ul>
      </div>
      <div class="col-9">
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
          <button type="button" class="btn btn-primary">ยืนยันการจองห้อง</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
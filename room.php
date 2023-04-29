<?php
include('connection.php')
$query = "SELECT * FROM room" or die(mysqli_error());
$result = mysqli_query($con,$query);

?>

<html>

<head>
  <link rel="stylesheet" href="main_style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>หน้า หน้า หน้า หน้า หน้า หน้า หน้า สักหน้านั้นแหละ</title>
</head>

<body>
  <!-- <h1>หิวตีนวัยรุ่นเมื่อไหร่จะโดนสักที</h1> -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-3 mt-5 bg-white">
        <a href="index.html">กลับสู่หน้าหลัก</a>
        <ul class="nav flex-column">
          <l1><a href="index.html">กลับสู่หน้าหลัก</a></l1>
          <l1><a href="borrowbook.html">ยืมหนังสือ</a></l1>
          <l1><a href="bookbook.html">จองหนังสือ</a></l1>
          <l1><a href="bookroom.html">จองห้อง</a></l1>
          <l1><a href="room.html">โปรแกรมจองห้อง</a></l1>
          <l1><a href="addmember.html">เพิ่มสมาชิก</a></l1>
          <l1><a href="member.php">รายชื่อสมาชิก</a></l1>
          <l1><a href="addBlacklist.html">เพิ่มสมาชิกเข้า Blacklist</a></l1>
          <l1><a href="blacklist.html">รายชื่อ Blacklist</a></l1>
        </ul>
      </div>

      <!-- this column shown content or information -->
      <div class="col">
        <h2>สถานะการจองห้องประชุม</h2>
        <!-- ฟอร์มเลือกวัน และเวลาที่จะจอง-->
        <form>

          <div>
            วันที่
            <input type="date" name="day">
            ตั้งแต่
            <input type="time" name="startdate">
            ถึง
            <input type="time" name="enddate">
          </div>
          <!-- <div><input type="text" name=""></div>

          <div><input type="checkbox" name="include_bl">เอาเด็กดื้อป่าว</div>
          <input type="submit" name="submit" value="ตีนยัน 300%"> -->
        </form>

        <!-- show room has booked in this day? -->
        <!-- ถ้าเวลาดังกล่าวมีคนจองแล้วจะขึ้นสีแดง ถ้าไม่จะขึ้นเขียว -->
        <div class="container-fluid">
          <div class="row">
            <!-- card here -->
            <?php
            while($row = mysqli_fetch_array($result)){
              echo <div class="col-3 m-2">
              echo <div class="card bg-primary">
              echo  <div class="card-body">
              echo    <p>.$row['Room_ID'].</p>
              echo  </div>
              echo </div>
              echo </div>
            }
            ?>
            
            <div class="col-3 m-2">
              <div class="card bg-primary">
                <div class="card-body">
                  <p>1</p>
                </div>
              </div>
            </div>
            <div class="col-3 m-2">
              <div class="card bg-primary">
                <div class="card-body">
                  <p>1</p>
                </div>
              </div>
            </div>
            <div class="col-3 m-2">
              <div class="card bg-primary">
                <div class="card-body">
                  <p>1</p>
                </div>
              </div>
            </div>
            <div class="col-3 m-2">
              <div class="card bg-primary">
                <div class="card-body">
                  <p>1</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<?php
include('connection.php');
$query = "SELECT * FROM room";
$result = mysqli_query($con,$query);

if($_POST['submit']){
  $start = $_POST['start'];
  $end = $_POST['end'];
  $day = $_POST['day'];
  // echo $day;
  // echo "clicked";
  $query = "SELECT * FROM room_booking WHERE RB_Date = $day && Start_Time between $start and $end";
  $result = mysqli_query($con, $query);

}
?>

<html>

<head>
  <link rel="stylesheet" href="main_style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>หน้า หน้า หน้า หน้า หน้า หน้า หน้า สักหน้านั้นแหละ</title>
</head>

<body>
  <!-- <h1>หิวตีนวัยรุ่นเมื่อไหร่จะโดนสักที</h1> -->
  <div class="container-fluid side-bar">
    <div class="row side-bar">
    <?php
    include('navbar.php');
  ?>

      <!-- this column shown content or information -->
      <div class="col bg-light bg-opacity-75">
      <a href="index.php">กลับไปหน้าหลัก</a>
        <h2>สถานะการจองห้องประชุม</h2>
        <!-- ฟอร์มเลือกวัน และเวลาที่จะจอง-->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

          <div>
            วันที่
            <input type="date" name="day">
            ตั้งแต่
            <input type="time" name="start">
            ถึง
            <input type="time" name="end">
            <input type="submit" name="submit" value="ตรวจสอบ">
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
              echo '<div class="col-3 m-2">' ;
              echo '<div class="card bg-primary">';
              echo  '<div class="card-body">';
              echo    '<p>'.$row['Room_ID'].'</p>';
              echo  '</div>';
              echo '</div>';
              echo '</div>';
            }
            ?>
            <!-- <div class="col-3 m-2">
              <div class="card bg-primary">
                <div class="card-body">
                  <p>1</p>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
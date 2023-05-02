<?php 
    require 'connection.php';
    session_start();
    if(isset($_POST['logout'])){
        unset($_SESSION['admin']);
        unset($_SESSION['name']);
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
  <title>Library Management System</title>
</head>

<body>
  <!-- <div class="container-fluid side-bar"> -->
    <!-- <div class="row side-bar"> -->
      <div class="col-3 bg-light">
        <h1>Library</h1>
        <h1>Management</h1>
        <h1>System</h1>
        <ul class="nav flex-column">
          
            <?php if(!isset($_SESSION['admin'])){
                ?>
          <l1 class="p-2 border-top side-menu"><a class="side-menu-link" href="login.php">
              <h4 class="side-menu-text">Login</h4>
            </a></l1>
            <?php } else {?>
              <l1 class="p-2 border-top border-bottom side-menu"><a class="side-menu-link" href="borrowbook.php">
              <h4 class="side-menu-text">ยืมหนังสือ</h4>
            </a></l1>
          <l1 class="p-2 border-top border-bottom side-menu"><a class="side-menu-link" href="bookbook.php">
              <h4 class="side-menu-text">จองหนังสือ</h4>
            </a></l1>
          <l1 class="p-2 border-top border-bottom side-menu"><a class="side-menu-link" href="bookroom.php">
              <h4 class="side-menu-text">จองห้อง</h4>
            </a> </l1>
          <l1 class="p-2 border-top border-bottom side-menu"><a class="side-menu-link" href="room.php">
              <h4 class="side-menu-text">โปรแกรมจองห้อง</h3>
            </a> </l1>
          <l1 class="p-2 border-top border-bottom side-menu"><a class="side-menu-link" href="addmember.php">
              <h4 class="side-menu-text">เพิ่มสมาชิก</h4>
            </a></l1>
          <l1 class="p-2 border-top border-bottom side-menu"><a class="side-menu-link" href="member.php">
              <h4 class="side-menu-text">รายชื่อสมาชิก</h4>
            </a></l1>
          <l1 class="p-2 border-top border-bottom side-menu"><a class="side-menu-link" href="addBlacklist.php">
              <h4 class="side-menu-text">เพิ่มสมาชิกเข้า Blacklist</h4>
            </a></l1>
          <l1 class="p-2 border-top border-bottom side-menu"><a class="side-menu-link" href="blacklist.php">
              <h4 class="side-menu-text">รายชื่อ Blacklist</h4>
            </a></l1>
            <l1 class="p-2 border-top side-menu">
              <h4 class="side-menu-text">ยินดีต้อนรับคุณ <?php echo $_SESSION['name'];?></h4>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="submit" value="Logout" name="logout">
              </form>
            </l1>
            <?php } ?>
        </ul>
      </div>
    <!-- </div> -->
  <!-- </div> -->
</body>

</html>
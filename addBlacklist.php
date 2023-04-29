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
    <title>เพิ่มสมาชิกเข้า Blacklist</title>
</head>

<body>
  <script src="test.js"></script>
    <div class="container-fluid side-bar">
        <div class="row side-bar">
            <div class="col-3 bg-light">
                <h1>Library</h1>
                <h1>Management</h1>
                <h1>System</h1>
                <ul class="nav flex-column">
                  <l1 class="p-2 border-top border-bottom side-menu"><a class="side-menu-link" href="index.html">
              <h4 class="side-menu-text">กลับสู่หน้าหลัก</h4>
            </a></l1>
                    <l1 class="p-2 border-top border-bottom side-menu"><a class="side-menu-link" href="borrowbook.html">
                            <h4 class="side-menu-text">ยืมหนังสือ</h4>
                        </a></l1>
                    <l1 class="p-2 border-top border-bottom side-menu"><a class="side-menu-link" href="bookbook.html">
                            <h4 class="side-menu-text">จองหนังสือ</h4>
                        </a></l1>
                    <l1 class="p-2 border-top border-bottom side-menu"><a class="side-menu-link" href="bookroom.html">
                            <h4 class="side-menu-text">จองห้อง</h4>
                        </a> </l1>
                    <l1 class="p-2 border-top border-bottom side-menu"><a class="side-menu-link" href="room.html">
                            <h4 class="side-menu-text">โปรแกรมจองห้อง</h3>
                        </a> </l1>
                    <l1 class="p-2 border-top border-bottom side-menu"><a class="side-menu-link" href="addmember.html">
                            <h4 class="side-menu-text">เพิ่มสมาชิก</h4>
                        </a></l1>
                    <l1 class="p-2 border-top border-bottom side-menu"><a class="side-menu-link" href="member.php">
                            <h4 class="side-menu-text">รายชื่อสมาชิก</h4>
                        </a></l1>
                    <l1 class="p-2 border-top border-bottom side-menu"><a class="side-menu-link"
                            href="addBlacklist.php">
                            <h4 class="side-menu-text">เพิ่มสมาชิกเข้า Blacklist</h4>
                        </a></l1>
                    <l1 class="p-2 border-top border-bottom side-menu"><a class="side-menu-link" href="blacklist.html">
                            <h4 class="side-menu-text">รายชื่อ Blacklist</h4>
                        </a></l1>
                    <l1 class="p-2 border-top side-menu"><a class="side-menu-link" href="login.html">
                            <h4 class="side-menu-text">Login</h4>
                        </a></l1>
                </ul>
            </div>
            <div class="col">
                <div class="container bg-light bg-opacity-75 side-bar">
                    <h2 class="p-3">เพิ่มรายชื่อ Blacklist</h2>
                    <div class="row">
                        <div class="col-6">
                            <div class="m-4">
                                <p>รหัสสมาชิก</p>
                                <input class="w-100 form-control" type="text" name="memberid">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="m-4">
                                <p>ชื่อสมาชิก</p>
                                <input class="w-100 form-control" type="text" name="membername">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="p-4">
                                <p>สาเหตุ</p>
                                <textarea name="blacklistCause" rows="6" class="form-control"></textarea>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="m-4">
                                <p>วันที่เริ่มบทลงโทษ</p>
                                <input class="w-100 form-control" type="text" name="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="m-4">
                                <p>จำนวนมันที่ถูกลงโทษ</p>
                                <input class="w-100 form-control" type="text" name="">
                            </div>
                        </div>
                    </div>
                    <div class="row p-4">
                        <button name="submit" type="button" class="p-4 btn btn-primary">ยืนยันการเพิ่มรายชื่อ Blacklist</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
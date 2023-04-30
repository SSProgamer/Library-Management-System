<?php 
    include('connection.php');
    $sql = "SELECT * FROM `member`";
    $result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมาชิก</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <div class="container">
        <h1>รายชื่อสมาชิก</h1>
        <table>
            <thead>
                <tr>
                    <td width="10%">รหัส</td>
                    <td width="10%">ชื่อ</td>
                    <td width="10%">เพศ</td>
                    <td width="10%">เบอร์โทรศัพท์</td>
                    <td width="10%">อีเมล</td>
                    <td width="10%">วัน/เดือน/ปี เกิด</td>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($result)){ ?>
                    <tr>
                        <td><?php echo $row['Member_ID']; ?></td>
                        <td><?php echo $row['Name'];?></td>
                        <td><?php echo $row['Gender']; ?></td>
                        <td><?php echo $row['Tel']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                      <td><?php echo $row['Birth_Date']; ?></td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>

    </div>
</body>
</html>

<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//2. query ข้อมูลจากตาราง Member: 
$query = "SELECT * FROM Member" or die("Error:" . mysqli_error()); 
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($con, $query); 
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 

echo "<table border='1' align='center' width='500'>";
//หัวข้อตาราง
echo "<tr align='center' bgcolor='#CCCCCC'><td>รหัส</td><td>Uername</td><td>ชื่อ</td><td>เพศ</td><td>เบอร์โทรศัพท์</td><td>อีเมล</td><td>วัน เดือน ปี เกิด</td></tr>";
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td>" .$row["Member_ID"] .  "</td> "; 
  echo "<td>" .$row["Name"] .  "</td> ";  
  echo "<td>" .$row["Gender"] .  "</td> ";
  echo "<td>" .$row["Tel"] .  "</td> ";
  echo "<td>" .$row["Email"] .  "</td> ";
  echo "<td>" .$row["Birth_Date"] .  "</td> ";
  //แก้ไขข้อมูล
  echo "<td><a href='UserUpdateForm.php?ID=$row[0]'>edit</a></td> ";
  
  //ลบข้อมูล
  echo "<td><a href='UserDelete.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\">del</a></td> ";
  echo "</tr>";
}
echo "</table>";
//5. close connection
mysqli_close($con);
?>

<!-- SELECT Member_ID AS รหัส,Name AS ชื่อ,Gender AS เพศ,Tel AS เบอร์โทรศัพท์,Email AS อีเมล,Birth_Date AS วันเดือนปี เกิด
FROM Member;

SELECT Member_ID AS รหัส,Name AS ชื่อ,Cause_Blacklist AS สาเหตุ,Start_Date AS วันเริ่มบทลงโทษ,End_Date AS วันสิ้นสุด
FROM Blacklist
JOIN Member USING (Member_ID); -->
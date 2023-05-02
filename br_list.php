<?php
require 'connection.php';
$query = "SELECT * FROM borrow_return";
$data =  mysqli_query($con, $query);
if (isset($_POST['return'])) {
    $id = $_POST['return'];
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    mysqli_begin_transaction($con);
    $check = "SELECT R_Date FROM borrow_return WHERE BR_ID = $id";
    $checked = mysqli_query($con, $check);
    $lol = mysqli_fetch_row($checked);
    $date = $lol[0];
    // echo $date;
    $today = strtotime("today");
    $days = (strtotime("today") - strtotime($date)) / (60 * 60 * 24); 
  echo floor($days); // Output: 12
    
    if ($days > 7) {
        echo 'late';
        try {
            $sql = "UPDATE borrow_return SET Status = 'คืนช้ากว่ากำหนด' WHERE BR_ID = $id";
            mysqli_query($con, $sql);
            mysqli_commit($con);
        } catch (mysqli_sql_exception $exception) {
            mysqli_rollback($con);
            // echo $add;
            echo $exception;
        }
    } else {
        try {
            $sql = "UPDATE borrow_return SET Status = 'คืนแล้ว' WHERE BR_ID = $id";
            mysqli_query($con, $sql);
            mysqli_commit($con);
        } catch (mysqli_sql_exception $exception) {
            mysqli_rollback($con);
            // echo $add;
            echo $exception;
        }
    }
    header ('location: br_list.php');
}
?>

<body>
    <script src="test.js"></script>
    <div class="container-fluid side-bar">
        <div class="row side-bar">
            <?php
            include('navbar.php');
            ?>



            <div class="col bg-light">
                <table>
                    <?php
                    while ($row = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo $row['BR_ID']; ?></td>
                            <td><?php echo $row['Member_ID']; ?></td>
                            <td><?php echo $row['Book_ID']; ?></td>
                            <td><?php echo $row['Status']; ?></td>
                            <td><?php echo $row['B_Date']; ?></td>
                            <td><?php echo $row['R_Date']; ?></td>
                            <?php
                            if ($row['Status'] == "กำลังยืม") { ?>
                                <td>
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <button type="submit" name="return" value="<?php echo $row['BR_ID']; ?>">รับหนังสือที่คืนแล้ว</button>
                                    </form>
                                </td>
                            <?php
                            } ?>

                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    </div>
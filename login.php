<?php
    include 'connection.php';
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $find = "SELECT Lib_name, Lib_ID FROM librarian WHERE Lib_Email = '$email'";
        $check = mysqli_query($con, $find);
        echo mysqli_error($con);
        if($check){
            $row = mysqli_fetch_row($check);
            session_start();
            $_SESSION["admin"] = $row[1];
            $_SESSION["name"] = $row[0];
            header ('Location: index.php');
        }
        else{
            echo 'bruh';
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
    <script src="test.js"></script>
    <title>Login</title>
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
                    <h1 class="text-center p-3">Login</h1>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"class="p-3">
                        <div class="form-group pb-3">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" id="Email" aria-describedby="email"
                                placeholder="Enter email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" class="form-control" id="Password" placeholder="Password" name="password">
                        </div>
                        <div class="row p-4">
                            <input type="submit" class="btn btn-primary" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
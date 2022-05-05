<?php
session_start();
require 'helper.php';
if (!isset($_SESSION['username'])) {
    redirect('login.php');
}
require 'conn.php';
?>
<!DOCTYPE html>
<html>
<!-- saved from url=(0057)https://jolly-kalam-23776e.netlify.app/fullscreenlanding/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <title>Fullscreen Landing</title>
</head>

<body>
<img src ="pic1.PNG">
<section id="" class="a">
<ul>
    <li> <h1><a href="login.php"> Home </h1></li>
    <li> <h1><a href="login.php"> About <h1></li>
    <li><h1><a href="login.php"> Services</h1></li>
    <li><h1><a href="login.php">Books</h1></li>
    <li><h1 ><a href="logout.php"> Logout</h1></li>
</ul>   
</section>
<head>
    
</head>

<body>

    <div class="b">
        <h1>users information</h1>
        <?php
        $sql = "SELECT * FROM ebook";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        ?>
            <table id="users">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>

                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['username'] ?></td>
                            <div class="box1">
                                <div class="box2"></div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php  } else {
            echo '<span class="err">No Rows</span>';
        } ?>
    </div>
</body>

</html>
<!DOCTYPE html>

</body></html>
<?php
session_start();
if ( isset( $_SESSION['username'] ))  {
    header('Location: index.php');
}
require 'conn.php';
$repeat_err = $success = $fail = $exist_err  = $login_failed = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = "SELECT * FROM ebook WHERE username = '$_POST[uname]' and psw = '$_POST[psw]'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $_POST['uname'];
        header("Location: index.php");
    } else {
        $login_failed = '<span class="err">Incorrect Email or Password</span>';
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <h2>Login Form</h2>
    <?= $login_failed ?>
    <form action="login.php" method="post">



        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit">Login</button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn"><a href="register.php">Register </a></button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>

</body>

</html>
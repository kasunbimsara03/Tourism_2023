<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="../css/Login_form.css">
    <title>Login Form</title>
    
</head>
<body>
    <form method="post">
        <div class="form-box">
            <div class="form-value">
                <form >
                    <h2>Login Form</h2>
                    <div class="imgcontainer">
                        <span alt="Avatar" class="avatar"></span>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="Password">Password</label>
                    </div>
                    <button method="post" type="submit" name="submit">Log in</button>
                    <div class="register">
                        <p>Don't have an account? <a href="Registration_Form.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </form>
    
    
</body>

</html>

<?php
    include "db_conn.php";

    

    if (isset($_POST['submit'])){
        $usname=$_POST['username'];
        $pass=$_POST['password'];

        $sql= "select * from utenti where username = '$usname' and password ='$pass'";
        $result = $conn->query($sql);
        //var_dump($result);
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($user['username'] ==$usname && $user['password'] == $pass) {
               header('location: Risult.php');
            }  
        } else {
            echo "<p>No account exists. Please <a href='Registration_Form.php'>register</a>.</p>";
        }
    }
    $conn->close();
?>









     





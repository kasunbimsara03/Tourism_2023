<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="../css/Registration_Form.css">
    <title>Registration Form</title>

</head>

<body>

    <form method="post">
        <div class="form-box">
            <div class="form-value">
                <form>
                    <h2>Registration Form</h2>
                    <div class="imgcontainer">
                        <span alt="Avatar" class="avatar"></span>
                    </div>
                    
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="username"required>
                        <label for="username">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" id="last_name" name="last_name" required>
                        <label for="last_name">Surname</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text"  id="first_name" name="first_name" required>
                        <label for="first_name">Name</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="barcode-outline"></ion-icon>
                        <input type="text" id="cf" name="cf" required>
                        <label for="cf">Tax ID Code</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="calendar-outline"></ion-icon>
                        <input type="date" id="birth_date" name="birth_date" required>
                        <label for="birth_date">Date Of Birth</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" id="email" name="email">
                        <label for="email">Email (optional)</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="call-outline"></ion-icon>
                        <input type="text" id="phone" name="phone"  >
                        <label for="cell">Phone Number (optional)</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="home-outline"></ion-icon>
                        <input type="text" id="address" name="address">
                        <label for="indirizzo">Address (optional)</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" id="password" name="password" required>
                        <label for="Password">Password</label>
                    </div>

                    <button method="post" type="submit" name="submit" >Register</button>
                    <div class="Login">
                        <p id="p">Have an account? <a href="../php/Login_Form.php"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </form>
</body>

</html>

<?php
    include "db_conn.php";

    if(isset($_POST['submit'])) {
        $username=$_POST['username'];
        $cf = $_POST['cf'];
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $birth_date = $_POST['birth_date'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];

        $stmt = $conn->prepare( "INSERT INTO utenti (username,password,cf, nome,cognome, data_n,cell, indirizzo,email) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param ("sssssssss",$username, $password, $cf, $first_name, $last_name, $birth_date, $phone, $address,$email);
        $stmt->execute();
    
        $stmt->close();
        $conn->close();

        header('location: Login_Form.php');
    }

?>












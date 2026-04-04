<?php
session_start();

$conn = mysqli_connect("localhost","root","","project");

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

/* ================= REGISTER ================= */
if(isset($_POST['register'])){

    $name = $_POST['reg_name'];
    $email = $_POST['reg_email'];
    $password = password_hash($_POST['reg_password'], PASSWORD_DEFAULT);
    $phone = $_POST['reg_phone'];
    $gender = $_POST['reg_gender'];
    $faculty = $_POST['reg_faculty'];

    // check duplicate email
    $check = "SELECT * FROM registrations WHERE email='$email'";
    $check_result = mysqli_query($conn,$check);

    if(mysqli_num_rows($check_result) > 0){
        echo "<p style='color:red;text-align:center;'>Email already exists!</p>";
    } else {

        $sql = "INSERT INTO registrations 
        (name,email,password,phone,gender,faculty)
        VALUES 
        ('$name','$email','$password','$phone','$gender','$faculty')";

        if(mysqli_query($conn,$sql)){
            echo "<p style='color:green;text-align:center;'>Registration successful!</p>";
        } else {
            echo "<p style='color:red;text-align:center;'>Error: ".mysqli_error($conn)."</p>";
        }
    }
}

/* ================= LOGIN ================= */
if(isset($_POST['login'])){

    $email = $_POST['log_email'];
    $password = $_POST['log_password'];

    $sql = "SELECT * FROM registrations WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row['password'])){
            $_SESSION['user'] = $row['name'];

            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "<p style='color:red;text-align:center;'>Invalid password!</p>";
        }

    } else {
        echo "<p style='color:red;text-align:center;'>Email not found!</p>";
    }
}

/* ================= LOGOUT ================= */
if(isset($_POST['logout'])){
    session_destroy();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login System</title>

<style>
body {
    font-family: Arial;
    background: linear-gradient(to bottom, #ffe6f9, #cce7ff);
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 30px;
}

.container {
    display: flex;
    gap: 30px;
    flex-wrap: wrap;
}

form {
    width: 300px;
    background: white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

h3 {
    text-align: center;
    color: #ff69b4;
}

input, select {
    width: 100%;
    padding: 8px;
    margin: 8px 0;
    border-radius: 8px;
    border: 1px solid #ccc;
}

input[type="submit"] {
    background: linear-gradient(to right, pink, lightblue);
    border: none;
    font-weight: bold;
    cursor: pointer;
}

.welcome {
    margin-bottom: 20px;
    font-size: 18px;
    color: green;
    font-weight: bold;
}
</style>
</head>

<body>

<!-- SESSION WELCOME -->
<?php
if(isset($_SESSION['user'])){
    echo "<div class='welcome'>Welcome ".$_SESSION['user']."</div>";
}
?>

<div class="container">

<!-- REGISTER FORM -->
<form method="post">
    <h3>Register</h3>

    <input type="text" name="reg_name" placeholder="Name" required>
    <input type="email" name="reg_email" placeholder="Email" required>
    <input type="password" name="reg_password" placeholder="Password" required>
    <input type="text" name="reg_phone" placeholder="Phone" required>

    <select name="reg_gender" required>
        <option value="">Select Gender</option>
        <option>Male</option>
        <option>Female</option>
        <option>Other</option>
    </select>

    <input type="text" name="reg_faculty" placeholder="Faculty" required>

    <input type="submit" name="register" value="Register">
</form>

<!-- LOGIN FORM -->
<form method="post">
    <h3>Login</h3>

    <input type="email" name="log_email" placeholder="Email" required>
    <input type="password" name="log_password" placeholder="Password" required>

    <input type="submit" name="login" value="Login">
</form>

</div>

<!-- LOGOUT -->
<form method="post" style="margin-top:20px;">
    <input type="submit" name="logout" value="Logout">
</form>

</body>
</html>
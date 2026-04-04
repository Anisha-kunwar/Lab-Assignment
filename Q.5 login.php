<?php
session_start();
$conn = mysqli_connect("localhost","root","","project");

if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $sql="SELECT * FROM registrations WHERE email='$email' AND password='$pass'";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0)
    {
        $_SESSION['user']=$email;
        echo "<h3 style='color:#00ff88;text-align:center;'>Login Success</h3>";
    }
    else
    {
        echo "<h3 style='color:#ff5555;text-align:center;'>Invalid Login</h3>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
/* unique pastel gradient background */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #fbc2eb, #a6c1ee, #f0f5f9);
    background-size: 400% 400%;
    animation: gradientBG 15s ease infinite;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

/* animate gradient background */
@keyframes gradientBG {
    0% {background-position: 0% 50%;}
    50% {background-position: 100% 50%;}
    100% {background-position: 0% 50%;}
}

/* frosted glass login box */
.box {
    width: 350px;
    margin: 0 auto;
    padding: 30px;
    background: rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(12px);
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    text-align: center;
    border: 2px solid #a6c1ee;
}

/* heading */
h2 {
    color: #444;
    margin-bottom: 20px;
    font-family: Verdana, sans-serif;
}

/* label */
label {
    color: #333;
    display: inline-block;
    width: 90px;
    font-weight: bold;
}

/* input */
input {
    padding: 8px;
    margin: 10px 0;
    border-radius: 10px;
    border: 1px solid #ccc;
    width: 70%;
}

/* button */
button {
    background: #f6a5c0;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
}

button:hover {
    background: #f38fb3;
    color: #fff;
}
</style>
</head>
<body>

<div class="box">
<h2>Login Form</h2>
<form method="post">
<label>Email</label>
<input type="text" name="email"><br><br>

<label>Password</label>
<input type="password" name="password"><br><br>

<button name="login">Login</button>
</form>
</div>

</body>
</html>
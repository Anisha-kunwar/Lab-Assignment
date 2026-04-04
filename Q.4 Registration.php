<?php

$conn = mysqli_connect("localhost", "root", "", "project");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $faculty = $_POST['faculty'];

    if ($name == "" || $email == "" || $password == "" || $phone == "" || $gender == "") {
        echo "<h3 style='color:red;text-align:center'>Fill all required fields</h3>";
    } else {

        // FIXED: $pass → $password
        $sql = "INSERT INTO registrations 
        (name, email, password, phone, gender, faculty)
        VALUES 
        ('$name', '$email', '$password', '$phone', '$gender', '$faculty')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<h3 style='color:green;text-align:center'>Registered Successfully!</h3>";
        } else {
            echo "<h3 style='color:red;text-align:center'>Error: " . mysqli_error($conn) . "</h3>";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #ff9a9e, #fad0c4, #a1c4fd, #c2e9fb);
    background-size: 400% 400%;
    animation: gradientBG 15s ease infinite;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

@keyframes gradientBG {
    0% {background-position: 0% 50%;}
    50% {background-position: 100% 50%;}
    100% {background-position: 0% 50%;}
}

.box {
    width: 380px;
    padding: 30px;
    background: rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(12px);
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

label {
    color: #555;
    display: inline-block;
    width: 100px;
    font-weight: bold;
}

input[type="text"], input[type="password"], select {
    padding: 8px;
    margin: 8px 0;
    border-radius: 10px;
    border: none;
    width: 65%;
}

input[type="radio"] {
    margin-left: 10px;
}

button {
    background: #ff9a9e;
    color: white;
    padding: 8px 20px;
    border: none;
    border-radius: 10px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #fad0c4;
    color: #333;
}

h2 {
    text-align: center;
    color: #444;
    margin-bottom: 20px;
}
</style>
</head>

<body>

<div class="box">

<h2>Registration Form</h2>

<form method="post">

<label>Name</label>
<input type="text" name="name"><br>

<label>Email</label>
<input type="text" name="email"><br>

<label>Password</label>
<input type="password" name="password"><br>

<label>Phone</label>
<input type="text" name="phone"><br>

<label>Gender</label>
<input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female<br>

<label>Faculty</label>
<select name="faculty">
    <option>BCA</option>
    <option>BBS</option>
    <option>BIM</option>
</select><br><br>

<center>
<button name="submit">Register</button>
</center>

</form>

</div>

</body>
</html>
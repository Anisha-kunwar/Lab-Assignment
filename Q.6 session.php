<?php
session_start();

// Set session
if (isset($_POST['set'])) {
    $_SESSION['username'] = $_POST['username'];
}

// Destroy session
if (isset($_POST['destroy'])) {
    session_destroy();
    echo "<p style='color:red; text-align:center; font-weight:bold;'>Session destroyed!</p>";
}

// Display session
if(isset($_SESSION['username'])){
    echo "<p style='color:red; text-align:center; font-weight:bold;'>Session Username: " . $_SESSION['username'] . "</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
    font-family: Arial, sans-serif;
    background: #ffffff; /* white background */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

form {
    background: #ff4d4d; /* red form background */
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    display: flex;
    flex-direction: column;
    gap: 15px;
    width: 300px;
}

label {
    font-weight: bold;
    color: white;
    margin-bottom: 5px;
}

input[type="text"] {
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
    outline: none;
}

input[type="submit"] {
    padding: 10px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    color: #ff4d4d;
    background: white;
    transition: 0.3s;
}

input[type="submit"]:hover {
    background: #ffe6e6;
    transform: scale(1.05);
}
</style>
</head>
<body>

<form method="post">
    <label>Set Session:</label>
    <input type="text" name="username" placeholder="Enter username">

    <input type="submit" name="set" value="Set Session">
    <input type="submit" name="destroy" value="Destroy Session">
</form>

</body>
</html>
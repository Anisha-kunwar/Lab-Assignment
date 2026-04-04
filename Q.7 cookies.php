<?php
// Set Cookie
if (isset($_POST['set'])) {
    setcookie("user", $_POST['user'], time()+3600); // 1 hour
}

// Delete Cookie
if (isset($_POST['delete'])) {
    setcookie("user", "", time()-3600);
}

// Display Cookie
if(isset($_COOKIE['user'])){
    echo "<p style='text-align:center; font-weight:bold; color:#6a0dad;'>Cookie Value: " . $_COOKIE['user'] . "</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to bottom, #fce4ff, #cce7ff, #ffe6f0); /* soft pastel gradient */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

form {
    background: linear-gradient(135deg, #a18cd1, #fbc2eb, #87cefa); /* purple → pink → light blue */
    padding: 25px;
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    display: flex;
    flex-direction: column;
    gap: 15px;
    width: 320px;
}

label {
    font-weight: bold;
    color: white;
}

input[type="text"] {
    padding: 10px;
    border-radius: 10px;
    border: none;
    outline: none;
    font-size: 14px;
}

input[type="submit"] {
    padding: 12px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    font-weight: bold;
    color: white;
    background: linear-gradient(to right, #ff9a9e, #fad0c4, #a1c4fd); /* gradient button */
    transition: 0.3s;
}

input[type="submit"]:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
}
</style>
</head>
<body>

<form method="post">
    <label>Set Cookie:</label>
    <input type="text" name="user" placeholder="Enter cookie value">

    <input type="submit" name="set" value="Set Cookie">
    <input type="submit" name="delete" value="Delete Cookie">
</form>

</body>
</html>
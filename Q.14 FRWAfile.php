<?php
$filename = "sample.txt";

// Write to file
if(isset($_POST['write'])){
    $text = $_POST['text'];
    file_put_contents($filename, $text);
    echo "<p style='color:#fff; text-align:center;'>Written to file successfully!</p>";
}

// Append to file
if(isset($_POST['append'])){
    $text = $_POST['text'];
    file_put_contents($filename, $text . PHP_EOL, FILE_APPEND);
    echo "<p style='color:#fff; text-align:center;'>Appended to file successfully!</p>";
}

// Read file
if(file_exists($filename)){
    echo "<h3 style='color:#fff; text-align:center;'>File Content:</h3>
          <pre style='color:#fff; text-align:center;'>".file_get_contents($filename)."</pre>";
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
    background: linear-gradient(135deg, #a8e6cf, #dcedc1); /* soft pastel gradient */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
    padding-top: 50px;
    margin: 0;
}

form {
    background: rgba(255, 255, 255, 0.2); /* semi-transparent form */
    backdrop-filter: blur(10px); /* nice frosted glass effect */
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    width: 350px;
    text-align: center;
}

input[type="text"] {
    padding: 10px;
    margin: 10px 0;
    border-radius: 10px;
    border: none;
    width: 80%;
}

input[type="submit"] {
    padding: 10px 20px;
    margin: 5px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    background: #ffd3b6;
    color: #333;
    font-weight: bold;
    transition: 0.3s;
}

input[type="submit"]:hover {
    background: #ffaaa5;
    color: white;
}
</style>
</head>
<body>

<form method="post">
    <h2 style="color:white;">Aesthetic Text File</h2>
    Text: <input type="text" name="text"><br>
    <input type="submit" name="write" value="Write">
    <input type="submit" name="append" value="Append">
</form>

</body>
</html>
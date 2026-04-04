<?php
$conn = mysqli_connect("localhost","root","","project");

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $price = $_POST['price'];

    $sql = "UPDATE booksdata SET price='$price' WHERE id='$id'";
    if(mysqli_query($conn,$sql)){
        echo "<p style='color:white; text-align:center;'>Book updated successfully!</p>";
    } else {
        echo "<p style='color:white; text-align:center;'>Error: ".mysqli_error($conn)."</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
    background: linear-gradient(135deg, #f5f7fa, #c3cfe2); /* soft pastel blue-purple gradient */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
}

form {
    background: rgba(255, 255, 255, 0.25); /* frosted glass effect */
    backdrop-filter: blur(12px);
    padding: 35px 45px;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    text-align: center;
}

input[type="text"], input[type="number"] {
    padding: 10px;
    margin: 10px 0;
    border-radius: 10px;
    border: none;
    width: 80%;
}

input[type="submit"] {
    padding: 12px 30px;
    border: none;
    border-radius: 12px;
    background-color: #a0e7e5; /* soft mint button */
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

input[type="submit"]:hover {
    background-color: #b4f8c8;
    color: white;
}
</style>
</head>
<body>

<form method="post">
    <h2 style="color:white;">Update Book Price</h2>
    Book ID to Update: <input type="text" name="id"><br>
    New Price: <input type="number" name="price" step="0.01"><br>
    <input type="submit" name="update" value="Update Book">
</form>

</body>
</html>
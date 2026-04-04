<?php
$conn = mysqli_connect("localhost","root","","project");

if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM booksdata WHERE id='$id'";
    if(mysqli_query($conn,$sql)){
        echo "<p style='color:white; text-align:center;'>Book deleted successfully!</p>";
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
    background: linear-gradient(135deg, #e6e6fa, #d8bfd8); /* lavender gradient */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
}

form {
    background: rgba(255, 255, 255, 0.25); /* frosted glass */
    backdrop-filter: blur(12px);
    padding: 30px 40px;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    text-align: center;
}

input[type="text"] {
    padding: 10px;
    margin: 15px 0;
    border-radius: 12px;
    border: none;
    width: 80%;
}

input[type="submit"] {
    padding: 10px 25px;
    border: none;
    border-radius: 12px;
    background-color: #d8bfd8; /* soft lavender button */
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

input[type="submit"]:hover {
    background-color: #cdb5cd; /* slightly darker lavender on hover */
    color: white;
}
</style>
</head>
<body>

<form method="post">
    <h2 style="color:white;">Delete Book</h2>
    Book ID to Delete: <input type="text" name="id"><br>
    <input type="submit" name="delete" value="Delete Book">
</form>

</body>
</html>
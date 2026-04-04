<?php
if(isset($_POST['upload'])){
    $folder = "uploads/";

    // Create uploads folder if not exists
    if(!is_dir($folder)){
        mkdir($folder, 0777, true);
    }

    $filename = basename($_FILES['file']['name']);
    $target = $folder . $filename;

    // Optional: check file size (max 2MB)
    if($_FILES['file']['size'] > 2000000){
        echo "<p style='color:red; text-align:center;'>File too large!</p>";
    }
    else {
        if(move_uploaded_file($_FILES['file']['tmp_name'], $target)){
            echo "<p style='text-align:center; color:green; font-weight:bold;'>File uploaded successfully!</p>";
        } else {
            echo "<p style='text-align:center; color:red; font-weight:bold;'>Failed to upload file.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>File Upload</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to bottom, #ffe6f0, #cce7ff);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
form {
    background: linear-gradient(135deg, #ffb3d9, #87cefa);
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    display: flex;
    flex-direction: column;
    gap: 20px;
    width: 350px;
    align-items: center;
}
h2 {
    color: #ff3399;
}
input[type="file"] {
    padding: 10px;
    border-radius: 10px;
    width: 100%;
}
input[type="submit"] {
    padding: 12px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    font-weight: bold;
    background: linear-gradient(to right, #ff9a9e, #fad0c4, #a1c4fd);
    color: white;
}
</style>
</head>
<body>

<form method="post" enctype="multipart/form-data">
    <h2>Upload Your File</h2>
    <input type="file" name="file" required>
    <input type="submit" name="upload" value="Upload">
</form>

</body>
</html>
<?php
$conn = mysqli_connect("localhost","root","","project");

if(isset($_POST['add'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $publisher = $_POST['publisher'];
    $author = $_POST['author'];
    $edition = $_POST['edition'];  
    $pages = $_POST['pages'];
    $price = $_POST['price'];
    $publish_date = $_POST['publish_date'];
    $isbn = $_POST['isbn'];

    $sql = "INSERT INTO booksdata (id,title,publisher,author,edition,no_of_page,price,publish_date,isbn)
            VALUES ('$id','$title','$publisher','$author','$edition','$pages','$price','$publish_date','$isbn')";
    if(mysqli_query($conn,$sql)){
        echo "<p style='color:green; 
        text-align:center;'>Book added successfully!</p>";
    } else {
        echo "<p style='color:red;
         text-align:center;'>Error: ".mysqli_error($conn)."</p>";
    }
}
?>

<div style="max-width:400px; margin:50px auto; padding:30px; background:linear-gradient(to bottom right, #ffe6f0, #ffb3d9); border-radius:15px; box-shadow: 0 5px 15px rgba(0,0,0,0.3); font-family:Arial, sans-serif;">
    <h2 style="text-align:center; 
    color:#ff0066;">Books Data</h2>
    <form method="post">
        <label style="color:#ff3399;">ID:</label>
        <input type="text" name="id" style="width:100%; padding:8px; margin:5px 0; border-radius:5px; border:1px solid #ccc;"><br>
        
        <label style="color:#ff3399;">Title:</label>
        <input type="text" name="title" style="width:100%; padding:8px; margin:5px 0; border-radius:5px; border:1px solid #ccc;"><br>
        
        <label style="color:#ff3399;">Publisher:</label>
        <input type="text" name="publisher" style="width:100%; padding:8px; margin:5px 0; border-radius:5px; border:1px solid #ccc;"><br>
        
        <label style="color:#ff3399;">Author:</label>
        <input type="text" name="author" style="width:100%; padding:8px; margin:5px 0; border-radius:5px; border:1px solid #ccc;"><br>
        
        <label style="color:#ff3399;">Edition:</label>
        <input type="text" name="edition" style="width:100%; padding:8px; margin:5px 0; border-radius:5px; border:1px solid #ccc;"><br>
        
        <label style="color:#ff3399;">Pages:</label>
        <input type="number" name="pages" style="width:100%; padding:8px; margin:5px 0; border-radius:5px; border:1px solid #ccc;"><br>
        
        <label style="color:#ff3399;">Price:</label>
        <input type="number" name="price" step="0.01" style="width:100%; padding:8px; margin:5px 0; border-radius:5px; border:1px solid #ccc;"><br>
        
        <label style="color:#ff3399;">Publish Date:</label>
        <input type="date" name="publish_date" style="width:100%; padding:8px; margin:5px 0; border-radius:5px; border:1px solid #ccc;"><br>
        
        <label style="color:#ff3399;">ISBN:</label>
        <input type="text" name="isbn" style="width:100%; padding:8px; margin:5px 0; border-radius:5px; border:1px solid #ccc;"><br><br>
        
        <input type="submit" name="add" value="Add Book" style="width:100%; padding:10px; background:#ff3399; color:white; border:none; border-radius:8px; cursor:pointer; font-weight:bold;">
    </form>
</div>
<?php
$conn = mysqli_connect("localhost","root","","project");

$sql = "SELECT * FROM booksdata";
$result = mysqli_query($conn,$sql);

echo "<h2>Books List</h2>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>ID</th><th>Title</th><th>Publisher</th><th>Author</th><th>Edition</th><th>Pages</th><th>Price</th><th>Publish Date</th><th>ISBN</th></tr>";

while($row = mysqli_fetch_assoc($result)){
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['title']}</td>
            <td>{$row['publisher']}</td>
            <td>{$row['author']}</td>
            <td>{$row['edition']}</td>
            <td>{$row['no_of_page']}</td>
            <td>{$row['price']}</td>
            <td>{$row['publish_date']}</td>
            <td>{$row['isbn']}</td>
          </tr>";
}
echo "</table>";
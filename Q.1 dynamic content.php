<?php
$students = array("Ram", "Shyam", "Hari", "Sita", "Gita");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Content</title>

    <style>
        .box{
            width:150px;
            height:50px;
            background:skyblue;
            margin:5px;
            text-align:center;
            line-height:50px;
            display:inline-block;
        }

        table{
            border-collapse: collapse;
        }

        th,td{
            border:1px solid black;
            padding:5px;
        }
    </style>

</head>

<body>

<h2>HTML List using Loop</h2>

<ul>
<?php
foreach($students as $s)
{
    echo "<li>$s</li>";
}
?>
</ul>


<h2>HTML Table using Loop</h2>

<table>

<tr>
<th>ID</th>
<th>Name</th>
</tr>

<?php

$id = 1;

foreach($students as $s)
{
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$s</td>";
    echo "</tr>";
    $id++;
}

?>

</table>


<h2>CSS Layout using Loop</h2>

<?php

foreach($students as $s)
{
    echo "<div class='box'>$s</div>";
}

?>

</body>
</html>
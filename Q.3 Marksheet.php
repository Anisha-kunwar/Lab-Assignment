<!DOCTYPE html>
<html>
<head>
<title>Marksheet</title>
<style>
body{
    background:#000000; /* black background */
    font-family:Arial, sans-serif;
    color:white;
}

form{
    width:380px;
    margin:auto;
    background:#111111; /* dark form */
    padding:25px;
    border-radius:15px; 
    box-shadow:0 0 20px rgba(255,255,255,0.2);
}
 
h2{
    text-align:center;
    background: linear-gradient(90deg, red, orange, yellow, green, blue, indigo, violet);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-size:28px;
    margin-bottom:25px;
}

label{
    font-weight:bold;
    background: linear-gradient(90deg, red, orange, yellow, green, blue, indigo, violet);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    display:block;
    margin-bottom:5px;
}

input{
    width:100%;
    padding:10px;
    margin-bottom:15px;
    border-radius:8px;
    border:1px solid #444;
    background:#222;
    color:white;
}

button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    cursor:pointer;
    font-weight:bold;
    font-size:16px;
    background: linear-gradient(90deg, red, orange, yellow, green, blue, indigo, violet);
    color:white;
}

button:hover{
    opacity:0.85;
}

table{
    margin:auto;
    margin-top:25px;
    border-collapse:collapse;
    background:#111;
    border-radius:10px;
    overflow:hidden;
}

th, td{
    border:1px solid #444;
    padding:12px;
    text-align:center;
}

th{
    background: linear-gradient(90deg, red, orange, yellow, green, blue, indigo, violet);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight:bold;
    font-size:16px;
}

td{
    color:white;
}
</style>
</head>
<body>

<h2>Student Marksheet</h2>

<form method="post">
<label>Name</label>
<input type="text" name="name">

<label>Math</label>
<input type="text" name="m1">

<label>Science</label>
<input type="text" name="m2">

<label>English</label>
<input type="text" name="m3">

<label>Nepali</label>
<input type="text" name="m4">

<label>Computer</label>
<input type="text" name="m5">

<button name="show">Show Marksheet</button>
</form>

<?php
if(isset($_POST['show']))
{
    $name=$_POST['name'];
    $m1=(int)$_POST['m1'];
    $m2=(int)$_POST['m2'];
    $m3=(int)$_POST['m3'];
    $m4=(int)$_POST['m4'];
    $m5=(int)$_POST['m5'];

    $total=$m1+$m2+$m3+$m4+$m5;
    $per=$total/5;

    if($per>=80) $div="Distinction";
    elseif($per>=60) $div="First";
    elseif($per>=50) $div="Second";
    elseif($per>=40) $div="Third";
    else $div="Fail";

    echo "
    <table>
    <tr><th>Name</th><td>$name</td></tr>
    <tr><th>Total</th><td>$total</td></tr>
    <tr><th>Percentage</th><td>$per</td></tr>
    <tr><th>Division</th><td>$div</td></tr>
    </table>
    ";
}
?>
</body>
</html>
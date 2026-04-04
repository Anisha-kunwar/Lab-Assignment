<html>
<head>
<style>
body
{
background:linear-gradient(#74ebd5,#9face6);
font-family:Arial;
}
.box
{
width:350px;
margin:100px auto;
padding:20px;
background:white;
border-radius:12px;
box-shadow:0px 0px 15px gray;
}
h2
{
text-align:center;
color:#2c3e50;
}
label
{
color:#2c3e50;
display:inline-block;
width:80px;
font-weight:bold;
}
input
{
padding:5px;
border-radius:5px;
border:1px solid gray;
}
button
{
background:#2ecc71; 
color:white;
padding:8px;
width:150px;
border:none;
border-radius:6px;
cursor:pointer;
}
button:hover
{
background:#27ae60;
}
</style>
</head>
<body>
<div class="box">
<h2>Interest Calculator</h2>
<form method="post">
<label>Principal</label>
<input type="text" name="p"><br><br>
<label>Rate</label>
<input type="text" name="r"><br><br>
<label>Time</label>
<input type="text" name="t"><br><br>
<center>
<button name="simple">Simple Interest</button>
<button name="compound">Compound Interest</button>
</center>
</form>

<?php
if(isset($_POST['simple']))
{
$p=$_POST['p'];
$r=$_POST['r'];
$t=$_POST['t'];
$si=$p*$r*$t/100;
echo "<h3 style='text-align:center;color:green'>Simple Interest = ".$si."</h3>";
}

if(isset($_POST['compound']))
{
$p=$_POST['p'];
$r=$_POST['r'];
$t=$_POST['t'];
$ci=$p*pow((1+$r/100),$t);
echo "<h3 style='text-align:center;color:blue'>Compound Interest = ".$ci."</h3>";
}
?>
</div>
</body>
</html>
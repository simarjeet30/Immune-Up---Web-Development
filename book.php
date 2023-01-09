<?php

session_start();

$conn = mysqli_connect('localhost:3307','priyam','123456','cowin');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="website.css">
<title>Book</title>
<style>
table {
  margin-left: auto;
  margin-right: auto;
}
tr:hover {background-color: rgb(33, 197, 115)}
td {
  height: 70px; width:300px;
}
.red {color:red;}
</style>
</head>

<body>

<header>
        <h1>IMMUNE-UP</h1>
        <h4>Winning over Covid-19</h4>
</header>

<?php
if (isset($_SESSION['logged_in']) and $_SESSION['logged_in']==true)
{
echo"<div class='navbar'>
<a href='userlogout.php' >Log out</a>
</div>";
}
else
{
echo "<div class='navbar'>
<a href='website1.php' >Home</a>
</div>";
}

if (!isset($_POST['bsub']) and isset($_POST['csub']))
{

$sno=$_POST['cen'];
$sno=$sno-($sno%100);
$sno=$sno/100;

$vtype='';
$v=$_POST['cen']%100;
if ($v==1) $vtype='covaxin above 18';
else if ($v==2) $vtype='covishield above 18';
else if ($v==3) $vtype='covaxin above 45';
else $vtype='covishield above 45';
$_SESSION['sno']=$sno; $_SESSION['vtype']=$vtype;

echo "<form name='booking' method='post' action='book.php'>

<table>

<tr><td><b>Book an appointment</b></td></tr>

<tr>
<td>User ID: </td>
<td>" . $_SESSION['uid'] . "</td>
</tr>

<tr>
<td>Name of person: </td>
<td><input type=text name='bname'></td>
</tr>

<tr>
<td>Centre no.: </td>
<td>" . $sno . "</td>
</tr>

<tr>
<td>Vaccine type: </td>
<td>" . $vtype . "</td>
</tr>

<tr>
<td>Date of appointment: </td>
<td>December <select name='day' value='day'>";
for ($i=1; $i<=31; $i++)
echo "<option value='$i' selected>" . $i . "</option>";
echo "</select></td>
</tr>

<tr>
<td>Dose: </td>
<td><input type=radio name='dose' value=1 checked>1 <input type=radio name='dose' value=2>2</td>
</tr>

<tr><td><input type=submit value='Book' name='bsub' style='height:40px'></td></tr>

</table>
</form>";

}

if (isset($_POST['bsub']))
{
$res=mysqli_query($conn, "INSERT INTO appointment (uid, uname, Cen_sno, vaccine, month, day, dose) VALUES ('$_SESSION[uid]', '$_POST[bname]', '$_SESSION[sno]', '$_SESSION[vtype]', 12, '$_POST[day]', '$_POST[dose]')");

if ($res) echo "Thank you for booking an appointment!";
else echo "There was an error";
unset($_POST['bsub']);
}

?>

    <footer>
        <a href="FAQ.html" target="_blank">FAQ</a>
        <a href="#">Contact Us</a>
        <a href="#">Terms of Use</a>
        <a href="#">Privacy Policy</a>
    </footer>

</body>
</html>
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
<title>Centres</title>
<style>
table {
  margin-left: auto;
  margin-right: auto;
  width: 100%;
}
tr:hover {background-color: rgb(33, 197, 115)}
td {
  height: 70px;
}
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

if( isset($_SESSION['logged_in']) and $_SESSION['logged_in']==true and isset($_POST['search']))
{

echo "<h4>Choose a centre and vaccine type</h4>";

echo "<form name='cenform' method='post' action='book.php'><table>

<tr>
<th>S no.</th>
<th>State</th>
<th>District</th>
<th>Centre</th>
<th>Covaxin (18+)</th>
<th>Covishield (18+)</th>
<th>Covaxin(45+)</th>
<th>Covishield(45+)</th>
</tr>";

  $st=$_POST['state']; $dis=$_POST['district']; $flag=0;
  $query="SELECT * FROM vaccination_centres WHERE state='$st' AND district='$dis'";
  $res=mysqli_query($conn,$query);
  while ($row=mysqli_fetch_array($res))
  {
    $flag++; $v1=$row['S no.']*100+1;
    $v2=$row['S no.']*100+2;
    $v3=$row['S no.']*100+3;
    $v4=$row['S no.']*100+4;
    echo "<tr><td>" . $row['S no.'] . "</td>";
    echo "<td>" . $st . "</td>";
    echo "<td>" . $dis . "</td>";
    echo "<td>" . $row['centre'] . "</td>";
    echo "<td>"; if ($row['covaxin above 18']>0) echo "<input type=radio name='cen' value='$v1' checked>";
    echo $row['covaxin above 18'] . "</td>";
    echo "<td>"; if ($row['covishield above 18']>0) echo "<input type=radio name='cen' value='$v2' checked>";
    echo $row['covishield above 18'] . "</td>";
    echo "<td>"; if ($row['covaxin above 45']>0) echo "<input type=radio name='cen' value='$v3' checked>";
    echo $row['covaxin above 45'] . "</td>";
    echo "<td>"; if ($row['covishield above 45']>0) echo "<input type=radio name='cen' value='$v4' checked>";
    echo $row['covishield above 45'] . "</td>";
    echo "</tr>";
  }

if ($flag) echo "<tr><td/><td/><td/><td><input type=submit name='csub' value='Book' style='height: 50px'></td></tr>";

echo "</table>
</form>";

if (!$flag) echo "No results";
}

else if( isset($_SESSION['logged_in']) and $_SESSION['logged_in']==true and !isset($_POST['search'])) {header("Location:SearchVaccinationCentre.php");}

else {header("Location:login.html");}

?>

    <footer>
        <a href="FAQ.html" target="_blank">FAQ</a>
        <a href="#">Contact Us</a>
        <a href="#">Terms of Use</a>
        <a href="#">Privacy Policy</a>
    </footer>

</body>
</html>
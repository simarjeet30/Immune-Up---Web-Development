<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<title>Document</title>
<style>
body {
display: flex;
justify-content: center;
align-items: center;
height: 100vh;
margin: 0;
border: 0;
}
form {
width: 400px;
height: 200px;
border: 2px solid black;
padding: 2rem;
display: flex;
flex-direction: column;
align-items: center;
justify-content: space-evenly;
}
#messages {
position: absolute;
top: 0px;
left: 0px;
}
</style>
</head>
<body>
<?php
session_start();
$messages;
if (isset($_SESSION["messages"])) {
echo '<div id="messages">';
foreach($_SESSION["messages"] as $message){
echo $message;
}
$_SESSION = array();
echo '</div>';
}
?>
<form action="centres.php" method="POST">
<h1>Search Vaccination Centre</h1>
<input type="text" placeholder="state" name="state">
<input type="text" placeholder="district" name="district">
<input type="submit" value="Search" name="search">
</form>
</body>
</html>
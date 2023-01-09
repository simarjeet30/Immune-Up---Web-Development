

 <!DOCTYPE html>

<html>

<head>

    <title>HOME</title>
	<link rel="stylesheet" href="website.css">

</head>

<body>

<header>
        <h1>IMMUNE-UP</h1>
        <h4>Winning over Covid-19</h4>
</header>

<div class="navbar">
<?php 

session_start();

if (isset($_SESSION['Mobilenum']) && isset($_SESSION['password'])) {

 ?>
     <h1>Hello, <?php echo $_SESSION['Mobilenum']; ?></h1>

     <a href="logout.php">Logout</a>

<?php
}
?>
<?php 



if (isset($_SESSION['Mobilenum1']) && isset($_SESSION['password1'])) {

 ?>
 <h1>Hello, <?php echo $_SESSION['Mobilenum1']; ?></h1>

     <a href="logout.php">Logout</a>
<?php
}
?>
<a href="website1.php" >Home</a>
<a href="login.html">Register/Sign In</a>

<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Vaccination Services</button>
  <div id="Vaccination Services" class="dropdown-content">
    <a href="searchVaccinationCentre.php">Search Vaccination Centers and Book Slot</a>
  </div>
</div>

<div class="dropdown">
  <button onclick="myFunction1()" class="dropbtn">Platforms</button>
  <div id="platforms" class="dropdown-content">
    <a href="vaccinator.html">Vaccinator</a>
    <a href="deptlogin.html">Department Login</a>
    <a href="#">Vaccination Statistics</a>
  </div>
</div>

<div class="dropdown">
  <button onclick="myFunction2()" class="dropbtn">Resources</button>
  <div id="resources" class="dropdown-content">
    <a href="How to get vaccinated.pptx">How to get vaccinated</a>
    <a href="Dos and Dont.pdf">Do's and Don'ts</a>
    <a href="#">Overview</a>
  </div>
</div>

<div class="dropdown">
  <button onclick="myFunction3()" class="dropbtn">Support</button>
  <div id="support" class="dropdown-content">
    <a href="FAQ.html" target="_blank">FAQ's</a>
  </div>
</div>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("Vaccination Services").classList.toggle("show");
}
function myFunction1() {
  document.getElementById("platforms").classList.toggle("show");
}

function myFunction2() {
  document.getElementById("resources").classList.toggle("show");
}

function myFunction3() {
  document.getElementById("support").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

    <main>
        <section>
            <h2>Search Your Nearest Vaccination Center</h2>
            <img src="Vaccine.PNG" alt="vaccine" >  
        </section>
        <section>
            <h2>Get Vaccinated in 3 Easy Steps</h2>
            <img src="STEPS TO BOOK.PNG" alt="partners" >  
        </section>
        <section>
            <h2>Our Partners</h2>
            <img src="partners.PNG" alt="partners" >
        </section>
        <section>
            <h2>
                PRIME MINISTER OF INDIA
            </h2>
            <img src="pm.jpg" width=20%>
            <h3>Narendra Modi</h3>
            <a href="https://www.youtube.com/watch?v=io-oreIAuTM" target="_blank" rel="noopener noreferrer">YouTube</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer">LinkedIn</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="https://instagram.com/cowin.official?utm_medium=copy_link" target="_blank" rel="noopener noreferrer">Instagram</a>

            <h4>India Is Running The World’s Largest Vaccination Drive </h4>
            <H5>Citizens Fully Vaccinated - 45.71 Crore +&nbsp;&nbsp;|&nbsp;&nbsp; % of Fully Vaccinated - 57.64%&nbsp;&nbsp;</H5>
        </section>
    </main>

    <footer>
        <a href="FAQ.html" target="_blank">FAQ</a>
        <a href="#">Contact Us</a>
        <a href="#">Terms of Use</a>
        <a href="#">Privacy Policy</a>
    </footer>
</body>
</html>

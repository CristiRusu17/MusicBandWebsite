<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        $nume= $fetch_info['name'];
        $total=$fetch_info['total'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<title>Media</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="cssf1.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>

<body>

<!-- Navbar -->
<div class="crs-top">
  <div class="crs-bar crs-green crs-card">
    <a class="crs-bar-item crs-button crs-padding-large crs-right" onclick="meniu_drop()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="home.php" class="crs-bar-item crs-button crs-padding-large">HOME</a>
    <a href="home.php" class="crs-bar-item crs-button crs-padding-large">BAND</a>
    <a href="home.php" class="crs-bar-item crs-button crs-padding-large">TOUR</a>
    <a href="home.php" class="crs-bar-item crs-button crs-padding-large">CONTACT</a>
    <a href="Merch.php" class="crs-bar-item crs-button crs-padding-large">MERCHANDISE</a>
    <a href="logout-user.php" class="crs-bar-item crs-button crs-padding-large crs-hover-red crs-right">LOGOUT</a>
    <a class="crs-bar-item crs-button crs-padding-large crs-right">COS:<?php echo $total ?>$</a>
    <form action="#" method="POST" autocomplete="">
    <button class="crs-padding-large crs-button crs-right" type="submit" name="plata" value="Plata">PAY</button>
    </form>
  </div>
</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="crs-bar-block crs-black crs-hide crs-hide-large crs-hide-medium crs-top" style="margin-top:46px">
  <a href="" class="crs-bar-item crs-button crs-padding-large">BAND</a>
  <a href="" class="crs-bar-item crs-button crs-padding-large">TOUR</a>
  <a href="" class="crs-bar-item crs-button crs-padding-large">CONTACT</a>
  <a href="" class="crs-bar-item crs-button crs-padding-large">HOME</a>
  <a href="" class="crs-bar-item crs-button crs-padding-large">MERCH</a>
</div>

<!-- Page content -->
<div class="crs-content" style="max-width:2000px;margin-top:46px">

  <!-- Automatic Slideshow Images -->
  <div class="mySlides crs-display-container crs-center">
    <img src="poze\tsm.jpg" style="width:100%">
    <div class="crs-display-bottommiddle crs-container crs-text-white crs-padding-32 crs-hide-small">
      <h3>Travis Scott</h3>
      <p><b>You need more than Google just to find me.</b></p> 
    </div>
  </div>

  <div class="mySlides crs-display-container crs-center">
    <img src="poze\tsam.jpg" style="width:100%">
    <div class="crs-display-bottommiddle crs-container crs-text-white crs-padding-32 crs-hide-small">
      <h3>Travis Scott</h3>
    </div>
  </div>

  <div class="mySlides crs-display-container crs-center">
    <img src="poze\jcm.jpg" style="width:100%">
    <div class="crs-display-bottommiddle crs-container crs-text-white crs-padding-32 crs-hide-small">
      <h3>J. Cole</h3>
      <p><b>We got dreams and we got the right to chase 'em.</b></p>
    </div>
  </div>

  <div class="mySlides crs-display-container crs-center">
    <img src="poze\kodc.jpg" style="width:100%">
    <div class="crs-display-bottommiddle crs-container crs-text-white crs-padding-32 crs-hide-small">
      <h3>J. Cole</h3>
      <p><b>KOD</b></p> 
    </div>
  </div>

  <div class="mySlides crs-display-container crs-center">
    <img src="poze\drm.jpg" style="width:100%">
    <div class="crs-display-bottommiddle crs-container crs-text-white crs-padding-32 crs-hide-small">
      <h3>Drake</h3>
      <p><b>Everybody has an addiction, mine happens to be success.</b></p>
    </div>
  </div>

  <div class="mySlides crs-display-container crs-center">
    <img src="poze\scorpion.png" style="width:100%">
    <div class="crs-display-bottommiddle crs-container crs-text-white crs-padding-32 crs-hide-small">
      <h3>Drake</h3>
      <p><b>Scorpion</b></p> 
    </div>
  </div>

    <div class="crs-container crs-content crs-center crs-padding-64" style="max-width:800px" id="band">
    <h2 class="crs-wide">ALBUMs  CDs  VINYLs</h2>
    <p class="crs-opacity"><i>the soundtrack of your life</i></p>
  </div>
  <!-- The Tour Section -->
       <!-- The Tour Section -->
      <div class="crs-row-padding crs-padding-32" style="margin:0 -16px">
        <div class="crs-third crs-margin-bottom crs-center">
          <img src="poze\awtc.jpeg" alt="New York" style="width:70%;height: 70%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>TRAVIS SCOTT - ASTROWORLD</b></p>
            <p>CD/VINYL</p>
            <p><b>25$</b></p>
            <form action="Media.php" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="merch" value="Merch">Buy Album</button>
            </form>
          </div>
        </div>

        <div class="crs-third crs-margin-bottom crs-center">
          <img src="poze\btt.jpg" alt="Paris" style="width:70%;height: 70%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>TRAVIS SCOTT - BIRDS IN THE TRAP SING MCKNIGHT</b></p>
            <p>CD/VINYL</p>
            <p><b>25$</b></p>
            <form action="Media.php" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="merch" value="Merch">Buy Album</button>
            </form>
          </div>
        </div>

        <div class="crs-third crs-margin-bottom crs-center">
          <img src="poze\jb.jpg" alt="San Francisco" style="width:70%;height: 70%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>JACKBOYS</b></p>
            <p>CD/VINYL</p>
            <p><b>25$</b></p>
            <form action="Media.php" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="merch" value="Merch">Buy Album</button>
            </form>
          </div>
        </div>

          <div class="crs-third crs-margin-bottom crs-center">
          <img src="poze\dr1.jpg" alt="New York" style="width:70%;height: 70%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>DRAKE - TAKE CARE</b></p>
            <p>CD/VINYL</p>
            <p><b>25$</b></p>
            <form action="Media.php" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="merch" value="Merch">Buy Album</button>
            </form>
          </div>
        </div>

        <div class="crs-third crs-margin-bottom crs-center">
          <img src="poze\dr2.jpg" alt="Paris" style="width:70%;height: 70%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>DRAKE - NOTHING WAS THE SAME</b></p>
            <p>CD/VINYL</p>
            <p><b>25$</b></p>
            <form action="Media.php" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="merch" value="Merch">Buy Album</button>
            </form>
          </div>
        </div>

        <div class="crs-third crs-margin-bottom crs-center">
          <img src="poze\sc.jpg" alt="San Francisco" style="width:70%;height: 70%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>DRAKE - SCORPION</b></p>
            <p>CD/VINYL</p>
            <p><b>25$</b></p>
            <form action="Media.php" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="merch" value="Merch">Buy Album</button>
            </form>
          </div>
        </div>

         <div class="crs-third crs-margin-bottom crs-center">
          <img src="poze\jca1.jpg" alt="San Francisco" style="width:70%;height: 70%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>J. COLE - FOREST HILLS DRIVE</b></p>
            <p>CD/VINYL</p>
            <p><b>25$</b></p>
            <form action="Media.php" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="merch" value="Merch">Buy Album</button>
            </form>
          </div>
        </div>

        <div class="crs-third crs-margin-bottom crs-center">
          <img src="poze\kod.jpg" alt="San Francisco" style="width:70%;height: 70%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>J. COLE - KOD</b></p>
            <p>CD/VINYL</p>
            <p><b>25$</b></p>
            <form action="Media.php" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="merch" value="Merch">Buy Album</button>
            </form>
          </div>
        </div>

        <div class="crs-third crs-margin-bottom crs-center">
          <img src="poze\eyes.jpg" alt="San Francisco" style="width:70%;height: 70%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>J. COLE - 4 YOUR EYEZ ONLY</b></p>
            <p>CD/VINYL</p>
            <p><b>25$</b></p>
            <form action="Media.php" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="merch" value="Merch">Buy Album</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  
<!-- End Page Content -->
</div>

<!-- Image of location/map -->
<img src="poze\music.jpg" class="crs-image" style="width:100%">

<!-- Footer -->
<footer class="crs-container crs-padding-64 crs-center crs-opacity crs-light-grey crs-xlarge">
  <i class="fa fa-facebook-official crs-hover-opacity"></i>
  <i class="fa fa-instagram crs-hover-opacity"></i>
  <i class="fa fa-snapchat crs-hover-opacity"></i>
  <i class="fa fa-pinterest-p crs-hover-opacity"></i>
  <i class="fa fa-twitter crs-hover-opacity"></i>
  <i class="fa fa-linkedin crs-hover-opacity"></i>
</footer>

<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
schimbare_poze();

function schimbare_poze() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(schimbare_poze, 4000);    
}

// Used to toggle the menu on small screens when clicking on the menu button
function meniu_drop() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("crs-show") == -1) {
    x.className += " crs-show";
  } else { 
    x.className = x.className.replace(" crs-show", "");
  }
}


</script>

</body>
</html>

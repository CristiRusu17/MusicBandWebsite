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
        $nume = $fetch_info['name'];
        $total = $fetch_info['total'];
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
<title>Merchandise</title>
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
  <div class="crs-bar crs-black crs-card">
    <a class="crs-bar-item crs-button crs-padding-large crs-right" onclick="meniu_drop()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="home.php" class="crs-bar-item crs-button crs-padding-large">HOME</a>
    <a href="home.php" class="crs-bar-item crs-button crs-padding-large">BAND</a>
    <a href="home.php" class="crs-bar-item crs-button crs-padding-large">TOUR</a>
    <a href="home.php" class="crs-bar-item crs-button crs-padding-large">CONTACT</a>
    <a href="Media.php" class="crs-bar-item crs-button crs-padding-large">MEDIA</a>
    <a href="logout-user.php" class="crs-bar-item crs-button crs-padding-large crs-hover-red crs-right">LOGOUT</a>
    <a class="crs-bar-item crs-button crs-padding-large crs-right">COS:<?php echo $total ?>$</a>
    <form action="#" method="POST" autocomplete="">
    <button class="crs-padding-large crs-button crs-right" type="submit" name="plata" value="Plata">PAY</button>
    </form>
  </div>
</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="crs-bar-block crs-black crs-hide crs-top" style="margin-top:46px">
  <a href="" class="crs-bar-item crs-button crs-padding-large" >BAND</a>
  <a href="" class="crs-bar-item crs-button crs-padding-large">TOUR</a>
  <a href="" class="crs-bar-item crs-button crs-padding-large">CONTACT</a>
  <a href="" class="crs-bar-item crs-button crs-padding-large">HOME</a>
  <a href="cssMedia.html" class="crs-bar-item crs-button">MEDIA</a>
</div>

<!-- Page content -->
<div class="crs-content" style="max-width:2000px;margin-top:46px">

  <!-- Automatic Slideshow Images -->
  <div class="mySlides crs-display-container crs-center">
    <img src="poze\cj.jpeg" style="width:100%">
    <div class="crs-display-bottommiddle crs-container crs-text-white crs-padding-32 crs-hide-small">
      <h3>Cactus Jack Merch</h3>
    </div>
  </div>
  <div class="mySlides crs-display-container crs-center">
    <img src="poze\ovo.jpg" style="width:100%">
    <div class="crs-display-bottommiddle crs-container crs-text-white crs-padding-32 crs-hide-small">
      <h3>October's Very Own</h3> 
      <p><b>Started at the bottom, now we're here.</b></p>   
    </div>
  </div>
  <div class="mySlides crs-display-container crs-center">
    <img src="poze\tsa.png" style="width:100%">
    <div class="crs-display-bottommiddle crs-container crs-text-white crs-padding-32 crs-hide-small">
      <h3>Travis Scott's Astroworld</h3> 
      <p><b>Wish you were here</b></p>   
    </div>
  </div>

  <div class="crs-container crs-content crs-center crs-padding-64" style="max-width:800px" id="band">
    <h2 class="crs-wide">THE MERCH</h2>
    <p class="crs-opacity"><i>where you get yourself hyped out</i></p>
  </div>
  <!-- The Tour Section -->
      <div class="crs-row-padding crs-padding-32" style="margin:0 -16px">
        <div class="crs-third crs-margin-bottom crs-center">
          <img src="poze\ovo1.jpg" alt="New York" style="width:100%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>POMPOM SCRIPT T-SHIRT</b></p>
            <p>50$</p>
            <form action="Merch.php" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="merch_shirt" value="Merch">Buy Merch</button>
            </form>
          </div>
        </div>

        <div class="crs-third crs-margin-bottom crs-center">
          <img src="poze\ovo2.jpg" alt="Paris" style="width:100%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>HERITAGE T-SHIRT</b></p>
            <p>50$</p>
            <form action="Merch.php" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="merch_shirt" value="Merch">Buy Merch</button>
            </form>
          </div>
        </div>

        <div class="crs-third crs-margin-bottom crs-center">
          <img src="poze\ovo3.jpg" alt="San Francisco" style="width:100%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>OVO COLLEGIATE LONGSLEEVE T-SHIRT</b></p>
            <p>80$</p>
            <form action="Merch.php" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="merch_hoodie" value="Merch">Buy Merch</button>
            </form>
          </div>
        </div>
        
        <div class="crs-third crs-margin-bottom crs-center" >
          <img src="poze\cj1.jpg" alt="San Francisco" style="width:100%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>CACTUS JACK X MCDO - SESAME WHITE TEE SHIRT</b></p>
            <p>50$</p>
            <form action="Merch.php" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="merch_shirt" value="Merch">Buy Merch</button>
            </form>
          </div>
        </div>

        <div class="crs-third crs-margin-bottom crs-center">
          <img src="poze\cj2.jpg" alt="San Francisco" style="width:100%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>CACTUS JACK X MCDO - DESERVE A BREAK TEE SHIRT</b></p>
            <p>50$</p>
            <form action="Merch.php" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="merch_shirt" value="Merch">Buy Merch</button>
            </form>
          </div>
        </div>


        <div class="crs-third crs-margin-bottom crs-center">
          <img src="poze\cj3.jpg" alt="San Francisco" style="width:100%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>CACTUS JACK - BLACK TEE SHIRT TENET</b></p>
            <p>50$</p>
            <form action="Merch.php" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="merch_shirt" value="Merch">Buy Merch</button>
            </form>
          </div>
        </div>

        <div class="crs-third crs-margin-bottom crs-center">
          <img src="poze\aw1.jpg" alt="San Francisco" style="width:100%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>ASTROWORLD - BLACK TEE</b></p>
            <p>50$</p>
            <form action="Merch.php" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="merch_shirt" value="Merch">Buy Merch</button>
            </form>
          </div>
        </div>

         <div class="crs-third crs-margin-bottom crs-center">
          <img src="poze\aw2.jpg" alt="San Francisco" style="width:100%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>ASTROWORLD - LOOK MOM I CAN FLY HOODIE</b></p>
            <p>80$</p>
            <form action="Merch.php" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="merch_hoodie" value="Merch">Buy Merch</button>
            </form>
          </div>
        </div>

        <div class="crs-third crs-margin-bottom crs-center">
          <img src="poze\aw3.jpg" alt="San Francisco" style="width:100%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>ASTROWORLD - BEYOND BELIEF TEE</b></p>
            <p>50$</p>
            <form action="Merch.php" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="merch_shirt" value="Merch">Buy Merch</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>

<!-- End Page Content -->
</div>

<!-- Image of location/map -->
<img src="poze\ovostore.jpg" class="crs-image" style="width:100%">

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
function myFunction() {
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

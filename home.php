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
                header('Location: user-otp.php');
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
<title>Band</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="cssf1.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
/* latin-ext */
</style>
<body>

<!-- Navbar -->
<div class="crs-top">
  <div class="crs-bar crs-blue crs-card">
    <a class="crs-bar-item crs-button crs-padding-large crs-right" onclick="meniu_drop()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="crs-bar-item crs-button crs-padding-large">HOME</a>
    <a href="#band" class="crs-bar-item crs-button crs-padding-large">BAND</a>
    <a href="#tour" class="crs-bar-item crs-button crs-padding-large">TOUR</a>
    <a href="#contact" class="crs-bar-item crs-button crs-padding-large">CONTACT</a>
    <div class="crs-dropdown-hover">
      <button class="crs-padding-large crs-button" title="More">MORE <i class="fa fa-caret-down"></i></button>     
      <div class="crs-dropdown-content crs-bar-block crs-card-4">
        <a href="Merch.php" class="crs-bar-item crs-button">MERCHANDISE</a>
        <a href="Media.php" class="crs-bar-item crs-button">MEDIA</a>
      </div>
    </div>
    <a href="logout-user.php" class="crs-bar-item crs-button crs-padding-large crs-hover-red crs-right">LOGOUT</a>
    <a class="crs-bar-item crs-button crs-padding-large crs-right">COS:<?php echo $total ?>$</a>
    <form action="#" method="POST" autocomplete="">
    <button class="crs-padding-large crs-button crs-right" type="submit" name="plata" value="Plata">PAY</button>
    </form>
  </div>
</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="crs-bar-block crs-blue crs-hide crs-top" style="margin-top:46px">
  <a href="#band" class="crs-bar-item crs-button crs-padding-large">BAND</a>
  <a href="#tour" class="crs-bar-item crs-button crs-padding-large">TOUR</a>
  <a href="#contact" class="crs-bar-item crs-button crs-padding-large">CONTACT</a>
  <a href="Merch.php" class="crs-bar-item crs-button crs-padding-large">MERCH</a>
</div>

<!-- Page content -->
<div class="crs-content" style="max-width:2000px;max-height:1080px;margin-top:46px">

  <!-- Automatic Slideshow Images -->
  <div class="mySlides crs-display-container crs-center">
    <img src="poze\la.jpg" style="width:100%">
    <div class="crs-display-bottommiddle crs-container crs-text-white crs-padding-32 crs-hide-small">
      <h3>Los Angeles</h3>
      <p><b>Ne-am distrat de minmune in Venice Beach!</b></p>   
    </div>
  </div>
  <div class="mySlides crs-display-container crs-center">
    <img src="poze\ny.jpg" style="width:100%">
    <div class="crs-display-bottommiddle crs-container crs-text-white crs-padding-32 crs-hide-small">
      <h3>New York</h3>
      <p><b>Atmosfera din New York a fost lorem ipsum.</b></p>    
    </div>
  </div>
  <div class="mySlides crs-display-container crs-center">
    <img src="poze\chicago.jpg" style="width:100%">
    <div class="crs-display-bottommiddle crs-container crs-text-white crs-padding-32 crs-hide-small">
      <h3>Chicago</h3>
      <p><b>Multumim, Chicago - O noapte de neuitat.</b></p>    
    </div>
  </div>

  <!-- The Band Section -->
  <div class="crs-container crs-content crs-center crs-padding-64" style="max-width:800px" id="band">
    <h2 class="crs-wide">THE HYPEBEASTS</h2>
    <p class="crs-opacity"><i>by Cristi Rusu</i></p>
    <p class="crs-justify crs-center">Bine ai venit, <?php echo $nume ?> !</p>
     <p class="crs-justify  crs-center">Jacques Berman Webster II, cunoscut sub numele de scenă Travis Scott, este un rapper, compozitor și producător american din Houston, Texas.</p>
      <p class="crs-justify  crs-center">Aubrey Drake Graham cunoscut sub numele de scena Drake, este un rapper, cântăreț, compozitor, producător și actor canadian. Drake inițial a fost recunoscut ca un actor într-o dramă adolescentină, serial de televiziune Degrassi: The Next Generation la începutul anilor 2000.</p>
       <p class="crs-justify  crs-center">Jermaine Lamarr Cole, cunoscut și sub numele de scenă Therapist sau Kill Edward, este un rapper, cântăreț și producător germano-american. Mixtape-ul său de debut a fost The Come Up, lansat în anul 2007.</p>
    <div class="crs-row crs-padding-32">
      <div class="crs-third">
        <p>Drake</p>
        <img src="poze\drake.jpg" class="crs-round crs-margin-bottom" alt="Random Name" style="width:60%">
      </div>
      <div class="crs-third">
        <p>J Cole</p>
        <img src="poze\jcole.jpg" class="crs-round crs-margin-bottom" alt="Random Name" style="width:60%">
      </div>
      <div class="crs-third">
        <p>Travis Scott</p>
        <img src="poze\travis.jpg" class="crs-round" alt="Random Name" style="width:60%">
      </div>
    </div>
  </div>

  <!-- The Tour Section -->
  <div class="crs-black" id="tour">
    <div class="crs-container crs-content crs-padding-64" style="max-width:800px">
      <h2 class="crs-wide crs-center">TOUR DATES</h2>
      <p class="crs-opacity crs-center"><i>Nu uita sa iti rezervi biletele!</i></p><br>

      <ul class="crs-ul crs-border crs-white crs-text-grey">
        <li class="crs-padding">Septembrie <span class="crs-badge crs-right crs-margin-right">Available</span></li>
        <li class="crs-padding">Octombrie <span class="crs-badge crs-right crs-margin-right">Available</span></li>
        <li class="crs-padding">Noiembrie <span class="crs-badge crs-right crs-margin-right">Available</span></li>
      </ul>

      <div class="crs-row-padding crs-padding-32" style="margin:0 -16px">
        <div class="crs-third crs-margin-bottom">
          <img src="poze\newyork.jpg" alt="New York" style="width:100%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>New York</b></p>
            <p class="crs-opacity">Vineri 27 Sept 2021</p>
            <p>Ne vedem in New York!</p>
            <p><b>95$</b></p>
            <form action="#tour" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="ticket_ny" value="Ticket">Cumparare Bilet</button>
            </form>
          </div>
        </div>
        <div class="crs-third crs-margin-bottom">
          <img src="poze\paris.jpg" alt="Paris" style="width:100%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>Paris</b></p>
            <p class="crs-opacity">Sambata 17 Oct 2021</p>
            <p>Ne vedem in Paris!</p>
            <p><b>70$</b></p>
             <form action="#tour" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="ticket_par" value="Ticket">Cumparare Bilet</button>
            </form>
          </div>
        </div>
        <div class="crs-third crs-margin-bottom">
          <img src="poze\sanfran.jpg" alt="San Francisco" style="width:100%" class="crs-hover-opacity">
          <div class="crs-container crs-white">
            <p><b>San Francisco</b></p>
            <p class="crs-opacity">Duminica 22 Noi 2021</p>
            <p>Ne vedem in San Francisco!</p>
            <p><b>55$</b></p>
             <form action="#tour" method="POST" autocomplete="">
            <button class="crs-button crs-black crs-margin-bottom" type="submit" name="ticket_sf" value="Ticket">Cumparare Bilet</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

 
  <!-- The Contact Section -->
  <div class="crs-container crs-content crs-padding-64" style="max-width:800px" id="contact">
    <h2 class="crs-wide crs-center">CONTACT</h2>
    <p class="crs-opacity crs-center"><i>Fan? Lasa-ne parerea ta!</i></p>
    <div class="crs-row crs-padding-32">
      <div class="crs-col m6 crs-large crs-margin-bottom">
        <i class="fa fa-map-marker" style="width:30px"></i> Medias, SB<br>
        <i class="fa fa-phone" style="width:30px"></i> Phone: +40 773 865 812<br>
        <i class="fa fa-envelope" style="width:30px"> </i> Email: cristirusu1709@yahoo.com<br>
      </div>
      <div class="crs-col m6">
        <form action="home.php" method="POST" autocomplete="">
          <div class="crs-row-padding" style="margin:0 -16px 8px -16px">
            <div class="crs-half">
              <input class="crs-input crs-border" type="text" name="name" placeholder="Name" required value="<?php echo $nume ?>">
            </div>
            <div class="crs-half">
              <input class="crs-input crs-border" type="email" name="mail" placeholder="Email" required value="<?php echo $email ?>">
            </div>
          </div>
          <input class="crs-input crs-border" type="text" name="message" placeholder="Message" required name="Message">
          <button class="crs-button crs-black crs-section crs-right" type="submit" name="review" value="Review">SEND</button>
        </form>
      </div>
    </div>
  </div>
  
<!-- End Page Content -->
</div>

<!-- Image of location/map -->
<img src="poze\map.jpg" class="crs-image" style="width:100%">

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
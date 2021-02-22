<?php include_once 'profile.php' ?>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light" style="opacity:0.8;background-color:white">
  <a class="navbar-brand" href="#">
    <img src="/Aamiri/assets/images/logo/AAmiri_logo.png" height="40" width="120">
  </a>
      <!-- search button -->
  <button class="navbar-toggler" type="button" style="border:none;background-color:#f8f9fa;cursor:pointer;position:absolute;right:80px;top:20px;" id="topsearchbutton" onclick="showSearchBar()">
    <i style="font-size:20px;" class="fas fa-search"></i>
  </button>
          <!-- inbox button -->
  <a class="navbar-toggler" style="border:none;background-color:#f8f9fa;cursor:pointer;position:absolute;right:120px;top:20px;" id="topinboxbutton" href="./user/user_inbox.html">
    <i style="font-size:20px;" class="fa fa-envelope"></i>
 </a>
            <!-- hamburger button -->
  <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" onclick="topsearchdiv.style.visibility='hidden'">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/Aamiri/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Aamiri/user/categoryhome.php" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
          Shop
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="openProfileNav()" style="cursor:pointer">Sign in</a>
      </li>

    </ul>
  </div>
  <!-- <div><i class="fas fa-search"></i></div> -->
</nav>

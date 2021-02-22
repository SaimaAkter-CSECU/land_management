  <nav class="navbar navbar-expand-lg ftco_navbar bg-white ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="Land.php" style="font-size: 1.15rem;"><span class="flaticon-auction"></span>DLM System</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="Land.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a id="about_nav" href="#about" class="nav-link">About</a></li>
        <li class="nav-item"><a href="search_land.php" class="nav-link">Land Information</a></li>
        <li class="nav-item"><a href="search_owner.php" class="nav-link">Owner Information</a></li>
        <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
        <li class="nav-item"><a href="dashboard.php" class="nav-link">Dashboard</a></li>
        <li class="nav-item"><a href="index.php" class="nav-link" id="user_logout_button">Logout</a></li>
      </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <script>
    const loc = window.location.pathname;
    console.log(loc);
      
    if(loc == '/' || loc == '/Land.php'){
        document.getElementById('about_nav').setAttribute('href', '#about');
    }
    else{
        document.getElementById('about_nav').setAttribute('href', 'Land.php#about')   
    }

    document.getElementById('user_logout_button').addEventListener('click',function(){
    if(confirm('Are you sure to logout?'))
    {
      $.ajax({
        url: 'php/ui/user/logout.php',
        type: 'POST',
        success: function(resp){
          show_user_login_div();
          user_logout.style.display = 'none';
        }
      });
    }
  });
  </script>


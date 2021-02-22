

<head>
<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 100;
    top: 0;
    right: 0;
    background-color:  #d6cce6;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<div id="mySidenav" class="sidenav" style="z-index:10000">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="card" style="width: 18rem; height:calc(100vh - 80px);margin-left:3px;display:;" id="user_info_card">
   <div class="card-body" id="edit_cardbody">
     <div style="text-align:center;width:150px;">
        <img class="card-img-top" src="../assets/images/users/default.png" style="" alt="Card image cap"/>
     </div>
     <h5 class="card-title"><i class="fa fa-user" style="color:#513977"></i> <span id="user_name_show"> User Name</span></h5>
     <hr>
     <p class="card-text" style="color:#A6B0B7"><i class="fa fa-envelope" style="color:green"></i> Email : <span id="user_email_show">abc@xyz.com</span></p><hr>
     <p class="card-text" style="color:#A6B0B7"><i class="fa fa-phone" style="color:blue"></i>  Contact : <span id="user_contactno_show">01XXXXXXXXX</span></p><hr>
     <!-- <label  class="card-text"style="color:#A6B0B7">Change password:</lebel> -->
     <!-- <input type="password" class="form-control"/> -->
     <!-- <button href="#" class="btn btn-primary btn-block" style="margin-top:35% ;background-color:#513977;color:white;border-color:#513977"><span class="glyphicon glyphicon-edit"></span>Edit Profile</button> -->
     <center id="user_logout">
       <button id="user_logout_button" class="btn btn-default"  style="border:1px solid black;margin-top:2%;color:white;background-color:black">
         <i class="fa fa-power-off" style="color:white"></i>
         Logout
       </button>
     </center>
   </div>
 </div>

 <div class="card" id="user_login_card" style="margin:5px;display:none">
   <div class="card-body" style="padding:10px;">
     <div style="color:#0066ff; margin-bottom:15px">
       You are not logged in. Please login.
     </div>
     <form id="loginform">
       <div class="form-group">
         <label >Username</label>
         <input type="text" class="form-control" id="login_username" aria-describedby="emailHelp" placeholder="Username">
         <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
       </div>
       <div class="form-group">
         <label >Password</label>
         <input type="password" class="form-control" id="login_password" placeholder="Password">
       </div>
       <!-- <div class="form-check">
         <input type="checkbox" class="form-check-input" id="exampleCheck1">
         <label class="form-check-label" for="exampleCheck1">Check me out</label>
       </div> -->
       <div style="text-align:center">
         <button type="submit" class="btn btn-primary" style="background-color:#563d7c">Login</button>
       </div>
       <div style="margin-top:20px;text-align:center">
         <span style="margin-left:15px; color:#0066ff">Not a member?<a style="text-decoration:underline;color:#a41034; font-size:16px;cursor:pointer; margin-left:5px; padding:0" href="../registration.php">Register</a><span>
       </div>
     </form>
   </div>
 </div>
</div>
<!-- <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span> -->

<script type="text/javascript">
function openProfileNav() {
    get_user_info();
    document.getElementById("mySidenav").style.width = "277px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
<script type="text/javascript">


  function get_user_info()
  {
    $.ajax({
      url: 'php/ui/user/get_user_info.php',
      type: 'POST',
      success: function(resp){
        // console.log("m",resp);
        data = JSON.parse(resp);
        if(data.error)
        {
          show_user_login_div();
          // toastr.error(data.message);
          user_logout.style.display = 'none';
        }
        else {
          show_user_info_div();
          user_logout.style.display = 'block';
          user_name_show.innerHTML = data.data.name;
          user_email_show.innerHTML = data.data.email;
          user_contactno_show.innerHTML = data.data.contactno;
        }
        }
    });
  }

  function show_user_info_div()
  {
    user_info_card.style.display = 'block';
    user_login_card.style.display = 'none';
  }

  function show_user_login_div()
  {
    user_info_card.style.display = 'none';
    user_login_card.style.display = 'block';
  }

  document.getElementById('loginform').addEventListener('submit',function(event){
    event.preventDefault();

    var username = document.getElementById('login_username').value;
    var password = document.getElementById('login_password').value;

    $.ajax({
      url: 'php/ui/user/login_a_user.php',
      data:{username:username,password:password},
      type: 'POST',
      success: function(resp){
        // console.log("m",resp);
        data = JSON.parse(resp);
        if(data.error)
        {
          //show_user_login_div();
          toastr.error(data.message);
          user_logout.style.display = 'none';
        }
        else {
          toastr.success(data.message);
          show_user_info_div();
          user_logout.style.display = 'block';
          user_name_show.innerHTML = data.data.name;
          user_email_show.innerHTML = data.data.email;
          user_contactno_show.innerHTML = data.data.contactno;
        }
        }
    });
  });

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

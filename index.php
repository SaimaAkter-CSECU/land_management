
 <!DOCTYPE html>
 <html>
    <?php include_once 'header.php' ?>

    <body>
      <div class="view">
        <img src="assets/images/background/banner4.jpg" class="img-fluid" alt="" style="height: 100vh; width: 100%;">
        <div class="overlay" style="position: absolute; background: #000000; opacity: 0.7; height: 100%; width: 100%; top:0;"></div>
        <div class="d-flex mask align-items-center">
          <div class="col-md-2 col-sm-2"></div>
          <div class="col-md-8 col-sm-8" style="margin: auto;">
            <div style="text-align: center; margin: 30px auto 60px;">
              <h1 class="text-white">Digital Land Management and Ownership Transfer System with Judicial Support</h1>
            </div>
            <div style="margin: 0rem 6rem; padding: 0rem 4rem;">
              <h1 style="color: #ffffff !important; font-size:30px; margin-top:30px; color:#0294b7; font-weight: bold; text-align: center;font-family: 'Kurale';">Login</h1>
              <hr style="border-top: 1px solid #b99566;"> 
              <form class="store-login-form">
                <div class="form-group">
                  <label for="emailid" style="color: #ffffff; ">Email Id</label>
                  <input type="text" class="form-control" id="emailid" aria-describedby="emailid" placeholder="Enter Your Email">
                </div>
                <div class="form-group">
                  <label for="password" style="color: #ffffff; ">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Enter Password">
                </div>
                <div class="form-group d-flex justify-content-center">
                  <button id="loginbtn" class="btn btn-design" type="submit">Login</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-2 col-sm-2"></div>
        </div>
      </div>


      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
      <script src="js/toastr.min.js"></script>

      <script>
        document.getElementById('loginbtn').addEventListener('click', function(e){
          e.preventDefault();
          var userid = document.getElementById("emailid").value;
          var pass = document.getElementById("password").value;

          if(userid.length<1){
            alert("Invalid User-id");
            return;
          }
          else if(pass.length<1){
            alert("Invalid Password");
            return;
          }

          $.ajax({
            type: "POST",
            url: "php/ui/user/store_sessioning.php",
            data: {
              username:userid, password:pass // RASEL, reqwt
            },
            success: function (data) {
              console.log(data);
              var res = $.parseJSON(data);
              if(res.error){
                alert(res.message);
              }else{
                location.href = "Land.php";
              }
            }
          });
        });
      </script>

    </body>
 </html>

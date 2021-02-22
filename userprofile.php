<?php
  $base_path = dirname(__FILE__);
  include_once($base_path."/php/ui/user/checksession.php");
?>

<!DOCTYPE html>
<html>
    <?php include_once 'header.php'; ?>

    <style>
        #card_content{
            margin: 25px;
            min-width: 250px;
            max-width: 900px;
            margin-top: 10px;
            margin-left: 10px;
            margin-right: 10px;
        }

        #card_content:hover{
            box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;
        }

        .info-label{
            color: #3b2a55;
            font-weight: bold;
        }

        .col-4, .col-7{
            padding-left: 0px;
            padding-right: 0px;
        }

        .info-row{
            padding-top: 5px;
        }

        .card-body{
            padding: 5px;
        }

        #userImgDiv{
            text-align: left;
        }

        #userInfoDiv{
            padding-top: 10px;
            min-width: 300px
        }

        @media screen and (max-width:634px) {
            #userImgDiv{
                flex: 100%;
                max-width: 100%;
                text-align: center;
            }

            #userInfoDiv{
                flex: 100%;
                max-width: 100%;
            }
        }

        @media screen and (max-width:385px) {
            #card_content{
                margin: 2px;
                margin-bottom: 25px;
            }
        }

        .card{
            padding-bottom: 10px;
            min-width: 180px;
        }
        .storetext{
            padding: 3px;
            font-size: 1.1rem;
        }

        .storename{
            font-weight: bold;
            font-size: 1.13rem;
        }

        .btn > i{
            padding-left: 5px;
        }

        .col-8{
            padding-left: 0px;
            padding-right: 0px;
        }

        .card:hover{
            box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;
        }
    </style>
<body>

    <div style='text-align:-webkit-center; background: #ffffff;'>
          <div class="" style="text-align:center; margin-bottom:20px;margin-top: 10px;">
            <img style="height:110px" src="../assets/images/logo/logo.png" alt="">
          </div>
            <div id='card_content' class="card" style=''>
                <div class="card-body">
                    <div class="row">
                        <div id='userImgDiv' class="col-sm-5 col-md-5">
                            <img id='userImage' src="" alt="" width='230' height='230' style='border-radius:5px'>
                        </div>
                        <div id='userInfoDiv' class="col-sm-7 col-md-7">
                            <div class="">
                                <h3 style="font-family: 'Charmonman', cursive;">Personal Information</h3>
                                <hr style='margin:0px;color:lightgrey'>
                            </div>
                            <div class='row info-row' style='text-align:-webkit-left;'>
                                <div class='col-4 info-label'>Username:</div>
                                <div class='col-7' id='userid_'></div>
                            </div>
                            <div class='row info-row' style='text-align:-webkit-left;'>
                                <div class='col-4 info-label'>Name:</div>
                                <div class='col-7' id='name_'></div>
                            </div>
                            <div class='row info-row' style='text-align:-webkit-left;'>
                                <div class='col-4 info-label'>User Type:</div>
                                <div class='col-7'  id='usertype_'></div>
                            </div>
                            <div class='row info-row' style='text-align:-webkit-left;'>
                                <div class='col-4 info-label'>Status:</div>
                                <div class='col-7'  id='userstatus_'></div>
                            </div>
                            <div class='row info-row' style='text-align:-webkit-left;'>
                                <div class='col-4 info-label'>Email:</div>
                                <div class='col-7'  id='email_'></div>
                            </div>
                            <div class='row info-row' style='text-align:-webkit-left;'>
                                <div class='col-4 info-label'>Contact No:</div>
                                <div class='col-7'  id='contact_'></div>
                            </div>
                            <div id='editBtn' style='text-align:right' data-toggle='modal' data-target='#infoEditModal'>
                                <button class='btn btn-design' style="margin-top:20px; width: 200px;">
                                    Edit
                                    <i class="far fa-edit"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style='max-width: 900px;margin-right:10px;margin-left:10px;'>
                <h3 style='color: #0294b7;font-weight: bold;'>Stores</h3>
                <hr style='margin:0;color:lightgrey'>
            </div>
            <div id='storelist'>
            </div>
    </div>
        <!-- Modal -->
    <div class="modal fade" id="infoEditModal" tabindex="-1" role="dialog" aria-labelledby="infoEditModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id='infoEditForm'>
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Personal Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- <div class='row info-row' style='text-align:-webkit-left;'>
                            <div class='col-4 info-label'>Username:</div>
                            <input class='col-8' id='useridInput_' type='text'/>
                        </div> -->
                        <div class='row '>
                            <div class='col-4 '>First Name:</div>
                            <input class='col-8' id='firstNameInput_' type='text' required/>
                        </div>
                        <div class='row info-row'>
                            <div class='col-4 '>Last Name:</div>
                            <input class='col-8' id='lastNameInput_' type='text' required/>
                        </div>
                        <div class='row info-row'>
                            <div class='col-4 '>Email:</div>
                            <input class='col-8'  id='emailInput_' type='email' required/>
                        </div>
                        <!-- <div class='row info-row'>
                            <div class='col-4 '>Contact No:</div>
                            <input class='col-8'  id='contactInput_' type='text' required/>
                        </div> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn " data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-design">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <script src="../js/toastr.min.js"></script>
    
    <script>
        var personalInfo;

        load_user_personal_info();
        function load_user_personal_info(){
            $.ajax({
                url: 'php/ui/user/get_user_update_info.php',
                type: 'POST',
                success: function(resp){
                    // console.log('resp->',resp);
                    resp = $.parseJSON(resp);
                    // console.log('info->',resp); 01518100100
                    if(resp.error){

                    }else{
                        // personalInfo = resp.data;
                        personalInfo = resp.storelist[0];
                        show_user_personal_info(personalInfo);
                    }
                }
            });
        }

        function show_user_personal_info(data){
            var img = document.getElementById('userImage');
            if(data.imageurl != '' && data.imageurl != null){
                img.src = '../user/assets/pimages/' + data.imageurl;
            }else{
                img.src = '../user/assets/pimages/default.png';
            }

            document.getElementById('userid_').innerHTML = data.userid;
            document.getElementById('name_').innerHTML = data.ufirstname+' '+data.ulastname;
            document.getElementById('usertype_').innerHTML = "Store Admin";
            document.getElementById('userstatus_').innerHTML = "Active";
            document.getElementById('email_').innerHTML = data.email;
        }

        document.getElementById('editBtn').addEventListener('click', function(event){
            event.preventDefault();

            document.getElementById('firstNameInput_').value = personalInfo.ufirstname;
            document.getElementById('lastNameInput_').value = personalInfo.ulastname;
            document.getElementById('emailInput_').value = personalInfo.email;
            // document.getElementById('contactInput_').value = personalInfo.contactno;

        });

        // get_stores_owned_by_user(storelist);

        $.ajax({
          url: "php/ui/user/get_all_stores_of_a_user.php",
          type: "POST",
          success: function(resp){
            // console.log(resp);
            resp = $.parseJSON(resp);
            // console.log(resp);
            var data = resp.storelist;
            show_stores_owned_by_user(data);
          }
        });

        function show_stores_owned_by_user(data){
            var parentdiv = document.getElementById('storelist');
            parentdiv.innerHTML = "";

            for(k in data){
                var imageurl = "../assets/images/storeimages/" + data[k].storeimage;
                var name = data[k].name;
                var street = data[k].street;
                var city = data[k].city;
                var storeno = data[k].storeno;

                var outdiv = document.createElement('DIV');
                outdiv.className = 'card';
                outdiv.style = 'margin:10px 20px;width:220px; text-align:center;'; 
                // image.width = '180';
                // image.height = '180';

                outdiv.innerHTML =  ` <img src="${imageurl}" width="180" height="180" style="margin: auto;" />
                                        <div class="storetext storename">${data[k].name}</div>
                                        <div class="storetext">${data[k].street}</div>
                                        <div class="storetext">${data[k].city}</div>
                                        <button class="btn btn-design" id="store_+${storeno}" >Enter <i class="fas fa-sign-in-alt"></i></button>
                                        `;

                parentdiv.appendChild(outdiv);

                (function(storeno){
                    document.getElementById(`store_+${storeno}`).addEventListener('click', function(event){
                        // console.log('storeno->', storeno);
                        goStore(storeno);
                    });
                })(storeno);
            }
        }

        function goStore(storeno){
          $.ajax({
            url:"php/ui/user/save_storeno_to_session.php",
            data: {storeno:storeno},
            type: "POST",
            success: function(resp){
              // console.log(resp);
              resp = $.parseJSON(resp);
              // console.log(resp);
              if(resp.error){
                alert("Sorry! The store is not found.");
              }
              else{
                location.href = "storeOrders.php";
              }
            }
          });
        }

        document.getElementById('infoEditForm').addEventListener('submit', function(event){
            event.preventDefault();

            var firstName = document.getElementById('firstNameInput_').value;
            var lastName = document.getElementById('lastNameInput_').value;
            var email = document.getElementById('emailInput_').value;
            var contact = document.getElementById('contactInput_').value;

            if(confirm('Are you sure?')){
                // console.log(firstName,lastName,email,contact);
                $.ajax({
                  url: "php/ui/user/update_store_user_info.php",
                  data: {ufirstname:firstName, ulastname:lastName, email:email, contactno:contact},
                  type: "POST",
                  success: function(resp){
                    // console.log(resp);
                    resp = $.parseJSON(resp);
                    // console.log(resp);
                    if(resp.error){
                      toastr.error(resp.message);
                    }
                    else{
                      $('#infoEditModal').modal('hide');
                      toastr.success(resp.message);
                      load_user_personal_info();
                    }
                  }
                });
            }

        });
    </script>
</body>
</html>

<?php
  $base_path = dirname(__FILE__);
  include_once($base_path."/php/ui/user/checksession.php");
?>

<!DOCTYPE html>
<html>
    <?php include_once 'header.php'; ?>
<body>

    <div class="container">
        <div class="" style="text-align:center; margin-bottom:20px">
            <img style="height:75px" src="../assets/images/logo/logo.png" alt="">
        </div>
        <div id='card_content' class="card">
            <div class="card-body">
                <div class="row">
                    <div id='userImgDiv' class="col-sm-4 col-md-4">
                        <img id='userImage' src="" alt="" class="img-fluid" style='border-radius:5px'>
                    </div>
                    <div id='userInfoDiv' class="col-sm-8 col-md-8">
                        <div>
                            <h3 class="user-text-head">User Information</h3>
                            <hr style='margin:5px 0px 20px 0px;'>
                        </div>
                        <div class='d-flex user-text'>
                            <div class='col-3 info-label'>Name:</div>
                            <div class='col-9' id='name_'></div>
                        </div>
                        <div class='d-flex user-text'>
                            <div class='col-3 info-label'>Email:</div>
                            <div class='col-9'  id='email_'></div>
                        </div>
                        <div class='d-flex user-text'>
                            <div class='col-3 info-label'>Contact No:</div>
                            <div class='col-9'  id='userid_'></div>
                        </div>
                        <div class='d-flex user-text'>
                            <div class='col-3 info-label'>User Type:</div>
                            <div class='col-9'  id='usertype_'></div>
                        </div>
                        <div class='d-flex user-text'>
                            <div class='col-3 info-label'>Status:</div>
                            <div class='col-9'  id='userstatus_'></div>
                        </div>
                        <div>
                            <button class='btn btn-design btn-edit' id='editBtn' data-toggle='modal' data-target='#infoEditModal'>
                                Update <i class="far fa-edit" style="margin-left:8px"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style='margin: 40px 10px 20px;'>
            <h3 style='font-family: kurale; font-size: 35px; color: #0294b7;font-weight: bold; text-align:center;'>Stores</h3>
            <hr style='margin:0;'>
        </div>
        <div id='storelist'>
        </div>
    </div>
        <!-- Modal -->
    <div class="modal fade" id="infoEditModal" tabindex="-1" role="dialog" aria-labelledby="infoEditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id='infoEditForm'>
                    <div class="modal-header">
                        <h5 class="modal-title">Update User Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container update-form">
                            <div class='d-flex form-group'>
                                <div class='col-2 update-form-text'>First Name:</div>
                                <input class='col-10 update-form-text' id='firstNameInput_' type='text' required/>
                            </div>
                            <div class='d-flex form-group'>
                                <div class='col-2 update-form-text'>Last Name:</div>
                                <input class='col-10 update-form-text' id='lastNameInput_' type='text' required/>
                            </div>
                            <div class='d-flex form-group'>
                                <div class='col-2 update-form-text'>Email:</div>
                                <input class='col-10 update-form-text'  id='emailInput_' type='email' required/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-edit" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-edit">Update</button>
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
        // = {
        //     userid: 'nhimran',
        //     ufirstname: 'Nurul',
        //     ulastname: 'Huda',
        //     ucattitle: 'storeuser',
        //     userstatustitle: 'Active',
        //     email: 'nhimran@agamilabs.com',
        //     contactno: '01888867891',
        //     imageurl: ''
        // }

        // var storelist = [
        //     {
        //         storeno: 1,
        //         name: 'Bheuli Pharmacy',
        //         street: 'Hathazari',
        //         city: 'Chittagong',
        //         storeimage: '2.jpg'
        //     },
        //     {
        //         storeno: 2,
        //         name: 'Aamiri',
        //         street: 'Sorishabari Road, Madanhat',
        //         city: 'Chittagong',
        //         storeimage: '4.jpg'
        //     }
        //
        // ];

        load_user_personal_info();
        function load_user_personal_info(){
            $.ajax({
                url: 'php/ui/user/get_user_update_info.php',
                type: 'POST',
                success: function(resp){
                    resp = $.parseJSON(resp);
                    if(resp.error){
                    }else{
                        personalInfo = resp.storelist[0];
                        show_user_personal_info(personalInfo);
                    }
                }
            });
        }

        //show_user_personal_info(personalInfo);

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
        });

        // get_stores_owned_by_user(storelist);

        $.ajax({
          url: "php/ui/user/get_all_stores_of_a_user.php",
          type: "POST",
          success: function(resp){
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
                outdiv.innerHTML =  `   <img src="${imageurl}" width="180" height="180" class="img-fluid" style="margin: auto;" />
                                        <div class="storetext storename">${data[k].name}</div>
                                        <div class="storetext">${data[k].street}</div>
                                        <div class="storetext">${data[k].city}</div>
                                        <button class="btn btn-design" id="store_+${storeno}" >Enter <i class="fas fa-sign-in-alt" style="margin-left:8px"></i></button>
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

            if(confirm('Are you sure?')){
                console.log(firstName,lastName,email);
                $.ajax({
                  url: "php/ui/user/update_store_user_info.php",
                  data: {ufirstname:firstName, ulastname:lastName, email:email},
                  type: "POST",
                  success: function(resp){
                    resp = $.parseJSON(resp);
                    console.log(resp);
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

<?php
  $base_path = dirname(__FILE__);
  include_once($base_path."/php/ui/user/checksession.php");
  $storeno =  $_SESSION['storeno'];
?>

<!DOCTYPE html>
<html>
  <?php include_once 'header.php' ?>
<!-- <head>
  <style>
    #img-upload_store_modal{
        width: 100%;
        max-height: 400px;
    }
  </style>
</head> -->
  <body>

    <div class="wrapper">
      <?php include_once 'sidebar.php' ?>
      <div id="content">
        <?php include_once 'navbar.php' ?>

        <div class="pagecontent">

            <div class="row">

              <div class="col-sm-5" id="storeimage" style="display: flex; align-items: center;">  <!--image-->
              </div>

              <div class="col-sm-7"  >
                <div class="d-flex align-items-center" style="margin-bottom: 30px;">
                  <div class="brand-info-head">Brand Information</div>
                  <button class="btn updateStoreSettingsBtn" type="button" data-toggle="modal" data-target="#updateStoreModal">
                    <i class="fa fa-edit"></i>
                  </button>
                </div>

                <div id="storeinformation">
                  <div class="d-flex">
                    <div class="col-md-3">
                      Brand Name
                    </div>
                    <div class="col-md-9">
                      : <span id="name"></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="col-md-3">
                      Address
                    </div>
                    <div class="col-md-9">
                      : <span id="address"></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="col-md-3">
                      City
                    </div>
                    <div class="col-md-9">
                      : <span id="city"></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="col-md-3">
                      Contact No
                    </div>
                    <div class="col-md-9">
                      : <span id="contactno"></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="col-md-3">
                      Opening
                    </div>
                    <div class="col-md-9">
                      : <span id="opening"></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="col-md-3">
                      Closing
                    </div>
                    <div class="col-md-9">
                      : <span id="closing"></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="col-md-3">
                      Weekend 1
                    </div>
                    <div class="col-md-9">
                      : <span id="weekend1"></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="col-md-3">
                      Weekend 2
                    </div>
                    <div class="col-md-9">
                      : <span id="weekend2"></span>
                    </div>
                  </div>
                  <div class="row" style="display: none">
                    <div class="col-md-3">
                      Post Delivery
                    </div>
                    <div class="col-md-9">
                      : <span id="postDelivery"></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="col-md-3" style="padding-right:0; font-size: 17px; ">
                      Shipping Charge
                    </div>
                    <div class="col-md-9">
                      : <span id="shippingcost"></span>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <!--table-->
            <div style="margin-top:30px; padding:0" class='col-12' >
              <div style="margin-bottom: 60px;">
                <div style="font-size: 35px; font-weight: 600; margin-bottom: 20px; color: #0294b7; text-align: center; font-family: 'Kurale';">Brand Users:
                  <i id="useradd" class="fa fa-user-plus" title="Add Brand User"></i>
                </div
              </div>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">User Name</th>
                      <th scope="col">Contact No</th>
                      <th scope="col">Role</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="storeUserTable">

                  </tbody>
                </table>
              </div>  <!-- table responsive div -->
            </div>

            <!-- Update Store Modal -->
            <div id="updateStoreModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="updateStoreModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <form name="Form_For_updateStoreModal" id="Form_For_updateStoreModal">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="updateStoreModalLabel">Edit Brand Information</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body" style="font-size: 18px; color: #8c8c8c;">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="storename_Edit">Brand Name</label>
                          <input type="text" class="form-control" id="storename_Edit" name="storename_Edit" value="" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="storecontact_Edit">Contact No</label>
                          <input type="text" class="form-control" id="storecontact_Edit" value="" required>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="storestreet_Edit">Address</label>
                          <input type="text" class="form-control" id="storestreet_Edit" value="" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="storecity_Edit">City</label>
                          <input type="text" class="form-control" id="storecity_Edit" value="" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="postdelivary_Edit">Post Delivary</label>
                          <select id="postdelivary_Edit" class="form-control" name="">
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-row" style="margin-top:20px">
                        <div class="form-group col-md-6">
                          <label for="storeopen_Edit">Opening</label>
                          <input type="time" class="form-control" id="storeopen_Edit" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="storeclose_Edit">Closing</label>
                          <input type="time" class="form-control" id="storeclose_Edit" placeholder="">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="weekend1_Edit">Weekend 1</label>
                          <select id="weekend1_Edit" class="form-control" >
                            <option value="SAT">Saturday</option>
                            <option value="SUN">Sunday</option>
                            <option value="MON">Monday</option>
                            <option value="TUE">Tueday</option>
                            <option value="WED">Wednesday</option>
                            <option value="THU">Thursday</option>
                            <option value="FRI">Friday</option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="weekend2_Edit">Weekend 2</label>
                          <select id="weekend2_Edit" class="form-control">
                            <option value="SAT">Saturday</option>
                            <option value="SUN">Sunday</option>
                            <option value="MON">Monday</option>
                            <option value="TUE">Tueday</option>
                            <option value="WED">Wednesday</option>
                            <option value="THU">Thursday</option>
                            <option value="FRI">Friday</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="homedelivaryrate_Edit">Shipping Charge</label>
                          <input type="number" value="10" step="0.01" class="form-control" id="homedelivaryrate_Edit" placeholder="" required>
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-design">Update Brand Information</button>
                    </div>
                  </div>
                  </div>
              </form>
              </div>
            </div>

            <!-- Update STORE IMAGE MODAL -->
            <div id="updateStoreImageModal" class="modal" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <form name="Form_For_updateStoreImageModal" id="Form_For_updateStoreImageModal">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 id="storeImgModalTitle" class="modal-title">Brand Image</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="">Update Brand Image</label>
                          <div class="input-group">
                              <span class="input-group-btn" style="border:1px solid #ced4da; border-radius:5px 0px 0px 0px; background-color:#e9ecef; cursor:pointer;">
                                <span class="btn-default btn-file">
                                  <label style="padding:5px 10px; margin:0">Browse… </label>
                                  <input type="file" id="imgInput_store_modal" onchange="validateAndEncodeImageFileAsURL(this)">
                                </span>
                              </span>
                              <input type="text" style="padding-left:10px" class="form-control" style="padding:0" readonly>
                          </div>
                          <img id='img-upload_store_modal' class="img-fluid" />
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button  type="submit" class="btn btn-design">Update Brand Image</button>
                    </div>
                  </div>
              </form>
              </div>
            </div>

            <!-- Add User Modal -->
            <div id="addusermodal" class="modal" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <form name="Form_For_addusermodal" id="Form_For_addusermodal">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add User</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color:white" aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">

                      <div class="row">
                        <div class="col-4">User Mobile No: </div>
                        <div class="form-group col-8">
                          <input id="usernameinput" class="input-group form-control" placeholder="Enter User Mobile No" type="number" name="" value="" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-4">Role: </div>
                        <div class="form-group col-8">
                          <select id="roleselect" class="form-control" >

                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-design">SAVE User</button>
                    </div>
                  </div>
              </form>
              </div>
            </div>

            <!--edit user role modal-->
            <div id="editusermodal" class="modal" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-lg" role="document">
                <form name="Form_For_editusermodal" id="Form_For_editusermodal">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit User Role</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body" style="font-size: 18px">

                      <div class="row">
                        <div class="col-3">User Name : </div>
                        <div class="form-group col-9">
                          <input id="storeusername" class="input-group form-control" type="text" name="" value="" disabled>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-3">User Contact No : </div>
                        <div class="form-group col-9">
                          <input id="storeusercontactno" class="input-group form-control" type="text" name="" value="" disabled>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-3">Role : </div>
                        <div class="form-group col-9">
                          <select id="inputRolename" class="form-control" >

                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button  type="submit" class="btn btn-design">Update User Role</button>
                    </div>
                  </div>
              </form>
              </div>
            </div>


          </div> <!-- end of pagecontent-->
        </div>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
      <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
      <script src="../js/toastr.min.js"></script>

      <script type="text/javascript">
          $(document).ready(function () {
              $('#sidebarCollapse').on('click', function () {
                  $('#sidebar').toggleClass('active');
                  $('.navbar').toggleClass('navactive');
                  $('.pagecontent').toggleClass('pagecontentactive');

              });
          });
      </script>

      <script>
        var url = window.location.pathname;
        var filename = url.substring(url.lastIndexOf('/')+1);
        $("#sidebar a[href='"+filename+"']").parent().toggleClass('sidebar-active');
        //localStorage.setItem('cuad_applicant_lastpage',filename);
      </script>

      <!-- upload image -->
      <script type="text/javascript">
        var imageChanged = false;

        $(document).ready( function() {
          $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
              label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
              input.trigger('fileselect', [label]);
            });

          $('.btn-file :file').on('fileselect', function(event, label) {

              var input = $(this).parents('.input-group').find(':text'),
                  log = label;

              if( input.length ) {
                  input.val(log);
              } else {
                  if( log ) alert(log);
              }
          });

          function readURL(input, id) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function (e) {
                      $('#img-upload_'+id).attr('src', e.target.result);
                  }

                  reader.readAsDataURL(input.files[0]);
              }
          }


          $("#imgInput_store_modal").change(function(){
              imageChanged = true;
              readURL(this, 'store_modal');
          });
        });

        var imageEncoded;
        var bool = false;

        function validateAndEncodeImageFileAsURL(element) {
            //debugger;
            var validExtensions = ['jpg','png','jpeg','gif'];
            var fileName = element.files[0].name;
            var file = element.files[0];
            var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
            //console.log(fileNameExt.toLowerCase());
            if ($.inArray(fileNameExt.toLowerCase(), validExtensions) == -1) {
                element.type = ''
                element.type = 'file'
                //$('#user_img').attr('src',"");
                toastr.warning("Only these file types are accepted : "+validExtensions.join(', '));
            }
            else
            {
                if (element.files && element.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        if(e.target.result.length<10){
                            //console.log("Not Valid");
                            bool = false;
                        }else{
                            //console.log('RESULT', e.target.result);

                            bool = true;
                            imageEncoded = e.target.result;
                        }

                        //$('#user_img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            }
        }

      </script>

      <script type="text/javascript">
        function editUserRoleModal(userno,username,contactno,roleid){
          $('#editusermodal').modal('show');
          document.getElementById("inputRolename").dataset.userno = userno;
          document.getElementById("storeusername").value=username;
          document.getElementById("storeusercontactno").value=contactno;
          document.getElementById("inputRolename").value=roleid;
        }

        document.getElementById("Form_For_editusermodal").addEventListener("submit",function(event){
          event.preventDefault();
          var roleid = document.getElementById('inputRolename').value;
          var userno = document.getElementById("inputRolename").dataset.userno;
          Update_user_role_button(roleid,userno);
        });
      </script>

      <script>
        loadStoreInfo();
        function loadStoreInfo(){
            $.ajax({
              type: 'POST',
              url: "php/ui/store/get_a_store_info_store.php",
              success: function(resp){
                localStorage.setItem('storeproducts',resp);
                resp = $.parseJSON(resp);
                console.log(resp);
                  var storeInfo=resp.store_info;
                  var image="../"+storeInfo[0].storeimage;
                  // console.log(image);

                  load_image_for_store(image);

                  document.getElementById("name").innerHTML = `${storeInfo[0].name}`;
                  document.getElementById("address").innerHTML = `${storeInfo[0].street}`;
                  document.getElementById("city").innerHTML = `${storeInfo[0].city}`;
                  document.getElementById("contactno").innerHTML = `${storeInfo[0].contactno}`;
                  document.getElementById("opening").innerHTML = `${storeInfo[0].opening}`;
                  document.getElementById("closing").innerHTML = `${storeInfo[0].closing}`;
                  document.getElementById("weekend1").innerHTML = `${storeInfo[0].weekend1}`;
                  document.getElementById("shippingcost").innerHTML = `${storeInfo[0].homedelivaryrate}`;
                  
                  if(storeInfo[0].weekend2 === null){
                    document.getElementById("weekend2").innerHTML= '';
                  }
                  else{
                    document.getElementById("weekend2").innerHTML= `${storeInfo[0].weekend2}`;
                  }

                  if(storeInfo[0].postdelivary==1){
                    document.getElementById("postDelivery").innerHTML= 'Yes';
                  }
                  else{
                    document.getElementById("postDelivery").innerHTML= 'No';
                  }
                  addStoreInfoToModal(storeInfo);
                }

          });
        }

        function addStoreInfoToModal(storeInfo){
          document.getElementById('storename_Edit').value = storeInfo[0].name;
          document.getElementById('storename_Edit').dataset.storeno = storeInfo[0].storeno;
          document.getElementById('storestreet_Edit').value = storeInfo[0].street;
          document.getElementById('storecontact_Edit').value = storeInfo[0].contactno;
          document.getElementById('storecity_Edit').value = storeInfo[0].city;
          document.getElementById('storeopen_Edit').value = storeInfo[0].opening;
          document.getElementById('storeclose_Edit').value = storeInfo[0].closing;
          document.getElementById('weekend1_Edit').value = storeInfo[0].weekend1;
          document.getElementById('weekend2_Edit').value = storeInfo[0].weekend2;
          document.getElementById('homedelivaryrate_Edit').value = storeInfo[0].homedelivaryrate;
          document.getElementById('postdelivary_Edit').value = storeInfo[0].postdelivary;
        }

        function load_image_for_store(image){
          console.log(image);
          var  storeimageid=document.getElementById("storeimage");
          var storeimage =document.createElement('img');
          storeimage.classList.add("img-fluid");
          storeimage.style.cursor = 'pointer';
          storeimage.style.padding = '20px';
          storeimage.src=image;
          storeimage.id = 'mystoreimage';
          storeimageid.appendChild(storeimage);
        }

        document.getElementById('storeimage').addEventListener('click', function(){
          $('#updateStoreImageModal').modal('show');
          document.getElementById('img-upload_store_modal').src = document.getElementById('mystoreimage').src;
        });

        document.getElementById('Form_For_updateStoreImageModal').addEventListener('submit', function(event){
          event.preventDefault();
          var img  = document.getElementById('img-upload_store_modal').src;

          if(imageChanged == true){
            $.ajax({
              url: 'php/ui/store/update_image_of_a_store.php',
              data: {storeimage:img},
              type: 'POST',
              dataType: 'json',
              success: function(result){
                if(result.error == true){
                  toastr.error(result.message);
                }
                else{
                  toastr.success(result.message);
                  $('#updateStoreImageModal').modal('hide');
                  // searchStore();
                  location.reload(true);
                }
              }
            });
          }
        });
      </script>

      <!-- Add User -->
      <script type="text/javascript">
        document.getElementById('useradd').addEventListener('click', function(){
          $('#addusermodal').modal('show');
        });

        document.getElementById('Form_For_addusermodal').addEventListener('submit', function(event){
          event.preventDefault();
          var userid = document.getElementById('usernameinput').value;
          var roleid  = document.getElementById('roleselect').value;
          $.ajax({
            url: 'php/ui/store/insert_a_store_user.php',
            data: {userid:userid, roleid:roleid},
            type: 'POST',
            dataType: 'json',
            success: function(resp){
              if(resp.error == true){
                toastr.error(resp.message);
              }
              else {
                toastr.success(resp.message);
                $('#addusermodal').modal('hide');
                searchUsers();
              }
            }
          });
        });

        document.getElementById('Form_For_updateStoreModal').addEventListener('submit', function(event){
          event.preventDefault();
          var name = document.getElementById('storename_Edit').value;
          var storeno = document.getElementById('storename_Edit').dataset.storeno;
          var storecontact = document.getElementById('storecontact_Edit').value;
          var street = document.getElementById('storestreet_Edit').value;
          var city = document.getElementById('storecity_Edit').value ;
          var open = document.getElementById('storeopen_Edit').value;
          var close = document.getElementById('storeclose_Edit').value;
          var wkend1 = document.getElementById('weekend1_Edit').value;
          var wkend2 = document.getElementById('weekend2_Edit').value;
          var homerate = document.getElementById('homedelivaryrate_Edit').value;
          var post = document.getElementById('postdelivary_Edit').value;

          console.log(name,storeno,street,city,open,close,wkend1,wkend2,homerate,status,post);
          $.ajax({
            url: 'php/ui/store/update_a_store_store.php',
            data: {storeno:storeno, storename:name, storecontact:storecontact, street:street, city:city,
            openingtime:open, closingtime:close, weekend1:wkend1, weekend2:wkend2, homedelivaryrate:homerate, postdelivary:post},
            type: 'POST',
            dataType: 'json',
            success: function(result){
              //console.log(result);
              if(result.error == true){
                toastr.error(result.message);
              }
              else{
                toastr.success(result.message);
                $('#updateStoreModal').modal('hide');
                loadStoreInfo();
                location.reload(true);
              }
            }
          });
        });
      </script>

      <!--table-->
      <script>

        searchUsers();
        function searchUsers(){
          $.ajax({
            type: 'POST',
            url: "php/ui/store/get_all_users_of_a_store.php",
            data: {},
            dataType:'json',
            success: function(resp){
              // console.log(resp);
              if(resp.error==true){
                toastr.warning(resp.message);
              }
              else{
                var totalstoreuser=resp.store_users.length;
                var store_user_data = resp.store_users;
                console.log(store_user_data)
                $('#storeUserTable tr').remove();
                for(i=0;i<totalstoreuser;i++)
                create_table_store_user(store_user_data,i);
              }
            }
          });
        }

          function create_table_store_user(data,i){
            var tablebodyid = document.getElementById("storeUserTable");
            var  row=tablebodyid.insertRow();
            var cell1, cell2, cell3, cell4, cell5;
            cell1=row.insertCell(0);
            cell2=row.insertCell(1);
            cell3=row.insertCell(2);
            cell4=row.insertCell(3);
            cell5=row.insertCell(4);
            createElement_single_cell(cell1,parseInt(i)+1);
            createElement_single_cell(cell2,data[i].firstname+' '+data[i].lastname);
            createElement_single_cell(cell3,data[i].contactno);
            createElement_single_cell(cell4,data[i].rolename);
        
            edit_delete_action_cell(row, cell5,data[i].userno,data[i].firstname+' '+data[i].lastname, data[i].contactno, data[i].roleid);
          }


          function createElement_single_cell(cell,data){
            var cellno=cell;
            cellno.innerHTML=data;
          }


        function edit_delete_action_cell(row,cell5,userno,username,contactno, roleid){
          var actionCell=cell5;
          var edit=document.createElement("i");
          edit.id="edit"+i;
          edit.className = 'editBtn fa fa-edit'; 
          actionCell.appendChild(edit);

          var deleteuser = document.createElement("i");
          deleteuser.id="delete"+i;
          deleteuser.className = 'deleteBtn fa fa-times';
          deleteuser.style.cursor="pointer";
          actionCell.appendChild(deleteuser);

          (function(row,i,userno){
            document.getElementById("delete"+i).addEventListener("click",function(){
              var isconfirmed = confirm('Are You Sure to Delete '+username+'?');
              if(isconfirmed) deleteSingleRow(row,i,userno);
            });
          }(row,i,userno));

            (function(userno,username){
                document.getElementById("edit"+i).addEventListener("click",function(){
                editUserRoleModal(userno,username,contactno, roleid);
                });
              }(userno,username, roleid));
            }

          //delete a User
          function deleteSingleRow(row,i,userno){
            $.ajax({
            type: 'POST',
            url: "php/ui/store/delete_a_store_user.php",
            data:{userno:userno},
            dataType:'json',
            success: function(resp){

              if (!resp.error) {
                row.parentNode.removeChild(row);
                toastr.success(resp.message);
              }
              else{
                toastr.error(resp.message);
              }
            }
          });
          }

          /*edit role modal er select er  option */
          $.ajax({
              type: 'POST',
              url: "php/ui/settings/get_role.php",

              dataType:'json',
              success: function(resp){
              //console.log(resp);
              if(resp.error == true){
                toastr.warning(resp.message);
              }
              else{
                var totaloption=resp.role.length;
                var data = resp.role;

                for(var i=0;i<totaloption;i++)
                  create_user_role_option(data,i);

                for(i in data){
                  var roleselect = document.getElementById('roleselect');
                  var option = document.createElement('option');
                  option.innerHTML = data[i].rolename;
                  option.value = data[i].roleid;
                  roleselect.appendChild(option);
                }
              }
            }
          });

          function create_user_role_option(data,i){
            var roleoptionid = document.getElementById("inputRolename");
            var roleoption =document.createElement('option');
            roleoption.text=data[i].rolename;
            roleoption.value=data[i].roleid;
            roleoptionid.appendChild(roleoption);
          }

          function Update_user_role_button(roleid,userno){
            $.ajax({
            type: 'POST',
            url: "php/ui/store/update_role_of_a_store_user.php",
            data:{roleid:roleid,userno:userno},

            dataType:'json',
            success: function(resp){

              if (!resp.error) {
                toastr.success(resp.message);
                $('#editusermodal').modal('hide');
                searchUsers();
              }
              else{
                toastr.error(resp.message);
              }
              }
            });
          }
      </script>

  </body>

</html>

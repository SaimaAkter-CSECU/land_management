<?php
  include_once("php/ui/user/checksession.php");
  $userno =  $_SESSION['userno'];
?>

<!DOCTYPE html>
<html>
    <?php include_once 'header.php' ?>

  <body>
    <?php include_once 'navbar.php' ?>
    <!-- <script type="text/javascript"> console.log('dashboard');</script> -->
    <section class="dashboard-section">
      <div class="d-flex">
        <div class="col-md-3 bg-dark" style="height: 100vh">
          <div class="container">
            <div class="d-flex align-items-start">
              <div class="nav flex-column nav-pills me-3 mt-5 w-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
                <button class="nav-link" id="v-pills-land-tab" data-toggle="pill" data-target="#v-pills-land" type="button" role="tab" aria-controls="v-pills-land" aria-selected="true">Add Land Info</button>
                <button class="nav-link" id="v-pills-owner-tab" data-toggle="pill" data-target="#v-pills-owner" type="button" role="tab" aria-controls="v-pills-owner" aria-selected="true">Add Owner Info</button>                
                <button class="nav-link" id="v-pills-transaction-tab" data-toggle="pill" data-target="#v-pills-transaction" type="button" role="tab" aria-controls="v-pills-transaction" aria-selected="true">Land Transaction</button>

                <button class="nav-link" id="v-pills-profile-tab" data-toggle="pill" data-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">View Profile</button>
                <button class="nav-link" id="v-pills-update-tab" data-toggle="pill" data-target="#v-pills-update" type="button" role="tab" aria-controls="v-pills-update" aria-selected="false">Update Profile</button>

                <button class="nav-link" id="v-pills-add-user-tab" data-toggle="pill" data-target="#v-pills-add-user" type="button" role="tab" aria-controls="v-pills-add-user" aria-selected="false">Add User</button>
                <button class="nav-link" id="v-pills-update-user-tab" data-toggle="pill" data-target="#v-pills-update-user" type="button" role="tab" aria-controls="v-pills-update-user" aria-selected="false">Update User</button>
                <button class="nav-link" id="v-pills-delete-user-tab" data-toggle="pill" data-target="#v-pills-delete-user" type="button" role="tab" aria-controls="v-pills-delete-user" aria-selected="false">Delete User</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9 bg-white" style="height: 100vh">
          <div class="container mt-5">
            <div class="tab-content" id="v-pills-tabContent">

              <!-- Dashboard Design -->
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="container">
                  <div class="row mb-5">
                    <div class="col-md-3">
                      <div class="card card-counter primary">
                        <i class="fa fa-code-fork"></i>
                        <span class="count-numbers">12</span>
                        <span class="count-name">Admins</span>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="card card-counter danger">
                        <i class="fa fa-ticket"></i>
                        <span class="count-numbers">1557599</span>
                        <span class="count-name">Land Owners</span>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="card card-counter success">
                        <i class="fa fa-database"></i>
                        <span class="count-numbers">579</span>
                        <span class="count-name">Transaction</span>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="card card-counter info">
                        <i class="fa fa-users"></i>
                        <span class="count-numbers">35</span>
                        <span class="count-name">Users</span>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-5">
                    <div class="col-md-3">
                      <div class="card card-counter primary">
                        <i class="fa fa-code-plus"></i>
                        <span class="count-name">Add Land Info</span>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="card card-counter primary">
                        <i class="fa fa-edit"></i>
                        <span class="count-name">Update Land Info</span>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="card card-counter danger">
                        <i class="fa fa-plus"></i>
                        <span class="count-name">Add Owner Info</span>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="card card-counter success">
                        <i class="fa fa-database"></i>
                        <span class="count-name">Land Transaction</span>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="card card-counter info">
                        <i class="fa fa-users"></i>
                        <span class="count-name">User</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade show" id="v-pills-land" role="tabpanel" aria-labelledby="v-pills-land-tab">
                <div class="mb-5">
                  <h1 style="text-align:center; font-family: 'Kurale'; color: #b99566;">Add Land Information</h1>
                  <div class="mb-3 row">
                    <label for="add_land_division" class="col-sm-2 col-form-label">Division</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="add_land_division"> 

                      </select>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="add_land_district" class="col-sm-2 col-form-label">District</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="add_land_district"> 

                      </select>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="add_land_thana" class="col-sm-2 col-form-label">Thana</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="add_land_thana"> 
                      </select>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="add_land_sheet" class="col-sm-2 col-form-label">Sheet No</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="add_land_sheet" placeholder="Sheet No">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="add_land_mouza" class="col-sm-2 col-form-label">Mouza No</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="add_land_mouza" placeholder="Mouza No">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="add_land_daag" class="col-sm-2 col-form-label">Daag No</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="add_land_daag" placeholder="Daag No">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="add_land_type" class="col-sm-2 col-form-label">Land Type</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="add_land_type" placeholder="Land Type">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="add_land_area" class="col-sm-2 col-form-label">Land Area</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="add_land_area" placeholder="Total Land Area">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="add_land_mouzamap" class="col-sm-2 col-form-label">Mouza Map</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="add_land_mouzamap" >
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="add_land_deed" class="col-sm-2 col-form-label">Land Deed</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="add_land_deed" >
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="add_land_khatiyan" class="col-sm-2 col-form-label">Khatiyan</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="add_land_khatiyan" >
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="add_land_mutation" class="col-sm-2 col-form-label">Mutation</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="add_land_mutation" >
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="number_of_owner" class="col-sm-2 col-form-label">No. of Owners</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="number_of_owner" min="1" onChange="getOwner()" placeholder="Total No. of Land Owners">
                    </div>
                  </div>
                  <div id="add_land_owner">
                  </div>
                  <!-- 
                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Owner National ID</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="staticEmail" placeholder="Owner National Id">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Owner Portion</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="staticEmail" placeholder="Owner Portion">
                    </div>
                  </div> 
                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Total Land Area of Owner</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="staticEmail" placeholder="Total Land Area of Owner">
                    </div>
                  </div>
                  -->
                  <div class="mb-3 row d-flex mt-3 justify-content-center m-auto">
                    <button type="submit" id="add_land_info_btn" class="btn btn-design">Add Land Information</button>
                  </div>
                </div>
                <div style="height:5rem;"></div>
              </div>

              <!-- Owner Information -->
              <div class="tab-pane fade show" id="v-pills-owner" role="tabpanel" aria-labelledby="v-pills-owner-tab">
                <div class="container">
                  <form id="addOwnerForm" class="mb-5 pb-5">
                    <h1 style="text-align:center; font-family: 'Kurale'; color: #b99566;">Add Owner Info</h1>

                    <div class="mb-3 row">
                      <label for="add_owner_name" class="col-sm-2 col-form-label">Owner Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_owner_name" placeholder="Owner Name" required>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="add_owner_father_name" class="col-sm-2 col-form-label">Father Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_owner_father_name" placeholder="Father Name" required>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="add_owner_mother_name" class="col-sm-2 col-form-label">Mother Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_owner_mother_name" placeholder="Mother Name" required>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="add_owner_spouse_name" class="col-sm-2 col-form-label">Spouse Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_owner_spouse_name" placeholder="Spouse Name" required>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="add_owner_email" class="col-sm-2 col-form-label">Owner Email Id</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_owner_email" placeholder="Email Id" required>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="add_owner_contact_no" class="col-sm-2 col-form-label">Owner Contact No</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_owner_contact_no" placeholder="Owner Contact No" required>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="add_owner_birthdate" class="col-sm-2 col-form-label">Owner Birth Date</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" id="add_owner_birthdate" required>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="add_owner_gender" class="col-sm-2 col-form-label">Gender</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="add_owner_gender" required> 
                        </select>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="add_owner_religion" class="col-sm-2 col-form-label">Religion</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="add_owner_religion" required> 
                          <option value="1">Islam</option>
                          <option value="2">Hindu</option>
                          <option value="3">Other</option>
                        </select>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="add_owner_nid" class="col-sm-2 col-form-label">National Id No</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_owner_nid">
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="add_owner_nid_copy" class="col-sm-2 col-form-label">National Id Card</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" id="add_owner_nid_copy" required>
                      </div>
                    </div>

                    <h5 class="color mt-5">Present Address: </h5>
                    <div class="mb-3 row">
                      <label for="add_owner_present_division" class="col-sm-2 col-form-label">Division</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="add_owner_present_division"> 
                        </select>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="add_owner_present_district" class="col-sm-2 col-form-label">District</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="add_owner_present_district"> 
                        </select>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="add_owner_present_thana" class="col-sm-2 col-form-label">Thana</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="add_owner_present_thana"> 
                          <option value="1">Badda</option>
                          <option value="2">Chattogram</option>
                          <option value="3">Other</option>
                        </select>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="add_owner_present_address" class="col-sm-2 col-form-label">Address</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_owner_present_address" placeholder="Present Address" required>
                      </div>
                    </div>

                    <h5 class="color mt-5">Permanent Address: </h5>
                    <div class="mb-3 row">
                      <label for="add_owner_permanent_division" class="col-sm-2 col-form-label">Division</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="add_owner_permanent_division"> 
                        </select>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="add_owner_permanent_district" class="col-sm-2 col-form-label">District</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="add_owner_permanent_district"> 
                        </select>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="add_owner_permanent_thana" class="col-sm-2 col-form-label">Thana</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="add_owner_permanent_thana"> 
                        </select>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="add_owner_permanent_address" class="col-sm-2 col-form-label">Address</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="add_owner_permanent_address" placeholder="Permanent Address" required>
                      </div>
                    </div>
                    <div class="mb-3 row d-flex mt-3 justify-content-center m-auto">
                      <button type="submit" id="add_owner_btn" class="btn btn-design">Add Owner Information</button>
                    </div>

                  </form>
                  <div style="height:5rem;"></div>
                </div>
              </div>

              <!-- Transaction Information -->
              <div class="tab-pane fade show" id="v-pills-transaction" role="tabpanel" aria-labelledby="v-pills-transaction-tab">
                <form id="addTransactionForm" class="mb-5">
                  <h1 style="text-align:center; font-family: 'Kurale'; color: #b99566;"> Land Transaction Information</h1>

                  <h5 class="color pl-3 mt-3">Select Land Information</h5>
                  <div class="mb-3 row">
                    <label for="transaction_division" class="col-sm-2 col-form-label">Division</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="transaction_division"> 
                      </select>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="transaction_district" class="col-sm-2 col-form-label">District</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="transaction_district"> 
                      </select>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="transaction_thana" class="col-sm-2 col-form-label">Thana</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="transaction_thana"> 
                      </select>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="transaction_sheet" class="col-sm-2 col-form-label">Sheet No</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="transaction_sheet" placeholder="Sheet No">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="transaction_mouza" class="col-sm-2 col-form-label">Mouza No</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="transaction_mouza" placeholder="Mouza No">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="transaction_daag" class="col-sm-2 col-form-label">Daag No</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="transaction_daag" placeholder="Daag No">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="transaction_seller_nid" class="col-sm-2 col-form-label">Owner NID</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="transaction_seller_nid" placeholder="Current Owner NID No">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="transaction_type" class="col-sm-2 col-form-label">Types of Transaction</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="transaction_type" onChange="transaction_type_check()"> 
                      </select>
                    </div>
                  </div>

                  <div id="buyer_information" display="block">
                    <div class="mb-3 row">
                      <label for="transaction_number_of_owner" class="col-sm-2 col-form-label">No. of Owners</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" id="transaction_number_of_owner" min="1" onChange="getNewOwner()" placeholder="Total No. of Land Owners">
                      </div>
                    </div>
                    <div id="add_transaction_land_owner">
                    </div>
                  </div>
                  

                  <div id="successors_div" style="display: none;">

                    <h6 class="color mt-5">Determine Elligible Sucessors</h6> 
                    <div class="container d-flex justify-content-around mt-3 mb-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                        <label class="form-check-label" for="inlineCheckbox1">Husband</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                        <label class="form-check-label" for="inlineCheckbox2">Wife</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                        <label class="form-check-label" for="inlineCheckbox1">Son (Alive)</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                        <label class="form-check-label" for="inlineCheckbox2">Son (dead)</label>
                      </div>
                    </div>
                    <div class="container d-flex justify-content-around mt-3 mb-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                        <label class="form-check-label" for="inlineCheckbox1">Daughter (Alive)</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                        <label class="form-check-label" for="inlineCheckbox2">Daughter (Dead)</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                        <label class="form-check-label" for="inlineCheckbox1">Father</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                        <label class="form-check-label" for="inlineCheckbox2">Mother</label>
                      </div>
                    </div>
                    <div class="container d-flex justify-content-around mt-3 mb-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                        <label class="form-check-label" for="inlineCheckbox1">Grand Father (Paternal)</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                        <label class="form-check-label" for="inlineCheckbox2">Grand Mother (Paternal)</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                        <label class="form-check-label" for="inlineCheckbox1">Grand Mother (Maternal)</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                        <label class="form-check-label" for="inlineCheckbox2">Brother</label>
                      </div>
                    </div>

                    <div class="container d-flex justify-content-around mt-3 mb-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                        <label class="form-check-label" for="inlineCheckbox1">Sister</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                        <label class="form-check-label" for="inlineCheckbox2">Consanguine Brother</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                        <label class="form-check-label" for="inlineCheckbox1">Consanguine Sister</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                        <label class="form-check-label" for="inlineCheckbox2">Uterine Brother</label>
                      </div>
                    </div>
                    <div class="container d-flex justify-content-around mt-3 mb-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                        <label class="form-check-label" for="inlineCheckbox1">Uterine Sister</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                        <label class="form-check-label" for="inlineCheckbox1">Brother's Son</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                        <label class="form-check-label" for="inlineCheckbox2">Consanguine Brother's Son</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                        <label class="form-check-label" for="inlineCheckbox2">'Brother's Grandson</label>
                      </div>
                    </div>
                    <div class="container d-flex justify-content-around mt-3 mb-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                        <label class="form-check-label" for="inlineCheckbox1">Consanguine Brother's Grandson</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                        <label class="form-check-label" for="inlineCheckbox1">Paternal Uncle</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                        <label class="form-check-label" for="inlineCheckbox2">Paternal Uncle's Son</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                        <label class="form-check-label" for="inlineCheckbox2">Consanguine Uncle </label>
                      </div>
                    </div>
                    <div class="container d-flex justify-content-around mt-3 mb-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                        <label class="form-check-label" for="inlineCheckbox1">Consanguine Uncle's Son</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                        <label class="form-check-label" for="inlineCheckbox1">Paternal Uncle's Son's Son</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                        <label class="form-check-label" for="inlineCheckbox2">Consanguine Paternal Uncle's Son's Son</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                        <label class="form-check-label" for="inlineCheckbox2">Paternal Uncle's Son's Grnadson </label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                        <label class="form-check-label" for="inlineCheckbox2">Consanguine Uncle's Son's Grnadson </label>
                      </div>
                    </div>
                  </div>

                  <h5 class="color pl-3 mt-5">Upload Documents</h5>
                  <div class="mb-3 row">
                    <label for="transaction_khatiyan_no" class="col-sm-2 col-form-label">Khatiyan No</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="transaction_khatiyan_no" placeholder="Khatiyan No">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="transaction_khatiyan_deed" class="col-sm-2 col-form-label">Khatiyan Deed</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="transaction_khatiyan_deed">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="transaction_mutation_no" class="col-sm-2 col-form-label">Mutation No</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="transaction_mutation_no" placeholder="Mutation No">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="transaction_mutation_deed" class="col-sm-2 col-form-label">Mutation Deed</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="transaction_mutation_deed">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="transaction_land_deed" class="col-sm-2 col-form-label">Land Deed</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="transaction_land_deed">
                    </div>
                  </div>

                  <div class="mb-3 row d-flex mt-3 justify-content-center m-auto">
                    <button type="submit" class="btn btn-design" id="add_transaction_btn" >Add Transaction Information</button>
                  </div>
                </form>
                <div style="height:5rem;"></div>
              </div>

              <!-- View Profile Details -->
              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="container">
                  <div class="d-flex">
                    <div class="col-md-3">
                      <img src="assets/images/users/default.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-9">
                      <h1 style="text-align:center; font-family: 'Kurale'; color: #b99566;">User Profile</h1>
                      <table class="table table-hovered table-borderless m-auto w-55">
                        <tbody>
                          <tr>
                            <td>Name:</td>
                            <td id="user_name"></td>
                          </tr>
                          <tr>
                            <td>User Role:</td>
                            <td id="user_role"></td>
                          </tr>
                          <tr>
                            <td>Email:</td>
                            <td id="user_email"></td>
                          </tr>
                          <tr>
                            <td>Contact No:</td>
                            <td id="user_contact_no"></td>
                          </tr>
                          <tr>
                            <td>Institution:</td>
                            <td id="user_institution"></td>
                          </tr>
                          <tr>
                            <td>Designation:</td>
                            <td id="user_designation"></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Update Profile Details -->
              <div class="tab-pane fade" id="v-pills-update" role="tabpanel" aria-labelledby="v-pills-update-tab">
                <div class="container">
                  <div class="d-flex">
                    <div class="col-md-3">
                      <img src="assets/images/users/default.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-9 mb-5">
                      <h1 style="text-align:center; font-family: 'Kurale'; color: #b99566;">Update Profile</h1>
                      <form id="updateProfileForm" class="pb-5">  
                        <div class="form-group row">
                          <label for="user_name" class="col-sm-2 col-form-label col-form-label-sm">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="update_user_name" placeholder="Enter Your Name" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="user_email" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control form-control-sm" id="update_user_email" placeholder="Enter Your Email" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="user_contact_no" class="col-sm-2 col-form-label col-form-label-sm">Contact No</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control form-control-sm" id="update_user_contact_no" placeholder="Enter Contact No" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="user_password" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control form-control-sm" id="update_user_password" placeholder="Enter Password" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="user_password" class="col-sm-2 col-form-label col-form-label-sm">Select Role</label>
                          <div class="col-sm-10">
                            <select name="update_user_role" id="update_user_role" class="form-control form-select">
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="user_institution" class="col-sm-2 col-form-label col-form-label-sm">Institution</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="update_user_institution" placeholder="Enter Institution Name" v>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="user_designation" class="col-sm-2 col-form-label col-form-label-sm">Designation</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="update_user_designation" placeholder="Enter Designation" v>
                          </div>
                        </div>
                        <div class="form-group row mt-3 pb-5">
                          <button type="submit" class="m-auto mb-5 btn btn-design" id="user_update_btn">Update Information</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Add New User -->
              <div class="tab-pane fade" id="v-pills-add-user" role="tabpanel" aria-labelledby="v-pills-add-user-tab">
                <div class="container mb-5">
                  <div class="d-flex">
                    <div class="col-md-3">
                      <img src="assets/images/users/default.png" class="img-thumbnail rounded-circle img-fluid" alt="">
                    </div>
                    <div class="col-md-9">
                      <h1 style="text-align:center; font-family: 'Kurale'; color: #b99566;">Add New User</h1>
                      <form id="addUserForm" class="pb-5">  
                        <div class="form-group row">
                          <label for="add_user_name" class="col-sm-2 col-form-label col-form-label-sm">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="add_user_name" placeholder="Enter Your Name" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="add_user_email" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control form-control-sm" id="add_user_email" placeholder="Enter Your Email" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="add_user_contact_no" class="col-sm-2 col-form-label col-form-label-sm">Contact No</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control form-control-sm" id="add_user_contact_no" placeholder="Enter Contact No" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="add_user_password" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control form-control-sm" id="add_user_password" placeholder="Enter Password" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="add_user_role" class="col-sm-2 col-form-label col-form-label-sm">Select Role</label>
                          <div class="col-sm-10">
                            <select name="add_user_role" id="add_user_role" class="form-control form-select">
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="add_user_institution" class="col-sm-2 col-form-label col-form-label-sm">Institution</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="add_user_institution" placeholder="Enter Institution Name" v>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="add_user_designation" class="col-sm-2 col-form-label col-form-label-sm">Designation</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="add_user_designation" placeholder="Enter Designation" v>
                          </div>
                        </div>
                        <div class="form-group row mt-3 pb-5">
                          <button type="submit" class="mb-5 btn btn-design" id="user_add_btn">Add New User</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="v-pills-update-user" role="tabpanel" aria-labelledby="v-pills-update-user-tab">
                <div class="container">
                  <div class="d-flex">
                    <div class="col-md-3">
                      <img src="assets/images/users/default.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-9">
                      <h1 style="text-align:center; font-family: 'Kurale'; color: #b99566;">Update Profile</h1>
                      <!-- <table class="table table-hovered table-borderless m-auto" style="width: 60%;">
                        <tbody>
                          <tr>
                            <td>Name:</td>
                            <td>
                              <input type="text" id="update_user_name">
                            </td>
                          </tr>
                          <tr>
                            <td>User Role:</td>
                            <td>
                              <select name="update_user_role" id="update_user_role" class="w-100 form-select">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>Email:</td>
                            <td>
                              <input type="text" id="update_user_email">
                            </td>
                          </tr>
                          <tr>
                            <td>Password:</td>
                            <td>
                              <input type="password" id="update_user_password">
                            </td>
                          </tr>
                          <tr>
                            <td>Contact No:</td>
                            <td>
                              <input type="text" id="update_user_contact_no">
                            </td>
                          </tr>
                          <tr>
                            <td>Institution:</td>
                            <td>
                              <input type="text" id="update_user_institution">
                            </td>
                          </tr>
                          <tr>
                            <td>Designation:</td>
                            <td>
                              <input type="text" id="update_user_designation">
                            </td>
                          </tr>
                          <tr>
                            <td col-span="2" class="m-auto">
                              <button class="btn btn-design" id="user_update_btn">Update Information</button>
                            </td>
                          </tr>
                        </tbody>
                      </table> -->
                    </div>
                  </div>
                </div>
              </div>

              <!-- Delete User -->
              <div class="tab-pane fade" id="v-pills-delete-user" role="tabpanel" aria-labelledby="v-pills-delete-user-tab">
                <div class="container pb-5">
                  <div class="d-flex row mb-5">
                    <div class="col-md-12">
                      <h1 style="text-align:center; font-family: 'Kurale'; color: #b99566;">Delete User Profile</h1>
                      <table class="table table-striped table-hover" id="user_table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>User Name </th>
                            <th>Email</th>
                            <th>Contact No</th>
                            <th>Institution</th>
                            <th>Designation</th> 
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody id="user_table_body"></tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  
    <!-- Footer Section   -->
    <footer class="ftco-footer ftco-bg-dark ftco-section" style="padding: 1rem 0rem 0.2rem 0rem !important; position: fixed; left:0; right:0; bottom:0; ">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <p>
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is Developed By <i class="icon-laptop" aria-hidden="true" style="margin-left: 0.5rem;"></i> <a href="https://www.facebook.com/saima.akter.716" target="_blank"><span style="font-weight:bold;">Saima</span></a>
            </p>
          </div>
        </div>
      </div>
    </footer>
    
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <script src="js/toastr.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <!-- <script src="js/jquery.timepicker.min.js"></script> -->
    <script src="js/scrollax.min.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
    <!-- <script src="js/google-map.js"></script> -->
    <script src="js/main.js"></script>

    <script>
      userInfo(); 
      load_division();
      load_district();
      load_thana();
      load_user_role(); 
      load_all_user(); 
      load_gender(); 
      load_transaction_type();
      // load_religion(); 

      function userInfo(){
        $.ajax({
          url: "php/ui/land/get_user_info.php",
          type: "POST",
          success: function(resp){
            // console.log(resp);
            resp = $.parseJSON(resp);
            console.log('user', resp);
            if(resp.error){
              toastr.error(resp.message);
              // document.getElementById('land_information_section').style.display = 'none';
            }
            else{
              setDashboardOptions(resp.data); 
              load_user_info(resp.data.userno);
            }
          }
        });
      }

      function load_user_role(){
        $.ajax({
          url: "php/ui/land/get_all_user_role.php",
          type: "POST",
          success: function(resp){
            // console.log(resp);
            resp = $.parseJSON(resp);
            console.log('user role', resp);
            const role = resp.role; 
            if(resp.error){
              toastr.error(resp.message);
            }
            else{
              document.getElementById('update_user_role').innerHTML = '';
              for(const i in role){
                document.getElementById('update_user_role').innerHTML +=
                  `<option value="${role[i].role_id}">${role[i].role_name}</option>`;

                document.getElementById('add_user_role').innerHTML +=
                  `<option value="${role[i].role_id}">${role[i].role_name}</option>`;
                  
              }
            }
          }
        });
      }

      function setDashboardOptions(user_role){
        const role = parseInt(user_role.user_role_id); 
        console.log('role ', role);
        if(role == 2){
          document.getElementById('v-pills-land-tab').style.display = 'none';
          document.getElementById('v-pills-owner-tab').style.display = 'none';
          document.getElementById('v-pills-transaction-tab').style.display = 'none';
          document.getElementById('v-pills-add-user-tab').style.display = 'none';
          document.getElementById('v-pills-update-user-tab').style.display = 'none';
          document.getElementById('v-pills-delete-user-tab').style.display = 'none';

          document.getElementById("update_user_role").disabled = true;
        }
      }

      function load_all_user(){
        // console.log("Loading");
        $.ajax({
          url: "php/ui/user/get_all_user.php",
          type: "POST",
          success: function(resp){
            // console.log(resp);
            resp = $.parseJSON(resp);
            console.log('user', resp);
            const role = resp.role; 
            if(resp.error){
              toastr.error(resp.message);
            }
            else{
              const userList = resp.userList;
              // console.log('userList', userList);
              document.getElementById('user_table_body').innerHTML = '';
              for(const i in userList){
                document.getElementById('user_table_body').innerHTML +=
                `
                  <tr>
                    <td>${parseInt(i) + 1}</td>
                    <td>${userList[i].user_name}</td>
                    <td>${userList[i].user_email}</td>
                    <td>${userList[i].user_mobile_no}</td>
                    <td>${userList[i].user_institution}</td>
                    <td>${userList[i].user_designation}</td>
                    <td><i class="fa fa-times deleteBtn" id="delete_user_${userList[i].user_id}"></i></td>
                  </tr>
                `;
                  
                document.getElementById(`delete_user_${userList[i].user_id}`).addEventListener('click', function(){
                  console.log('clicked');
                  const user_id = userList[i].user_id; 
                  console.log(user_id); 
                  $.ajax({
                    url: "php/ui/user/delete_an_user_info.php",
                    data: {user_id:user_id},
                    type: "POST",
                    success: function(resp){
                      resp = $.parseJSON(resp);
                      console.log(resp);
                      if(resp.error){
                        toastr.error(resp.message);
                      }
                      else{
                        console.log('user deleted'); 
                        // document.getElementById('addUserForm').reset(); 
                        load_all_user(); 
                        toastr.success(resp.message);
                      }
                    }
                  });
                });
              }
            }
          }
        });
      }

      function load_division(){
          $.ajax({
              url: 'php/ui/land/get_all_division.php',
              type: 'POST',
              success: function(resp){
                  resp = $.parseJSON(resp);
                  console.log(resp); 
                  if(resp.error){
                  }
                  else{
                    const division = resp.division; 
                    document.getElementById('add_land_division').innerHTML = ''; 
                    document.getElementById('add_owner_present_division').innerHTML = ''; 
                    document.getElementById('add_owner_permanent_division').innerHTML = ''; 
                    document.getElementById('transaction_division').innerHTML = '';
                    // console.log(division); 
                    for(const i in division){
                      // console.log(division[i]);
                      document.getElementById('add_land_division').innerHTML += 
                        `<option value="${division[i].division_id}">${division[i].division_name}</option>`; 

                      document.getElementById('add_owner_present_division').innerHTML += 
                        `<option value="${division[i].division_id}">${division[i].division_name}</option>`;

                      document.getElementById('add_owner_permanent_division').innerHTML += 
                        `<option value="${division[i].division_id}">${division[i].division_name}</option>`; 

                      document.getElementById('transaction_division').innerHTML += 
                          `<option value="${division[i].division_id}">${division[i].division_name}</option>`; 
                    }
                  }
              }
          });
      }
      function load_district(){
          $.ajax({
              url: 'php/ui/land/get_all_district.php',
              type: 'POST',
              success: function(resp){
                  resp = $.parseJSON(resp);
                  console.log(resp); 
                  if(resp.error){
                  }
                  else{
                    const district = resp.district; 
                    document.getElementById('add_land_district').innerHTML = '';
                    document.getElementById('add_owner_present_district').innerHTML = '';
                    document.getElementById('add_owner_permanent_district').innerHTML = '';
                    document.getElementById('transaction_district').innerHTML = '';
                    // console.log(division); 
                    for(const i in district){
                      // console.log(division[i]);
                      document.getElementById('add_land_district').innerHTML += 
                        `<option value="${district[i].district_id}">${district[i].district_name}</option>`; 

                      document.getElementById('add_owner_present_district').innerHTML += 
                        `<option value="${district[i].district_id}">${district[i].district_name}</option>`; 

                      document.getElementById('add_owner_permanent_district').innerHTML += 
                        `<option value="${district[i].district_id}">${district[i].district_name}</option>`;

                      document.getElementById('transaction_district').innerHTML += 
                        `<option value="${district[i].district_id}">${district[i].district_name}</option>`; 
                    }
                  }
              }
          });
      }
      function load_thana(){
          $.ajax({
              url: 'php/ui/land/get_all_thana.php',
              type: 'POST',
              success: function(resp){
                  resp = $.parseJSON(resp);
                  console.log(resp); 
                  if(resp.error){
                  }
                  else{
                    const thana = resp.thana; 
                    document.getElementById('add_land_thana').innerHTML =''; 
                    document.getElementById('add_owner_present_thana').innerHTML =''; 
                    document.getElementById('add_owner_permanent_thana').innerHTML =''; 
                    document.getElementById('transaction_thana').innerHTML = '';
                    console.log(thana); 
                    for(const i in thana){
                      // console.log(division[i]);
                      document.getElementById('add_land_thana').innerHTML += 
                        `<option value="${thana[i].thana_id}">${thana[i].thana_name}</option>`; 
                      
                      document.getElementById('add_owner_present_thana').innerHTML  += 
                        `<option value="${thana[i].thana_id}">${thana[i].thana_name}</option>`; 

                      document.getElementById('add_owner_permanent_thana').innerHTML  += 
                        `<option value="${thana[i].thana_id}">${thana[i].thana_name}</option>`; 

                      document.getElementById('transaction_thana').innerHTML += 
                        `<option value="${thana[i].thana_id}">${thana[i].thana_name}</option>`; 
                    }
                  }
              }
          });
      }

      function load_gender(){
          $.ajax({
              url: 'php/ui/user/get_all_gender.php',
              type: 'POST',
              success: function(resp){
                  resp = $.parseJSON(resp);
                  console.log(resp); 
                  if(resp.error){
                  }
                  else{
                    const gender = resp.gender; 
                    document.getElementById('add_owner_gender').innerHTML =''; 
                    console.log(gender); 
                    for(const i in gender){
                      document.getElementById('add_owner_gender').innerHTML += 
                        `<option value="${gender[i].gender_id}">${gender[i].gender_name}</option>`; 
                    }
                  }
              }
          });
      }

      function load_transaction_type(){
        $.ajax({
          url: "php/ui/land/get_all_transaction_type.php",
          type: "POST",
          success: function(resp){
            // console.log(resp);
            resp = $.parseJSON(resp);
            console.log('user transactionType', resp);
            const transactionType = resp.transactionType; 
            if(resp.error){
              toastr.error(resp.message);
            }
            else{
              document.getElementById('transaction_type').innerHTML = '';
              for(const i in transactionType){
                document.getElementById('transaction_type').innerHTML +=
                  `<option value="${transactionType[i].transaction_type_id}">${transactionType[i].transaction_type_name}</option>`;
                  
              }
            }
          }
        });
      }

      function getOwner(){
        document.getElementById('add_land_owner').innerHTML= ''; 
        const no = parseInt(document.getElementById('number_of_owner').value); 
        console.log(typeof no);
        for(let owner_count = 1; owner_count <= no; owner_count++){
          document.getElementById('add_land_owner').innerHTML += 
                  `<div class="text-bold mb-3 row mt-3">Owner - ${owner_count}</div>
                  <div class="mb-3 row">
                    <label for="owner_nid_${owner_count}" class="col-sm-2 col-form-label">Owner National ID</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="owner_nid_${owner_count}" placeholder="Owner National Id">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="owner_portion_${owner_count}" class="col-sm-2 col-form-label">Owner Portion</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="owner_portion_${owner_count}" placeholder="Owner Portion">
                    </div>
                  </div> 
                  <div class="mb-3 row">
                    <label for="owner_land_area_${owner_count}" class="col-sm-2 col-form-label">Total Land Area of Owner</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="owner_land_area_${owner_count}" placeholder="Total Land Area of Owner">
                    </div>
                  </div>`; 
        }
      }

      function getNewOwner(){
        document.getElementById('add_transaction_land_owner').innerHTML= ''; 
        const no = parseInt(document.getElementById('transaction_number_of_owner').value); 
        console.log(typeof no);
        for(let buyer_count = 1; buyer_count <= no; buyer_count++){
          document.getElementById('add_transaction_land_owner').innerHTML += 
                  `<div class="text-bold mb-3 row mt-3" style="font-size:1.4rem; font-weight:500; color:#b99566;"> Buyer - ${buyer_count}</div>
                  <div class="mb-3 row">
                    <label for="transaction_buyer_nid_${buyer_count}" class="col-sm-2 col-form-label">Buyer National ID</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="transaction_buyer_nid_${buyer_count}" placeholder="Buyer National Id">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="transaction_buyer_portion_${buyer_count}" class="col-sm-2 col-form-label">Buyer Portion</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="transaction_buyer_portion_${buyer_count}" placeholder="Buyer Portion">
                    </div>
                  </div> 
                  <div class="mb-3 row">
                    <label for="transaction_buyer_land_area_${buyer_count}" class="col-sm-2 col-form-label">Total Land Area of Buyer</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="transaction_buyer_land_area_${buyer_count}" placeholder="Total Land Area of Buyer">
                    </div>
                  </div>`; 
        }
      }

      function load_user_info(user_id){
        console.log(user_id);
        $.ajax({
          url: "php/ui/land/get_user_all_info.php",
          data: {user_id:user_id},
          type: "POST",
          success: function(resp){
            resp = $.parseJSON(resp);
            console.log(resp);
            if(resp.error){
              toastr.error(resp.message);
              // document.getElementById('land_information_section').style.display = 'none';
            }
            else{
              const userInfo = resp.userInfo;
              document.getElementById('user_name').innerHTML = `${userInfo[0].user_name}`;
              document.getElementById('user_email').innerHTML = `${userInfo[0].user_email}`;
              document.getElementById('user_contact_no').innerHTML = `${userInfo[0].user_mobile_no}`;
              document.getElementById('user_institution').innerHTML = `${userInfo[0].user_institution}`;
              document.getElementById('user_designation').innerHTML = `${userInfo[0].user_designation}`;
              document.getElementById('user_role').innerHTML = `${userInfo[0].role_name}`;

              document.getElementById('update_user_name').value = `${userInfo[0].user_name}`;
              document.getElementById('update_user_email').value = `${userInfo[0].user_email}`;
              document.getElementById('update_user_contact_no').value = `${userInfo[0].user_mobile_no}`;
              document.getElementById('update_user_institution').value = `${userInfo[0].user_institution}`;
              document.getElementById('update_user_designation').value = `${userInfo[0].user_designation}`;
              // document.getElementById('update_user_password').value = `${userInfo[0].user_password}`;
              document.getElementById('update_user_role').value = `${userInfo[0].user_role_id}`;
            }
          }
        });
      }

      function transaction_type_check(){
        const transaction_type = document.getElementById('transaction_type').value;  
        console.log(transaction_type); 
        console.log(typeof transaction_type); 
        if(transaction_type == 4){
          document.getElementById('successors_div').style.display = 'block'; 
          document.getElementById('buyer_information').style.display = 'none'; 
        }
        else{
          document.getElementById('buyer_information').style.display = 'block'; 
          document.getElementById('successors_div').style.display = 'none'; 
        }
      }

      // console.log('clicked');
      document.getElementById('add_land_info_btn').addEventListener('click', function(event){
        event.preventDefault();
        console.log('clicked');
        const div = document.getElementById('add_land_division').value; 
        const dist = document.getElementById('add_land_district').value;
        const thana = document.getElementById('add_land_thana').value; 
        const sheet = document.getElementById('add_land_sheet').value;
        const mouza = document.getElementById('add_land_mouza').value;
        const daag = document.getElementById('add_land_daag').value; 
        const total_land_area = document.getElementById('add_land_area').value; 
        const land_type = document.getElementById('add_land_type').value; 
        const number_of_owner = document.getElementById('number_of_owner').value; 

        console.log(div, dist, thana, sheet, mouza, daag, number_of_owner, total_land_area, land_type); 
        $.ajax({
          url: "php/ui/land/add_land_info.php",
          data: {div:div, dist:dist, thana:thana, sheet:sheet, mouza:mouza, daag:daag, land_type:land_type, total_land_area:total_land_area},
          type: "POST",
          success: function(resp){
            // console.log(resp);
            resp = $.parseJSON(resp);
            console.log(resp);
            if(resp.error){
              toastr.error(resp.message);
              // document.getElementById('land_information_section').style.display = 'none';
            }
            else{
              // load_land_info(resp);
            }
          }
        });
      });

      document.getElementById('user_update_btn').addEventListener('click', function(event){
        event.preventDefault();
        console.log('clicked');
        const name = document.getElementById('update_user_name').value; 
        const email = document.getElementById('update_user_email').value;
        const password = document.getElementById('update_user_password').value; 
        const contactno = document.getElementById('update_user_contact_no').value;
        const institute = document.getElementById('update_user_institution').value;
        const designation = document.getElementById('update_user_designation').value; 
        const role = document.getElementById('update_user_role').value; 

        console.log(name, email, password, contactno, institute, designation, role); 
        $.ajax({
          url: "php/ui/user/user_update_profile.php",
          data: {name:name, email:email, password:password, contactno:contactno, institute:institute, designation:designation, role:role},
          type: "POST",
          success: function(resp){
            resp = $.parseJSON(resp);
            console.log(resp);
            if(resp.error){
              toastr.error(resp.message);
            }
            else{
              console.log('Update ', resp);
              document.getElementById('updateProfileForm').reset(); 
              console.log(resp);
              userInfo();
              console.log(resp);
              toastr.success(resp.message);
            }
          }
        }); 
          // password_hash($new_password,PASSWORD_DEFAULT)
      });

      document.getElementById('addUserForm').addEventListener('submit', function(event){
        event.preventDefault();
        console.log('clicked');
        const name = document.getElementById('add_user_name').value; 
        const email = document.getElementById('add_user_email').value;
        const password = document.getElementById('add_user_password').value; 
        const contactno = document.getElementById('add_user_contact_no').value;
        const institute = document.getElementById('add_user_institution').value;
        const designation = document.getElementById('add_user_designation').value; 
        const role = document.getElementById('add_user_role').value; 

        console.log(name, email, password, contactno, institute, designation, role); 
        $.ajax({
          url: "php/ui/user/add_user_info.php",
          data: {name:name, email:email, password:password, contactno:contactno, institute:institute, designation:designation, role:role},
          type: "POST",
          success: function(resp){
            resp = $.parseJSON(resp);
            console.log(resp);
            if(resp.error){
              toastr.error(resp.message);
            }
            else{
              console.log('user add'); 
              document.getElementById('addUserForm').reset(); 
              toastr.success(resp.message);
            }
          }
        }); 
          // password_hash($new_password,PASSWORD_DEFAULT)
      });

      document.getElementById('addOwnerForm').addEventListener('submit', function(event){
        event.preventDefault();
        console.log('clicked');
        const owner_name = document.getElementById('add_owner_name').value; 
        const owner_father_name = document.getElementById('add_owner_father_name').value;
        const owner_mother_name = document.getElementById('add_owner_mother_name').value; 
        const owner_spouse_name = document.getElementById('add_owner_spouse_name').value; 
        const owner_email = document.getElementById('add_owner_email').value;
        const owner_contactno = document.getElementById('add_owner_contact_no').value;
        const owner_birthdate = document.getElementById('add_owner_birthdate').value;
        const owner_nid = document.getElementById('add_owner_nid').value;
        const owner_gender = document.getElementById('add_owner_gender').value;
        const owner_religion = document.getElementById('add_owner_religion').value; 

        const owner_present_division = document.getElementById('add_owner_present_division').value;
        const owner_present_district = document.getElementById('add_owner_present_district').value;
        const owner_present_thana = document.getElementById('add_owner_present_thana').value;
        const owner_present_address = document.getElementById('add_owner_present_address').value;

        const owner_permanent_division = document.getElementById('add_owner_permanent_division').value;
        const owner_permanent_district = document.getElementById('add_owner_permanent_district').value;
        const owner_permanent_thana = document.getElementById('add_owner_permanent_thana').value;
        const owner_permanent_address = document.getElementById('add_owner_permanent_address').value;

        console.log(owner_name, owner_father_name, owner_mother_name, owner_spouse_name, owner_email, owner_contactno, owner_birthdate, owner_nid, owner_gender, owner_religion, 
        owner_present_division,owner_present_district,owner_present_thana,owner_present_address, owner_permanent_division,
        owner_permanent_district, owner_permanent_thana, owner_permanent_address); 
        $.ajax({
          url: "php/ui/land/add_owner_info.php",
          data: {owner_name:owner_name, owner_father_name:owner_father_name, owner_mother_name:owner_mother_name, owner_spouse_name:owner_spouse_name, owner_email:owner_email, owner_contactno:owner_contactno, 
            owner_birthdate:owner_birthdate, owner_nid:owner_nid, owner_gender:owner_gender, owner_religion:owner_religion, owner_present_division:owner_present_division,owner_present_district:owner_present_district,
            owner_present_thana:owner_present_thana, owner_present_address:owner_present_address, owner_permanent_division:owner_permanent_division,
            owner_permanent_district:owner_permanent_district, owner_permanent_thana:owner_permanent_thana, owner_permanent_address:owner_permanent_address},
          type: "POST",
          success: function(resp){
            resp = $.parseJSON(resp);
            console.log(resp);
            if(resp.error){
              toastr.error(resp.message);
            }
            else{
              console.log('user add'); 
              document.getElementById('addOwnerForm').reset(); 
              toastr.success(resp.message);
            }
          }
        }); 
          // password_hash($new_password,PASSWORD_DEFAULT)
      });

      document.getElementById('addTransactionForm').addEventListener('submit', function(event){
        event.preventDefault();
        console.log('transaction clicked');
        const transaction_division = document.getElementById('transaction_division').value; 
        const transaction_district= document.getElementById('transaction_district').value;
        const transaction_thana = document.getElementById('transaction_thana').value; 
        const transaction_sheet = document.getElementById('transaction_sheet').value; 
        const transaction_mouza = document.getElementById('transaction_mouza').value;
        const transaction_daag = document.getElementById('transaction_daag').value;
        const transaction_seller_nid = document.getElementById('transaction_seller_nid').value;
        const transaction_type = document.getElementById('transaction_type').value;

        console.log(transaction_division, transaction_district, transaction_thana, transaction_sheet, transaction_mouza, transaction_daag, transaction_seller_nid, transaction_type); 
        // $.ajax({
        //   url: "php/ui/land/add_transaction_info.php",
        //   data: {transaction_division:transaction_division, transaction_district:transaction_district, transaction_thana:transaction_thana, transaction_sheet:transaction_sheet, transaction_mouza:transaction_mouza,  transaction_daag:transaction_daag, transaction_seller_nid:transaction_seller_nid, transaction_type:transaction_type },
        //   type: "POST",
        //   success: function(resp){
        //     resp = $.parseJSON(resp);
        //     console.log(resp);
        //     if(resp.error){
        //       toastr.error(resp.message);
        //     }
        //     else{
        //       console.log('user add'); 
        //       document.getElementById('addOwnerForm').reset(); 
        //       toastr.success(resp.message);
        //     }
        //   }
        // }); 
          // password_hash($new_password,PASSWORD_DEFAULT)
      });
      

    </script>
      
  </body>
</html>

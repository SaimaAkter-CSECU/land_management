<?php
  include_once("php/ui/user/checksession.php");
  $userno =  $_SESSION['userno'];
?>
<!DOCTYPE html>
<html>
    <?php include_once 'header.php' ?>

  <body>
    <?php include_once 'navbar.php' ?>

    <section class="home-slider side-page-slider js-fullheight owl-carousel">
      <div class="slider-item js-fullheight" style="background-image:url(assets/images/background/images/banner4.jpg); height: 300px;">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">
            <div class="col-md-9 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Search Land Owner Information</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="Land.php">Home</a></span> <span>Land Owner Info</span></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section pt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form id="searchOwnerForm">
              <h1 style="text-align:center; font-family: 'Kurale'; color: #b99566;">Search A Land Owner</h1>
              <div class="wrap d-flex justify-content-center align-items-end row mt-5">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-6">
                  <label for="nid">Enter Owner National ID No</label> <br>
                  <input type="text" id="nid" name="nid" class="form-control" placeholder="Enter National ID No"  />
                </div>
                <div class="form-group mr-auto">
                  <button type="submit" id="search_owner" class="btn btn-design py-2">Search Owner Information</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="container" id="owner_information_section" style="display: none;">
        <h1 class="pt-5" style="text-align:center; font-family: 'Kurale'; color: #b99566;">Land Owner Information</h1>


        <table class="table table-hover search_table" id="display_owner_table">
        </table> 

        <h1 class="pt-5" style="text-align:center; font-family: 'Kurale'; color: #b99566;">Owned Land</h1>
        <table class="table table-hover search_table mt-3">
          <thead>
            <tr>
              <th># </th>
              <th>Daag No</th>
              <th>Mouza no</th>
              <th>Sheet No</th>
              <th>Thana</th>
              <th>District</th>
              <th>Division</th> 
              <th>Land Area</th>
              <th>Owner Portion</th>
              <th>Land Deed</th>
            </tr>
          </thead>
          <!-- <tbody>
            <tr>
              <td>Divisional Name : </td>
              <td id="display_division_name"> </td>
            </tr>
            <tr>
              <td>District Name : </td>
              <td id="display_district_name"> </td>
            </tr>
            <tr>
              <td>Thana Name : </td>
              <td id="display_thana_name"> </td>
            </tr>
            <tr>
              <td>Sheet Number: </td>
              <td id="display_sheet_no"> </td>
            </tr>
            <tr>
              <td>Mouza Number : </td>
              <td id="display_mouza_no"> </td>
            </tr>
            <tr>
              <td>Daag Number : </td>
              <td id="display_daag_no"> </td>
            </tr>
            <tr>
              <td>Land Type : </td>
              <td id="display_land_type"> </td>
            </tr>
            <tr>
              <td>Total Land Area : </td>
              <td id="display_land_area"> </td>
            </tr>
            <tr>
              <td>Mouza Map : </td>
              <td id="display_mouza_map"> </td>
            </tr>
            <tr>
              <td>No. of Owners : </td>
              <td id="display_no_of_owner"> </td>
            </tr>
          </tbody> -->
          <tbody id="display_land_table_body">
            
          </tbody>
        </table>

        <h1 class="pt-5" style="text-align:center; font-family: 'Kurale'; color: #b99566;">Land Transaction History</h1>
        <div class="table-responsive"  >
          <table class="table table-striped search_table mt-3" id="display_transaction_table">
            <thead>
              <tr>
                <th># </th>
                <th>Transaction Datetime </th> 
                <th>Seller Name</th>
                <th>Seller National ID </th>
                <th>Buyer Name</th>
                <th>Buyer National ID </th>
                <th>Land Area</th>
                <th>Khatiyan No</th>
                <th>Khatiyan Details</th>
                <th>Mutation No</th>
                <th>Mutation Details</th>
                <th>Land Deed</th>
              </tr>
            </thead>
            <tbody id="display_transaction_table_body">

            </tbody>
          </table>
        </div>
      </div>
    </section>
  
    <!-- Contact Section   -->
    <section class="ftco-section ftc-no-pb ftc-no-pt bg-light">
      <div class="container">
        <div class="row no-gutters">
          <!-- <div class="col-md-5" id="map">
          </div> -->
          <div class="col-md-6" id="gmap">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58441.542092270174!2d90.39979650825666!3d23.726103427890173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x35221704ff3f86df!2sLand%20Ministry!5e0!3m2!1sen!2sbd!4v1613715094016!5m2!1sen!2sbd" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
          <div class="col-md-6 wrap-about pb-md-5 ftco-animate">
        <div class="heading-section mb-md-5 pl-md-5 mt-5 pt-3">
        <div class="pl-md-5 ml-md-5">
          <span class="subheading">Contact Information</span>
          <h2 class="mb-4">You may Contact Us here</h2>
        </div>
        </div>
        <div class="pl-md-5 ml-md-5">
        <div class="info-contact mb-5">
          <p><span>Phone:</span> <span>(00) 123 - 456 - 789</span></p>
          <p><span>Fax:</span> <span>(00) 123 - 456 - 789</span></p>
          <p><span>E-Mail:</span> <span><a href="#">info@emial.com</a></span></p>
        </div>
        <div class="info-contact mb-5">
          <h3>Address Information</h3>
          <p><span>Address</span> <span> 203 Fake St. Mountain View, San Francisco, California, USA</span></p>
          <p><span>Fax:</span> <span>(00) 123 - 456 - 789</span></p>
          <p><span>E-Mail:</span> <span><a href="#">info@emial.com</a></span></p>
        </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  
    <!-- Footer Section   -->
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">E-Judiciary</h2>
              <p>E-Judiciary in Land Issues is a step to ensure a Fair, Faster and Transparent Judicial Service At Bangladesh for Land related cases.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fwww.lawjusticediv.gov.bd%2Fsite%2Fpage%2F0ae052e0-ada8-48e7-b412-8b137204949f%2FPost-Management&amp;text=Post-Management - Law and Justice Division-Government of the People\'s Republic of Bangladesh"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Fwww.lawjusticediv.gov.bd%2Fsite%2Fpage%2F0ae052e0-ada8-48e7-b412-8b137204949f%2FPost-Management&amp;quote=Post-Management - Law and Justice Division-Government of the People\'s Republic of Bangladesh"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Usefull Links</h2>
              <ul class="list-unstyled">
                <li><a href="http://bdlaws.minlaw.gov.bd/">Laws of Bangladesh</a></li>
                <li><a href="http://www.lawjusticediv.gov.bd/site/view/important_links">Law &amp; Justice Division</a></li>
                <li><a href="https://bangladesh.gov.bd/site/view/all_eservices_in_bangladesh/">All E-Services</a></li>
                <li><a href="https://bangabhaban.gov.bd/">Office of Hon’ble President</a></li>
                <li><a href="https://pmo.gov.bd/">Office of the Hon’ble Prime Minister</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Emergency Hotlines</h2>
              <div class="">
                <ul class="list-unstyled ">
                  <li ><a href="tel: 333" ><span class="icon icon-phone" style="margin-right:1rem;"></span><span class="">Govt. Information &amp; Service (333)</span></a></li>
                  <li ><a href="tel: 999" ><span class="icon icon-phone" style="margin-right:1rem;"></span><span class="">Emergency Service (999)</span></a></li>
                  <li ><a href="tel: 106" ><span class="icon icon-phone" style="margin-right:1rem;"></span><span class="">Anti-Corruption Commission (106)</span></a></li>
                  <li ><a href="tel: 16430" ><span class="icon icon-phone" style="margin-right:1rem;"></span><span class="">Govt. Law Service (16430)</span></a></li>
                  <li ><a href="tel: 1090" ><span class="icon icon-phone" style="margin-right:1rem;"></span><span class="">Weather Information (1090)</span></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
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
    <!-- <script src="js/jquery.timepicker.min.js"></script> -->
    <script src="js/scrollax.min.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script> -->
    <script src="js/main.js"></script>

    <script>
        
      document.getElementById('searchOwnerForm').addEventListener('submit', function(event){
        event.preventDefault();
        console.log('clicked');
        const nid = document.getElementById('nid').value; 
        console.log(nid); 
        $.ajax({
          url: "php/ui/land/search_owner_info.php",
          data: {nid:nid},
          type: "POST",
          success: function(resp){
            // console.log(resp);
            resp = $.parseJSON(resp);
            console.log(resp);
            if(resp.error){
              toastr.error(resp.message);
              document.getElementById('owner_information_section').style.display = 'none';
            }
            else{
              load_land_info(resp);
            }
          }
        });

        function load_land_info(ownerInformation){
          document.getElementById('owner_information_section').style.display = 'block';
          const landOwner = ownerInformation.ownerInfo; 
          const landInfo = ownerInformation.landInfo; 
          const ownerTransaction = ownerInformation.ownerTransaction;  

          document.getElementById('display_owner_table').innerHTML= '';    
          document.getElementById('display_land_table_body').innerHTML= '';          
          document.getElementById('display_transaction_table_body').innerHTML= '';   

          for(const j in landOwner){
            document.getElementById('display_owner_table').innerHTML += 
              `
                <thead>
                  <tr>
                    <th colspan="2" style="font-size: 1.2rem">Owner Details </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Owner Name : </td>
                    <td>${landOwner[j].owner_name}</td>
                  </tr>
                  <tr>
                    <td>Owner Father Name : </td>
                    <td>${landOwner[j].owner_father_name}</td>
                  </tr>
                  <tr>
                    <td>Owner Mother Name : </td>
                    <td>${landOwner[j].owner_mother_name}</td>
                  </tr>
                  <tr>
                    <td>Owner Spouse Name : </td>
                    <td>
                      ${
                        
                        (landOwner[j].owner_spouse_name == null) ? 'N/A' : $landOwner[j].owner_spouse_name
                      }
                      </td>
                  </tr>
                  <tr>
                    <td>Owner Contact No : </td>
                    <td>${landOwner[j].owner_mobile_no}</td>
                  </tr>
                  <tr>
                    <td>Owner Email: </td>
                    <td>${landOwner[j].owner_email}</td>
                  </tr>
                  <tr>
                    <td>Owner Birth Date: </td>
                    <td>${landOwner[j].owner_birthdate}</td>
                  </tr>
                  <tr>
                    <td>Owner Gender: </td>
                    <td>${landOwner[j].gender_name}</td>
                  </tr>
                  <tr>
                    <td>Owner Religion: </td>
                    <td>${landOwner[j].religion_name}</td>
                  </tr>
                  <tr>
                    <td>Owner National ID No: </td>
                    <td>${landOwner[j].owner_national_id_no}</td>
                  </tr>
                  <tr>
                    <td>Owner National ID : </td>
                    <td>${landOwner[j].owner_national_id} <a class="btn btn-link text-bold ml-5" target="_blank" href="assets/owner/national-id/${landOwner[j].owner_national_id}">View</a></td>
                  </tr>
                  <tr>
                    <td>Owner Present Address: </td>
                    <td>${landOwner[j].owner_present_address}, ${landOwner[j].present_thana_name}, ${landOwner[j].present_district_name}, ${landOwner[j].present_division_name}</td>
                  </tr>
                  <tr>
                    <td>Owner Permanent Address: </td>
                    <td>${landOwner[j].owner_permanent_address}, ${landOwner[j].permanent_thana_name}, ${landOwner[j].permanent_district_name}, ${landOwner[j].permanent_division_name}</td>
                  </tr>
                </tbody>
              `;
          }

          for(const i in landInfo){
            document.getElementById('display_land_table_body').innerHTML += 
                `
                  <tr>
                    <td>${parseInt(i)+1}</td>
                    <td>${landInfo[i].daag_no}</td>
                    <td>${landInfo[i].mouza_no}</td>
                    <td>${landInfo[i].sheet_no}</td>
                    <td>${landInfo[i].thana_name}</td>
                    <td>${landInfo[i].district_name}</td>
                    <td>${landInfo[i].division_name}</td>

                    <td>${landInfo[i].owner_total_area}</td>
                    <td>${landInfo[i].owner_portion}</td>
                    <td><a class="btn btn-link ml-1" target="_blank" href="assets/land-deed/${landInfo[i].land_deed_document}">${landInfo[i].land_deed_document}</a> </td>
                  </tr>
                `;
          }

          for(const k in ownerTransaction){
            // console.log('table3');
            document.getElementById('display_transaction_table_body').innerHTML += 
                `
                  <tr>
                    <td>${parseInt(k)+1}</td>
                    <td>${ownerTransaction[k].transaction_datetime}</td>
                    <td>${ownerTransaction[k].seller_name}</td>
                    <td>${ownerTransaction[k].seller_national_id}</td>
                    <td>${ownerTransaction[k].buyer_name}</td>
                    <td>${ownerTransaction[k].buyer_national_id}</td>
                    <td>${ownerTransaction[k].land_area}</td>
                    <td>${ownerTransaction[k].khatiyan_no}</td>
                    <td><a class="btn btn-link ml-1" target="_blank" href="assets/khatiyan/${ownerTransaction[k].khatiyan_document}">View ${ownerTransaction[k].khatiyan_document} </a> </td>
                    <td>${ownerTransaction[k].mutation_no}</td>
                    <td><a class="btn btn-link ml-1" target="_blank" href="assets/mutation/${ownerTransaction[k].mutation_document}">View ${ownerTransaction[k].mutation_document} </a> </td>
                    <td><a class="btn btn-link ml-1" target="_blank" href="assets/land-deed/${ownerTransaction[k].land_deed_document}">View ${ownerTransaction[k].land_deed_document} </a> </td>
                  </tr>
                `;
          }
        }
      });
    </script>
      
    </body>
 </html>

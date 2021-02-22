<?php
  $base_path = dirname(__FILE__);
  include_once($base_path."/php/ui/user/checksession.php");
  $storeno =  $_SESSION['storeno'];
?>

<!DOCTYPE html>
  <html>
    <?php include_once 'header.php' ?>

    <body>
        <div class="wrapper">
                  <!-- Sidebar Holder -->
            <?php include_once 'sidebar.php' ?>
    
                  <!-- Page Content Holder -->
            <div id="content" style="background-color: #ffffff">
    
                <?php include_once 'navbar.php' ?>
            
                <!--tab-->
                <div class="pagecontent store_pagecontent">
                    <div class="d-flex align-items-center">
                      <div class="col-9"><h2 class="store_pagecontent_title">Order List:</h2></div>
                      <div class="col-3">
                        <button type="button" onclick="showfilterOrderModal()" class="btn store_order_filter_btn">Search Order</button>
                      </div>
                    </div>
            
                    <div id="dom" class="table-responsive" style="text-align:center; margin-top:30px">
                      <table class="table table-bordered dom-jQuery-events" id="orderListTable">
                          <thead style="background-color:#fc800a; color:#fff; font-size:18px;">
                            <tr>
                              <th scope="col">SL. No</th>
                              <th scope="col">Order No</th>
                              <th scope="col">Status</th>
                              <th scope="col">Last Update date</th>
                              <th scope="col">User</th>
                              <th scope="col">Contact</th>
                              <th scope="col">Delivery Location</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                        <tbody id="filterorderstable">
            
                        </tbody>
                      </table>
                    </div>
                    <!-- table responsive div -->
            
                    <!-- PAGINATION -->
                    <div class="card">
                      <div class="card-body" style="background-color:#fc800a;padding:10px;color:white;font-size:24px">
                        <div class="d-flex justify-content-between">
                          <div class="pagination-button" id='previousproductlists' style="background: #fc800a;">
                            <i class="fa fa-arrow-left mb-2"></i>
                          </div>
                          <div id="cartpagenodiv" class="pagination-pageno" style="background: #fc800a">
                            <div style="font-size:16px;" id='cartpageno'>1</div>
                            <input  id='pagenoinput' placeholder="Enter pageno" value="" class="text-white form-control" type="text" style="background-color:#fc800a;padding:0px;margin:0px 0px;border:none;display:none;text-align:center;font-size:16px;">
                          </div>
                          <div class="pagination-button" id="nextcartlists" style="background: #fc800a">
                            <i class="fa fa-arrow-right mb-2"></i>
                          </div>
                        </div>
                      </div>
                    </div>
            
                    <!--filterOrderModal-->
                    <div id="filterOrderModal" class="modal" tabindex="-1" role="dialog">
                      <div class="modal-dialog" role="document">
                        <form name="form_filterOrderModal" id="form_filterOrderModal">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Search Order</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span style="color:white" aria-hidden="true">&times;</span>
                              </button>
                            </div>
            
                            <div class="modal-body" >
                              <div class="row">
                                <div class="col-5">Order No: </div>
                                <div class="col-5 form-group">
                                  <input type="text" id="inputOrderno" class="form-control"></input>
                                </div>
                              </div>
            
                              <!-- <div class="row">
                                <div class="col-5">Mobile No: </div>
                                <div class="col-5 form-group">
                                  <input type="text" id="inputUserId" class="form-control"></input>
                                </div>
                              </div>
            
                              <div class="row">
                                <div class="col-5">Delivary Date: </div>
                                <div class="col-5 form-group">
                                  <input type="date" id="inputDeliveryDate" class="form-control"></input>
                                </div>
                              </div> -->
            
                              <div class="row">
                                <div class="col-5">Limit: </div>
                                <div class="col-5 form-group">
                                  <select id="selectproductlimit" class="form-control">
                                    <option selected value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                  </select>
                                </div>
                              </div>
            
                            </div>
                            <div class="modal-footer">
                              <button type="submit"  class="btn btn-design" >Find</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
            
                      <!-- Order Details Modal -->
                      <div id="orderDetailsModal" class="modal order_detail_modal" tabindex="-1" role="dialog" >
                        <div class="modal-dialog modal-fluid" role="document">
                          <form name="form_cartDetailsModal" id="form_cartDetailsModal">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title d-flex justify-content-center">Order Details</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
            
                              <div class="modal-body" style="padding: 20px 60px; color: #8c8c8c;">
                                <div class="info">
                                  <div class="card-deck row">
                                    <div class="card col-lg-4 col-md-6 col-sm-12">
                                      <div class="card-body">
                                        <h5 class="card-title">Order Information</h5>
                                        <div class="d-flex">
                                          <p class="card-text col-md-4">Order No</p>
                                          <p class="card-text card-text-data col-md-8" id="order_no"></p>
                                        </div>
                                        <div class="d-flex">
                                          <p class="card-text col-md-4">Institution</p>
                                          <p class="card-text card-text-data col-md-8" id="order_institution_name"></p>
                                        </div>
                                        <div class="d-flex">
                                          <p class="card-text col-md-4">Contact No</p>
                                          <p class="card-text card-text-data col-md-8" id="order_contact_no"></p>
                                        </div>
                                        <div class="d-flex">
                                          <p class="card-text col-md-4" style="padding-right:0; ">Delivery Address</p>
                                          <p class="card-text card-text-data col-md-8" id="order_delivery_address"></p>
                                        </div>
                                        <div class="d-flex">
                                          <p class="card-text col-md-4" style="display: flex">Products <span style="margin-left: 1px"><small>(All)</small></span></p>
                                          <p class="card-text card-text-data col-md-8" id="order_product_number"></p>
                                        </div>
                                        <div class="d-flex">
                                          <p class="card-text col-md-4" style="padding-right:0px;">Shipping Cost</p>
                                          <p class="card-text card-text-data col-md-8" id="order_shipping_cost"></p>
                                        </div>
                                        <div class="d-flex">
                                          <p class="card-text col-md-4">Total Cost</p>
                                          <p class="card-text card-text-data col-md-8" id="order_total_amount"></p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card col-lg-4 col-md-6 col-sm-12">
                                      <div class="card-body">
                                        <h5 class="card-title">Customer Info</h5>
                                          <div class="d-flex ">
                                            <p class="card-text col-md-4">Name</p>
                                            <p class="card-text card-text-data col-md-8" id="customer_name"></p>
                                          </div>
                                          <div class="d-flex ">
                                            <p class="card-text col-md-4">Institution</p>
                                            <p class="card-text card-text-data col-md-8" id="customer_institution_name"></p>
                                          </div>
                                          <div class="d-flex ">
                                            <p class="card-text col-md-4" style="padding-right: 0px;">Designation</p>
                                            <p class="card-text card-text-data col-md-8" id="customer_designation"></p>
                                          </div>
                                          <div class="d-flex">
                                            <p class="card-text col-md-4">Email :</p>
                                            <p class="card-text card-text-data col-md-8" id="customer_email"></p>
                                          </div>
                                          <div class="d-flex">
                                            <p class="card-text col-md-4">Contact No</p>
                                            <p class="card-text card-text-data col-md-8" id="customer_contactno"></p>
                                          </div>
                                          <div class="d-flex">
                                            <p class="card-text col-md-4">Address</p>
                                            <p class="card-text card-text-data col-md-8" id="customer_address"></p>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="card col-lg-4 col-md-6 col-sm-12">
                                      <div class="card-body">
                                        <h5 class="card-title">Store Info</h5>
                                        <div class="d-flex">
                                          <p class="card-text col-md-5">Store Name</p>
                                          <p class="card-text card-text-data col-md-7">: Gen Air</p>
                                        </div>
                                        <div class="d-flex">
                                          <p class="card-text col-md-5">Brand Name</p>
                                          <p class="card-text card-text-data col-md-7" id="store_name"></p>
                                        </div>
                                        <div class="d-flex ">
                                          <p class="card-text col-md-5">Contact No</p>
                                          <p class="card-text card-text-data col-md-7" id="store_contactno"></p>
                                        </div>
                                        <div class="d-flex ">
                                          <p class="card-text col-md-5">Address</p>
                                          <p class="card-text card-text-data col-md-7" style="text-align:justify;" id="store_address"></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="order_status" style="margin-top: 30px;">
                                  <div class="card">
                                    <div class="card-body">
                                      <h5 class="card-title">Order Status</h5>
                                      <div id="allPassedStatus" style="width:40%;margin:auto;">
                                      
                                      </div>
                                      <div class="card-deck" id="order_datetime_div">
                                        <div class="card">
                                          <div class="card-header">
                                            <h5 class="card-header-text" id="order_stage_1"> -- </h5>
                                          </div>
                                          <div class="card-body">
                                            <img src="../assets/images/icon/order-placed1.png" alt="" class="img-fluid" id="order_img_stage_1">
                                          </div>
                                          <div class="card-footer">
                                            <h5 class="card-header-text" id="order_status_stage_1">Order Placed</h5>
                                          </div>
                                        </div>
                                        <div class="card">
                                          <div class="card-header">
                                            <h5 class="card-header-text" id="order_stage_2"> -- </h5>
                                          </div>
                                          <div class="card-body">
                                            <img src="../assets/images/icon/confirmed1.png" alt="" class="img-fluid" id="order_img_stage_2">
                                          </div>
                                          <div class="card-footer">
                                            <h5 class="card-header-text" id="order_status_stage_2">Confirmed By Shop</h5>
                                          </div>
                                        </div>
                                        <div class="card">
                                          <div class="card-header">
                                            <h5 class="card-header-text" id="order_stage_3"> -- </h5>
                                          </div>
                                          <div class="card-body">
                                            <img src="../assets/images/icon/on-processing1.png" alt="" class="img-fluid" id="order_img_stage_3">
                                          </div>
                                          <div class="card-footer">
                                            <h5 class="card-header-text" id="order_status_stage_3">Order Placed</h5>
                                          </div>
                                        </div>
                                        <div class="card">
                                          <div class="card-header">
                                            <h5 class="card-header-text" id="order_stage_4"> -- </h5>
                                          </div>
                                          <div class="card-body">
                                            <img src="../assets/images/icon/off-to-delivery1.png" alt="" class="img-fluid" id="order_img_stage_4">
                                          </div>
                                          <div class="card-footer">
                                            <h5 class="card-header-text" id="order_status_stage_4">Off to Delivery</h5>
                                          </div>
                                        </div>
                                        <div class="card">
                                          <div class="card-header">
                                            <h5 class="card-header-text" id="order_stage_5"> -- </h5>
                                          </div>
                                          <div class="card-body">
                                            <img src="../assets/images/icon/delivered1.png" alt="" class="img-fluid" id="order_img_stage_5">
                                          </div>
                                          <div class="card-footer">
                                            <h5 class="card-header-text" id="order_status_stage_5">Delivered</h5>
                                          </div>
                                        </div>
                                        <div class="card">
                                          <div class="card-header">
                                            <h5 class="card-header-text" id="order_stage_6"> -- </h5>
                                          </div>
                                          <div class="card-body">
                                            <img src="../assets/images/icon/paid1.png" alt="" class="img-fluid" id="order_img_stage_6">
                                          </div>
                                          <div class="card-footer">
                                            <h5 class="card-header-text" id="order_status_stage_6">Paid</h5>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="card" style="margin-top: 20px">
                                    <div class="card-body">
                                      <div class="row d-flex align-items-center stage_completed" id="stage_completed_1" style="visibility: visible;">
                                        <div class="col-md-1 stage_completed_img">
                                          <img src="../assets/images/icon/order-placed2.png" alt="" class="img-fluid" id="stage_completed_img_1">
                                        </div>
                                        <div class="col-md-11 stage_completed_text">
                                          <h5>Order placed by "<span id="customer_1"></span>" from "Gen Air", Brand: "<span id="brand_1"></span>" on <span id="stage_completed_datetime_1"></span>. </h5>
                                        </div>
                                      </div>
                                      <div class="row d-flex align-items-center stage_completed" id="stage_completed_2" style="visibility: hidden; height:0;">
                                        <div class="col-md-1 stage_completed_img">
                                          <img src="../assets/images/icon/confirmed2.png" alt="" class="img-fluid" id="stage_completed_img_2">
                                        </div>
                                        <div class="col-md-11 stage_completed_text">
                                          <h5>Order Confirmed by "Gen Air", Brand: "<span id="brand_2"></span>" on <span id="stage_completed_datetime_2"></span>. </h5>
                                        </div>
                                      </div>
                                      <div class="row d-flex align-items-center stage_completed" id="stage_completed_3" style="visibility: hidden; height:0;">
                                        <div class="col-md-1 stage_completed_img">
                                          <img src="../assets/images/icon/on-processing2.png" alt="" class="img-fluid" id="stage_completed_img_3">
                                        </div>
                                        <div class="col-md-11 stage_completed_text">
                                          <h5>Your order from "GEN AIR", Brand : "<span id="brand_3"></span>" is being processed. (<span id="stage_completed_datetime_3"></span>). </h5>
                                        </div>
                                      </div>
                                      <div class="row d-flex align-items-center stage_completed" id="stage_completed_4" style="visibility: hidden; height:0;">
                                        <div class="col-md-1 stage_completed_img">
                                          <img src="../assets/images/icon/off-to-delivery2.png" alt="" class="img-fluid" id="stage_completed_img_4">
                                        </div>
                                        <div class="col-md-11 stage_completed_text">
                                          <h5>Your order is on the way to delivery by "GEN AIR", Brand: "<span id="brand_4"></span>" on <span id="stage_completed_datetime_4"></span>. Thank you for shopping with us.</h5>
                                        </div>
                                      </div>
                                      <div class="row d-flex align-items-center stage_completed" id="stage_completed_5" style="visibility: hidden; height:0;">
                                        <div class="col-md-1 stage_completed_img">
                                          <img src="../assets/images/icon/delivered2.png" alt="" class="img-fluid" id="stage_completed_img_5">
                                        </div>
                                        <div class="col-md-11 stage_completed_text">
                                          <h5>Your order from "GEN AIR", Brand : "<span id="brand_5"></span>" has been delivered on <span id="stage_completed_datetime_5"></span>. Happy shopping!</h5>
                                        </div>
                                      </div>
                                      <div class="row d-flex align-items-center stage_completed" id="stage_completed_6" style="visibility: hidden; height:0;">
                                        <div class="col-md-1 stage_completed_img">
                                          <img src="../assets/images/icon/order-placed2.png" alt="" class="img-fluid" id="stage_completed_img_6">
                                        </div>
                                        <div class="col-md-11 stage_completed_text">
                                          <h5>Your order from "GEN AIR", Brand : "<span id="brand_6"></span>", has been paid on <span id="stage_completed_datetime_6"></span>. Thank you for being with us.</h5>
                                        </div>
                                      </div>
                                      <div class="row d-flex align-items-center stage_completed" id="stage_completed_7" style="visibility: hidden; height:0;">
                                        <div class="col-md-1 stage_completed_img">
                                          <img src="../assets/images/icon/rejected.png" alt="" class="img-fluid" id="stage_completed_img_7">
                                        </div>
                                        <div class="col-md-11 stage_completed_text">
                                          <h5>Order rejected by "GEN AIR", Brand : "<span id="brand_7"></span>" on <span id="stage_completed_datetime_7"></span>. </h5>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="card" style="margin-top:30px">
                                  <div class="card-body">
                                    <h5 class="card-title">Product Details</h5>
                                    <div class="table-responsive">
                                      <table class="table stripped-table" style="text-align:center; font-family: 'Bookman Old style'">
                                        <thead>
                                          <th>#</th> 
                                          <th>Product</th> 
                                          <th>Quantity</th>
                                          <th>Unit Price</th>
                                          <th>Discount</th>
                                          <th>Price</th> 
                                        </thead>
                                        <tbody id="orderProductTable">
            
                                        </tbody>
                                        <tfoot>
                                          <tr>
                                            <td colSpan="5" class="" style="text-align:right; padding-bottom: 0.3rem;">Sub Total</td>
                                            <td id="sub_total" style="padding-bottom:0.3rem;"></td>
                                          </tr>
                                          <tr>
                                            <td colSpan="5" style="text-align:right; border: none; padding: 0.3rem;">Shipping Cost</td>
                                            <td id="shipping_cost" style="border:none; padding:0.3rem;"></td>
                                          </tr>
                                          <tr>
                                            <td colSpan="5" style="text-align:right; padding: 0.3rem; font-weight: 600; color: #0294b7;">Total</td>
                                            <td id="total_cost" style="padding:0.3rem;font-weight: 600; color: #0294b7;"></td>
                                          </tr>
                                          <tr>
                                            <td colSpan="6" style="border:none;text-align:center; margin-top: 20px">
                                              <button type="button" class="btn printPdfBtn" id="print_pdf">Download PDF / Print</button>
                                            </td>
                                          </tr>
                                        </tfoot>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
            
                  </div> <!-- pagecontent !-->
            </div> <!-- content !-->
        </div><!--wrapper div -->

        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
        <!-- Bootstrap Js CDN -->
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/toastr.min.js"></script>
        <script src="../js/aamiritoastr.js"></script>
        <script src="js/aamiri_notification.js"></script>
    
        <!-- sidebar -->
        <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                    $('.navbar').toggleClass('navactive');
                    $('.pagecontent').toggleClass('pagecontentactive');
    
                });
            });
        </script>
        
        <!-- sidebar -->
        <script>
          var url = window.location.pathname;
          var filename = url.substring(url.lastIndexOf('/')+1);
          $("#sidebar a[href='"+filename+"']").parent().toggleClass('sidebar-active');
          //localStorage.setItem('cuad_applicant_lastpage',filename);
        </script>
    
        <script type="text/javascript">
          function showfilterOrderModal(){
            $('#filterOrderModal').modal('show');
          }
          function showaddmodal(){
            $('#addmodal').modal('show');
          }
    
        </script>
    
        <script type="text/javascript">
            var storeinfo = {};
          $.ajax({
            url: "php/ui/store/get_a_store_info_store.php",
            type: "POST",
            async: false,
            success: function(resp){
              // console.log(resp);
              resp = $.parseJSON(resp);
              storeinfo = resp.store_info[0];
              console.log(storeinfo);
            }
          });
        </script>
    
    
        <script type="text/javascript">
    
        document.getElementById('form_filterOrderModal').addEventListener('submit', function(event){
          event.preventDefault();
          document.getElementById('cartpageno').innerHTML='1';
          searchCarts();
          document.getElementById('form_filterOrderModal').reset();
          $('#filterOrderModal').modal('hide');
        });
    
        var successflag = 0;
        searchCarts();
        function searchCarts(){ 
          var pageno = document.getElementById('cartpageno').innerHTML;
          var orderno = document.getElementById('inputOrderno').value;
          var limit = document.getElementById('selectproductlimit').value;
    
          if(!orderno) orderno=-1;
          // if(!userid) userid=-1;
          // if(!deliverydate) deliverydate= 'null';
    
          // console.log(pageno,cartno,userid,deliverydate,limit);
          // the ajax filters store products list from DB on loading
          $.ajax({
            url:'php/ui/cart/get_filtered_order.php',
            data: { pageno:pageno, orderno:orderno, limit:limit},
            type: 'POST',
            success: function(result){
              //console.log(result);
              result = $.parseJSON(result);
              console.log(result);
              if(result.error == true){
                toastr.error(result.message);
                loadOrderList('');
                successflag = 0;
              }
              else{
                var data = result.data;
                var status = result.status;
                var statustrack = {};
                //var colortrack = {'black', 'red', 'black', 'green', }; 
                for(i in status){
                  var ostatusno = status[i].statusno;
                  statustrack[ostatusno] = {};
                  statustrack[ostatusno]['status']= status[i].statustitle;
                  if(ostatusno =='1') statustrack[ostatusno]['color'] = 'gray';
                  else if(ostatusno =='2') statustrack[ostatusno]['color'] = '#0294b7';
                  else if(ostatusno =='3') statustrack[ostatusno]['color'] = 'gray';
                  else if(ostatusno =='4') statustrack[ostatusno]['color'] = 'gray';
                  else if(ostatusno =='5') statustrack[ostatusno]['color'] = 'gray';
                  else if(ostatusno =='6') statustrack[ostatusno]['color'] = 'Green';
                  else if(ostatusno =='7') statustrack[ostatusno]['color'] = 'Red';
                }
                // console.log(statustrack);
                loadOrderList(data, statustrack);
                successflag = 1;
              }
            }
          });
        }
    
        function loadOrderList(data, statustrack){
          $('#filterorderstable tr').remove();
          var filterorderstable = document.getElementById('filterorderstable');
          var pageno = parseInt(document.getElementById('cartpageno').innerHTML);
          var limit = parseInt(document.getElementById('selectproductlimit').value);
    
          var sl = (pageno-1)*limit;
    
          for(i in data){
    
            var orderno = data[i].orderno;
            var userno = data[i].userno;
            var statusno = data[i].statusno;
    
            var row = filterorderstable.insertRow();
            row.insertCell(0).innerHTML = ++sl;
    
            var cell1 = row.insertCell(1);
            var orderdetaisbtn = document.createElement('button');
            orderdetaisbtn.type = 'button';
            orderdetaisbtn.className ='btn btn-outline-info';
            orderdetaisbtn.id = 'orderdetail_'+orderno; 
            orderdetaisbtn.style= 'border-radius: 10px; font-size: 15px; padding: 5px 18px;';
            orderdetaisbtn.innerHTML = 'Details'; 
    
            cell1.innerHTML = data[i].orderno + '<br> ' ; 
            cell1.appendChild(orderdetaisbtn);
            // cell1.innerHTML += '<br><button id="orderdetail_'+orderno+'" type="button" class="btn btn-outline-info">Details</button>';
    
            var cell = row.insertCell(2);
            if(statustrack[data[i].statusno]){
              cell.innerHTML = statustrack[data[i].statusno]['status'];
              cell.style.color = statustrack[data[i].statusno]['color'];
              cell.style.fontWeight = 'bold';
            }
            else{
              cell.innerHTML = '---';
            }
    
            row.insertCell(3).innerHTML = data[i].statustime;
    
            row.insertCell(4).innerHTML = data[i].ufirstname+' '+data[i].ulastname;
            row.insertCell(5).innerHTML = data[i].contact_no;
            row.insertCell(6).innerHTML = data[i].delivery_location;
    
            var row7 = row.insertCell(7); 
            // var iconDiv = createButtons(i, orderno, statusno, userno);
            // row7.appendChild(iconDiv);
    
            var confirmbystorebtn = document.createElement('BUTTON');
            confirmbystorebtn.className = 'btn btn-default btn-style'; 
            confirmbystorebtn.id= "confirmbystore_"+orderno+"_"+userno; 
            confirmbystorebtn.innerText = 'Confirm'; 
            confirmbystorebtn.style.display = 'none';
            row7.appendChild(confirmbystorebtn);
    
            var onprocessingbystorebtn = document.createElement('BUTTON');
            onprocessingbystorebtn.className = 'btn btn-default btn-style'; 
            onprocessingbystorebtn.id= "onprocessingbystore_"+orderno+"_"+userno; 
            onprocessingbystorebtn.innerText = 'On Processing'; 
            onprocessingbystorebtn.style.display = 'none';
            row7.appendChild(onprocessingbystorebtn);
    
            var offtodeliverybystorebtn = document.createElement('BUTTON');
            offtodeliverybystorebtn.className = 'btn btn-default btn-style'; 
            offtodeliverybystorebtn.id= "offtodeliverybystore_"+orderno+"_"+userno; 
            offtodeliverybystorebtn.innerText = 'Off to Delivery'; 
            offtodeliverybystorebtn.style.display = 'none';
            row7.appendChild(offtodeliverybystorebtn);
    
            var deliveredbystorebtn = document.createElement('BUTTON');
            deliveredbystorebtn.className = 'btn btn-default btn-style'; 
            deliveredbystorebtn.id= "deliveredbystore_"+orderno+"_"+userno; 
            deliveredbystorebtn.innerText = 'Delivered'; 
            deliveredbystorebtn.style.display = 'none';
            row7.appendChild(deliveredbystorebtn);
    
            var paidbystorebtn = document.createElement('BUTTON');
            paidbystorebtn.className = 'btn btn-success btn-style'; 
            paidbystorebtn.id= "paid_store_"+orderno+"_"+userno; 
            paidbystorebtn.innerText = 'Paid'; 
            paidbystorebtn.style.display = 'none';
            row7.appendChild(paidbystorebtn);
    
            var rejectbystorebtn = document.createElement('BUTTON');
            rejectbystorebtn.className = 'btn btn-danger btn-style'; 
            rejectbystorebtn.id= "rejectbystore_"+orderno+"_"+userno; 
            rejectbystorebtn.innerText = 'Reject'; 
            row7.appendChild(rejectbystorebtn);
            
            (function(orderno,userno){
                document.getElementById("rejectbystore_"+orderno+"_"+userno).addEventListener('click',function(){
                  if(confirm('Do you want to Reject this order?')){
                    rejectOrderByStore(orderno);
                  }
                });
            }(orderno,userno));
    
            (function(orderno){
              document.getElementById('orderdetail_'+orderno).addEventListener('click', function(){
                showalldetailsofOrder(orderno);
              });
            }(orderno));
    
    
    
    
            // Order Placed -> confirmed by shop
            if(statusno=='1'){
              (function(orderno,userno, i){
                document.getElementById("confirmbystore_"+orderno+"_"+userno).style.display = 'block'; 
                document.getElementById("confirmbystore_"+orderno+"_"+userno).addEventListener('click',function(e){
                  if(confirm('Do you want to Confirm this order?')){
                    confirmOrderByStore(orderno);
                  }
                });
              }(orderno,userno, i));
            }
            // Confirmed by Store -> On Processing
            else if(statusno=='2'){
              (function(orderno,userno){
                document.getElementById("onprocessingbystore_"+orderno+"_"+userno).style.display = 'block'; 
                document.getElementById("onprocessingbystore_"+orderno+"_"+userno).addEventListener('click',function(e){
                  if(confirm('Are you sure to change order status as On Processing?')){
                    onProcessingOrderByStore(orderno);
                  }
                });
              }(orderno,userno));
            }
            // On Processing -> Off to Delivary
            else if(statusno == "3"){
              (function(orderno,userno,i){
                document.getElementById("offtodeliverybystore_"+orderno+"_"+userno).style.display = 'block';
                document.getElementById("offtodeliverybystore_"+orderno+"_"+userno).addEventListener('click',function(){
                  if(confirm('Are you sure to change order status as Off to Delivery?')){
                    offtoDeliveryOrderByStore(orderno);
                  }
                });
              }(orderno,userno,i));
            }
            // Off to Delivary -> Delivered
            else if(statusno == "4"){
              (function(orderno,userno){
                document.getElementById("deliveredbystore_"+orderno+"_"+userno).style.display = 'block';
                document.getElementById("deliveredbystore_"+orderno+"_"+userno).addEventListener('click',function(){
                  if(confirm('Are you sure to change order status as Delivered?')){
                    deliveredOrderByStore(orderno);
                  }
                });
              }(orderno,userno));
            }
            // Delivered -> Paid
            else if(statusno == "5"){
              (function(orderno,userno){
                document.getElementById("paid_store_"+orderno+"_"+userno).style.display= 'block';
                document.getElementById("paid_store_"+orderno+"_"+userno).addEventListener('click',function(){
                  if(confirm('Are you sure to change order status as "Paid"?')){
                    paidOrderByStore(orderno);
                  }
                });
              }(orderno,userno));
            }
            //Paid
            else if(statusno == "6" || statusno == "7"){
              (function(orderno,userno){
                document.getElementById("rejectbystore_"+orderno+"_"+userno).style.display="none";
              }(orderno,userno));
            }
            // else if(statusno == "7"){
            //   (function(orderno,userno){
            //     document.getElementById("rejectbystore_"+orderno+"_"+userno).style.display="none";
            //   }(orderno,userno));
            // }
          }
        }
    
        function showalldetailsofOrder(orderno){
          $('#orderDetailsModal').modal('show');
          $('#orderDetailsModal').css('padding-right','0px');
          $.ajax({
            url: 'php/ui/order/get_order_full_details.php',
            data: {orderno:orderno},
            type: 'POST',
            success: function(resp){
              resp = $.parseJSON(resp);
              console.log(resp);
              if(!resp.error){
                var order = resp.order;
                var orderdelivery = resp.orderdeliverydetails;
                var orderdeliveryrate = resp.orderdeliveryrate; 
                var orderProducts = resp.orderdetail;
                var orderstatus = resp.orderstatus;
                var ostatus = resp.ostatus;
                loadProductsAtOrderDetails(order, orderdelivery, orderdeliveryrate, orderProducts, orderstatus, ostatus);
              }
            }
          });
        }
    
        function loadProductsAtOrderDetails(order, orderdelivery, orderdeliveryrate, orderProducts, orderstatus, ostatus){
          var store_name_data; 
          $.ajax({
            url: "php/ui/store/get_a_store_info_store.php",
            type: "POST",
            success: function(resp){
              console.log(resp);
              resp = $.parseJSON(resp);
              // console.log('storeinfo', resp);
              var data = resp.store_info;
              for(var i in data){
                var storename = data[i].name;
                store_name_data = storename; 
                console.log(store_name_data);
                var storecontact = data[i].contactno;
                var storeaddress = data[i].street+', '+data[i].city;  
    
                document.getElementById('store_name').innerHTML = `: ${storename}`;
                document.getElementById('store_contactno').innerHTML = `: ${storecontact}`;
                document.getElementById('store_address').innerHTML = `: ${storeaddress}`;
    
                document.getElementById(`brand_1`).innerHTML = `${storename}`; 
                document.getElementById(`brand_2`).innerHTML = `${storename}`; 
                document.getElementById(`brand_3`).innerHTML = `${storename}`; 
                document.getElementById(`brand_4`).innerHTML = `${storename}`; 
                document.getElementById(`brand_5`).innerHTML = `${storename}`; 
                document.getElementById(`brand_6`).innerHTML = `${storename}`; 
                document.getElementById(`brand_7`).innerHTML = `${storename}`; 
              }
            }
          });
    
          var orderno = order.orderno; 
          var deliveryrate = orderdeliveryrate.homedelivaryrate; 
    
          document.getElementById('customer_name').innerHTML = `: ${order.ufirstname} ${order.ulastname}`;
          document.getElementById('customer_institution_name').innerHTML = `: ${order.institution_name}`;
          document.getElementById('customer_designation').innerHTML = `: ${order.designation}`;
          document.getElementById('customer_email').innerHTML = `: ${order.email}`;
          document.getElementById('customer_contactno').innerHTML = `: ${order.contactno}`;
          document.getElementById('customer_address').innerHTML = `: ${order.address}`;
    
          document.getElementById('customer_1').innerHTML = `${order.ufirstname} ${order.ulastname}`;
    
          document.getElementById('order_no').innerHTML = `: ${orderno}`;
          document.getElementById('order_institution_name').innerHTML = `: ${orderdelivery.institution_name}`;
          document.getElementById('order_contact_no').innerHTML = `: ${orderdelivery.contact_no}`;
          document.getElementById('order_delivery_address').innerHTML = `: ${orderdelivery.delivery_location}`;
          document.getElementById('order_shipping_cost').innerHTML = `: ${orderdeliveryrate.homedelivaryrate}  TK`; 
    
          // var x = document.getElementById('store_name').innerHTML; 
          // console.log(x);
          for(var i in orderstatus){
            console.log("Order status", orderstatus);
            console.log("Order status", orderstatus[i]);
            var id = parseInt(i) + 1; 
            var statustitle = orderstatus[i].statustitle;
            var statustime = orderstatus[i].statustime;
            var statusimage = orderstatus[i].statusimage;
            var statusno = orderstatus[i].statusno;
    
            console.log(store_name_data);
            const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            const days = ["Monday", "Tuesday", "Wednesday",  "Thursday", "Friday", "Saturday", "Sunday"];
    
            var datetime = new Date(statustime);
            document.getElementById('order_stage_'+`${id}`).innerHTML = `${days[datetime.getDay()]} <br /> ${datetime.getDate()} ${months[datetime.getMonth() ]}, ${datetime.getFullYear()} <br />  ${datetime.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })}`;
            document.getElementById('order_status_stage_'+`${id}`).innerHTML = `${statustitle}`;
            document.getElementById(`order_img_stage_${id}`).src = `../assets/images/icon/${statusimage}`;
    
            if(statusno == 7){
              document.getElementById(`stage_completed_7`).style.visibility = "visible"; 
              document.getElementById(`stage_completed_7`).style.height = "auto";
              document.getElementById(`brand_7`).innerHTML = `${store_name_data}`;  
              document.getElementById(`stage_completed_datetime_7`).innerHTML = `${days[datetime.getDay()]}, ${datetime.getDate()} ${months[datetime.getMonth() ]}, ${datetime.getFullYear()} at ${datetime.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })}`;
              break; 
            }
            document.getElementById(`stage_completed_${id}`).style.visibility = "visible"; 
            document.getElementById(`stage_completed_${id}`).style.height = "auto"; 
            
            document.getElementById(`stage_completed_datetime_${id}`).innerHTML = `${days[datetime.getDay()]}, ${datetime.getDate()} ${months[datetime.getMonth() ]}, ${datetime.getFullYear()} at ${datetime.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })}`;
          }
    
          var orderProductTable = document.getElementById('orderProductTable');
          orderProductTable.innerHTML = '';
          var totalamount = 0;
          var totalProduct = 0;
          for( var i in orderProducts){
            var row = orderProductTable.insertRow();
            var qty = orderProducts[i].quantity;
            var rate = orderProducts[i].rate;
            var discount = orderProducts[i].discount;
            var amount = qty*(rate - discount);
            row.insertCell(0).innerHTML = parseInt(i) + 1;
            row.insertCell(1).innerHTML = orderProducts[i].productname;
            row.insertCell(2).innerHTML = qty;
            row.insertCell(3).innerHTML = rate;
            row.insertCell(4).innerHTML = discount;
            row.insertCell(5).innerHTML = amount +' Tk';
            totalamount += amount; 
            totalProduct += qty;
          }
          document.getElementById('sub_total').innerHTML = `${totalamount} TK`;
          document.getElementById('shipping_cost').innerHTML = `${orderdeliveryrate.homedelivaryrate} TK`;
          document.getElementById('total_cost').innerHTML = `${totalamount + parseFloat(orderdeliveryrate.homedelivaryrate)} TK`;
    
          document.getElementById('order_product_number').innerHTML = `: ${totalProduct}`;
          document.getElementById('order_total_amount').innerHTML = `: ${(totalamount+parseInt(orderdeliveryrate.homedelivaryrate))} TK`;
        }
      </script>

        <script>
        $(".order_detail_modal").on("hidden.bs.modal", function(){
          document.getElementById('order_stage_1').innerHTML = ` -- `;
          document.getElementById('order_stage_2').innerHTML = ` -- `;
          document.getElementById('order_stage_3').innerHTML = ` -- `;
          document.getElementById('order_stage_4').innerHTML = ` -- `;
          document.getElementById('order_stage_5').innerHTML = ` -- `;
          document.getElementById('order_stage_6').innerHTML = ` -- `;
    
          document.getElementById('order_img_stage_1').src = `../assets/images/icon/order-placed1.png`;
          document.getElementById('order_img_stage_2').src = `../assets/images/icon/confirmed1.png`;
          document.getElementById('order_img_stage_3').src = `../assets/images/icon/on-processing1.png`;
          document.getElementById('order_img_stage_4').src = `../assets/images/icon/off-to-delivery1.png`;
          document.getElementById('order_img_stage_5').src = `../assets/images/icon/delivered1.png`;
          document.getElementById('order_img_stage_6').src = `../assets/images/icon/paid1.png`;
    
          document.getElementById('order_status_stage_2').innerHTML = 'Confirmed by Shop';
          document.getElementById('order_status_stage_3').innerHTML = 'On Processing';
          document.getElementById('order_status_stage_4').innerHTML = 'Off to Delivery';
          document.getElementById('order_status_stage_5').innerHTML = 'Delivered';
          document.getElementById('order_status_stage_6').innerHTML = 'Paid';
          
          document.getElementById('stage_completed_1').style.visibility = 'hidden';
          document.getElementById('stage_completed_2').style.visibility = 'hidden';
          document.getElementById('stage_completed_3').style.visibility = 'hidden';
          document.getElementById('stage_completed_4').style.visibility = 'hidden';
          document.getElementById('stage_completed_5').style.visibility = 'hidden';
          document.getElementById('stage_completed_6').style.visibility = 'hidden';
          document.getElementById('stage_completed_7').style.visibility = 'hidden';
    
          document.getElementById('stage_completed_1').style.height = '0px';
          document.getElementById('stage_completed_2').style.height = '0px';
          document.getElementById('stage_completed_3').style.height = '0px';
          document.getElementById('stage_completed_4').style.height = '0px';
          document.getElementById('stage_completed_5').style.height = '0px';
          document.getElementById('stage_completed_6').style.height = '0px';
          document.getElementById('stage_completed_7').style.height = '0px';
    
          document.getElementById('stage_completed_datetime_1').innerHTML = ``;
          document.getElementById('stage_completed_datetime_2').innerHTML = ``;
          document.getElementById('stage_completed_datetime_3').innerHTML = ``;
          document.getElementById('stage_completed_datetime_4').innerHTML = ``;
          document.getElementById('stage_completed_datetime_5').innerHTML = ``;
          document.getElementById('stage_completed_datetime_6').innerHTML = ``;
          document.getElementById('stage_completed_datetime_7').innerHTML = ``;
          
        });
    </script>

        <!-- Order page script -->
        <script type="text/javascript">
    
            // Confirm Order Button
            function confirmOrderByStore(orderno)
            {
            $.ajax({
              url: 'php/ui/order/confirm_an_order_by_a_shop.php',
              data: {orderno:orderno},
              type: 'POST',
              success: function(resp){
                resp = $.parseJSON(resp);
                console.log(resp);
                if(!resp.error){
                  toastr.success(resp.message);
                  searchCarts();
    
                  var userEmail = resp.email;
                  console.log(userEmail);
    
                  // var payload = {};
                  // payload.collection = userEmail;
                  // payload.document = new Date().getTime();
                  // payload.title = "Notification from Gen Air";
                  // payload.message = "Order no "+orderno+" of "+storeinfo.name+" is on delivery.";
                  // payload.image = 'http://aamiri.com.bd/'+storeinfo.storeimage;
                  // payload.type = 2;
                  // payload.flag = 0;
                  // payload.storeno = storeinfo.storeno;
                  // payload.storename = storeinfo.name;
    
                  // storeNotification(payload);
                  // sendPushNotification(payload);
                }
              }
            });
          }
            // Reject button
            function rejectOrderByStore(orderno){
            $.ajax({
              url: 'php/ui/order/reject_an_order_by_a_shop.php',
              data: {orderno:orderno},
              type: 'POST',
              success: function(resp){
                resp = $.parseJSON(resp);
                // console.log(resp);
                if(!resp.error){
                  toastr.success(resp.message);
                  searchCarts();
    
                  var userEmail = resp.email;
                  console.log(userEmail);
    
                  // var payload = {};
                  // payload.collection = userEmail;
                  // payload.document = new Date().getTime();
                  // payload.title = "Notification from GenAir";
                  // payload.message = "Order No "+orderno+" of "+storeinfo.name+" is rejected.";
                  // payload.image = 'http://aamiri.com.bd/'+storeinfo.storeimage;
                  // payload.type = 2;
                  // payload.flag = 0;
                  // payload.storeno = storeinfo.storeno;
                  // payload.storename = storeinfo.name;
    
                  // storeNotification(payload);
                  // sendPushNotification(payload);
                }
              }
            });
          }
            // On Processing Button
            function onProcessingOrderByStore(orderno)
            {
            $.ajax({
              url: 'php/ui/order/onprocessing_an_order_by_a_shop.php',
              data: {orderno:orderno},
              type: 'POST',
              success: function(resp){
                resp = $.parseJSON(resp);
                console.log(resp);
                if(!resp.error){
                  toastr.success(resp.message);
                  searchCarts();
    
                  var userEmail = resp.email;
                  console.log(userEmail);
                  // var payload = {};
                  // payload.collection = userEmail;
                  // payload.document = new Date().getTime();
                  // payload.title = "Notification from GenAir";
                  // payload.message = "Order no "+orderno+" of "+storeinfo.name+" is on delivery.";
                  // payload.image = 'http://aamiri.com.bd/'+storeinfo.storeimage;
                  // payload.type = 2;
                  // payload.flag = 0;
                  // payload.storeno = storeinfo.storeno;
                  // payload.storename = storeinfo.name;
    
                  // storeNotification(payload);
                  // sendPushNotification(payload);
                }
              }
            });
          }
            // Off to Delivery Button
            function offtoDeliveryOrderByStore(orderno)
            {
            $.ajax({
              url: 'php/ui/order/offtodelivery_an_order_by_a_shop.php',
              data: {orderno:orderno},
              type: 'POST',
              success: function(resp){
                resp = $.parseJSON(resp);
                console.log(resp);
                if(!resp.error){
                  toastr.success(resp.message);
                  searchCarts();
    
                  var userEmail = resp.email;
                  console.log(userEmail);
    
                  // var payload = {};
                  // payload.collection = userEmail;
                  // payload.document = new Date().getTime();
                  // payload.title = "Notification from Gen Air";
                  // payload.message = "Order no "+orderno+" of "+storeinfo.name+" is on delivery.";
                  // payload.image = 'http://aamiri.com.bd/'+storeinfo.storeimage;
                  // payload.type = 2;
                  // payload.flag = 0;
                  // payload.storeno = storeinfo.storeno;
                  // payload.storename = storeinfo.name;
    
                  // storeNotification(payload);
                  // sendPushNotification(payload);
                }
              }
            });
          }
            // Delivered Button
            function deliveredOrderByStore(orderno){
            $.ajax({
              url: 'php/ui/order/delivered_an_order_by_a_shop.php',
              data: {orderno:orderno},
              type: 'POST',
              success: function(resp){
                resp = $.parseJSON(resp);
                console.log(resp);
                if(!resp.error){
                  toastr.success(resp.message);
                  searchCarts();
    
                  var userEmail = resp.email;
                  console.log(userEmail);
    
                  // var payload = {};
                  // payload.collection = userEmail;
                  // payload.document = new Date().getTime();
                  // payload.title = "Notification from Gen Air";
                  // payload.message = "Order no "+orderno+" of "+storeinfo.name+" is on delivery.";
                  // payload.image = 'http://aamiri.com.bd/'+storeinfo.storeimage;
                  // payload.type = 2;
                  // payload.flag = 0;
                  // payload.storeno = storeinfo.storeno;
                  // payload.storename = storeinfo.name;
    
                  // storeNotification(payload);
                  // sendPushNotification(payload);
                }
              }
            });
          }
            // Cart Paid Buttondocument.getElementById('reject').addEventListener('click', function(){
            function paidOrderByStore(orderno){
            $.ajax({
              url: 'php/ui/order/paid_an_order_by_a_shop.php',
              data: {orderno:orderno},
              type: 'POST',
              success: function(resp){
                resp = $.parseJSON(resp);
                // console.log(resp);
                if(!resp.error){
                  toastr.success(resp.message);
                  searchCarts();
    
                  var userEmail = resp.email;
                  console.log(userEmail);
    
                  // var payload = {};
                  // payload.collection = userEmail;
                  // payload.document = new Date().getTime();
                  // payload.title = "Notification from Gen Air";
                  // payload.message = "Order no "+orderno+" of "+storeinfo.name+" is Paid.";
                  // payload.image = 'http://aamiri.com.bd/'+storeinfo.storeimage;
                  // payload.type = 2;
                  // payload.flag = 0;
                  // payload.storeno = storeinfo.storeno;
                  // payload.storename = storeinfo.name;
    
                  // storeNotification(payload);
                  // sendPushNotification(payload);
                }
              }
            });
          }
        </script>
    
            <!-- SCRIPT of PAGINATION  -->
            <script type="text/javascript">
            document.getElementById('cartpagenodiv').addEventListener('click',function(){
              hidePageno('pagenoinput','cartpageno');
              document.getElementById('pagenoinput').focus();
            });
        
            document.getElementById('pagenoinput').addEventListener('keypress',function(event){
              if(event.keyCode==13)
              {
                showPageno('pagenoinput','cartpageno');
                if(document.getElementById('pagenoinput').value == '')document.getElementById('pagenoinput').value = 1;
                document.getElementById('cartpageno').innerHTML = document.getElementById('pagenoinput').value;
                searchCarts();
              }
            });
        
            function hidePageno(inputid,divid)
            {
              document.getElementById(inputid).style.display = 'block';
              document.getElementById(divid).style.display = 'none';
            }
            function showPageno(inputid,divid)
            {
              document.getElementById(inputid).style.display = 'none';
              document.getElementById(divid).style.display = 'block';
            }
            document.getElementById('previousproductlists').addEventListener('click',function(){
              cartpageno = parseInt(document.getElementById('cartpageno').innerHTML);
              if(cartpageno>1)
              {
                cartpageno--;
                document.getElementById('cartpageno').innerHTML = cartpageno;
                document.getElementById('pagenoinput').value = cartpageno;
                searchCarts();
              }
              else {
                toastr.warning('This is first page');
              }
            });
        
            document.getElementById('nextcartlists').addEventListener('click',function(){
              cartpageno = parseInt(document.getElementById('cartpageno').innerHTML);
              cartpageno++;
              document.getElementById('cartpageno').innerHTML = cartpageno;
              document.getElementById('pagenoinput').value = cartpageno;
              searchCarts();
        
              if(successflag == 0){
                cartpageno--;
                document.getElementById('cartpageno').innerHTML = 1;
                document.getElementById('pagenoinput').value = 1;
                searchCarts();
              }
            });
          </script>
    
    
    
    
        <!-- EVENT SOURCE FOR REAL TIME UPDATE -->
        <script>
            var source = new EventSource("php/ui/cart/get_order_status_update.php");
            source.onmessage = function(event) {
                // console.log("update->", event.data);
                var resp = event.data;
                resp = $.parseJSON(resp);
                var data = resp.data;
                // console.log("after new msg->>", data);
                for(k in data){
                  var msgs = 'Order No '+data[k].orderno+' is in status '+data[k].statustitle;
                  toastr.success(msgs);
                  // load_carts(1);
                  searchCarts();
                }
            };
        </script>

    </body>
  </html>

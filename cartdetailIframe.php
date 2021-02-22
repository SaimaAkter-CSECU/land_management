<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="../assets/culogo.jpg">

    <title>Cart Details</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/toastr.min.css">

    <style media="screen">
      #iframe_map{
        height:350px;
      }
      .card-title{
        text-align: center;
        color: rgb(143,100,190);
        font-size: 23px;
        font-weight: 600;
      }
      /* #iframeForm input{
        color: #000;
        font-size: 16px;
        font-weight: bold;
      } */
    </style>
  </head>
  <body id="cartdetailiframe" style="overflow:hidden">
    <form id="iframeForm" name="iframeForm" class="" >
      <!-- <div class="info" style="margin-top: 30px;">
        <div class="card-deck">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Order Info</h5>
              <div class="d-flex">
                <p class="card-text col-md-5">Order No :</p>
                <p class="card-text col-md-7" id="order_no" style="font-weight: bold;"></p>
              </div>
              <div class="d-flex">
                <p class="card-text col-md-5">Total Products :</p>
                <p class="card-text col-md-7" id="order_product_number"></p>
              </div>
              <div class="d-flex">
                <p class="card-text col-md-5">Delivery Type :</p>
                <p class="card-text col-md-7" id="order_delivery_type">Home Delivery</p>
              </div>
              <div class="d-flex">
                <p class="card-text col-md-5" style="padding-right:5px;">Delivery Charge :</p>
                <p class="card-text col-md-7" id="order_delivery_charge"></p>
              </div>
              <div class="d-flex">
                <p class="card-text col-md-5">Total amount :</p>
                <p class="card-text col-md-7" id="order_total_amount"></p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Customer Info</h5>
                <div class="d-flex ">
                  <p class="card-text col-md-5">Name :</p>
                  <p class="card-text col-md-7" id="customer_name" style="padding-left:0;"></p>
                </div>
                <div class="d-flex">
                  <p class="card-text col-md-5">Email :</p>
                  <p class="card-text col-md-7" id="customer_email" style="padding-left:0;"></p>
                </div>
                <div class="d-flex">
                  <p class="card-text col-md-5">Contact No :</p>
                  <p class="card-text col-md-7" id="customer_contactno" style="padding-left:0;"></p>
                </div>
                <div class="d-flex">
                  <p class="card-text col-md-5">Delivery Address:</p>
                  <p class="card-text col-md-7" id="customer_delivery_address" style="padding-left:0;"></p>
                </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Store Info</h5>
              <div class="d-flex">
                <p class="card-text col-md-5">Store Name: </p>
                <p class="card-text col-md-7" id="store_name" style="padding-left:0;"></p>
              </div>
              <div class="d-flex ">
                <p class="card-text col-md-5">Contact No: </p>
                <p class="card-text col-md-7" id="store_contactno" style="padding-left:0;"></p>
              </div>
              <div class="d-flex ">
                <p class="card-text col-md-5">Address:</p>
                <p class="card-text col-md-7" style="text-align:justify; padding-left:0;" id="store_address"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <hr>
      <div class="row" style="margin:40px 15px 10px 15px; ">

        <div class="col-12" style="text-align:center;">
          <h3 style="text-align: center; color: #838383;">Passed Status</h3>
          <hr>
          <div id="allPassedStatus" class="" style="margin:auto;">

          </div>
        </div>
      </div>
      <div class="row" style="margin:60px 15px 10px 15px; ">
        <h3 class="col-12" style="text-align: center; color: #838383;">Products</h3>
      </div>
      <div class="row" style="margin:0px 15px; ">
        <div class="table-responsive">
          <table class="table stripped-table" style="text-align:center">
            <thead>
              <th>Product</th> 
              <th>Quantity</th>
              <th>Rate</th>
              <th>Discount</th>
              <th style="margin-right:40px;">Amount</th> 
            </thead>
            <tbody id="cartProductTable">

            </tbody>
          </table>
        </div>
      </div> -->
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
    </form>
  </body>
</htmL>

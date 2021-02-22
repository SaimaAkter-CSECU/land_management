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
      <div id="content">

        <?php include_once 'navbar.php' ?>
        <!--tab-->
        <div class="pagecontent">
          <div class="mb-3 pageContentTab">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="btn nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                role="tab" aria-controls="pills-home" aria-selected="true">Products</a>
              </li>
              <li class="nav-item">
                <a class="btn nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                role="tab" aria-controls="pills-profile" aria-selected="false">Add</a>
              </li>
            </ul>
          </div>
          <div class="tab-content productTabContent" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div>
                  <div class="tab-pane fade show active" id="pills-home-tab" role="tabpanel" aria-labelledby="pills-products-tab">
                    <div class="d-flex justify-content-between">
                      <h2 class="pagecontent-title col-md-9">Product List</h2>
                      <button type="button" onclick="showfiltermodal()" class="btn btn-filter col-md-3">Search Product</button>
                    </div>

                    <div class="table-responsive">
                      <table class="table table-bordered" id="storeProductsTable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Rate</th>
                            <th scope="col">Available</th>
                            <th scope="col">Image</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody id="filterproductstable">

                        </tbody>
                      </table>
                    </div>
                    <!-- table responsive div -->

                    <!-- PAGINATION -->
                    <div class="card">
                      <div class="card-body" style="background-color:#fc800a;padding:10px;color:white;font-size:24px">
                        <div class="d-flex justify-content-between">
                          <div class="pagination-button" id='previousproductlists'>
                            <i class="fa fa-arrow-left mb-2"></i>
                          </div>
                          <div id="productpagenodiv" class="pagination-pageno" style="background: #fc800a">
                            <div style="font-size:16px;" id='productpageno'>1</div>
                            <input  id='pagenoinput' placeholder="Enter pageno" value="" class="text-white form-control" type="text" style="background-color:#fc800a;padding:0px;margin:0px 0px;border:none;display:none;text-align:center;font-size:16px;">
                          </div>
                          <div class="pagination-button" id="nextproductlists">
                            <i class="fa fa-arrow-right mb-2"></i>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!-- PRODUCT Tab pane -->

                  <!--  MODALs -->
                  <!--filtermodal-->

                  <div id="filtermodal" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                      <form name="form_filtermodal" id="form_filtermodal">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Filter</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span style="color:white" aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <div class="modal-body" >
                            <div class="row">
                              <div class="col-5">Product Name: </div>
                              <div class="col-5 form-group">
                                <input type="text" id="inputProductName" class="form-control" />
                              </div>
                            </div>

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
                            <button type="submit"  class="btn btn-design" >Search</button>
                          </div>
                        </div>
                    </form>
                    </div>
                  </div>

                  <!-- Update Product Modal -->
                  <div id="updateProductModal" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                      <form name="Form_For_updateStoreProductModal" id="Form_For_updateStoreProductModal">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span style="color:white" aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <div class="modal-body">

                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="productname_edit">Product</label>
                                <input type="text" id="productname_edit" class="form-control" disabled></input>
                              </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="productrate_edit">Price</label>
                                <input type="number" class="form-control" id="productrate_edit" required>
                              </div>
                            </div>
                            
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="productrate_edit">Discount</label>
                                <input type="number" step=".01" class="form-control" id="productdrate_edit" >
                              </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="avail_store_product_edit">Available:</label>
                                <select id="avail_store_product_edit" class="form-control">
                                  <option value="1">Yes</option>
                                  <option value="2">No</option>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="modal-footer">
                            <button type="submit" class="btn btn-design">Update</button>
                          </div>
                        </div>
                    </form>
                    </div>
                  </div>

                  <!-- Update STORE-Product IMAGE MODAL -->
                  <div id="updateStoreProductImageModal" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                      <form name="Form_For_updateStoreProductImageModal" id="Form_For_updateStoreProductImageModal">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 id="storeProductImgModalTitle" class="modal-title">Store-Product Image</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span style="color:white" aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <div class="modal-body">
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="">Store Product Image</label>
                                <div class="input-group">
                                    <span class="input-group-btn" style="border:1px solid #ced4da; border-radius:5px 0px 0px 0px; background-color:#e9ecef; cursor:pointer;">
                                      <span class="btn btn-design btn-file">
                                        <label style="padding:5px 10px; margin:0">Browse</label>
                                        <input type="file" id="imgInput_storeProduct_edit" onchange="validateAndEncodeImageFileAsURL(this)" name="imgInput_storeProduct_edit">
                                      </span>
                                    </span>
                                    <input type="text" style="padding-left:10px" class="form-control" style="padding:0" readonly>
                                </div>
                                <img id='img-upload_storeProduct_edit'/>
                              </div>
                            </div>
                          </div>

                          <div class="modal-footer">
                            <button type="submit" class="btn btn-design">Update Product Image</button>
                          </div>
                        </div>
                    </form>
                    </div>
                  </div>

                </div>
            </div>

            <!-- Add New Product Tab -->
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <!--add new product-->
              <div >
                <div class="col-sm-12 col-12 "><h2 class="pagecontent-title ">Product Lists:</h2></div>
                <form id="addproductForm">
                  <div class="container">
                      <div class="form-group row">
                        <div class="col-2"></div>
                        <div class="col-2">Product Name: </div>
                        <div class="col-6">
                          <select id="productname" class="form-control mdb-select" data-live-search="true" title="Select Product">

                          </select>
                        </div>
                          <div class="col-2"></div>
                      </div>

                      <div class="form-group row">
                          <div class="col-2"></div>
                          <div class="col-2">Rate </div>
                          <div class="col-6">
                        <input type="number" step=".1" class="form-control" id="productRate" maxlength="100" placeholder="" required>
                        </div>
                        <div class="col-2"></div>
                      </div>
                      
                      <div class="form-group row">
                          <div class="col-2"></div>
                          <div class="col-2">Discount </div>
                          <div class="col-6">
                        <input type="number" step=".1" class="form-control" id="productDiscountRate" maxlength="100" placeholder="" >
                        </div>
                        <div class="col-2"></div>
                      </div>

                      <div class="form-group row">
                          <div class="col-2"></div>
                          <div class="col-2">Image </div>
                          <div class="col-md-6 col-12 input-group">
                              <span class="input-group-btn" style="border:1px solid #ced4da; border-radius:5px 0px 0px 0px; background-color:#e9ecef; cursor:pointer;">
                                <span class="btn-default btn-file">
                                  <label style="padding:5px 10px; margin:0">Browse… </label>
                                  <input type="file" id="imgInput_storeProduct" onchange="validateAndEncodeImageFileAsURL(this)" name="imgInput_storeProduct">
                                </span>
                              </span>
                              <input type="text" style="padding-left:10px; border-radius:0px 5px 0px 0px" class="form-control" readonly>
                              <img id='img-upload_storeProduct'/>
                          </div>
                      </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-design" id="addbuttonid">Add Product</button>
                    </div>
                  </div>
                </form>
                <!-- table responsive div -->
              </div>
            </div>
            
            <!-- Tab panes -->
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg==" crossorigin="anonymous"></script>
    <script src="../js/toastr.min.js"></script>

    <script>
      var url = window.location.pathname;
      var filename = url.substring(url.lastIndexOf('/')+1);
      $("#sidebar a[href='"+filename+"']").parent().toggleClass('sidebar-active');
      //localStorage.setItem('cuad_applicant_lastpage',filename);
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $('.navbar').toggleClass('navactive');
                $('.pagecontent').toggleClass('pagecontentactive');

            });
        });
    </script>

       <script type="text/javascript">
         function showfiltermodal(){
           $('#filtermodal').modal('show');
         }
         function showaddmodal(){
           $('#addmodal').modal('show');
         }

       </script>

       <!-- Upload Image -->
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
                  if( log ) toastr.warning(log);
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

          $("#imgInput_store").change(function(){
              readURL(this, 'store');
          });
          $("#imgInput_store_modal").change(function(){
               imageChanged = true;
              readURL(this, 'store_modal');
          });
          $("#imgInput_storeProduct").change(function(){
              readURL(this, 'storeProduct');
          });
          $("#imgInput_storeProduct_edit").change(function(){
               imageChanged = true;
              readURL(this, 'storeProduct_edit');
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

    <!--category name -->
    <script type="text/javascript">
      var category_array = [];

      // Gets product Category from DB on loading
      $.ajax({
        url: 'php/ui/settings/get_last_level_category.php',
        type: 'POST',
        dataType: 'json',
        async: false,
        success: function(resp){
          //console.log(resp);
          var data = resp.lastlevelcategories;
          if(resp.error == true){
            toastr.warning(resp.message);
          }
          else{
            for(i in data){
              category_array[data[i].catno] = data[i].cattitle;
            }
          }
        }
      });

    </script>

    <script type="text/javascript">

      document.getElementById('form_filtermodal').addEventListener('submit', function(event){
        event.preventDefault();
        document.getElementById('productpageno').innerHTML='1';
        searchProducts();
        $('#filtermodal').modal('hide');
      });

      var successflag = 0;
      searchProducts();
      function searchProducts(){
        var pageno = document.getElementById('productpageno').innerHTML;
        var productname = document.getElementById('inputProductName').value;
        var limit = document.getElementById('selectproductlimit').value;
        // the ajax filters store products list from DB on loading
        $.ajax({
          url:'php/ui/product/get_filtered_store_products_store.php',
          data: { pageno:pageno, productname:productname, limit:limit},
          type: 'POST',
          success: function(result){
          result = $.parseJSON(result);
          console.log(result);
            var data = result.filtered_store_products_store;
            if(result.error == true){
              toastr.warning(result.message);
              loadProductList('');
              successflag = 0;
            }
            else{
              loadProductList(data);
              successflag = 1;
            }
          }
        });
      }

      function loadProductList(data){
        $('#filterproductstable tr').remove();
        var ProductPageTable = document.getElementById('filterproductstable');
        var pageno = parseInt(document.getElementById('productpageno').innerHTML);
        var limit = parseInt(document.getElementById('selectproductlimit').value);

        var sl = (pageno-1)*limit;

        for(i in data){
          var row = ProductPageTable.insertRow();
          row.insertCell(0).innerHTML = ++sl;
          row.insertCell(1).innerHTML = data[i].productname;
          row.insertCell(2).innerHTML = category_array[data[i].catno];
          row.insertCell(3).innerHTML = data[i].rate + ' tk';
          row.insertCell(4).innerHTML = (data[i].availability=='1')? 'Yes':'No';

          var img = document.createElement('img');
          img.src = "../"+data[i].imageurl;
          img.id = 'storeProductImg'+data[i].productno;
          img.className = 'table-img';
          row.insertCell(5).appendChild(img);
          
          if(data[i].drate!=null)
          {
              row.insertCell(6).innerHTML = data[i].drate;
          }
          else
          {
              row.insertCell(6).innerHTML = 'N/A';
          }

          var iconDiv = createIcon(i,data[i].productno,'product');
          row.insertCell(7).appendChild(iconDiv);

          (function(i){
            document.getElementById('storeProductImg'+data[i].productno).addEventListener('click',function(){
              UpdateStoreProductImage(data, i);
            });
          }(i));

          (function(i){
            document.getElementById('productEdit'+i).addEventListener('click',function(){
              openUpdateProductModal(data, i);
            });
          }(i));
        }
      }

      // Update Store-Products
      function openUpdateProductModal(data, i){
        $('#updateProductModal').modal('show');

        document.getElementById('productname_edit').value = data[i].productname;
        document.getElementById('productname_edit').dataset.productno = data[i].productno;
        document.getElementById('productrate_edit').value = data[i].rate;
        if(data[i].drate!=null)
        document.getElementById('productdrate_edit').value = data[i].drate;
        else
        {
            document.getElementById('productdrate_edit').value = 0.0;
        }
        document.getElementById('avail_store_product_edit').value = data[i].availability;
      }

      document.getElementById('Form_For_updateStoreProductModal').addEventListener('submit', function(event){
        event.preventDefault();
        var productno = document.getElementById('productname_edit').dataset.productno;
        var rate = document.getElementById('productrate_edit').value;
        var drate = document.getElementById('productdrate_edit').value;
        var availability = document.getElementById('avail_store_product_edit').value;

        $.ajax({
          url: 'php/ui/product/update_a_store_product_store.php',
          data: {productno:productno, rate:rate, availability:availability,drate:drate},
          type: 'POST',
          dataType: 'json',
          success: function(result){
            //console.log(result);

            if(result.error == true){
              toastr.warning(result.message);
            }
            else{
              toastr.success(result.message);
              $('#updateProductModal').modal('hide');
              searchProducts();
            }
          }
        });
      });

      function UpdateStoreProductImage(data, i){
        //console.log(data);
        $('#updateStoreProductImageModal').modal('show');
        document.getElementById('storeProductImgModalTitle').innerHTML = data[i].productname;
        document.getElementById('storeProductImgModalTitle').dataset.imgproductno = data[i].productno;
        $('#img-upload_storeProduct_edit').attr('src', '../'+data[i].imageurl);
        imageChanged = false;
      }

      document.getElementById('Form_For_updateStoreProductImageModal').addEventListener('submit', function(event){
        event.preventDefault();
        var productno = document.getElementById('storeProductImgModalTitle').dataset.imgproductno;
        var img  = document.getElementById('img-upload_storeProduct_edit').src; 
        if(imageChanged == true){   
          // console.log(productno, productno, img);
          $.ajax({
            url: 'php/ui/product/update_a_product_image_store.php',
            data: {productno:productno, productimage:img},
            type: 'POST',
            // dataType: 'json',
            success: function(result){
              // console.log(result);
              result = JSON.parse(result);
              if(result.error == true){
                toastr.warning(result.message);
              }
              else{
                toastr.success(result.message);
                $('#updateStoreProductImageModal').modal('hide');
                searchProducts();
                // location.reload(true);
              }
            }
          });
        }
      });

    </script>

    <!--addproduct-->
    <script>
      /*get all products not in the store*/
      loadProductSelect();
      $('#productname').selectpicker();
      function loadProductSelect(){
        $.ajax({
          url: "php/ui/store/get_all_products.php",
          type: 'POST',
          dataType: 'json',
          async: false,
          success: function(resp){
            //console.log(resp);
            var data = resp.productsnotinthestore;
            if(resp.error == true)
            {
              toastr.warning(resp.message);
            }
            else {
              var productname = document.getElementById('productname');
              for(var i=0; i<data.length; i++){
                productname.innerHTML += `<option value=${data[i].productno}>${data[i].productname}</option>`
              }
            }
            }
          });
      }

      document.getElementById("addproductForm").addEventListener("submit",function(e){
        e.preventDefault();
        addproduct();
      });

      function addproduct(){

        var productno= document.getElementById("productname").value;
        var productrate= document.getElementById("productRate").value;
        var img = document.getElementById('img-upload_storeProduct').src;
        var productdrate= document.getElementById("productDiscountRate").value;

        $.ajax({
          url:'php/ui/store/insert_a_store_product_store.php',
          data: { productno:productno, rate:productrate, imageurl:img, productdrate:productdrate},
          type: 'POST',
          success: function(result){
            console.log(result);
            result = $.parseJSON(result);
            console.log(result);
            //var data = result.filtered_store_products;
            if(result.error == true){
              toastr.warning(result.message);
            }
            else{
              document.getElementById('productname').innerHTML = '';
              loadProductSelect();
              document.getElementById("addproductForm").reset();
              document.getElementById('img-upload_storeProduct').src = '';
              searchProducts();
              toastr.success("insertion done");
            }
          }
        });
      }

      function createIcon(id, no, name){
        var div = document.createElement('div');
        div.id = id;
        div.style ="text-align: center;";

        var icon = document.createElement('i');
        icon.className = 'fa fa-edit';
        icon.id = name+"Edit"+id;
        icon.setAttribute("data-"+name, no);
        icon.style = "cursor:pointer; text-align:center; color: #0294b7;font-size: 20px;";
        div.appendChild(icon);

        return div;
      }

    </script>

    <!-- SCRIPT of PAGINATION  -->
    <script type="text/javascript">
      document.getElementById('productpagenodiv').addEventListener('click',function(){
        hidePageno('pagenoinput','productpageno');
        document.getElementById('pagenoinput').focus();
      });

      document.getElementById('pagenoinput').addEventListener('keypress',function(event){
        if(event.keyCode==13)
        {
          showPageno('pagenoinput','productpageno');
          if(document.getElementById('pagenoinput').value == '')document.getElementById('pagenoinput').value = 1;
          document.getElementById('productpageno').innerHTML = document.getElementById('pagenoinput').value;
          searchProducts();
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
        productpageno = parseInt(document.getElementById('productpageno').innerHTML);
        if(productpageno>1)
        {
          productpageno--;
          document.getElementById('productpageno').innerHTML = productpageno;
          document.getElementById('pagenoinput').value = productpageno;
          searchProducts();
        }
        else {
          // toastr.warning('This is first page');
        }
      });

      document.getElementById('nextproductlists').addEventListener('click',function(){
        productpageno = parseInt(document.getElementById('productpageno').innerHTML);
        productpageno++;
        document.getElementById('productpageno').innerHTML = productpageno;
        document.getElementById('pagenoinput').value = productpageno;
        searchProducts();

        if(successflag == 0){
          productpageno--;
          document.getElementById('productpageno').innerHTML = 1;
          document.getElementById('pagenoinput').value = 1;
          searchProducts();
        }
      });
    </script>


</body>
</html>

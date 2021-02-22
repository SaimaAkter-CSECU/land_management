<?php
  $base_path = dirname(__FILE__);
  include_once($base_path."/php/ui/user/checksession.php");
  $storeno =  $_SESSION['storeno'];
?>

<!DOCTYPE html>
<html>
<?php include_once 'header.php' ?>

<style>
  .categorycontainer{
    position: relative;
    top: 50px;;
  }

  .productImagesRow{
    position: absolute;
    width: 100%;
    height: 260px;
    padding: 0px 0px;
    overflow-x: auto;
    overflow-y: visible;
    display: table-row;
  }

  .adddiv{
    width: 320px;
    height: 100px;
    padding: 0px 10px;
    display: table-cell;
    background-color: #f1f1f1;
  }
  .adddiv:hover{
    background-color: #e6e6e6;
  }

  .imagediv{
    width: 320px;
    height: 160px;
    padding: 0px 5px;
    display: table-cell;
  }

  .imagediv img{
    width: 320px;
    height: 180px;
    border-radius: 5px;
    box-shadow: 1px 1px 5px #a087c4;
  }

  #saveimages :hover{
    background-color: #a087c4;
  }

</style>

<body>


  <div class="wrapper">
    <!-- Sidebar Holder -->
    <?php include_once 'sidebar.php' ?>

    <!-- Page Content Holder -->
    <div id="content">

      <?php include_once 'navbar.php' ?>
      <!--tab-->

      <div class="pagecontent ">
        <div class="mb-3 pageContentTab">
          <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="btn nav-link active" id="pills-displayproduct-tab" data-toggle="pill" href="#pills-displayproduct"
              role="tab" aria-controls="pills-displayproduct" aria-selected="true">Display Product</a>
            </li>

            <li class="nav-item">
              <a class="btn nav-link" id="pills-displaycategory-tab" data-toggle="pill" href="#pills-displaycategory"
              role="tab" aria-controls="pills-displaycategory" aria-selected="true">Display Category</a>
            </li>

            <li class="nav-item">
              <a class="btn nav-link" id="pills-addcategory-tab" data-toggle="pill" href="#pills-addcategory"
              role="tab" aria-controls="pills-addcategory" aria-selected="true">Add Product</a>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="pills-tabContent">

          <div class="tab-pane fade show active" id="pills-displayproduct" role="tabpanel" aria-labelledby="pills-displayproduct-tab">
            <div class="d-flex align-items-center">
              <div class="col-2" style="font-size:20px; color: #8c8c8c;font-weight: 600;">Category Display: </div>
              <div class="form-group col-8" style="margin:0">
                <select id="selectdisplaycat" onchange="loadDisplayProduct()" class="form-control"  style="color: #8c8c8c;font-size: 18px;font-weight: 500;">
                </select>
              </div>
              <div class="col-md-2" style="text-align:left">
                <button  class="btn btn-design" id="DisplayProductGoButton">Search</button>
              </div>
            </div>
            <div class="table-responsive" id="storeProductDisplay">
              <table class="table table-bordered" style="text-align:center">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="storeProductdisplaytable">
                  <!-- <tr>
                    <td colspan="3" style="color: red; font-weight:bold;">Please Select a Category to Display Product</td>
                  </tr> -->
                </tbody>
              </table>
            </div>  <!-- table responsive div -->
          </div>

          <div class="tab-pane fade show" id="pills-displaycategory" role="tabpanel" aria-labelledby="pills-displaycategory-tab">

            <form id="addDisplayCategoryForm" name="addDisplayCategoryForm" class="row">
              <div class="form-group col-12 col-sm-5">
                <label for="allcategories">Select Category</label>
                <select class="form-control selectpicker" id="allcategories" data-live-search="true" title="Select Category">

                </select>
              </div>

              <div class="form-group col-12 col-sm-4">
                <label for="displayorderno_input">Display Order No</label>
                <input type="number" class="form-control" id="displayorderno_input" style="color:#8c8c8c; font-size:16px; font-weight:bold" required />
              </div>

              <div class="col-sm-3">
                <button id="displayCategoryAddButton" type="submit" class="btn btn-design btn-lg" >Add Display Category</button>
              </div>
            </form>

            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Display Order No</th>
                    <th scope="col">Display Category</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="displayCategoryTable">
                </tbody>
              </table>

            </div>  <!-- table responsive div -->
          </div>

          <div class="tab-pane fade show" id="pills-addcategory" role="tabpanel" aria-labelledby="pills-addcategory-tab">
            <form id="add_displayproduct" style="font-size: 18px;">
              <div class="d-flex align-items-center" style="margin-bottom: 1rem">
                <div class="col-3">Select Display Category :</div>
                <div class="form-group col-9" style="margin-bottom:0;">
                  <select id="display_category" onchange="loadDisplayProduct_atSelect()" class="form-control mdb-select selectpicker" data-live-search="true" title="Select Display Category">
                  </select>
                </div>
              </div>
              <div class="d-flex">
                <div class="col-3">Select Product :<div><small>(Products not in display)</small></div> </div>
                <div class="form-group col-9">
                  <select id="display_category_product" class="form-control mdb-select selectpicker" data-live-search="true" title="Select Display Product"  data-hide-disabled="true">
                  
                  </select>
                </div>
              </div>
              <div class="d-flex">
                <div class="col-3"></div>
                <div class="form-group col-9">
                  <button id="add_displayproduct_btn" type="submit" class="btn btn-design">Add Product</button>
                </div>
              </div>
              
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>


  <!-- categoryDisplay update MODAL -->
  <div id="categoryDisplaymodal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <form id="update_category">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#563d7c; color:#fff">
            <h5 class="modal-title">Category Display</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span style="color:white" aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="row">
              <div class="col-5">Category: </div>
              <div class="form-group col-5">
                <select id="upadteModalCategory" class="form-control" disabled>

                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-5">Display Order No: </div>
              <div class="form-group col-5">
                <div class="input-group" >
                  <input type="number" class="form-control" id="displayorderno">
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- update MODAL -->
  <!-- categoryDisplay add button MODAL -->
  <div id="addcategorymodal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <form id="add_category">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#563d7c; color:#fff">
            <h5 class="modal-title">Category Display</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span style="color:white" aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="row">
              <div class="col-5">Category: </div>
              <div class="form-group col-5">
                <select id="insertCategory" class="form-control">

                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-5">Display Order No: </div>
              <div class="form-group col-5">
                <div class="input-group" >
                  <input type="number" class="form-control" id="insertdisplayorderno">
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- add button MODAL  ending(category display)-->

  <!-- categoryDisplayProduct add button MODAL -->
  <div id="addDisplayProductmodal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <form id="add_displayproduct">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#563d7c; color:#fff">
            <h5 class="modal-title">Category Display</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span style="color:white" aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="row">
              <div class="col-5">Display Type: </div>
              <div class="form-group col-5">
                <select id="displaytype_modal" onchange="loadDisplayProduct_atSelect()" class="form-control">
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-5">Products not in dispaly: </div>
              <div class="form-group col-5">
                <select id="displaytypeproduct_modal" class="form-control">
                </select>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </div>
      </form>
    </div>
  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg==" crossorigin="anonymous"></script>
    <script src="../js/toastr.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('.selectpicker').selectpicker();
      });
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

  <script>
    var url = window.location.pathname;
    var filename = url.substring(url.lastIndexOf('/')+1);
    $("#sidebar a[href='"+filename+"']").parent().toggleClass('sidebar-active');
    //localStorage.setItem('cuad_applicant_lastpage',filename);
  </script>

  <script type="text/javascript">
    // get_store_page_display_category


    loadDisplayCategoryTable();
    // $('#selectdisplaycat').selectpicker();
    function loadDisplayCategoryTable(){
      $.ajax({
        url:'php/ui/store/get_store_page_display_category.php',
        type: 'POST',
        async: false,
        success: function(resp){
          resp = $.parseJSON(resp);
          console.log(resp);
          if(resp.error){
            toastr.error(resp.message);
          }
          else{
            var data = resp.storedisplaycategory;
            document.getElementById('selectdisplaycat').innerHTML="";
            for(i in data){
              var option = document.createElement('option');
              option.value = data[i].categoryno;
              option.innerHTML = data[i].cattitle;
              document.getElementById('selectdisplaycat').appendChild(option);
            }
            document.getElementById('display_category').innerHTML = document.getElementById('selectdisplaycat').innerHTML;

            var displayCategoryTable  = document.getElementById('displayCategoryTable');
            $("#displayCategoryTable tr").remove();
            for(i in data){
              var row = displayCategoryTable.insertRow();
              row.insertCell(0).innerHTML = data[i].displayorderno;
              row.insertCell(1).innerHTML = data[i].cattitle;

              var catno = data[i].categoryno;
              var deleteIcon = document.createElement('div');
              deleteIcon.id = "catnoDelete"+catno; 
              deleteIcon.setAttribute("data-catno", i);
              deleteIcon.className = "deleteBtn"; 
              deleteIcon.innerHTML = `<i class="fas fa-times"></i>`;
              row.insertCell(2).appendChild(deleteIcon);

              (function(catno){
                document.getElementById('catnoDelete'+catno).addEventListener('click',function(){
                  if(confirm("Are you Sure?")) deleteCategoryFromDisplay(catno);
                });
              }(catno));
            }
          }
        }
      });
    }

    loadDisplayProduct();
    function loadDisplayProduct(){
      var displaycatno = document.getElementById('selectdisplaycat').value;
      // console.log(displaycatno);
      $.ajax({
        url: "php/ui/product/get_store_page_display_products.php",
        data:{catno:displaycatno},
        type: "POST",
        success: function(resp){
          resp = $.parseJSON(resp);
          // console.log(resp);
          if(resp.error){
            document.getElementById('storeProductdisplaytable').innerHTML = '';
            var noCatProductRow = document.getElementById('storeProductdisplaytable').insertRow();
            var noCatProductRowCell = noCatProductRow.insertCell(0);
            noCatProductRowCell.colSpan = 3;
            noCatProductRowCell.style= 'color: darkred; font-weight: 600;';
            noCatProductRowCell.innerHTML = 'No Product Found';
            toastr.error(resp.message);
          }
          else{
            var data = resp.storedisplayproducts;
            // console.log("storedisplayproducts: ", data);
            var table = document.getElementById('storeProductdisplaytable');
            // table.innerHTML = '';
            $('#storeProductdisplaytable tr').remove();
            for(var i in data){
              var row = table.insertRow();
              row.insertCell(0).innerHTML = parseInt(i)+1;
              row.insertCell(1).innerHTML = data[i].productname;

              var productno = data[i].productno;
              var deleteIcon = document.createElement('div');
              deleteIcon.id= `catproductDelete${productno}`;
              deleteIcon.setAttribute("data-catproduct", i);
              deleteIcon.className = "deleteBtn"; 
              deleteIcon.innerHTML = `<i class="fas fa-times"></i>`;
              row.insertCell(2).appendChild(deleteIcon);

              (function(productno, displaycatno){
                document.getElementById(`catproductDelete${productno}`).addEventListener('click',function(){
                  if(confirm("Are you Sure?")) deleteProductFromDisplay(productno, displaycatno);
                });
              }(productno, displaycatno));
            }
          }
        }
      });
    }

    loadDisplayProduct_atSelect();
    // $('#display_category').selectpicker();
    // $('#display_category_product').selectpicker('refresh');
    
    function loadDisplayProduct_atSelect(){
      var displaycat = document.getElementById('display_category').value;
      // console.log(displaycat);
      $.ajax({
        url: "php/ui/product/get_store_products_not_in_display.php",
        data:{catno:displaycat},
        type: "POST",
        success: function(resp){
          resp = $.parseJSON(resp);
          // console.log(resp);
          if(resp.error){
            toastr.error(resp.message);
          }
          else{
            var data = resp.storedisplayproducts;
            console.log("data: ", data);
            document.getElementById('display_category_product').innerHTML = "";
            var display_category_product = document.getElementById('display_category_product'); 
            for(let i=0; i<data.length; i++){
              display_category_product.innerHTML += `<option value="${data[i].productno}"> ${data[i].productname} </option>`; 
            }
          }
          $('#display_category_product').selectpicker('refresh');
        }
      });
    }

    document.getElementById('add_displayproduct').addEventListener('submit', function(e){
      e.preventDefault();
      var catno = document.getElementById('display_category').value;
      var productno = document.getElementById('display_category_product').value;
      console.log(catno, productno);

      $.ajax({
        url:'php/ui/product/insert_store_product_in_display.php',
        data:{catno:catno, productno:productno},
        type: 'POST',
        async: false,
        success: function(resp){
          resp = $.parseJSON(resp);
          console.log(resp);
          if(resp.error){
            toastr.error(resp.message);
          }
          else{
            // $('#addDisplayProductmodal').modal("hide");
            toastr.success(resp.message);
            document.getElementById('selectdisplaycat').value = document.getElementById('display_category').value;
            loadDisplayProduct();
            loadDisplayProduct_atSelect();
          }
        }
      });
    });

    function deleteProductFromDisplay(productno, displaycatno){
      console.log(productno, displaycatno);
      $.ajax({
        url: "php/ui/product/delete_a_store_product_from_display.php",
        data:{productno:productno, catno:displaycatno},
        type: "POST",
        success: function(resp){
          // console.log(resp);
          resp = $.parseJSON(resp);
          console.log(resp);
          if(resp.error){
            toastr.error(resp.message);
          }
          else{
            loadDisplayProduct();
            // loadDisplayProduct_atSelect();
            toastr.success(resp.message);
          }
        }
      });
    }

    function createIcon(id, no, name){
      var div = document.createElement('div');
      div.id = id;

      var icon = document.createElement('i');
      icon.className = 'fa fa-times';
      icon.id = name+"Delete"+id;
      icon.setAttribute("data-"+name, no);
      icon.style = "cursor:pointer; margin-right:5px; color:red";
      div.appendChild(icon);

      return div;
    }
  </script>

  <!-- Display Type Tab -->
  <!-- scripts start from here -->
  <script type="text/javascript">

    getCategoriesNotInStore();
    function getCategoriesNotInStore(){
      $.ajax({
        url:'php/ui/settings/get_store_display_categories_not_in_store.php',
        type: 'POST',
        async: false,
        success: function(resp){
          resp = $.parseJSON(resp);
          // console.log(resp);
          document.getElementById('allcategories').innerHTML = "";
          if(resp.error){
            // toastr.error(resp.message);
          }
          else{
            var data = resp.storedisplaycategory;
            var allcategories = document.getElementById('allcategories'); 
            for(let i = 0; i < data.length; i++){
              allcategories.innerHTML += `<option value="${data[i].catno}">${data[i].cattitle}</option>`;
            }
          }
        }
      });
    }

    document.getElementById('addDisplayCategoryForm').addEventListener('submit', function(e){
      e.preventDefault();
      var catno = document.getElementById('allcategories').value;
      var displayno = document.getElementById('displayorderno_input').value;
      $.ajax({
        url: "php/ui/settings/add_display_category_to_a_store.php",
        data: {catno:catno, displayno:displayno},
        type: "POST",
        success: function(resp){
          resp = $.parseJSON(resp);
          // console.log(resp);
          if(resp.error){
            toastr.error(resp.message);
          }else{
            toastr.success(resp.message);
            getCategoriesNotInStore();
            loadDisplayCategoryTable();
          }
        }
      });
    });

    function deleteCategoryFromDisplay(catno){
      $.ajax({
        url: "php/ui/settings/delete_store_display_category.php",
        data: {catno:catno},
        type: "POST",
        success: function(resp){
          // console.log(resp);
          resp = $.parseJSON(resp);
          console.log(resp);
          if(resp.error){
            toastr.error(resp.message);
          }else{
            getCategoriesNotInStore();
            loadDisplayCategoryTable();
            toastr.success(resp.message);
          }
        }
      });
    }
  </script>

</body>
</html>

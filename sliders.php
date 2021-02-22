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
      <?php include_once 'sidebar.php' ?>

      <div id="content">
        <?php include_once 'navbar.php' ?>

        <div class="pagecontent ">

          <div class="mb-3 pageContentTab">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="btn nav-link active" id="pills-mainslider-tab" data-toggle="pill" href="#pills-mainslider"
                role="tab" aria-controls="pills-mainslider" aria-selected="true">Main Slider</a>
              </li>
              <li class="nav-item">
                <a class="btn nav-link" id="pills-groupslider-tab" data-toggle="pill" href="#pills-groupslider"
                role="tab" aria-controls="pills-groupslider" aria-selected="false">Group Slider</a>
              </li>
            </ul>
          </div>

          <div class="tab-content" id="pills-tabContent" style="padding: 10px 20px;">
            <div class="tab-pane fade show active" id="pills-mainslider" role="tabpanel" aria-labelledby="pills-mainslider-tab">
              <!-- <div>
                Upload images for Slider of your Brand Page:
                <hr>
              </div> -->
              <div>
                <h2 class="pagecontent-title">Upload images for Slider of your Brand Page:</h2>
              </div>

              <div class="categorycontainer">
                <div id="imagerow_mainslider" class="productImagesRow">
                </div>
                <input type="file" id="inputimg_mainslider" onchange="readURLMainslider(this)" accept="image" style="display:none">
              </div>

              <div class="categorycontainer">
                <div id="saveimages_mainslider" class="btn btn-design">Save Image</div>
              </div>
            </div>

            <!-- Add New Product Tab -->
            <div class="tab-pane fade" id="pills-groupslider" role="tabpanel" aria-labelledby="pills-groupslider-tab">
              <div>
                <h2 class="pagecontent-title">Upload images for Category Slider of your Brand Page:</h2>
                <hr>
              </div>
              <div class="d-flex align-items-center" style="margin-bottom: 30px; margin-top:20px;">
                <div class="col-md-3" style="font-size: 18px; font-weight: 500; padding: 0;">
                  Select Category for Category Slider
                </div>
                <div class="col-md-9">
                  <select id="selectcategory" onchange="getDispalySliderImages()" class="form-control mdb-select selectpicker" data-live-search="true" title="Select Display Category" style="font-weight:bold; color:#3b2a55">

                  </select>
                </div>
              </div>


              <div>
                <div id="imagerow_groupslider" class="productImagesRow">
                </div>
                <input type="file" id="inputimg_groupslider" onchange="readURLGroupslider(this)" accept="image" style="display:none">
              </div>

              <button id="saveimages_groupslider" class="btn btn-design" style="top:250px; display:flex; margin:auto;">Save Category Slider Image</button>

            </div>

          </div>
        </div>

      </div>

    </div>


    <!-- </div>
    </div>
    </div> -->

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

    <!-- Upload Image for Both Mainslider & Groupslider-->
    <script type="text/javascript">
        var imageFiles_mainslider = [];
        var imageFiles_groupslider = [];
        var imageEncoded, numberofnewimg_M=0, numberofnewimg_G=0;

        function readURLMainslider(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imageEncoded = e.target.result;
                loadImg(imageEncoded, 'mainslider', 'newM', numberofnewimg_M);
                imageFiles_mainslider[numberofnewimg_M++] = document.getElementById('inputimg_mainslider').files[0];
            }
            reader.readAsDataURL(input.files[0]);
          }
        }

        function readURLGroupslider(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imageEncoded = e.target.result;
                loadImg(imageEncoded, 'groupslider', 'newN', numberofnewimg_G);
                imageFiles_groupslider[numberofnewimg_G++] = document.getElementById('inputimg_groupslider').files[0];
            }
            reader.readAsDataURL(input.files[0]);
          }
        }

        // get_store_page_display_category
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
                // console.log(data);
                document.getElementById('selectcategory').innerHTML = ''; 
                for(let i= 0; i < data.length; i++){
                  document.getElementById('selectcategory').innerHTML += `<option value="${data[i].categoryno}">${data[i].cattitle}</option>`;
                }
            }
          }
        });

    </script>

    <!-- main script -->
    <script type="text/javascript">

      getMainSliderImages();
      function getMainSliderImages(){
        $.ajax({
          url: 'php/ui/slider/get_store_main_slider.php',
          type: 'POST',
          success: function(resp){
            resp = $.parseJSON(resp);
            // console.log(resp);
            document.getElementById('imagerow_mainslider').innerHTML = '';
            loadaddButton('mainslider');
            if(!resp.error){
              var data = resp.data;
              for(i in data){
                loadImg("assets/images/storemasterslider/"+data[i].storeimages, 'mainslider', 'm', data[i].slno);
              }
            }
          }
        });
      }

      // getDispalySliderImages();
      function getDispalySliderImages(){
        var catno = document.getElementById('selectcategory').value;
        // console.log(catno)
        $.ajax({
          url: 'php/ui/slider/get_display_category_slider.php',
          data: {catno:catno},
          type: 'POST',
          success: function(resp){
            resp = $.parseJSON(resp);
            console.log(resp);
            document.getElementById('imagerow_groupslider').innerHTML = '';
            loadaddButton('groupslider');
            if(!resp.error){
              var data = resp.data;
              for(i in data){
                loadImg("assets/images/storetypeslider/"+data[i].imageurl, 'groupslider', data[i].typeno, data[i].slno);
              }
            }
          }
        });
      }


      loadaddButton('mainslider');
      loadaddButton('groupslider');

      function loadImg(imgsrc, ext, typeno, slno){
        var imagediv = document.createElement('div');
        imagediv.id = 'image'+typeno+slno;
        imagediv.className = 'imagediv';

        var img = document.createElement('img');
        img.src = imgsrc;
        img.id = 'img_'+typeno+slno;
        imagediv.appendChild(img);

        var imagerow = document.getElementById('imagerow_'+ext);
        var lastnodeindex = imagerow.childNodes.length;
        imagerow.insertBefore(imagediv, imagerow.childNodes[lastnodeindex-1]);

        if(typeno == 'newM' || typeno=='newN'){
          // do nothing
        }else{
          var deletediv = document.createElement('div');
          deletediv.className = 'btn'; 
          deletediv.style = 'text-align: center; margin-top:5px; padding:8px 20px; float:right; background-color:red; color:white; cursor:pointer; border-radius: 15px;';
          deletediv.innerHTML = 'Delete';
          deletediv.id = 'delete_'+typeno+slno;
          imagediv.appendChild(deletediv);

          (function(typeno, slno){
            document.getElementById('delete_'+typeno+slno).addEventListener('click', function(){
              var isconfirmed = confirm("Are you sure?");
              if(isconfirmed) DeleteImage(typeno, slno);
            });
          })(typeno, slno);
        }
        // if(ext=='mainslider')console.log(imageFiles_mainslider, imageFiles_mainslider.length);
        // else if(ext=='groupslider') console.log(imageFiles_groupslider, imageFiles_groupslider.length+1);
      }

      function DeleteImage(typeno, slno){
        // mainslider
        if(typeno=='m'){
          $.ajax({
            url: "php/ui/slider/delete_mainslider_image.php",
            data: {slno:slno},
            type: 'POST',
            success: function(resp){
              // console.log(resp);
              resp = $.parseJSON(resp);
              toastr.success(resp.message);
              if(!resp.error){
                getMainSliderImages();
              }
            }
          });
        }
        // Group slider
        else{
          $.ajax({
            url: "php/ui/slider/delete_typeslider_image.php",
            data: {typeno:typeno, slno:slno},
            type: 'POST',
            success: function(resp){
              // console.log(resp);
              resp = $.parseJSON(resp);
              toastr.success(resp.message);
              if(!resp.error){
                getDispalySliderImages();
              }
            }
          });
        }
      }

      function loadaddButton(ext){
        var adddiv = document.createElement('div');
        adddiv.id = 'addimage_'+ext;
        adddiv.className = 'adddiv';
        adddiv.style="border:1px solid gray; border-radius:5px; cursor:pointer";

        var div = document.createElement('div');
        div.style = "width:320px; padding:50px 0px";
        adddiv.appendChild(div);

        var plusdiv = document.createElement('div');
        plusdiv.style="text-align:center; font-size:32px; font-weight:bold";
        plusdiv.innerHTML = '+';
        div.appendChild(plusdiv);

        var textdiv = document.createElement('div');
        textdiv.style = "text-align:center; font-weight:bold";
        textdiv.innerHTML = 'Add Image';
        div.appendChild(textdiv);

        document.getElementById('imagerow_'+ext).appendChild(adddiv);

        document.getElementById('addimage_'+ext).addEventListener('click', function(){
            if(ext == 'mainslider') $("input[id='inputimg_mainslider']").click();
            else if(ext=='groupslider') $("input[id='inputimg_groupslider']").click();
        });
      }

      // Save slider Images - Mainslider
      document.getElementById('saveimages_mainslider').addEventListener('click', function(){
        var formData = new FormData();
        for(i in imageFiles_mainslider){
          formData.append('storeimage[]', imageFiles_mainslider[i]);
        }
        formData.append('length', imageFiles_mainslider.length+1);

        // console.log(formData);
        $.ajax({
          url: "php/ui/slider/insert_store_mainslider.php",
          data: formData,
          type: 'POST',
          processData: false,
          contentType: false,
          success: function(resp){
            // console.log(resp);
            resp = $.parseJSON(resp);
            // console.log(resp);
            for(i in resp){
              if(resp.error){
                toastr.error(resp[i].message);
              }
              else{
                toastr.success(resp[i].message);
              }
            }
            imageFiles_mainslider = [];
            getMainSliderImages();
          }
        });
      });

      // Save slider Images - Displayslider
      document.getElementById('saveimages_groupslider').addEventListener('click', function(){
        var catno = document.getElementById('selectcategory').value;
        if(catno<0){
          toastr.error("Please select a Category");
          return;
        }
        // console.log(catno);

        // $.ajax({
        //   url: "php/ui/slider/get_storepagedisplayno_category_slider.php",
        //   data: {catno:catno},
        //   type: 'POST',
        //   processData: false,
        //   contentType: false,
        //   success: function(resp){
        //     resp = $.parseJSON(resp);
        //     console.log(resp);
        //     if(resp.error){
        //       toastr.error(resp[i].message);
        //     }
        //     else{
        //       toastr.success(resp[i].message);
        //     }
            
        //   }
        // });

        var formData = new FormData();
        for(i in imageFiles_groupslider){
          formData.append('storeimage[]', imageFiles_groupslider[i]);
        }
        formData.append('catno', catno);
        // console.log(imageFiles_groupslider);
        $.ajax({
          url: "php/ui/slider/insert_store_category_slider.php",
          data: formData,
          type: 'POST',
          processData: false,
          contentType: false,
          success: function(resp){
            // console.log(resp);
            resp = $.parseJSON(resp);
            console.log(resp);
            for(i in resp){
              if(resp.error){
                toastr.error(resp[i].message);
              }
              else{
                toastr.success(resp[i].message);
              }
            }
            imageFiles_groupslider = [];
            getDispalySliderImages();
          }
        });
      });

    </script>

  </body>
</html>

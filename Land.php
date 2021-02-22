<!DOCTYPE html>
<html>
    <?php 
      include_once 'header.php' ; 
      include_once("php/ui/user/checksession.php");
      $userno =  $_SESSION['userno'];
    ?>

  <body>
    <?php include_once 'navbar.php' ?>
    <!-- <nav class="navbar navbar-expand-lg ftco_navbar bg-white ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="Land.php" style="font-size: 1.15rem;"><span class="flaticon-auction"></span>DLM System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
        </button>
    
        <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="Land.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
          <li class="nav-item"><a href="search_land.php" class="nav-link">Land Information</a></li>
          <li class="nav-item"><a href="search_owner.php" class="nav-link">Owner Information</a></li>
          <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
          <li class="nav-item"><a href="dashboard.php" class="nav-link">Dashboard</a></li>
          <li class="nav-item"><a href="index.php" class="nav-link">Logout</a></li>
        </ul>
        </div>
      </div>
    </nav> -->
    <!-- END nav -->
      
      <section class="home-slider js-fullheight owl-carousel">
        <div class="slider-item js-fullheight" style="background-image:url(assets/images/background/images/hero_3.jpg);">
          <div class="overlay"></div>
          <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
              <div class="col-md-7 text ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-4" data-scrollax="properties: { translateY: '30%' }">Digital Land Management and Ownership Transfer System with Judicial Support</h1>
                <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">A Step to Fair, Faster and Transparent System for Land Issues with Judicial support at Bangladesh.</p>
                <!-- <p><a href="#" class="btn btn-white btn-outline-white px-4 py-3 mt-3" data-toggle="modal" data-target="#modalRequest">Search Land Information</a></p> -->
              </div>
            </div>
          </div>
        </div>
  
        <div class="slider-item js-fullheight" style="background-image:url(assets/images/background/images/banner4.jpg);">
          <div class="overlay"></div>
          <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
              <div class="col-md-7 text ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                <h1 class="mb-4" data-scrollax="properties: { translateY: '30%'}">Digital Land Management and Ownership Transfer System with Judicial Support</h1>
                <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">A Step to Fair, Faster and Transparent System for Land Issues with Judicial support at Bangladesh.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      
    <section class="ftco-section ftco-services">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-lg-4">
            <form action="#" class="getaquote-form">
              <h3>Search A Land</h3>
              <div class="wrap">
                <div class="form-group">
                  <label for="division">Select Division</label> <br>
                  <select class="form-select form-select-lg w-100 p-2 color" name="select_div" id="select_div">
                  </select>
                </div>
                <div class="form-group">
                  <!-- <input type="text" class="form-control" placeholder="Email Address"> -->
                  <label for="division">Select District</label> <br>
                  <select class="form-select w-100 p-2 color" name="select_dist" id="select_dist">
                  </select>
                </div>
                <div class="form-group">
                  <!-- <input type="text" class="form-control" placeholder="Email Address"> -->
                  <label for="division">Select Thana</label> <br>
                  <select class="form-select w-100 p-2 color" name="select_thana" id="select_thana">
                  </select>
                </div>
                <div class="form-group">
                  <!-- <input type="text" class="form-control" placeholder="Email Address"> -->
                  <label for="division">Enter Sheet No</label> <br>
                  <input type="text" class="form-control" placeholder="Enter Sheet No" />
                </div>
                <div class="form-group">
                  <!-- <input type="text" class="form-control" placeholder="Email Address"> -->
                  <label for="division">Enter Mouza No</label> <br>
                  <input type="text" class="form-control" placeholder="Enter Mouza No" />
                </div>
                <div class="form-group">
                  <!-- <input type="text" class="form-control" placeholder="Email Address"> -->
                  <label for="division">Enter Daag No</label> <br>
                  <input type="text" class="form-control" placeholder="Enter Daag No" />
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-design py-2">Search Land Information</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-7 col-lg-8">
            <div class="row pl-md-4">
              <div class="col-lg-6 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-flex">
                  <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-bar-chart"></span>
                  </div>
                  <div class="media-body pl-4">
                    <h3 class="heading">Land Infromation</h3>
                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                  </div>
                </div>      
              </div>
              <div class="col-lg-6 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-flex">
                  <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-family-room"></span>
                  </div>
                  <div class="media-body pl-4">
                    <h3 class="heading">Owner Information</h3>
                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                  </div>
                </div>    
              </div>
              <div class="col-lg-6 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-flex">
                  <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-bar-chart"></span>
                  </div>
                  <div class="media-body pl-4">
                    <h3 class="heading">Land Transaction</h3>
                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                  </div>
                </div>      
              </div>
              <div class="col-lg-6 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-flex">
                  <div class="icon d-flex justify-content-center align-items-center">
                    <span class="flaticon-family-room"></span>
                  </div>
                  <div class="media-body pl-4">
                    <h3 class="heading">Know Successors</h3>
                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                  </div>
                </div>      
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  
    <section class="ftco-section ftc-no-pb" id="about">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/images/background/images/banner4.jpg);">
            <a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
              <span class="icon-play"></span>
            </a>
          </div>
          <div class="col-md-7 wrap-about pb-md-5 ftco-animate">
        <div class="heading-section mb-5 pl-md-5">
        <div class="pl-md-5 ml-md-5">
          <span class="subheading">Overview</span>
          <h2 class="mb-4">Learned about the Our System</h2>
        </div>
        </div>
        <div class="pl-md-5 ml-md-5 mb-5">
              <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
              <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
              <p><a href="#" class="btn-custom">Learn More <span class="ion-ios-arrow-forward"></span></a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
  
  
    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(assets/images/background/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row d-md-flex align-items-center">
          <div class="col-lg-4">
            <div class="heading-section pl-md-5 heading-section-white">
          <div class="ftco-animate">
            <span class="subheading">Some</span>
            <h2 class="mb-4">Interesting Facts</h2>
          </div>
        </div>
          </div>
          <div class="col-lg-8">
            <div class="row d-md-flex align-items-center">
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
            <div class="text">
              <strong class="number" data-number="18000">0</strong>
              <span>Pending Cases</span>
            </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
            <div class="text">
              <strong class="number" data-number="1000">0</strong>
              <span>No. of Judges</span>
            </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
            <div class="text">
              <strong class="number" data-number="1230">0</strong>
              <span>Solved Cases</span>
            </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
            <div class="text">
              <strong class="number" data-number="800">0</strong>
              <span>Winning Case</span>
            </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
    </section>
  
    <section class="ftco-section ftc-no-pb">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center order-md-last" style="background-image: url(assets/images/background/images/banner-4.jpg);">
          </div>
          <div class="col-md-7 wrap-about ftco-animate">
            <div class="heading-section mb-5 pl-md-5">
              <div class="pr-md-5 mr-md-5 text-md-right">
                <span class="subheading">Services</span>
                <h2 class="mb-4">The Facilities It Provides</h2>
              </div>
            </div>
            <div class="pr-md-5 pl-md-5 mr-md-5 mb-5">
              <div class="services-wrap d-flex">
              <div class="icon d-flex justify-content-center align-items-center">
                  <span class="flaticon-balance"></span>
              </div>
              <div class="media-body pr-4 order-md-first text-md-right">
                <h3 class="heading">Get Land Information</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
              </div>
              <div class="services-wrap d-flex">
              <div class="icon d-flex justify-content-center align-items-center">
                  <span class="flaticon-balance"></span>
              </div>
              <div class="media-body pr-4 order-md-first text-md-right">
                <h3 class="heading">Get Land Transaction History</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
              </div>
              <div class="services-wrap d-flex">
              <div class="icon d-flex justify-content-center align-items-center">
                  <span class="flaticon-balance"></span>
              </div>
              <div class="media-body pr-4 order-md-first text-md-right">
                <h3 class="heading">Get Land Owners Information</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
              </div>
              <div class="services-wrap d-flex">
              <div class="icon d-flex justify-content-center align-items-center">
                  <span class="flaticon-balance"></span>
              </div>
              <div class="media-body pr-4 order-md-first text-md-right">
                <h3 class="heading">Get Land Owners Information</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  
    <!-- <section class="ftco-section bg-primary">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          <span class="subheading">Working Process</span>
          <h2 class="mb-4">Our Working Way</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
          </div>
        </div>	
        <div class="row steps d-flex">
          <div class="col-md-4 d-flex ftco-animate">
            <div class="step d-flex align-self-stretch">
              <span>#01</span>
              <h3>Analyzing Case</h3>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="step d-flex align-self-stretch">
              <span>#02</span>
              <h3>Research &amp; Investigation</h3>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="step d-flex align-self-stretch">
              <span>#03</span>
              <h3>Court of Law Success</h3>
            </div>
          </div>
        </div>
      </div>
    </section> -->
  
  
    <!-- Contact Section   -->
    <section id="contact" class="ftco-section ftc-no-pb ftc-no-pt bg-light">
      <div class="container">
        <div class="row no-gutters">
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
              <h2 class="ftco-heading-2">DLM System</h2>
              <p>This supports E-Judiciary in Land Issues, is a step to ensure a Fair, Faster and Transparent Judicial Service At Bangladesh for Land related cases.</p>
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
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script> -->
    <script src="js/main.js"></script>

    <script>
        load_division();
        load_district();
        load_thana();

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
                      // console.log(division); 
                      for(const i in division){
                        // console.log(division[i]);
                        document.getElementById('select_div').innerHTML += 
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
                      // console.log(division); 
                      for(const i in district){
                        // console.log(division[i]);
                        document.getElementById('select_dist').innerHTML += 
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
                      console.log(thana); 
                      for(const i in thana){
                        // console.log(division[i]);
                        document.getElementById('select_thana').innerHTML += 
                          `<option value="${thana[i].thana_id}">${thana[i].thana_name}</option>`; 
                      }
                    }
                }
            });
        }
    </script>
      
    </body>
 </html>

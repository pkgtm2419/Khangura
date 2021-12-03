<?php include_once("header.php");?>
  
  <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-dark" data-bg-img="images/bg/bg2.jpg">
      <div class="container pt-30 pb-30">
        <!-- Section Content -->
        <div class="section-content text-center">
          <div class="row"> 
            <div class="col-md-6 col-md-offset-3 text-center">
              <h2 class="text-theme-colored font-36">Contact Us</h2>
            </div>
          </div>
        </div>
      </div>      
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
          <div class="col-md-6">
            <h3>BKP Media Vision Pvt. Ltd. Studio & Office Complex</h3>
              <ul>
                <p><i class="fa fa-home" style="font-size: 25px;"></i><b>FC-16, Sector-16A, Film City Noida-201 301 (UP) India</b></p>
                <p><i class="fa fa-phone" style="font-size: 22px;"></i><b>Phone Number: +91-9811115647</b></p>
                <p>
                  <i class="fa fax" style="font-size: 22px;"></i><b>Fax: 0120-4543828</b>
                </p>
                <p class="envelope">
                  <i class="fa fa-envelope" style="font-size: 22px;"></i>
                  <b>mediavisionpvtltd@yahoo.co.in</b>
                </p>
              </ul>
            </div>
            <div class="col-md-6">
              <ul>
                <h3>Mumbai Office</h3>
                <p> <i class="fa fa-home" style="font-size: 25px;"></i><b> 201, Deep Tower(Near Samarth Park), Indradarshan Cross Road, Oshiwara,Andheri(W) Mumbai-400 053</b></p>
                <p class="envelope">
                  <i class="fa fa-envelope" style="font-size: 22px;"></i>
                  <b>Email: mediavisionpvtltd@yahoo.co.in</b>
                </p>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
          <div class="col-md-6">
             <h3>&nbsp;&nbsp;Contact Form</h3>
            <form id="volunteer_apply_form" name="job_apply_form" action="action.php" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_name">Name <small>*</small></label>
                    <input id="form_name" name="form_name" type="text" placeholder="Enter Name" required="" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_email">Mobile <small>*</small></label>
                    <input id="form_email" name="form_email" class="form-control required email" type="email" placeholder="Enter Mobile">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="form_branch">Address <small>*</small></label>
                   <textarea id="form_message" name="address" class="form-control required" rows="3" placeholder="Enter Your Address"></textarea>
                  </div>
                </div>
                </div>
             
              <div class="row">               
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="form_sex">Email <small>*</small></label>
                 <input id="form_email" name="form_email" class="form-control required email" type="email" placeholder="Enter Email">
                  </div>
                </div>
                
              </div>
              <div class="form-group">
                <label for="form_message">Message <small>*</small></label>
                <textarea id="form_message" name="form_message" class="form-control required" rows="5" placeholder="Your cover letter/message sent to the employer"></textarea>
              </div>
              <div class="form-group">
                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                <button type="submit" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" data-loading-text="Please wait...">Submit</button>
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <p style="text-align: right; margin-top: 10px;"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28032.76641439175!2d77.29580240147406!3d28.56688579551706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce446ee08ee73%3A0x64ba85f1f8e0a772!2sNoida+Film+City!5e0!3m2!1sen!2sin!4v1554627453960!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></p>
        </div>
      </div>
      </div>

    </section>
  </div>
  <!-- end main-content -->

  
 <?php include_once("footer.php");?>
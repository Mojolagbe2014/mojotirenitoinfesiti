<section>
    
    <div class="row">


        
        </div><!---->
        <div class="container-wrapper">
            <div class="container">
                <div class="row">
  
                    <div class="col-lg-12 col-md-12 col-sm-12">
                     <iframe id="map-frame" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2574.1070166052727!2d-97.2040127!3d49.821653800000014!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52ea751665c3feb5%3A0x5abc9fe2927f2c59!2s1660+Kenaston+Blvd+%23700037%2C+Winnipeg%2C+MB+R3P+2M6!5e0!3m2!1sen!2sca!4v1427290646161" width="500" height="350" frameborder="0" style="border:0"></iframe>
                    </div>
                    

                    <div class="col-sm-12 col-lg-8 col-md-8">
<div class="contact-cont">

    <form class="well form-horizontal" action="sendmail.php" method="post"  id="contactus">

<fieldset>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-3 control-label">Full Name</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="fname" id="fname" required="yes" placeholder="Full Name" class="form-control"  type="text">
    </div>
  </div>
</div>



<!-- Text input-->
       <div class="form-group">
  <label class="col-md-3 control-label">E-Mail</label>  
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" required="yes" placeholder="E-Mail Address" class="form-control"  type="text">
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-3 control-label">Phone #</label>  
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="telephone" required="yes" placeholder="Phone" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Text input-->
      
<div class="form-group">
  <label class="col-md-3 control-label">Address</label>  
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="address" required="yes" placeholder="Address" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Text input-->
 
<div class="form-group">
  <label class="col-md-3 control-label">Country</label>  
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="country" required="yes" placeholder="Country" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Select Basic -->
   
<div class="form-group"> 
  <label class="col-md-3 control-label">State</label>
    <div class="col-md-8 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="state" required="yes" class="form-control selectpicker" >
      <option value=" " >Please select your state</option>
     <option value="Ontario">Ontario</option>
        <option value="Quebec">Quebec</option>
        <option value="Nova Scotia">Nova Scotia</option>
        <option value="New Brunswick">New Brunswick</option>
        <option value="Manitoba">Manitoba</option>
        <option value="British Columbia">British Columbia</option>
        <option value="Prince Edward Island">Prince Edward Island</option>
        <option value="Saskatchewan">Saskatchewan</option>
        <option value="Alberta">Alberta</option>
        <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>

    </select>
  </div>
</div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-3 control-label">Postal Code</label>  
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="post" required="yes" placeholder="Postal Code" class="form-control"  type="text">
    </div>
</div>
</div>


  
<div class="form-group">
  <label  class="col-md-3 control-label">Message</label>
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
          <textarea required="yes" class="form-control" name="message" placeholder="Project Description"></textarea>
  </div>
  </div>
</div>
<div class="form-group">
  <label  class="col-md-3 control-label">Captcha</label>
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
      <img src="http://www.train2invest.com/captcha.php" id="captcha"><br>
      <!-- CHANGE TEXT LINK -->
      <a href="#" onclick="document.getElementById('captcha').src='captcha.php?'+Math.random(); document.getElementById('captcha-form').focus();" id="change-image">Not readable? Change text.</a><br><br>
  </div>
  </div>
</div>
<div class="form-group">
  <label  class="col-md-3 control-label">Captcha Code</label>
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
     <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input  required="yes" name="captcha" value="" id="captcha-form" autocomplete="off" class="form-control"  type="text">
   
  </div>
  </div>
</div>
  
<!-- Success message -->
<!-- <div class="alert alert-success" role="alert" id="success_message">
</div> -->
  <?php
        if(isset($_GET['msg']))
        {
          ?>
          <div class="alert alert-success" role="alert" id="success_message2">
          <?php
          if($_GET['msg'] == '1')
          {
            echo "Failed! Please fill the form</div>";
          }
          if($_GET['msg'] == '2')
          {
            ?>
          <div class="alert alert-success" role="alert" id="success_message2">
          <?php
            echo "Invalid captcha</div>";
          }
          if($_GET['msg'] == '3')
          {
            ?>
          <div class="alert alert-success" role="alert" id="success_message2">
          <?php
            echo "Your Request has been sent.</div>";
          }
          if($_GET['msg'] == '4')
          {
            ?>
          <div class="alert alert-success" role="alert" id="success_message2">
          <?php
            echo "Cannot Send the request</div>";
          }
          
        }
        else{}
      ?>


<!-- Button -->
<div class="form-group">
  <div class="col-md-12">
    <button type="submit" name="sendmail" class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div>


                    <div class="contact-info-address col-sm-12 col-lg-4 col-md-4">
                      
                        <h4>Contact Info</h4>
                        <div class="hline"></div>
                          <p>
                            <strong>Tel:</strong> 204-414-9106
                          </p>
                          <p><strong>Fax:</strong> 204-414-9164</p>
                          <p>
                            <strong>Email:</strong> admin@train2invest.com<br>
                          </p>
                          <p><strong>Address:</strong></p>
                          <p>1-1660 Kenaston Blvd. Unit 70037
                          Winnipeg MB R3P 2H3 Canada</p>
                      
                    </div>


                      </div>
                </div>
            </div>
        </div>
    </section><!--/#bottom-->
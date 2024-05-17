<?php  include 'header.php';?>

 <div class="user-dashboard">
        
<h3 align="center">Add a new address</h3>
<div class="col-md-6 col-md-push-3 addressbar">
 <!-- <form class="dynamic-dependent-frm" id="dynamic-dependent-frm"> -->
    <?php if($this->session->flashdata('success')){ ?> <p class="alert alert-success"><?= $this->session->flashdata('success')?></p> <?php } ?>
    <?php if($this->session->flashdata('error')){ ?> <p class="alert alert-danger"><?= $this->session->flashdata('error')?></p> <?php } ?>
 	 <?php 
     $attributes = array('class' => 'dynamic-dependent-frm', 'id' => 'dynamic-dependent-frm');
 	  echo form_open_multipart('location/add_address',$attributes) ;?>
 	 <div class="row">
        <div class="col-lg-12">
        	<?php echo form_error('p_address');?>
            <div class="form-group">
              <?php echo form_input(['name'=>'p_address','class'=>'form-control','placeholder'=>'Address 1']) ?>
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-lg-12">
        	<?php echo form_error('s_address');?>
            <div class="form-group">
              <?php echo form_input(['name'=>'s_address','class'=>'form-control','placeholder'=>'Address 2']) ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <select title="Select Country" name="regcountry" class="form-control" id="country-name" required>      
                    <option value="">Select Country</option>
                    <?php
                    foreach ($geCountries as $key => $element) {
                        echo '<option value="'.$element['country_id'].'">'.$element['country_name'].'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <select title="Select State" name="state_name" class="form-control" id="state-name" required>      
                    <option value="">Select State</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <select title="Select City" name="city_name" class="form-control" id="city-name" >      
                    <option value="">Select City</option>
                </select>
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-lg-12">
        	<?php echo form_error('zipcode');?>
            <div class="form-group">
              <?php echo form_input(['name'=>'zipcode','class'=>'form-control','placeholder'=>'zipcode']) ?>

            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-lg-12">
        	<?php echo form_error('image');?>
            <div class="form-group">
              <?php echo form_input(['name'=>'image','class'=>'form-control','type'=>'file']) ?>

            </div>
        </div>
    </div>

     <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                 <?php echo form_submit(['name'=>'submit','class'=>'form-control btn-danger','value'=>'SUBMIT']) ?>
            </div>
        </div>
    </div>
</form>

            
    </div>

</div>

  

</body>
<?php

include("header.php");

?>
<body>
<div class="loginpage">
 
   
 <div class="container h-100">

  <?php if($this->session->flashdata('success')){ ?> <p class="alert alert-success"><?= $this->session->flashdata('success')?></p> <?php } ?>
  
  <?php if($this->session->flashdata('error')){ ?> <p class="alert alert-danger"><?= $this->session->flashdata('error')?></p> <?php } ?>
   
    <div class="d h-100">
 <div class="btnchanger">
    <a href="<?php echo base_url()?>login"><button class="btn btn-success">LOGIN</button></a>
   
    <a href="<?php echo base_url()?>"><button class="btn btn-primary">BACK TO HOME</button></a>
  </div>
      <div class="user_card">

        <div class="d-flex justify-content-center">
          <div class="brand_logo_container">
            <!-- <img src="https://cdn.freebiesupply.com/logos/large/2x/pinterest-circle-logo-png-transparent.png" class="brand_logo" alt="Logo"> -->
          </div>
        </div>
        <div class=" form_container">
          <?php 
          
          echo form_open_multipart('login/registration')  ;?>
          <h3>Registration Form</h3>
           <?php echo form_error('username');?>
             <div class="input-group mb-3">
         
              <?php echo form_input(['name'=>'username','class'=>'form-control','placeholder'=>'Full Name']) ?>
            </div>
             <?php echo form_error('email');?>
            <div class="input-group mb-3">
              
              <?php echo form_input(['name'=>'email','class'=>'form-control','type'=>'email','placeholder'=>'Your Email Address']) ?>
            </div>
             <?php echo form_error('phone');?>
            <div class="input-group mb-3">
            
              
            <?php echo form_input(['name'=>'phone','class'=>'form-control','type'=>'number','placeholder'=>'Your Mobile Number']) ?>
            </div>


               <?php echo form_error('password');?>
            <div class="input-group mb-3">
          
              <?php echo form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Secure Password']) ?>
            </div>
             <?php echo form_error('confirmpass');?>
             <div class="input-group mb-3">
          
              <?php echo form_password(['name'=>'confirmpass','class'=>'form-control','placeholder'=>'confirmpass Password']) ?>
            </div>

            <div class="input-group mb-3">
          
              <?php echo form_input(['name'=>'file_name','type'=>'file','class'=>'form-control','placeholder'=>'Secure Password']) ?>
            </div>

           
              <div class="d-flex justify-content-center mt-3 login_container">
             <?php echo form_submit(['name'=>'submit','class'=>'form-control btn-danger','value'=>'SUBMIT']) ?>
           </div>
          </form>
        </div>
    
      </div>
    </div>
  </div>
  </div>
  

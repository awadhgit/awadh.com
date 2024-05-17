<?php include("header.php") ?>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 wow slideInLeft" data-wow-duration="2s" data-wow-delay="5s">
                                    <div class="card-header">
                                        <h1 align="center" style="color: #000">Login Details</h1>
                                       </div>
                                    <div class="card-body wow slideInLeft" data-wow-duration="2s" data-wow-delay="5s">
                                       <?php if($this->session->flashdata('error')){ ?> <p style="padding-top:20px; text-align: center;"><?= $this->session->flashdata('error')?></p> <?php } ?>
                                        <?php echo form_error('email');?>
                                        <?php echo form_open('login/validate_login')?>
                                        
                                       <div class="form-group">
                                                <label class="small mb-1" for="email">Email</label>
                                                <input class="form-control py-4" name="email" type="email" placeholder="Enter email address" />
                                            </div>
                                             <?php echo form_error('password');?>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" name="password" type="password" placeholder="Enter password" />
                                            </div>

                                             <div class="form-group">
                                                <div class="g-recaptcha" data-sitekey="6LfDpN8pAAAAAHWpnnuP_43TBExJ71YoNF30k4fi"></div>
                                            </div>
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                 <?php echo form_submit(['name'=>'submit','class'=>'form-control btn-danger','value'=>'SUBMIT']) ?>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="<?php echo base_url('login/userregistration')?>">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>


<!-- site key: 6LfDpN8pAAAAAHWpnnuP_43TBExJ71YoNF30k4fi

seceret key : 6LfDpN8pAAAAAFgpV0xfeRUDR7BGsisitnTCrHYj -->

<?php


include("header.php");
if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}

?>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<main>
    <div class="bg_color_2">
        <div class="container margin_60_35">


            <div class="register_c">
                <div id="register">
                    <h1>Register As Clinic</h1>
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <form action="register_controller.php" method="POST" id="reg_clinic" name="reg_clinic">
                                <div class="box_form">
                                    <div id="info" class="clearfix"> <?= "$msg"; ?> </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="user_email" class="form-control" placeholder="Your Email Address" />
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="number" name="user_mobile" class="form-control" placeholder="Your Mobile Number" />
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="user_password" class="form-control" id="password1" placeholder="Your Password" />
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm password</label>
                                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" />
                                    </div>
                                    <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey="6Lch9KsUAAAAAMIljdmAvJlICCPWwa2yFy5PNzyM"></div>
                                    </div>
                                    <div id="pass-info" class="clearfix"></div>
                                    <div class="form-group">
                                        <input type="checkbox" value="false" id="check_2" name="check_2" required />
                                        <label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
                                        <br>
                                        <span><a href="#" data-toggle="modal" data-target="#exampleModalLong">Read Terms & Conditions</a></span>

                                    </div>
                                    <!-- <div class="checkbox-holder text-left">

                                        <div class="checkbox_2">
                                            <input type="checkbox" value="false" id="check_1" name="check_1" required />
                                            <label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
                                        </div>
                                    </div> -->

                                    <div class="form-group text-center add_top_30">
                                        <input type="hidden" value="c" name="user_type">
                                        <input class="btn_1" type="submit" value="Submit" />
                                        <a href="./register.php" class="btn_1">Back</a>
                                        <!-- <div class="btn_1" type="button" onclick="reset('c')">reset</div> -->
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <!-- /register -->
        </div>
    </div>

</main>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Terms & Conditins</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                All the clinics must have a valid certificate/license issued by compenent authourity.
                All the details submitted by clinics should be accurate.
                The appointments booked through this app can be cancelled by user or clinic.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--jquery validator-->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="./js/formvalidator.js"></script>


<!--validator ends-->

<?php include("footer.php"); ?>
<script src="./js/pw_strenght.js"></script>
</main>
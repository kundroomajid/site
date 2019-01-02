<?php
include("header.php");
include("config.php");
include("session.php");
?>

	<main>
		<div id="hero_register">
			<div class="container margin_120_95">
				<div class="row">
					<div class="col-lg-6">
						<h1>It's time to find you!</h1>
						<p class="lead"></p>
						<div class="box_feat_2">
							<i class="pe-7s-map-2"></i>
							<h3>Effortless Practice Management</h3>
							<p> Get hold of the best practice management at an amazingly affordable price. Simpler, Smarter, Secure.</p>
						</div>
						<div class="box_feat_2">
							<i class="pe-7s-date"></i>
							<h3>Grow your Practice</h3>
							<p> Take your practice to new heights where you don't just get new patients but also enhance your credibility. </p>
						</div>
						<div class="box_feat_2">
							<i class="pe-7s-phone"></i>
							<h3>Connect Globally</h3>
							<p> Reach out to thousands of patients across the globe using smart practice techniques on your phone. Talk to your patients through various channels and widen your accessibility. </p>
						</div>
					</div>
					<!-- /col -->

					<div class="col-lg-5 ml-auto">
						<br>
						<div class="box_feat_2">
							<h3>Please Enter Your Professional Details</h3>
								</div>
								<br/>

							<form  method="POST" action="">
								<div class="box_form">
										<div class="form-group">
												<label>Specialization</label>
												<input type="specialization" name ="specialization"class="form-control" placeholder="What is Your specialization" />
										</div>
										<div class="form-group">
														<label>Degree</label>
														<input type="degree" name ="degree" class="form-control" id="degree" placeholder="Degrees" />
												</div>
												<div class="form-group">
																<label>Institution</label>
																<input type="institution" name ="institution" class="form-control" placeholder="Colleage or Institution" />
														</div>
														<div class="form-group">
																		<label>Experience</label>
																		<input type="experience" name ="experience" class="form-control" placeholder="Years Of Experience" />
																</div>

																<div class="form-group">
																				<label>Registration_no</label>
																				<input type="registration_no" name ="registration_no" class="form-control" placeholder="Enter Your registration_no Number" />
																		</div>
																		<div class="form-group">
																						<label>Registration Year</label>
																						<input type="registration_year" name ="registration_year" class="form-control" placeholder="Enter Year of registration." />
																				</div>
																				<div class="form-group">
																								<label>Registration Council</label>
																								<input type="registration_council" name ="registration_council" class="form-control" placeholder="Enter registration Council." />
																						</div>

																<div class="form-group">
																				<label>Clinic</label>
																				<input type="clinic" name ="clinic" class="form-control" placeholder="Enter Name of clinic " />
																		</div>
																		<div class="form-group">
																						<label>Address of clinic</label>
																						<input type="address" name ="address" class="form-control" placeholder="Enter the address of clinic" />
																				</div>
										 	<div class="form-group">

                                        Morning Shift Start Time
                                    <input type="time" name="morning_start_time" />
                                    </div>

                                    <div class="form-group">
                                        Morning Shift End Time
                                    <input type="time" name="morning_end_time" />
                                    </div>
                                    <div class="form-group">
                                        Evening Shift Start Time
                                    <input type="time" name="evening_start_time" />
                                    </div>

                                    <div class="form-group">
                                        Evening Shift End Time
                                    <input type="time" name="evening_end_time" />
																	</div>


								<p class="text-center add_top_30"><input type="submit" class="btn_1" value="Submit" /></p>
								<div class="text-center"><small></small></div>
							</form>
						</div>

					</div>
					<!-- /col -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /hero_register -->
	</main>
	<!-- /main -->

	<?php
include("footer.php");

$doc_email = $_GET['email'];
$sql = "SELECT user_id FROM tb_user WHERE user_email = '$doc_email'";

 $result = mysqli_query($conn,$sql);
 //echo($result);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$doc_id = $row['user_id'];
	echo $doc_id;
if((isset($_POST['specialization'])) & (isset($_POST['morning_start_time']))& (isset($_POST['evening_start_time']))){
            // Verify data
  $specialization = $_POST['specialization'];
	$degree = $_POST['degree'];
	$institution = $_POST['institution'];
	$experience = $_POST['experience'];
	$registration_no = $_POST['registration_no'];
	$registration_year= $_POST['registration_year'];
	$registration_council = $_POST['registration_council'];
//	$clinic = $_POST['clinic'];
//	$address = $_POST['address'];
    $morning_start_time = (new DateTime($_POST['morning_start_time']))->format("H:i");
     $morning_end_time = (new DateTime($_POST['morning_end_time']))->format("H:i");
     $evening_start_time = (new DateTime($_POST['evening_start_time']))->format("H:i");
     $evening_end_time = (new DateTime($_POST['evening_end_time']))->format("H:i");



$sql ="INSERT into tb_doctor (doc_id,specialization,registration_council,registration_no,registration_year,morning_start_time,morning_end_time,evening_start_time,evening_end_time) values('$doc_id','$specialization','$registration_council','$registration_no','$registration_year','$morning_start_time','$morning_end_time','$evening_start_time','$evening_end_time')";
$sql2 = "INSERT into tb_qualifications(doct_id,degree,institute,experience) values('$doc_id','$degree','$institution','$experience')";
if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)){
   echo '<script type="text/javascript">
alert("Details Saved Sucessfully")
window.location = "./upload_photo.php?email='.$doc_email.'";
</script> ';
} else {
    echo '<script language="javascript">';
    echo 'alert("Error")';
    echo '</script>';
    echo "ERROR: Could not able to execute $sql. "
                            . mysqli_error($conn);
}
mysqli_close($conn);



}
else {
	echo '<script language="javascript">';
	echo 'alert("Error Please Fill the Registration Form")';
	echo '</script>';
}

?>
</body>
</html>

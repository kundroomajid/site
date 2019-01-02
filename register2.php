    <?php
    include("header.php");
    include("config.php");?>

    <html>
    <main>
            <div class="bg_color_2">
                <div class="container margin_60_35"  id="register">
                  <h1>Please Enter Your details to complete Your profile</h1>
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <form action="" method="POST">
                                    <div class="box_form">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="name" name ="name"class="form-control" placeholder="Enter Your Name" />
                                        </div>
                                        <div class="form-group">
                                                <label>PhoneNo</label>
                                                <input type="phone_no" name ="phone_no" class="form-control" id="phone_no" placeholder="Phone No" />
                                            </div>
                                         <p>
                                        <label>Gender</label>
                                         <input type = "radio"
                                        name = "gender"
                                         id = "male"
                                         value = "Male" />
                                        <label for = "male">Male</label>
                                         <input type = "radio"
                                          name = "gender"
                                         id = "female"
                                         value = "Female" />
                                         <label for = "female">Female</label>
                                         <input type = "radio"
                                           name = "gender"
                                             id = "other"
                                             value = "Other" />
                                            <label for = "other">Other</label>
                                             </p>
                                        <div class="form-group">
                                                <label>Date Of Birth</label>
                                                <input type="date" name ="dob" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="address" name ="address" class="form-control" id="address" placeholder="Enter Full Address" />
                                            </div>
                                            <label>Select District</label>
                                            <select id = "district" class="form-control" name ="district">
                                              <option value = "Anantnag">Anantnag</option>
                                              <option value = "Bandipora">Bandipora</option>
                                              <option value = "Baramulla">Baramulla</option>
                                              <option value = "Budgam">Budgam</option>
                                              <option value = "Ganderbal">Ganderbal</option>
                                              <option value = "Kulgam">Kulgam</option>
                                              <option value = "Kupwara">Kupwara</option>
                                              <option value = "Pulwama">Pulwama</option>
                                              <option value = "Shopain">Shopain</option>
                                              <option value = "Srinagar">Srinagar</option>
                                              <option value = "Doda">Doda</option>
                                              <option value = "Jammu">Jammu</option>
                                              <option value = "Kathua">Kathua</option>
                                              <option value = "Kishtwar">Kishtwar</option>
                                              <option value = "Poonch">Poonch</option>
                                              <option value = "Rajouri">Rajouri</option>
                                              <option value = "Reasi">Reasi</option>
                                                <option value = "Ramban">Ramban</option>
                                              <option value = "Samba">Samba</option>
                                              <option value = "Udhampur">Udhampur</option>
                                              <option value = "Kargil">Kargil</option>
                                              <option value = "Leh">Leh</option>
                                            </select>

                                            <div class="form-group">
                                                <label>Pincode</label>
                                                <input type="pincode" name ="pincode" class="form-control" id="pincode" placeholder="Enter Your pincode" />
                                            </div>
                                          <div  <label>Select Blood Group</label>
                                            <select id = "bloodgroup" class="form-control" name ="bloodgroup">
                                              <option value = "Unknown">Unknown</option>
                                              <option value = "O-">O−</option>
                                              <option value = "O+">O+</option>
                                              <option value = "A−">A−</option>
                                              <option value = "A+">A+</option>
                                              <option value = "B−">B−</option>
                                              <option value = "B+">B+</option>
                                              <option value = "AB−">AB−</option>
                                              <option value = "AB+">AB+</option>

                                            </select> </div>
                                            <div class="form-group">
                                                <label>Height</label>
                                                <input type="height" name ="height" class="form-control" id="height" placeholder="Enter Height in Inches" />
                                            </div>
                                            <div class="form-group">
                                                <label>Weight</label>
                                                <input type="weight" name ="weight" class="form-control" id="weight" placeholder="Enter Your Weight in Kgs" />
                                            </div>
                                                <div class="form-group text-center add_top_30">
                                            <input class="btn_1" type="submit" value="Submit" />
                                        </div>

                                </form>
                            </div>
                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /register -->
                </div>
            </div>

        </main>
        </main>
    </html>
    <?php


$user_email = $_GET['email'];

$_SESSION['email'] = $user_email;
if((isset($_POST['name']))&isset($_POST['phone_no'])&isset($_POST['gender'])){
            // Verify data
    $name = $_POST['name'];
    $phone_no = $_POST['phone_no'];
    $gender = $_POST['gender'];
     $dob = $_POST['dob'];
     $address = $_POST['address'];
     $district = $_POST['district'];
     $pincode = $_POST['pincode'];
     $bloodgroup = $_POST['bloodgroup'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];

$sql = "UPDATE tb_user SET user_name= '$name',user_phone = '$phone_no',gender = '$gender',user_type = 'p',dob = '$dob',address = '$address',district ='$district',pincode = '$pincode',blood_group = '$bloodgroup',height = '$height',weight = '$weight' WHERE user_email='$user_email'";
if(mysqli_query($conn, $sql)){
   echo '<script type="text/javascript">
alert("Details Saved Sucessfully")
window.location = "./upload_photo.php?email='.$user_email.'";
</script> ';
} else {
    echo '<script language="javascript">';
    //echo 'alert("Error")';
    echo '</script>';
    echo "ERROR: Could not able to execute $sql. "
                            . mysqli_error($conn);
}
mysqli_close($conn);



}


    ?>

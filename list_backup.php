<?php include("header.php");
$radio_search = $_GET['radio_search'];
if(isset($_GET['q']))
{
$q = mysqli_real_escape_string($_GET['q']);
}
else {
	$q=null;
}

if(isset($_GET["page"]))
{
 $page = mysqli_real_escape_string($_GET["page"]);
}
else
{
 $page = 1;
}

$num_results_on_page = 10;// number of details displayed
$offset = ($page-1) * $num_results_on_page;

$rs_query = isset($_GET['radio_search'])?"&radio_search=".mysqli_real_escape_string($_GET['radio_search']):"";

$district = ' ';
$spec = ' '; 

if(isset($_GET['dist']))
{
$district = "&dist=".$_GET['dist'];
$dist = $_GET['dist'];	
	
	//query to get count of doctors and clinics
	$sql = "SELECT count(*) as c1 from vw_doctor where district = '$dist'";
$result=mysqli_query($conn,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());
$c1 = mysqli_fetch_array($result)[0];
	$sql2 = "SELECT count(*) as c2 from vw_clinic where district = '$dist'";
	$result2=mysqli_query($conn,$sql2) or die ("Query to get data from firsttable failed: ".mysqli_error());
$c2 = mysqli_fetch_array($result2)[0];

	$total_rows = $c1 + $c2;
	$total_records = $total_rows;
	
$total_pages = ceil($total_rows / $num_results_on_page);
	
  $query="SELECT doc_id,user_name,photo,rated_by,avg_rating,user_type,district FROM vw_doctor where district ='$dist' UNION SELECT clinic_id,clinic_name,photo,rated_by,avg_rating,user_type,district FROM vw_clinic where district ='$dist' ORDER BY avg_rating DESC LIMIT $offset,$num_results_on_page";
$result=mysqli_query($conn,$query) or die ("Query to get data from firsttable failed: ".mysqli_error());
$count = mysqli_num_rows($result);
	
	
	
}
else if (isset($_GET['spec'])){
$sp = "&spec=".$_GET['spec'];	

$spec = $_GET['spec'];
	
$sql = "SELECT count(*) as total_records from vw_doctor WHERE `specialization` LIKE '%$spec%'";
$result=mysqli_query($conn,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());
$total_rows = mysqli_fetch_array($result)[0];
$total_records = $total_rows;
$total_pages = ceil($total_rows / $num_results_on_page);
	
	

$query="SELECT * FROM vw_doctor  WHERE `specialization` LIKE '%$spec%' ORDER BY avg_rating DESC LIMIT $offset, $num_results_on_page";
$result=mysqli_query($conn,$query) or die ("Query to get data from firsttable failed: ".mysqli_error());
$count = mysqli_num_rows($result);
}

else if (isset($_GET['q']))
{
 $que = "&q=".$_GET['q'];
$q = $_GET['q'];
	//	if user selcts clinic radio button on homepage
	if($radio_search == 'clinic')
	{
	$sql2 = "SELECT count(*) as c2 from vw_clinic WHERE `clinic_name` LIKE '%$q%'";
	$result2=mysqli_query($conn,$sql2) or die ("Query to get data from firsttable failed: ".mysqli_error());
		$c2 = mysqli_fetch_array($result2)[0];
	$total_rows = $c2;
	$total_records = $total_rows;
		
		$total_pages = ceil($total_rows / $num_results_on_page);
	
  $query="SELECT clinic_id,clinic_name,photo,rated_by,avg_rating,user_type,district FROM vw_clinic WHERE `clinic_name` LIKE '%$q%' ORDER BY avg_rating DESC LIMIT $offset,$num_results_on_page";
$result=mysqli_query($conn,$query) or die ("Query to get data from firsttable failed: ".mysqli_error());
$count = mysqli_num_rows($result);	
	}
	
	
//	if user selcts doctor radio button on homepage
	else if($radio_search =='doctor')
	{
	$sql = "SELECT count(*) as c1 from vw_doctor WHERE `user_name` LIKE '%$q%'";
		$result=mysqli_query($conn,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());
		$c1 = mysqli_fetch_array($result)[0];

	$total_rows = $c1;
	$total_records = $total_rows;
	
		$total_pages = ceil($total_rows / $num_results_on_page);
	
  $query="SELECT doc_id,user_name,photo,rated_by,avg_rating,user_type,district FROM vw_doctor WHERE `user_name` LIKE '%$q%' ORDER BY avg_rating DESC LIMIT $offset,$num_results_on_page";
$result=mysqli_query($conn,$query) or die ("Query to get data from firsttable failed: ".mysqli_error());
$count = mysqli_num_rows($result);	
	}
	else
	{
		$sql = "SELECT count(*) as c1 from vw_doctor WHERE `user_name` LIKE '%$q%'";
		$result=mysqli_query($conn,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());
		$c1 = mysqli_fetch_array($result)[0];
	$sql2 = "SELECT count(*) as c2 from vw_clinic WHERE `clinic_name` LIKE '%$q%'";
	$result2=mysqli_query($conn,$sql2) or die ("Query to get data from firsttable failed: ".mysqli_error());
		$c2 = mysqli_fetch_array($result2)[0];

	$total_rows = $c1 + $c2;
	$total_records = $total_rows;
	
		$total_pages = ceil($total_rows / $num_results_on_page);
	
  $query="SELECT doc_id,user_name,photo,rated_by,avg_rating,user_type,district FROM vw_doctor WHERE `user_name` LIKE '%$q%' UNION SELECT clinic_id,clinic_name,photo,rated_by,avg_rating,user_type,district FROM vw_clinic  WHERE `clinic_name` LIKE '%$q%' ORDER BY avg_rating DESC LIMIT $offset,$num_results_on_page";
$result=mysqli_query($conn,$query) or die ("Query to get data from firsttable failed: ".mysqli_error());
$count = mysqli_num_rows($result);
	}

}

else
{
//query to get count of doctors and clinics
	$sql = "SELECT count(*) as c1 from vw_doctor";
$result=mysqli_query($conn,$sql) or die ("Query to get data from firsttable failed: ".mysqli_error());
$c1 = mysqli_fetch_array($result)[0];
	$sql2 = "SELECT count(*) as c2 from vw_clinic";
	$result2=mysqli_query($conn,$sql2) or die ("Query to get data from firsttable failed: ".mysqli_error());
$c2 = mysqli_fetch_array($result2)[0];

	$total_rows = $c1 + $c2;
	$total_records = $total_rows;
	
$total_pages = ceil($total_rows / $num_results_on_page);
	
	
  
	
//$query="SELECT * FROM vw_doctor ORDER BY avg_rating DESC LIMIT $offset,$num_results_on_page";
//$result=mysqli_query($conn,$query) or die ("Query to get data from firsttable failed: ".mysqli_error());
//$count = mysqli_num_rows($result);
  
  $query="SELECT doc_id,user_name,photo,rated_by,avg_rating,user_type,district FROM vw_doctor UNION SELECT clinic_id,clinic_name,photo,rated_by,avg_rating,user_type,district FROM vw_clinic ORDER BY avg_rating DESC LIMIT $offset,$num_results_on_page";
$result=mysqli_query($conn,$query) or die ("Query to get data from firsttable failed: ".mysqli_error());
$count = mysqli_num_rows($result);
	
	
}


                

include("config.php");?>

<main>
		<div id="results">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<?php // TO DO
						if($count >=10)
						{
							$disp = 10;// number of coun displayed
						}
						else {
							$disp = $count;
						}
						?>
						<h4><strong>Showing <?= "$disp";?></strong> of <?= "$total_records";?> results</h4>
					</div>

					<div class="col-md-6">
						<div class="search_bar_list">
								<form method="GET" action="list.php"  id = "search"/>
							<input type="text" id = "search" name="q" class="form-control" placeholder="Search doctors, clinics, hospitals etc." />
							<input type="submit" value="Search" />
						</div>
					</div>
					</form>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /results -->

		<div class="filters_listing">
			<div class="container">
				<ul class="clearfix">
					<li>
						<h6>Type</h6>
						<div class="switch-field" id="switch">
							<input type="radio" id="all" name="type_patient" value="all"  />
							<label for="all">All</label>
							<input type="radio" id="doctors" name="type_patient" value="doctor" />
							<label for="doctors">Doctors</label>
							<input type="radio" id="clinics" name="type_patient" value="clinic"  />
							<label for="clinics">Clinics</label>
						</div>
						<script>			
    document.getElementById("doctors").onchange = function() {
        if (this.selectedIndex!==0) {
            window.location.href = '?q=&radio_search='+ this.value;
			
			
        }        
    };
	document.getElementById("clinics").onchange = function() {
        if (this.selectedIndex!==0) {
            window.location.href = '?q=&radio_search='+ this.value;
        }        
    };
							document.getElementById("all").onchange = function() {
        if (this.selectedIndex!==0) {
            window.location.href = '?q=&radio_search='+ this.value;
        }        
    };
</script>	
					</li>
					
					<li>
						<h6>Select By District</h6>
						<select name="dist"  id = "dist" class="selectbox">
							<option value = "">Select District</option>
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
					<script>
    document.getElementById("dist").onchange = function() {
        if (this.selectedIndex!==0) {
            window.location.href = '?dist='+ this.value+'<?=$rs_query?>';
        }        
    };
</script>	
					</li>
<!--
					 <li>
						<h6>Layout</h6>
						<div class="layout_view">
							<a href="./grid-list.php"><i class="icon-th"></i></a>
							<a href="#0" class="active"><i class="icon-th-list"></i></a>
							<a href="./list-map.php"><i class="icon-map-1"></i></a>
						</div>
					</li> 
-->
					<li>
						<h6>Sort by</h6>
						<select name="orderby" class="selectbox">
						<option value="Closest" />Closest
						<option value="Best rated" />Best rated
						<option value="Men" />Men
						<option value="Women" />Women
						</select>
					</li>
				</ul>
			</div>
			<!-- /container -->
		</div>
		<!-- /filters -->

    <div class="container margin_60_35">




        <div class="row">
				<div class="col-lg-7">

<?php

							if($count == "0"){
								$output = '<h2>No result found!</h2>';

								echo "<small>$output</small>";

							}
							else
							{
            while ($cdrow=mysqli_fetch_array($result)) {
              $user_type = $cdrow["user_type"];
                $user_name=$cdrow["user_name"];
				$clinic_name = $cdrow["clinic_name"];
                $doc_id=$cdrow["doc_id"];
				$clinic_id = $cdrow["clinic_id"];
              $doc_district = strtoupper($cdrow["district"]);
				$specialization = $cdrow["specialization"];
                $image = "<img src ='data:image/jpeg;base64,".base64_encode( $cdrow["photo"])."' />";
                $rate_times = $cdrow['rated_by'];
                 $avg_rating = $cdrow['avg_rating'];
            ?>
					<div class="strip_list wow fadeIn" >
<!--						<a href="#0" class="wish_bt"></a>-->
						<figure>
<!--                          TODO make image clickable-->
<!--							<a href="./detail-page.php"><img src="" alt="" /></a>-->
							<?= "$image";?>
						</figure>
						<?php if(strlen($specialization) > 24)
						{
							$spec_Array =  explode (",", $specialization);
							$spec1 = $spec_Array[0];
							$spec2 = $spec_Array[1];
							$spec3 = $spec_Array[2];
							$spec4 = $spec_Array[3];
							echo ("<small>$spec1,$spec2</small>");
							echo ("<small>$spec3,$spec4</small>");
							
						}
				else
				{
					echo ("<small>$specialization</small>");
				}
				?>

                       <?php 
               if ($user_type == 'd')
                              {
                                 $query1="SELECT * FROM tb_qualifications where doct_id = $doc_id";
            $result1=mysqli_query($conn,$query1) or die ("Query to get data from firsttable failed: ".mysqli_error());
            $cdrow1=mysqli_fetch_array($result1);
              $degree = strtoupper($cdrow1['degree']);
              $institute = strtoupper($cdrow1['institute']);
              $experience = $cdrow1['experience'];
                 echo( "<h3><font color='blue'><i >Dr</font></i> $user_name</h3>");
                      echo("<p> $degree  (  $institute  ),  $experience  Years Experience</p>");
                     echo("<p> Dist : $doc_district</p>");
                 
                 
                              }
                            else if($user_type == 'c')
                            {
								
                              echo( "<h3><font color='blue'><i >Clinic</font></i> $clinic_name $user_name</h3>");
                              echo("<p> Dist : $doc_district</p>");
                            }
              
              
              
              ?>
                      
						
<!--						code to display stars from database-->
						<span class="rating">
							
                           <?php  
				  $avg_rating = substr($avg_rating,0,4);
				  
                                            $x = 0;
											$avg_rating = round($avg_rating,0);
											
                                            if($avg_rating <= 5)
                                            	{
                                            		for ($x; $x < $avg_rating; $x++) 
                                            			{
                                            				echo "<i class='icon_star voted'></i>";
                                            			}
                                              		$diff = 5-$x;
                                              		for ($i = 0; $i < $diff; $i++) 
                                            			{
                                            				echo "<i class='icon_star'></i>";
                                            			}
                                            	}
                                            
                                          
                                              else 
                                              	{
												  echo ('<i class="icon_star"></i>
												<i class="icon_star"></i>
												<i class="icon_star"></i>
												<i class="icon_star"></i>
												<i class="icon_star "></i>');
											  	}
                                              
                                               
?>  
                          <small>(<?php echo $rate_times; ?>)</small></span>
<!--						<a href="./badges.php" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="./img/badges/badge_1.svg" width="15" height="15" alt="" /></a>-->
						<ul>
							<li></li>
<!--
							<li><a href="#0" onclick="onHtmlClick('Doctors', 0)" class="btn_listing">View on Map</a></li>
							<li><a href=" ">Directions</a></li>
-->
							
                          <?php

                              if ($user_type == 'd')
                              {
                                echo("<li><a href='./detail-page.php?doc_id=".$doc_id."' class='btn_listing'>View Profile</a></li>");
                              }
                            else if($user_type == 'c')
                            {
								
                               echo("<li><a href='./detail-clinic.php?clinic_id=".$doc_id.$clinic_id."' class='btn_listing'>View Profile</a></li>");
                            }
              
                          ?>
							
						</ul>
					</div>


            <?php  
            }
}
					?>
					
					
					
<nav aria-label="" class="add_top_20"> 
						<ul class="pagination pagination-sm">
										<?php 
							if($total_pages > 1)
							{
								$curr_page = $_GET['page']?$_GET['page']:1;
								if($curr_page >1)
									{
									$ppage = $page -1;
										echo("<li class='page-item '><a class='page-link' href='list.php?page=$ppage$district$sp$que'> Prev </a></li>");
									}
								for ($page = 1; $page <= $total_pages; $page++) 
								{
									
									
									if($page == $curr_page)
									{
										echo("<li class='page-item active '><a class='page-link' href='list.php?page=$page$district$sp$que'> $page </a></li>");
									}
									else
									{
										echo("<li class='page-item '><a class='page-link' href='list.php?page=$page$district$sp$que'> $page </a></li>");
									}
    							
								} 
//								next page
							$npage = $curr_page + 1;
										echo("<li class='page-item '><a class='page-link' href='list.php?page=$npage$district$sp$que'> Next </a></li>");
								
							}
							
							?>
							

					


					<!-- /pagination 
				</div>
				<!-- /col -->

<!--
map listinig sidebar
				<aside class="col-lg-5" id="sidebar">
					<div id="map_listing" class="normal_list">
					</div>
				</aside>
-->
				<!-- /aside -->

			</div>
			<!-- /row -->
		</div>


<!-- /container -->
<?php include("footer.php");?>
	</main>
	<!-- /main -->

<?php
include("header.php");
include("config.php");

$q = isset($_REQUEST['q'])?$_REQUEST['q']:null;
$district = isset($_REQUEST['dist'])?$_REQUEST['dist']:null;
$specialization = isset($_REQUEST['spec'])?$_REQUEST['spec']:null;
$page = isset($_REQUEST['page'])?$_REQUEST['page']:1;
$radio_search = isset($_REQUEST['radio_search'])?$_REQUEST['radio_search']:"";

$num_results_on_page = 10;
$offset = ($page-1) * $num_results_on_page;

$radio_query = ($radio_search=='doctor')?$radio_query="user_type='d'":(($radio_search=='clinic')?$radio_query="user_type='c'":"");

$main_query = "SELECT vw_docs_clinics.*,tb_doctor.specialization,tb_doctor.experience FROM vw_docs_clinics LEFT JOIN tb_doctor on vw_docs_clinics.doc_id=tb_doctor.doc_id";

$filters = array();

if($q!=null)
$filters[] = "user_name like '%$q%' or specialization like '%$q%'";
//	$q = metaphone($q);
//$filters[] = "sounds_like like '%$q%'";
if($district!=null)
$filters[] = "district='$district'";
if($specialization!=null)
$filters[] = "specialization='$specialization'";
if($radio_query!="")
$filters[] = $radio_query;

if(count($filters)>0){
	$main_query .= " WHERE ";
	for($i=0;$i<count($filters)-1;$i++)
	$main_query .= $filters[$i]. " AND ";
	$main_query .= $filters[$i];
}




$result1=mysqli_query($conn,$main_query) or die ("Query to get data from firsttable failed: ".mysqli_error());
$total_results = mysqli_num_rows($result1);
$total_pages = ceil($total_results / $num_results_on_page);

$main_query .= " LIMIT $offset,$num_results_on_page";
$result=mysqli_query($conn,$main_query) or die ("Query to get data from firsttable failed: ".mysqli_error());
$count = mysqli_num_rows($result);
//echo($main_query);

?>




<main>
	<div id="results">
		<div class="container">
			<div class="row">
				<div class="col-md-6">

<!--					<h4><strong>Showing <?= "$count";?> of <?= "$total_results";?></strong> results</h4>-->

				</div>

				<div class="col-md-6">
					<div class="search_bar_list">


						<form method="GET" action="list.php"  id = "search"/>
						<input type="text" id = "search" name="q" class="form-control" placeholder="Search doctors, clinics, hospitals etc."  value = "<?= ($q!=null)?$q:'' ?>"/>
						<?= ($specialization!=null)?"<input type='hidden' name='spec' value='$specialization' />":"" ?>
						<?= ($district!=null)?"<input type='hidden' name='dist' value='$district' />":"" ?>
						<?= ($radio_search!=null)?"<input type='hidden' name='radio_search' value='$radio_search' />":"" ?>
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
      <h6><strong>Showing <?= "$count";?> of <?= "$total_results";?></strong> results</h6>
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

				<?php
				$redirect = ($q!=null)?"&q=$q":"";
				$redirect .= ($specialization!=null)?"&spec=$specialization":"";
				$redirect .= ($district!=null)?"&dist=$district":"";
				// $redirect .= ($radio_search!=null)?"&radio_search=$radio_search":"";


				$redirect = "'$redirect'";
				?>
				<script>
				document.getElementById("doctors").onchange = function() {
					if (this.selectedIndex!==0)
					window.location.href = '?&radio_search='+ this.value + <?= $redirect; ?>;
				};
				document.getElementById("clinics").onchange = function() {
					if (this.selectedIndex!==0)
					window.location.href = '?&radio_search='+ this.value + <?= $redirect; ?>;
				};
				document.getElementById("all").onchange = function() {
					if (this.selectedIndex!==0)
					window.location.href = '?&radio_search='+ this.value + <?= $redirect; ?>;
				};
				</script>
			</li>


			<?php
			$redirect = ($q!=null)?"&q=$q":"";
			$specialization = isset($_REQUEST['spec'])?$_REQUEST['spec']:null;
			// the above variable is re-used because it gets changed in $cdrow data fetch
			$redirect .= ($specialization!=null)?"&spec=$specialization":"";
			// $redirect .= ($district!=null)?"&dist=$district":"";
			$redirect .= ($radio_search!=null)?"&radio_search=$radio_search":"";
			$redirect = "'$redirect'";
			?>

			<li>
				<h6>Select By District</h6>
				<select name="dist" id="dist" class="layout_view">
					<option value="">Select District</option>
					<option value="Anantnag">Anantnag</option>
					<option value="Bandipora">Bandipora</option>
					<option value="Baramulla">Baramulla</option>
					<option value="Budgam">Budgam</option>
					<option value="Ganderbal">Ganderbal</option>
					<option value="Kulgam">Kulgam</option>
					<option value="Kupwara">Kupwara</option>
					<option value="Pulwama">Pulwama</option>
					<option value="Shopain">Shopain</option>
					<option value="Srinagar">Srinagar</option>
					<option value="Doda">Doda</option>
					<option value="Jammu">Jammu</option>
					<option value="Kathua">Kathua</option>
					<option value="Kishtwar">Kishtwar</option>
					<option value="Poonch">Poonch</option>
					<option value="Rajouri">Rajouri</option>
					<option value="Reasi">Reasi</option>
					<option value="Ramban">Ramban</option>
					<option value="Samba">Samba</option>
					<option value="Udhampur">Udhampur</option>
					<option value="Kargil">Kargil</option>
					<option value="Leh">Leh</option>
				</select>
				<script>
				document.getElementById("dist").onchange = function() {
					if (this.selectedIndex !== 0)
					window.location.href = '?dist=' + this.value + <?= $redirect ?>;
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

<!--
<li>
<h6>Sort by</h6>
<select name="orderby" class="selectbox">
<option value="Closest" />Closest
<option value="Best rated" />Best rated
<option value="Men" />Men
<option value="Women" />Women
</select>
</li>
-->
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
					$experience = $cdrow['experience'];
					$doc_district = strtoupper($cdrow["district"]);
					$specialization = $cdrow["specialization"];
					$image = "<img src ='data:image/jpeg;base64,".base64_encode( $cdrow["photo"])."' />";
					$rate_times = $cdrow['rated_by'];
					$avg_rating = $cdrow['avg_rating'];
					?>
					<div class="strip_list wow fadeIn">
						<?php
							// get verification satus from tb_verification
  								$verify = $conn->query("Select status from tb_verification where doc_id = $doc_id");
  								$cdrow4=mysqli_fetch_array($verify);
  								$verification_status = $cdrow4['status'];
							if($verification_status == 2)
							{
								echo ('<div align="right"><img src="img/verified.png" width="25px" height="25px"/></div>');
							}
							?>
						
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

						if ($user_type == 'd'){
							$query1="SELECT * FROM tb_qualifications where doct_id = $doc_id";
							$result1=mysqli_query($conn,$query1) or die ("Query to get data from firsttable failed: ".mysqli_error());
							$cdrow1=mysqli_fetch_array($result1);
							$degree = strtoupper($cdrow1['degree']);
							$institute = strtoupper($cdrow1['institute']);
							echo( "<h3><font color='blue'><i >Dr</font></i> $user_name</h3>");
							echo("<p> $degree  (  $institute  )  $experience  Years Experience</p>");
							echo("<p> Dist : $doc_district</p>");
						} else if($user_type == 'c'){
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
                              <li></li>
								

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
					$redirect = ($q!=null)?"&q=$q":"";
					$specialization = isset($_REQUEST['spec'])?$_REQUEST['spec']:null;
					// the above variable is re-used because it gets changed in $cdrow data fetch
					$redirect .= ($specialization!=null)?"&spec=$specialization":"";
					$redirect .= ($district!=null)?"&dist=$district":"";
					$redirect .= ($radio_search!=null)?"&radio_search=$radio_search":"";
					//$redirect = "'$redirect'";
					echo "<!--- REDIRECT STRING: $redirect ---->";
					if($total_pages > 1)
					{
						$curr_page = $_GET['page']?$_GET['page']:1;

						if($curr_page >1)
						{
							$ppage = $page -1;
							echo("<li class='page-item '><a class='page-link' href='list.php?page=$ppage$redirect'> Prev </a></li>");
						}
						for ($page = $curr_page -3 ; $page < $total_pages; $page++)
						{

							if($page > 0)
							{
								if($page == $curr_page){
									echo("<li class='page-item active '><a class='page-link' href='list.php?page=$page$redirect'> $page </a></li>");
								}
								else{
									if($page > $curr_page +3 ){
										echo("<li class='page-item '><a class='page-link' > ... </a></li>");
										break;
									}
									else{
										echo("<li class='page-item '><a class='page-link' href='list.php?page=$page$redirect'> $page </a></li>");
									}
								}

							}
						}

						echo("<li class='page-item '><a class='page-link' href='list.php?page=$total_pages$redirect'> $total_pages </a></li>");
						//								next page
						if($curr_page<$total_pages){
							$npage = $curr_page + 1;
							echo("<li class='page-item '><a class='page-link' href='list.php?page=$npage$redirect'> Next </a></li>");
						}

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
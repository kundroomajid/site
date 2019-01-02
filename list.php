<?php include("header.php");
if(isset($_GET['q']))
{
$q = $_GET['q'];
}
else {
	$q=null;
}

$query="SELECT * FROM vw_doctor  WHERE `user_name` LIKE '%$q%' LIMIT 10";
$result=mysqli_query($conn,$query) or die ("Query to get data from firsttable failed: ".mysqli_error());
$count = mysqli_num_rows($result);

include("config.php");?>

<main>
		<div id="results">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<?php
						if($count >=10)
						{
							$disp = 10;// number of coun displayed
						}
						else {
							$disp = $count;
						}
						?>
						<h4><strong>Showing <?= "$disp";?></strong> of <?= "$count";?> results</h4>
					</div>

					<div class="col-md-6">
						<div class="search_bar_list">
								<form method="GET" action="list.php"  id = "search"/>
							<input type="text" id = "search" name="q" class="form-control" placeholder="Search doctors, clinics, hospitals etc." />
							<input type="submit" value="Search" />
						</div>
					</div>
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
						<div class="switch-field">
							<input type="radio" id="all" name="type_patient" value="all" checked="" />
							<label for="all">All</label>
							<input type="radio" id="doctors" name="type_patient" value="doctors" />
							<label for="doctors">Doctors</label>
							<input type="radio" id="clinics" name="type_patient" value="clinics" />
							<label for="clinics">Clinics</label>
						</div>
					</li>
					<!-- <li>
						<h6>Layout</h6>
						<div class="layout_view">
							<a href="./grid-list.php"><i class="icon-th"></i></a>
							<a href="#0" class="active"><i class="icon-th-list"></i></a>
							<a href="./list-map.php"><i class="icon-map-1"></i></a>
						</div>
					</li> -->
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
                $user_name=$cdrow["user_name"];
                $doc_id=$cdrow["doc_id"];
								$specialization = $cdrow["specialization"];
                               
								$image = "<img src ='data:image/jpeg;base64,".base64_encode( $cdrow["photo"])."' />";



            ?>
					<div class="strip_list wow fadeIn" >
						<a href="#0" class="wish_bt"></a>
						<figure>
							<a href="./detail-page.php"><img src="" alt="" /></a>
							<?= "$image";?>
						</figure>
					<?= "	<small>$specialization</small>";?>
						<?= "<h3>$user_name</h3>";?>
						<p>MD (AMU) CVD, CSD(Mumbai) </p> <
						<span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span>
						<a href="./badges.php" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="./img/badges/badge_1.svg" width="15" height="15" alt="" /></a>
						<ul>
							<li><a href="#0" onclick="onHtmlClick('Doctors', 0)" class="btn_listing">View on Map</a></li>
							<li><a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank">Directions</a></li>
							<li><a href="./detail-page.php?doc_id=<?= $doc_id ?>">View Profile</a></li>
						</ul>
					</div>


            <?php  
            }
}
					?>



					<!-- <nav aria-label="" class="add_top_20">
						<ul class="pagination pagination-sm">
							<li class="page-item disabled">
								<a class="page-link" href="#" tabindex="-1">Previous</a>
							</li>
							<li class="page-item active"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#">Next</a>
							</li>
						</ul>
					</nav>
					<!-- /pagination -->
				</div>
				<!-- /col -->

				<aside class="col-lg-5" id="sidebar">
					<div id="map_listing" class="normal_list">
					</div>
				</aside>
				<!-- /aside -->

			</div>
			<!-- /row -->
		</div>


<!-- /container -->
<?php include("footer.php");?>
	</main>
	<!-- /main -->

<?php include("header.php"); ?>

<html>

<div class="container-fluid full-height">
		<div class="row row-height">
			<div class="col-lg-5 content-left">
				<form />
					<div class="search_bar_wrapper">
						<div class="search_bar_list">
							<input type="text" class="form-control" placeholder="Ex. Specialist, Name, Doctor..." />
							<input type="submit" value="Search" />
						</div>
					</div>
					<div class="filters_listing map_listing">
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
							<li>
								<h6>Layout</h6>
								<div class="layout_view">
									<a href="./grid-list.php"><i class="icon-th"></i></a>
									<a href="./list.php"><i class="icon-th-list"></i></a>
									<a href="#0" class="active"><i class="icon-map-1"></i></a>
								</div>
							</li>
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
					<!-- /filters -->
				</form>

				<div class="strip_list">
					<a href="#0" class="wish_bt"></a>
					<figure>
						<a href="./detail-page.php"><img src="./img/doctor_listing_1.jpg" alt="" /></a>
					</figure>
					<small>General Physician</small>
					<h3>Dr. Basharat Manzoor </h3>
					<p></p>
					<span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span>
					<a href="./badges.php" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="./img/badges/badge_1.svg" width="15" height="15" alt="" /></a>
					<ul>
						<li><a href="#0" onclick="onHtmlClick('Doctors', 0)" class="btn_listing">View on Map</a></li>
						<li><a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank">Directions</a></li>
						<li><a href="./detail-page.php">Book now</a></li>
					</ul>
				</div>
				<!-- /strip_list -->

				<div class="strip_list">
					<a href="#0" class="wish_bt"></a>
					<figure>
						<a href="./detail-page.php"><img src="./img/doctor_listing_2.jpg" alt="" /></a>
					</figure>
					<small>Pediatrician</small>
					<h3>Dr. Valentine</h3>
					<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cuodo....</p>
					<span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span>
					<a href="./badges.php" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="./img/badges/badge_2.svg" width="15" height="15" alt="" /></a>
					<ul>
						<li><a href="#0" onclick="onHtmlClick('Doctors', 1)" class="btn_listing">View on Map</a></li>
						<li><a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank">Directions</a></li>
						<li><a href="./detail-page.php">Book now</a></li>
					</ul>
				</div>
				<!-- /strip_list -->

				<div class="strip_list">
					<a href="#0" class="wish_bt"></a>
					<figure>
						<a href="./detail-page.php"><img src="./img/doctor_listing_3.jpg" alt="" /></a>
					</figure>
					<small>Pediatrician</small>
					<h3>Dr. Bonebrake</h3>
					<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cuodo....</p>
					<span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span>
					<a href="./badges.php" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="./img/badges/badge_3.svg" width="15" height="15" alt="" /></a>
					<ul>
						<li><a href="#0" onclick="onHtmlClick('Doctors', 2)" class="btn_listing">View on Map</a></li>
						<li><a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank">Directions</a></li>
						<li><a href="./detail-page.php">Book now</a></li>
					</ul>
				</div>
				<!-- /strip_list -->

				<div class="strip_list">
					<a href="#0" class="wish_bt"></a>
					<figure>
						<a href="./detail-page.php"><img src="./img/doctor_listing_4.jpg" alt="" /></a>
					</figure>
					<small>Psicologist</small>
					<h3>Dr. Everhart</h3>
					<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cuodo....</p>
					<span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span>
					<a href="./badges.php" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="./img/badges/badge_4.svg" width="15" height="15" alt="" /></a>
					<ul>
						<li><a href="#0" onclick="onHtmlClick('Doctors', 1)" class="btn_listing">View on Map</a></li>
						<li><a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank">Directions</a></li>
						<li><a href="./detail-page.php">Book now</a></li>
					</ul>
				</div>
				<!-- /strip_list_map -->
				
				<p class="text-center add_top_30"><a href="#0"><strong>Load more</strong></a></p>
			</div>
			<!-- /content-left-->

			<div class="col-lg-7 map-right">
				<div id="map_listing"></div>
				<!-- map-->
			</div>
			<!-- /map-right-->
			
		</div>
		<!-- /row-->
	</div>
    
    <?php include("footer.php");?>
</html>
    
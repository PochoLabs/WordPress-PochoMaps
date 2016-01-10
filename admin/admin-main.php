<?php
	//Some code can go here.
 ?>

<div class='wrap'>
	<div id="pocho-main">
		<h1>PochoMaps Admin</h1>

		<?php
		global $wpdb;
		$img_path = get_option('pochomaps_map_image');
?>

<form class="ink_image" method="post" action="#">
<h2> <b>Upload your Image from here </b></h2>
<input type="text" name="path" class="image_path" value="<?php echo $img_path; ?>" id="image_path">
<input type="button" value="Upload Image" class="button-primary" id="upload_image"/> Upload your Image from here.
<div id="show_upload_preview">

<?php if(! empty($img_path)){
?>
<img src="<?php echo $img_path ; ?>">
<input type="submit" name="remove" value="Remove Image" class="button-secondary" id="remove_image"/>
<?php } ?>
</div>
<input type="submit" name="submit" class="save_path button-primary" id="submit_button" value="Save Setting">

</form>


<br><hr><br>
		<div>
			<form id="form_id" action="" method="post">
				<input type="text" name="data-top" value="" placeholder="Percent from Top">
				<input type="text" name="data-left" value="" placeholder="Percent from Left">
				<br>
				<input type="button" name="add-point" value="Add Map Point">
			</form>
		</div>




		<div class="distribution-map">

		<img src="<?php echo $img_path ; ?>" class="map-image" alt="Map not found">

		<div data-top="62" data-left="21" class="map-point">
			<div class="content">
				<div class="centered-y">
					<h2>Arizona</h2>
					<p><a href="http://www.asu.edu/" target="_blank">Arizona State University (All Campuses)</a></p>
					<p><a href="https://asuonline.asu.edu/online-degree-programs" target="_blank">Arizona State University Online (Scholar must live in AZ)</a></p>
					<p><a href="https://asuonline.asu.edu/online-degree-programs" target="_blank">Arizona State University Online (CCG only, Starbucks Program)</a></p>
					<h5 class="two-year">Maricopa Community Colleges</h5>
					<p><a href="http://www.phoenixcollege.edu/" target="_blank" class="two-year">  - Phoenix</a></p>
					<p><a href="http://www.gatewaycc.edu/" target="_blank" class="two-year">  - GateWay</a></p>
					<p><a href="http://www.southmountaincc.edu/" target="_blank" class="two-year">  - South Mountain</a></p>
				</div>
			</div>
		</div>

		<!-- <div data-top="45" data-left="8" class="map-point">
			<div class="content">
				<div class="centered-y">
					<h2>California</h2>
					<p><a href="http://www20.csueastbay.edu/" target="_blank">California State University, East Bay</a></p>
					<p><a href="http://www.csulb.edu/" target="_blank">California State University, Long Beach</a></p>
					<p><a href="https://www.csusb.edu/" target="_blank">California State University, San Bernardino</a></p>
					<p><a href="https://www.deanza.edu/" target="_blank" class="two-year">De Anza College</a></p>
					<p><a href="http://www.evc.edu/" target="_blank" class="two-year">Evergreen Valley College</a></p>
					<p><a href="http://www.lbcc.edu/" target="_blank" class="two-year">Long Beach City College</a></p>
					<p><a href="http://www.mtsac.edu/" target="_blank" class="two-year">Mt. San Antonio Community College</a></p>
					<p><a href="http://www.sfsu.edu/" target="_blank">San Francisco State University</a></p>
					<p><a href="http://www.sjsu.edu/" target="_blank">San Jose State University</a></p>
					<p><a href="http://www.ucmerced.edu/" target="_blank">University of California – Merced</a></p>
					<p><a href="http://www.ucsc.edu/" target="_blank">University of California – Santa Cruz</a></p>
					<p><a href="http://laverne.edu/" target="_blank" class="private">University of La Verne</a></p>
					<p> <a href="https://collegetrack.org/" target="_blank">College Track</a></p>
					<p> <a href="http://www.collegematchla.org/index.html" target="_blank">College Match</a></p>
				</div>
			</div>
		</div>
		<div data-top="46" data-left="33" class="map-point">
			<div class="content">
				<div class="centered-y">
					<h2>Colorado</h2>
					<p><a href="http://www.colostate.edu" target="_blank">Colorado State University</a></p>
					<p><a href="http://www.msudenver.edu" target="_blank">Metropolitan State University of Denver</a></p>
					<p><a href="https://www.ccd.edu/" target="_blank" class="two-year">Community College of Denver</a></p>
					<p> <a href="https://collegetrack.org/" target="_blank">College Track</a></p>
				</div>
			</div>
		</div>
		<div data-top="82" data-left="78" class="map-point">
			<div class="content">
				<div class="centered-y">
					<h2>Florida</h2>
					<p><a href="http://www.broward.edu/Pages/home.aspx" target="_blank">Broward College</a></p>
					<p><a href="http://www.fiu.edu/" target="_blank">Florida International University</a></p>
					<p><a href="http://www.mdc.edu/main/" target="_blank">Miami Dade College</a></p>
					<p><a href="http://www.palmbeachstate.edu/" target="_blank">Palm Beach State College</a></p>
					<p><a href="http://valenciacollege.edu/" target="_blank">Valencia College</a></p>
					<p><a href="http://www.ucf.edu/" target="_blank">University of Central Florida</a></p>
				</div>
			</div>
		</div>
		<div data-top="42" data-left="61" class="map-point">
			<div class="content">
				<div class="centered-y">
					<h2>Illinois</h2>
					<p><a href="http://www.depaul.edu/Pages/default.aspx" target="_blank" class="private">DePaul University</a></p>
					<p><a href="http://www.dom.edu/" target="_blank" class="private">Dominican University</a></p>
					<p><a href="http://luc.edu/arrupe/" target="_blank" class="private">Loyola University Chicago – Arrupe College</a></p>
					<p><a href="http://www.nl.edu/" target="_blank" class="private">National Louis University</a></p>
					<p><a href="http://www.neiu.edu/" target="_blank" class="private">Northeastern Illinois University</a></p>
					<p><a href="https://www.uic.edu/" target="_blank">University of Illinois at Chicago</a></p>
				</div>
			</div>
		</div>
		<div data-top="73" data-left="45" class="map-point">
			<div class="content">
				<div class="centered-y">
					<h2>Texas</h2>
					<h4>Dallas, Texas</h4>
					<h5 class="two-year">Dallas County Community Colleges</h5>
					<p><a href="http://www.cedarvalleycollege.edu/default.aspx" target="_blank" class="two-year">- Cedar Valley</a></p>
					<p><a href="http://www.eastfieldcollege.edu/" target="_blank" class="two-year">- Eastfield</a></p>
					<p><a href="http://www.elcentrocollege.edu/" target="_blank" class="two-year">- El Centro</a></p>
					<p><a href="#" class="two-year">- Richland</a></p>
					<p><a href="http://www.untdallas.edu/" target="_blank">University of North Texas at Dallas</a></p>
					<h4>El Paso, Texas</h4>
					<p><a href="http://www.utep.edu/" target="_blank">University of Texas at El Paso</a></p>
					<p><a href="http://www.epcc.edu/_layouts/temp/index.html" target="_blank" class="two-year">El Paso Community College</a></p>
					<h4>Rio Grande Valley, Texas</h4>
					<p><a href="http://www.utrgv.edu/en-us/" target="_blank">University of Texas Rio Grande Valley</a></p>
					<p><a href="http://www.southtexascollege.edu/" target="_blank">South Texas College</a></p>
					<h4>Houston, Texas</h4>
					<h5 class="two-year">Houston Community Colleges</h5>
					<p><a href="http://northwest.hccs.edu/" target="_blank" class="two-year">- Northwest</a></p>
					<p><a href="http://southeast.hccs.edu/" target="_blank" class="two-year">- Southeast</a></p>
					<p><a href="http://www.uh.edu/" target="_blank" class="two-year">University of Houston (Main campus)</a></p>
					<p><a href="https://www.uttyler.edu/engineering/houston-engineering-center/" target="_blank">University of Texas at Tyler-Houston Engineering Center (CCG</a></p> only)
					<h4>San Antonio, Texas</h4>
					<h5 class="two-year">Alamo Community Colleges</h5>
					<p><a href="http://www.alamo.edu/sac/" target="_blank" class="two-year">- San Antonio</a></p>
					<p><a href="https://www.alamo.edu/pac/" target="_blank" class="two-year">- Palo Alto</a></p>
					<p><a href="http://www.tamusa.edu/" target="_blank">Texas A&M University – San Antonio</a></p>
				</div>
			</div>
		</div>
		<div data-top="37" data-left="86" class="map-point">
			<div class="content">
				<div class="centered-y">
					<h2>New Jersey</h2>
					<p><a href="http://www.newark.rutgers.edu/" target="_blank">Rutgers University – Newark</a></p>
					<p><a href="http://www.essex.edu/" target="_blank" class="two-year">Essex County College</a></p>
				</div>
			</div>
		</div>
		<div data-top="27" data-left="83" class="map-point">
			<div class="content">
				<div class="centered-y">
					<h2>New York</h2>
					<h5 class="two-year">Community Colleges</h5>
					<p><a href="http://www.bmcc.cuny.edu/j2ee/index.jsp" target="_blank" class="two-year">Borough of Manhattan Community College</a></p>
					<p><a href="http://www.bcc.cuny.edu/" target="_blank" class="two-year">Bronx Community CollegeHostos Community College</a></p>
					<p><a href="http://www.kingsborough.edu/Pages/default.aspx" target="_blank" class="two-year">Kingsborough Community College</a></p>
					<p><a href="http://www.laguardia.edu/home/" target="_blank" class="two-year">LaGuardia Community College</a></p>
					<p><a href="http://www.qcc.cuny.edu/" target="_blank" class="two-year">Queensborough Community College</a></p>
					<p><a href="" target="_blank" class="two-year">Stella and Charles Guttman Community College</a></p>
					<h5>4-Year Colleges</h5>
					<p><a href="http://www.baruch.cuny.edu/" target="_blank">Baruch College</a></p>
					<p><a href="http://www.brooklyn.cuny.edu" target="_blank">Brooklyn College</a></p>
					<p><a href="https://www.ccny.cuny.edu/" target="_blank">The City College of New York</a></p>
					<p><a href="http://www.csi.cuny.edu/" target="_blank">College of Staten Island</a></p>
					<p><a href="http://www.hunter.cuny.edu/main/" target="_blank">Hunter College</a></p>
					<p><a href="http://www.jjay.cuny.edu/" target="_blank">John Jay College of Criminal Justice</a></p>
					<p><a href="http://www.lehman.cuny.edu/" target="_blank">Lehman College</a></p>
					<p><a href="http://www.mec.cuny.edu/" target="_blank">Medgar Evers College</a></p>
					<p><a href="http://www.citytech.cuny.edu/" target="_blank">New York City College of Technology</a></p>
					<p><a href="http://www.qc.cuny.edu/Pages/home.aspx" target="_blank">Queens College</a></p>
					<p><a href="https://www.york.cuny.edu/" target="_blank">York College</a></p>
				</div>
			</div>
		</div>
		<div data-top="57.5" data-left="67" class="map-point">
			<div class="content">
				<div class="centered-y">
					<h2>Tennessee</h2>
					<p><a href="http://www.equalchanceforeducation.com/" target="_blank">Equal Access for Education (ECE) </a></p>
				</div>
			</div>
		</div>
		<div data-top="49" data-left="79" class="map-point">
			<div class="content">
				<div class="centered-y">
					<h2>Virginia</h2>
					<p><a href="https://www2.gmu.edu/" target="_blank">George Mason University (CCG only)</a></p>
					<p><a href="http://www.nvcc.edu/academics/index.html?gclid=CKaf6L-T2cgCFYoUHwod3kgLPQ" target="_blank" class="two-year">Northern Virginia Community College</a></p>
				</div>
			</div>
		</div>
		<div data-top="45" data-left="83" class="map-point">
			<div class="content">
				<div class="centered-y">
					<h2>Washington DC</h2>
					<p><a href="http://www.trinitydc.edu/" target="_blank" class="private">Trinity University Washington (womens college)</a></p>
				</div>
			</div>
		</div>
	</div> -->


		</div> <!-- /#pocho-main -->
</div> <!-- /.wrap -->

<?php
session_start();


    include "pages/header.php"; ?>


	<?php
    include "pages/meni.php";
	include "konekcija/konekcija.php";
	

	if(isset($_SESSION['ime'])){ 

	$imese=$_SESSION['ime'];
	$mailse=$_SESSION['mejl'];

	
	//var_dump($imese);
	

     ?>



	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Contact</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Contact -->
	<div class="map-full"></div>
	<div class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Contact</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<form id="contactForm">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="ime" name="name" placeholder="Your Name" required data-error="Please enter your name"  value=<?=$imese?>>
									<div class="help-block with-errors" id="Imegr"></div>
								</div>                                 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" placeholder="Your Email" id="mejl" class="form-control" name="name" value=<?=$mailse?> >
									<div class="help-block with-errors" id="Mejlgr"></div>
								</div> 
							</div>
							
							<div class="col-md-12">
								<div class="form-group"> 
									<textarea class="form-control" id="poruka" placeholder="Your Message" rows="4" data-error="Write your message"></textarea>
									<div class="help-block with-errors" id="Porukagr"></div>
								</div>
								<div class="submit-button text-center">
									<button class="btn btn-common" id="submitk" type="submit">Send Message</button>
									<div id="msgSubmit" class="h3 text-center hidden"></div> 
									<div class="clearfix"></div> 
								</div>
							</div>
						</div>            
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact -->
	
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4 arrow-right">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							+01 123-456-4590
						</p>
					</div>
				</div>
				<div class="col-md-4 arrow-right">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							yourmail@gmail.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							800, Lorem Street, US
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	
	<!-- Start Footer -->
	<?php
    include "pages/footer.php";

}

else{
	echo "Morate biti ulogovani da biste poslali poruku </br>
	<a href='index.php'> Home </a>";
}

    
?>
	<script>
		$('.map-full').mapify({
			points: [
				{
					lat: 40.7143528,
					lng: -74.0059731,
					marker: true,
					title: 'Marker title',
					infoWindow: 'Live Dinner Restaurant'
				}
			]
		});	
	</script>
</body>
</html>
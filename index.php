<?php

session_start();

//ukljucivanje head i ostalog pocetnog dela, na svakoj stranici
    include "pages/header.php"; ?>


	<?php
	
	//ukljucivanje dinamicki ispisanog menija
    include "pages/meni.php";
	//ukljucivanje konekcija
	include "konekcija/konekcija.php";

	if($konekcija){ 
//podaci iz baze za dinamicki ispis slajdera
	$upit8="SELECT * FROM slika s INNER JOIN slajder sl ON s.idslika=sl.idslika";
	$rezultat8=$konekcija->query($upit8);
	$rez8=$rezultat8->fetchAll();
	}
	else{
		echo("Konekcija nije ok");
	}

     ?>

	
	<!-- Start slides -->
	<div id="slides" class="cover-slides">
		<ul class="slides-container">

		<?php foreach($rez8 as $red8){ ?>
			<li class="text-left">
				<img src="images/<?=$red8->src?>.jpg" alt="<?=$red8->alt?>">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Welcome To <br> Live Dinner</strong></h1>
							<p class="m-b-40">Search for teasty food and calculate your meals.</p> 
							<!-- Ukoliko je korisnik ulogovan ne pokazivati dugme za registraciju -->
							 <?php if(!isset($_SESSION['uloga'])){ echo( "
							<p><a class='btn btn-lg btn-circle btn-outline-new-white' href='registration.php'>Registration</a></p>");}?>
						</div>
					</div>
				</div>
			</li> <?php } ?>
			
		</ul>
		<div class="slides-navigation">
			<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	</div>
	<!-- End slides -->
	
	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
						<h1>Welcome To <span>Live Dinner </span></h1>
						<h4>Little Story</h4>
						<p>All humans have to eat food for growth and maintenance of a healthy body, but we humans have different nutrition requirements as infants, children (kids), teenagers, young adults, adults, and seniors. For example, infants may require feeding every 4 hours until they gradually age and begin to take in more solid foods. Eventually they develop into the more normal pattern of eating three times per day as young kids. However, as most parents know, kids, teenagers, and young adults often snack between meals. Snacking is often not limited to these age groups because adults and seniors often do the same. </p>
						
						<a class="btn btn-lg btn-circle btn-outline-new-white" href="Dokumentacija.pdf">Dokumentacija</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<img src="images/about-img.jpg" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->
	
	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-center">
					<p class="lead ">
						" If you're not the one cooking, stay out of the way and compliment the chef. "
					</p>
					<span class="lead">Michael Strahan</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->
	
	<!-- Start Menu -->
	<?php 

if($konekcija){
	
	
	?>
	<div class="menu-box">
		<div class="container">
			<div class="row">
			<form >
      <input type="text" placeholder="Search.." name="search" id="pretrazi">
      <button type="submit" id="submitpr"> Search</button>
    </form>
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Food</h2>
						<p>Calculate your meals</p>
					</div>
				</div>
			</div>
			
			<div class="row inner-menu-box">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link  kat" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" name="all">All</a>
						<a class="nav-link kat " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" name="drink">Drinks</a>
						<a class="nav-link kat " id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false" name="lunch">Lunch</</a>
						<a class="nav-link kat" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" name="dinner">Dinner</a>
					</div>
				</div>
                <div class="col-9">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<div class="row" id="proizvodi">
                            <?php
//ukljucivanje fajla gde se nalze upiti koji se ponavljaji
include "php/funkcije.php";
//dinamicki ispis hrane
ispis();
;
}



?>


									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
	<!-- End Menu -->
	
	
	
	<!-- Start Customer Reviews -->
	<div class="customer-reviews-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Quote</h2>
						<p>IF YOU KEEP GOOD FOOD IN YOUR FRIDGE, YOU WILL EAT GOOD FOOD.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mr-auto ml-auto text-center">
					<div id="reviews" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner mt-4">
							<div class="carousel-item text-center active">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Paul Mitchel</strong></h5>
								<h6 class="text-dark m-0">Web Developer</h6>
								<p class="m-0 pt-3">LET FOOD BE THY MEDICINE, THY MEDICINE SHALL BE THY FOOD</p>
							</div>
							
							
						</div>
						<a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<span class="sr-only">Next</span>
						</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Customer Reviews -->
	
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
	
	
		<?php
		//ukljucivanje futera koj se nalazi na svim stranama
    include "pages/footer.php";
    
?>
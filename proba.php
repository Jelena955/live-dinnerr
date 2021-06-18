<?php
    include "pages/header.php"; ?>


	<?php
    include "pages/meni.php";


    if($konekcija){ ?>


<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Special Menu</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
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

include "php/funkcije.php";
ispis("lunch");
ispis("drink");
ispis("dinner");



?>


                            </div>

                           




    </div>
</div>

</div>



<?php }




?> 


<?php
    include "pages/footer.php";
    
?>
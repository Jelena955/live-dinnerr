
	<header class="top-navbar">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container"> 
            <a class="navbar-brand" href="index.php">
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
                <div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">

	<?php

	@session_start();
	//$uloga=$_SESSION["uloga"];

	include_once("konekcija/konekcija.php");
	if($konekcija){
		//echo("Ok");
		$upit="select * from meni where idroditelja IS NULL";
		
		$rezultat=$konekcija->query($upit);
		$rez=$rezultat->fetchall();
       

	
			
		foreach($rez as $red) {
			//echo("xmlkdsm");
			//echo("$red->naziv");?>
			

			 <li class='nav-item'><a class='nav-link' href=<?=$red->link?>><?=$red->naziv?></a></li> 
     
		


<?php
	} }
	else{
		echo("Ne");
	}

	if(isset($_SESSION["uloga"])){

	

	if($_SESSION["uloga"]=="2"||$_SESSION["uloga"]=="1"){
		echo("<li class='nav-item'><a class='nav-link' href='logout.php'>Log out</a></li> ");
	}}
	else{
		echo "";
	}
    
?>


		

          

            
				
				
</ul>
				</div>
			</div>
		</nav>
	</header>
	

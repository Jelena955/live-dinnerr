<?php

@session_start();
if(isset($_SESSION["uloga"])){
	echo("Vec ste registrovani");
	header("Location:redirekt.php");}
    include "pages/header.php"; ?>
	<?php
    include "pages/meni.php";
	
	?>
	

    

    
	<div class="contact-box" style:"marginTop:100px">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Registracija</h2>
						<p>Budite zdravi i uzivajte u hrani</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<form id="contactForm" >
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" >
									<div class="help-block with-errors Imegr" id="Imegr"></div>
                                    
								</div>                                 
							</div>
                            <div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="lastname" name="name" placeholder="Your Lastname" >
									<div class="help-block with-errors Prezimegr" id="Prezimegr"></div>
								</div>                                 
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" placeholder="Your Email" id="email" class="form-control" name="name" >
									<div class="help-block with-errors Mejlgr" id="Mejlgr"></div>
								</div> 
							</div>
                            <div class="col-md-12">
								<div class="form-group">
									<input type="text" placeholder="Your username" id="username" class="form-control" name="name" >
									<div class="help-block with-errors Usernamegr" id="Usernamegr"></div>
								</div> 
							</div>
                            <div class="col-md-12">
								<div class="form-group">
									<input type="password" placeholder="Your password" id="password" class="form-control" name="name" >
									<div class="help-block with-errors Passwordgr" id="Passwordgr"></div>
								</div> 
							</div>

                            <div class="col-md-12">
								<div class="form-group">
									<input type="password" placeholder="Your password again" id="password2" class="form-control" name="name" >
									<div class="help-block with-errors Password2gr" id="Password2gr"></div>
								</div> 
							</div>

                           <div class="col-md-12">
								<div class="form-group">
									<input type="text" placeholder="Your BMI" id="bmi" class="form-control" name="name" >
									<div class="help-block with-errors Bmigr" id="Bmigr"></div>
								</div> 
							</div>
							<div class="col-md-12">
								
									<div class="help-block with-errors"></div>
								</div> 
							</div>
							<div class="col-md-12">
								
								<div class="submit-button text-center">
									<button class="btn btn-common" id="submitr" type="submit">Register</button>
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

<?php
    include "pages/footer.php";
    
?>
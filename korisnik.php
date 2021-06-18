<?php

//session_start();

    include "pages/header.php"; ?>
	<?php
    include "pages/meni.php";
    
    if($konekcija){

        $korisnik=$_SESSION["korisnik"];
        

       //echo var_dump($korisnik);
//Upit za izvlacenje podataka za prikaz korisniku koj je ulogovan
       $upit="SELECT * FROM korisnik WHERE idkorisnik=$korisnik";
       $rezultat=$konekcija->query($upit);
       $rez=$rezultat->fetchAll();

//Upiti za izvlacenje podataka za anketu
        $upit2="SELECT * FROM korisnik_odgovor ko INNER JOIN odgovor o ON ko.idodgovor=o.idodgovor WHERE ko.idkorisnik='".$korisnik."'";
        $rezultat2=$konekcija->query($upit2);
        $rez2=$rezultat2->fetchAll();
        
        $upit3="SELECT * FROM odgovor o INNER JOIN anketa a ON o.idanketa=a.idanketa ";
        $rezultat3=$konekcija->query($upit3);
        $rez3=$rezultat3->fetchAll();
       
        //var_dump($rez3);
        $upit4="SELECT * FROM anketa a ";
        $rezultat4=$konekcija->query($upit4);
        $rez4=$rezultat4->fetchAll();



        foreach($rez as $red){

            $userispis=$red->username;
            $ueser=stripslashes($userispis);

            ?>



<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 text-center">
					<div class="inner-column">
						<h1>Welcome To <span>Live Dinner </span></h1>
						<h1><?=$red->ime?>-<?=$ueser?></h1> 
        </br>
                        <h4>Your BMI is <span style="color:#d65106"><?=$red->bmi?></span> which means you have a
                        <?php if($red->bmi<20){

                            echo("underweight body weight");


                        }

                        else if($red->bmi>=20&&$red->bmi<=25){

                            echo("normal body weight");
                            
                        }

                        else if($red->bmi>=26&&$red->bmi<=30){

                            echo("over weight");}


                            else if($red->bmi>=31&&$red->bmi<=35){

                                echo("obese body weight");}

                                else if($red->bmi>=35){

                                    echo("extremely obese body weight");}


                        
                        ?>
                        </h4>
					<p>
Good health is not just the absence of disease or illness, it is a state of complete physical, mental and social well-being.

This means eating a balanced diet, getting regular exercise, avoiding tobacco and drugs and getting plenty of rest.

Our bodies are like machines that require a balance of protein, carbohydrates, fat, vitamins, minerals and water to stay in good working order.

Get the balance wrong and your health will suffer.

A balanced diet means eating only as many calories as you use during the day.

Any excess will be stored as fat if you eat more than you burn off.</p>
					</div>
				</div>
                
				<div class="col-lg-6 col-md-6">
					<img src="images/profil.jpg" alt="" class="img-fluid">
				</div>

                <?php if($rezultat2->rowCount()==0){  
                    foreach($rez4 as $red4){ 
                        //Ako nije odgovoreno na anketu prikazi je
                  echo("<div class='col-lg-6 col-md-6 text-center'>
                  <p> $red4->pitanje</p>
                  <form>");}
                    foreach($rez3 as $red3){
                       

                    echo (" 
                
                

               <label> $red3->odgovor </label> <input type='radio' value='$red3->idodgovor' name='anketa'>
               ");}

               echo("<button id='dugmean' value=$red4->idanketa> Send </button>


               <form>

               </div>");
            
            
            }
                
                
                else if($rezultat2->rowCount()==1){
                   //Ako je odgovoreno na anketu prikazi obavestenje za to

                echo("  <div class='col-lg-12 col-md-12'> There are no new polls. Thanks for your reply </div>");


                }?>
				<div class="col-md-12">
					<div class="inner-pt">
						<p>Recommended food for you </p>

                        <div class="row" id="proizvodi">
						<?php
                        include "php/funkcije.php";
                        if($red->bmi<20){

                            ispisPreporuceno("gojenje");


                        }

                        else if($red->bmi>=20&&$red->bmi<=25){

                            ispisPreporuceno("odrzavanje");
                            
                        }

                        else if($red->bmi>=26&&$red->bmi<=30){

                            ispisPreporuceno("mrsavljenje");
                            ispisPreporuceno("odrzavanje");
                        
                        
                        }


                            else if($red->bmi>=31&&$red->bmi<=35){

                                ispisPreporuceno("mrsavljenje");}

                                else if($red->bmi>=35){

                                    ispisPreporuceno("mrsavljenje");}
                        
                        
                        ?>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>




<?php

        }
    }
    
    
    ?>




    	<?php
    include "pages/footer.php";
    
?>
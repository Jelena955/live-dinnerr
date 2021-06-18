

<?php




//$dugme=$_POST["dugmeP"];





if(isset($_POST["dugmeP"])){



    http_response_code(200);
    $ime= $_POST["imeP"];
$prezime=$_POST["prezimeP"];
$usernamep=$_POST["usernameP"];
$mejl=$_POST["mejlP"];
$password=$_POST["passwordP"];
$password2=$_POST["password2P"];
$bmi=$_POST["bmiP"];

        $reIme = "/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/";
        $rePrezime = "/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/"; 
        $reUsername = "/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/";
        $rePassword="/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";
        $reMejl="/^[a-z][a-z\d\_\.\-]+\@[a-z\d]+(\.[a-z]{2,4})+$/";
        $reBmi="/^(0|[1-9]\d*)(.\d+)?$/";


        
        $greske=array();

        if($ime == ""){
            
           
            array_push($greske, "ime nije ok");
        }
        else{
            if(!preg_match($reIme, $ime)){
              
               
              array_push($greske, "ime nije ok");
                
            }
        }
    
        if($prezime == ""){
            
            
            arrey_push($greske, "prezime nije ok");
        }
        else{
            if(!preg_match($rePrezime, $prezime)){
                
                
                array_push($greske, "prezime nije ok");
            }
    
                
                
            }
        
        if($mejl == ""){
            
           
            array_push($greske, "mail nije ok");
        }
        else{
            if(!preg_match($reMejl, $mejl)){
                
                
                array_push($greske, "mail nije ok");
            }
    
                
                
            }
        

        if($usernamep == ""){
            
         
            array_push($greske, "username nije ok");
        }
        else{
            if(!preg_match($reUsername, $usernamep)){
                
                
                array_push($greske, "username nije ok");
            }
        }
        if($password == ""){
            
            
            array_push($greske, "password nije ok");
        }
        else{
            if(!preg_match($rePassword, $password)){
                
                
                array_push($greske, "password nije ok");
            }
        }
        if($password2 == ""){
            
            
            array_push($greske, "password2 nije ok");
        }
        else{
            if($password2!=$password){
                
                
                array_push($greske, "password2 nije ok");
            }
        }

        if(!preg_match($reBmi, $bmi)){

            array_push($greske, "bmi nije ok");
        }

        if(count($greske)==0){

            echo("Sve ok");

            include("../konekcija/konekcija.php");
            if($konekcija){
                echo("Konekcija je ok");
            
               // $upit2="insert into korisnik(ime,prezime,mejl,username,password) values ($ime, $prezime, $mejl, $username, $password)";
                    //$konekcija->query($upit2);
       try{ 

        $password=$_POST["passwordP"];
        $passwordiz=md5($password); 
     
        
      $usernamee=addslashes($usernamep);
      $mejll=addslashes($mejl);
      $status=1;
        
        $slika=10;
        $vr=2;
        $broj=md5(rand(1, 1000));
                $upit=$konekcija->prepare("insert into korisnik(idslika,ime,prezime,mejl,username,password,bmi,idvrkorisnika,status) values(:slika, :ime, :prezime, :mejl, :usernamep, :password, :bmi, :idvrsta,:status)");
                $upit->bindParam(':ime', $ime);
                $upit->bindParam(':prezime', $prezime);
                $upit->bindParam(':mejl', $mejl);
                $upit->bindParam(':usernamep', $usernamep);
                $upit->bindParam(':password', $passwordiz);
                $upit->bindParam(':bmi', $bmi);
                $upit->bindParam(':idvrsta', $vr);
                $upit->bindParam(':status', $status);
                $upit->bindParam(':slika', $slika);
               // $upit->bindParam(':broj', $broj);
                $upit->execute();
                
                
                $to=$mejl;
                $subject='Verification email';
                $message="Click in link to verificate your email www.live-dinner/verifikacija.php?broj=$broj&mejl=$mejl";
               // mail ( string $to , string $subject , string $message );
            }
            catch(PDOException $e){
                http_response_code(500);
                echo $e->getMessage();
                header("Content-type: application/json");
                //$response['odgovor'] = 'Everything went better than expected.';
                $message="Llalaal";
                echo json_encode(['message' => $message]); 

                
               


            }}
        }
        else{

            echo("Nije ok");
        }
    }



else{
    http_response_code(404);

}




//echo($ime." ".$prezime." ".$username." ".$mejl." ".$password." ".$password2)






?>
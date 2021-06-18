<?php



@session_start();





if(isset($_POST["dugmeP"])){ 
    
$proteini=$_POST["proteiniP"];
    $masti=$_POST["mastiP"];
   var_dump($masti);
    $uh=$_POST["uhP"];
   
    $naziv=$_POST["imeP"];

    $reNaziv = "/^[A-Z][a-z]{2,14}(\s[a-z]{2,14})*$/";
     
  
    $reGramaza="/^(0|[1-9]\d*)(.\d+)?$/";

    $greske=array();


    if($naziv == ""){
            
         
        
        array_push($greske, "ime nije ok");
    }
    
    if($proteini == ""){
        
        
        array_push($greske, "mejlnije ok");
    }
    else{
        if(!preg_match($reGramaza, $proteini)){
            
            
            array_push($greske, "mejl nije ok");
        }
    }

    if($masti == ""){
        
        
        array_push($greske, "poruka nije ok");
    }
    else{
        if(!preg_match($reGramaza, $masti)){
            
            
            array_push($greske, "poruka nije ok");
        }
    }

    if($uh == ""){
        
        
        array_push($greske, "poruka nije ok");
    }
    else{
        if(!preg_match($reGramaza, $uh)){
            
            
            array_push($greske, "poruka nije ok");
        }
    }


    if(count($greske)==0){

        echo("Sve ok");

        include("../konekcija/konekcija.php");
       
        if($konekcija){
            echo("Konekcija je ok");
         
        
   try{ 

    

   // var_dump($korisnik);


   

       
     
    $slika=1;
     
        $upit=$konekcija->prepare("INSERT INTO jelo  (idslika, ime, proteini, masti, uh) VALUES(:slika, :ime,:proteini,:masti,:uh) ");
          
           
  
           

                $upit->bindParam(':ime', $naziv);
                $upit->bindParam(':proteini', $proteini);
                $upit->bindParam(':masti', $masti);
                $upit->bindParam(':uh', $uh);
                $upit->bindParam(':slika', $slika);
               
               $upit->execute(); 
               


               
                 }
        catch(PDOException $e){
            http_response_code(500);
            echo $e->getMessage();
            header("Content-type: application/json");
            //$response['odgovor'] = 'Everything went better than expected.';
            $message="Llalaal";
            echo json_encode(['message' => $message]); 

            
           


        }}}
    
    else{

        echo("Nije ok");
       var_dump($greske);
    }}

    else{
        http_response_code(404);
    }













?>

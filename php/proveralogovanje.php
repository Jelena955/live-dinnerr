<?php
session_start();



if(isset($_POST["dugmeP"])){

    $usernamep=$_POST["usernameP"];
    $passwordp=$_POST["passwordP"];

    $reUsername = "/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/";
    $rePassword="/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";

    $greske=array();


    if($usernamep == ""){
            
         
        array_push($greske, "username nije ok");
    }
    else{
        if(!preg_match($reUsername, $usernamep)){
            
            
            array_push($greske, "username nije ok");
        }
    }
    if($passwordp == ""){
        
        
        array_push($greske, "password nije ok");
    }
    else{
        if(!preg_match($rePassword, $passwordp)){
            
            
            array_push($greske, "password nije ok");
        }
    }


    if(count($greske)==0){

       

        include("../konekcija/konekcija.php");
        if($konekcija){
            //echo("Konekcija je ok");
         
        
   try{ 


   

       $passwordpp=md5($passwordp);
      

        $upit="SELECT * from korisnik WHERE username='".$usernamep."' AND password='".$passwordpp."'";
          
           $rezultat= $konekcija->query($upit);

            if($rezultat->rowCount()==1){

                

               
               

                
               

                $red = $rezultat ->fetch();
               
                $uloga=$red->idvrkorisnika;
                $korisnik=$red->idkorisnik;
                $imeses=$red->ime;
                $mailses=$red->mejl;
                $statusses=$red->status;

                $_SESSION['uloga']=$uloga;
                $_SESSION['korisnik']=$korisnik;
                $_SESSION['ime']=$imeses;
                $_SESSION['mejl']=$mailses;
                $_SESSION['status']=$statusses;
                
                //var_dump($imeses);
            
            
               
                header("Location:../redirekt.php");

                return true;
                //die;
              // return true;


               // echo ($uloga); 


            }
            else{
               // echo $rezultat->rowCount();
              // return false;
            }
        }
        catch(PDOException $e){
            http_response_code(500);
           // echo $e->getMessage();
            header("Content-type: application/json");
            //$response['odgovor'] = 'Everything went better than expected.';
            $message="Llalaal";
            
           // echo json_encode(['message' => $message]); 

           // return false;
           


        }}
    }
    else{

       // echo("Nije ok");
    }
}



else{
http_response_code(404);

}








?>
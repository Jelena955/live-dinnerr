window.onload=function(){

  if(location.href.includes("index.php")||location.href.includes("about.php")) { 
      
    
    var link=document.getElementsByClassName("kat");
    

    //console.log(document.getElementsByTagName("kat"))



   
   var i=0;

    for(i;i<link.length;i++){
      link[i].addEventListener("click", filtriranje);
    }

    document.querySelector("#submitpr").addEventListener("click", pretraga);

    if(location.href.includes("index.php")||location.href.includes("about.php") || location.href.includes("redirekt.php")) { 

    $(".hrana").click(function(e){

        


        e.preventDefault();
      
       $(this).next().css("display", "block")

       $( ".dugme").click(function(e){
           e.preventDefault();
           $(".opis").css("display", "none")
       })
       
    })}

   
 


}
//klikom na dugme provera podataka za registraciju

if(location.href.includes("registration.php")||location.href.includes("admin/template/pages/tables/basic-table.php")){ 

  
  document.querySelector("#submitr").addEventListener("click", provera);

}

if(location.href.includes("admin/template/pages/tables/basic-table.php")){


document.querySelector("#submitfood").addEventListener("click", proverahrane);

}


    //klikom na dugme provera podataga za login
    if(location.href.includes("login.php")){ 

    document.querySelector("#submitlogovanje").addEventListener("click", proveralog);

}

if(location.href.includes("contact.php")){ 

    document.querySelector("#submitk").addEventListener("click", proverakontakt);




}

if(location.href.includes("admin/template/pages/tables/basic-table.php")){

    $(".obrisijelo").click(function(e){

      let id=  this.value

        e.preventDefault();
       $.ajax({

        url:"../../../../obrisijelo.php",
        method:"POST",
        data:{
            idP:id,
           

        },
        success:function (data) {
           alert("Successfuly deleted!");
           setTimeout(location.reload(), 3000);
            
        }



       })

       
    })


    $(".obrisikorisnika").click(function(e){

        let id=  this.value
  
          e.preventDefault();
         $.ajax({
  
          url:"../../../../obrisikorisnika.php",
          method:"POST",
          data:{
              idP:id,
             
  
          },
          success:function (data) {
             alert("Successfuly deleted!");
             setTimeout(location.reload(), 3000);
              
          }
  
  
  
         })
  
         
      })

    
    $(".update").click(function(e){


        e.preventDefault();
        //alert("fdfd")

        let id=this.dataset.id;
        let ime=this.dataset.ime;
       let proteini= this.dataset.proteini;
       let masti= this.dataset.masti;
       let uh= this.dataset.uh;

       let imee=document.getElementById("ime."+id).value;
       let proteinii=document.getElementById("proteini."+id).value;
       let mastii=document.getElementById("masti."+id).value;
       let uhh=document.getElementById("uh."+id).value;
      
       console.log(imee);
       
    
    
      let data={}
      let greske=0
      let broj=0

     
           if(imee==""||proteinii==""||mastii==""||uhh==""){
               alert("Ne moze prazno")
               greske++;
           

          
       }
       if(greske==0){
           console.log(data);
           $.ajax({
               url: "../../../../php/updatovanjejelo.php",
               method:"post",
               dataType:"json",
               data:{
                   idP:id,
                   imeP:imee,
                   proteiniP:proteinii,
                   mastiP:mastii,
                   uhP:uhh
               },
               success:function(data){
                   console.log(data)
               }

           })
       }


    })


}

if(location.href.includes("redirekt.php")){ 
//Slanje odgovora na anketu klikom na dugme
$("#dugmean").click(function(e){
    e.preventDefault();

    let id=this.value
    let idodgovor=document.querySelector('input[name="anketa"]:checked').value;
    console.log(idodgovor);

   

    $.ajax({

        url:"anketa.php",
        method:"POST",
        data:{
            idanketaP:id,
            idodgovorP:idodgovor,


        },
        success:function(data){
            alert("Hvala na odgovoru");
            setTimeout(location.reload(), 3000);

        }


    })


})


}



//document.getElementById("logout").addEventListener("click", odjavise)

//if(location.href.includes("basic-table.php")) { 

//    document.querySelector("#submitk").addEventListener("click", proverakontakt);



//}




    function provera(e){

        e.preventDefault()

        
    
        var greske=[];
        let ime, prezime, datum, username, mejl, password, password2, bmi;
        ime=document.getElementById("name").value;
        prezime=document.getElementById("lastname").value;
        username=document.getElementById("username").value;
        password=document.getElementById("password").value;
        password2=document.getElementById("password2").value;
        dugme=document.getElementById("submitr").value;
        bmi=document.getElementById("bmi").value
        
        mejl=document.getElementById("email").value;
        console.log(ime,prezime, mejl);
    
        let imegr, prezimegr, usernamegr, passwordgr, password2gr, mejlgr, bmigr;
        imegr=document.getElementById("Imegr");
        prezimegr=document.getElementById("Prezimegr");
      
        usernamegr=document.getElementById("Usernamegr");
        mejlgr=document.getElementById("Mejlgr");
        passwordgr=document.getElementById("Passwordgr");
        password2gr=document.getElementById("Password2gr");
        bmigr=document.getElementById("Bmigr");
    
        //console.log(imegr, prezimegr,vrsedenjagr, brosobagr, mejlgr);
    
        let reIme, rePrezime, reUsername, rePassword, reBmi, reMejl
    
        reIme = /^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/;
        rePrezime = /^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/; 
        reUsername = /^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/
        rePassword=/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/
        reMejl=/^[a-z][a-z\d\_\.\-]+\@[a-z\d]+(\.[a-z]{2,4})+$/;
        reBmi=/^(0|[1-9]\d*)(.\d+)?$/;
       
    
       
        
    
    
    
        if(ime == ""){
            
            imegr.innerHTML = "Polje ime je prazno."
             greske.push("ime nije ok");
        }
        else{
            if(!reIme.test(ime)){
              
                imegr.innerHTML = "Ime nije u dobrom formatu (npr Nikola ili Nikola Jovanovic)";
              greske.push("ime nije ok");
                
            }else{
                imegr.innerHTML = "";
               
                
            }
        }
    
        if(prezime == ""){
            
            prezimegr.innerHTML = "Polje Prezime je prazno."
            greske.push("e-mail nije ok");
        }
        else{
            if(!rePrezime.test(prezime)){
                
                prezimegr.innerHTML = "Prezime nije u dobrom formatu (npr Peric)";
                greske.push("prezime nije ok");
            }else{
                prezimegr.innerHTML = "";
    
                
                
            }
        }
        if(mejl == ""){
            
            mejlgr.innerHTML = "Polje Email je prazno."
            greske.push("e-mail nije ok");
        }
        else{
            if(!reMejl.test(mejl)){
                
                mejlgr.innerHTML = "Email nije u dobrom formatu (npr pera@gmail.com)";
                greske.push("e-mail nije ok");
            }else{
                mejlgr.innerHTML = "";
    
                
                
            }
        }

        if(username == ""){
            
            usernamegr.innerHTML = "Polje Username je prazno."
            greske.push("username nije ok");
        }
        else{
            if(!reUsername.test(username)){
                
                usernamegr.innerHTML = "Username nije u dobrom formatu (npr pera@gmail.com)";
                greske.push("username nije ok");
            }else{
                usernamegr.innerHTML = "";
    
                
                
            }
        }
        if(password == ""){
            
            passwordgr.innerHTML = "Polje Username je prazno."
            greske.push("username nije ok");
        }
        else{
            if(!rePassword.test(password)){
                
                passwordgr.innerHTML = "Password nije u dobrom formatu (npr pera@gmail.com)";
                greske.push("Password nije ok");
            }else{
               passwordgr.innerHTML = "";
    
                
                
            }
        }
        if(password2 == ""){
            
            password2gr.innerHTML = "Polje Password again je prazno."
            greske.push("password nije ok");
        }
        else{
            if(password2!=password){
                
                password2gr.innerHTML = "Password again mora biti isti kao i password";
                greske.push(" password2 nije ok");
            }else{
                password2gr.innerHTML = "";
    
                
                
            }
        }

        if(!reBmi.test(bmi)){

            bmigr.innerHTML = "Bmi nije u dobrom formatu";
            greske.push(" bmi nije ok");


        }
        else{
            bmigr.innerHTML="";
        }

        if (greske.length==0){

            if(location.href.includes("registration.php")){ 
            $.ajax({
                
                url:"php/uspesnaregistracija.php",
                method:"POST",
                
                data:{
                    imeP: ime,
                    prezimeP:prezime,
                    usernameP:username,
                    mejlP:mejl,
                    passwordP:password,
                    password2P:password2,
                    dugmeP:dugme,
                    bmiP:bmi


                },

                success: function (data) {
                   alert("Uspesna registracija");

                   window.location.href="login.php";
                    
                    
                    
                },
                error: function(err){

                    console.log(err)

                   // let odgovor=JSON.parse(message.responseText)

                    //console.log(errorMsg)
                   // console.log(JSON.parse(message))
                    //alert(odgovor.message)
                    //$("#Usernamegr").html(odgovor);
                }
            }



            )
        }

        else if(location.href.includes("admin/template/pages/tables/basic-table.php")){

            $.ajax({
                
                url:"../../../../php/uspesnaregistracija.php",
                method:"POST",
                dataType:"json",
                data:{
                    imeP: ime,
                    prezimeP:prezime,
                    usernameP:username,
                    mejlP:mejl,
                    passwordP:password,
                    password2P:password2,
                    dugmeP:dugme,
                    bmiP:bmi


                },

                success: function (data) {

                    alert(data);
                    console.log(data)
                    
                    
                    
                },
                error: function(err){

                    console.log(err)

                   // let odgovor=JSON.parse(message.responseText)

                    //console.log(errorMsg)
                   // console.log(JSON.parse(message))
                    //alert(odgovor.message)
                    //$("#Usernamegr").html(odgovor);
                }
            }



            )


        }
    
    
    }

        else {

            return false
        }
    
    
    
    
    }

    function filtriranje(e){
        e.preventDefault()

        var kategorija= this.getAttribute('name');
       

       $.ajax({
        url:"filtriranje.php",
        method:"POST",
        dataType:"json",
        data:{
            kategorijaP:kategorija


        },

        success: function (data) {

           
            console.log(data)
            kategorije(data)
            
            
            
        },
        error: function(err){

           console.log(err)
        }
    }



    )
}

function kategorije(data){

  var div=  document.getElementById("proizvodi");
  var ispis=""
  for (d of data){
ispis+=`

    <div class="col-lg-4 col-md-6 special-grid ${d.tempklas}">
            <div class="gallery-single fix">
                <img src="images/${d.src}.jpg" class="img-fluid" alt="Image">
                <div class="why-text">
                    <h4>${d.naziv}</h4>
                    <p>${d.opis}</p>
                    <h6 style="font-size:10px">Proteins:${d.proteini}g</h6>
                    <h6 style="font-size:10px">Fats:${d.masti}g</h6>
                    <h6 style="font-size:10px">Carbohydrates:${d.uh}</h6>
                </div>
            </div>
        </div>
    
    `


  }
  div.innerHTML=ispis;
}


function proveralog(e){
    e.preventDefault();

   // alert("Dwdw")

    let nizgresaka=[];
let username, password, dugme

    username=document.getElementById("username").value;
        password=document.getElementById("password").value;
        dugme=document.getElementById("submitlogovanje").value;

        let usernamegr, passwordgr

        usernamegr=document.getElementById("Usernamegr");
        passwordgr=document.getElementById("Passwordgr");

        let reUsername, rePassword

        reUsername = /^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/
        rePassword=/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/

        if(username == ""){
            
            usernamegr.innerHTML = "Polje Username je prazno."
            nizgresaka.push("username nije ok");
        }
        else{
            if(!reUsername.test(username)){
                
                usernamegr.innerHTML = "Username nije u dobrom formatu (npr pera@gmail.com)";
                nizgresaka.push("username nije ok");
            }else{
                usernamegr.innerHTML = "";
    
                
                
            }
        }
        if(password == ""){
            
            passwordgr.innerHTML = "Polje Username je prazno."
            nizgresaka.push("username nije ok");
        }
        else{
            if(!rePassword.test(password)){
                
                passwordgr.innerHTML = "Password nije u dobrom formatu (npr pera@gmail.com)";
                nizgresaka.push("Password nije ok");
            }else{
               passwordgr.innerHTML = "";
    
                
                
            }
        }


        if (nizgresaka.length==0){

            //alert("dxcew")

            $.ajax({
                url:"php/proveralogovanje.php",
                method:"POST",
               
                data:{
                   
                    usernameP:username,
                    
                    passwordP:password,
                   
                    dugmeP:dugme


                },

                success: function(data){

                    alert("uspesno logovanje")


                  window.location.href="redirekt.php";
                },
                
                
               
                error: function(xhr, status, errorMsg){

                }
            }



            )
        }

        else {

            return false
        }
    
    
    
    
    }

    function proverakontakt(e){
        e.preventDefault()

        let greske=[];
let ime, mejl, poruka, dugme

    ime=document.getElementById("ime").value;
        mejl=mejl=document.getElementById("mejl").value;
        poruka=document.getElementById("poruka").value;
        dugme=document.getElementById("submitk").value;


        let imegr, mejlgr, porukagr

       imegr=document.getElementById("Imegr");
        mejlgr=document.getElementById("Mejlgr");
            porukagr=document.getElementById("Porukagr");

        let reIme, reMejl, rePoruka

        reIme = /^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/;
        reMejl=/^[a-z][a-z\d\_\.\-]+\@[a-z\d]+(\.[a-z]{2,4})+$/;
        rePoruka=/^[A-Za-z0-9.,\s]{5,1000}$/; 

        if(ime == ""){
            
            imegr.innerHTML = "Polje ime je prazno."
             greske.push("ime nije ok");
        }
        else{
            if(!reIme.test(ime)){
              
                imegr.innerHTML = "Ime nije u dobrom formatu (npr Nikola ili Nikola Jovanovic)";
              greske.push("ime nije ok");
                
            }else{
                imegr.innerHTML = "";
               
                
            }
        }


        if(mejl == ""){
            
            mejlgr.innerHTML = "Polje Email je prazno."
            greske.push("e-mail nije ok");
        }
        else{
            if(!reMejl.test(mejl)){
                
                mejlgr.innerHTML = "Email nije u dobrom formatu (npr pera@gmail.com)";
                greske.push("e-mail nije ok");
            }else{
                mejlgr.innerHTML = "";
    
                
                
            }
        }

        if(poruka == ""){
            
            porukagr.innerHTML = "Polje Message is empty."
            greske.push("e-mail nije ok");
        }
        else{
            if(!rePoruka.test(poruka)){
                
                porukagr.innerHTML = "Message nije u dobrom formatu (npr pera@gmail.com)";
                greske.push("message nije ok");
            }else{
                porukagr.innerHTML = "";
    
                
                
            }
        }


        if (greske.length==0){

            $.ajax({
                url:"php/uspesnaporuka.php",
                method:"POST",
                dataType:"json",
                data:{
                    imeP: ime,
                    mejlP:mejl,
                    dugmeP:dugme,
                    porukaP:poruka


                },

                success: function (data) {

                    alert(data);
                    console.log(data)
                    
                    
                    
                },
                error: function(err){

                    console.log(err)

                   // let odgovor=JSON.parse(message.responseText)

                    //console.log(errorMsg)
                   // console.log(JSON.parse(message))
                    //alert(odgovor.message)
                    //$("#Usernamegr").html(odgovor);
                }
            }



            )
        }

        else {

            return false
        }

    }

    function odjavise(){

        $.ajax({
            url:"logout.php",
            method:"POST",
            dataType:"json",
            

            success: function (data) {

                alert(data);
                console.log(data)
                
                
                
            },
            error: function(err){

                console.log(err)

               // let odgovor=JSON.parse(message.responseText)

                //console.log(errorMsg)
               // console.log(JSON.parse(message))
                //alert(odgovor.message)
                //$("#Usernamegr").html(odgovor);
            }
        }



        )
    }

    function pretraga(e){

        e.preventDefault();
        let vrednost=document.getElementById("pretrazi").value;

        $.ajax({
            url:"pretraga.php",
            method:"POST",
            dataType:"json",
            data:{
                vrednostP:vrednost
    
    
            },
    
            success: function (element) {
    
               
                console.log(element)
                vrednosti(element)
                
                
                
            },
            error: function(err){
    
               console.log(err)
            }
        }
    
    
    
        )
    }

    function vrednosti(element){

        var div=  document.getElementById("proizvodi");
        var ispis=""
        for (e of element){
      ispis+=`
      
          <div class="col-lg-4 col-md-6 special-grid ${e.tempklas}">
                  <div class="gallery-single fix">
                      <img src="images/${e.src}.jpg" class="img-fluid" alt="Image">
                      <div class="why-text">
                          <h4>${e.ime}</h4>
                          <p>${e.opis}</p>
                          <h6 style='font-size:8px'> ${e.proteini}</h6>
                          <h6 style='font-size:8px'> ${e.masti}</h6>
                          <h6 style='font-size:8px'> ${e.uh}</h6>
                      </div>
                  </div>
              </div>
          
          `
      
      
        }
        div.innerHTML=ispis;
      }}


function updatejelo(e){
    


    e.preventDefault()

        
    
    var greske=[];
    let naziv, opis, proteini, uh, masti;
    naziv=document.getElementById("names").value;
    opis=document.getElementById("description").value;
    proteini=document.getElementById("proteini").value;
    masti=document.getElementById("masti").value;
    uh=document.getElementById("uh").value;
    id=document.getElementById("id").value
    dugme=document.getElementById("submitu").value;
    
    
   
  

    let nazivgr, opisgr, proteinigr, uhgr, mastigr;
    nazivgr=document.getElementById("Imegr");
    opisgr=document.getElementById("Opisgr");
  
    proteinigr=document.getElementById("Proteinigr");
    uhgr=document.getElementById("Uhgr");
    mastigr=document.getElementById("Mastigr");
    

    //console.log(imegr, prezimegr,vrsedenjagr, brosobagr, mejlgr);

    let reNaziv, reGramaza

    reNaziv = /^[A-Z][a-z]{2,14}(\s[a-z]{2,14})*$/;
     
  
    reGramaza=/^(0|[1-9]\d*)(.\d+)?$/;
   

   
    



    if(naziv == ""){
        
        nazivgr.innerHTML = "Polje ime je prazno."
         greske.push("ime nije ok");
    }
    else{
        if(!reNaziv.test(naziv)){
          
            nazivgr.innerHTML = "Ime nije u dobrom formatu (npr Nikola ili Nikola Jovanovic)";
          greske.push("ime nije ok");
            
        }else{
            nazivgr.innerHTML = "";
           
            
        }
    }

    
   
    if(proteini == ""){
        
        proteinigr.innerHTML = "Polje Email je prazno."
        greske.push("e-mail nije ok");
    }
    else{
        if(!reGramaza.test(proteini)){
            
            proteinigr.innerHTML = "Email nije u dobrom formatu (npr pera@gmail.com)";
            greske.push("e-mail nije ok");
        }else{
            proteinigr.innerHTML = "";

            
            
        }
    }

    if(masti == ""){
        
       mastigr.innerHTML = "Polje Username je prazno."
        greske.push("username nije ok");
    }
    else{
        if(!reGramaza.test(masti)){
            
            mastigr.innerHTML = "Username nije u dobrom formatu (npr pera@gmail.com)";
            greske.push("username nije ok");
        }else{
            mastigr.innerHTML = "";

            
            
        }
    }
    if(uh == ""){
        
        uhgr.innerHTML = "Polje Username je prazno."
        greske.push("username nije ok");
    }
    else{
        if(!reGramaza.test(uh)){
            
            uhgr.innerHTML = "Password nije u dobrom formatu (npr pera@gmail.com)";
            greske.push("Password nije ok");
        }else{
           uhgr.innerHTML = "";

            
            
        }
    }
    
    if (greske.length==0){

        
        $.ajax({
            
            url:"php/updatovanjejelo.php",
            method:"POST",
            dataType:"json",
            data:{
                nazivP: naziv,
                opisP:opis,
               proteiniP:proteini,
                mastilP:masti,
                
                uhP:uh,
                idP:id,
                dugmeP:dugme,
               


            },

            success: function (data) {

                alert(data);
                console.log(data)
                
                
                
            },
            error: function(err){

                console.log(err)

               // let odgovor=JSON.parse(message.responseText)

                //console.log(errorMsg)
               // console.log(JSON.parse(message))
                //alert(odgovor.message)
                //$("#Usernamegr").html(odgovor);
            }
        }



        )
    }



}

function proverahrane(e){

    e.preventDefault();

    var greske=[];
    let naziv, opis, proteini, uh, masti;
    naziv=document.getElementById("namess").value;
    proteini=document.getElementById("proteinii").value;
    masti=document.getElementById("mastii").value;
    uh=document.getElementById("uhh").value;
  
    dugme=document.getElementById("submitfood").value;
    
    
   
  

    let nazivgr, proteinigr, uhgr, mastigr;
    nazivgr=document.getElementById("Imegrr");
    
  
    proteinigr=document.getElementById("Proteinigrr");
    uhgr=document.getElementById("Uhgrr");
    mastigr=document.getElementById("Mastigrr");
    

    //console.log(imegr, prezimegr,vrsedenjagr, brosobagr, mejlgr);

    let reNaziv, reGramaza

    reNaziv = /^[A-Z][a-z]{2,14}(\s[a-z]{2,14})*$/;
     
  
    reGramaza=/^(0|[1-9]\d*)(.\d+)?$/;
   

   
    



    if(naziv == ""){
        
        nazivgr.innerHTML = "Field name is empty."
         greske.push("ime nije ok");
    }
    else{
        if(!reNaziv.test(naziv)){
          
            nazivgr.innerHTML = "Name is not in right format (etc. Chicken)";
          greske.push("ime nije ok");
            
        }else{
            nazivgr.innerHTML = "";
           
            
        }
    }

    
   
    if(proteini == ""){
        
        proteinigr.innerHTML = "Field protein is empty."
        greske.push("nije ok");
    }
    else{
        if(!reGramaza.test(proteini)){
            
            proteinigr.innerHTML = "Protein is not in right format (etc. 44)";
            greske.push("nije ok");
        }else{
            proteinigr.innerHTML = "";

            
            
        }
    }

    if(masti == ""){
        
       mastigr.innerHTML = "Field fat is empty."
        greske.push(" nije ok");
    }
    else{
        if(!reGramaza.test(masti)){
            
            mastigr.innerHTML = "Fat is not in right format (etc. 44)";
            greske.push("nije ok");
        }else{
            mastigr.innerHTML = "";

            
            
        }
    }
    if(uh == ""){
        
        uhgr.innerHTML = "Field carbohydrates is empty."
        greske.push("username nije ok");
    }
    else{
        if(!reGramaza.test(uh)){
            
            uhgr.innerHTML = "Carbohydrates is not in right format (etc. 44)";
            greske.push(" nije ok");
        }else{
           uhgr.innerHTML = "";

            
            
        }
    }
    
    if (greske.length==0){

        
        $.ajax({
            
            url:"../../../../php/insertovanjejelo.php",
            method:"POST",
            
            data:{
                imeP: naziv,
                opisP:opis,
               proteiniP:proteini,
                mastiP:masti,
                
                uhP:uh,
              
                dugmeP:dugme,
               


            },

            success: function (data) {

                alert("Succesfuly inserted!");
                
              
                
                
                
            },
            error: function(err){

                console.log(err)

               // let odgovor=JSON.parse(message.responseText)

                //console.log(errorMsg)
               // console.log(JSON.parse(message))
                //alert(odgovor.message)
                //$("#Usernamegr").html(odgovor);
            }
        }



        )
    }





}


    

        
    


    




    






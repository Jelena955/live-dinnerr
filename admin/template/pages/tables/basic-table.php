<?php

@session_start();

include "../../../../konekcija/konekcija.php";

if($konekcija){
  
  //Izvlacenje podataka za tabele za update, insert i delete
  $upit="SELECT * FROM korisnik k INNER JOIN slika s ON k.idslika=s.idslika ";
  $rezultat=$konekcija->query($upit);
  $rez=$rezultat->fetchAll();

  $upit2="SELECT *FROM poruke p INNER JOIN korisnik k ON p.idkorisnik=k.idkorisnik ";
  $rezultat2=$konekcija->query($upit2);
  $rez2=$rezultat2->fetchAll();

  $upit3="SELECT * FROM jelo j INNER JOIN slika s ON j.idslika=s.idslika";
  $rezultat3=$konekcija->query($upit3);
  $rez3=$rezultat3->fetchAll();

  $korisnik2=$_SESSION["korisnik"];

  $upit4="SELECT * FROM korisnik k INNER JOIN slika s ON k.idslika=s.idslika WHERE k.idkorisnik='".$korisnik2."'";
  $rezultat4=$konekcija->query($upit4);
  $rez4=$rezultat4->fetchAll();
//Izvlacenje ukupnog br odgovora
  $upit5="SELECT count(idkorisnikodgovor) as broj  FROM korisnik_odgovor";
  $rezultat5=$konekcija->query($upit5);
  $rez5=$rezultat5->fetch();
  $brojglasalih=$rez5->broj;
//Izvlacenje pojedinacnih odgovora
  $upit6="SELECT o.odgovor as odgovori, COUNT(ko.idodgovor) as odgovorcic FROM korisnik_odgovor ko INNER JOIN odgovor o ON ko.idodgovor=o.idodgovor GROUP BY ko.idodgovor";
  $rezultat6=$konekcija->query($upit6);
  $rez6=$rezultat6->fetchAll();
  

  

   ?>


  

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="../../../../index.php"><h3>Live-dinner</h3></a>
          <a class="sidebar-brand brand-logo-mini" href="../../../../index.php"><h3>L</h3></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <?php foreach($rez4 as $red4) {
                    echo("<img class='img-xs rounded-circle '  src=' ../../../../images/$red4->src.jpg' alt='$red4->alt'");
                  } ?>
                  
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                <?php foreach($rez4 as $red4) {

                 echo(  "<h5 class='mb-0 font-weight-normal'>$red4->ime $red4->prezime-$red4->username</h5>");}?>
                
                </div>
              </div>
              
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../../../index.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Home</span>
            </a>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../../../korisnik.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Profile<span>
            </a>
          </li>
          
          
          
            
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="../../../../index.php"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown d-none d-lg-block">
                <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-toggle="dropdown" aria-expanded="false" href="#">+ Create New Project</a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
                  <h6 class="p-3 mb-0">Projects</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-file-outline text-primary"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Software Development</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-web text-info"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">UI Development</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-layers text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Software Testing</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all projects</p>
                </div>
              </li>
              
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                  <?php foreach($rez4 as $red4) {
                    echo("<img class='img-xs rounded-circle '  src=' ../../../../images/$red4->src.jpg' alt='$red4->alt'");
                  
                   echo( "<p class='mb-0 d-none d-sm-block navbar-profile-name'>$red4->ime $red4->prezime-$red4->username</p> " );}?>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                   <div class="preview-thumbnail">
                    
                    <div class="preview-item-content">
                   <p class="preview-subject mb-1"> <a href="../../../../logout.php">Log out</a></p> 
                    </div>
                  </a>
                  
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Basic Tables </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Messages</h4>
                    
                    
                    
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>User</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>

                       <?php foreach($rez2 as $red){
                         echo ( " 
                          <tr>
                            <td>$red->username</td>
                            <td>$red->poruka</td>
                            <td>$red->datum</td>
                            <td><label class='badge badge-danger'><a href='../../../../obrisi.php?id=$red->idporuka' id='obrisi'>Delete</a></label></td>
                            
                          
                          
                          </tr>") ;
                           } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Users</h4>
                    
                    <button class='badge badge-danger' type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" style="border:none">Insert</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="name">
            <div class="help-block with-errors Imegr" id="Imegr" style="color:red"></div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Lastname:</label>
            <input type="text" class="form-control" id="lastname">
            <div class="help-block with-errors Imegr" id="Prezimegr" style="color:red"></div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mail:</label>
            <input type="text" class="form-control" id="email">
            <div class="help-block with-errors Imegr" id="Mejlgr" style="color:red"></div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="text" class="form-control" id="username">
            <div class="help-block with-errors Imegr" id="Usernamegr" style="color:red"></div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="text" class="form-control" id="password">
            <div class="help-block with-errors Imegr" id="Passwordgr" style="color:red"></div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password again:</label>
            <input type="text" class="form-control" id="password2">
            <div class="help-block with-errors Imegr" id="Password2gr" style="color:red"></div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Bmi:</label>
            <input type="text" class="form-control" id="bmi">
            <div class="help-block with-errors Imegr" id="Bmigr" style="color:red"></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
        <button type="button" class="btn btn-primary" id="submitr">Insert</button>
      </div>
    </div>
  </div>
</div>





                    
                    
                    
                    
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> User </th>
                            <th> First name </th>
                            <th> Bmi </th>
                            <th> Mail </th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($rez as $red){

                          echo( "
                          <tr>
                            <td class='py-1'>
                              <img src='../../../../images/$red->src.jpg' alt='$red->alt' />
                            </td>
                            <td>$red->ime</td>
                            <td>
                              <div class='progress'>
                                <div class='progress-bar bg-success' role='progressbar' style='width:$red->bmi%' aria-valuenow='$red->bmi' aria-valuemin='0' aria-valuemax='100'></div>
                              </div>
                            </td>
                            <td> $red->mejl </td>
                            <td><button class='badge badge-danger obrisikorisnika' value='$red->idkorisnik'>Delete</button></td>
                            
                          
                           
                          </tr>");}?>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Food</h4>
                    <button class='badge badge-danger' type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" data-whatever="@getbootstrap" style="border:none">Insert</button>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="namess">
            <div class="help-block with-errors Imegr" id="Imegrr" style="color:red"></div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Protein:</label>
            <input type="text" class="form-control" id="proteinii">
            <div class="help-block with-errors Imegr" id="Proteinigrr" style="color:red"></div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Fat:</label>
            <input type="text" class="form-control" id="mastii">
            <div class="help-block with-errors Imegr" id="Mastigrr" style="color:red"></div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Carbohydrates:</label>
            <input type="text" class="form-control" id="uhh">
            <div class="help-block with-errors Imegr" id="Uhgrr" style="color:red"></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submitfood">Insert</button>
      </div>
    </div>
  </div>
</div>

                    
                    
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          
                          <tr>
                            <th> Image </th>
                            <th> Name </th>
                            <th> Protein </th>
                            <th> Fat </th>
                            <th> Carbonate </th>
                          </tr> 
                        </thead>
                        <tbody>
                        <?php
                          foreach($rez3 as $red){

                            
                           

                          echo(" <tr>
                            <td> <img src='../../../../images/$red->src.jpg' alt='$red->alt' /> </td>
                            <td>  <div class='form-group'>
                            <label for='recipient-name' class='col-form-label' ></label>
                            <input type='text' class='form-control $red->ime$red->idjelo'value='$red->ime' id='ime.$red->idjelo' > 
                          </div> </td>
                            <td>
                            <div class='form-group'>
                            <label for='recipient-name' class='col-form-label'></label>
                            <input type='text' class='form-control $red->ime$red->idjelo' value='$red->proteini' id='proteini.$red->idjelo'>
                          </div>
                            </td>
                            <td> <div class='form-group'>
                            <label for='recipient-name' class='col-form-label'></label>
                            <input type='text' class='form-control $red->ime$red->idjelo' value='$red->masti' id='masti.$red->idjelo'> 
                          </div> </td>
                            <td><div class='form-group'>
                            <label for='recipient-name' class='col-form-label'></label>
                            <input type='text' class='form-control $red->ime$red->idjelo' value='$red->uh' id='uh.$red->idjelo'>
                          </div> </td>
                            <td><button class='badge badge-danger update $red->ime$red->idjelo' type='button' value='$red->idjelo' data-id='$red->idjelo' data-naziv='$red->ime' data-proteini='$red->proteini' data-masti='$red->masti' data-uh='$red->uh' style='border:none'>Update</button> </td>
                            <td><button class='badge badge-danger obrisijelo' value='$red->idjelo'>Delete</button></td>
                          </tr>");}?>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
             

              <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label" >Name:</label>
            <input type="text" class="form-control" id="names">
            <div class="help-block with-errors Imegr" id="Imegr" style="color:red"></div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Description:</label>
            <input type="text" class="form-control" id="description">
            <div class="help-block with-errors Imegr" id="Opisgr" style="color:red"></div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label" value=<?= $_SESSION["idjelo"]?>>Proteins:</label>
            <input type="text" class="form-control" id="proteini">
            <div class="help-block with-errors Imegr" id="Proteinigr" style="color:red"></div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Fat:</label>
            <input type="text" class="form-control" id="masti">
            <div class="help-block with-errors Imegr" id="Mastigr" style="color:red"></div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Carbonate:</label>
            <input type="text" class="form-control" id="uh">
            <div class="help-block with-errors Imegr" id="Uhgr" style="color:red"></div>
          </div>
         
        </form>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
        <button type="button" class="btn btn-primary" id="submitu">Insert</button>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-12 grid-margin stretch-card">
<h1> Result of poll: <h1> </br>

      <?php
//Prikaz rezultata ankete
foreach($rez6 as $red6){
  $posto=$red6->odgovorcic/$brojglasalih*100; 

  echo("<p> For answer   $red6->odgovori voted $posto % of users</p></br>");
}

      
      ?>
      
       </div> </br>

       
              
                  
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <script src="../../../../js/main.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>

<?php }?>


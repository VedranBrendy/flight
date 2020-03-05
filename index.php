<?php include_once("assets/layout/header.php"); ?>
<?php include_once("assets/layout/nav.php"); ?>
<?php include_once("config/helper_function.php"); ?>
<?php include_once("config/Database.php"); ?>


<?php 

if (isset($_POST['submit'])) {

  $database = new Database;
  $db = $database->connect();

   if ($_POST['customRadio'] == 'povratna'){   

		 	$polaziste = $_POST['polaziste'];
			$odrediste = $_POST['odrediste'];
			$vrstaLeta = $_POST['customRadio'];
			$datepicker = datumHRuSQL($_POST['datepicker']);
      $datepicker2 = datumHRuSQL($_POST['datepicker2']);
      
      // Create query
      $query = 'INSERT INTO flight (polaziste, odrediste, datum_odlazak, datum_povratak, vrsta_leta) VALUES (:polaziste, :odrediste, :datum_odlazak, :datum_povratak, :vrsta_leta)';

      // Prepare statement
      $stmt = $db->prepare($query);

      // Bind data
      $stmt->bindParam(':polaziste', $polaziste, PDO::PARAM_STR);
      $stmt->bindParam(':odrediste', $odrediste, PDO::PARAM_STR);
      $stmt->bindParam(':datum_odlazak', $datepicker, PDO::PARAM_STR);
      $stmt->bindParam(':datum_povratak', $datepicker2, PDO::PARAM_STR);
      $stmt->bindParam(':vrsta_leta', $vrstaLeta, PDO::PARAM_STR);
  
    
        // Execute query
      if($stmt->execute()) {

        header('Location:index.php');

      } 
    }
     else if($_POST['customRadio'] == 'jednosmjerna'){

 
			$polaziste = $_POST['polaziste'];
			$odrediste = $_POST['odrediste'];
			$vrstaLeta = $_POST['customRadio'];
			$datepicker = datumHRuSQL($_POST['datepicker']);
   
      
      // Create query
      $query = 'INSERT INTO flight (polaziste, odrediste, datum_odlazak, vrsta_leta) VALUES (:polaziste, :odrediste, :datum_odlazak, :vrsta_leta)';

      // Prepare statement
      $stmt = $db->prepare($query);

      // Bind data
      $stmt->bindParam(':polaziste', $polaziste, PDO::PARAM_STR);
      $stmt->bindParam(':odrediste', $odrediste , PDO::PARAM_STR);
      $stmt->bindParam(':datum_odlazak', $datepicker , PDO::PARAM_STR);
      $stmt->bindParam(':vrsta_leta', $vrstaLeta, PDO::PARAM_STR);
  


        // Execute query
      if($stmt->execute()) {

        header('Location:index.php');

      }

    
   }  else if (isset($_POST['customRadio']) == 'viseDestinacija'){

    	$polaziste = $_POST['polaziste'];
			$odrediste = $_POST['odrediste'];
			$vrstaLeta = $_POST['customRadio'];
			$datepicker = datumHRuSQL($_POST['datepicker']);
      $datepicker2 = datumHRuSQL($_POST['datepicker2']);

      $polazisteCollapse = $_POST['polazisteCollapse'];
			$odredisteCollapse = $_POST['odredisteCollapse'];
			$polazisteCollapse2 = $_POST['polazisteCollapse2'];
			$odredisteCollapse2 = $_POST['odredisteCollapse2'];
      $datepicker3 = datumHRuSQL($_POST['datepicker3']);
      $datepicker4 = datumHRuSQL($_POST['datepicker4']);

      // Create query
      $query = 'INSERT INTO flight (polaziste, odrediste, datum_odlazak, datum_povratak, vrsta_leta, polaziste2, odrediste2,   polaziste3, odrediste3, datum_odlaska, datum_odlaska2) 
      VALUES 
      (:polaziste, :odrediste, :datum_odlazak, :datum_povratak, :vrsta_leta, :polaziste2, :odrediste2, :polaziste3, :odrediste3, :datum_odlaska, :datum_odlaska2)';

      // Prepare statement
      $stmt = $db->prepare($query);

      // Bind data
      $stmt->bindParam(':polaziste', $polaziste, PDO::PARAM_STR);
      $stmt->bindParam(':odrediste', $odrediste , PDO::PARAM_STR);
      $stmt->bindParam(':datum_odlazak', $datepicker , PDO::PARAM_STR);
      $stmt->bindParam(':datum_povratak', $datepicker2 , PDO::PARAM_STR);
      $stmt->bindParam(':vrsta_leta', $vrstaLeta , PDO::PARAM_STR);
      $stmt->bindParam(':polaziste2', $polazisteCollapse , PDO::PARAM_STR);
      $stmt->bindParam(':odrediste2', $odredisteCollapse , PDO::PARAM_STR);
      $stmt->bindParam(':polaziste3', $polazisteCollapse2 , PDO::PARAM_STR);
      $stmt->bindParam(':odrediste3', $odredisteCollapse2 , PDO::PARAM_STR);
      $stmt->bindParam(':datum_odlaska', $datepicker3 , PDO::PARAM_STR);
      $stmt->bindParam(':datum_odlaska2', $datepicker4 , PDO::PARAM_STR);


      // Execute query
      if($stmt->execute()) {

        header('Location:index.php');

      }
  

   } 


}


?>

  <div class="container">
    <div class="jumbotron mt-3">
      <h1 class="display-5 text-center">Kuda letiš?</h1>

      <!-- FORM -->
      <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="form" autocomplete="off">
      <div class="row">

      <!-- Polazište -->
        <div class="col-md-6">
          <div class="form-group">
            <label class="col-form-label" for="inputDefault">Polazište</label>
            <input class="form-control" name="polaziste" type="text" placeholder="Unesi ime grada" id="polaziste">
          </div>
        </div>

        <!-- Odredište -->
        <div class="col-md-6">
          <div class="form-group">
            <label class="col-form-label" for="inputDefault">Odredište</label>
            <input class="form-control" name="odrediste" type="text" placeholder="Unesi ime grada" id="odrediste">
          </div>
      </div>

      </div><!-- /row -->

      <div class="row">
        <!-- Datepicker 1 -->
        <div class="col-md-4">
            <div class="form-group">
              <div class="input-group date">
                  <input type="text" name="datepicker" class="form-control" placeholder="Unesi datum" id="datepicker">
                  <div class="input-group-addon">
                      <span class="glyphicon glyphicon-th"></span>
                  </div>
              </div>
            </div>
        </div>
        <div class="col-md-3 offset-md-1">
          <div class="form-group">
            <div class="custom-control custom-radio">
              <input type="radio" id="customRadio1" name="customRadio" value="povratna" 
              class="custom-control-input" checked>
              <label class="custom-control-label" for="customRadio1">Povratna</label>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" id="customRadio2" name="customRadio" value="jednosmjerna" class="custom-control-input" >
              <label class="custom-control-label" for="customRadio2">Jednosmjerna</label>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" id="customRadio3" name="customRadio" value="viseDestinacija" class="custom-control-input"
              data-toggle="collapse" href="#collapseViseDestinacija" role="button" aria-expanded="false" aria-controls="collapseViseDestinacija">
              <label class="custom-control-label" for="customRadio3">Više destinacija</label>
            </div>
          </div>

        </div>
        <div class="col-md-4">
          <div class="form-group">
            <div class="input-group date">
                <input type="text" name="datepicker2" class="form-control" placeholder="Unesi datum" id="datepicker2">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Collapse -->
      <div class="collapse" id="collapseViseDestinacija">
        <div class="card card-body mb-3 border-secondary">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="col-form-label" for="inputDefault">Polazište</label>
              <input class="form-control" name="polazisteCollapse" type="text" placeholder="Unesi ime grada" id="polazisteCollapse">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="col-form-label" for="inputDefault">Odredište</label>
              <input class="form-control" name="odredisteCollapse" type="text" placeholder="Unesi ime grada" id="odredisteCollapse">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="col-form-label" for="inputDefault">Datum</label>
            <div class="input-group date">
              <input type="text" name="datepicker3" class="form-control" placeholder="Unesi datum" id="datepicker3">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>
          </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="col-form-label" for="inputDefault">Polazište</label>
              <input class="form-control" name="polazisteCollapse2" type="text" placeholder="Unesi ime grada" id="polazisteCollapse2">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="col-form-label" for="inputDefault">Odredište</label>
              <input class="form-control" name="odredisteCollapse2" type="text" placeholder="Unesi ime grada" id="odredisteCollapse2">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="col-form-label" for="inputDefault">Datum</label>
            <div class="input-group date">
              <input type="text" name="datepicker4" class="form-control" placeholder="Unesi datum" id="datepicker4">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>
          </div>
          </div>
       </div>
        </div>
      </div>
      <!-- /collapse -->
      <div class="hr"></div>
        <div class="row mt-3 ml-1">

        <input type="submit" name="submit" class="btn btn-lg btn-primary" id="formSubmit" value="Traži">
 
        </div>
      </form>
    </div><!-- /jumbotron -->
  </div>


<?php include_once("assets/layout/footer.php"); ?>
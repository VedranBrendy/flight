<?php include_once("assets/layout/header.php"); ?>
<?php include_once("assets/layout/nav.php"); ?>
<?php include_once("config/helper_function.php"); ?>
<?php include_once("config/Database.php"); ?>
<?php include_once("config/Action.php"); ?>


<?php

// Init session
session_start();

//Display msg if any
if (isset($_SESSION['msg'])) {
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
}


//DB connect
$database = new Database;
$db = $database->connect();

// If isset btn submit
if (isset($_POST['submit'])) {

  //Check recurrsive fields if empty
  if (isset($_POST['customRadio']) && $_POST['customRadio'] == 'recurrent') {


    if (empty($_POST['departure'])) {
      $departure_err = 'Insert departure';
    }

    if (empty($_POST['arrival'])) {
      $arrival_err = 'Insert arrival';
    }

    if (empty($_POST['datepicker'])) {
      $datepicker_err = 'Insert departure date';
    }

    if (empty($_POST['datepicker2'])) {
      $datepicker2_err = 'Insert arrival date';
    }
  }
  //Check one way flight fields if empty
  if (isset($_POST['customRadio']) && $_POST['customRadio'] == 'oneWay') {
    if (empty($_POST['departure'])) {
      $departure_err = 'Insert departure';
    }

    if (empty($_POST['arrival'])) {
      $arrival_err = 'Insert arrival';
    }

    if (empty($_POST['datepicker'])) {
      $datepicker_err = 'Insert departure date';
    }
  }

  //If all errors are empty, insert data in DB 
  if (empty($departure_err) && empty($arrival_err) &&  empty($datepicker_err)) {
    
    $action = new Action($db);

    $action->create();
  }
}

?>

<div class="container">

  <div class="jumbotron mt-3">
    <h1 class="display-5 text-center">Where are you flying?</h1>

    <!-- FORM -->
    <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="form" autocomplete="off">
      <div class="row">

        <!-- Departure -->
        <div class="col-md-6">
          <div class="form-group">
            <label class="col-form-label" for="inputDefault">Departure</label>
            <input class="form-control <?php echo (!empty($departure_err)) ? 'is-invalid' : ''; ?>" name="departure" type="text" placeholder="Departure" id="departure" value="<?php echo isset($_POST['departure']) ? $_POST['departure'] : ''; ?>">
            <span class="invalid-feedback"><?php echo $departure_err; ?></span>
          </div>
        </div>

        <!-- Arrival -->
        <div class="col-md-6">
          <div class="form-group">
            <label class="col-form-label" for="inputDefault">Arrival</label>
            <input class="form-control <?php echo (!empty($arrival_err)) ? 'is-invalid' : ''; ?>" name="arrival" type="text" placeholder="Arrival" id="arrival" value="<?php echo isset($_POST['arrival']) ? $_POST['arrival'] : ''; ?>">
            <span class="invalid-feedback"><?php echo $arrival_err; ?></span>
          </div>
        </div>

      </div><!-- /row -->

      <div class="row">
        <!-- Datepicker 1 -->
        <div class="col-md-4">
          <div class="form-group">
            <div class="input-group date">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar-alt"></i></span>
              </div>
              <input type="text" name="datepicker" class="form-control  <?php echo (!empty($datepicker_err)) ? 'is-invalid' : ''; ?>" placeholder="Departure date" id="datepicker" value="<?php echo isset($_POST['datepicker']) ? $_POST['datepicker'] : ''; ?>">
              <span class="invalid-feedback"><?php echo $datepicker_err; ?></span>
            </div>
          </div>
        </div>

        <!-- Radios -->
        <div class="col-md-3 offset-md-1">
          <div class="form-group">
            <div class="custom-control custom-radio">
              <input type="radio" id="customRadio1" name="customRadio" value="recurrent" class="custom-control-input" checked> <label class="custom-control-label" for="customRadio1">Recurrent</label>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" id="customRadio2" name="customRadio" value="oneWay" class="custom-control-input">
              <label class="custom-control-label" for="customRadio2">One way</label>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" id="customRadio3" name="customRadio" value="multipleDestinations" class="custom-control-input" data-toggle="collapse" href="#multipleDestinations" role="button" aria-expanded="false" aria-controls="multipleDestinations">
              <label class="custom-control-label" for="customRadio3">Multiple destinations</label>
            </div>
          </div>
        </div>

        <!-- Datepicker 2-->
        <div class="col-md-4" id="datepickerArrival">
          <div class="form-group">
            <div class="input-group date">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar-alt"></i></span>
              </div>
              <input type="text" name="datepicker2" class="form-control <?php echo (!empty($datepicker2_err)) ? 'is-invalid' : ''; ?>" placeholder="Insert arrival date" id="datepicker2" value="<?php echo isset($_POST['datepicker2']) ? $_POST['datepicker2'] : ''; ?>">
              <span class="invalid-feedback"><?php echo $datepicker2_err; ?></span>
            </div>
          </div>
        </div>
      </div>

      <!-- Collapse -->
      <div class="collapse" id="multipleDestinations">
        <div class="card card-body mb-3 border-secondary">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-form-label" for="inputDefault">Departure</label>
                <input class="form-control" name="departureCollapse" type="text" placeholder="Departure" id="departureCollapse">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-form-label" for="inputDefault">Arrival</label>
                <input class="form-control" name="arrivalCollapse" type="text" placeholder="Departure" id="arrivalCollapse">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-form-label" for="inputDefault">Date</label>
                <div class="input-group date">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar-alt"></i></span>
                  </div>
                  <input type="text" name="datepicker3" class="form-control" placeholder="Insert date" id="datepicker3">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-form-label" for="inputDefault">Polazište</label>
                <input class="form-control" name="departureCollapse2" type="text" placeholder="Departure" id="departureCollapse2">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-form-label" for="inputDefault">Odredište</label>
                <input class="form-control" name="arrivalCollapse2" type="text" placeholder="Departure" id="arrivalCollapse2">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-form-label" for="inputDefault">Datum</label>
                <div class="input-group date">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar-alt"></i></span>
                  </div>
                  <input type="text" name="datepicker4" class="form-control" placeholder="Unesi datum" id="datepicker4">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /collapse -->
      <div class="hr"></div>
      <div class="row mt-3 ml-1">

        <input type="submit" name="submit" class="btn btn-lg btn-primary" id="formSubmit" value="Find">

      </div>
    </form>
  </div><!-- /jumbotron -->
</div>


<?php include_once("assets/layout/footer.php"); ?>
<?php
include_once("config/helper_function.php");

class Action
{

  private $conn;
  public $data;
  public $id;

  // Constructor
  public function __construct($db)
  {
    $this->conn = $db;
  }


  //Create function
  public function create()

  {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Sanitize POST
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      //If is type of flight recurrent
      if ($_POST['customRadio'] == 'recurrent') {

        $departure = $_POST['departure'];
        $arrival = $_POST['arrival'];
        $flightType = $_POST['customRadio'];
        $datepicker = dateFormatSQL($_POST['datepicker']);
        $datepicker2 = dateFormatSQL($_POST['datepicker2']);

        // Create query
        $query = 'INSERT INTO flight (departure, arrival, departure_date, arrival_date, flight_type) VALUES (:departure, :arrival, :departure_date, :arrival_date, :flight_type)';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind data
        $stmt->bindParam(':departure', $departure, PDO::PARAM_STR);
        $stmt->bindParam(':arrival', $arrival, PDO::PARAM_STR);
        $stmt->bindParam(':departure_date', $datepicker, PDO::PARAM_STR);
        $stmt->bindParam(':arrival_date', $datepicker2, PDO::PARAM_STR);
        $stmt->bindParam(':flight_type', $flightType, PDO::PARAM_STR);

        // Execute query
        if ($stmt->execute()) {

          $_SESSION['msg'] = flash("success", "Success", "Flight added in database list");

          header('Location:index.php');
          return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        //If is type of flight one way
      } else if ($_POST['customRadio'] == 'oneWay') {


        $departure = $_POST['departure'];
        $arrival = $_POST['arrival'];
        $vrstaLeta = $_POST['customRadio'];
        $datepicker = dateFormatSQL($_POST['datepicker']);


        // Create query
        $query = 'INSERT INTO flight (departure, arrival, departure_date, flight_type) VALUES (:departure, :arrival, :departure_date, :flight_type)';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind data
        $stmt->bindParam(':departure', $departure, PDO::PARAM_STR);
        $stmt->bindParam(':arrival', $arrival, PDO::PARAM_STR);
        $stmt->bindParam(':departure_date', $datepicker, PDO::PARAM_STR);
        $stmt->bindParam(':flight_type', $vrstaLeta, PDO::PARAM_STR);

        // Execute query
        if ($stmt->execute()) {

          $_SESSION['msg'] = flash("success", "Success", "Flight added in database list");

          header('Location:index.php');
          return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
      } else if (isset($_POST['customRadio']) == 'viseDestinacija') {

        $departure = $_POST['departure'];
        $arrival = $_POST['arrival'];
        $vrstaLeta = $_POST['customRadio'];
        $datepicker = dateFormatSQL($_POST['datepicker']);
        $datepicker2 = dateFormatSQL($_POST['datepicker2']);

        $departureCollapse = $_POST['departureCollapse'];
        $arrivalCollapse = $_POST['arrivalCollapse'];
        $departureCollapse2 = $_POST['departureCollapse2'];
        $arrivalCollapse2 = $_POST['arrivalCollapse2'];
        $datepicker3 = dateFormatSQL($_POST['datepicker3']);
        $datepicker4 = dateFormatSQL($_POST['datepicker4']);

        // Create query
        $query = 'INSERT INTO flight (departure, arrival, departure_date, arrival_date, flight_type, departure2, arrival2,   departure3, arrival3, departure_date2, departure_date3) 
        VALUES 
        (:departure, :arrival, :departure_date, :arrival_date, :flight_type, :departure2, :arrival2, :departure3, :arrival3, :departure_date2, :departure_date3)';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind data
        $stmt->bindParam(':departure', $departure, PDO::PARAM_STR);
        $stmt->bindParam(':arrival', $arrival, PDO::PARAM_STR);
        $stmt->bindParam(':departure_date', $datepicker, PDO::PARAM_STR);
        $stmt->bindParam(':arrival_date', $datepicker2, PDO::PARAM_STR);
        $stmt->bindParam(':flight_type', $vrstaLeta, PDO::PARAM_STR);
        $stmt->bindParam(':departure2', $departureCollapse, PDO::PARAM_STR);
        $stmt->bindParam(':arrival2', $arrivalCollapse, PDO::PARAM_STR);
        $stmt->bindParam(':departure3', $departureCollapse2, PDO::PARAM_STR);
        $stmt->bindParam(':arrival3', $arrivalCollapse2, PDO::PARAM_STR);
        $stmt->bindParam(':departure_date2', $datepicker3, PDO::PARAM_STR);
        $stmt->bindParam(':departure_date3', $datepicker4, PDO::PARAM_STR);

        // Execute query
        if ($stmt->execute()) {

          $_SESSION['msg'] = flash("success", "Success", "Flight added in database list");

          header('Location:index.php');
          return true;
        }

        printf("Error: %s.\n", $stmt->error);
      }
    }
  }

  public function read()
  {

    // Create query
    $query = 'SELECT * FROM flight';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function delete()
  {

    // Create query
    $query = 'DELETE FROM flight WHERE id = :id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':id', $this->id);


    if ($stmt->execute()) {


      $_SESSION['msg'] = flash("info", "Success", "Flight deleted");

      return true;
    } else {

      return false;
    }
  }
}

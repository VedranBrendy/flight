<?php include_once("assets/layout/header.php"); ?>
<?php include_once("assets/layout/nav.php"); ?>
<?php include_once("config/helper_function.php"); ?>
<?php include_once("config/Database.php"); ?>



<?php 


  $database = new Database;
  $db = $database->connect();
      
      // Create query
      $query = 'SELECT * FROM flight';

      // Prepare statement
      $stmt = $db->prepare($query);

        // Execute query
      $stmt->execute();

      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

     foreach ($result as $row) {
 echo '<pre>';
 print_r($row);
 echo '</pre>';
     }


?>

 





<?php include_once("assets/layout/footer.php"); ?>

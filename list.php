<?php include_once("assets/layout/header.php"); ?>
<?php include_once("assets/layout/nav.php"); ?>
<?php include_once("config/helper_function.php"); ?>
<?php include_once("config/Database.php"); ?>
<?php include_once("config/Action.php"); ?>


<?php

// Init session
session_start();

if (isset($_SESSION['msg'])) {
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
}

$database = new Database;
$db = $database->connect();

$action = new Action($db);
$result = $action->read();

$no =  1;
?>

<div class="container-fluid">
  <div class="row">

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Departure</th>
          <th scope="col">Arival</th>
          <th scope="col">Type of flight</th>
          <th scope="col">Departure date</th>
          <th scope="col">Arrival date</th>
          <th scope="col">Departure 2</th>
          <th scope="col">Arrival 2</th>
          <th scope="col">Departure 3</th>
          <th scope="col">Arrival 3</th>
          <th scope="col">Departure 2 date</th>
          <th scope="col">Departure 3 date</th>
          <th scope="col">Created at</th>
          <th scope="col">Action</th>


        </tr>
      </thead>
      <tbody>


        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) {


        ?>
          <tr>
            <th scope="row"><?php echo $no++; ?></th>
            <td><?php echo $row['departure']; ?></td>
            <td><?php echo $row['arrival']; ?></td>
            <td><?php echo flightType($row['flight_type']); ?></td>
            <td><?php echo dateFormat($row['departure_date']); ?></td>
            <td><?php echo dateFormat($row['arrival_date']); ?></td>
            <td><?php echo $row['departure2']; ?></td>
            <td><?php echo $row['arrival2']; ?></td>
            <td><?php echo $row['departure3']; ?></td>
            <td><?php echo $row['arrival3']; ?></td>
            <td><?php echo dateFormat($row['departure_date2']); ?></td>
            <td><?php echo dateFormat($row['departure_date3']); ?></td>
            <td><?php echo dateFormat($row['created_at']); ?></td>
            <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"> Delete</a></td>

          <?php

        }
          ?>
          </tr>
      </tbody>
    </table>



  </div>
</div>

<?php include_once("assets/layout/footer.php"); ?>
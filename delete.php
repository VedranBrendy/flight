<?php include_once("config/Database.php"); ?>
<?php include_once("config/Action.php"); ?>
<?php

// Init session
session_start();

$database = new Database;
$db = $database->connect();

$action = new Action($db);

$id = $_GET['id'];

$action->id = $id;

// delete
if ($action->delete()) {
  $delete = "";
  $_SESSION['delete'] = $delete;

  header("Location:list.php");
}

// if unable to delete 
else {
  echo "Unable to delete.";
}

?>
<?php
session_start();

if (isset($_POST['insert-ride'])) {
  require "dbh.inc.php";

  $startpoint = $_POST['startlocation'];
  $endpoint = $_POST['endlocation'];
  $dateRides = $_POST['datum'];
  $seats = $_POST['seats'];
  $timeRides = "10:45";
  $cost = "5";
  $description = "VW - kupim kod boske";
  $usernameRides = $_SESSION['userUid'];

  //echo $usernameRides;
  //echo "<h1> something </h1>";
  //$sql = "INSERT INTO rides (startpoint, endpoint, dateRides, timeRides, seats) VALUES (?,?,?,?,?)";

  $sql = "INSERT INTO rides (`startpoint`,`endpoint`,`dateRides`, `timeRides`,`seats`, `cost`,`description`, `usernameRides`  )  VALUES ('$startpoint', '$endpoint','$dateRides', '$timeRides','$seats', '$cost', '$description', '$usernameRides' )";

  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../rides.php", true, 301);
    exit();
  }
  else{
    mysqli_stmt_bind_param($stmt, "ssssssss", $startpoint, $endpoint, $dateRides, $timeRides, $seats, $cost, $description, $usernameRides);
    mysqli_stmt_execute($stmt);
    header("Location: ../rides.php?sucess=suc", true, 301);
    exit();

  }


  mysqli_close($conn);




}
else{
  echo "Njoko";
}

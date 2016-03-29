<?php
  $error = "no";
  session_start();
  if (!isset($_SESSION["ID"]) || $_SESSION["Role"] > 2)
    header("Location: ../");
  $path = "../";

  $dbase = mysqli_connect("localhost", "savari_o", "sazapefo", "Costumeo");
  if (mysqli_connect_errno())
    $error = "Failed to connect to MySQL: " . mysqli_connect_error();
  else
  {
    $sql = "SELECT * FROM Offers WHERE ID = " . $_GET["id"];
    $select = mysqli_fetch_array(mysqli_query($dbase, $sql));
    $sql = "INSERT INTO Deleted_offers
            VALUES (" . $select["ID"] .
            ", '" . $select["Product_name"] .
            "', '" . $select["Description"] .
            "', '" . $select["Image_link"] .
            "', " . $select["Quantity"] .
            ", " . $select["Price"] .
            ", '" . $select["Seller_name"] .
            "', '" . $select["Category"] .
            "', '" . $select["Date_of_posting"] .
            "', '" . $select["Sex"] .
            "', '" . $select["Quality"] .
            "', " . $select["Display"] . ");";
    mysqli_query($dbase, $sql);
    $sql = "DELETE FROM Offers
            WHERE ID = " . $select["ID"];
    mysqli_query($dbase, $sql);
  }
  header("Location: ./");
?>
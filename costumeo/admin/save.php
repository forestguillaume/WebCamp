<?php
  session_start();
  if (!isset($_SESSION["ID"]) || $_SESSION["Role"] > 2)
    header("Location: ../");
  $path = "../";
  $name = $_COOKIE["name"];
  $desc = $_COOKIE["description"];
  $qty = $_COOKIE["qty"];
  $price = $_COOKIE["price"];
  $sex = $_COOKIE["sex"];
  $qlty = $_COOKIE["quality"];
  $disp = $_COOKIE["disp"];
  setcookie("name", null, -1);
  setcookie("description", null, -1);
  setcookie("qty", null, -1);
  setcookie("price", null, -1);
  setcookie("sex", null, -1);
  setcookie("quality", null, -1);
  setcookie("disp", null, -1);

  $error = "no";
  $dbase = mysqli_connect("localhost", "savari_o", "sazapefo", "Costumeo");
   if (mysqli_connect_errno())
    $error = "Failed to connect to MySQL: " . mysqli_connect_error();
  else
  {
    $sql =  "UPDATE Offers 
          	 SET Product_name = \"" . $name . "\",
                 Description = \"" . $desc . "\",
                 Quantity = " . $qty . ",
                 Price =  " . $price . ",
                 Sex = \"" . $sex . "\",
                 Quality = \"" . $qlty . "\",
                 Display = \"" . $disp . "\"
             WHERE ID = " . $_GET["id"];
    echo $sql;
    mysqli_query($dbase, $sql);
  }
  header("Location: ./");
?>

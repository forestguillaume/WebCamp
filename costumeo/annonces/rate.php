<?php
  session_start();
  if (!isset($_SESSION["ID"]))
    header("Location: annonce.php?id=" . $_GET["id"]);

  $dbase = mysqli_connect("localhost", "savari_o", "sazapefo", "Costumeo");
  if (mysqli_connect_errno())
    $error = "Failed to connect to MySQL: " . mysqli_connect_error();
  else
  {
    $sql = "SELECT * from Rate WHERE offer_ID = " . $_GET["id"];
    $select = mysqli_query($dbase, $sql);
    if (mysqli_num_rows($select) == 0)
    {
      $rate["average"] = 0;
      $rate["total_votes"] = 0;
    }
    else
      $rate = mysqli_fetch_assoc($select);
    if (mysqli_num_rows($select) == 0)
    {
      $sql = "INSERT INTO Rate VALUES (" . $_GET["id"] . ", 1, " . $_GET["rate"] . ");";
    }
    else
    {
      $new = (($rate["average"] * $rate["total_votes"]) + $_GET["rate"]) / ($rate["total_votes"] + 1);
      $sql = "UPDATE Rate SET total_votes = " . ($rate["total_votes"] + 1) . ", average = " . $new . " WHERE offer_ID = " . $_GET["id"];
    }
    mysqli_query($dbase, $sql);
  }
  header("Location: annonce.php?id=" . $_GET["id"]);
?>
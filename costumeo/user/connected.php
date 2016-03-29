<?php
  $error = "no";

  $dbase = mysqli_connect("localhost", "savari_o", "sazapefo", "Costumeo");
  if (mysqli_connect_errno())
    $error = "Failed to connect to MySQL: " . mysqli_connect_error();
  else
  {
    $sql = 'SELECT * FROM Users WHERE Login = "' . $_POST["login"] . '" AND Password = "' . $_POST["pwd"] . '"';
    if (!($user = mysqli_query($dbase, $sql)))
      $error = "MySQL n'a pas pu effectuer la requête.";
    else
    {
      if (mysqli_num_rows($user) > 0)
      {
        $user = mysqli_fetch_array($user);
        session_start();
        $_SESSION["ID"] = $user["ID"];
        $_SESSION["Firstname"] = $user["Firstname"];
        $_SESSION["Lastname"] = $user["Lastname"];
        $_SESSION["Login"] = $user["Login"];
        $_SESSION["Role"] = $user["Role"];
        $_SESSION["time"] = time();
        header('Location: ../');
      }
      else
      {
        setcookie("wrong", 1);
        header('Location: Identification.php');
      }
    }
  }
?>
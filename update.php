<?php
include "koneksi.php";

$query_user = sprintf("UPDATE user set username = '%s', email = '%s'", 
  $_POST["username"],
  $_POST["email"],
);
mysqli_query($conn, $query_user);

$query_profile = sprintf("UPDATE profile set name = '%s', website = '%s', bio = '%s', phone_num = '%s', gender = '%s'", 
  $_POST["name"],
  $_POST["website"],
  $_POST["bio"],
  $_POST["phone"],
  $_POST["gender"],
);
mysqli_query($conn, $query_profile);



session_start();

$query_user = mysqli_query($conn, "
  SELECT * FROM user 
  inner join profile on user.id = profile.user_id 
  WHERE user_id = '" . $_SESSION["user"]["user_id"] . "'
");

$_SESSION["user"] = mysqli_fetch_assoc($query_user);

header('Location: profile.php');
?>
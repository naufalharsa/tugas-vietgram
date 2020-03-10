<?php
include "koneksi.php";
$query_user = mysqli_query($conn, "
  SELECT * FROM user 
  inner join profile on user.id = profile.user_id 
  WHERE username = '" . $_POST["username"] . "' AND password = '" . $_POST["password"] . "'
");

session_start();

if (mysqli_num_rows($query_user) > 0) {
	$_SESSION["user"] = mysqli_fetch_assoc($query_user);
	header('Location: feed.php');
} else {
	header('Location: index.php');
}
?>
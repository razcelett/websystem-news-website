<?php
include 'connect.php';

if (isset($_GET['id'])) {
  // Get the id of the current user
  $id = $_GET['id'];

  // Delete the logged in user account query
  $delete = "DELETE FROM users WHERE id = '$id'";
  $deleteSuccess = mysqli_query($elements, $delete);
  // if else condition when successful or not in deleting the user account
  if ($deleteSuccess) {
    header("Location: logout.php");
    exit();
  } else {
    echo "Error deleting the account.";
  }
} 
?>

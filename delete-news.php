<?php
include 'connect.php';

if (isset($_GET['id'])) {
  // Get the id of the news
  $id = $_GET['id'];

  // Delete the news query
  $delete = "DELETE FROM news WHERE id = '$id'";
  $deleteSuccess = mysqli_query($elements, $delete);
  // if else condition when successful or not in deleting the news
  if ($deleteSuccess) {
    echo '<script> alert("Successfully deleted the news."); window.location.href = "admin.php"; </script>';
    exit();
  } else {
    echo "Error deleting the news.";
  }
} 

?>

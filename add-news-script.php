<!-- Insert news to database script -->
<?php
include 'connect.php';
define('UPLPATH', 'static/img/');

if ($elements && isset($_POST['submit'])) {
  $date = date('d.m.Y.');
  $time = date('H:i');
  $title = $_POST['title'];
  $abstract = $_POST['abstract'];
  $context = $_POST['context'];
  $category = $_POST['category'];
  $author = $_POST['author'];
  $author_pos = $_POST['author_pos'];
  $author_pic = $_FILES['author_pic']['name'];
  $authortempPicture = $_FILES['author_pic']['tmp_name'];
  $picture = $_FILES['picture']['name'];
  $tempPicture = $_FILES['picture']['tmp_name'];
  
  // if else conditional if news is archived or not
  if (isset($_POST['isArchive'])) {
    $isArchive = 1;
  } else {
    $isArchive = 0;
  }
  // end of if else
  
  move_uploaded_file($_FILES['picture']['tmp_name'], __DIR__.'/static/img/'. $_FILES["picture"]['name']);
  move_uploaded_file($_FILES['author_pic']['tmp_name'], __DIR__.'/static/img/'. $_FILES["author_pic"]['name']);
  
  $query = "INSERT INTO news (date, time, title, author, author_pos, author_pic, abstract, context, picture, category, isArchive) VALUES ('$date', '$time', '$title', '$author', '$author_pos', '$author_pic', '$abstract', '$context', '$picture', '$category', '$isArchive')";
  $result = mysqli_query($elements, $query) or die('Error querying database.');

  echo '<script> alert("Successfully added the news."); window.location.href = "add-news.php"; </script>';
}

mysqli_close($elements);
?>

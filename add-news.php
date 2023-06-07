<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/add-news.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
    <title>ADD NEWS</title>
  </head>
  <body>
    <div class="logo">
      <a href="index.php"><img src="static/img/title.png"></a>
    </div>

    <div class="nav">
      <div class="wrapper">
        <a href="index.php">HOME</a>
        <a href="category.php?category=World">WORLD</a>
        <a href="category.php?category=Local">LOCAL</a>
        <a href="admin.php">ADMINISTRATION</a>
        <a class="foc" href="add-news.php">ADD NEWS</a>
        <a href="logout.php">LOGOUT</a>
      </div>
    </div>

    <div class="main">
      <div class="wrapper">
        <?php
        include 'connect.php';
        // if condition for logged account is true. This is for admin account only.
        if(isset($_SESSION['username'])) {
          
          echo '<h1>CONTENT ENTRY FORM<br/>IN THE DATABASE</h1>
          <form enctype="multipart/form-data" method="POST" action="add-news-script.php">
            <label for="title" required>News title:</label>
            <input name="title" id="title" type="text" class="title" required/>
            <span id="messageTitle" class="colorMessages"></span>
            <br/><br/>

            <label for="abstract">Brief content of the news:</label>
            <br/>
            <span id="messageAbstract" class="colorMessages"></span>
            <textarea name="abstract" id="abstract" type="text" class="abstract" required></textarea>
            <br/><br/>

            <label for="context">News content:</label>
            <br/>
            <span id="messageContent" class="colorMessages"></span>
            <textarea name="context" id="context" required></textarea>
            <br/><br/>

            <label for="picture">Picture</label>
            <br/>
            <input name="picture" id="picture" type="file" class="picture" required/>
            <span id="messagePicture" class="colorMessages"></span>
            <br/>

            <label for="author">Author:</label>
            <input name="author" id="author" type="text" class="author"/>
            <span id="messageTitle" class="colorMessages"></span>
            <br/><br/>

            <label for="author_pos">Author Position:</label>
            <input name="author_pos" id="author_pos" type="text" class="author_pos"/>
            <span id="messageTitle" class="colorMessages"></span>
            <br/><br/>

            <label for="author_pic">Author Picture</label>
            <br/>
            <input name="author_pic" id="author_pic" type="file" class="author_pic"/>
            <span id="messagePicture" class="colorMessages"></span>
            <br/>

            <label for="category" required>News category:</label>

            <select name="category" id="category" class="category" required>
              <option value="" disabled selected>Select a category</option>
              <option value="World">World</option>
              <option value="Local">Local</option>
            </select>
            <span id="messageCategory" class="colorMessages"></span>
            <br/><br/>

            <label for="isArchive">Save to archive?</label>
            <input type="checkbox" name="isArchive" class="option" value="option">
            <br/>

            <input type="reset" class="button_no" value="Undo" />
            <input name="submit" type="submit" class="button_yes" id="save" value="Save" />
          </form>';
        }?>
      </div>
    </div>
    
    <footer>
      <?php include 'footer.php'; ?>
    </footer>
    <script src="static/js/add-news.js"></script>
  </body>
</html>

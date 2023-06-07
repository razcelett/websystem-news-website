// Add news javascript with DOM Manipulation and if statements

// ------------------------------------------------------------------------------------------------ //

// Check the form before submiting
document.getElementById("save").onclick = function(event) {
  var saveForm = true;

  // News title (5 up characters)
  var newsTitle = document.getElementById("title");
  var title = document.getElementById("title").value;
  if (title.length < 5) {
    saveForm = false;
    newsTitle.style.border="2px solid red";
    document.getElementById("messageTitle").style.color = "red";
    document.getElementById("messageTitle").style.padding = "0 5px";
    document.getElementById("messageTitle").innerHTML="The title of the news must be between 5 or more characters long!<br>";
  }

  // Abstract (10 up characters)
  var newsAbstract = document.getElementById("abstract");
  var about = document.getElementById("abstract").value;
  if (about.length < 10) {
    saveForm = false;
    newsAbstract.style.border="2px solid red";
    document.getElementById("messageAbstract").style.color = "red";
    document.getElementById("messageAbstract").innerHTML="Short content must be between 10 or more characters!<br>";
  }

  // News content
  var newsContent = document.getElementById("context");
  var content = document.getElementById("context").value;
  if (content.length == 0) {
    saveForm = false;
    newsContent.style.border="2px solid red";
    document.getElementById("messageContent").style.color = "red";
    document.getElementById("messageContent").innerHTML="Content must be entered!<br>";
  }

  // News image
  var newsImage = document.getElementById("picture");
  var pphoto = document.getElementById("picture").value;
  if (pphoto.length == 0) {
    saveForm = false;
    newsImage.style.border="2px dashed red";
    newsImage.style.padding="13px 0 0 10px";
    document.getElementById("messagePicture").style.color = "red";
    document.getElementById("messagePicture").style.padding = "0 5px";
    document.getElementById("messagePicture").innerHTML="Image must be entered!<br>";
  }

  // Category
  var newsCategory = document.getElementById("category");
  if(document.getElementById("category").selectedIndex == 0) {
    saveForm = false;
    newsCategory.style.border="2px dashed red";
    document.getElementById("messageCategory").style.color = "red";
    document.getElementById("messageCategory").style.padding = "0 5px";
    document.getElementById("messageCategory").innerHTML="Category must be selected!<br>";
  }

  if (saveForm != true) {
    event.preventDefault();
  }
};

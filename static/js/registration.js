// Account Registration javascript with DOM Manipulation and if statements

// ------------------------------------------------------------------------------------------------ //

// Check the form before submiting
document.getElementById("register").onclick = function(event) {
  var sendForm = true;

  // Firstname error message
  var firstName = document.getElementById("firstname");
  var firstname = document.getElementById("firstname").value;
  if (firstname.length == 0) {
    sendForm = false;
    firstName.style.border="1px dashed red";
    document.getElementById("messagefName").innerHTML="<br>Please enter your first name!<br>";
  }

  // Lastname error message
  var lastName = document.getElementById("lastname");
  var lastname = document.getElementById("lastname").value;
  if (lastname.length == 0) {
    sendForm = false;
    lastName.style.border="1px dashed red";
    document.getElementById("messagelName").innerHTML="<br>Please enter your last name!<br>";
  }

  // Username error message
  var userName = document.getElementById("username");
  var username = document.getElementById("username").value;
  if (username.length == 0) {
    sendForm = false;
    userName.style.border="1px dashed red";
    document.getElementById("messageuserName").innerHTML="<br>Please enter a username!<br>";
  }

  // Password checking and error messages
  var userPass = document.getElementById("password");
  var pass = document.getElementById("password").value;
  var userconfirmPass = document.getElementById("confirmPass");
  var passCon = document.getElementById("confirmPass").value;
  if (pass.length == 0 || passCon.length == 0 || pass != passCon) {
    sendForm = false;
    userPass.style.border="1px dashed red";
    userconfirmPass.style.border="1px dashed red";
    document.getElementById("messagePass").innerHTML="<br>The passwords does not match!<br>";
    document.getElementById("messageconfirmPass").innerHTML="<br>The passwords does not match!<br>";
  }

  if (sendForm != true) {
    event.preventDefault();
  }
};

function myFunction1() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function myFunction2() {
  var x = document.getElementById("confirmPass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

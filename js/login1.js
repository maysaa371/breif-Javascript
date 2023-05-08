
let startQuiz = document.getElementById("quiz");
document.getElementById("Sign_in").addEventListener("click", ValidateForm);
function ValidateForm(event)
{
  event.preventDefault();
    let Email = document.getElementById("email");
    let emailError = document.getElementById("email_error");
    let Password = document.getElementById("password");
    let passworderror = document.getElementById("password_error");
    let matcherror = document.getElementById("totalerror");

       // Email section
      if (Email.value === '') {
        emailError.textContent = "The email field is required.";
        Email.style.borderColor = "#FEA0CD";
        event.preventDefault();
      } else {
        emailError.textContent = "";
        Email.style.borderColor = "";
      }

      // Password section
      if (Password.value === '') {
        passworderror.textContent = "The password field is required.";
        Password.style.borderColor = "#FEA0CD";
        event.preventDefault();
      } else {
        passworderror.textContent = "";
        Password.style.borderColor = "";
      }

       // get data from local storage
let existingUsers = JSON.parse(localStorage.getItem("id")) || [];
console.log(existingUsers[0].username);

 // Check if email and password match an existing user
let CURRENTUSERINFO = false;
for (let i = 0; i < existingUsers.length; i++) {
    if (existingUsers[i].Email == Email.value && existingUsers[i].Password == Password.value) {
      CURRENTUSERINFO = true;
      const myDiv = document.createElement("div");

      // Set some properties of the div element
      // myDiv.innerHTML = `<h1>Welome, ${existingUsers[0].username}</h1>`;
      myDiv.style.backgroundColor = "lightblue";
      myDiv.style.padding = "20px";

      // Append the div element to the body of the HTML document
      document.body.appendChild(myDiv);
        let currentUser = {
          id: i,
          Name: existingUsers[i].Email
        };
        sessionStorage.setItem("currentUser", JSON.stringify(currentUser));

    }
      else {
      matcherror.textContent = "Invalid email or password";
  }
  
 }if (CURRENTUSERINFO) {
  matcherror.textContent = "Your are loged in";
  window.location.assign("/welcome.html");
}

}
document.getElementById("Sign_in").addEventListener("click", ValidateForm);

function login(username, password) {
  // Perform a call to the authentication server
  // and retrieve the token if credentials are valid
  const token = authenticate(username, password);

  if (token) {
    // Store the token in session storage
    sessionStorage.setItem('token', token);
    console.log('Login successful');
  } else {
    console.log('Login failed. Please check your username and password');
  }

}



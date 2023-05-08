
//validation section

function ValidateForm(event) {
    // Declare variables
    let Username = document.getElementById("username");
    let nameerror = document.getElementById("name_error");
    let Email = document.getElementById("email");
    let Emailerror = document.getElementById("email_error");
    let Password = document.getElementById("password");
    let passworderror = document.getElementById("password_error");
    let Confirm = document.getElementById("password_confirm");
    let confirmerror = document.getElementById("password_confirm_error");
    let submit=document.getElementById('Sign_up');
    let passwordregex=/((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
    let emailregex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  
    // userName section
    if (Username.value === '') {
      nameerror.style.color = "black";
      nameerror.textContent = "The name field is required.";
      Username.style.color="red";
      event.preventDefault();
    } else {
      nameerror.textContent = "";
      Username.style.borderColor = "";
    }
  
    // Email section
    if (Email.value === '') {
      Emailerror.style.color = "black";
      Emailerror.textContent = "The email field is required.";
      Email.style.borderColor = "#FEA0CD";
      event.preventDefault();
    } else if (!emailregex.test(Email.value)) {
      Emailerror.style.color = "black";
      Emailerror.textContent = "You have entered an invalid email address!";
      Email.style.borderColor = "#FEA0CD";
      event.preventDefault();
    } else {
      Emailerror.textContent = "";
      Email.style.borderColor = "";
    }
  
    // Password section
    if (Password.value === '') {
      passworderror.style.color = "black";
      passworderror.textContent = "The password field is required.";
      Password.style.borderColor = "#FEA0CD";
      event.preventDefault();
    } else if (!passwordregex.test(Password.value)) {
      passworderror.style.color = "black";
      passworderror.textContent = "Password must contain one digit from 1 to 9, one lowercase letter, one uppercase letter, one special character, no space, and it must be 8-16 characters long.";
      Password.style.borderColor = "#FEA0CD";
      event.preventDefault();
    } else {
      passworderror.textContent = "";
      Password.style.borderColor = "";
    }
  
    // Confirm password section
    if (Confirm.value === '') {
      confirmerror.style.color = "black";
      confirmerror.textContent = "The confirm password field is required.";
      Confirm.style.borderColor = "#FEA0CD";
      event.preventDefault();
    } else if (Confirm.value !== Password.value) {
      confirmerror.style.color = "black";
      confirmerror.textContent = "The passwords do not match.";
      Confirm.style.borderColor = "#FEA0CD";
      event.preventDefault();
    } else {
      confirmerror.textContent = "";
      Confirm.style.borderColor = "";
    }
    if(Username.value !== '' && Email.value !== '' && emailregex.test(Email.value) && Password.value !== '' && passwordregex.test(Password.value) && Confirm.value !== '' && Confirm.value === Password.value){
      alert("Done!", "The registration process was completed successfully!", "success");
      submit.addEventListener('click', () => {
        window.location.href = '/design.html';
        console.log('kkkk');
      });
      
      // event.preventDefault();
  }
  }

  

function StoreData() {
  let Username = document.getElementById("username").value;
  let Email = document.getElementById("email").value;
  let Password = document.getElementById("password").value;

  // Get existing users from localstorage, or initialize an empty array
  let existingUsers = JSON.parse(localStorage.getItem("id")) || [];

  let user = {
    username: Username,
    Email: Email,
    Password: Password,
  };

  // Add the new user to the existing array of users
  existingUsers.push(user);

  // Save the updated array of users to localstorage
  localStorage.setItem("id", JSON.stringify(existingUsers));
}
  // Clear form inputs for next user
  username = "";
  Email = "";
  Password = "";
  
document.getElementById("Sign_up").addEventListener("click", ValidateForm);

// let login=document.querySelector("#logInNavbar");
// login.addEventListener('click', function(){
//   window.location.href="login.html";
// });
//validation section
let existingUsers = JSON.parse(localStorage.getItem("users ids")) || [];
console.log('kkk');
function ValidateForm1(event) {

    // Declare variables
    let Username1 = document.getElementsByClassName("Name1");
    let nameerror1 = document.getElementById("nameerror1");
    let Email1 = document.getElementById("Email1");
    let Emailerror1 = document.getElementById("emailerror1");
    let Password1 = document.getElementsByClassName("Password1");
    let passworderror1 = document.getElementById("passworderror1");
    let Confirm1 = document.getElementById("Confirm1");
    let confirmerror1 = document.getElementById("confirmerror1");
    let signup=document.getElementById('signup');
    
    //let Phone = document.getElementById("Phone");
    //let phoneerror = document.getElementById("phoneerror");
    //let check=document.getElementById("checked");
    let passwordregex=/((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
    let emailregex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    console.log('kkk');
    // Name section
    if (Username1.value === '') {
      console.log('nnnnnnn');
      nameerror1.style.color = "red";
      nameerror1.textContent = "The name field is required.";
      Username1.style.borderColor = "#FEA0CD";
      event.preventDefault();
    } else {
      nameerror1.textContent = "";
      // Username1.style.borderColor = "";
    }
  
    // Email section
    if (Email1.value === '') {
      Emailerror1.style.color = "red";
      Emailerror1.textContent = "The email field is required.";
      Email1.style.borderColor = "#FEA0CD";
      event.preventDefault();
    } else if (!emailregex.test(Email1.value)) {
      Emailerror1.style.color = "black";
      Emailerror1.textContent = "You have entered an invalid email address!";
      Email1.style.borderColor = "#FEA0CD";
      event.preventDefault();

    } 
   
    // else if(Email1.value==existingUsers[1].Email1)

   
    //  {
      
    //   Emailerror1.textContent = "You have existed email address!"; 
    // }
    else {
      Emailerror1.textContent = "";
      Email1.style.borderColor = "";
    }
  
    // Password section
    if (Password1.value === '') {
      passworderror1.style.color = "red";
      passworderror1.textContent = "The password field is required.";
      Password1.style.borderColor = "#FEA0CD";
      event.preventDefault();
    } 
    // else if (!passwordregex.test(Password1.value)) {
    //   passworderror1.style.color = "red";
    //   passworderror1.textContent = "The password must be contain characters and numbers and its length 6-18.";
    //   // Password1.style.borderColor = "#FEA0CD";
    //   event.preventDefault();
    // }
     else {
      passworderror1.textContent = "";
     
      // Password1.style.borderColor = "";
    }
  
    // Confirm password section
    if (Confirm1.value == '') {
      confirmerror1.style.color = "red";
      confirmerror1.textContent = "The confirm password field is required.";
      Confirm1.style.borderColor = "#FEA0CD";
      console.log('kkk');
      event.preventDefault();
    } 
    // else if (Confirm1.value !== Password1.value) {
    //   confirmerror1.style.color = "red";
    //   confirmerror1.textContent = "The passwords do not match.";
    //   Confirm1.style.borderColor = "#FEA0CD";
    //   event.preventDefault();
    // } 
    else {
      confirmerror1.textContent = "";
      // Confirm1.style.borderColor = "";
    }
    
    if(confirmerror1.textContent == "" && passworderror1.textContent == "" && Emailerror1.textContent == "" && nameerror1.textContent == ""){
      window.location.href = '/welcome.html';
     console.log("any");
      // console.log('888');
      alert("Sign up successfull");
      // if (CURRENTUSERINFO ===true ) {
        // Redirect to dashboard page

        // signup.addEventListener('click',load);
      

       
        
       
    }
   
  }

  // signup.addEventListener('click', () => {
    console.log(5559895);
  
  // });
 


  //Add & Store data section
//   function StoreData ()
// {
  
//   let Username = document.getElementById("Name").value;
//   let Email = document.getElementById("Email").value;
//   let Password = document.getElementById("Password").value;
//   let Phone = document.getElementById("Phone").value;

//   let users=
// {
//   username:Username,
//   Email:Email,
//   Password:Password,
//   Phonenumber:Phone
// };
 
//   USERS.push(users);
//   localStorage.setItem("users infoemation",JSON.stringify (USERS));
// }
console.log('999');
function StoreData() {
  let Username1 = document.getElementById("Name1").value;
  let Email1 = document.getElementById("Email1").value;
  let Password1= document.getElementById("Password1").value;

  // Get existing users from localstorage, or initialize an empty array
  

  let user = {
    username: Username1,
    Email: Email1,
    Password: Password1,
  };


  // Add the new user to the existing array of users
  existingUsers.push(user);
 
  // Save the updated array of users to localstorage
  localStorage.setItem("users ids", JSON.stringify(existingUsers));
}
// console.log(existingUsers[0].Email);
// for(let i=0;i<10;i++){
// if(Email.value.match(existingUsers[i].Email)){
//   console.log(123);
// };
//   // console.log(arr);
//   let att =[];
//    att.push(existingUsers[i].Email);
// console.log(att);
//     console.log('true');
  
// }
  // Clear form inputs for next user
  username = "";
  Email = "";
  Password = "";
  
document.getElementById("signup").addEventListener("click", ValidateForm1);



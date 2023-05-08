// let signup=document.querySelector("#signUpNavbar");
// signup.addEventListener('click', function(){
//   window.location.href="signup.html";
// });

document.getElementById("login").addEventListener("click", ValidateForm);
function ValidateForm(event)
{
  event.preventDefault();
    let Username = document.getElementById("Name");
    let nameerror = document.getElementById("nameerror");
    // let Email = document.getElementById("Email");
    // let Emailerror = document.getElementById("emailerror");
    let Password = document.getElementById("Password");
    let passworderror = document.getElementById("passworderror");
    let matcherror1 = document.getElementById("totalerror");
    // let passwordregex=/((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
    // let emailregex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

       // Name section
       if (Username.value === '') {
        nameerror.textContent = "The name field is required.";
        Username.style.borderColor = "#FEA0CD";
      nameerror.style.color="red";
        event.preventDefault();
      } else {
        nameerror.textContent = "";
        Username.style.borderColor = "";
      }
    
  
      // Password section
      if (Password.value === '') {
        passworderror.textContent = "The password field is required.";
        Password.style.borderColor = "#FEA0CD";
        passworderror.style.color="red";
        event.preventDefault();
      } else {
        passworderror.textContent = "";
        Password.style.borderColor = "";
      }

       // get data from local storage
 let existingUsers = JSON.parse(localStorage.getItem("users ids")) || [];
 console.log(existingUsers);
// let name=
 // Check if email and password match an existing user
 let CURRENTUSERINFO = false;
 for (let i = 0; i < existingUsers.length; i++) {
  // console.log(existingUsers[i]);
  // console.log(existingUsers[i].Password);
  // console.log(Username.value);

console.log('555555');
     if (existingUsers[i].username == Username.value && existingUsers[i].Password == Password.value) {
      CURRENTUSERINFO = true;
         let currentUser = {
             id: i,
             Name: existingUsers[i].username
         };
         sessionStorage.setItem("currentUser", JSON.stringify(currentUser));
       
     }
     else  {
      CURRENTUSERINFO=false;
     
  matcherror1.textContent= "Invalid email or password";
  matcherror1.style.color="red";
  }
 }
 console.log('555555555555555555555555');
 if (CURRENTUSERINFO ===true ) {
  // Redirect to dashboard page
  window.location.href ="/welcome.html";
}

}



// function GetAllLocalData() {
//   let localData = [];
//   for (let i = 0; i < localStorage.length; i++) {
//     let key = localStorage.key(i);
//     let data = JSON.parse(localStorage.getItem(key));
//     localData.push(data);
//   }
//   return localData;
// }
// let localdata = GetAllLocalData();
// console.log(localdata);


// function StoreData ()
// {


// }


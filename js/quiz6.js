// Select Elements
let countSpan = document.querySelector(".count span");
let bullets = document.querySelector(".bullets");
let bulletsSpanContainer = document.querySelector(".bullets .spans");
let quizArea = document.querySelector(".quiz-area");
let answersArea = document.querySelector(".answers-area");
let submitButton = document.querySelector(".submit-button");
let resultsContainer = document.querySelector(".results");
let countdownElement = document.querySelector(".countdown");
let quizapp = document.querySelector(".quiz-app");
// let logOut=document.getElementById('logout');
let arr = [];
let arr2 = [];
let viewRuselt = document.getElementById("view_result");
let answers = document.getElementsByName("question");
let welcome=document.querySelector("#welcome");

function onload (){
    if(sessionStorage.getItem('currentUser') === null){
        console.log("sessionStorage is empty")
    }
    else {
        let user=JSON.parse(sessionStorage.getItem('currentUser'));
        let userName=user.Name;
        console.log("session is full "+"user is "+userName)
        welcome.textContent="Welcome "+userName+" To Page Quiz, Exercise your brain with these interesting quizzes.";
        logIn.style.display="none";
        signUp.style.display="none";
        // logOut.style.display="block";

    }
}
window.addEventListener('load', onload);
// Set Options
let currentIndex = 0;
let rightAnswers = 0;
let countdownInterval;
let ques;
let arrQ;

function getQuestions() {
  let myRequest = new XMLHttpRequest();

  myRequest.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      let questionsObject = JSON.parse(this.responseText);
      let qCount = questionsObject.length;

      // Create Bullets + Set Questions Count
      createBullets(qCount);

      // Add Question Data
      addQuestionData(questionsObject[currentIndex], qCount);

      // Start CountDown
      countdown(3, qCount);


      // Click On Submit
      submitButton.onclick = () => {


        // Get Right Answer
        let theRightAnswer = questionsObject[currentIndex].right_answer;
        arrQ=[];
        for(let x=0;x<questionsObject.length;x++){
         ques=questionsObject[x].title;//get question from json
         arrQ.push(ques);
        }
        let answer1=questionsObject[currentIndex].answer_1;
        // console.log(answer1);
        console.log(arrQ);
        let selectedAnswer = getSelectedAnswer();

        if (selectedAnswer === null) {
          return;
        }


        // Increase Index
        currentIndex++;

        // Check The Answer
        checkAnswer(theRightAnswer, qCount);

        // Remove Previous Question
        quizArea.innerHTML = "";
        answersArea.innerHTML = "";

        // Add Question Data
        addQuestionData(questionsObject[currentIndex], qCount);

        // Handle Bullets Class
        handleBullets();

        // Start CountDown
        clearInterval(countdownInterval);
        countdown(3, qCount);

        // Show Results
        showResults(qCount);
      };
    }
    function getSelectedAnswer() {
      for (let i = 0; i < answers.length; i++) {
        if (answers[i].checked) {
          return answers[i].dataset.answer;
        }
      }
      return null;
    }
  };

  myRequest.open("GET", "/js/laravel.json", true);
  myRequest.send();
}

getQuestions();

function createBullets(num) {
  countSpan.innerHTML = num;

  // Create Spans
  for (let i = 0; i < num; i++) {
    // Create Bullet
    let theBullet = document.createElement("span");

    // Check If Its First Span
    if (i === 0) {
      theBullet.className = "on";
    }

    // Append Bullets To Main Bullet Container
    bulletsSpanContainer.appendChild(theBullet);
  }
}

function addQuestionData(obj, count) {
  if (currentIndex < count) {
    // Create H2 Question Title
    let questionTitle = document.createElement("h2");

    // Create Question Text
    let questionText = document.createTextNode(obj["title"]);

    // Append Text To H2
    questionTitle.appendChild(questionText);

    // Append The H2 To The Quiz Area
    quizArea.appendChild(questionTitle);

    // Create The Answers
    for (let i = 1; i <= 4; i++) {
      // Create Main Answer Div
      let mainDiv = document.createElement("div");

      // Add Class To Main Div
      mainDiv.className = "answer";

      // Create Radio Input
      let radioInput = document.createElement("input");

      // Add Type + Name + Id + Data-Attribute
      radioInput.name = "question";
      radioInput.type = "radio";
      radioInput.id = `answer_${i}`;
      radioInput.dataset.answer = obj[`answer_${i}`];

      // Make First Option Selected



      // Create Label
      let theLabel = document.createElement("label");

      // Add For Attribute
      theLabel.htmlFor = `answer_${i}`;

      // Create Label Text
      let theLabelText = document.createTextNode(obj[`answer_${i}`]);

      // Add The Text To Label
      theLabel.appendChild(theLabelText);

      // Add Input + Label To Main Div
      mainDiv.appendChild(radioInput);
      mainDiv.appendChild(theLabel);

      // Append All Divs To Answers Area
      answersArea.appendChild(mainDiv);
    }
  }
}

function checkAnswer(rAnswer, count) {

  let theChoosenAnswer;
  arr2.push(rAnswer);
  for (let i = 0; i < answers.length; i++) {
    if (answers[i].checked) {
      theChoosenAnswer = answers[i].dataset.answer;
    }
  }

  if (rAnswer === theChoosenAnswer) {
    rightAnswers++;
  }
  arr.push(theChoosenAnswer);


}

function handleBullets() {
  let bulletsSpans = document.querySelectorAll(".bullets .spans span");
  let arrayOfSpans = Array.from(bulletsSpans);
  arrayOfSpans.forEach((span, index) => {
    if (currentIndex === index) {
      span.className = "on";
    }
  });
}

function showResults(count) {
  let theResults;
  let view_result = document.getElementById("viewResult");


  if (currentIndex === count) {
    quizArea.remove();
    answersArea.remove();
    submitButton.remove();
    bullets.remove();

    if (rightAnswers > count / 2 && rightAnswers < count) {
      theResults = `<span class="good">Good</span>, ${rightAnswers} From ${count}`;
      quizapp.style.backgroundColor='green';
      
     
    } else if (rightAnswers === count) {
      theResults = `<span class="perfect">Perfect</span>, All Answers Is Good`;
      quizapp.style.backgroundColor='green';
    } else {
      theResults = `<span class="bad">You have failed ,Try agin.</span>, ${rightAnswers} From ${count}`;
      quizapp.style.backgroundColor='red';
     
      // html.style.backgroundColor='red';
    }
    resultsContainer.innerHTML = theResults;
    resultsContainer.style.padding = "10px";
    resultsContainer.style.backgroundColor = "white";
    resultsContainer.style.marginTop = "10px";
    view_result.innerHTML = "View Result";
    view_result.style.display = "block";

   
  console.log(currentIndex);
  }
  // if(currentIndex=5){
  //   console.log(5);
  //    table1=`<table>
  //   <tr>
  //   <td>222</td>
  //   </tr>
  //   </table>`


  // }
  // resultsContainer.innerHTML = table1;
  //   resultsContainer.style.padding = "10px";
  //   resultsContainer.style.backgroundColor = "white";
  //   resultsContainer.style.marginTop = "10px";
  //   view_result.innerHTML = "view result";
  //   view_result.style.display = "block";
  // }

}

function countdown(duration, count) {
  duration = 40;
  if (currentIndex < count) {
    let minutes, seconds;
    countdownInterval = setInterval(function () {
      minutes = parseInt(duration / 60);
      seconds = parseInt(duration % 60);

      minutes = minutes < 20 ? `0${minutes}` : minutes;
      seconds = seconds < 20 ? `${seconds}` : seconds;

      countdownElement.innerHTML = `${minutes}:${seconds}`;

      if (--duration < 0) {
        clearInterval(countdownInterval);
        submitButton.click();
      }
    }, 1000);
  }
}
// Get the reference to the button and the HTML div
const viewResult = document.querySelector("#viewResult");
const outputDiv = document.querySelector("#outputDiv");
const logoutB = document.getElementById('Back');
let table1;

// Add a click event listener to the button
viewResult.addEventListener("click", function (rAnswer) {
  quizapp.style.height = "auto";
  // Clear the output div before adding new content
  outputDiv.innerHTML = "";
  console.log(rAnswer);
  
  if(currentIndex=5){
    console.log(5);
    quizArea.remove();
    answersArea.remove();
    submitButton.remove();
    bullets.remove();
    logoutB.style.display="";
    logoutB.addEventListener('click', () => {
      window.location.href = '/welcome.html';
    });
 
  // Loop through the array and create a div for each element
  for (let i = 0; i < arr.length; i++) {
    for(i=0;i<arr2.length;i++){
      
    table1=`<table style="border: 1px solid black">
    <tr>
    <th>Question</th>
    <th> Answers</th>
    <th>Right Answer</th>
    </tr>
    <tr>
    <td>${arrQ[0]}</td>
    <td>${arr[0]}</td>
    <td>${arr2[0]}</td>
    <tr>
    <td>${arrQ[1]}</td>
    <td>${arr[1]}</td>
    <td>${arr2[1]}</td>
    </tr>
    <tr>
    <td>${arrQ[2]}</td>
    <td>${arr[2]}</td>
    <td>${arr2[2]}</td>
    </tr>
    <tr>
    <td>${arrQ[3]}</td>
    <td>${arr[3]}</td>
    <td>${arr2[3]}</td>
    </tr>
    <tr>
    <td>${arrQ[4]}</td>
    <td>${arr[4]}</td>
    <td>${arr2[4]}</td>
   
    </tr>
    </table>`


  
  outputDiv.innerHTML = table1;
   outputDiv.style.padding = "10px";
    outputDiv.style.backgroundColor = "white";
    outputDiv.style.marginTop = "10px";
   

    console.log(arr
    );
    console.log(arr2);
    //  if(i==arr.length){
    //   logoutB.addEventListener('click', () => {
    //     window.location.href = '/index.html';})
  }
  }
}
});

// logOut.addEventListener('click',function(){
//   sessionStorage.clear();
//   window.location.href="/design.html";
// });

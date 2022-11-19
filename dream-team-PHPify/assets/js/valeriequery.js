const ValForm = document.querySelector(".registermain"),
ValLogForm = document.querySelector(".loginmain"),
clickreg = document.querySelector(".regclick"),
logclick = document.querySelector(".logclick"),
topholder = document.querySelector("#top");


//Span elements
const spanEmail =document.querySelector("#emailerr"),
spanUser = document.querySelector("#usererr"),
spanpass = document.querySelector("#passerr"),
spanpassii = document.querySelector("#passerrii"),
spanfirst = document.querySelector("#firsterr"),
spanlast = document.querySelector("#lasterr"),
spanprogram = document.querySelector("#progrerr"),
spanLg = document.querySelector("#logerr"),
spanPw = document.querySelector("#logperr");

//register elements
const UserDoc = document.querySelector("#username"),
FirstDoc = document.querySelector("#firstname"),
LastDoc = document.querySelector("#lastname"),
EmailDoc = document.querySelector("#email"),
PassDoc = document.querySelector("#password"),
PassDocii = document.querySelector("#passwordii"),
ProgramDoc = document.querySelector("#programName");

//Login Elements
const LogicUserDoc = document.querySelector("#logusername"),
LoginPasDoc = document.querySelector("#logpassword");

//other
const DateDoc = document.querySelector(".datep");
const regiform = document.querySelector(".registermain form");
const Logiform = document.querySelector(".loginmain form");
function clearAll()
{

    //Dom stuff
    EmailDoc.classList.remove("wronginput");
    PassDoc.classList.remove("wronginput");
    PassDocii.classList.remove("wronginput");
    UserDoc.classList.remove("wronginput");
    ProgramDoc.classList.remove("wronginput");
    FirstDoc.classList.remove("wronginput");
    LastDoc.classList.remove("wronginput");
    LogicUserDoc.classList.remove("wronginput");
    LoginPasDoc.classList.remove("wronginput");
    

      //the span stuff
      spanEmail.classList.remove("active");
      spanUser.classList.remove("active");
      spanpass.classList.remove("active");
      spanpassii.classList.remove("active");
      spanfirst.classList.remove("active");
      spanlast.classList.remove("active");
      spanprogram.classList.remove("active");
      spanLg.classList.remove("active");
      spanPw.classList.remove("active");
      failedcheck = true;
}

function ShowForm()
{
    ValForm.style.display = 'block';
    ValLogForm.style.display='none';
    clickreg.style.display ='none';
    logclick.style.display = 'none';
    topholder.style.display = 'block';
}

function ReturnForm()
{
    ValForm.style.display = 'none';
    clickreg.style.display ='block';
    logclick.style.display = 'block';
    topholder.style.display = 'grid';
    ValLogForm.style.display='none';

    clearAll();
}

function Loginfortm()
{
    ValLogForm.style.display='block';
    ValForm.style.display = 'none';
    clickreg.style.display ='none';
    logclick.style.display = 'none';
    topholder.style.display = 'block';
}

clickreg.addEventListener("click", ()=>{
    ShowForm();
});

logclick.addEventListener("click", ()=>{
    Loginfortm();
});


function LoadCall()
{
    date = new Date();
year = date.getFullYear();
month = date.getMonth() + 1;
day = date.getDate();
    DateDoc.innerHTML = "Date:"+ month + "/" + day + "/" + year;
}

//Validate Script
//This fucntion is gotten online from Simplilearn
//site: https://www.simplilearn.com/tutorials/javascript-tutorial/email-validation-in-javascript
//it purpose is to check if the email enter is valid
function ValidateEmail(val) {

    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  

    if (val.match(validRegex)) {
  
     // alert("Valid email address!");
  
     // document.form1.text1.focus();
  
      return true;
  
    } else {
  
    //  alert("Invalid email address!");
  
     // document.form1.text1.focus();
  
     return false;
  
    }
  
  }

   //Will be used for checking Passwords
  // got from stackoverflow
  // https://stackoverflow.com/questions/7844359/password-regex-with-min-6-chars-at-least-one-letter-and-one-number-and-may-cont

  function checkPwd(str) {
    if (str.length < 6) {
        return("Password is too short");
    } else if (str.length > 50) {
        return("Password is too long");
    } else if (str.search(/\d/) == -1) {
        return("Password Must contain at least one Number");
    } else if (str.search(/[a-zA-Z]/) == -1) {
        return("Password must contain atleast one letter");
    
    } else if (str.search(/[A-Z]/) == -1) {
        return("Password must contain atleast one Uppercase");
    
    } else if (str.search(/[a-z]/) == -1) {
        return("Password must contain atleast one Lowercase");
    
    }// else if (str.search(/[\!\@\#\$\%\^\&\*\(\)\_\+]/) == -1) {
     //   return("Password must contain atleast one special character");
    //}
    return("ok");
}
var failedcheck = false;

function Registerem()
{
    clearAll();

    //email check
    var em = EmailDoc.value;

    if(em == null || em == "Email" || em == " "||em.length<=1)
    {
        EmailDoc.classList.add("wronginput");
        spanEmail.classList.add("active");
    }
    else if(!ValidateEmail(em))
    {
        EmailDoc.classList.add("wronginput");
        spanEmail.classList.add("active");
        failedcheck = false;
    }


    //Login check

    var Lg = UserDoc.value;

    if(Lg == null || Lg.length<1)
    {
        spanUser.classList.add("active");
        UserDoc.classList.add("wronginput");
        spanUser.innerHTML = '&#10008;'+" Username should be Non-empty and within 20 Characters";
        failedcheck = false;
    }

    else if(Lg.length>=20)
    {
        spanUser.classList.add("active");
        UserDoc.classList.add("wronginput");
        spanUser.innerHTML = '&#10008;'+"Username should be Non-empty and within 20 Characters";
        failedcheck = false;
    }

    var Pwd = PassDoc.value;
    var Pwdii = PassDocii.value;

    if(Pwd == null || Pwd.length<=1)
    {
        spanpass.classList.add("active");
        PassDoc.classList.add("wronginput");
        spanpass.innerHTML = '&#10008;'+"Password should be atleast 6 Characters: 1 Uppercase 1 Number 1 Special";
        failedcheck = false;
    }

    if(Pwdii == null || Pwdii.length<=1)
    {
        spanpassii.classList.add("active");
        PassDoc.classList.add("wronginput");
        PassDocii.classList.add("wronginput");
        spanpassii.innerHTML = '&#10008;'+"Passwords do not match"
        failedcheck = false;
    }

    var ResultPas = checkPwd(Pwd);

    if(ResultPas != "ok")
    {
        //error

   // console.log("Password failed "+ ResultPas);
   // PassDoc.classList.add("wronginput");
    spanpass.classList.add("active");
    PassDoc.classList.add("wronginput");
    spanpass.innerHTML = '&#10008;'+ " " + ResultPas;

    failedcheck = false;
    }

    if(Pwd != Pwdii)
    {
        //error No match

        console.log("Password dont Match");
        PassDoc.classList.add("wronginput");
        PassDocii.classList.add("wronginput");
        spanpassii.classList.add("active");
        spanpassii.innerHTML = '&#10008;'+"Passwords do not match"
        failedcheck = false;
    }

    var FName = FirstDoc.value;
    var LName = LastDoc.value;
    var PrgName = ProgramDoc.value;


    if(FName == null || FName.length<=1 || FName == " ")
    {
        FirstDoc.classList.add("wronginput");
        spanfirst.classList.add("active");
        failedcheck =false;
    }

    if(LName == null || LName.length<=1 || LName == " ")
    {
        LastDoc.classList.add("wronginput");
        spanlast.classList.add("active");
        failedcheck =false;
    }


    if(PrgName == null || PrgName.length<=1 || PrgName == " ")
    {
        ProgramDoc.classList.add("wronginput");
        spanprogram.classList.add("active");
        failedcheck =false;
    }

    if(!failedcheck) return false;

    console.log("ll good");
    OnRegisterPhp();
    return false;
}

function LoginEm()
{
    clearAll();
    var Logem = LogicUserDoc.value;

    if(Logem == null || Logem.length <=1 || Logem == " ")
    {

        LogicUserDoc.classList.add("wronginput");
        spanLg.classList.add("active");
        failedcheck =false;
    }
var Passem = LoginPasDoc.value;

    if(Passem == null || Passem.length <= 1 || Passem == " ")
    {
        LoginPasDoc.classList.add("wronginput");
        spanPw.classList.add("active");
        failedcheck =false;
    }

    if(!failedcheck) return false;

    console.log("Login good");
    OnLoginPhp();
    return false;
}

onload = LoadCall();

function OnRegisterPhp()
{
    console.log("Register workii");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","../views/components/php/signup.php",true);
    console.log("Register workiv");
    xhr.onload=()=>{
        console.log("Register work");
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data === "Database connectedsuccess" || data === "success"){
                  //location.href="users.php";
                  location.href = "projectexplorer.php";
                  console.log("success Log");
                }else{
                  //errorText.style.display = "block";
                 // errorText.textContent = data;
                 console.log("error Log " + data);
                }
            }
        }
    }
    let formData = new FormData(regiform);
    xhr.send(formData);
}

function OnLoginPhp()
{
    console.log("Xml Login");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../views/components/php/login.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "Database connectedsuccess" || data === "success"){
               //location.href = "users.php";
               location.href = "projectexplorer.php";
               console.log("Login good " + data);
              }else{
               // errorText.style.display = "block";
               // errorText.textContent = data;
               console.log("error Log " + data);
              }
          }
      }
    }
    let formData = new FormData(Logiform);
    xhr.send(formData);
}
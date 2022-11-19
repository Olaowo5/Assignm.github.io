<?php
include_once  "components/php/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home Page, Assignment 2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale">
    <meta name=" author " content="Valerie Racine">
    <meta name=" description " content="Home Page for Assignment 2">
    <meta name=" keywords " content="Assignment2, cst8285, html code">
<!--Temporary embeded CSS-->
    <style>
        header {
            background-image: linear-gradient(darkgreen, white);
            padding: 5pt;
            border: 1px solid black;
            margin-bottom: 5px;
            }
        #top {
            display:grid;
            grid-template-columns: 1fr 1fr;
            margin: 10%;
            justify-items: center;
        }
        #top > div.regclick, div.logclick {
            border: 5px solid black;
            border-radius: 5%;
            padding: 5%;
            background-image: linear-gradient(green, lightgreen);
        }
        #top > div.regclick:hover, div.logclick:hover {
            background-image: linear-gradient(rgb(73, 72, 72), grey);
            color:white;
            font-size: 1.3em;
            padding: 10%;
        }
        footer {
            background-image: linear-gradient(white, darkgreen);
            padding: 5pt;
            border: 1px solid black;
            margin-top: 5px;
        }
        footer > div {
            text-align: right;
            padding-right: 5%;
        }
        #registerForm {
            margin: 20%;
        }
        #registerForm > div {
            border: 2px solid black;
            border-radius: 5pt;
            margin: 5%;
            background-image: linear-gradient(green, lightgreen)
        }

       
        h1,h3 {
            text-align: center;
        }
        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 2em;
            padding-left: 20%;
            padding-right: 20%;
        }
        .col1 {
            justify-self: right;
        }
        input {
            padding: 2%;
        }
        .col2 {
            opacity: 0.5;
        }
        .button {
            background-color: darkgreen;
            margin: 10%;
            border-radius: 15pt;
            color: white;
            font-size: 1.1em;
        }
        .button:hover {
            background-image: linear-gradient(rgb(73, 72, 72), grey);
        }
        
        .registermain, .loginmain {
            display: none;
            border: 2px solid black;
            border-radius: 5pt;
            margin: 5%;
            background-image: linear-gradient(green, lightgreen)
        }

        .textfield{
        margin-top: 7px;
       
        }

        input[type=text].wronginput,input[type=password].wronginput
        {
        
            border: 5px solid rgb(255, 42, 42);
        }
        .err{
    color: rgb(255, 42, 42);
    font-size: 18px;
    opacity: 0;
    }

    .err.active{
        opacity: 1;
    }
      
    </style>
</head>

<body>

    <header>
        <img src="logo" alt="" />
        <h2>Company Name</h2>
        <nav>
            <!--we will need to add the home button in the header througout the whole website-->
            <a href="index.html">Home</a>
            <a href="projectexplorer.html">Project List</a>
            <a href="aboutus.html">About us</a>
        </nav>
    </header>

    <main id="top">
        <!--we will need to js this so that the clicked menu appears-->
        <div class ="regclick">
            <h3 >Register</h3>
        </div>
        <div  class="logclick">
            <h3>Log in</h3>
        </div>

        <div class="registermain">            
            <h1>Register</h1>
            <button onclick = "ReturnForm()">Back</button>
            <form  onsubmit="return Registerem();">
               
            <div class="textfield">
                <label for="username" class="col1">Username : </label>
                <input type="text" id="username" name="Username" class="col2">
                <span class="err" id ="usererr"> &#10008; UserName should be not empty</span>
            </div>
            <div class="textfield">
                <label for="firstname" class="col1">First Name : </label>
                <input type="text" id="firstname" name="FirstName" class="col2">
                <span class="err" id ="firsterr">  &#10008; Should be not empty</span>
            </div>
                <div class="textfield">
                <label for="lastname" class="col1">Last Name : </label>
                <input type="text" id="lastname" name="LastName" class="col2">
                <span class="err" id ="lasterr">  &#10008; Should be not empty</span>
                </div>
                <div class="textfield">
                <label for="email" class="col1">Email : </label>
                <input type="text" id="email" name="Email" class="col2">
                <span class="err" id ="emailerr">  &#10008; Email Address Should be non-empty with format xyx@xyz.xyz</span>
            </div>
                <div class="textfield">
                <label for="password" class="col1">Password : </label>
                <input type="text" id="password" name="Password" class="col2">
                <span class="err" id ="passerr">  &#10008; Password should be Atleast 6 and contain blah and blah</span>
            </div>
            <div class="textfield">
                <label for="passwordii" class="col1">Re-type Password : </label>
                <input type="text" id="passwordii" name="Passwordii" class="col2">
                <span class="err" id ="passerrii">  &#10008; Password should be Atleast 6 and contain blah and blah</span>
            </div>
                <div class="textfield">
                <label for="programName" class="col1">Program Name : </label>
                <input type="text" id="programName" name="ProgramName" class="col2">
                <span class="err" id ="progrerr">  &#10008; Should be not empty</span>
            </div>
                <div class="textfield">
                    <input type="submit" value="Submit" class="button" >
                <input type="reset" value="Clear Form" class="button">
               
            </div>
            </form>
           
        </div>

        <div class = "loginmain">
            <h1>Log In</h1>
            <button onclick = "ReturnForm()">Back</button>
            <form onsubmit="return LoginEm();">
                
                <div class="textfield">
                <label for="username" class="col1">Username : </label>
                <input type="text" id="logusername" name="Username" class="col2">
                <span class="err" id ="logerr">  &#10008; Should be not empty</span>
                </div>
                <div class="textfield">
                <label for="password" class="col1">Password : </label>
                <input type="text" id="logpassword" name="Password" class="col2">
                <span class="err" id ="logperr">  &#10008; Should be not empty</span>
            </div>
                <input type="submit" value="Submit" class="button">
                <input type="reset" value="Clear Form" class="button">
               
            </form>
            
        </div>
    </main>

    <footer><!--see recommended modifications below--> 
        <a href="#top">Top of Page</a>
        <div >
            <p>
                Authors : <a href="aboutus.html#david" target="_blank">David</a>, 
                <a href="aboutus.html#olamide" target="_blank">Olamide</a>, 
                <a href="aboutus.html#valerie" target="_blank">Valerie</a>, 
                <a href="aboutus.html#ollie" target="_blank">Ollie</a>. 
            </p>
            <p class="datep">Date : </p> <!--js this to always display the current date-->
            <p>Last update : </p>
        </div>
    </footer>

   
    <script src ="../assets/js/valeriequery.js"></script>
</body>

</html>
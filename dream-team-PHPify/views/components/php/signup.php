<?php
session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($conn, $_POST['FirstName']);
$Uname =  mysqli_real_escape_string($conn, $_POST['Username']);  
$lname = mysqli_real_escape_string($conn, $_POST['LastName']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $password = mysqli_real_escape_string($conn, $_POST['Password']);
$program = mysqli_real_escape_string($conn, $_POST['ProgramName']);
$errormes  = "None";
    //okay now lets try

    //for unique ID
    $ran_id = rand(time(), 100000000);
    $status = "Active Now";
    $encrypt_pass = md5($password);

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'"); //check email
    $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE username= '{$Uname}'"); //check username
    if(mysqli_num_rows($sql) > 0){
        echo "$email - This email already exist!";
        $errormes = $email;
    }
    else if(mysqli_num_rows($sql2) > 0){
        echo "$Uname - This Username already exist!";
        $errormes = $Uname;
    }
    else{
        $insert_query = mysqli_query($conn, "INSERT INTO users (UserID, username, firstname, lastname, email, passw, progm)
        VALUES ({$ran_id}, '{$Uname}','{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$program}')");
        if($insert_query){
            $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($select_sql2) > 0){
                $result = mysqli_fetch_assoc($select_sql2);
                $_SESSION['UserID'] = $result['UserID'];
                echo "success";
            }else{
                echo "This email address not Exist!";
            }
        }else{
            echo "Something went wrong. Please try again!";
        }
    }

?>
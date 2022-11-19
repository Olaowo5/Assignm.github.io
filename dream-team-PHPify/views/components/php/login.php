<?php 
    session_start();
    include_once "config.php";
    $uname = mysqli_real_escape_string($conn, $_POST['Username']);
    $password = mysqli_real_escape_string($conn, $_POST['Password']);
   
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$uname}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $user_pass = md5($password);
            $enc_pass = $row['passw'];
            if($user_pass === $enc_pass){
              
                //$status = "Active now";
             //   $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                /*if($sql2)*/
                //{
                    $_SESSION['UserID'] = $row['UserID']; //save this fold to pass down
                    echo "success";
                //}
                /*else{
                    echo "Something went wrong. Please try again!";
                }*/
            }else{
                echo "Username or Password is Incorrect!";
            }
        }else{
            echo "$uname - This username not Exist!";
        }
    
?>
<?php
session_start();
include_once "components/php/config.php";
if(!isset($_SESSION['UserID'])){
  header("location: IndexLogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dream Team</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <meta name="description" content="Dream Team offers new entrepreneurs a chance to find Algonquin College students to form groups to complete a project." />
        <meta name="authors" content="David Cronier, Olamide Owolabi, Ollie Savill, Valerie Racine" />
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
        <script src="../assets/js/script.js" defer></script>
    </head>
    <body>
    <?php
       $sql = mysqli_query($conn, "SELECT * FROM users WHERE UserID = {$_SESSION['UserID']}");
       if(mysqli_num_rows($sql) > 0){
         $row = mysqli_fetch_assoc($sql);
       }
      ?>
        <header>                                            <!-- HEADER SECTION: TITLE, ACTIVE USER AVATAR AND NAME, NAV -->
            <h1>Dream Team</h1>            
            <nav>
                <a href= "./IndexLogin.php">The Login Page</a>
                <a href="./index.php">Index</a>
                <a href="./projectexplorer.php">Projects</a>
                <a href="./aboutus.php">About Us</a>
            </nav>
            <div class="active-user-section">
                    <img class="active-user-avatar" src="../assets/img/user-placeholder.jpg" alt="User Profile Picture">
                    <span class="active-user-name"><?php echo $row['firstname']. " " . $row['lastname'] ?></span>                
            </div>
        </header>
<?php
$conn = mysqli_connect("localhost","root","","webasignment");

if($conn){
    echo "Database connected";
}else{
    echo "Error";
}
?>
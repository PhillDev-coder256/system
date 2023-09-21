<?php
include("../../connection.php");
    if (isset($_SESSION['user'])) {
        if(($_SESSION['user']) == "" or $_SESSION['usertype'] != 'u'){
        header("location: ../../login.php");
        }else{
        $username = $_SESSION['user'];

        $sqlmain= "select * from user where uemail='$username'";
        $result= $database->query($sqlmain);
        $row=$result->fetch_assoc();

        $_SESSION['username'] = $row['uname'];
        }
    }else{
        header("location: ../../login.php");
    }
?>
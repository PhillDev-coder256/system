<?php
include("../../connection.php");
    if (isset($_SESSION['user'])) {
        if(($_SESSION['user']) == "" or $_SESSION['usertype'] != 'a'){
        header("location: ../../login.php");
        }else{
        $username = $_SESSION['user'];

        $sqlmain= "select * from admin where aemail='$username'";
        $result= $database->query($sqlmain);
        $row=$result->fetch_assoc();

        $_SESSION['username'] = $row['fullname'];
        }
    }else{
        header("location: ../../login.php");
    }
?>
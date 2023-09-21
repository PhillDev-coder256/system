<?php
session_start();
include('../../connection.php');
include('check_authentication.php');

if(isset($_POST['submit'])){
    $account_type = $_POST['atype'];
    $username = $_POST['uname'];
    $phone = $_POST['tel'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];
    $addedby = $_SESSION['user'];

    // echo $email;

    $mainsql = "select * from webuser where email = '$email'";
    // $sql2 = ""
    $result = mysqli_query($database, $mainsql);

    if ($result->num_rows > 0) {
        echo "<script>
            alert('Error: Email already exists');

        </script>";
        // header('location: ./register.php');
    }else{
        if($pwd == $cpwd){
            $pwd_encrypt = md5($pwd);
            if($account_type == 'a'){
                
                $insert_query = "INSERT INTO admin(aemail, fullname, apassword, atel, created_by)VALUES(
                    '$email', '$username', '$pwd_encrypt', '$phone', '$addedby'
                )";
                $insert_query2 = "INSERT INTO webuser(email, usertype)VALUES(
                    '$email', '$account_type'
                )";

                $ex = mysqli_query($database, $insert_query);
                $ex2 = mysqli_query($database, $insert_query2);
                if($ex and $ex2){
                    echo "<script>
                            alert('Success: ADMIN ACCOUNT ADDED SUCCESSFULLY');
                        </script>";
                }else{
                    echo "<script>
                            alert('Error: FAILED TO ADD ADMIN ACCOUNT');
                        </script>";
                }
            }elseif ($account_type == 'u') {
                $insert_query = "INSERT INTO user(uemail, uname, upassword, utel, created_by)VALUES(
                    '$email', '$username', '$pwd_encrypt', '$phone', '$addedby'
                )";
                $insert_query2 = "INSERT INTO webuser(email, usertype)VALUES(
                    '$email', '$account_type'
                )";

                $ex = mysqli_query($database, $insert_query);
                $ex2 = mysqli_query($database, $insert_query2);
                if($ex and $ex2){
                    echo "<script>
                            alert('Success: USER ACCOUNT ADDED SUCCESSFULLY');
                        </script>";
                }else{
                    echo "<script>
                            alert('Error: FAILED TO ADD USER ACCOUNT');
                        </script>";
                }
            }else{
                echo "<script>
                        alert('Error: USER WITH SAME EMAIL ALREADY EXISTS');
                    </script>";
            }
    
        }else{
            echo "<script>
                    alert('Error: PASSWORDS DON'T MATCH, PLEASE TRY AGAIN LATER');
                </script>";
        }
        header('location: dashboard.php');
    }

    

    

    
}

?>
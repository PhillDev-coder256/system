<?php

    session_start();
    include("../../connection.php");
    include("check_authentication");
    
    if($_GET){
        
        $id=$_GET["id"];
        $result001= $database->query("select * from loan where id=$id;");

        $sqlmain= "select * from loan where id='$id'";
        $result= $database->query($sqlmain);
        $row=$result->fetch_assoc();
        $email=$row["useremail"];
        $amount=$row["amount"];
        $date_inserted=$row["date"];
        $comment = $row['comment'];

        $backupsql = "INSERT INTO paid_loan(old_id, date_inserted, amount, comment, email)VALUES('$id', '$date_inserted', '$amount', '$comment', '$email')";

        $excute_backup = mysqli_query($database, $backupsql);

        
        if($excute_backup){
            $sql= "delete from loan where useremail='$email' and id = $id;";

            $excute_delete = mysqli_query($database, $sql);

            if($excute_delete){
                header("location: loans.php");
            }else{
                echo "Error paying loan";
                // echo "<script>console.log("Not get method")</script>";
            }
        }else{
            echo "Couldn't backup loan record, therefore can't pay !!";
        }
        
    }else{
        echo "Not get methods";
    }


?>
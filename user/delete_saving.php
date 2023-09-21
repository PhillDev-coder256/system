<?php

    session_start();
    include("../../connection.php");
    include("check_authentication");
    
    if($_GET){
        
        $id=$_GET["id"];
        $result001= $database->query("select * from saving where id=$id;");
        // $email=($result001->fetch_assoc())["useremail"];
        // $amount=($result001->fetch_assoc())["amount"];
        // $date_inserted=($result001->fetch_assoc())["date"];
        // $comment=($result001->fetch_assoc())["comment"];

        $sqlmain= "select * from saving where id='$id'";
        $result= $database->query($sqlmain);
        $row=$result->fetch_assoc();
        $email=$row["useremail"];
        $amount=$row["amount"];
        $date_inserted=$row["date"];
        $comment = $row['comment'];

        $backupsql = "INSERT INTO deleted_saving(old_id, date_inserted, amount, comment, email)VALUES('$id', '$date_inserted', '$amount', '$comment', '$email')";

        $excute_backup = mysqli_query($database, $backupsql);

        
        if($excute_backup){
            $sql= "delete from saving where useremail='$email' and id = $id;";

            $excute_delete = mysqli_query($database, $sql);

            if($excute_delete){
                header("location: savings.php");
            }else{
                echo "Error deleting record";
                // echo "<script>console.log("Not get method")</script>";
            }
        }else{
            echo "Couldn't backup saving record, therefore can't delete !!";
        }
        
    }else{
        echo "Not get methods";
    }


?>
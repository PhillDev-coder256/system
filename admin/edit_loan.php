<?php
    if(isset($_POST['edit-btn'])){
        include("../../connection.php");
        include("../../check_authenticatio.php");

        $amount = $_POST['amount'];
        $comment = $_POST["comment"];
        $id = $_POST['id00'];

        // echo $amount . $comment . $id;

        $sql = "UPDATE loan set amount = '$amount', comment = '$comment' where id= $id";

        $execute_edit = mysqli_query($database, $sql);

        if($execute_edit){
            header("location: loans.php");
        }else{
            echo "Failed to update loan record";
        }

    }else{
        echo "Not post method";
    }
?>
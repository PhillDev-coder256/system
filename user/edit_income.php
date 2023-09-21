<?php
    if(isset($_POST['edit-btn'])){
        include("../../connection.php");
        include("../../check_authenticatio.php");

        $amount = $_POST['amount'];
        $comment = $_POST["comment"];
        $id = $_POST['id00'];

        // echo $amount . $comment . $id;

        $sql = "UPDATE income set amount = '$amount', comment = '$comment' where id= $id";

        $execute_edit = mysqli_query($database, $sql);

        $available_amount = $_SESSION['$available_amount'];

        if($execute_edit){
            // $_SESSION['$available_amount'] = $available_amount - 
            header("location: income.php");
        }else{
            echo "Failed to update income record";
        }

    }else{
        echo "Not post method";
    }
?>
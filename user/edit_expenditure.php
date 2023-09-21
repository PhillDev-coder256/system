<?php
    if(isset($_POST['edit-btn'])){
        include("../../connection.php");
        include("../../check_authenticatio.php");

        $amount = $_POST['amount'];
        $comment = $_POST["comment"];
        $id = $_POST['id00'];

        // echo $amount . $comment . $id;

        $available_amount = $_SESSION['$available_amount'];
        if($amount > $available_amount){
            echo "<script>alert('Expenditure cannot exceed current available amount')</script>";
        }else{
            $sql = "UPDATE expenditure set amount = '$amount', comment = '$comment' where id= $id";

            $execute_edit = mysqli_query($database, $sql);

            if($execute_edit){
                header("location: expenditure.php");
            }else{
                echo "Failed to update expenditure record";
            }
        }

        

    }else{
        echo "Not post method";
    }
?>
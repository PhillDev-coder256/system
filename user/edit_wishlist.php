<?php
    if(isset($_POST['edit-btn'])){
        include("../../connection.php");
        include("../../check_authenticatio.php");

        $amount = $_POST['amount'];
        $comment = $_POST["comment"];
        $id = $_POST['id00'];

        // echo $amount . $comment . $id;

        $sql = "UPDATE wishlist set amount = '$amount', comment = '$comment' where id= $id";

        $execute_edit = mysqli_query($database, $sql);

        if($execute_edit){
            header("location: wishlist.php");
        }else{
            echo "Failed to update wishlist record";
        }

    }else{
        echo "Not post method";
    }
?>
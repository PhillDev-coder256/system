
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pay Loan</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<?php

session_start();
include("../../connection.php");
include("check_authentication");

if(isset($_POST['pay'])){
    $amount_paid = $_POST["amount_paid"];
    $payment_comment = $_POST["comment"];
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
        $loan_balance = $amount - $amount_paid;

        if($amount_paid > $amount){
            echo "<h1 style='z-index:2;color:red' class='btn btn-warning'>Error: Amount paid cannot be greater than the loan balance</h1>";
        }else{
            $backupsql = "INSERT INTO paid_loan(old_id, date_inserted, amount, amount_paid, comment, email)VALUES('$id', '$date_inserted', '$amount','$amount_paid', '$payment_comment', '$email')";
            $excute_backup = mysqli_query($database, $backupsql);
        
            if($excute_backup){
                $update_loan_sql = "UPDATE loan SET amount = '$loan_balance' where id='$id'";
                $query = mysqli_query($database, $update_loan_sql);
                if($query){
                    // $_SESSION['total_loan'] = $total_loan - $amount;
                    echo "<script>alert('Updated successfully')</script>";
                    
                    
                }else{
                    echo "Error while updating loan record";
                }
            }else{
                echo 'Error while backing up loan record';
            }
            }
        
    
        
    }else{
        echo "Not get methods";
    }
    header("location: loans.php");
}else{
    echo "Not post method";
}




?>



    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <div>
                                            <h1 id="message" ></h1>
                                        </div>
                                        <h1 class="h4 text-gray-900 mb-2">Enter Amount you want to pay</h1>
                                        <p class="mb-4">here</p>
                                    </div>
                                    <form action="" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user" name="amount_paid"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter amount to pay...">
                                            <input type="text" class="form-control form-control-user" name="comment"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Any comments ?">
                                        </div>
                                        <input name="pay" type="submit" class="btn btn-primary btn-user btn-block" value="Pay" />
                                    </form>
                                    <hr>
                                    
                                    <div class="text-center">
                                        <a class="small" href="loans.php">Not sure ? Go back!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
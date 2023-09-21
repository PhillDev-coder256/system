<?php
session_start();
include('/opt/lampp/htdocs/system/connection.php');
include('check_authentication.php');
$useremail = $_SESSION['user'];

$total_paid_loan_sql = "SELECT SUM(amount) as total FROM paid_loan where useremail = '$useremail'";
$total_paid_loan_query = mysqli_query($database, $total_paid_loan_sql);

if ($total_paid_loan_query) {
    $row = mysqli_fetch_assoc($total_paid_loan_query);
    $total_paid_loan = $row['total'];
    $_SESSION['total_paid_loan'] = $total_paid_loan;
    // $available_amount = $_SESSION['available_amount'] + 
    include('update_available_amount.php');

    echo json_encode(['total_paid_loan' => $total_paid_loan]);
    
} else {
    echo json_encode(['error' => 'Unable to fetch total loan amount']);
}

header('location: loans.php');


?>


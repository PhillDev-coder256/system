<?php
session_start();
include('/opt/lampp/htdocs/system/connection.php');
include('check_authentication.php');
$useremail = $_SESSION['user'];

$total_loan_sql = "SELECT SUM(amount) as total FROM loan where useremail = '$useremail'";
$total_loan_query = mysqli_query($database, $total_loan_sql);

if ($total_loan_query) {
    $row = mysqli_fetch_assoc($total_loan_query);
    $total_loan = $row['total'];
    $_SESSION['total_loan'] = $total_loan;
    include('update_available_amount.php');
    // $available_amount = $_SESSION['available_amount'] + 
    echo json_encode(['total_loan' => $total_loan]);
    
} else {
    echo json_encode(['error' => 'Unable to fetch total loan amount']);
}


?>


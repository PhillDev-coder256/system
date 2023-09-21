<?php
session_start();
include('/opt/lampp/htdocs/system/connection.php');
include('check_authentication.php');
$useremail = $_SESSION['user'];

$total_paid_loan_sql = "SELECT SUM(amount) as total FROM paid_loan";
$total_paid_loan_query = mysqli_query($database, $total_paid_loan_sql);

if ($total_paid_loan_query) {
    $row = mysqli_fetch_assoc($total_paid_loan_query);
    $total_paid_loan = $row['total'];
    $_SESSION['total_paid_loan'] = $total_paid_loan;
    echo json_encode(['total_paid_loan' => $total_paid_loan]);
} else {
    echo json_encode(['error' => 'Unable to fetch total paid_loan amount']);
}
?>


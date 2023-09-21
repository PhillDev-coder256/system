<?php
session_start();
include('/opt/lampp/htdocs/system/connection.php');
include('check_authentication.php');
$useremail = $_SESSION['user'];

$total_deleted_loan_sql = "SELECT SUM(amount) as total FROM deleted_loan";
$total_deleted_loan_query = mysqli_query($database, $total_deleted_loan_sql);

if ($total_deleted_loan_query) {
    $row = mysqli_fetch_assoc($total_deleted_loan_query);
    $total_deleted_loan = $row['total'];
    $_SESSION['total_deleted_loan'] = $total_deleted_loan;
    echo json_encode(['total_deleted_loan' => $total_deleted_loan]);
} else {
    echo json_encode(['error' => 'Unable to fetch total deleted_loan amount']);
}
?>


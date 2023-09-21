<?php
session_start();
include('/opt/lampp/htdocs/system/connection.php');
include('check_authentication.php');
$useremail = $_SESSION['user'];

$total_deleted_expenditure_sql = "SELECT SUM(amount) as total FROM deleted_expenditure";
$total_deleted_expenditure_query = mysqli_query($database, $total_deleted_expenditure_sql);

if ($total_deleted_expenditure_query) {
    $row = mysqli_fetch_assoc($total_deleted_expenditure_query);
    $total_deleted_expenditure = $row['total'];
    $_SESSION['total_deleted_expenditure'] = $total_deleted_expenditure;
    echo json_encode(['total_deleted_expenditure' => $total_deleted_expenditure]);
} else {
    echo json_encode(['error' => 'Unable to fetch total deleted_expenditure amount']);
}
?>


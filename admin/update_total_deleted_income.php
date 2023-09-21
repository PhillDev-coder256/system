<?php
session_start();
include('/opt/lampp/htdocs/system/connection.php');
include('check_authentication.php');
$useremail = $_SESSION['user'];

$total_deleted_income_sql = "SELECT SUM(amount) as total FROM deleted_income";
$total_deleted_income_query = mysqli_query($database, $total_deleted_income_sql);

if ($total_deleted_income_query) {
    $row = mysqli_fetch_assoc($total_deleted_income_query);
    $total_deleted_income = $row['total'];
    $_SESSION['total_deleted_income'] = $total_deleted_income;
    echo json_encode(['total_deleted_income' => $total_deleted_income]);
} else {
    echo json_encode(['error' => 'Unable to fetch total deleted_income amount']);
}
?>


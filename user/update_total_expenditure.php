<?php
session_start();
include('/opt/lampp/htdocs/system/connection.php');
include('check_authentication.php');
$useremail = $_SESSION['user'];

$total_expenditure_sql = "SELECT SUM(amount) as total FROM expenditure where useremail='$useremail'";
$total_expenditure_query = mysqli_query($database, $total_expenditure_sql);

if ($total_expenditure_query) {
    $row = mysqli_fetch_assoc($total_expenditure_query);
    $total_expenditure = $row['total'];
    $_SESSION['total_expenditure'] = $total_expenditure;
    include('update_available_amount.php');
    echo json_encode(['total_expenditure' => $total_expenditure]);
} else {
    echo json_encode(['error' => 'Unable to fetch total expenditure amount']);
}
?>


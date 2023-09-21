<?php
session_start();
include('/opt/lampp/htdocs/system/connection.php');
include('check_authentication.php');
$useremail = $_SESSION['user'];


$total_income_sql = "SELECT SUM(amount) as total FROM income";
$total_income_query = mysqli_query($database, $total_income_sql);

if ($total_income_query) {
    $row = mysqli_fetch_assoc($total_income_query);
    $total_income = $row['total'];
    $_SESSION['total_income'] = $total_income;
    echo json_encode(['total_income' => $total_income]);
} else {
    echo json_encode(['error' => 'Unable to fetch total income amount']);
}

// $_SESSION['total'] = $row['total'];
?>


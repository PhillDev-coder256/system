<?php
session_start();
include('/opt/lampp/htdocs/system/connection.php');
include('check_authentication.php');
$useremail = $_SESSION['user'];

$total_saving_sql = "SELECT SUM(amount) as total FROM saving";
$total_saving_query = mysqli_query($database, $total_saving_sql);

if ($total_saving_query) {
    $row = mysqli_fetch_assoc($total_saving_query);
    $total_saving = $row['total'];
    $_SESSION['total_saving'] = $total_saving;
    echo json_encode(['total_saving' => $total_saving]);
} else {
    echo json_encode(['error' => 'Unable to fetch total saving amount']);
}
?>


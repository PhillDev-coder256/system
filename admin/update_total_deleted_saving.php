<?php
session_start();
include('/opt/lampp/htdocs/system/connection.php');
include('check_authentication.php');
$useremail = $_SESSION['user'];

$total_deleted_saving_sql = "SELECT SUM(amount) as total FROM deleted_saving";
$total_deleted_saving_query = mysqli_query($database, $total_deleted_saving_sql);

if ($total_deleted_saving_query) {
    $row = mysqli_fetch_assoc($total_deleted_saving_query);
    $total_deleted_saving = $row['total'];
    $_SESSION['total_deleted_saving'] = $total_deleted_saving;
    echo json_encode(['total_deleted_saving' => $total_deleted_saving]);
} else {
    echo json_encode(['error' => 'Unable to fetch total deleted_saving amount']);
}
?>


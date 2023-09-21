<?php
session_start();
include('/opt/lampp/htdocs/system/connection.php');
include('check_authentication.php');
$useremail = $_SESSION['user'];

$total_deleted_wishlist_sql = "SELECT SUM(amount) as total FROM deleted_wishlist";
$total_deleted_wishlist_query = mysqli_query($database, $total_deleted_wishlist_sql);

if ($total_deleted_wishlist_query) {
    $row = mysqli_fetch_assoc($total_deleted_wishlist_query);
    $total_deleted_wishlist = $row['total'];
    $_SESSION['total_deleted_wishlist'] = $total_deleted_wishlist;
    echo json_encode(['total_deleted_wishlist' => $total_deleted_wishlist]);
} else {
    echo json_encode(['error' => 'Unable to fetch total deleted_wishlist amount']);
}
?>


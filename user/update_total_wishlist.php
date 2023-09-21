<?php
session_start();
include('/opt/lampp/htdocs/system/connection.php');
include('check_authentication.php');
$useremail = $_SESSION['user'];

$total_wishlist_sql = "SELECT SUM(amount) as total FROM wishlist where useremail='$useremail'";
$total_wishlist_query = mysqli_query($database, $total_wishlist_sql);

if ($total_wishlist_query) {
    $row = mysqli_fetch_assoc($total_wishlist_query);
    $total_wishlist = $row['total'];
    $_SESSION['total_wishlist'] = $total_wishlist;
    include('update_available_amount.php');

    echo json_encode(['total_wishlist' => $total_wishlist]);
} else {
    echo json_encode(['error' => 'Unable to fetch total wishlist amount']);
}
?>


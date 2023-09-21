<?php
// This script should be included on the other pages

// Check if a reload signal has been sent from the homepage
if (isset($_GET['reload']) && $_GET['reload'] === 'true') {
    // Perform any necessary processing before the reload
    
    // Redirect back to the same page to trigger the reload
    header("Location: {$_SERVER['REQUEST_URI']}");
    exit;
}
?>

<?php

session_start();
include('../../connection.php');
include('check_authentication.php');

    // $available_amount = $_SESSION['total_income'] - $total_expenditure;
    // $_SESSION['available_amount'] = $available_amount;

    // $_SESSION['total_income'] = $total_income;
    // $_SESSION['available_amount'] = $available_amount + $_SESSION['current_amount'];

    $total_income = $_SESSION['total_income'];
    $total_loan = $_SESSION['total_loan'];
    $total_expenditure = $_SESSION['total_expenditure'];
    $total_paid_loan = $_SESSION['total_paid_loan'];
    $total_saving = $_SESSION['total_saving'];

    $available_amount = $total_income + $total_loan - $total_expenditure - $total_paid_loan - $total_saving ;

    $_SESSION['available_amount'] = $available_amount;
?>
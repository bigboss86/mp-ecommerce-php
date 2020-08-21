<?php

function baseUrl(){
    return sprintf(
        "%s://%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME']
    );
}

if (isset($_POST['initPoint'])) {
    header('Location: ' . $_POST['initPoint']);
} else {
    if ($_GET['collection_status'] == 'approved') {
        $paymentMethod = $_GET['payment_type'];
        $externalReference = $_GET['external_reference'];
        $paymentId = $_GET['collection_id'];
        $preferenceId = $_GET['preference_id'];

        header('Location: ' . baseUrl() . '/success.php?paymentMethod=' . $paymentMethod . '&externalReference=' . $externalReference . '&paymentId=' . $paymentId . '&preferenceId=' . $preferenceId);
    } elseif ($_GET['collection_status'] == 'pending' || $_GET['collection_status'] == 'in_process') {
        header('Location: ' . baseUrl() . '/pending.php');
    } elseif ($_GET['collection_status'] == 'rejected') {
        header('Location: ' . baseUrl() . '/failure.php');
    } else {
        header('Location: ' . baseUrl());
    }
}

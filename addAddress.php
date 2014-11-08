<?php

session_start();
include 'actions.php';
// If user is not logged in, redirect it
if (!(isset($_SESSION['username']))) {
    header("location:index.php"); //to redirect back to "index.php" after logging out
    exit();
}

$username = $_SESSION['username'];
$pinId = $_SESSION[''];
if (isset($_POST['submitAddAddress'])) {
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $combine = $address . ' ' . $city . ' ' . $state . ', ' . $zip;
    
    $data_arr = geocode($combine);
}
if ($data_arr) {

    $latitude = $data_arr[0];
    $longitude = $data_arr[1];
    addAddress($pinId, $username, $combine);
    addlatandlong($pinId, $username, $latitude, $longitue);
}

function geocode($address) {

    $address = urlencode($address);
    $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address={$address}";
    $resp_json = file_get_contents($url);
    $resp = json_decode($resp_json, true);

    if ($resp['status'] = 'OK') {
        $lat = $resp['results'][0]['geometry']['location']['lat'];
        $long = $resp['results'][0]['geometry']['location']['lng'];

        if ($lat && $long) {

            $data_arr = array();
            array_push($data_arr, $lati, $longi);
            return $data_arr;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

?>

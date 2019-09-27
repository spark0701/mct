<?php

//include configuration file
echo "Hello world!";
// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = true;
define("HOST", "127.0.0.1:3306");     // The host you want to connect to.
define("USER", "newmom");    // The database username. 
define("PASSWORD", "password0701");    // The database password. 
define("DATABASE", "motherstea");    // The database name.

//Connect with database
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected successfully";

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$system_mode = 'test'; // set 'test' for sandbox and leave blank for real payments.
$paypalConfig = [
    'email' => 'sb-m43vy0238341@business.example.com',
    'return_url' => 'https://spark0701.github.io/mct/payment-success.html',
    'cancel_url' => 'http://spark0701.github.io/mct/payment-cancelled.php',
    'notify_url' => 'http://spark0701.github.io/mct/paypal_ipn.php'
];
// Include Functions
// require 'functions.php';

// Product being purchased.
$itemName = 'Test Item';
$itemAmount = 5.00;

echo 'are you here at ipn.php???';

// Check if paypal request or response
if (!isset($_POST['txn_id']) && !isset($_POST['txn_type'])) {
	// Grab the post data so that we can set up the query string for PayPal.
    // Ideally we'd use a whitelist here to check nothing is being injected into
    // our post data.
    echo 'are you here at ipn.php!!!';

    $data = [];
    foreach ($_POST as $key => $value) {
        $data[$key] = stripslashes($value);
    }

    // Set the PayPal account.
    $data['business'] = $paypalConfig['email'];

    // Set the PayPal return addresses.
    $data['return'] = stripslashes($paypalConfig['return_url']);
    $data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
    $data['notify_url'] = stripslashes($paypalConfig['notify_url']);

    // Set the details about the product being purchased, including the amount
    // and currency so that these aren't overridden by the form data.
    $data['item_name'] = $itemName;
    $data['amount'] = $itemAmount;
    $data['currency_code'] = 'GBP';

    // Add any custom fields for the query string.
    //$data['custom'] = USERID;

    // Build the query string from the data.
    $queryString = http_build_query($data);
    echo ("<br>");
    echo ("<br>");

    echo ($queryString);

    // Redirect to paypal IPN
    //header('location:' . 'https://www.sandbox.paypal.com/cgi-bin/webscr' . '?' . $queryString);
    //exit();

} else {
    // Handle the PayPal response.
}




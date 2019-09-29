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
    'cancel_url' => 'http://spark0701.github.io/mct/payment-cancelled.html',
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
    // Add any custom fields for the query string.
    //$data['custom'] = USERID;

    // Build the query string from the data.
    //$queryString = http_build_query($data);
    
$paypal_email = 'sb-m43vy0238341@business.example.com';
$return_url   = 'https://142.231.7.17/mct/payment-success.php';
$cancel_url   = 'http://spark0701.github.io/mct/payment-cancelled.html';
$notify_url   = 'http://spark0701.github.io/mct/paypal_ipn.php';//same file
$item_name    = 'Test Item'; //build the item and amount depend on what is selected in the form
$item_amount  = 5.00;

$querystring = [
    'business'      => urlencode($paypal_email),
    'cmd'           => '_xclick',
    'item_name'     => urlencode($item_name),
    'amount'        => urlencode($item_amount),
    'return'        => urlencode(stripslashes($return_url)),
    'cancel_return' => urlencode(stripslashes($cancel_url)),
    'notify_url'    => urlencode($notify_url),
];

    // Redirect to paypal IPN
    //header('location:' . 'https://www.sandbox.paypal.com/cgi-bin/webscr' . '?' . $queryString);
    //exit();

} else {
    // Handle the PayPal response.

    // Assign posted variables to local data array.
$data = [
    'item_name' => $_POST['item_name'],
    'item_number' => $_POST['item_number'],
    'payment_status' => $_POST['payment_status'],
    'payment_amount' => $_POST['mc_gross'],
    'payment_currency' => $_POST['mc_currency'],
    'txn_id' => $_POST['txn_id'],
    'receiver_email' => $_POST['receiver_email'],
    'payer_email' => $_POST['payer_email'],
    'custom' => $_POST['custom'],
];

// We need to verify the transaction comes from PayPal and check we've not
// already processed the transaction before adding the payment to our
// database.
if (verifyTransaction($_POST) && checkTxnid($data['txn_id'])) {
    if (addPayment($data) !== false) {
        // Payment successfully added.
    }
}
}

function verifyTransaction($data) {
    global $paypalUrl;

    $req = 'cmd=_notify-validate';
    foreach ($data as $key => $value) {
        $value = urlencode(stripslashes($value));
        $value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i', '${1}%0D%0A${3}', $value); // IPN fix
        $req .= "&$key=$value";
    }

    $ch = curl_init($paypalUrl);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
    curl_setopt($ch, CURLOPT_SSLVERSION, 6);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
    $res = curl_exec($ch);

    if (!$res) {
        $errno = curl_errno($ch);
        $errstr = curl_error($ch);
        curl_close($ch);
        throw new Exception("cURL error: [$errno] $errstr");
    }

    $info = curl_getinfo($ch);

    // Check the http response
    $httpCode = $info['http_code'];
    if ($httpCode != 200) {
        throw new Exception("PayPal responded with http code $httpCode");
    }

    curl_close($ch);

    return $res === 'VERIFIED';
}    




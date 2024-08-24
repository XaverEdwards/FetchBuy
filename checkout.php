<?php
session_start();
// ini_set('display_errors', "On");
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

$productName = $_SESSION['productName'];
$Amount = $_SESSION['Amount'];
$id = $_SESSION['ID'];
require_once 'vendor/autoload.php';
require_once 'secrets.php';

\Stripe\Stripe::setApiKey($stripeSecretKey);
header('Content-Type: application/json');

$YOUR_DOMAIN = 'https://fetchbuy.com.hk/';

$checkout_session = \Stripe\Checkout\Session::create([
  // 'payment_method_types' => ['card'],
  'payment_method_configuration' => 'this is secret key',
  'line_items' => [[
    'price_data' => [
      'currency' => 'hkd',
      'product_data' => [
        'name' => $productName.$id,
      ],
      'unit_amount' => $Amount,
    ],
    'quantity' => 1,
  ]],
  
    'metadata' => ['id' => $id],
  

  'phone_number_collection' => ['enabled' => true],
  'mode' => 'payment',
  'shipping_address_collection' => ['allowed_countries' => ['HK', 'MO', 'CN']],
  'shipping_options' => [['shipping_rate' => 'this is my shipping rate code']],
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/store.php',
  
  

  
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
?>

<?php






<?php

require_once "config.php";

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];
$stripeinfo = \Stripe\Token::retrieve($token);
$email = $stripeinfo->email;
$charge = \Stripe\Charge::create([
    'amount' => 1000000,
    'currency' => 'usd',
    'description' => 'Example charge',
    'source' => $token,
]);

//Success Message
echo 'Success! You have been charged $' .$charge["amount"]/100;



//Email receipt here
// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey("sk_test_sphtO7YqhYaVWbTq3dea3TBj");

$charge = \Stripe\Charge::create([
    'amount' => 999,
    'currency' => 'usd',
    'source' => 'tok_visa',
    'receipt_email' => $email,
]);

// Working: echo $charge["receipt_email"];

?>
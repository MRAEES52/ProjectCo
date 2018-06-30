<?php

require_once "library/init.php";
require_once "index.php";

$stripeDetails = array(
    "secretKey" => "sk_test_sphtO7YqhYaVWbTq3dea3TBj",
    "publishableKey" => "pk_test_SbcHQqBv6QxU2dhkcAfiQFwR"
);

\Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);



?>
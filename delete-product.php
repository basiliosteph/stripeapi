<?php
require "vendor/autoload.php";

$stripe = new \Stripe\StripeClient(
  'sk_test_51LgIKwH3YSRNu0EdXCSOIymLyS7Pr3PchjEuoe7rS1aMkuGlP01J9M94Z0ir22hYhTU53TWx0FjqgWIiruVjMCl600toHAik81'
);
$result = $stripe->products->delete(
  'prod_MP7pWPFs3wjXac',
  []
);
var_dump($result);

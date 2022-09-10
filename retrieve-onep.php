<?php

require "vendor/autoload.php";

$stripe = new \Stripe\StripeClient(
  'sk_test_51LgIKwH3YSRNu0EdXCSOIymLyS7Pr3PchjEuoe7rS1aMkuGlP01J9M94Z0ir22hYhTU53TWx0FjqgWIiruVjMCl600toHAik81'
);
$product = $stripe->products->retrieve(
	'prod_MP81VMxTOnw56o',
	[]
);
$price = $stripe->prices->retrieve('price_1LgJlKH3YSRNu0EdlwlgGu8C',[]);
#echo '<pre>';
#var_dump($product);
#var_dump($price);
#echo '</pre>';
?><!DOCTYPE html>
<html>
  <head>
    <title>Buy</title>
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
  </head>
  <body>
    <section>
      <div class="product">
        <img src="<?php echo array_pop($product->images); ?>" alt="<?php echo $product->name; ?>" />
        <div class="description">
          <h3><?php echo $product->name; ?></h3>
          <p><?php echo $product->description; ?></p>
          <h5><?php echo strtoupper($price->currency); ?> <?php echo $price->unit_amount_decimal; ?></h5>
        </div>
      </div>
      <form action="/create-checkout-session.php" method="POST">
        <button type="submit" id="checkout-button">Checkout</button>
      </form>
    </section>
  </body>
</html>
<?php
require_once('lib/Stripe.php');

$stripe = array(
  "secret_key"      => "sk_test_5UEW8vga7xU1AtrTgpEnN6XF",
  "publishable_key" => "pk_test_97ZlNg7LtYk9ICp17I6hjlRI"
);

Stripe::setApiKey($stripe['secret_key']);
?>
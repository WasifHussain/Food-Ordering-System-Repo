<?php
	require('stripe-php-master/init.php');
	$publishableKey = 
	"pk_test_51JRVteBEnR2Z7uBuh9E74C4yVByRp6uERlfZJHCiUzf46orlfMeBXldMpitGdMcDfhkyWHAHmD8twuE62tfEtAHs004yyBKfEu";
	$secretKey = 
	"sk_test_51JRVteBEnR2Z7uBuQPItOW3VmCAgxqXu4nPOHe9YEw542uoC7SaGHejx9SQCFEh2sz6L37OIga6Cb1FyqFcXSHtm00KiFYm3uy";
	\Stripe\Stripe::setApiKey($secretKey);
?>
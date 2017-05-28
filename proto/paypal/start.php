<?php
include_once('../../config/init.php');
define('SITE_URL', $BASE_URL);

require 'vendor/autoload.php';

$paypal = new \PayPal\Rest\ApiContext(
	new \PayPal\Auth\OAuthTokenCredential(
	'AeYw_kHCmcNmvlxzb5mZLYX9OWMbkCu8kBCcQ4rBiuKmHytrYcV2oh9Rl7iNHjxG4M4xe2w5U00qONDs',
	'EODCKpC1IL0HDDP_h03v0wBEU-2lCAd45D8uqPakWZN5hoDoeiwX9ABwDcpIYdAAsXH8Jd1JarFUv0bq')
);

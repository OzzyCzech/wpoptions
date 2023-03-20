<?php
/**
 * @author Roman Ozana <roman@ozana.cz>
 */
use Tester\Assert;

{
	require_once __DIR__ . '/../vendor/autoload.php';
	\Tester\Environment::setup();
	date_default_timezone_set('Europe/Prague');
}

function get_option($name) {
	return null;
}

$options = new \om\WpOptions();
Assert::same('om\WpOptions', $options->getName());

$options = new \om\WpOptions('test');
Assert::same('test', $options->getName());
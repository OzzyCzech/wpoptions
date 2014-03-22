<?php
/**
 * @author Roman Ozana <ozana@omdesign.cz>
 */
use Tester\Assert;

{
	require_once __DIR__ . '/../vendor/autoload.php';
	\Tester\Environment::setup();
	date_default_timezone_set('Europe/Prague');
}


function get_option($name) {
	return ['aa' => 'aa'];
}

$options = new \om\WpOptions();
Assert::same('om\WpOptions', $options->getName());

$options = new \om\WpOptions('test');
Assert::same('test', $options->getName());

Assert::same('aa', $options->aa);
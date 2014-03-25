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

{
	class MockStorage {
		public static $data = array();
	}

	function update_option($name, $options) {
		MockStorage::$data[$name] = $options;
	}

	function get_option($name) {
		return isset(MockStorage::$data[$name]) ? MockStorage::$data[$name] : null;
	}
}

{
	$options = new \om\WpOptions('default', array('property' => 'default value'));
	$options->save();

	Assert::same('default value', MockStorage::$data['default']['property']);
}

{
	$options = new \om\WpOptions('test');
	$options->something = 'value';
	$options->save();
	Assert::same('value', MockStorage::$data['test']['something']);
}


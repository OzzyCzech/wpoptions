<?php
namespace om;
/**
 * @author Roman Ozana <ozana@omdesign.cz>
 */
class WpOptions extends \stdClass {

	/** @var null */
	protected $name = null;

	/**
	 * Extract settings
	 */
	public function __construct($name = null, array $default = array()) {
		if ($name === null && __CLASS__ !== get_class($this)) {
			throw new \Exception('Invalid options name');
		}

		$this->name = ($name) ? : get_class($this);
		if ($options = get_option($this->name, null)) {
			$options = array_merge_recursive($default, $options);
			$this->fromArray($options);
		} else {
			$this->fromArray($default);
		}
	}

	/**
	 * @return null|string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Return all options
	 *
	 * @return array
	 */
	public function getOptions() {
		return ObjectTransform::toArray($this);
	}

	/**
	 * @param array $data
	 * @return $this
	 */
	public function fromArray(array &$data) {
		foreach ($data as $name => $value) {
			$this->{$name} = $value;
		}
		return $this;
	}

	/**
	 * Update options
	 *
	 * @return false
	 */
	public function save() {
		return update_option($this->name, ObjectTransform::toArray($this));
	}
}

class ObjectTransform {
	/**
	 * @param \stdClass $document
	 * @return array
	 */
	public static function toArray(\stdClass $document) {
		return get_object_vars($document);
	}
}
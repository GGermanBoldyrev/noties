<?php

namespace app\core;

use app\Enums\Rule;

abstract class Model
{
	// Errors array
	public array $errors = [];

	// Fill the object attributes with parameters from Request
	public function loadData(array $data): void
	{
		foreach ($data as $key => $value) {
			if (property_exists($this, $key)) {
				$this->$key = $value;
			}
		}
	}

	// Method to add errors to the array
	protected function addError(Rule $rule, string $property, array $params = []): void
	{
		// Form an error message
		$message = $rule->value ?? '';
		// Pass parameters for min/max
		if (count($params) > 0) {
			foreach ($params as $key => $value) {
				// Формируем новое сообщение об ошибке исходя из min/max length
				$message = str_replace("{{$key}}", $value, $message);
			}
		}
		// Write error messages to an array
		$this->errors[$property] = $message;
	}
}

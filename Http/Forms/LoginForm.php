<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm {
    protected $errors = [];
    public $attributes;

    public function __construct($attributes) {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Email must be valid';
        }

        if (!Validator::string($attributes['password'], 3, 255)) {
            $this->errors['password'] = 'Password must be atleast 7 character.';
        }

        $this->attributes = $attributes;
    }

    public static function validate($attributes) {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw() {
        ValidationException::throw($this->errors, $this->attributes);
    }

    public function failed() {
        return count($this->errors);
    }

    public function errors() {
        return $this->errors;
    }

    public function error($key, $messge) {
        $this->errors[$key] = $messge;

        return $this;
    }
}
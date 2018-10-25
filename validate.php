<?php

	class Validate{
		public $errors;

		function __construct(){
			$this->errors = [];
		}

		function isEmpty($field, $value){
			if(empty($value)){
				$this->errors[$field] = "$field is required";
			}
		}

		function isNumeric($field, $value){
			if(!is_numeric($value)){
				$this->errors[$field] = "$field must be numeric";
			}
		}

		function maxLength($field, $value, $length){
			if(strlen($value) > $length){
				$this->errors[$field] = "$field must be less than $length";
			}
		}

		function minLength($field, $value, $length){
			if(strlen($value) < $length){
				$this->errors[$field] = "$field must be greater than $length";
			}
		}

		function doesPasswordMatch($password, $confirm_password){
			if($password != $confirm_password){
				$this->errors['password'] = "password does not match";
			}
		}

		function getErrors(){
			return $this->errors;
		}
	}
	
?>
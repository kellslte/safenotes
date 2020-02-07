<?php

class Hash{
	public static function make($string){
		return password_hash($string, PASSWORD_DEFAULT);
	}

	public static function check($password, $dbpassword){
		if (password_verify($password, $dbpassword)) {
			return true;
		}else{
			return false;
		}

	}

	public static function unique(){
		return self::make(uniqid());
	}
}